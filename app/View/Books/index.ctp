<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h2></h2>
        <div class="box-tools">
        <?php
          echo $this->Form->create('Book', array('class' => 'form-inline'));
            echo $this->Form->input('search', array('class' => 'form-control input-sm', 'div' => 'form-group', 'label' => false, 'placeholder' => 'Hľadať'));
            echo " ". $this->Form->button('<i class="fa fa-search"></i>', array('type' => 'submit', 'class' => 'btn btn-sm btn-success', 'div' => false, 'escape' => false));
          echo $this->Form->end();
        ?>
        </div>
      </div>
        <table id="example12" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Názov učebnice</th>
              <th>Autor</th>
              <th>Rok</th>
              <th>ISBN</th>
              <th>Počet strán</th>
              <th>Stupeň školy</th>
              <th>Typ školy</th>
              <th>Predmet</th>
              <th></th>
             
            </tr>
          </thead>
          <tbody>
            <?php foreach($users as $item) {
              echo "<tr>";
                echo "<td>".$item['Book']['id']."</td>";
                echo "<td>".$item['Book']['name']."</td>";
                echo "<td>".$item['Book']['author']."</td>";
                echo "<td>".$item['Book']['year']."</td>";
                echo "<td>".$item['Book']['isbn']."</td>";
                echo "<td>".$item['Book']['pages']."</td>";
                echo "<td>".$item['Book']['school_degree']."</td>";
                echo "<td>".$item['Book']['school_type']."</td>";
                echo "<td>".$item['Book']['subject']."</td>";
               

                echo '<td>'.$this->Html->link(__('Náhľad'), array('action' => 'download', $item['Book']['id']), array('class' => 'btn btn-success btn-xs', 'escape'=>false, 'target' => '_blank')).' ';  

                 
                   if($user['type'] != '2') {
                   if($user['type'] != '1') {

                echo $this->Html->link(__('Detail'), array('action'=>'edit', $item['Book']['id']), array('class' => 'btn btn-success btn-xs', 'escape'=>false)).' '; 
                   } 
                 }
                 
                   if($user['type'] != '2') {
                   if($user['type'] != '1') {

                 echo $this->Html->link(__('Vymazať'), array('action'=>'delete', $item['Book']['id']), array('class' => 'btn btn-danger btn-xs', 'escape'=>false)).' '; 
                } 
              }

               

                  //echo '<td>'.$this->Html->link(__('Stiahnuť'), array('action'=>'output_file', $item['Book']['id']), array('class' => 'btn btn-success btn-xs', 'escape'=>false)).' '; 

              echo "</tr>";
            } ?>
          </tbody>
        </table>
        <?php if(empty($users)) echo '<div class="box-body text-center"><p class="text-muted">Žiadne záznamy</p></div>'; ?>
    </div>
    <!-- /.box -->


  <div class="pagination no-margin pagination-centered">
    <ul class="pagination">
      <?php
      echo $this->Paginator->prev(__('Novšie'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
      echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
      echo $this->Paginator->next(__('Staršie'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
      ?>
    </ul>
  </div>

  </div>
  <!-- /.col -->
</div>
<!-- /.row -->