<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Laporan Pengembalian</h1>
            <ol class="breadcrumb">
                <li><a href="<?=base_url();?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-table"></i> Laporan Pengembalian</li>
            </ol>
            <a href="<?=base_url('pengembalian/input_laporan');?>"> <button class="btn btn-primary" type="submit">ADD NEW </button></a>
            <a href="<?=base_url('laporanfpdf/pengembalian');?>">
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
            <th> ID PENGEMBALIAN <i class="fa fa-sort"></i></th>
            <th>ID PINJAM <i class="fa fa-sort"></i></th>
            <th>NAMA <i class="fa fa-sort"></i></th>
            <th>JUDUL BUKU <i class="fa fa-sort"></i></th>
            <th>TANGGAL KEMBALI <i class="fa fa-sort"></i></th>
            <th>Aksi <i class="fa fa-sort"></i></th>
          </tr>
        </thead>
        <tbody>
        <?php
            $no = 0;
            foreach ($d_lapor_pengembalian->result() as $fd_lapor) {
                        $no++;
            ?>
          <tr>
            <td><?=$no;?></td>
            <td><?=$fd_lapor->id_pengembalian;?></td>
            <td><?=$fd_lapor->id_pinjam;?></td>
            <td><?=$fd_lapor->nama;?></td>
            <td><?=$fd_lapor->judul_buku;?></td>
            <td><?=$fd_lapor->tanggal;?></td>
            <td><a href="<?=base_url('pengembalian/edit_laporan_pengembalian/'.$fd_lapor->id_laporan_pengembalian);?>"><i class="fa fa-edit"></i> Edit </a>
                <a href="<?=base_url('pengembalian/delete_laporan/'.$fd_lapor->id_laporan_pengembalian);?>"><i class="fa fa-eraser"></i> Delete </a>
            </td>
          </tr>
          <?php
            }
            ?>
        </tbody>
      </table>
    </div>
  </div>