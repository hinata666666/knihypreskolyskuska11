<!DOCTYPE html>
<html lang="en">

<head>

    <?php echo $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="knihypreskoly">
    <?php echo $this->fetch('meta'); ?>

    <title><?php echo $title_for_layout; ?> | knihypreskoly</title>
    <link rel="icon" type="image\jpg" href="\app\webroot\img\logo.jpg">  

    <!-- Bootstrap Core CSS -->
    <?php echo $this->Html->css('bootstrap.min'); ?>

    <!-- dataTables -->
    <?php echo $this->Html->css('dataTables.bootstrap'); ?>

    <?php echo $this->Html->css('datepicker3'); ?>

    <?php echo $this->Html->css('skins/skin-blue.min'); ?>

    <!-- Main CSS -->
    <?php echo $this->Html->css('admin'); ?>

    <!-- Custom CSS -->
    <?php // echo $this->Html->css('admin'); ?>

    <!-- Custom Fonts -->
    <?php echo $this->Html->css('font-awesome.min'); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php echo $this->fetch('css'); ?>

    <?php echo $this->Html->meta('icon'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/pages/search" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="\app\webroot\img\knihy.png" alt="Učebnice" width="100%"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">  <img src="\app\webroot\img\knihy.png" alt="Učebnice" align="middle">
        </span>
       
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span class="hidden-xs"><?= $user['username']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <i class="fa fa-user-o" aria-hidden="true" style="font-size: 90px; margin-top: 10px;" color=#000></i>

                <p>
                  <?= $user['username']; ?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <?= $this->Html->link(__('Odhlásiť'), ['controller'=>'pages', 'action' => 'logout'], ['class' => 'btn btn-danger btn-flat', 'escape'=>false]); ?>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="box box-warning box-solid" id="reminder" style="position: fixed; top: 4px; left: 50%; margin-left: -100px; z-index: 2000; width: 200px; display:none;">
      <div class="box-header">
        <a href="/admin/photos"><h3 class="box-title"></h3></a>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
    </div>
  </header>



  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <i class="fa fa-user-o" aria-hidden="true" style="font-size: 40px; "></i>
        </div>
        <div class="pull-left info">
          <p><?= $this->Text->truncate($user['username'], 25); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php echo $this->element('menu'); ?>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <div class="content-header">
    <?php echo $this->Flash->render(); ?>
    </div>

    <section class="content-header">
      <h1>
        <?= $title_for_layout; ?>
        <small><?if(!empty($description)) echo $description; ?></small>
      </h1>
    </section>
    <section class="content">
        <?php echo $this->fetch('content'); 
        ?>
    </section>
  
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">


      </div>
      <!-- /.tab-pane -->
        <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">

      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
    <!-- /#wrapper -->

    <?php echo $this->Html->script('https://code.jquery.com/jquery-2.1.1.min.js'); ?>

    <?php echo $this->Html->script('bootstrap.min'); ?>
    <!-- DataTables -->
    <?php echo $this->Html->script('jquery.dataTables.min'); ?>
    <?php echo $this->Html->script('dataTables.bootstrap.min'); ?>
    <!-- SlimScroll -->
    <?php echo $this->Html->script('jquery.slimscroll.min'); ?>
    <!-- FastClick -->
    <?php echo $this->Html->script('fastclick.min'); ?>

    <?php echo $this->Html->script('bootstrap-datepicker'); ?>
    <?php echo $this->Html->script('bootstrap-datepicker.sk'); ?>
    <!-- AdminLTE App -->
    <?php echo $this->Html->script('app.min'); ?>
    <!-- AdminLTE for demo purposes -->
    <?php echo $this->Html->script('demo.js?v=1.12'); ?>
    <?php echo $this->Html->script('admin.js?v=1.13'); ?>



    <!-- Custom js from View -->
    <?php echo $this->fetch('script'); ?>

<script>
  $(function () {
    $("#example").DataTable({"language": { "url": "//cdn.datatables.net/plug-ins/725b2a2115b/i18n/Slovak.json" }});
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "language": { "url": "//cdn.datatables.net/plug-ins/725b2a2115b/i18n/Slovak.json" }
    });
    $('#example2').DataTable({
      "ordering": false,
      "language": { "url": "//cdn.datatables.net/plug-ins/725b2a2115b/i18n/Slovak.json" }
    });
  });

$('#datepicker').datepicker({
  autoclose: true,
  language: 'sk'
});
</script>    
</body>
</html>
