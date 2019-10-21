<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Dashboard extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kunjungan_model');
         $this->load->library('session'); 
        if(!$this->session->has_userdata('nama_adminn')){
            redirect('home/login');   
        }
    }

    function index()
    {
    	if(isset($_POST) && count($_POST) > 0){   
    		//print_r($_POST);

	        $tahun = $this->input->post('tahun');
	        $bulan = $this->input->post('bulan');

	        $data['bulan'] = $bulan;
	        $data['tahun'] = $tahun;
	        $data['data_grafik'] = $this->Kunjungan_model->get_report_kunjungan_permonth($bulan,$tahun);
	        $data['total_lpse'] = $this->Kunjungan_model->get_kunjungan_filterrby_monthyearidtujuan_groupby_idjuan($bulan,$tahun, "1");
	        $data['total_sekretariat'] = $this->Kunjungan_model->get_kunjungan_filterrby_monthyearidtujuan_groupby_idjuan($bulan,$tahun, "2");
	        $data['total_bidang'] = $this->Kunjungan_model->get_kunjungan_filterrby_monthyearidtujuan_groupby_idjuan($bulan,$tahun, "3");
	        $data['_view'] = 'dashboard';
	        $data['lihat_data'] = 1;

	        //print_r($data['data_grafik']);
	        
	         $this->load->view('layouts/main',$data);
        }else{
        	$data['lihat_data'] = 0;
        	$data['_view'] = 'dashboard';
        	$this->load->view('layouts/main',$data);        	
        }
        
    }
}