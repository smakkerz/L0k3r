<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();  
        //$this->Identic_library->cek_identic();
        $this->Home = 'Candidate/Home/';
    }

	public function index()
	{
		$data['agent'] = $this->useragent_library->GetDataClient();
		$data['assets'] = base_url('Assets/Candidate');
		// $data['Company'] = $this->settingvalue_library->Getvalue('Name_Company')->Value;
		// //$data['Title'] = "Home - ". $this->session->userdata('Unique_user');

		// if($this->session->userdata('level') == 'Admin'){
		// 	$data['Menu'] = $this->settingvalue_library->GetvalueInArray('Menu_Admin');
		// } else {
		// 	$data['Menu'] = $this->settingvalue_library->GetvalueInArray('Menu_User');
		// }
		// $data['ID'] = $this->settingvalue_library->AutoIncrement('Settings', 'ID', 'ID');

		$view = $this->Home.'index';
		//$this->load->view($view, $data);
       	$this->template_library->load('Layout',$view, $data);
	}

	public function login()
	{
		$data['agent'] = $this->useragent_library->GetDataClient();
		$data['assets'] = base_url('Assets/Candidate');
		// $data['Company'] = $this->settingvalue_library->Getvalue('Name_Company')->Value;
		// //$data['Title'] = "Home - ". $this->session->userdata('Unique_user');

		// if($this->session->userdata('level') == 'Admin'){
		// 	$data['Menu'] = $this->settingvalue_library->GetvalueInArray('Menu_Admin');
		// } else {
		// 	$data['Menu'] = $this->settingvalue_library->GetvalueInArray('Menu_User');
		// }
		// $data['ID'] = $this->settingvalue_library->AutoIncrement('Settings', 'ID', 'ID');

		$view = $this->Home.'login';
		//$this->load->view($view, $data);
       	$this->template_library->load('Layout',$view, $data);
	}
}