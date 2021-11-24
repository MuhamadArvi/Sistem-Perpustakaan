<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Edit Pengadaan Buku</h1>
            <ol class="breadcrumb">
                <li><a href="<?=base_url();?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-table"></i> Edit Pengadaan Buku</li>
            </ol>
          </div>
          </div><!-- /.row -->
 <div class="card-body">
    <form method="post" action="<?=base_url('pengadaan/proses_edit_laporan/'.$id_laporan_pengadaan);?>">
      <div class="form-row">
                    <?php
                        foreach($d_lapor_pengadaan->result() as $fd_laporan_pengadaan){
                           $id_pengadaan = $fd_laporan_pengadaan->id_pengadaan; 
                           $nama = $fd_laporan_pengadaan->nama;
                           $id_buku = $fd_laporan_pengadaan->id_buku;
                           $judul_buku = $fd_laporan_pengadaan->judul_buku;
                           $penerbit = $fd_laporan_pengadaan->penerbit;
                           $pengarang = $fd_laporan_pengadaan->pengarang;
                        }
                    ?>  
                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID PENGADAAN</label>
                    <div class="col-sm-3">
                    <select name="id_pengadaan" class="custom-select form-control" value="<?=$id_pengadaan;?>">
                        <?php
                            foreach($d_pengadaan_h->result() as $data){
                                if($this->uri->segment(3)==$data->id_pengadaan){
                                    $a_slc = 'selected';
                                }else{
                                    $a_slc = '';
                                }
                                
                        ?>
                            <option <?=$a_slc;?> value="<?=$data->id_pengadaan?>">
                            <?=$data->id_pengadaan;?>
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
                    <select name="nama" class="custom-select form-control" value="<?=$nama;?>">
                        <?php
                            foreach($d_admin->result() as $fd_admin){
                                if($this->uri->segment(3)==$fd_admin->id_admin){
                                    $a_slc = 'selected';
                                }else{
                                    $a_slc = '';
                                }
                                
                        ?>
                            <option <?=$a_slc;?> value="<?=$fd_admin->nama?>">
                            <?=$fd_admin->nama;?>
                            </option>
                          <?php
                            }
                           ?>  
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID BUKU</label>
                    <div class="col-sm-5">
                    <select name="id_buku" class="custom-select form-control" value="<?=$id_buku;?>">
                        <?php
                            foreach($d_buku->result() as $fd_buku){
                                if($this->uri->segment(3)==$fd_buku->id_buku){
                                    $a_slc = 'selected';
                                }else{
                                    $a_slc = '';
                                }
                                
                        ?>
                            <option <?=$a_slc;?> value="<?=$fd_buku->id_buku?>">
                            <?=$fd_buku->id_buku?>-<?=$fd_buku->judul_buku;?>
                            </option>
                          <?php
                            }
                           ?>  
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">JUDUL BUKU</label>
                    <div class="col-sm-5">
                    <select name="judul_buku" class="custom-select form-control" value="<?=$judul_buku;?>">
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
                    <label class="col-sm-2 col-form-label">PENERBIT</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="penerbit" value="<?=$penerbit;?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">PENGARANG</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="pengarang" value="<?=$pengarang;?>">
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