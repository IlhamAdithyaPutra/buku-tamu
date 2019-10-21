<?php

class Pengguna_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    

    /*
     * Get pengguna by username
     */
    function get_pengguna_by_nama($nama)
    {
        return $this->db->get_where('pengguna',
                array('nama'=>$nama )
            )->row_array();
    }
    /*
     * Get pengguna by username
     */
    function get_pengguna_by_username($username)
    {
        return $this->db->get_where('pengguna',
                array('username'=>$username )
            )->row_array();
    }

    /*
     * Get pengguna by id
     */
    function get_pengguna($id)
    {
        return $this->db->get_where('pengguna',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all pengguna
     */
    function get_all_pengguna()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('pengguna')->result_array();
    }
        
    /*
     * function to add new pengguna
     */
    function add_pengguna($params)
    {
        $this->db->insert('pengguna',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update pengguna
     */
    function update_pengguna($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('pengguna',$params);
    }
    
    /*
     * function to delete pengguna
     */
    function delete_pengguna($id)
    {
        return $this->db->delete('pengguna',array('id'=>$id));
    }
}
