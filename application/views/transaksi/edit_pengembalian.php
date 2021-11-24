<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Edit Pengembalian Buku</h1>
            <ol class="breadcrumb">
                <li><a href="<?=base_url();?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-table"></i> Edit Pengembalian Buku</li>
            </ol>
          </div>
          </div><!-- /.row -->
 <div class="card-body">
    <form method="post" action="<?=base_url('pengembalian/proses_edit_pengembalian');?>">
      <div class="form-row">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID PENGEMBALIAN</label>
                    <div class="col-sm-3">
                    <?php
                        foreach($d_pengembalian->result() as $fd_pengembalian){
                           $id_pengembalian = $fd_pengembalian->id_pengembalian;
                           $id_pinjam = $fd_pengembalian->id_pinjam;
                           $id_anggota= $fd_pengembalian->id_anggota;
                           $tanggal_kembali = $fd_pengembalian->tanggal_kembali;
                           $keterangan = $fd_pengembalian->keterangan;
                        }

                    ?>
                    <input type="text" class="form-control" name="id_pengembalian" value="<?=$id_pengembalian;?>" readonly> 
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID PINJAM</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="id_pinjam" value="<?=$id_pinjam;?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID ANGGOTA</label>
                    <div class="col-sm-5">
                    <select name="id_anggota" value="<?=$id_anggota;?>" class="custom-select form-control">
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
                    <input type="date" class="form-control" name="tanggal_kembali" value="<?=$tanggal_kembali;?>">
                    </div> 
                </div>      
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">KETERANGAN</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="keterangan" value="<?=$keterangan;?>">
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