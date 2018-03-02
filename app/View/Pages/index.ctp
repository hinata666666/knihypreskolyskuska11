  <div class="login-box-body">
    <p class="login-box-msg"><?= __('Prihláste sa do aplikácie <strong>Knihy pre školy</strong>') ?></p>

    <?php echo $this->Form->create('User', array('role' => 'form')); ?>
      <div class="form-group has-feedback">
        <?php echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => __('Užívateľské meno'), 'label' => false, 'autofocus' => true)); ?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <?php echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => __('Heslo'), 'label' => false)); ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><?= __('Prihlásiť') ?></button>
        </div>
        <!-- /.col -->
      </div>
    <?php echo $this->Form->end(); ?>

  </div>