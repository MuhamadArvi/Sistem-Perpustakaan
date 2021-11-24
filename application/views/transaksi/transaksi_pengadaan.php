<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Pengadaan Buku</h1>
            <ol class="breadcrumb">
                <li><a href="<?=base_url();?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-table"></i> Pengadaan Buku</li>
            </ol>
            <a href="<?=base_url('pengadaan/input_pengadaan');?>"> <button class="btn btn-primary" type="submit">ADD NEW </button></a>
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
            <th>ID PENGADAAN<i class="fa fa-sort"></i></th>
            <th>ID ADMIN <i class="fa fa-sort"></i></th>
            <th>TANGGAL PENGADAAN <i class="fa fa-sort"></i></th>
            <th>Aksi <i class="fa fa-sort"></i></th>
          </tr>
        </thead>
        <tbody>
        <?php
            $no = 0;
            foreach ($d_pengadaan->result() as $fd_pengadaan) {
                        $no++;
            ?>
          <tr>
            <td><?=$no;?></td>
            <td><?=$fd_pengadaan->id_pengadaan;?></td>
            <td><?=$fd_pengadaan->id_admin;?></td>
            <td><?=$fd_pengadaan->tanggal_pengadaan;?></td>
            <td><a href="<?=base_url('pengadaan/edit_pengadaan/'.$fd_pengadaan->id_pengadaan);?>"><i class="fa fa-edit"></i> Edit </a>
                <a href="<?=base_url('pengadaan/delete_pengadaan/'.$fd_pengadaan->id_pengadaan);?>"><i class="fa fa-eraser"></i> Delete </a>
            </td>
          </tr>
          <?php
            }
            ?>
        </tbody>
      </table>
    </div>
  </div>