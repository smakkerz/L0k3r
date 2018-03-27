<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settingvalue_library
{
    //var $CI;

    function __construct() {
        $this->CI = &get_instance();
//        $this->isLogin();
    }

	function Getvalue($code){
	$Setting=$this->CI->db->query("SELECT *
	 FROM Settings WHERE Code='$code' AND IsDeleted = 0 ORDER BY CreatedDate ASC ")->row();
	return $Setting;
    }

    function GetvalueInArray($code){
	$Setting=$this->CI->db->query("SELECT *
	 FROM Settings WHERE Code='$code' AND IsDeleted = 0 ORDER BY CreatedDate ASC ")->row();
	$Setting = explode("=", $Setting->Value);
	return $Setting;
    }

    function AutoIncrement($tabel, $order, $field){
    	$Number = $this->CI->db->query("SELECT $field as No FROM $tabel ORDER BY $order DESC")->row();
    	if($Number == NULL && $Number->No > 1)
    	{
    		$Number->No = 1;
    	}
    	return $Number;
    }

}