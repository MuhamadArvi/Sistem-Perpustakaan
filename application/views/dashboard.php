<div id="page-wrapper">

<div class="row">
<div class="col-lg-12">
  <h1>Dashboard</h1>
  <ol class="breadcrumb">
  <li><a href="<?=base_url();?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  </ol>
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    Welcome to  
                <?php if($this->session->userdata('level')==='1'):?>
                <?php echo $this->session->userdata('username');?>
                <?php elseif($this->session->userdata('level')==='2'):?>
                <?php echo $this->session->userdata('nama');?>
                <?php else:?>
                <?php echo 'uknown';?>
                <?php endif;?> 
    by Ruang Baca Sekolah.
  </div>
</div>