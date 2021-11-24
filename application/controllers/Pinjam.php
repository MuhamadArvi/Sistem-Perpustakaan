<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam extends CI_Controller {
	public function index()
	{
        $this->db->join('anggota','anggota.id_anggota = t_pinjam_h.id_anggota');
		$send['d_pinjam_h'] = $this->db->get('t_pinjam_h');

        $send['page'] = 'transaksi/transaksi_pinjam';
		$this->load->view('welcome_message',$send);
	}
    public function input_pinjam()
    {
        $this->db->where('kode',1);
        $send['d_buku'] = $this->db->get('buku');

        $this->db->where('level',2);
        $send['d_anggota'] = $this->db->get('anggota');

        $send['d_pinjam_h'] = $this->db->get('t_pinjam_h');

        $this->db->limit(1);
		$this->db->order_by('id_pinjam','desc');
		$send['d_pinjam_id'] = $this->db->get('t_pinjam_h'); 

        $send['page'] = 'transaksi/input_pinjam';
        $this->load->view('welcome_message',$send);

    }
    public function proses_input_pinjam(){
        $data_pinjam_h = array(
            'id_pinjam' => $this->input->post('id_pinjam'),
			'id_anggota' => $this->input->post('id_anggota'),
			'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
            'tanggal_kembali' => $this->input->post('tanggal_kembali')
        );
        $data_pinjam_d = array(
            'id_detail' => '',
			'id_pinjam' => $this->input->post('id_pinjam'),
			'id_buku' => $this->input->post('id_buku'),
			'judul_buku' => $this->input->post('judul_buku')
        );		
        $this->db->insert('t_pinjam_h',$data_pinjam_h);
		if($this->input->post('s_save') == 'SIMPAN'){
			$this->db->insert('t_pinjam_d',$data_pinjam_d);
			return redirect(base_url('pinjam'));
		}else{
			$this->proses_edit_pinjam();
		}
    }
    public function edit_pinjam($id_pinjam=0)
    {
        $this->db->where('kode',1);
        $send['d_buku'] = $this->db->get('buku');

        $this->db->where('level',2);
        $send['d_anggota'] = $this->db->get('anggota');

        $this->db->where('id_pinjam',$id_pinjam);
        $send['d_pinjam_h'] = $this->db->get('t_pinjam_h');

        $this->db->join('buku','buku.id_buku = t_pinjam_d.id_buku');
        $send['d_pinjam_d'] = $this->db->get('t_pinjam_d');

        $send['page'] = 'transaksi/edit_pinjam';
        $this->load->view('welcome_message',$send);
    }
    public function proses_edit_pinjam()
    {
        $id_pinjam = $this->input->post('id_pinjam');
        $data_pinjam_h = array(
			'id_anggota' => $this->input->post('id_anggota'),
			'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
            'tanggal_kembali' => $this->input->post('tanggal_kembali')
        );
        $this->db->where('id_pinjam',$id_pinjam);
		$this->db->update('t_pinjam_h',$data_pinjam_h);

        $data_pinjam_d = array(
            'id_detail' => '',
            'id_pinjam' => $id_pinjam,
			'id_buku' => $this->input->post('id_buku'),
			'judul_buku' => $this->input->post('judul_buku'),
        );
        $this->db->insert('t_pinjam_d',$data_pinjam_d);
		return redirect(base_url('pinjam/edit_pinjam/'.$id_pinjam));
    }        
    
    public function delete_pinjam($id_pinjam)
	{
	    $this->db->where('id_pinjam',$id_pinjam);
        $this->db->delete('t_pinjam_h');
        
        $this->db->where('id_pinjam',$id_pinjam);
        $this->db->delete('t_pinjam_d');
        return redirect(base_url('pinjam'));
	}
    public function tampil_laporan(){
        $this->db->join('anggota','anggota.id_anggota = laporan_pinjam.id_anggota');
        $this->db->join('t_pinjam_h','t_pinjam_h.id_pinjam = laporan_pinjam.id_pinjam');
        $send['d_laporan'] = $this->db->get('laporan_pinjam');

        $send['page'] = 'laporan/laporan_pinjaman';
        $this->load->view('welcome_message',$send);
    }

    public function input_laporan(){
        $this->db->where('kode',1);
        $send['d_buku'] = $this->db->get('buku');

        $this->db->where('level',2);
        $send['d_anggota'] = $this->db->get('anggota');

        $send['d_pinjam_h'] = $this->db->get('t_pinjam_h');

        $send['page'] = 'laporan/input_laporan_pinjam';
        $this->load->view('welcome_message',$send);
    }
    public function proses_input_laporan(){
        $data_laporan = array(
			'id_laporan' =>'',
            'id_pinjam' => $this->input->post('id_pinjam'),
            'id_anggota' => $this->input->post('id_anggota'),
            'nama' => $this->input->post('nama'),
			'judul_buku' => $this->input->post('judul_buku'),
			'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
            'tanggal_kembali' => $this->input->post('tanggal_kembali')
		);
		$this->db->insert('laporan_pinjam',$data_laporan);
		return redirect(base_url('pinjam/tampil_laporan'));
    }
    public function edit_laporan($id_laporan=0){
        $this->db->where('kode',1);
        $send['d_buku'] = $this->db->get('buku');

        $this->db->where('level',2);
        $send['d_anggota'] = $this->db->get('anggota');

        $send['d_pinjam_h'] = $this->db->get('t_pinjam_h');

        $this->db->where('id_laporan',$id_laporan);
        $send['d_laporan'] = $this->db->get('laporan_pinjam');

        $send['id_laporan'] = $id_laporan;
        $send['page'] = 'laporan/edit_laporan_pinjam';
        $this->load->view('welcome_message',$send);
    }

    public function proses_edit_laporan($id_laporan=0){
        $data_laporan = array(
            'id_pinjam' => $this->input->post('id_pinjam'),
            'id_anggota' => $this->input->post('id_anggota'),
            'nama' => $this->input->post('nama'),
			'judul_buku' => $this->input->post('judul_buku'),
			'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
            'tanggal_kembali' => $this->input->post('tanggal_kembali')
		);
        $this->db->where('id_laporan',$id_laporan);
		$this->db->update('laporan_pinjam',$data_laporan);
        return redirect(base_url('pinjam/tampil_laporan'));
    }

    public function delete_laporan($id_laporan=0)
	{
	    $this->db->where('id_laporan',$id_laporan);
        $this->db->delete('laporan_pinjam');
        return redirect(base_url('pinjam/tampil_laporan'));
	}
    public function edit_detail($id_detail=0)
    {
        $this->db->where('kode',1);
        $send['d_buku'] = $this->db->get('buku');

        $send['d_pinjam_h'] = $this->db->get('t_pinjam_h');

        $send['id_detail'] = $id_detail;
        $send['d_pinjam_d'] = $this->db->get('t_pinjam_d');
        
        $send['page'] = 'transaksi/edit_detail_pinjam';
        $this->load->view('welcome_message',$send);
    }
    public function proses_edit_detail($id_detail=0){
        $id_pinjam = $this->input->post('id_pinjam');
        $data_pinjam_d = array(
			'id_buku' => $this->input->post('id_buku'),
			'judul_buku' => $this->input->post('judul_buku')
        );
        $this->db->where('id_detail',$id_detail);
        $this->db->update('t_pinjam_d',$data_pinjam_d);
		return redirect(base_url('pinjam/edit_pinjam/'.$id_pinjam));
    }
    public function delete_detail($id_detail=0){
        $this->db->where('id_detail',$id_detail);
        $this->db->delete('t_pinjam_d');
        return redirect(base_url('pinjam'));
    }
}