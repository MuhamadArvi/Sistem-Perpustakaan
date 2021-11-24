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
    <form method="post" action="<?=base_url('pengadaan/proses_edit_pengadaan');?>">
      <div class="form-row">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID PINJAM</label>
                    <?php
                        foreach($d_pengadaan_h->result() as $fd_pengadaan_h){
                           $id_pengadaan = $fd_pengadaan_h->id_pengadaan;
                           $id_admin= $fd_pengadaan_h->id_admin;
                           $tanggal_pengadaan = $fd_pengadaan_h->tanggal_pengadaan;
                        }

                    ?>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="id_pengadaan" value="<?=$id_pengadaan;?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID ADMIN</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="id_admin" value="<?=$id_admin;?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">TANGGAL PENGADAAN</label>
                    <div class="col-sm-5">
                    <input type="date" class="form-control" name="tanggal_pengadaan" value="<?=$tanggal_pengadaan;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">JUDUL BUKU</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="judul_buku">
                    </div> 
                </div>      
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">PENERBIT</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="penerbit">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">PENGARANG</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="pengarang">
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
                          <th>Judul Buku <i class="fa fa-sort"></i></th>
                          <th>Penerbit <i class="fa fa-sort"></i></th>
                          <th>Pengarang <i class="fa fa-sort"></i></th>
                          <th>Aksi <i class="fa fa-sort"></i></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $no = 0;
                          foreach($d_pengadaan_d->result() as $fd_pengadaan_d){
                          if($fd_pengadaan_d->id_pengadaan == $id_pengadaan){
                          $no++;
                          ?>
                        <tr>
                          <td><?=$no;?></td>
                          <td><?=$fd_pengadaan_d->judul_buku;?></td>
                          <td><?=$fd_pengadaan_d->penerbit;?></td>
                          <td><?=$fd_pengadaan_d->pengarang;?></td>
                          <td><a href="<?=base_url('pengadaan/edit_detail/'.$fd_pengadaan_d->id_detail);?>"><i class="fa fa-edit"></i> Edit </a>
                              <a href="<?=base_url('pengadaan/delete_detail/'.$fd_pengadaan_d->id_detail);?>"><i class="fa fa-eraser"></i> Delete </a>
                          </td>
                        </tr>
                        <?php
                          }
                          }
                          ?>
                      </tbody>
                    </table>

                  </div>
                  </div>
                  </div>

    
