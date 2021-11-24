<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Data Anggota</h1>
            <ol class="breadcrumb">
                <li><a href="<?=base_url();?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-table"></i> Data Anggota</li>
            </ol>
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
            <th>ID ANGGOTA <i class="fa fa-sort"></i></th>
            <th>NISN <i class="fa fa-sort"></i></th>
            <th>NAMA <i class="fa fa-sort"></i></th>
            <th>KELAS <i class="fa fa-sort"></i></th>
            <th>Aksi <i class="fa fa-sort"></i></th>
          </tr>
        </thead>
        <tbody>
        <?php
            $no = 0;
            foreach ($d_anggota->result() as $fd_anggota) {
                        $no++;
            ?>
          <tr>
            <td><?=$no;?></td>
            <td><?=$fd_anggota->id_anggota;?></td>
            <td><?=$fd_anggota->nisn;?></td>
            <td><?=$fd_anggota->nama;?></td>
            <td><?=$fd_anggota->kelas;?></td>
            <td><a href="<?=base_url('anggota/edit_anggota/'.$fd_anggota->id_anggota);?>"><i class="fa fa-edit"></i> Edit </a>
                <a href="<?=base_url('anggota/delete_anggota/'.$fd_anggota->id_anggota);?>"><i class="fa fa-eraser"></i> Delete </a>
            </td>
          </tr>
          <?php
            }
            ?>
        </tbody>
      </table>
    </div>
  </div>