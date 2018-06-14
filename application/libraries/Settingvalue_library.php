<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settingvalue_library
{
    //var $CI;

    function __construct() {
        $this->CI = &get_instance();
        $this->CI->load->database('default');
//        $this->isLogin();
    }

	function Getvalue($Code){
	$Setting=$this->CI->db->query("SELECT *
	 FROM Settings WHERE Code='$Code' AND IsDeleted = 0 ORDER BY Created_at ASC ")->row();
	return $Setting;
    }

    function GetvalueInArray($Code){
	$Setting=$this->CI->db->query("SELECT *
	 FROM Settings WHERE Code='$Code' AND IsDeleted = 0 ORDER BY Created_at ASC ")->row();
	$Setting = explode("=", $Setting->Value);
	return $Setting;
    }

    function AutoIncrement($Table, $Order, $Field){
    	$Number = $this->CI->db->query("SELECT $Field as No FROM $Table ORDER BY $Order DESC")->row();
    	if($Number == NULL || $Number->No < 1)
    	{
    		$Number->No = 1;
    	}
        else{
            $Number->No = $Number->No + 1;
        }
    	return $Number;
    }

    function ValidasiAdd($Table, $Field, $Data){
    $Status = "Found";
    $data=$this->CI->db->query("SELECT *
     FROM $Table WHERE $Field = '$Data' AND IsDeleted = 0 ORDER BY Created_at ASC ")->row();
    if($data == NULL) {
        $Status = "Not Found";
        return $Status;
    }
    else
    {
        $Status = $data;
    }
    return $Status;
    }

    function ExplodeName($Value){
        $Name['first'] = implode(' ', array_slice(explode(' ',$Value), 0, -1));
        $Name['last'] = array_slice(explode(' ', $Value), -1)[0];
        return $Name;
    }

    function IntervalDays($CheckIn,$CheckOut){
        $CheckInX = explode("-", $CheckIn);
        $CheckOutX =  explode("-", $CheckOut);
        $date1 =  mktime(0, 0, 0, $CheckInX[1],$CheckInX[2],$CheckInX[0]);
        $date2 =  mktime(0, 0, 0, $CheckOutX[1],$CheckOutX[2],$CheckOutX[0]);
        $interval =($date2 - $date1)/(3600*24);
        // returns numberofdays
        return  $interval;
    }

    function Random($Interval, $Value) 
    {  //random character

        $nama = 'PLMOKNIJBUHYGVTFCRDXESZAWQ';
        $string = date("s");
            for ($i = 0; $i < $Interval; $i++) {
            $j = rand(date("d"), date("H")-1);
            $string .= $nama{$j};
            }
            return $string.$Value;
    }

}