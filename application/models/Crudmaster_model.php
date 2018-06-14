<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crudmaster_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database('default');
    }

    // get all
    function get_all($limit='')
    {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get()->result();
    }

    function Add($table, $data, $By)
    {
        $list = array(
            'Created_at' => date('Y-m-d H:i:s'),
            'Created_by' => $By);
        $list = array_replace($data,$list);
        $this->db->insert($table, $list);
        return $this->db->insert_id();
    }

    function Update($table, $field, $id, $data)
    {
        $this->db->where($field, $id);
        $this->db->update($table, $data);   
    }
    
    function GetBy($table, $field, $data)
    {
        return $this->db->get_where($table, $field, $data);
    }

        // delete data
    function delete($table, $field, $id)
    {
        $this->db->where($field, $id);
        $this->db->delete($table);
    }

     // soft delete data
    function softdelete($table, $field, $id)
    {
        $this->db->where($field, $id);
        $this->db->delete($table, array('IsDeleted' => '1'));
    }
}