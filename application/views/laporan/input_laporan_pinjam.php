<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Input Pinjaman Buku</h1>
            <ol class="breadcrumb">
                <li><a href="<?=base_url();?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-table"></i> Input Pinjaman Buku</li>
            </ol>
          </div>
          </div><!-- /.row -->
 <div class="card-body">
    <form method="post" action="<?=base_url('pinjam/proses_input_laporan');?>">
      <div class="form-row">

                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID PINJAM</label>
                    <div class="col-sm-3">
                    <select name="id_pinjam" class="custom-select form-control">
                        <?php
                            foreach($d_pinjam_h->result() as $data){
                                if($this->uri->segment(3)==$data->id_pinjam){
                                    $a_slc = 'selected';
                                }else{
                                    $a_slc = '';
                                }
                                
                        ?>
                            <option <?=$a_slc;?> value="<?=$data->id_pinjam?>">
                            <?=$data->id_pinjam;?>
                            </option>
                          <?php
                            }
                           ?>  
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID ANGGOTA</label>
                    <div class="col-sm-5">
                    <select name="id_anggota" class="custom-select form-control">
                        <?php
                            foreach($d_anggota->result() as $fd_anggota){
                                if($this->uri->segment(3)==$fd_anggota->id_anggota){
                                    $a_slc = 'selected';
                                }else{
                                    $a_slc = '';
                                }
                                
                        ?>
                            <option <?=$a_slc;?> value="<?=$fd_anggota->id_anggota?>">
                            <?=$fd_anggota->id_anggota;?> - <?=$fd_anggota->nama;?>
                            </option>
                          <?php
                            }
                           ?>  
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NAMA</label>
                    <div class="col-sm-5">
                    <select name="nama" class="custom-select form-control">
                        <?php
                            foreach($d_anggota->result() as $fd_anggota){
                                if($this->uri->segment(3)==$fd_anggota->id_anggota){
                                    $a_slc = 'selected';
                                }else{
                                    $a_slc = '';
                                }
                                
                        ?>
                            <option <?=$a_slc;?> value="<?=$fd_anggota->nama?>">
                            <?=$fd_anggota->nama;?>
                            </option>
                          <?php
                            }
                           ?>  
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">TANGGAL PINJAM</label>
                    <div class="col-sm-5">
                    <input type="date" class="form-control" name="tanggal_pinjam">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">TANGGAL KEMBALI</label>
                    <div class="col-sm-5">
                    <input type="date" class="form-control" name="tanggal_kembali">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">JUDUL BUKU</label>
                    <div class="col-sm-5">
                    <select name="judul_buku" class="custom-select form-control">
                        <?php
                            foreach($d_buku->result() as $fd_buku){
                                if($this->uri->segment(3)==$fd_buku->id_buku){
                                    $a_slc = 'selected';
                                }else{
                                    $a_slc = '';
                                }
                                
                        ?>
                            <option <?=$a_slc;?> value="<?=$fd_buku->judul_buku?>">
                            <?=$fd_buku->judul_buku;?>
                            </option>
                          <?php
                            }
                           ?>  
                    </select>
                    </div>
                </div>
                
                <div class="form-group row">
                        <label class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-sm-5">
                        <a href="<?=base_url();?>pinjam/tampil_laporan">
                        <button type="button" class="btn btn-secondary">Cancel</button>
                        </a>
                        <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                 </div>
                </div>
    </form>