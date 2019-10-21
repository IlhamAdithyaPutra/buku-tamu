<?php

class Home extends CI_Controller{
    function __construct()
    {
        parent::__construct();
		$this->load->model('Kunjungan_model');
        $this->load->library('session');
    }

    function index()
    {
        
        $this->load->library('form_validation');

        $this->form_validation->set_rules('no_hp','No Hp','required|integer');
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('keterangan','Keterangan','required');
        $this->form_validation->set_rules('instansi','Instansi','required');
        //$this->form_validation->set_rules('tanggal','Tanggal','required');
        $this->form_validation->set_rules('id_tujuan','Id Tujuan','required');
        
        if($this->form_validation->run())     
        {   
            date_default_timezone_set("Asia/Bangkok");
            $params = array(
                'id_tujuan' => $this->input->post('id_tujuan'),
                'tanggal' => date('Y-m-d H:i:s'),
                'nama' => $this->input->post('nama'),
                'no_hp' => $this->input->post('no_hp'),
                'keterangan' => $this->input->post('keterangan'),
                'instansi' => $this->input->post('instansi'),
                'email' => $this->input->post('email')
            );
            
            
            $kunjungan_id = $this->Kunjungan_model->add_kunjungan($params);
            if($kunjungan_id>0){
                $data['_message'] = 'message/tambah/success';
            }else{
                $data['_message'] = 'message/tambah/error';
            }
            $this->load->model('Tujuan_model');
            $data['all_tujuan'] = $this->Tujuan_model->get_all_tujuan();
            
            $this->load->view('home/index',$data);
            
            //redirect('home/index');
        }
        else
        {
            $this->load->model('Tujuan_model');
            $data['all_tujuan'] = $this->Tujuan_model->get_all_tujuan();
            
            $this->load->view('home/index',$data);
        }
    }
    
     public function login()
    {
        if(isset($_POST) && count($_POST) > 0){   
            if($this->input->post('username')=='adm' && $this->input->post('password')=='adm'){
                $this->passed();
            }else{
                $this->failed();
            }
            
        }else{            
            $this->load->view('auth/login');
        }
    
    }
    function passed(){
        $data_session = array(
            'id_adminn' => '1',
            'nama_adminn' => 'adm',
            'deskripsi' => 'asdas'
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
}

