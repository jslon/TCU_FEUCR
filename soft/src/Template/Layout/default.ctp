<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contraloría FEUCR</title>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('prettyPhoto.css') ?>
    <?= $this->Html->css('main.css') ?>


    <?php echo $this->Html->meta('favicon.ico','webroot/favicon.ico',array('type' => 'icon'));?>



    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head><!--/head-->

<body data-spy="scroll" data-target="#navbar" data-offset="0">
    <header id="header" role="banner">
        <div class="container">
            <div id="navbar" class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><?php echo $this->Html->link('', ['controller'=>'Pages', 'action'=>'home'],['class'=>'glyphicon glyphicon-home'])?></li>
                        <li><a href="#asociaciones">Asociaciones</a></li>
                        <li><a href="#acerca-de">Acerca de</a></li>
                        <li><a href="#contacto">Contáctanos</a></li>

                        <li><?php
                            if(!is_null($this->request->session()->read('Auth.User')) )
                            {
                                if(($this->request->session()->read('Auth.User.role') == 'admin'))
                                {
                                    echo $this->Html->link('Administrar',['controller'=>'associations', 'action'=>'index']);
                                }
                                else
                                {
                                    echo $this->Html->link('Administrar',['controller'=>'associations', 'action'=>'index_associations']);
                                }

                            }
                            ?>
                        </li>

                        <li><?php echo $this->Html->link('Login',['controller'=>'users', 'action'=>'login'])?></li>

                        <li><?php
                                if(!is_null($this->request->session()->read('Auth.User')))
                                  {

                                    echo $this->Html->link('Logout',['controller'=>'users', 'action'=>'logout']);
                                  }
                                 ?>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </header><!--/#header-->


         <?= $this->fetch('content') ?>



     <?=$this->Html->script('jquery.js') ?>
     <?=$this->Html->script('bootstrap.min.js') ?>
     <?=$this->Html->script('jquery.isotope.min.js') ?>
     <?=$this->Html->script('jquery.prettyPhoto.js') ?>
     <?=$this->Html->script('main.js') ?>

</body>
</html>
