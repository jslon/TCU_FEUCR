<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->



    <title>Contraloría FEUCR</title>
    <?= $this->Html->css('bootstrap.min.css') ?>


    <?= $this->Html->css('association_views.css') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?php echo $this->Html->meta('favicon.ico','webroot/favicon.ico',array('type' => 'icon'));?>

</head><!--/head-->

<body>


      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">

              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

              <?php echo $this->Html->link('Página Principal', '/', ['class'=>'navbar-brand']);?>
          </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
              <li class="active"><?php echo $this->Html->link('Administrar Asociación', '/associations/index_associations', ['id'=>'active-navbar']);?></li>
              
              <li>
                <?php echo $this->Html->link('Solicitar Monto de Ahorro', '/savings/show_associations/1');?>
              </li>
              
              <li>
                <?php echo $this->Html->link('Información General', '/associations/general_information');?>
              </li>
              
              
              <li>
                  <?php echo $this->Html->link('Agregar Usuario', '/users/add_user');?>
              </li>

              <li>
                  <?php echo $this->Html->link('Perfil', '/users/perfil');?>
              </li>

              <li>
                <?php echo $this->Html->link('Salir', '/users/logout');?>
              </li>

          </ul>
          </div>
        </div>
      </nav>


    <div class="container body">

        <?= $this->fetch('content') ?>


    </div>


     <?=$this->Html->script('jquery2.js') ?>
     <?=$this->Html->script('bootstrap.min.js') ?>
     <?=$this->Html->script('jquery_associations.js') ?>

</body>
</html>
