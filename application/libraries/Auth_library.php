<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Auth_library {

	function __construct() {
        $this->CI = &get_instance();
        $this->CI->load->database('default');
    	$this->db = $this->CI->db;
    }
    public function cek_auth()
	{
		$this->sesi  = $this->CI->session->userdata('isLogin');
		if($this->sesi != TRUE){
			redirect('login/company','refresh');
			exit();
		}
	}

	public function cek_akses($Kecuali)
	{
		$this->sesi = $this->CI->session->userdata('isLogin');
		$this->hak = $this->CI->session->userdata('Role');
		if($this->hak != $Kecuali){
			redirect(base_url());
			exit();
		}
	}

	function Login($User, $Pass){
	$Status = "";
	$login = $this->CI->db->query("SELECT *
	 FROM m_company WHERE Username = '$User' OR Email = '$User' AND IsDeleted = 0")->row();
	if($login == NULL) {
		return $Status = "not found";
	}	
	$this->depwd = $this->CI->encryption->decrypt($login->Password);
	if($this->depwd == $Pass) {

		$this->CI->session->set_userdata(array(
				'Role' => 'Company',
                'isLogin' => TRUE,
                'name' => $login->Name,
                'alias' => $login->Alias,
                'picture' => $login->Picture,
                'Unique_user' => $login->UniqID,
                'username' => $login->Username,
                'email'=> $login->Email,
                'active'=> $login->IsActive,
                'verified' => $login->Verified,
                'created_at' => $login->Created_at
                ));
		$Status = $login;
		return $Status;
	}
	else {
		return $Status = "not match";
	}
	return $Status;
    }

    function Search($Field, $Data){
	$Status = "Found";
	$data=$this->CI->db->query("SELECT *
	 FROM m_company C LEFT JOIN m_companydetail Cd on Cd.IDCompany = C.ID WHERE C.$Field = '$Data' AND C.IsDeleted = 0 ORDER BY C.Created_at ASC ")->row();
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