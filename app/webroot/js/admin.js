$(function () {
    $(".approving").on("click", "input[type='submit']", function() {

    var type = $(this).attr("name");
    var form = $(this).closest('.approving');

    const url = '/admin/photos/approving';
    var this_element = $(this).closest('.approving');

    $.ajax({
        url: url,
        type: "POST",
        data: form.serialize()+'&type='+type,
        dataType: 'HTML',
        beforeSend : function() {
            this_element.find('.ajax-content').addClass('hidden');
            this_element.find('.loading').removeClass('hidden');
        },
        success : function(data) {
             this_element.find('.ajax-content').removeClass('hidden').html(data);
             this_element.find('.loading').addClass('hidden');
             checkCount();
        },
        error : function() {
            this_element.find('.ajax-content').removeClass('hidden');
            this_element.find('.loading').addClass('hidden');
        }
    });
    return false;
    });

$('[data-toggle="tooltip"]').tooltip();

$('.myreason-input').blur(function(){
    if($(this).val().length != 0){
        $('.reason-input').attr('disabled', 'disabled');
    }       
});

if(location.pathname.indexOf('/admin/photos') == 0) {
    setTimeout(function() {
        checkCount();
    }, 30000);
}

var oldTitle = document.title;
var timerId;

function checkCount() {
    $.ajax({
        url: "/admin/photos/ajax_count",
        type: "GET",
        dataType: 'json',
        beforeSend : function() {
            
        },
        success : function(data) {
            if(data.count > 0) {
                if(data.count == 1) { var text = 'nový post'; }
                else if(data.count > 1 && data.count < 5) { var text = 'nové posty'; }
                else var text = 'nových postov';
                $('#reminder').slideDown();
                $('#reminder').find('.box-title').html(data.count+' '+text);
                clearFlash();
                flashTitle(data.count+' '+text);

                setTimeout(function() {
                    checkCount();
                }, 20000);

            } else {
                $('#reminder').slideUp();
                setTimeout(function() {
                    checkCount();
                },2500);   
                clearFlash();             
            }
        },
        error : function() {
            setTimeout(function() {
                checkCount();
            }, 30000);  
            clearFlash();        
        }
    });     
}

function flashTitle(newTitle) {
  var state = false;
  oldTitle = document.title;  // save old title
  timerId = setInterval(flash, 1500);

  function flash() {
    // switch between old and new titles
    document.title = state ? oldTitle : newTitle;
    state = !state;
  }
}

function clearFlash() {
  clearInterval(timerId);
  document.title = oldTitle; // restore old title
}

$(document).on('change', '.checkbox_hp', function() {
    var id = $(this).attr('data-id');
    var this_element = $(this);
    var status_element = $('#top_status'+id);
    if(this.checked) {
        var top = 1;
    } else {
        var top = 0;
    }
    $.ajax({
        url: "/admin/photos/ajax_top",
        type: "POST",
        data: {"id": id, "top": top},
        dataType: 'HTML',
        beforeSend : function() {
            status_element.html('<i class="fa fa-spinner fa-spin"></i>');
        },
        success : function(data) {
            status_element.html('<i class="fa fa-check"></i>');
        },
        error : function() {
            status_element.html('<i class="fa fa-exclamation-triangle"></i>');
        }
    });    
});

$("body").on('click', '.rotate', function() {
    var img = $(this).attr('data-img');
    var id = $(this).attr('data-id');
    var rotate = $(this).attr('data-rotate');
    var button = $(this);
    var time = Date.now();
    $.ajax({
        url: '/admin/photos/rotate/'+img+'/'+rotate,
        type: "GET",
        dataType: 'JSON',
        beforeSend : function() {
            button.addClass('disabled');
            $('#img'+id).css('opacity', '0.4');
        },
        success : function(data) {
            $('#img'+id).attr('src', '/content/photos/'+img+'?v=3'+time).css('opacity', '1');
            button.removeClass('disabled');
        },
        error : function() {
            button.removeClass('disabled');
            $('#img'+id).css('opacity', '1');
        }
    });
    return false;
});


});