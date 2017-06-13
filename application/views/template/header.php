<?php defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <title><?php echo $title ?></title>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
  <!-- ASSETS CSS
       ========================================= -->

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css"/>
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Multiple select -->
  <link rel="stylesheet" href="/assets/bower/multiple-select/multiple-select.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="/assets/css/main.min.css"/>
  
</head>
<body>
  
  <?php // Include menu ?>
  <?php include 'menu.php'; ?>

  <?php // Include notifications ?>
  <?php include 'addons/_notifications.php'; ?>

  <?php // Include alerts ?>
  <?php include 'addons/_alerts.php'; ?>
