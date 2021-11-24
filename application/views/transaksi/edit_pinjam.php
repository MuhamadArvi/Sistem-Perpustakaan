<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Edit Pinjam Buku</h1>
            <ol class="breadcrumb">
                <li><a href="<?=base_url();?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?=base_url();?>pinjam"><i class="fa fa-tables"></i> Pinjam Buku</a></li>
                <li class="active"><i class="fa fa-table"></i> Input Pinjam Buku</li>
            </ol>
          </div>
          </div><!-- /.row -->
 <div class="card-body">
    <form method="post" action="<?=base_url('pinjam/proses_edit_pinjam');?>">
      <div class="form-row">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID PINJAM</label>
                    <?php
                        foreach($d_pinjam_h->result() as $fd_pinjam_h){
                           $id_pinjam = $fd_pinjam_h->id_pinjam;
                           $id_anggota= $fd_pinjam_h->id_anggota;
                           $tanggal_pinjam = $fd_pinjam_h->tanggal_pinjam;
                           $tanggal_kembali = $fd_pinjam_h->tanggal_kembali;
                        }

                    ?>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="id_pinjam" value="<?=$id_pinjam;?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID ANGGOTA</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="id_anggota" value="<?=$id_anggota;?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">TANGGAL PINJAM</label>
                    <div class="col-sm-5">
                    <input type="date" class="form-control" name="tanggal_pinjam" value="<?=$tanggal_pinjam;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">TANGGAL KEMBALI</label>
                    <div class="col-sm-5">
                    <input type="date" class="form-control" name="tanggal_kembali" value="<?=$tanggal_kembali;?>">
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
                            <?=$fd_buku->id_buku;?> - <?=$fd_buku->judul_buku;?>
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
                      <?php
                          $no = 0;
                          foreach($d_pinjam_d->result() as $fd_pinjam_d){
                          if($fd_pinjam_d->id_pinjam == $id_pinjam){
                          $no++;
                          ?>
                        <tr>
                          <td><?=$no;?></td>
                          <td><?=$fd_pinjam_d->id_buku;?></td>
                          <td><?=$fd_pinjam_d->judul_buku;?></td>
                          <td><a href="<?=base_url('pinjam/edit_detail/'.$fd_pinjam_d->id_detail);?>"><i class="fa fa-edit"></i> Edit </a>
                              <a href="<?=base_url('pinjam/delete_detail/'.$fd_pinjam_d->id_detail);?>"><i class="fa fa-eraser"></i> Delete </a>
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

    
