<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crudmaster_model extends CI_Model
{
	public $table = 'Users';
    public $id = 'ID';
    public $order = 'DESC';

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

    function Add($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
}