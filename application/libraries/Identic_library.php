<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Identic_library {

	function __construct() {
        $this->CI = &get_instance();
        $this->CI->load->database('default');
    	$this->db = $this->CI->db;
    }
    public function cek_identic()
	{
		$this->sesi  = $this->CI->session->userdata('isLogin');
		if($this->sesi != TRUE){
			redirect('login/candidate','refresh');
			exit();
		}
	}

	public function cek_akses($kecuali)
	{
		$this->sesi = $this->CI->session->userdata('isLogin');
		$this->hak = $this->CI->session->userdata('Role');
		if($this->hak != $kecuali){
			redirect(base_url());
			exit();
		}
	}

	function Login($uUser, $Pass){
	$Status = "";
	$login=$this->CI->db->query("SELECT *
	 FROM m_candidate WHERE Username ='$User' OR Email = '$User' OR Phone = '$User' AND IsDeleted = 0 ORDER BY Created_at ASC")->row();
	$this->depwd = $this->CI->encryption->decrypt($login->Password);
	if($Login == NULL) {
		return $Status = "not found";
	}
	if($this->depwd == $Pass) {

		$this->CI->session->set_userdata(array(
				'Role' => 'Candidate',
                'isLogin' => TRUE,
                'name' => $login->Name,
                'alias' => $login->Alias,
                'picture' => $login->Picture,
                'Unique_user' => $login->UniqID,
                'username' => $login->Username,
                'email'=> $login->Email,
                'active'=> $login->IsActive
                ));
		$Status = "Sukses";
		return $Status;
	}
	return $Status;
    }
    
    function ValidasiAdd($Table, $Field, $Data){
	$Status = "Found";
	$data=$this->CI->db->query("SELECT *
	 FROM $Table WHERE $Field = '$Data' AND IsDeleted = 0 ORDER BY Created_at ASC ")->row();
	if($data == NULL) {
		$Status = "Not Found";
		return $Status;
	}
	else
	{
		$Status = $data;
	}
	return $Status;
    }

}