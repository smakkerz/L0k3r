<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct()
    {
        parent::__construct();  
        $this->Public = 'Public/Auth/';
    }

	public function index()
	{
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
	}

	public function Register()   ///POST Capital first
	{
		$this->_validateRegister();
		if($this->form_validation->run() == FALSE) {
            redirect(site_url('Auth'));
		} else {
			$Fullname = $this->input->post('PostName', TRUE);
			$Birthdate = $this->input->post('PostDate', TRUE);
			$User = $this->input->post('Postuser', TRUE);
			$Password = $this->input->post('Postpass', TRUE);
			$Phone = $this->input->post('PostPhone', TRUE);
			$City = $this->input->post('PostCity', TRUE);

			$Agent = $this->useragent_library->GetDataClient();
			$Validasiphone = $this->auth_library->ValidasiAdd('Users','Phone', $Phone);
			if($Validasiphone != 'Not Found'){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="font-size : 16px;">
            	<i class="glyphicon glyphicon-minus-sign"></i> Phone sudah digunakan</div>');
            redirect(site_url('Auth'));
			}
			$Validasiuser = $this->auth_library->ValidasiAdd('Users', 'User', $User);
			if($Validasiuser != 'Not Found'){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="font-size : 16px;">
            	<i class="glyphicon glyphicon-minus-sign"></i> Nama User sudah digunakan</div>');
            redirect(site_url('Auth'));
			}
			$Uniq = $User."-".date('i');
			$Birthdate = date('Y-m-d', strtotime($Birthdate));
			$Name = $this->auth_library->ExplodeName($Fullname);
			$data = array (
				'Unique_ID' => $Uniq,
				'FirstName' => $Name[first],
				'LastName' => $Name[last],
				'User' => $User,
				'Phone' => $Phone,
				'Password' => $this->encryption->encrypt($Password),
				'City' => $City,
				'BirthDate' => $Birthdate,
				'Role' => 'Officer',
				'IPAddress' => $Agent['IP'],
				'OSystem' => $Agent['OSystem'],
				'Browser' => $Agent['Browser'],
				'Device' => $Agent['Device'],
				'CreatedDate' => date('Y-m-d H:i:s'),
				'CreatedBy' => $Fullname,
				'IsApproved' => 1,
				'IsDeleted' => 0
				);
			$this->operation_model->insert('Users', $data);
			///Login kan
			$Auth = $this->auth_library->Login($User,$Password);
			if($Auth == "Sukses") { //success Login
				redirect(site_url('/#SukesLogin='.$this->session->userdata('Unique_user')).'+'.date('His'));
			} elseif($Auth == "not found"){  // failed User not found
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="font-size : 16px;">
				<i class="glyphicon glyphicon-remove-sign"></i> User tidak ada </div>');
            redirect(site_url('Auth'));
			}else {  // failed wrong combination
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="font-size : 16px;">
				<i class="glyphicon glyphicon-exclamation-sign"></i> Kombinasi Akun salah </div>');
            redirect(site_url('Auth'));
			}
		}
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
            redirect(site_url('Auth'));
        } else {
		$name = $this->input->post('PostUser',TRUE);
		$pwd = $this->input->post('PostPass',TRUE);

		$Auth = $this->auth_library->Login($name,$pwd);
			if($Auth == "Sukses") { //success Login
				redirect(site_url('Cms#SukesLogin='.$this->session->userdata('Unique_user')).'+'.date('His'));
			} elseif($Auth == "not found"){  // failed User not found
				$this->session->set_flashdata('message', '<div class="alert alert-danger" style="font-size : 16px;">
				<i class="glyphicon glyphicon-remove-sign"></i> User tidak ada </div>');
            redirect(site_url('Auth'));
			}else {  // failed wrong combination
			$this->session->set_flashdata('message', '<div class="alert alert-danger" style="font-size : 16px;">
				<i class="glyphicon glyphicon-exclamation-sign"></i> Kombinasi Akun salah </div>');
            redirect(site_url('Auth'));
			}
		}
	}

	public function logout()
    {
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
		$this->form_validation->set_rules('Postuser', 'User', 'trim|required');
		$this->form_validation->set_rules('Postpass', 'Password', 'trim|required');
		$this->form_validation->set_rules('PostName', 'User', 'trim|required');
		$this->form_validation->set_rules('PostPhone', 'Password', 'trim|required');
		$this->form_validation->set_rules('PostCity', 'User', 'trim|required');
		$this->form_validation->set_rules('PostDate', 'Password', 'trim|required');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}
