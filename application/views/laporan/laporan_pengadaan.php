<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Laporan Pengadaan</h1>
            <ol class="breadcrumb">
                <li><a href="<?=base_url();?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-table"></i> Laporan Pengadaan</li>
            </ol>
            <a href="<?=base_url('pengadaan/input_laporan');?>"> <button class="btn btn-primary" type="submit">ADD NEW </button></a>
            <a href="<?=base_url('laporanfpdf');?>">
                <button type="button" class="btn btn-warning"><i class="fa fa-file"></i>Export Pdf</button>
            </a>
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
            <th>ID PENGADAAN  <i class="fa fa-sort"></i></th>
            <th>NAMA ADMIN <i class="fa fa-sort"></i></th>
            <th>ID BUKU  <i class="fa fa-sort"></i></th>
            <th>JUDUL BUKU <i class="fa fa-sort"></i></th>
            <th>PENERBIT <i class="fa fa-sort"></i></th>
            <th>PENGARANG <i class="fa fa-sort"></i></th>
            <th>Aksi <i class="fa fa-sort"></i></th>
          </tr>
        </thead>
        <tbody>
        <?php
            $no = 0;
            foreach ($d_lapor_pengadaan->result() as $fd_laporan_pengadaan) {
                        $no++;
            ?>
          <tr>
            <td><?=$no;?></td>
            <td><?=$fd_laporan_pengadaan->id_pengadaan;?></td>
            <td><?=$fd_laporan_pengadaan->nama;?></td>
            <td><?=$fd_laporan_pengadaan->id_buku;?></td>
            <td><?=$fd_laporan_pengadaan->judul_buku;?></td>
            <td><?=$fd_laporan_pengadaan->penerbit;?></td>
            <td><?=$fd_laporan_pengadaan->pengarang;?></td>
            <td><a href="<?=base_url('pengadaan/edit_laporan/'.$fd_laporan_pengadaan->id_laporan_pengadaan);?>"><i class="fa fa-edit"></i> Edit </a>
                <a href="<?=base_url('pengadaan/delete_laporan/'.$fd_laporan_pengadaan->id_laporan_pengadaan);?>"><i class="fa fa-eraser"></i> Delete </a>
            </td>
          </tr>
          <?php
            }
            ?>
        </tbody>
      </table>
    </div>
  </div>