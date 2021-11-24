<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Edit Pinjam Buku</h1>
            <ol class="breadcrumb">
                <li><a href="<?=base_url();?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?=base_url();?>pinjam"><i class="fa fa-tables"></i> Pinjam Buku</a></li>
                <li class="active"><i class="fa fa-table"></i> Edit Pinjam Buku</li>
            </ol>
          </div>
          </div><!-- /.row -->
 <div class="card-body">
    <form method="post" action="<?=base_url('pinjam/proses_edit_detail/'.$id_detail);?>">
      <div class="form-row">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID PINJAM</label>
                    <?php
                        foreach($d_pinjam_d->result() as $fd_pinjam_d){
                           $id_pinjam = $fd_pinjam_d->id_pinjam;
                           $id_buku = $fd_pinjam_d->id_buku;
                           $judul_buku = $fd_pinjam_d->judul_buku;
                        }

                    ?>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="id_pinjam" value="<?=$id_pinjam;?>" readonly>
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
                        <label class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-sm-5">
                        <button type="submit" class="btn btn-primary" value="SAVE">Save</button>
                        <button type="submit" class="btn btn-primary" value="SIMPAN DAN LANJUTKAN">Lanjutkan</button>
                        </div>
                    </div>
                 </div>
                </div>
    </form>