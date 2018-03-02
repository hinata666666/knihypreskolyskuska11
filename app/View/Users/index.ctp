<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h2></h2>
        <div class="box-tools">
        <?php
          echo $this->Form->create('User', array('class' => 'form-inline'));
            echo $this->Form->input('search', array('class' => 'form-control input-sm', 'div' => 'form-group', 'label' => false, 'placeholder' => 'Hľadať'));
            echo " ". $this->Form->button('<i class="fa fa-search"></i>', array('type' => 'submit', 'class' => 'btn btn-sm btn-success', 'div' => false, 'escape' => false));
          echo $this->Form->end();
        ?>
        </div>
      </div>
        <table id="example12" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Typ užívateľa</th>
              <th>Meno a priezvisko</th>
              <th>Stupeň školy</th>
              <th>Pozícia</th>
              
              </tr>
          </thead>
          <tbody>
            <?php foreach($users as $item) {
              if($item['User']['type']=='0')  continue;
              echo "<tr>";
                echo "<td>";
                
                if($item['User']['type']=='1')  $item['User']['userrole']='Žiak';
                if($item['User']['type']=='2')  $item['User']['userrole']='Zamestnanec školy';
                if($item['User']['type']=='3')  $item['User']['userrole']='Zamestnanec MŠ'; 

                if($item['User']['userrole']) echo $item['User']['userrole'];
                echo "</td>";

                echo "<td>".$item['User']['name'].' '.$item['User']['lastname']."</td>";
                echo "<td>".$item['User']['school_degree']."</td>";
                echo "<td>".$item['User']['role']."</td>";
                echo '<td>'.$this->Html->link(__('Detail'), array('action'=>'edit', $item['User']['id']), array('class' => 'btn btn-success btn-xs', 'escape'=>false)).' ';
                echo $this->Html->link(__('Vymazať'), array('action'=>'delete', $item['User']['id']), array('class' => 'btn btn-danger btn-xs', 'escape'=>false)).'</td>';
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