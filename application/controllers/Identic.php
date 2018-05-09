<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Identic extends CI_Controller {

    function __construct()
    {
        parent::__construct();  
        $this->Public = 'Public/Identic/';
        $this->load->model('crudmaster_model');
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
		$data['ActionLogin'] = site_url('Identic/Login');
		// $data['ActionRegister'] = site_url('Identic/Register');
		// $data['ActionForget'] = site_url('Identic/Forgetpassword');
		$data['Title'] = 'Hai, Posyandu';
		$view = $this->Public .'index';
       	$this->template_library->load('Identic', $view, $data);
       	} else {
        redirect('#'.bin2hex($this->session->userdata('Unique_user')), 'refresh');
        }
	}

	public function register()
	{
		$session = $this->session->userdata('isLogin');
        if($session == FALSE) {
		// $data['agent'] = $this->useragent_library->GetDataClient();
		// $data['Company'] = $this->settingvalue_library->Getvalue('Name_Company')->Value;
		// $data['NoCompany'] = $this->settingvalue_library->Getvalue('No_Company')->Value;;
		// $data['City'] = $this->settingvalue_library->GetvalueInArray('City_Option');
		$data['ID'] = $this->settingvalue_library->AutoIncrement('m_candidate', 'ID', 'ID');
		$data['ActionRegister'] = site_url('Identic/RegisterPost');
		// $data['ActionRegister'] = site_url('Identic/Register');
		// $data['ActionForget'] = site_url('Identic/Forgetpassword');
		$data['Title'] = 'Hai, Posyandu';
		$view = $this->Public .'register';
       	$this->template_library->load('Identic', $view, $data);
       	} else {
        redirect('#'.bin2hex($this->session->userdata('Unique_user')), 'refresh');
        }
	}

	public function RegisterPost()   ///POST Capital first
	{
		// $this->_validateRegCandidate();
		// if($this->form_validation->run() == FALSE) {
  //           redirect(site_url('Identic/register'));
		// } else {
			$Fullname = $this->input->post('PostName', TRUE);
			$Birthdate = $this->input->post('PostDate', TRUE);
			$Email = $this->input->post('PostEmail', TRUE);
			$Password = $this->input->post('PostPassword', TRUE);
			$Phone = $this->input->post('PostPhone', TRUE);

			$Agent = $this->useragent_library->GetDataClient();

			$Validasiphone = $this->settingvalue_library->ValidasiAdd('m_candidate','Phone', $Phone);
			if($Validasiphone != 'Not Found'){
				$this->session->set_flashdata('message', '<div class="alert alert-danger" style="font-size : 16px;">
            	<i class="glyphicon glyphicon-minus-sign"></i> Phone sudah digunakan</div>');
            redirect(site_url('Identic/register'));
			}

			$Validasimail = $this->settingvalue_library->ValidasiAdd('m_candidate', 'Email', $Email);
			if($Validasimail != 'Not Found'){
				$this->session->set_flashdata('message', '<div class="alert alert-danger" style="font-size : 16px;">
            	<i class="glyphicon glyphicon-minus-sign"></i> Email sudah digunakan</div>');
            redirect(site_url('Identic/register'));
			}

			$Uniq = uniqid().$this->settingvalue_library->AutoIncrement('m_candidate', 'ID', 'ID')->No;

			$Validasiuniq = $this->settingvalue_library->ValidasiAdd('m_candidate', 'UniqID', $Uniq);
			if($Validasiuniq != 'Not Found'){
				$Uniq = uniqid().$this->settingvalue_library->AutoIncrement('m_candidate', 'ID', 'ID')->No;
			}
			$Birthdate = date('Y-m-d', strtotime($Birthdate));
			//$Name = $this->Identic_library->ExplodeName($Fullname);
			$data = array(
				'UniqID' => $Uniq,
				'Name' => $Fullname,
				'Email' => $Email,
				'Phone' => $Phone,
				'Password' => $this->encryption->encrypt($Password),
				'BirthDate' => $Birthdate,
				'Flag' => 'Register-Web',
				'IP' => $Agent['IP'],
				'OSystem' => $Agent['OSystem'],
				'Browser' => $Agent['Browser'],
				'Platform' => $Agent['Device'],
				'Created_at' => date('Y-m-d H:i:s'),
				'Created_by' => $Fullname,
				'IsActive' => 1,
				'IsDeleted' => 0
				);
			
			$this->crudmaster_model->Add('m_candidate', $data);
			///Login kan
			$Identic = $this->identic_library->Login($Phone,$Password);
			if($Identic == "Sukses") { //success Login
				redirect(site_url('?RegisternLogin='.$this->session->userdata('Unique_user')).'+'.date('His'));
			} elseif($Identic == "not found"){  // failed User not found
				$this->session->set_flashdata('message', '<div class="alert alert-danger" style="font-size : 16px;">
				<i class="glyphicon glyphicon-remove-sign"></i> User tidak ada </div>');
            redirect(site_url('Identic?'.$Identic));
			}else {  // failed wrong combination
			$this->session->set_flashdata('message', '<div class="alert alert-danger" style="font-size : 16px;">
				<i class="glyphicon glyphicon-exclamation-sign"></i> Kombinasi Akun salah </div>');
            redirect(site_url('Identic?false'));
			}
		// }
	}

	public function Forgetpassword()   ///POST Capital first
	{
		$data['agent'] = $this->settingsvalue_library->Getvalue('Name_Company');
		$this->load->view('Public/forgetpassword', $data);
	}

	public function NewPassword()
	{

	}

	public function Login()  //POST Capital  first
	{
		$this->_validateLogin();
		if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" style="font-size : 16px;">
            	<i class="glyphicon glyphicon-minus-sign"></i> Mohon diisi form login</div>');
            redirect(site_url('Identic'));
        } else {
		$name = $this->input->post('PostUser',TRUE);
		$pwd = $this->input->post('PostPass',TRUE);

		$Identic = $this->identic_library->Login($name,$pwd);
			if($Identic == "Sukses") { //success Login
				redirect(site_url('?Login='.$this->session->userdata('Unique_user')).'+'.date('His'));
			} elseif($Identic == "not found"){  // failed User not found
				$this->session->set_flashdata('message', '<div class="alert alert-danger" style="font-size : 16px;">
				<i class="glyphicon glyphicon-remove-sign"></i> User tidak ada </div>');
            redirect(site_url('login/candidate?not-found'));
			}else {  // failed wrong combination
			$this->session->set_flashdata('message', '<div class="alert alert-danger" style="font-size : 16px;">
				<i class="glyphicon glyphicon-exclamation-sign"></i> Kombinasi Akun salah </div>');
            redirect(site_url('login/candidate?false'));
			}
		}
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('/','refresh');
    }

	public function _validateLogin()
	{
		$this->form_validation->set_rules('PostUser', 'User', 'trim|required');
		$this->form_validation->set_rules('PostPass', 'Password', 'trim|required');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function _validateRegCandidate()
	{
		// $this->form_validation->set_rules('PostEmail', 'User', 'trim|required');
		// $this->form_validation->set_rules('Postpass', 'Password', 'trim|required');
		// $this->form_validation->set_rules('PostName', 'User', 'trim|required');
		// $this->form_validation->set_rules('PostPhone', 'Password', 'trim|required');
		// $this->form_validation->set_rules('PostCity', 'User', 'trim|required');
		// $this->form_validation->set_rules('PostDate', 'Password', 'trim|required');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}
