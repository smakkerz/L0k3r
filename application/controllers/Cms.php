<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cms extends CI_Controller {

    function __construct()
    {
        parent::__construct();  
        $this->auth_library->cek_auth();
        $this->Home = 'Company/Cms/';
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
       	$this->template_library->load('Cms',$view, $data);
	}

	public function shortcodes()
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

		$view = $this->Home.'shortcodes';
		$this->load->view($view, $data);
       	//$this->template_library->load('Template',$view, $data);
	}
}
