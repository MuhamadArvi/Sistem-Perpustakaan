<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Edit Anggota</h1>
            <ol class="breadcrumb">
                <li><a href="<?=base_url();?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-table"></i> Edit Anggota</li>
            </ol>
          </div>
          </div><!-- /.row -->
 <div class="card-body">
    <form method="post" action="<?=base_url('anggota/proses_edit_anggota');?>">
      <div class="form-row">
      <?php
            foreach($d_anggota->result() as $fd_anggota){
              $id_anggota = $fd_anggota->id_anggota;
              $nisn = $fd_anggota->nisn;
              $nama = $fd_anggota->nama;
              $kelas = $fd_anggota->kelas;
          }

        ?>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID ANGGOTA</label>
                    <div class="col-sm-3">
                    <input type="text" class="form-control" name="id_anggota"  value="<?=$id_anggota;?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NISN</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="nisn" value="<?=$nisn?>" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NAMA</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama" value="<?=$nama?>">
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
                <div class="modal-footer">
                        <a href="<?=base_url();?>anggota">
                        <button type="button" class="btn btn-secondary">Cancel</button>
                        </a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                </div>
    </form>
    </div>