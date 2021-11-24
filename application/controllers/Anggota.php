<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function index()
	{
		$this->db->join('siswa','siswa.nisn = anggota.nisn');
		$send['d_anggota'] = $this->db->get('anggota');

        $send['page'] = 'anggota/data_anggota';
		$this->load->view('welcome_message',$send);
	}
	public function edit_anggota($id_anggota=0)
	{
		$this->db->where('id_anggota',$id_anggota);
		$this->db->join('siswa','siswa.nisn = anggota.nisn');
		$send['d_anggota'] = $this->db->get('anggota');

		$send['page'] = 'anggota/edit_anggota';
		$this->load->view('welcome_message',$send);
	}
	public function proses_edit_anggota($id_anggota=0)
	{
		$id_anggota = $this->input->post('id_anggota');
		$data_anggota = array(
			'nisn' => $this->input->post('nisn'),
			'nama' => $this->input->post('nama'),
            'kelas' => $this->input->post('kelas'),
		);
		$this->db->where('id_anggota',$id_anggota);
		$this->db->update('anggota',$data_anggota);
		return redirect(base_url('anggota'));
	}
	public function delete_anggota($id_anggota=0)
	{
		$this->db->where('id_anggota',$id_anggota);
        $this->db->delete('anggota');
        return redirect(base_url('anggota'));
	}
}
