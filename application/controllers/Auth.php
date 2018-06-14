<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct()
    {
        parent::__construct();  
        $this->Public = 'Public/Auth/';
        $this->load->model('crudmaster_model');
        $this->load->library('email_library');
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
			$data['ActionLogin'] = site_url('Auth/LoginPost');
			// $data['ActionRegister'] = site_url('Auth/Register');
			// $data['ActionForget'] = site_url('Auth/Forgetpassword');
			$data['Title'] = 'Hai';
			$view = $this->Public .'index';
	       	$this->template_library->load('Auth', $view, $data);
       	} else {
        	redirect('Cms#'.$this->session->userdata('Unique_user').'+'.date('sis'), 'refresh');
        }
	}

	public function register()
	{
		$session = $this->session->userdata('isLogin');
        if($session == FALSE) {
			$data['ID'] = $this->settingvalue_library->AutoIncrement('m_company', 'ID', 'ID');
			$data['ActionRegister'] = site_url('Auth/RegisterPost');
			$data['Title'] = 'Hai, Posyandu';
			$view = $this->Public .'register';
	       	$this->template_library->load('Auth', $view, $data);
       	} else {
        	redirect('#'.bin2hex($this->session->userdata('Unique_user')), 'refresh');
        }
	}

	public function RegisterPost()   ///POST Capital first
	{
		// $this->_validateRegister();
		// if($this->form_validation->run() == FALSE) {
  //           redirect(site_url('register/company'));
		// } else {
			$Fullname = $this->input->post('PostName', TRUE);
			$Email = $this->input->post('PostEmail', TRUE);
			$Password = $this->input->post('PostPassword', TRUE);
			$Phone = $this->input->post('PostPhone', TRUE);

			$Agent = $this->useragent_library->GetDataClient();
			$Validasiphone = $this->settingvalue_library->ValidasiAdd('m_companydetail','Phone', $Phone);
			if($Validasiphone != 'Not Found'){
				$this->session->set_flashdata('message', '<div class="alert alert-danger" style="font-size : 16px;">
            	<i class="glyphicon glyphicon-minus-sign"></i> Phone sudah digunakan</div>');
            redirect(site_url('register/company'));
			}
			$Validasiuser = $this->settingvalue_library->ValidasiAdd('m_company', 'Email', $Email);
			if($Validasiuser != 'Not Found'){
				$this->session->set_flashdata('message', '<div class="alert alert-danger" style="font-size : 16px;">
            	<i class="glyphicon glyphicon-minus-sign"></i> Nama User sudah digunakan</div>');
            redirect(site_url('register/company'));
			}
			$Uniq = uniqid().$this->settingvalue_library->AutoIncrement('m_company', 'ID', 'ID')->No;
			$User = uniqid(date('i')).$this->settingvalue_library->AutoIncrement('m_company', 'ID', 'ID')->No;

			$data = array (
				'UniqID' => $Uniq,
				'Username' => $User,
				'Email' => $Email,
				'Name' => $Fullname,
				'Password' => $this->encryption->encrypt($Password),
				);
			$ID = $this->crudmaster_model->Add('m_company', $data, $Fullname);

				$detail = array(
				'IDCompany' => $ID,
				'IP' => $Agent['IP'],
				'Flag' => 'Web',
				'Phone' => $Phone,
				'OSystem' => $Agent['OSystem'],
				'Browser' => $Agent['Browser'],
				'Platform' => $Agent['Device'],
				'IsDeleted' => 0
				);
			$this->crudmaster_model->Add('m_companydetail', $detail, $Fullname);
			///Login kan
			$Auth = $this->auth_library->Login($Email,$Password);
			$Url = base_url()."verification/";
			$this->email_library->SendVerifikasi('On Progress Verification Account', $Url); #Send email verifikasi
			if($Auth == "Sukses") { //success Login
				redirect('Cms#'.$this->session->userdata('Unique_user').'+'.date('His'), 'refresh');
			} elseif($Auth == "not found"){  // failed User not found
				$this->session->set_flashdata('message', '<div class="alert alert-danger" style="font-size : 16px;">
				<i class="glyphicon glyphicon-remove-sign"></i> User tidak ada </div>');
            redirect(site_url('register/company'));
			}else {  // failed wrong combination
			$this->session->set_flashdata('message', '<div class="alert alert-danger" style="font-size : 16px;">
				<i class="glyphicon glyphicon-exclamation-sign"></i> Kombinasi Akun salah </div>');
            redirect(site_url('register/company'));
			}
		// }
	}

	public function LoginPost()  //POST Capital  first
	{
		$name = $this->input->post('PostUser',TRUE);
		$pwd = $this->input->post('PostPass',TRUE);

		$Identic = $this->auth_library->Login($name,$pwd);
			if($Identic == "not found"){  // failed User not found
				$Response = array (
					'StatusCode' => '30',
					'StatusMessage' => 'User Tidak ada');
			}elseif($Identic == "not match") {  // failed wrong combination
				$Response = array (
					'StatusCode' => '50',
					'StatusMessage' => 'Kombinasi Akun salah');
			}else{ //success Login
				$Response = array (
					'StatusCode' => '200',
					'StatusMessage' => 'Success',
					'Value' => $Identic);
				$this->email_library->NotifSession($this->session->userdata('email'), null, 'login');
			}
		echo json_encode($Response);
	}

	public function ForgetPost()   ///Post Forget Password
	{
		$Key = $this->input->post('Key', TRUE);
		$UniqID = $this->input->post('PostUniqID', TRUE);
		$Password = $this->input->post('PostPass', TRUE);

		$company = $this->crudmaster_model->GetBy('m_company', 'UniqID', $UniqID);
		$verify = $this->cruddata_model->GetBy('verification', 'Keep', $Key);
		$response = array(
			'StatusCode' => '20',
			'StatusMessage' => 'Oops Data tidak ditemukan, mungkin data yang anda kirim salah/kosong');
		if($verify != null && $company != null && $Password != null) {

			$data['Password'] = $Password; #update password
			$this->crudmaster_model->Update('m_company', 'UniqID', $UniqID, $data);
			#ubah key verification
			$this->dverification_model->Accept($Key, 'Success Reset Password');

			$response = array(
			'StatusCode' => '200',
			'StatusMessage' => 'Success Reset Password');
		}
		echo json_encode($response);
	}

	public function logout()
    {
    	//$this->email_library->NotifSession($this->session->userdata('email'), null, 'logout');
        $this->session->sess_destroy();
        redirect('Auth','refresh');
    }

	public function _validateLogin()
	{
		$this->form_validation->set_rules('PostUser', 'User', 'trim|required');
		$this->form_validation->set_rules('PostPass', 'Password', 'trim|required');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function _validateRegister()
	{
		// $this->form_validation->set_rules('Postuser', 'User', 'trim|required');
		// $this->form_validation->set_rules('Postpass', 'Password', 'trim|required');
		// $this->form_validation->set_rules('PostName', 'User', 'trim|required');
		// $this->form_validation->set_rules('PostPhone', 'Password', 'trim|required');
		// $this->form_validation->set_rules('PostCity', 'User', 'trim|required');
		// $this->form_validation->set_rules('PostDate', 'Password', 'trim|required');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}
