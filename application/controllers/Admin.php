<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model('admin_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
	public function login()
	{
		$this->load->view('login_admin');
	}
	public function register()
	{
		$this->load->view('register_admin');
	}

	public function proses_admin()
    {
        
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('admin/login'); 
        
        } else {

            $username = htmlspecialchars($this->input->post('username'));
            $pass = htmlspecialchars($this->input->post('password'));

            // CEK KE DATABASE BERDASARKAN EMAIL
            $cek_login = $this->admin_model->cek_login($username); 
                
            if($cek_login == FALSE)
            {
                echo '<script>alert("Username yang Anda masukan salah.");window.location.href="'.base_url('admin/login').'";</script>';
            
            } else {
            
                if(password_verify($pass, $cek_login->password)){
                    // if the username and password is a match
                    $this->session->set_userdata('id', $cek_login->id);
					$this->session->set_userdata('nama', $cek_login->nama);
                    $this->session->set_userdata('username', $cek_login->username);
                    $this->session->set_userdata('level', $cek_login->level);
                    
                    redirect('welcome');
                        
                } else {
                    echo '<script>alert("Username atau Password yang Anda masukan salah.");window.location.href="'.base_url('admin/login').'";</script>';
                }
            }
        }
    }
	public function proses_register(){

		$this->load->library('form_validation');
		$this->load->library('session');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        
        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('admin/register');
        } else {
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $data = [
				'nama' => $nama,
                'username' => $username,
				'password' => $pass,
				'level' => '1'
            ];
            $insert = $this->admin_model->register("admin", $data);
            if($insert){
                echo '<script>alert("Sukses! Anda berhasil melakukan register. Silahkan login untuk mengakses data.");window.location.href="'.base_url('admin/login').'";</script>';
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        echo '<script>alert("Sukses! Anda berhasil logout."); window.location.href="'.base_url('admin/login').'";
        </script>';
    }
	
}
