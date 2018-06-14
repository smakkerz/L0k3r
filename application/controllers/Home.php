<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();  
        //$this->Identic_library->cek_identic();
        $this->Home = 'Candidate/Home/';
        $this->load->model('cruddata_model');
        $this->load->model('crudmaster_model');
        $this->load->model('dverification_model');
    }

	public function index()
	{
		$data['agent'] = $this->useragent_library->GetDataClient();
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

	public function candidate()
	{
		$Uniq = $this->session->userdata('Unique_user');
		$candidate = $this->identic_library->ValidasiAdd('m_candidate','UniqID', $Uniq);
		if($candidate == "Not Found"){
			redirect(site_url('/'));
		}
		$data = $candidate;
		$view = $this->Home.'profile';

       	$this->template_library->load('Layout',$view, $data);

	}

	public function profile($Id=null)
	{

		$candidate = $this->identic_library->Validasi('UniqID', $Id);

		if($candidate == "Not Found"){
			$Uniq = $this->session->userdata('Unique_user');
			$candidate = $this->identic_library->Validasi('UniqID', $Uniq);

			if($candidate == "Not Found"){
				redirect(site_url('/'));
			}
		}
		
		$data = $candidate;
		$view = $this->Home.'profile';

       	$this->template_library->load('Layout',$view, $data);

	}

	#region All
	public function verification($Key)
	{
		#cari Key
		$Qlue = array('Keep' => $Key);
		$verify = $this->cruddata_model->GetBy('Verification',$Qlue)->row();

		if($verify == NULL){
			redirect(site_url('/#null')); #jika null
		}
		if($verify->Expired_at >= time()){
			redirect(site_url('/#expired')); #jika expired
		}
		if($verify->Status == 'On Progress Verification Account'){
			# update verification n update m_candidate
			if($verify->Role == 'Candidate'){
				$data['Verified'] = 1; #update verified
				$this->crudmaster_model->Update('m_candidate', 'UniqID', $verify->UniqID, $data);
				#ubah key verification
				$this->dverification_model->Accept($verify->ID, 'Success verification Account');
				# redirect to thanks
				redirect(site_url('/thanks/#Success-verifikasi'));
			}
			elseif ($verify->Role == 'Company') {
				$data['Verified'] = 1; #update verified
				$this->crudmaster_model->Update('m_company', 'UniqID', $verify->UniqID, $data);
				#ubah key verification
				$this->dverification_model->Accept($verify->ID, 'Success verification Account');
				# redirect to thanks
				redirect(site_url('/thanks/#Success-verifikasi'));
			}
		}
       	else {
       		redirect(site_url('/#not-found-key'));
       	}
	}

	public function thanks()
	{
		$view = 'Public/thanks';
		$this->load->view($view);
	}

	public function resetpassword($Key)
	{
		#cari Key
		$Qlue = array('Keep' => $Key);
		$verify = $this->cruddata_model->GetBy('Verification',$Qlue)->row();

		if($verify == NULL){
			redirect(site_url('/#null')); #jika null
		}
		if($verify->Expired_at >= time()){
			redirect(site_url('/#expired')); #jika expired
		}
		if($verify->Status == 'On Progress Reset Password'){
			# update verification n update m_candidate
			
			$data['UniqID'] = $verify->UniqID;
			$data['Key'] = $Key; 
			if($verify->Role == 'Candidate'){
				# redirect to thanks
				$data['Action'] = base_url('Identic/ForgetPost');
				$view = 'Public/Identic/reset';
       			$this->template_library->load('Layout',$view, $data);
			}
			elseif ($verify->Role == 'Company') {
				# redirect to thanks
				$data['Action'] = base_url('Auth/ForgetPost');
				$view = 'Public/Auth/reset';
       			$this->template_library->load('Auth',$view, $data);
			}
		}
       	else {
       		redirect(site_url('/#not-found-key'));
       	}
	}

	public function sendreset()
	{
		#cari Key
		$Qlue = array('Keep' => $Key);
		$verify = $this->cruddata_model->GetBy('Verification',$Qlue)->row();

		if($verify == NULL){
			redirect(site_url('/#null')); #jika null
		}
		if($verify->Expired_at >= time()){
			redirect(site_url('/#expired')); #jika expired
		}
		if($verify->Status == 'On Progress Reset Password'){
			# update verification n update m_candidate
			
			$data['UniqID'] = $verify->UniqID;
			$data['Key'] = $Key; 
			if($verify->Role == 'Candidate'){
				# redirect to thanks
				$data['Action'] = base_url('Identic/ForgetPost');
				$view = 'Public/Identic/reset';
       			$this->template_library->load('Layout',$view, $data);
			}
			elseif ($verify->Role == 'Company') {
				# redirect to thanks
				$data['Action'] = base_url('Auth/ForgetPost');
				$view = 'Public/Auth/reset';
       			$this->template_library->load('Auth',$view, $data);
			}
		}
       	else {
       		redirect(site_url('/#not-found-key'));
       	}
	}
	#endregion
}
