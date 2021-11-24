<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Edit Pengadaan Buku</h1>
            <ol class="breadcrumb">
                <li><a href="<?=base_url();?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?=base_url();?>pengadaan"><i class="fa fa-tables"></i> Pengadaan Buku</a></li>
                <li class="active"><i class="fa fa-table"></i> Edit Pengadaan Buku</li>
            </ol>
          </div>
          </div><!-- /.row -->
 <div class="card-body">
    <form method="post" action="<?=base_url('pengadaan/proses_edit_detail/'.$id_detail);?>">
      <div class="form-row">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID PINJAM</label>
                    <?php
                        foreach($d_pengadaan_d->result() as $fd_pengadaan_d){
                           $id_pengadaan = $fd_pengadaan_d->id_pengadaan;
                           $judul_buku = $fd_pengadaan_d->judul_buku;
                           $penerbit = $fd_pengadaan_d->penerbit;
                           $pengarang = $fd_pengadaan_d->pengarang;
                        }

                    ?>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="id_pengadaan" value="<?=$id_pengadaan;?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">JUDUL BUKU</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="judul_buku" value="<?=$judul_buku;?>">
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
                        <button type="submit" class="btn btn-primary" value="SIMPAN">Save</button>
                        <button type="submit" class="btn btn-primary" value="SIMPAN DAN LANJUTKAN">Lanjutkan</button>
                        </div>
                    </div>
                 </div>
                </div>
    </form>