<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h2></h2>
        <div class="box-tools">
        <?php
          echo $this->Form->create('Library', array('class' => 'form-inline'));
            echo $this->Form->input('search', array('class' => 'form-control input-sm', 'div' => 'form-group', 'label' => false, 'placeholder' => 'Hľadať'));
            echo " ". $this->Form->button('<i class="fa fa-search"></i>', array('type' => 'submit', 'class' => 'btn btn-sm btn-success', 'div' => false, 'escape' => false));
          echo $this->Form->end();
        ?>
        </div>
      </div>
        <table id="example12" class="table table-bordered table-hover">
          <thead>
            <tr>
              
              <th>Názov učebnice</th>
              <th>Meno žiaka</th>
              <th>Priezvisko žiaka</th>
              <th>Dátum prezerania</th>
             
            </tr>
          </thead>
          <tbody>
            <?php foreach($users as $item) {
              echo "<tr>";
                //echo "<td>".$item['Library']['id']."</td>";
                echo "<td>".$item['Book']['name']."</td>";
                echo "<td>".$item['User']['name']."</td>";
                echo "<td>".$item['User']['lastname']."</td>";
                echo "<td>".$this->Time->format($item['Library']['last_view'], '%d.%m.%Y %H:%M')."</td>";
               
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