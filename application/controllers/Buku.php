<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function index()
	{

        $this->db->limit(1);
		$this->db->order_by('id_buku','desc');
		$send['d_buku_id'] = $this->db->get('buku');

		$this->db->order_by('id_buku','desc');
		$send['d_buku'] = $this->db->get('buku');
			
        $send['page'] = 'buku/daftar_buku';
		$this->load->view('welcome_message',$send);
	}
    public function input_buku()
    {
        $send['d_buku'] = $this->db->get('buku');

        $send['page'] = 'buku/daftar_buku';
		$this->load->view('welcome_message',$send);
    }
    public function proses_input_buku()
    {
        $data_buku = array(
			'id_buku' => $this->input->post('id_buku'),
			'judul_buku' => $this->input->post('judul_buku'),
			'penerbit' => $this->input->post('penerbit'),
            'pengarang' => $this->input->post('pengarang'),
			'kode' => '1',
		);
		$this->db->insert('buku',$data_buku);
		return redirect(base_url('buku'));
    }
	public function delete_buku($id_buku)
	{
		$this->db->where('id_buku',$id_buku);
        $this->db->delete('buku');
        return redirect(base_url('buku'));
	}
	public function edit_buku($id_buku=0)
	{

		$this->db->where('id_buku',$id_buku);
		$send['d_buku'] = $this->db->get('buku');
		
		$send['page'] = 'buku/edit_buku';
		$this->load->view('welcome_message',$send);
	}
	public function proses_edit_buku(){
        $data_buku = array(
			'id_buku' => $this->input->post('id_buku'),
			'judul_buku' => $this->input->post('judul_buku'),
			'penerbit' => $this->input->post('penerbit'),
            'pengarang' => $this->input->post('pengarang'),
		);

		$this->db->where('id_buku',$this->input->post('id_buku'));
		$this->db->update('buku',$data_buku);
		return redirect(base_url('buku'));
    } 
}
