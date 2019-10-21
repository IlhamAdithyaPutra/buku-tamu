<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Kunjungan extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kunjungan_model');
         $this->load->library('session'); 
        if(!$this->session->has_userdata('nama_adminn')){
            redirect('home/login');   
        }
    } 

    /*
     * Listing of kunjungan
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('kunjungan/index?');
        $config['total_rows'] = $this->Kunjungan_model->get_all_kunjungan_count();
        $this->pagination->initialize($config);

        $data['kunjungan'] = $this->Kunjungan_model->get_all_kunjungan($params);
        
        $data['_view'] = 'kunjungan/index';
        $this->load->view('layouts/main',$data);
    }


    /*
     * Editing a kunjungan
     */
    function edit($id)
    {   
        // check if the kunjungan exists before trying to edit it
        $data['kunjungan'] = $this->Kunjungan_model->get_kunjungan($id);
        
        if(isset($data['kunjungan']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('no_hp','No Hp','required|integer');
			$this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('keterangan','Keterangan','required');
            $this->form_validation->set_rules('instansi','Instansi','required');
			$this->form_validation->set_rules('tanggal','Tanggal','required');
			$this->form_validation->set_rules('id_tujuan','Id Tujuan','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'id_tujuan' => $this->input->post('id_tujuan'),
					'tanggal' => $this->input->post('tanggal'),
					'nama' => $this->input->post('nama'),
					'no_hp' => $this->input->post('no_hp'),
					'keterangan' => $this->input->post('keterangan'),
					'instansi' => $this->input->post('instansi'),
                );

                $this->Kunjungan_model->update_kunjungan($id,$params);            
                redirect('kunjungan/index');
            }
            else
            {
				$this->load->model('Tujuan_model');
				$data['all_tujuan'] = $this->Tujuan_model->get_all_tujuan();

                $data['_view'] = 'kunjungan/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The kunjungan you are trying to edit does not exist.');
    } 

    /*
     * Deleting kunjungan
     */
    function remove($id)
    {
        $kunjungan = $this->Kunjungan_model->get_kunjungan($id);

        // check if the kunjungan exists before trying to delete it
        if(isset($kunjungan['id']))
        {
            $this->Kunjungan_model->delete_kunjungan($id);
            redirect('kunjungan/index');
        }
        else
            show_error('The kunjungan you are trying to delete does not exist.');
    }
    
}
