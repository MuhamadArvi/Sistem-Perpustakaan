<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Edit Buku</h1>
            <ol class="breadcrumb">
                <li><a href="<?=base_url();?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-table"></i> Edit Buku</li>
            </ol>
          </div>
          </div><!-- /.row -->
 <div class="card-body">
    <form method="post" action="<?=base_url('buku/proses_edit_buku');?>">
      <div class="form-row">
      <?php
            foreach($d_buku->result() as $fd_buku){
              $id_buku = $fd_buku->id_buku;
              $judul_buku = $fd_buku->judul_buku;
              $penerbit = $fd_buku->penerbit;
              $pengarang = $fd_buku->pengarang;
          }

        ?>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID BUKU</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="id_buku"  value="<?=$id_buku;?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">JUDUL BUKU</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="judul_buku" value="<?=$judul_buku?>" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">PENERBIT</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="penerbit" value="<?=$penerbit?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">PENGARANG</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="pengarang" value="<?=$pengarang?>">
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                        <a href="<?=base_url();?>buku">
                        <button type="button" class="btn btn-secondary">Cancel</button>
                        </a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                </div>
    </form>
    </div>