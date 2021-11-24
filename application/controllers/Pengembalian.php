<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {
	public function index()
	{
        $this->db->where('level',2);
        $send['d_anggota'] = $this->db->get('anggota');

        $this->db->join('t_pinjam_h','t_pinjam_h.id_pinjam = t_pengembalian.id_pinjam');
        $this->db->join('anggota','anggota.id_anggota = t_pengembalian.id_anggota');
        $send['d_pengembalian'] = $this->db->get('t_pengembalian');

        $send['d_pengembalian'] = $this->db->get('t_pengembalian');

        $send['page'] = 'transaksi/transaksi_pengembalian';
        $this->load->view('welcome_message',$send);
	}

        public function input_pengembalian()
        {
        $this->db->where('level',2);
        $send['d_anggota'] = $this->db->get('anggota');
        
        $this->db->limit(1);
        $this->db->order_by('id_pengembalian','desc');
        $send['d_pengembalian_id'] = $this->db->get('t_pengembalian'); 

        $send['d_pinjam_h'] = $this->db->get('t_pinjam_h');

        // $this->db->select('*');
        // $this->db->join('t_pinjam_h','t_pinjam_h.id_pinjam = t_pengembalian.id_pinjam');
        // $this->db->join('anggota','anggota.id_anggota = t_pengembalian.id_anggota');
        $send['d_pengembalian'] = $this->db->get('t_pengembalian');

        $send['page'] = 'transaksi/input_pengembalian';
        $this->load->view('welcome_message',$send);
        }

        public function proses_input_pengembalian(){
        $data_pengembalian = array(
                'id_pengembalian' => $this->input->post('id_pengembalian'),
                'id_pinjam' => $this->input->post('id_pinjam'),
                'id_anggota' => $this->input->post('id_anggota'),
                'tanggal_kembali' => $this->input->post('tanggal_kembali'),
                'keterangan' => $this->input->post('keterangan'),
        );
        $this->db->insert('t_pengembalian',$data_pengembalian);
        return redirect(base_url('pengembalian'));
        }

        public function edit_pengembalian($id_pengembalian=0){
                $this->db->where('level',2);
                $send['d_anggota'] = $this->db->get('anggota');
                
                $this->db->limit(1);
                $this->db->order_by('id_pengembalian','desc');
                $send['d_pengembalian_id'] = $this->db->get('t_pengembalian'); 
        
                $this->db->select('*');
                $this->db->join('t_pinjam_h','t_pinjam_h.id_pinjam = t_pengembalian.id_pinjam');
                $this->db->join('anggota','anggota.id_anggota = t_pengembalian.id_anggota');
                $send['d_pengembalian'] = $this->db->get('t_pengembalian');

                $this->db->where('id_pengembalian',$id_pengembalian);
                $send['d_pengembalian'] = $this->db->get('t_pengembalian');
        
                $send['page'] = 'transaksi/edit_pengembalian';
                $this->load->view('welcome_message',$send);
        }
        public function proses_edit_pengembalian()
        {
                $id_pengembalian = $this->input->post('id_pengembalian');
                $data_pengembalian = array(
                        'id_pengembalian' => $this->input->post('id_pengembalian'),
                        'id_pinjam' => $this->input->post('id_pinjam'),
                        'id_anggota' => $this->input->post('id_anggota'),
                        'tanggal_kembali' => $this->input->post('tanggal_kembali'),
                        'keterangan' => $this->input->post('keterangan'),
                );
            $this->db->where('id_pengembalian',$id_pengembalian);
            $this->db->update('t_pengembalian',$data_pengembalian);
            return redirect(base_url('pengembalian'));
        }
        public function delete_pengembalian($id_pengembalian)
	{
                $this->db->where('id_pengembalian',$id_pengembalian);
                $this->db->delete('t_pengembalian');
                return redirect(base_url('pengembalian'));
	}

        public function tampil_laporan(){
                $send['d_lapor_pengembalian'] = $this->db->get('laporan_pengembalian');
        
                $send['page'] = 'laporan/laporan_pengembalian';
                $this->load->view('welcome_message',$send);
        }

        public function input_laporan(){
                $this->db->where('level',2);
                $send['d_anggota'] = $this->db->get('anggota');
                
                $this->db->where('kode',1);
                $send['d_buku'] = $this->db->get('buku');

                $send['d_pinjam_h'] = $this->db->get('t_pinjam_h');
                $send['d_pengembalian'] = $this->db->get('t_pengembalian');

                $this->db->join('t_pengembalian','t_pengembalian.id_pengembalian = laporan_pengembalian.id_pengembalian');
                $send['d_lapor_pengembalian'] = $this->db->get('laporan_pengembalian');
        
                $send['page'] = 'laporan/input_laporan_pengembalian';
                $this->load->view('welcome_message',$send);
        }

        public function proses_input_laporan(){
                $data_laporan_pengembalian = array(
                        'id_laporan_pengembalian' => '',
                        'id_pengembalian' => $this->input->post('id_pengembalian'),
                        'id_pinjam' => $this->input->post('id_pinjam'),
                        'nama' => $this->input->post('nama'),
                        'judul_buku' => $this->input->post('judul_buku'),
                        'tanggal' => $this->input->post('tanggal'),
                );
                $this->db->insert('laporan_pengembalian',$data_laporan_pengembalian);
		return redirect(base_url('pengembalian/tampil_laporan'));
        }
        
        public function edit_laporan_pengembalian($id_laporan_pengembalian=0){
                $this->db->where('level',2);
                $send['d_anggota'] = $this->db->get('anggota');
                
                $this->db->where('kode',1);
                $send['d_buku'] = $this->db->get('buku');

                $send['d_pinjam_h'] = $this->db->get('t_pinjam_h');
                $send['d_pengembalian'] = $this->db->get('t_pengembalian');

                $this->db->where('id_laporan_pengembalian',$id_laporan_pengembalian);
                $this->db->join('t_pengembalian','t_pengembalian.id_pengembalian = laporan_pengembalian.id_pengembalian');
                $send['d_lapor_pengembalian'] = $this->db->get('laporan_pengembalian');
        
                $send['id_laporan_pengembalian'] = $id_laporan_pengembalian;
                $send['page'] = 'laporan/edit_laporan_pengembalian';
                $this->load->view('welcome_message',$send);
        }

        public function edit_laporan_proses($id_laporan_pengembalian=0){
                $data_laporan_pengembalian = array(
                        'id_pengembalian' => $this->input->post('id_pengembalian'),
                        'id_pinjam' => $this->input->post('id_pinjam'),
                        'nama' => $this->input->post('nama'),
                        'judul_buku' => $this->input->post('judul_buku'),
                        'tanggal' => $this->input->post('tanggal'),
                );
                $this->db->where('id_laporan_pengembalian',$id_laporan_pengembalian);
		$this->db->update('laporan_pengembalian',$data_laporan_pengembalian);
                return redirect(base_url('pengembalian/tampil_laporan'));
        }
        public function delete_laporan($id_laporan_pengembalian=0)
	{
	$this->db->where('id_laporan_pengembalian',$id_laporan_pengembalian);
        $this->db->delete('laporan_pengembalian');
        return redirect(base_url('pengembalian/tampil_laporan'));
	}

}