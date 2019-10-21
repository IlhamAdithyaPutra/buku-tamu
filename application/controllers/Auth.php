<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->library('session');   
        $this->load->model("Pengguna_model");
    } 
    public function index(){
         if(isset($_POST) && count($_POST) > 0){   
            if($this->input->post('username')=='adm' && $this->input->post('password')=='adm'){
                $this->passed();
            }else{
                $this->failed();
            }
            
        }else{            
            $this->load->view('auth/login');
        }
    	//$this->load->view('auth/login');
    }

    public function admin(){
        if($this->session->has_userdata('id_adminn')){
            $pengguna = $this->Pengguna_model->get_pengguna($this->session->userdata('id_adminn'));
            $this->passed($pengguna);
        }
        $this->load->view('auth/login');
        //redirect('belanja_daerah/index');
        
        //redirect('dashboard/index');
    }

	public function login()
	{
        if(isset($_POST) && count($_POST) > 0){   
            $pengguna = $this->Pengguna_model->get_pengguna_by_username($this->input->post('username'));
            if($pengguna){
                if(password_verify($this->input->post('password'), $pengguna['password']) && $pengguna['aktif']==1)  {
                    $this->passed($pengguna);
                }else{
                    $this->failed();
                }
            }else{
                $this->failed();
            }
            
            /*
            if($this->input->post('username')=='adm' && $this->input->post('password')=='adm'){
                $this->passed();
            }else{
                $this->failed();
            }
            */
            
        }else{            
            redirect('auth');
        }
    
	}
    function passed($petugas){
        $data_session = array(
            'id_adminn' => $petugas['id'],
            'nama_adminn' => $petugas['nama'],
            'deskripsi' => $petugas['deskripsi']
        );
        
        $this->session->set_userdata($data_session);
        redirect('dashboard/index');
    }
    public function failed(){
        $data['_errorlogin'] = 'message/error_login';
        $this->load->view('auth/login',$data);
   
    }
    public function logout()
    {
        $this->session->sess_destroy();
        $this->load->view('auth/login');
    }           


    function register()
    {   

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username','Username','required|max_length[255]');
        $this->form_validation->set_rules('password','Password','required|max_length[255]');
        
        if($this->form_validation->run())     
        {   
            if($this->input->post('password') != $this->input->post('ulangi_password')){
                $data['_errorlogin'] = 'message/error_register_passwordnotmatch';
            }else{
                if($this->Pengguna_model->get_pengguna_by_username($this->input->post('username'))){
                    $data['_errorlogin'] = 'message/error_register_usernamealready';
                }else{
                    $params = array(
                        'username' => $this->input->post('username'),
                        'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                        'nama' => $this->input->post('nama'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'aktif' => 0
                                
                    );    
                    $pengguna_id = $this->Pengguna_model->add_pengguna($params);
                    if(strlen($pengguna_id) > 0){
                        $data['_errorlogin'] = 'message/success_register';
                    }else{
                        $data['_errorlogin'] = 'message/error_register_usernamealready';
                    }
                }    
            }
            
            $this->load->view('auth/register',$data);

        }
        else
        {   
            
            $this->load->view('auth/register');
        }
        
    }  


    function ubah_profil($id)
    {   
        // check if the tahun exists before trying to edit it
        $data['tahun'] = $this->Tahun_model->get_tahun($nama_tahun);
        
        if(isset($data['tahun']['nama_tahun']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama_tahun','Nama Tahun','required|max_length[255]');
        
            if($this->form_validation->run())     
            {   
                 $params = array(
                    'nama_tahun' => $this->input->post('nama_tahun')
                );
                
                $return = $this->Tahun_model->add_tahun($params);
                if(count($return) > 0){
                    $this->session->set_userdata('message',"message/ubah/success");
                }else{
                    $this->session->set_userdata('message',"message/ubah/error");
                }         
                redirect('tahun/index');
            }
            else
            {
                $data['_view'] = 'tahun/edit';
                $this->load->view('template/main_admin',$data);
            }
        }
        else
            show_error('The tahun you are trying to edit does not exist.');
    } 
    
}
