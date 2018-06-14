<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cms extends CI_Controller {

    function __construct()
    {
        parent::__construct();  
        $this->auth_library->cek_auth();
        $this->auth_library->cek_akses('Company');
        $this->Home = 'Company/Cms/';
        $this->load->model('cruddata_model');
        $this->load->model('crudmaster_model');
        $this->load->model('dverification_model');
    }

	public function index()
	{
		$data['agent'] = $this->useragent_library->GetDataClient();
		$data['assets'] = base_url('Assets/Candidate');

		$Uniq = $this->session->userdata('Unique_user');
		$data['company'] = $this->auth_library->Search('UniqID', $Uniq);
		$Login = $this->input->get('Login',TRUE);
		if($this->session->userdata('verified') == 0 && $Login != null){
			$this->session->set_flashdata('message', '<input type="hidden" id="message" value="verified" />');
		}
		$view = $this->Home.'index';
       	$this->template_library->load('Cms',$view, $data);
	}

	public function profile()
	{
		$Uniq = $this->session->userdata('Unique_user');
		$company = $this->auth_library->Search('UniqID', $Uniq);
		if($company == "Not Found"){
			redirect(site_url('/Cms'));
		}
		$data = $company;
		$view = $this->Home.'profile';

       	$this->template_library->load('Cms',$view, $data);
	}

	public function sendverifikasi()
	{
		if($this->session->userdata('verified') != 1){
			#cari Key
			$Qlue = array(
				'UniqID' => $this->session->userdata('Unique_user'), 
				'Role' => $this->session->userdata('Role'),
				'Expired_at >=' => time()); #cek by role, uniqid, expired date
			$verify = $this->cruddata_model->GetBy('Verification',$Qlue)->row();
			if($verify != null){
				$Url = base_url()."verification/".$verify->Keep;
				$this->email_library->NotifVerify($this->session->userdata('email'), $Url,null);
				$this->session->set_flashdata('message', '<input type="hidden" id="message" value="sendverified" />');
				redirect(site_url('/Cms#'.dechex(date('HisY'))));
			}
			else {
				$Url = base_url()."verification/";
				$this->email_library->SendVerifikasi('On Progress Verification Account', $Url);
				$this->session->set_flashdata('message', '<input type="hidden" id="message" value="sendverified" />');
				redirect(site_url('/Cms#Email'));
			}
		}
	}

	public function jobs()
	{
		
		$view = $this->Home.'jobs';

       	$this->template_library->load('Cms',$view, $data);

	}
}
