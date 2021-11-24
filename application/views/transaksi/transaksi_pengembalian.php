<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Data Pengembalian Buku</h1>
            <ol class="breadcrumb">
                <li><a href="<?=base_url();?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-table"></i> Pengembalian Buku</li>
            </ol>
            <?php if($this->session->userdata('level')==='1'):?>
            <a href="<?=base_url('pengembalian/input_pengembalian');?>"> <button class="btn btn-primary" type="submit">ADD NEW </button></a>
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
            <th>ID PENGEMBALIAN<i class="fa fa-sort"></i></th>
            <th>ID PINJAM <i class="fa fa-sort"></i></th>
            <th>ID ANGGOTA <i class="fa fa-sort"></i></th>
            <th>TANGGAL KEMBALI <i class="fa fa-sort"></i></th>
            <th>KETERANGAN <i class="fa fa-sort"></i></th>
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
            foreach ($d_pengembalian->result() as $fd_pengembalian) {
                        $no++;
            ?>
          <tr>
            <td><?=$no;?></td>
            <td><?=$fd_pengembalian->id_pengembalian;?></td>
            <td><?=$fd_pengembalian->id_pinjam;?></td>
            <td><?=$fd_pengembalian->id_anggota;?></td>
            <td><?=$fd_pengembalian->tanggal_kembali;?></td>
            <td><?=$fd_pengembalian->keterangan;?></td>
            <?php if($this->session->userdata('level')==='1'):?>
            <td><a href="<?=base_url('pengembalian/edit_pengembalian/'.$fd_pengembalian->id_pengembalian);?>"><i class="fa fa-edit"></i> Edit </a>
            <a href="<?=base_url('pengembalian/delete_pengembalian/'.$fd_pengembalian->id_pengembalian);?>"><i class="fa fa-eraser"></i> Delete </a>
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