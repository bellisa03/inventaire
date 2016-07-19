<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Inventorix: votre outil d\'inventaire';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>


    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
</head>

<body style="margin-top: 60px">

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">
                INVENTORIX</span></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><?= $this->Html->link(__('Accueil'), ['controller' => 'Equipments', 'action' => 'index']) ?></li>
                <li class="active"><a href="#about">A propos</a></li>
                <li class="active"><a href="#contact">Contact</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container" style="width: 1700px;">
    <ul class="nav nav-pills nav-stacked" style="float:left ; width: 260px; padding: 40px ">
        <li role="presentation" class="active"><?= $this->Html->link(__('Type de matériel'), ['controller' => 'Equipments', 'action' => 'index'])?></li>
        <li role="presentation" class="active"><?= $this->Html->link(__('Matériel IT'), ['controller' => 'ItDevices', 'action' => 'index']) ?> </li>
        <li role="presentation" class="active"><?= $this->Html->link(__('Mobilier'), ['controller' => 'Furnitures', 'action' => 'index']) ?></li>
        <li role="presentation" class="active"><?= $this->Html->link(__('Locaux'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li role="presentation" class="active"><?= $this->Html->link(__('Utilisateurs'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li role="presentation" class="active"><?= $this->Html->link(__('Attribution'), ['controller' => 'Attributions', 'action' => 'index']) ?></li>
    </ul>
    <div class="starter-template" style="float:left ; width: 1400px">
        <h1><?= $cakeDescription ?></h1>
        <?= $this->Flash->render() ?>
        <p class="lead"><?= $this->fetch('content') ?></p>
    </div>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
