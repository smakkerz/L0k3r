<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post extends CI_Controller {

    function __construct()
    {
        parent::__construct();  
        $this->Public = 'Public/Auth/';
        $this->load->model('crudmaster_model');
        $this->auth_library->cek_akses('Company');

        $now = time();
    }

	public function index()
	{
		$session = $this->session->userdata('isLogin');
        if($session == FALSE) {
		// $data['agent'] = $this->useragent_library->GetDataClient();
		// $data['Company'] = $this->settingvalue_library->Getvalue('Name_Company')->Value;
		// $data['NoCompany'] = $this->settingvalue_library->Getvalue('No_Company')->Value;;
		// $data['City'] = $this->settingvalue_library->GetvalueInArray('City_Option');
		// $data['ID'] = $this->settingvalue_library->AutoIncrement('Settings', 'ID', 'ID');
		$data['ActionLogin'] = site_url('Auth/Login');
		// $data['ActionRegister'] = site_url('Auth/Register');
		// $data['ActionForget'] = site_url('Auth/Forgetpassword');
		$data['Title'] = 'Hai';
		$view = $this->Public .'index';
       	$this->template_library->load('Auth', $view, $data);
       	} else {
        redirect('Cms#'.$this->session->userdata('Unique_user').'+'.date('sis'), 'refresh');
        }
	}
}
