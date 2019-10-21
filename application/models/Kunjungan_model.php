<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Kunjungan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_kunjungan_filterrby_monthyearidtujuan_groupby_idjuan($bulan,$tahun,$id_tujuan){
        $query = "SELECT id_tujuan,COUNT(nama) as jumlah FROM kunjungan WHERE year(tanggal)=".$tahun." and month(tanggal)=".$bulan." and id_tujuan=".$id_tujuan;
        return $this->db->query($query)->result_array();
    }
    function get_report_kunjungan_permonth($bulan,$tahun){
        $query = "SELECT day(tanggal) as tanggal,COUNT(nama) as jumlah FROM kunjungan WHERE year(tanggal)=".$tahun." and month(tanggal)=".$bulan." GROUP BY day(tanggal)";
        $data = $this->db->query($query);
        return $data->result();
    }
    /*
     * Get kunjungan by id
     */
    function get_kunjungan($id)
    { 
        return $this->db->get_where('kunjungan',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all kunjungan count
     */
    function get_all_kunjungan_count()
    {
        $this->db->from('kunjungan');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all kunjungan
     */
    function get_all_kunjungan($params = array())
    {
        //$this->db->join('tujuan', 'kunjungan.id_tujuan = tujuan.id');
        $this->db->order_by('kunjungan.id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('kunjungan')->result_array();
    }

    function get_kunjungan_keyword($keyword){
        $this->db->select('*');
        $this->db->from('kunjungan');
        $this->db->like('nama',$keyword);
        return $this->db->get()->result();
    }
        
    /*
     * function to add new kunjungan
     */
    function add_kunjungan($params)
    {
        $this->db->insert('kunjungan',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update kunjungan
     */
    function update_kunjungan($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('kunjungan',$params);
    }
    
    /*
     * function to delete kunjungan
     */
    function delete_kunjungan($id)
    {
        return $this->db->delete('kunjungan',array('id'=>$id));
    }
}
