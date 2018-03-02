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

    <?php echo $this->Html->css('skins/_all-skins.min'); ?>

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
<body class="hold-transition login-page">

    <center><img src="\app\webroot\img\uvod.png" alt="Úvod" width="30%"> <center>
<div class="login-box">

    <?php echo $this->Flash->render(); ?>

    <?php echo $this->fetch('content'); ?>


</div>
<!-- /.login-box -->
    <?php echo $this->Html->script('https://code.jquery.com/jquery-2.1.1.min.js'); ?>

    <?php echo $this->Html->script('bootstrap.min'); ?>
    <!-- DataTables -->
    <?php echo $this->Html->script('jquery.dataTables.min'); ?>
    <?php echo $this->Html->script('dataTables.bootstrap.min'); ?>
    <!-- SlimScroll -->
    <?php echo $this->Html->script('jquery.slimscroll.min'); ?>
    <!-- FastClick -->
    <?php echo $this->Html->script('fastclick.min'); ?>
    <!-- AdminLTE App -->
    <?php echo $this->Html->script('app.min'); ?>
    <!-- AdminLTE for demo purposes -->
    <?php echo $this->Html->script('demo.js?v=1.1'); ?>

    <!-- Custom js from View -->
    <?php echo $this->fetch('script'); ?>
  

</body>
</html>