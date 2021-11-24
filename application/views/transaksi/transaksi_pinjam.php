<div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Pinjam Buku</h1>
            <ol class="breadcrumb">
                <li><a href="<?=base_url();?>welcome"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-table"></i> Pinjam Buku</li>
            </ol>
            <?php if($this->session->userdata('level')==='1'):?>
            <a href="<?=base_url('pinjam/input_pinjam');?>"> <button class="btn btn-primary" type="submit">ADD NEW </button></a>
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
            <th>ID PINJAM<i class="fa fa-sort"></i></th>
            <th>ID ANGGOTA <i class="fa fa-sort"></i></th>
            <th>TANGGAL PINJAM <i class="fa fa-sort"></i></th>
            <th>TANGGAL KEMBALI <i class="fa fa-sort"></i></th>
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
            foreach ($d_pinjam_h->result() as $fd_pinjam) {
                        $no++;
            ?>
          <tr>
            <td><?=$no;?></td>
            <td><?=$fd_pinjam->id_pinjam;?></td>
            <td><?=$fd_pinjam->id_anggota;?></td>
            <td><?=$fd_pinjam->tanggal_pinjam;?></td>
            <td><?=$fd_pinjam->tanggal_kembali;?></td>
            <?php if($this->session->userdata('level')==='1'):?>
            <td><a href="<?=base_url('pinjam/edit_pinjam/'.$fd_pinjam->id_pinjam);?>"><i class="fa fa-edit"></i> Edit </a>
                <a href="<?=base_url('pinjam/delete_pinjam/'.$fd_pinjam->id_pinjam);?>"><i class="fa fa-eraser"></i> Delete </a>
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