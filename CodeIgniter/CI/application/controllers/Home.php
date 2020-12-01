<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->load->helper(array('form', 'url', 'html'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model(array('m_crud'));
    }

	public function index()
	{
		$this->load->view('login');
    }
    
    public function register()
    {
        $this->load->view('register');
    }

    public function registerProcess()
    {
        $this->form_validation->set_rules('username','Username','required',array('required' => 'Username wajib diisi'));
        $this->form_validation->set_rules('email','Email','required|trim|valid_email',array('required' => 'Email wajib diisi', 'valid_email' => 'Email Tidak benar'));
        $this->form_validation->set_rules('password','Password','required|trim',array('required' => 'Password wajib diisi'));
    
        if($this->form_validation->run() != false){

            $username   = $this->input->post('username');
            $email      = $this->input->post('email');
            $password   = $this->input->post('password');
            $password   = password_hash($password, PASSWORD_DEFAULT);

            $data = [
                'username'  => $username,
                'email'     => $email,
                'password'  => $password,
                'role'      => 1002, // 1002 => user biasa, 1001 => admin
            ];

            $this->m_crud->insertUser('tbl_users', $data);
            $this->session->set_flashdata("success_insert_user", "Pendaftar Telah Berhasil");

            redirect('home');
        } else {
            $this->register();
        }
    }

    public function loginProses()
    {
       
        $this->form_validation->set_rules('username','Username','required',array('required' => 'Username wajib diisi'));
        $this->form_validation->set_rules('password','Password','required|trim',array('required' => 'Password wajib diisi'));

        if($this->form_validation->run() != false){

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $where = [ 
                'username'  => $username,
            ];

            $cekQuery = $this->m_crud->loginQuery($where)->row();

            if($cekQuery){
            
                $truePass       = password_verify($password, $cekQuery->password); // (perdi321, $2y$10$D441ITqZSCoDLN95E/YBmuJ8d2FVeNiOEhYo5XUARJsOCC/TSUZH.)
                $roleAccess     = $cekQuery->role;

                if($truePass){

                    $sess_data['id']        = $cekQuery->id;
                    $sess_data['username']  = $cekQuery->username;
                    $sess_data['email']     = $cekQuery->email;
                    $sess_data['role']      = $cekQuery->role;
                    $sess_data['status']    = "login";
    
                    $this->session->set_userdata($sess_data);
    
                    if($roleAccess == 1002){
                        echo "user biasa";
                        return 0;
                    } else if($roleAccess == 1001){
                        echo "admin";
                        return 0;
                    }
                } else {
                    echo "password salah";
                    return 0;
                }

            } else {
                echo "Data User Tidak ada, Silakan Daftar Terlebihdahulu";
                return 0;
            }

        } else {
            $this->index();
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
        
        // echo 'alert("Sukses! Anda berhasil logout."); window.location.href="'.base_url('index.php/auth/login').'";
    }
}
