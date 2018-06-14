<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cruddata_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->data = $this->load->database('data', TRUE);
        $this->log = $this->load->database('log', TRUE);
    }

    // get all
    function get_all($table)
    {
    $this->data->order_by($this->id, $this->order);
    return $this->data->get($table)->result();
    }

    function Add($table, $data, $By)
    {
        $list = array(
            'Created_at' => date('Y-m-d H:i:s'),
            'Created_by' => $By);
        $list = array_replace($data,$list);
        $this->data->insert($table, $list);
        $id = $this->data->insert_id();
        $this->EventLog();
        return $id;
    }

    function Update($table, $field, $id, $data)
    {
        $this->data->where($field, $id);
        $this->data->update($table, $data);   
    }
    
    function GetBy($table, $data)
    {
        return $this->data->get_where($table, $data);
    }

    // delete data
    function delete($table, $field, $id)
    {
        $this->data->where($field, $id);
        $this->data->delete($table);
    }

     // soft delete data
    function softdelete($table, $field, $id)
    {
        $this->data->where($field, $id);
        $this->data->delete($table, array('IsDeleted' => '1'));
    }

    function EventLog($Source, $Value, $Message, $Log, $By)
    { //Source = Tabel, Value = Param yg dikirim, Message = Hasil Result, Log = Insert/Update/Select/Delete
        $data = array(
            'Platform' => $this->agent->platform(),
            'OSystem' => $this->agent->is_mobile() == NULL ? "is_Dekstop" : $this->agent->mobile(),
            'IP' => $this->input->ip_address(),
            'Browser' => $this->agent->browser().' '.$this->agent->version(),
            'LogType' => $Log,
            'Source' => $Source,
            'Value' => $Value,
            'Message' => $Message,
            'Created_at' => date('Y-m-d H:i:s'),
            'Created_by' => $By);
        return $this->log->insert('EventLog', $data);
    }

}