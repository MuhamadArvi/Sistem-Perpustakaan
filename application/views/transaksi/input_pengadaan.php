<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Input Pengadaan Buku</h1>
            <ol class="breadcrumb">
                <li><a href="<?=base_url();?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-table"></i> Input Pengadaan Buku</li>
            </ol>
          </div>
          </div><!-- /.row -->
 <div class="card-body">
    <form method="post" action="<?=base_url('pengadaan/proses_input_pengadaan');?>">
      <div class="form-row">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID PENGADAAN</label>
                    <div class="col-sm-3">
                    <?php
                        foreach($d_pengadaan_id->result() as $fd_pengadaan_id){
                            $old_pengadaan_id = $fd_pengadaan_id ->id_pengadaan;
                            $x_pengadaan_id = substr($old_pengadaan_id,3)+1;
                            $new_pengadaan_id = 'IPE'.sprintf('%03d',$x_pengadaan_id);
                        }

                    ?>
                    <input type="text" class="form-control" name="id_pengadaan" value="<?=$new_pengadaan_id?>" readonly> 
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID ADMIN</label>
                    <div class="col-sm-5">
                    <input type="number" class="form-control" name="id_admin">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">TANGGAL PENGADAAN</label>
                    <div class="col-sm-5">
                    <input type="date" class="form-control" name="tanggal_pengadaan">
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
                          <th>ID BUKU <i class="fa fa-sort"></i></th>
                          <th>Judul Buku <i class="fa fa-sort"></i></th>
                          <th>Penerbit <i class="fa fa-sort"></i></th>
                          <th>Pengarang <i class="fa fa-sort"></i></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>&nbsp;</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                  </div>
                  </div>

    
