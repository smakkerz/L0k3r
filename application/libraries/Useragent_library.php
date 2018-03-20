<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Useragent_library
{
    //var $CI;

    function __construct() {
        $this->CI = &get_instance();
//        $this->isLogin();
    }

	function GetDataClient(){
		$this->CI->load->library('user_agent');
		if ($this->CI->agent->is_browser()){
			$agent = $this->CI->agent->browser().' '.$this->CI->agent->version();
		}elseif ($this->CI->agent->is_mobile()){
			$agent = $this->CI->agent->mobile();
		}else{
			$agent = 'Data user gagal di dapatkan';
		}
		//$ip = $this->CI->input->ip_address();
    	//$clientDetails = json_decode(file_get_contents("http://ipinfo.io/$ip/json"));
    	//$ip = $clientDetails->country." " .$clientDetails->city . " ". $clientDetails->ip;
    	$ip = "Testing dilocalhost";
		$datas = array(
			"Device" => $this->CI->agent->mobile() == NULL ? "is_Dekstop" : $this->CI->agent->mobile(),
			"Browser" => $agent,
			"OSystem"=> $this->CI->agent->platform(),
			"IP"=> $ip);
        return $datas;
    }

}