<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Data Siswa</h1>
            <ol class="breadcrumb">
                <li><a href="<?=base_url();?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-table"></i> Data Siswa</li>
            </ol>
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                ADD NEW
            </button>

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
            <th>NISN <i class="fa fa-sort"></i></th>
            <th>NAMA <i class="fa fa-sort"></i></th>
            <th>JENIS KELAMIN <i class="fa fa-sort"></i></th>
            <th>KELAS <i class="fa fa-sort"></i></th>
            <th>EMAIL <i class="fa fa-sort"></i></th>
            <th>NO HP <i class="fa fa-sort"></i></th>
            <th>Aksi <i class="fa fa-sort"></i></th>
          </tr>
        </thead>
        <tbody>
        <?php
            $no = 0;
            foreach ($d_siswa->result() as $fd_siswa) {
                        $no++;
            ?>
          <tr>
            <td><?=$no;?></td>
            <td><?=$fd_siswa->nisn;?></td>
            <td><?=$fd_siswa->nama_siswa;?></td>
            <td><?=$fd_siswa->jenis_kelamin;?></td>
            <td><?=$fd_siswa->kelas;?></td>
            <td><?=$fd_siswa->email;?></td>
            <td><?=$fd_siswa->no_hp;?></td>
            <td><a href="<?=base_url('siswa/edit_siswa/'.$fd_siswa->nisn);?>"><i class="fa fa-edit"></i> Edit </a>
                <a href="<?=base_url('siswa/delete_siswa/'.$fd_siswa->nisn);?>"><i class="fa fa-eraser"></i> Delete </a>
            </td>
          </tr>
          <?php
            }
            ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Add Data Siswa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-light">
      <?php
            echo form_open_multipart('siswa/proses_input_siswa');

        ?>
        ...     
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NISN</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="nisn">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NAMA</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama_siswa" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">JENIS KELAMIN</label>
                    <div class="col-sm-5">
                    <select name="jenis_kelamin" class="form-control">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">KELAS</label>
                    <div class="col-sm-5">
                    <select class="form-control" name="kelas">
                    <option value="">Choose Your Class</option>
                    <option value="X-IPA">X-IPA</option>
                    <option value="X-IPS">X-IPS</option>
                    <option value="XI-IPA">XI-IPA</option>
                    <option value="XI-IPS">XI-IPS</option>
                    <option value="XII-IPA">XII-IPA</option>
                    <option value="XII-IPS">XII-IPS</option>
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">EMAIL</label>
                    <div class="col-sm-5">
                    <input type="email" class="form-control" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NO HP</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="no_hp">
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