<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model('auth_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
	public function login()
	{
		$this->load->view('login_view');
	}
	public function register()
	{
		$this->load->view('register');
	}

	public function proses_login()
    {
        
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->form_validation->set_rules('nisn', 'Nisn', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('auth/login'); 
        
        } else {

            $nisn = htmlspecialchars($this->input->post('nisn'));
            $pass = htmlspecialchars($this->input->post('password'));

            // CEK KE DATABASE BERDASARKAN EMAIL
            $cek_login = $this->auth_model->cek_login($nisn); 
                
            if($cek_login == FALSE)
            {
                echo '<script>alert("Username yang Anda masukan salah.");window.location.href="'.base_url('auth/login').'";</script>';
            
            } else {
            
                if(password_verify($pass, $cek_login->password)){
                    // if the username and password is a match
                    $this->session->set_userdata('id', $cek_login->id);
                    $this->session->set_userdata('nisn', $cek_login->nisn);
					$this->session->set_userdata('nama', $cek_login->nama);
					$this->session->set_userdata('kelas', $cek_login->kelas);
                    $this->session->set_userdata('level', $cek_login->level);
                    
                    redirect('welcome');
                        
                } else {
                    echo '<script>alert("Username atau Password yang Anda masukan salah.");window.location.href="'.base_url('auth/login').'";</script>';
                }
            }
        }
    }
	public function proses_register(){

		$this->load->library('form_validation');
		$this->load->library('session');

		$this->form_validation->set_rules('nisn', 'Nisn', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kelas', 'kelas', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        
        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('auth/register');
        } else {
            $nisn = $this->input->post('nisn');
			$nama = $this->input->post('nama');
			$kelas = $this->input->post('kelas');
            $password = $this->input->post('password');
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $data = [
                'nisn' => $nisn,
				'nama' => $nama,
				'kelas' => $kelas,
				'password' => $pass,
				'level' => '2'
            ];
            $insert = $this->auth_model->register("anggota", $data);
            if($insert){
                echo '<script>alert("Sukses! Anda berhasil melakukan register. Silahkan login untuk mengakses data.");window.location.href="'.base_url('auth/login').'";</script>';
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        echo '<script>alert("Sukses! Anda berhasil logout."); window.location.href="'.base_url('auth/login').'";
        </script>';
    }
	
}
