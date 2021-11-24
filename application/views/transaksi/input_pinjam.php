<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Input Pinjam Buku</h1>
            <ol class="breadcrumb">
                <li><a href="<?=base_url();?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-table"></i> Input Pinjam Buku</li>
            </ol>
          </div>
          </div><!-- /.row -->
 <div class="card-body">
    <form method="post" action="<?=base_url('pinjam/proses_input_pinjam');?>">
      <div class="form-row">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID PINJAM</label>
                    <div class="col-sm-3">
                    <?php
                        foreach($d_pinjam_id->result() as $fd_pinjam_id){
                            $old_pinjam_id = $fd_pinjam_id ->id_pinjam;
                            $x_pinjam_id = substr($old_pinjam_id,3)+1;
                            $new_pinjam_id = 'IDP'.sprintf('%03d',$x_pinjam_id);
                        }

                    ?>
                    <input type="text" class="form-control" name="id_pinjam" value="<?=$new_pinjam_id?>" readonly> 
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID ANGGOTA</label>
                    <div class="col-sm-5">
                    <select name="id_anggota" class="custom-select form-control" onchange="$(location).attr('href','<?=base_url('pinjam/input_pinjam/');?>'+this.value);">
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
                    <label class="col-sm-2 col-form-label">ID BUKU</label>
                    <div class="col-sm-5">
                    <select name="id_buku" class="custom-select form-control">
                        <?php
                            foreach($d_buku->result() as $fd_buku){
                                if($this->uri->segment(3)==$fd_buku->id_buku){
                                    $a_slc = 'selected';
                                }else{
                                    $a_slc = '';
                                }
                                
                        ?>
                            <option <?=$a_slc;?> value="<?=$fd_buku->id_buku?>">
                            <?=$fd_buku->id_buku;?>
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
                        <button type="submit" class="btn btn-primary" name="s_save" value="SIMPAN">Save</button>
                        <button type="submit" class="btn btn-primary" name="s_save" value="SIMPAN DAN LANJUTKAN">Lanjutkan</button>
                        </div>
                    </div>
                 </div>
                </div>
    </form>
              <div class="row">
                <div class="col-lg-12">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover tablesorter">
                      <thead>
                        <tr>
                          <th>No <i class="fa fa-sort"></i></th>
                          <th>ID BUKU <i class="fa fa-sort"></i></th>
                          <th>Judul Buku <i class="fa fa-sort"></i></th>
                          <th>Aksi <i class="fa fa-sort"></i></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>&nbsp;</td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                  </div>
                  </div>

    
