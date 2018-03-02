<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h4 class="text-center">Vyhľadaj učebnicu</h4>
      </div>
      <div class="box-body text-center">
        <?php
          echo $this->Form->create('Book', array('class' => 'col-md-10 col-md-offset-1', 'url' => '/books/index'));
            echo $this->Form->input('search', array('class' => 'form-control', 'div' => 'form-group', 'label' => false, 'placeholder' => 'Vložte názov, autora alebo ISBN'));
            echo " ". $this->Form->button('<i class="fa fa-search"></i> Hľadať učebnicu', array('type' => 'submit', 'class' => 'btn btn-sm btn-success', 'div' => false, 'escape' => false));
          echo $this->Form->end();
        ?>        
      </div>
    </div>
  </div>
</div>