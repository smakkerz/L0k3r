<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cruddata_model extends CI_Model
{
	public $table = 'Users';
    public $id = 'ID';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->data = $this->load->database('data', TRUE);
    }

    // get all
    function get_all($table)
    {
    $this->data->order_by($this->id, $this->order);
    return $this->data->get($table)->result();
    }

    function Add($table, $data)
    {
        $this->data->insert($table, $data);
        return $this->data->insert_id();
    }

}