<div class="row">
<?php
    echo $this->Form->create('Book', array('type' => 'file'), array('role'=>'form'));
?>    
  <div class="col-sm-12">
    <div class="box">
      <div class="box-body">
      <div class="row">
        <div class="form-group col-sm-10">
          <?php
            echo $this->Form->input('name', array('label'=>__('Názov'), 'class'=>'form-control', 'placeholder'=>false, 'required' => true));
          ?>
        </div>
         </div>
        <div class="row">
        <div class="form-group col-sm-10">
          <?php
            echo $this->Form->input('author', array('label'=>__('Autor'), 'class'=>'form-control', 'placeholder'=>false, 'required' => true));
          ?>
         </div>
         </div>
        <div class="row">
        <div class="form-group col-sm-5">
          <?php
            echo $this->Form->input('year', array('label'=>__('Rok vydania'), 'class'=>'form-control', 'placeholder'=>false, 'required' => true));
          ?>
        </div>
        <div class="form-group col-sm-5">
          <?php
            echo $this->Form->input('pages', array('label'=>__('Počet strán'), 'class'=>'form-control', 'placeholder'=>false, 'required' => true));
          ?>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-6">
          <?php
            echo $this->Form->input('isbn', array('label'=>__('ISBN'), 'class'=>'form-control', 'placeholder'=>false, 'required' => true));
          ?>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-6">
          <?php
            echo $this->Form->input('school_degree', array('label'=>__('Stupeň školy'), 'class'=>'form-control', 'placeholder'=>false, 'required' => false));
          ?>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-6">
          <?php
            echo $this->Form->input('school_type', array('label'=>__('Typ školy'), 'class'=>'form-control', 'placeholder'=>false, 'required' => false));
          ?>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-6">
          <?php
            echo $this->Form->input('subject', array('label'=>__('Predmet'), 'class'=>'form-control', 'placeholder'=>false, 'required' => false));
          ?>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-6">
          <?php
            $is_required = true;
            if(!empty($this->request->data['Book']['pdf'])) {
             echo 'Aktuálny súbor ';
             echo $this->Html->link(__('Náhľad'), '/files/books/'.$this->request->data['Book']['pdf'], array('class' => 'btn btn-success btn-xs', 'escape'=>false, 'target' => '_blank')).' '; 
             $is_required = false;
          }

            echo $this->Form->input('new_pdf', array('type' => 'file', 'label'=>__('PDF učebnica'), 'class'=>'form-control', 'placeholder'=>false, 'required' => $is_required));
          ?>
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
</div>
</div>
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