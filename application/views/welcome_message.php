<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SMAN 114 JAKARTA </title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('vendor/css/bootstrap.css');?>" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="<?=base_url('vendor/css/sb-admin.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('vendor/font-awesome/css/font-awesome.min.css');?>">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
</head>
<body>

<div id="wrapper">

<!-- Sidebar -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	  <span class="sr-only">Toggle navigation</span>
	  <span class="icon-bar"></span>
	  <span class="icon-bar"></span>
	  <span class="icon-bar"></span>
	</button>
	<a class="navbar-brand">Ruang Baca Sekolah</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
	<ul class="nav navbar-nav side-nav">
    <?php if($this->session->userdata('level')==='1'):?>
	  <li><a href="<?=base_url();?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	  <li><a href="<?=base_url();?>buku"><i class="fa fa-book"></i> Daftar Buku</a></li>
      <li><a href="<?=base_url();?>siswa"><i class="fa fa-user"></i> Data Siswa</a></li>
      <li><a href="<?=base_url();?>anggota"><i class="fa fa-user"></i> Data Anggota</a></li>
      <li class="dropdown"> 
		  <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-table"></i> Laporan<b class="caret"></b></a>
		  <ul class="dropdown-menu">
		  <li><a href="<?=base_url();?>pinjam/tampil_laporan">Laporan Peminjaman Buku</a></li>
		  <li><a href="<?=base_url();?>pengadaan/tampil_pengadaan">Laporan Pengadaan Buku</a></li>
      <li><a href="<?=base_url();?>pengembalian/tampil_laporan">Laporan Pengembalian Buku</a></li>
		  </ul>
	    </li>
      <li class="dropdown"> 
		  <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Data Buku<b class="caret"></b></a>
		  <ul class="dropdown-menu">
		  <li><a href="<?=base_url();?>pinjam">Data Peminjaman Buku</a></li>
		  <li><a href="<?=base_url();?>pengembalian">Data Pengembalian Buku</a></li>
		  <li><a href="<?=base_url();?>pengadaan">Data Pengadaan Buku</a></li>
		  </ul>
	    </li>
    <?php elseif($this->session->userdata('level')==='2'):?>
      <li><a href="<?=base_url();?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	    <li><a href="<?=base_url();?>buku"><i class="fa fa-book"></i> Daftar Buku</a></li>
      <li class="dropdown"> 
		  <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Data Buku<b class="caret"></b></a>
		  <ul class="dropdown-menu">
		  <li><a href="<?=base_url();?>pinjam">Data Pinjam Buku</a></li>
		  <li><a href="<?=base_url();?>pengembalian">Data Pengembalian</a></li>
		  </ul>
	    </li>
    <?php else:?>
	  <li><a href="bootstrap-elements.html"><i class="fa fa-desktop"></i> Bootstrap Elements</a></li>
	  <li><a href="bootstrap-grid.html"><i class="fa fa-wrench"></i> Bootstrap Grid</a></li>
	  <li><a href="blank-page.html"><i class="fa fa-file"></i> Blank Page</a></li>
	  <li class="dropdown"> 
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Dropdown <b class="caret"></b></a>
		<ul class="dropdown-menu">
		  <li><a href="#">Dropdown Item</a></li>
		  <li><a href="#">Another Item</a></li>
		  <li><a href="#">Third Item</a></li>
		  <li><a href="#">Last Item</a></li>
		</ul>
	  </li>
    <?php endif;?>
	</ul>
	<ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user"></i>
                <?php if($this->session->userdata('level')==='1'):?>
                <?php echo $this->session->userdata('username');?>
                <?php elseif($this->session->userdata('level')==='2'):?>
                <?php echo $this->session->userdata('nama');?>
                <?php else:?>
                <?php echo 'uknown';?>
                <?php endif;?>
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                <li class="divider"></li>
                <?php if($this->session->userdata('level')==='1'):?>
                <li><a href="<?=base_url();?>admin/logout"><i class="fa fa-sign-out"></i> Log Out</a></li>
                <?php elseif($this->session->userdata('level')==='2'):?>
                  <li><a href="<?=base_url();?>auth/logout"><i class="fa fa-sign-out"></i> Log Out</a></li>
                <?php else:?>
                  <li><a><i class="fa fa-sign-out"></i> Log Out</a></li>
                <?php endif;?>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
        
	  </nav>

      <div id="layoutSidenav_content">
                <main>
                <?php
                    $this->load->view($page);
                  ?>
                <!--<nav class="navbar-right" aria-label="Page navigation example">
                  <ul class="pagination justify-content-end">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                  </ul>
                </nav>  -->
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
      </div>
      
</div><!-- /.row -->
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