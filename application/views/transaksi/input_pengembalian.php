<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Input Pengembalian Buku</h1>
            <ol class="breadcrumb">
                <li><a href="<?=base_url();?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-table"></i> Input Pengembalian Buku</li>
            </ol>
          </div>
          </div><!-- /.row -->
 <div class="card-body">
    <form method="post" action="<?=base_url('pengembalian/proses_input_pengembalian');?>">
      <div class="form-row">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID PENGEMBALIAN</label>
                    <div class="col-sm-3">
                    <?php
                        foreach($d_pengembalian_id->result() as $fd_pengembalian_id){
                            $old_pengembalian_id = $fd_pengembalian_id ->id_pengembalian;
                            $x_pengembalian_id = substr($old_pengembalian_id,3)+1;
                            $new_pengembalian_id = 'PGL'.sprintf('%03d',$x_pengembalian_id);
                        }

                    ?>
                    <input type="text" class="form-control" name="id_pengembalian" value="<?=$new_pengembalian_id?>" readonly> 
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID PINJAM</label>
                    <div class="col-sm-5">
                    <select name="id_pinjam" class="custom-select form-control">
                        <?php
                            foreach($d_pinjam_h->result() as $fd_pinjam){
                                if($this->uri->segment(3)==$fd_pinjam->id_pinjam){
                                    $a_slc = 'selected';
                                }else{
                                    $a_slc = '';
                                }
                                
                        ?>
                            <option <?=$a_slc;?> value="<?=$fd_pinjam->id_pinjam?>">
                            <?=$fd_pinjam->id_pinjam;?>
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
                    <label class="col-sm-2 col-form-label">TANGGAL KEMBALI</label>
                    <div class="col-sm-5">
                    <input type="date" class="form-control" name="tanggal_kembali">
                    </div> 
                </div>      
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">KETERANGAN</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="keterangan">
                    </div>
                </div>
                
                
                <div class="form-group row">
                        <label class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-sm-5">
                        <a href="<?=base_url();?>pengembalian">
                        <button type="button" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="s_save" value="SIMPAN">Save</button>
                        </a>
                        </div>
                    </div>
                 </div>
                </div>
    </form>