<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	function getdataclient(){
		$CI = get_instance();

		$CI->load->library('user_agent');
        
		if ($CI->agent->is_browser()){
			$agent = $CI->agent->browser().' '.$CI->agent->version();
		}elseif ($CI->agent->is_mobile()){
			$agent = $CI->agent->mobile();
		}else{
			$agent = 'Data user gagal di dapatkan';
		}
		$datas['browser'] = "Browser = ". $agent . "<br/>";
		$datas['Os'] = "Sistem Operasi = " . $CI->agent->platform() ."<br/>"; // Platform info (Windows, Linux, Mac, etc.)
		//ip hanya muncul pada hosting
		$datas['IP'] = $CI->input->ip_address();
        return $datas;
    }