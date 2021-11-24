<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>sman</title>
    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('vendor/css/bootstrap.css');?>" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="<?=base_url('vendor/css/sb-admin.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('vendor/font-awesome/css/font-awesome.min.css');?>">
   
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
</head>
<style>
	.bg{
  background: url(bg.jfif); 
  background-size:cover;
  background-attachment: fixed;
    }
    </style>
<body class="bg">
<div id="wrapper">

<!-- Sidebar -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	</button>
	<a class="navbar-brand" href="<?=base_url();?>">E-Library</a>
  </div>
  
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
  <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="nav-link">
              <a href="<?=base_url();?>"><i class="fa fa-home"> </i>Home</a>
            </li>
            <li class="nav-link">
              <a href="<?=base_url();?>admin/login"><i class="fa fa-sign-in"> </i>Login Admin</a>
            </li>
            <li class="nav-link">
              <a href="<?=base_url();?>auth/login"><i class="fa fa-sign-in"></i> Login Siswa</a>
            </li>
            <li class="nav-link">
              <a href="<?=base_url();?>auth/register"><i class="fa fa-sign-in"></i> Register</a>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
  </div>
  <div style="padding:100px;">
      <div class="text-center">
      <img src="4.png">
      <h1 style="color:white;font-family:bauhaus;"> <marquee> Jangan Lupa 3 M : 
        1.Mencuci Tangan
        2.Memakai Masker
        3.Menjaga Jarak
      </marquee></h1>
      </div>
  </div>

</div>
    <script src="<?=base_url('vendor/js/jquery-1.10.2.js');?>"></script>
    <script src="<?=base_url('vendor/js/bootstrap.js');?>"></script>

	  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="<?=base_url('vendor/js/morris/chart-data-morris.js');?>"></script>
    <script src="<?=base_url('vendor/js/tablesorter/jquery.tablesorter.js');?>"></script>
    <script src="<?=base_url('vendor/js/tablesorter/tables.js');?>"></script>
</body>
</html>