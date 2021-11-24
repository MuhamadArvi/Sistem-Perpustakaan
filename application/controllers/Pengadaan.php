<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengadaan extends CI_Controller {
	public function index()
	{
		$this->db->join('admin ','admin.id_admin = t_pengadaan_h.id_admin');
		$send['d_pengadaan'] = $this->db->get('t_pengadaan_h');

                $send['page'] = 'transaksi/transaksi_pengadaan';
		$this->load->view('welcome_message',$send);
	}
        public function input_pengadaan()
        {

                $this->db->limit(1);
                $this->db->order_by('id_pengadaan','desc');
                $send['d_pengadaan_id'] = $this->db->get('t_pengadaan_h'); 
        
                $send['page'] = 'transaksi/input_pengadaan';
                $this->load->view('welcome_message',$send);
        }
        public function proses_input_pengadaan(){
        $data_pengadaan_h = array(
                'id_pengadaan' => $this->input->post('id_pengadaan'),
                'id_admin' => $this->input->post('id_admin'),
                'tanggal_pengadaan' => $this->input->post('tanggal_pengadaan'),
        );
        $data_pengadaan_d = array(
                'id_detail' => '',
                'id_pengadaan' => $this->input->post('id_pengadaan'),
                'judul_buku' => $this->input->post('judul_buku'),
                'penerbit' => $this->input->post('penerbit'),
                'pengarang' => $this->input->post('pengarang'),
        );		
        $this->db->insert('t_pengadaan_h',$data_pengadaan_h);
		if($this->input->post('s_save') == 'SIMPAN'){
			$this->db->insert('t_pengadaan_d',$data_pengadaan_d);
			return redirect(base_url('pengadaan'));
		}else{
			$this->proses_edit_pengadaan();
		}
        }    
        
        public function edit_pengadaan($id_pengadaan=0)
        {
            $this->db->where('kode',1);
            $send['d_buku'] = $this->db->get('buku');
    
            $this->db->where('id_pengadaan',$id_pengadaan);
            $this->db->join('admin','admin.id_admin = t_pengadaan_h.id_admin');
            $send['d_pengadaan_h'] = $this->db->get('t_pengadaan_h');
    
            $send['d_pengadaan_d'] = $this->db->get('t_pengadaan_d');
    
            $send['page'] = 'transaksi/edit_pengadaan';
            $this->load->view('welcome_message',$send);
        }
        public function proses_edit_pengadaan($id_pengadaan=0)
        {
            $id_pengadaan = $this->input->post('id_pengadaan');
            $data_pengadaan_h = array(
                'id_pengadaan' => $this->input->post('id_pengadaan'),
                'id_admin' => $this->input->post('id_admin'),
                'tanggal_pengadaan' => $this->input->post('tanggal_pengadaan'),
        );
            $this->db->where('id_pengadaan',$id_pengadaan);
            $this->db->update('t_pengadaan_h',$data_pengadaan_h);
            $data_pengadaan_d = array(
                'id_detail' => '',
                'id_pengadaan' => $id_pengadaan,
                'judul_buku' => $this->input->post('judul_buku'),
                'penerbit' => $this->input->post('penerbit'),
                'pengarang' => $this->input->post('pengarang'),
        );
            $this->db->insert('t_pengadaan_d',$data_pengadaan_d);
            return redirect(base_url('pengadaan/edit_pengadaan/'.$id_pengadaan));
        }
        
        public function delete_pengadaan($id_pengadaan)
	{
	$this->db->where('id_pengadaan',$id_pengadaan);
        $this->db->delete('t_pengadaan_h');
        
        $this->db->where('id_pengadaan',$id_pengadaan);
        $this->db->delete('t_pengadaan_d');
        return redirect(base_url('pengadaan'));
	}

        public function tampil_pengadaan()
        {
                
                $send['d_lapor_pengadaan'] = $this->db->get('laporan_pengadaan');

                $send['page'] = 'laporan/laporan_pengadaan';
                $this->load->view('welcome_message',$send);
        }

        public function input_laporan(){

                $this->db->where('kode',1);
                $send['d_buku'] = $this->db->get('buku');

                $send['d_admin'] = $this->db->get('admin');

                $send['d_pengadaan_h'] = $this->db->get('t_pengadaan_h');

                
                $send['d_lapor_pengadaan'] = $this->db->get('laporan_pengadaan');

                $send['page'] = 'laporan/input_laporan_pengadaan';
                $this->load->view('welcome_message',$send);
        }

        public function proses_input_laporan(){
                $data_laporan_pengadaan = array(
                        'id_laporan_pengadaan' => '',
                        'id_pengadaan' => $this->input->post('id_pengadaan'),
                        'nama' => $this->input->post('nama'),
                        'id_buku' => $this->input->post('id_buku'),
                        'judul_buku' => $this->input->post('judul_buku'),
                        'penerbit' => $this->input->post('penerbit'),
                        'pengarang' => $this->input->post('pengarang')
                );
                $this->db->insert('laporan_pengadaan',$data_laporan_pengadaan);
		return redirect(base_url('pengadaan/tampil_pengadaan'));
        }
        
        public function edit_laporan($id_laporan_pengadaan=0){
                $this->db->where('kode',1);
                $send['d_buku'] = $this->db->get('buku');
        
                $send['d_admin'] = $this->db->get('admin');

                $send['d_pengadaan_h'] = $this->db->get('t_pengadaan_h');

                $send['d_pinjam_h'] = $this->db->get('t_pinjam_h');
        
                $this->db->join('buku','buku.id_buku=laporan_pengadaan.id_buku');
                $this->db->join('t_pengadaan_h','t_pengadaan_h.id_pengadaan = laporan_pengadaan.id_pengadaan');
                $send['d_lapor_pengadaan'] = $this->db->get('laporan_pengadaan');
        
                $send['id_laporan_pengadaan'] = $id_laporan_pengadaan;
                $send['page'] = 'laporan/edit_laporan_pengadaan';
                $this->load->view('welcome_message',$send);
        }
        public function proses_edit_laporan($id_laporan_pengadaan=0){
                $data_laporan_pengadaan = array(
                        'id_pengadaan' => $this->input->post('id_pengadaan'),
                        'nama' => $this->input->post('nama'),
                        'id_buku' => $this->input->post('id_buku'),
                        'judul_buku' => $this->input->post('judul_buku'),
                        'penerbit' => $this->input->post('penerbit'),
                        'pengarang' => $this->input->post('pengarang')
                );
                $this->db->where('id_laporan_pengadaan',$id_laporan_pengadaan);
		$this->db->update('laporan_pengadaan',$data_laporan_pengadaan);
		return redirect(base_url('pengadaan/tampil_pengadaan'));
        }
        public function delete_laporan($id_laporan_pengadaan=0)
	{
	        $this->db->where('id_laporan_pengadaan',$id_laporan_pengadaan);
                $this->db->delete('laporan_pengadaan');
                return redirect(base_url('pengadaan/tampil_pengadaan'));
	}
        public function edit_detail($id_detail=0){
                $this->db->where('kode',1);
                $send['d_buku'] = $this->db->get('buku');
                
                $send['d_pengadaan_h'] = $this->db->get('t_pengadaan_h');
        
                $send['id_detail'] = $id_detail;
                $send['d_pengadaan_d'] = $this->db->get('t_pengadaan_d');
        
                $send['page'] = 'transaksi/edit_detail_pengadaan';
                $this->load->view('welcome_message',$send);
        }
        public function proses_edit_detail($id_detail=0){
                $id_pengadaan = $this->input->post('id_pengadaan');
                $data_pengadaan_d = array(
                        'judul_buku' => $this->input->post('judul_buku'),
                        'penerbit' => $this->input->post('penerbit'),
                        'pengarang' => $this->input->post('pengarang'),
                );
                    $this->db->where('id_detail',$id_detail);
                    $this->db->update('t_pengadaan_d',$data_pengadaan_d);
                    return redirect(base_url('pengadaan/edit_pengadaan/'.$id_pengadaan));
        }
        public function delete_detail($id_detail=0){
                $this->db->where('id_detail',$id_detail);
                $this->db->delete('t_pengadaan_d');
                return redirect(base_url('pengadaan'));
        }
}