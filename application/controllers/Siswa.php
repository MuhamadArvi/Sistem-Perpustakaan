<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function index()
	{
		$send['d_siswa'] = $this->db->get('siswa');

        $send['page'] = 'siswa/data_siswa';
		$this->load->view('welcome_message',$send);
	}
    public function input_siswa()
    {
		$this->db->select('*');
		$this->db->get('siswa');
		$this->db->limit(1);

		$send['d_siswa'] = $this->db->get('siswa');
	
        $send['page'] = 'siswa/data_siswa';
		$this->load->view('welcome_message',$send);
    }
    public function proses_input_siswa()
    {
        $data_siswa = array(
			'nisn' => $this->input->post('nisn'),
			'nama_siswa' => $this->input->post('nama_siswa'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'kelas' => $this->input->post('kelas'),
			'email' => $this->input->post('email'),
			'no_hp' => $this->input->post('no_hp'),
		);
		$this->db->insert('siswa',$data_siswa);
		return redirect(base_url('siswa'));
    }
	public function edit_siswa($nisn=0)
	{
		$this->db->where('nisn',$nisn);
		$send['d_siswa'] = $this->db->get('siswa');

		$send['page'] = 'siswa/edit_siswa';
		$this->load->view('welcome_message',$send);
	}
	public function proses_edit_siswa($nisn=0)
	{
		$nisn = $this->input->post('nisn');
		$data_siswa = array(
			'nama_siswa' => $this->input->post('nama_siswa'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'kelas' => $this->input->post('kelas'),
			'email' => $this->input->post('email'),
			'no_hp' => $this->input->post('no_hp'),
		);
		$this->db->where('nisn',$nisn);
		$this->db->update('siswa',$data_siswa);
		return redirect(base_url('siswa'));
	}
	public function delete_siswa($nisn=0)
	{
		$this->db->where('nisn',$nisn);
        $this->db->delete('siswa');
        return redirect(base_url('siswa'));
	}
}
