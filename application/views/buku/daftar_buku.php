  <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Daftar Buku</h1>
            <ol class="breadcrumb">
                <li><a href="<?=base_url();?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-table"></i> Daftar Buku</li>
            </ol>
            <?php if($this->session->userdata('level')==='1'):?>
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                ADD NEW
            </button>
            <?php elseif($this->session->userdata('level')==='2'):?>
            <th>&nbsp;</th>
              <?php else:?>
            <th>&nbsp;</th>
            <?php endif;?>

          </div>
          </div><!-- /.row -->
          <br/>

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
            <?php if($this->session->userdata('level')==='1'):?>
            <th>Aksi <i class="fa fa-sort"></i></th>
            <?php elseif($this->session->userdata('level')==='2'):?>
            <th>&nbsp;</th>
              <?php else:?>
            <th>&nbsp;</th>
            <?php endif;?>
          </tr>
        </thead>
        <tbody>
        <?php
            $no = 0;
            foreach ($d_buku->result() as $fd_buku) {
                        $no++;
            ?>
          <tr>
            <td><?=$no;?></td>
            <td><?=$fd_buku->id_buku;?></td>
            <td><?=$fd_buku->judul_buku;?></td>
            <td><?=$fd_buku->penerbit;?></td>
            <td><?=$fd_buku->pengarang;?></td>
            <?php if($this->session->userdata('level')==='1'):?>
            <td><a href="<?=base_url('buku/edit_buku/'.$fd_buku->id_buku);?>"><i class="fa fa-edit"></i> Edit </a>
                <a href="<?=base_url('buku/delete_buku/'.$fd_buku->id_buku);?>"><i class="fa fa-eraser"></i> Delete </a>
            </td>
            <?php elseif($this->session->userdata('level')==='2'):?>
            <th>&nbsp;</th>
              <?php else:?>
            <th>&nbsp;</th>
            <?php endif;?>
          </tr>
          <?php
            }
            ?>
        </tbody>
      </table>
    </div>

    </div>
  </div>

  <!--Input buku-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Add Data Buku</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-light">
      <?php
            echo form_open_multipart('buku/proses_input_buku');

        ?>
        ...     
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID BUKU</label>
                    <div class="col-sm-3">
                    <?php
                        foreach($d_buku_id->result() as $fd_buku){
                            $old_buku_id = $fd_buku ->id_buku;
                            $x_buku_id = substr($old_buku_id,3)+1;
                            $new_buku_id = 'BK'.sprintf('%03d',$x_buku_id);
                        }

                    ?>
                    <input type="text" class="form-control" name="id_buku" value="<?=$new_buku_id?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">JUDUL BUKU</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="judul_buku" >
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        <?php echo form_close()?>
      </div>
    </div>
  </div>
</div>
