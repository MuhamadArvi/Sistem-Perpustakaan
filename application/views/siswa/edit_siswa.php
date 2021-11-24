<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Edit Siswa</h1>
            <ol class="breadcrumb">
                <li><a href="<?=base_url();?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-table"></i> Edit Siswa</li>
            </ol>
          </div>
          </div><!-- /.row -->
 <div class="card-body">
    <form method="post" action="<?=base_url('siswa/proses_edit_siswa');?>">
      <div class="form-row">
      <?php
            foreach($d_siswa->result() as $fd_siswa){
              $nisn = $fd_siswa->nisn;
              $nama_siswa = $fd_siswa->nama_siswa;
              $jenis_kelamin = $fd_siswa->jenis_kelamin;
              $kelas = $fd_siswa->kelas;
              $email = $fd_siswa->email;
              $no_hp = $fd_siswa->no_hp;
          }

        ?>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NISN</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="nisn" value="<?=$nisn;?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NAMA</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama_siswa" value="<?=$nama_siswa;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">JENIS KELAMIN</label>
                    <div class="col-sm-5">
                    <select name="jenis_kelamin" class="form-control" value="<?=$jenis_kelamin;?>">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">KELAS</label>
                    <div class="col-sm-5">
                    <select class="form-control" name="kelas" value="<?=$kelas;?>">
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
                    <input type="email" class="form-control" name="email" value="<?=$email;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NO HP</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="no_hp" value="<?=$no_hp;?>">
                    </div>
                </div>
                </div>
                </div>
                <div class="modal-footer">
                        <a href="<?=base_url();?>siswa">
                        <button type="button" class="btn btn-secondary">Cancel</button>
                        </a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                </div>
    </form>
    </div>