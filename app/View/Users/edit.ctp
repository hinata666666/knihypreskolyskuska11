<div class="row">
<?php
    echo $this->Form->create('User', array('type' => 'post'), array('role'=>'form'));
?>    
  <div class="col-sm-12">
    <div class="box">
      <div class="box-body">
      <div class="row">
        <div class="form-group col-sm-2">
          <?php
            echo $this->Form->input('type', array('label'=>__('Typ užívateľa'), 'class'=>'form-control', 'placeholder'=>false, 'required' => true));
          ?>
        </div>
        </div>

             <div class="row">
        <div class="form-group col-sm-8">
          <?php
            echo $this->Form->input('username', array('label'=>__('Užívateľské meno'), 'class'=>'form-control', 'placeholder'=>false, 'required' => true));
          ?>
        </div>
      </div>
             <div class="row">
        <div class="form-group col-sm-8">
          <?php
          unset($this->request->data['User']['password']);
          if(!empty($this->request->data['User']['password'])) $required = true; else $required = false;
            echo $this->Form->input('password', array('label'=>__('Nové heslo'), 'type' => 'password', 'class'=>'form-control', 'placeholder'=>false, 'required' => $required));
          ?>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-4">
          <?php
            echo $this->Form->input('email', array('label'=>__('Email'), 'class'=>'form-control', 'placeholder'=>__('@'), 'required' 
            => true));
          ?>
        </div>
        </div>
      <div>
      <div class="row">
        <div class="form-group col-sm-4">
          <?php
            echo $this->Form->input('name', array('label'=>__('Meno'), 'class'=>'form-control', 'placeholder'=>false, 'required' => true));
          ?>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-4">
          <?php
            echo $this->Form->input('lastname', array('label'=>__('Priezvisko'), 'class'=>'form-control', 'placeholder'=>false, 'required' => true));
          ?>
        </div>
      </div>  
      <div class="row">
        <div class="form-group col-sm-4">
          <?php
            echo $this->Form->input('role', array('label'=>__('Zaradenie používateľa'), 'class'=>'form-control', 'placeholder'=>false, 'required' => false));
          ?>
        </div>
      </div>
        </div>
        <div>
      <div class="row">
        <div class="form-group col-sm-4">
          <?php
            echo $this->Form->input('school_degree', array('label'=>__('Stupeň školy'), 'class'=>'form-control', 'placeholder'=>false, 'required' => false));
          ?>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-4">
          <?php
            echo $this->Form->input('school_type', array('label'=>__('Typ školy'), 'class'=>'form-control', 'placeholder'=>false, 'required' => false));
          ?>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-4">
          <?php
            echo $this->Form->input('school_class', array('label'=>__('Trieda'), 'class'=>'form-control', 'placeholder'=>false, 'required' => false));
          ?>
        </div>
      </div>
        

    </div>
  </div>
</div>
 <div class="row">
    <div class="col-md-12"> 

        <?php

            echo $this->Form->hidden('id');
            echo $this->Form->submit(__('Uložiť'), array('class'=>'btn btn-small btn-success', 'div'=>false));
        ?>     
    </div>
  </div>
        <?php
            echo $this->Form->end();
        ?>  
<style>
.inline {
    display: inline;
    width: auto;
    margin-top: 0px;
}
.checkbox input[type=checkbox] {
    margin-left: 0;
}
</style>