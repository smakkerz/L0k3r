<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Email_library {

	function __construct() {
        $this->CI = &get_instance();
        $this->CI->load->database('data');
        $this->CI->load->model(array('cruddata_model','dverification_model'));
        $this->CI->load->helper('url');
    	$this->db = $this->CI->db;
    }

	public function Send($From= null, $To, $Subject, $Body, $By)
	{
		$From = $From == null ? 'System Ar Lizo-Job <System-jobs@arlizo.com>' : $From;
		// To send HTML mail, the Content-type header must be set
		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-type: text/html; charset=iso-8859-1';

		// Additional headers
		//$headers[] = 'To: Yusuf <yusufadhi77@gmail.com>, Rio <riobermano92@gmail.com>';
		$headers[] = 'From: '.$From;
		$headers[] = 'Cc: now.jobsarlizo@arlizo.com';
		//$headers[] = 'Bcc: yusuf.007@sekawan.xyz';

		// Mail it
		$result = mail($To, $Subject, $Body, implode("\r\n", $headers));

		$Uniq = $To.date('Y-m-d').'-'.date('His');
		$data = array (
				'UniqID' => $Uniq,
				'Email_to' => $To,
				'Email_subject' => $Subject,
				'Email_body' => $Body,
				'Email_status' => $result == 1 ? 'sukses' : 'gagal',
				'Created_at' => date('Y-m-d H:i:s'),
				'Created_by' => $By
				);
		$this->CI->cruddata_model->Add('History_mail', $data, $By);
		return $result;
	}

	public function SendVerifikasi($Status, $Url)
	{
		$By = $this->CI->session->userdata('name');
		$key = uniqid();
    	$data = array (
			'Keep' => $key,
			'UniqID' => $this->CI->session->userdata('Unique_user'),
			'Role' => $this->CI->session->userdata('Role'),
			'Status' => $Status,
			'Expired_at' => date('Y-m-d H:i:s', strtotime('+90 hours'))
			);
    	$this->CI->dverification_model->Insert($data, $By);
    	$Url = $Url.$key;
        return $this->NotifVerify($this->CI->session->userdata('email'), $Url, $By);
	}

	public function NotifVerify($To, $Url, $By=null)
	{
		$By = $By == null ? $To : $By;
		$Title = "Verifikasi Akun Jobs Ar Lizo";
		$Content = "<p>Terima kasih telah mendaftar di Jobs Ar Lizo</p>
					<p><b>Ayo</b>, verifikasi akun Anda klik tombol dibawah ini</p>
					<h3 style='center'><a href='".$Url."'>Verifikasi Akun</a></h3>
					<p> berlaku selama 90 jam kedepan</p>";
		return $this->NotifbySystem($To, $Content, $Title, $Title);

	}

	public function NotifSession($To, $Subject, $Title)
	{
		$Subject = null;
		$Content = null;
    	$Agent = $this->CI->useragent_library->GetDataClient();
		if($Title == "login")
		{
			$Subject = "Masuk ke Jobs Ar Lizo pada  ".unix_to_human(time());
            $Content = "<h3>System Jobs Ar Lizo mendeteksi akun ".$To." masuk pada :</h3>
							<p>Waktu : ".unix_to_human(time())."</p>
							<p>Lokasi : ".$Agent['IP']." </p>
							<p>Perangkat : ".$Agent['Device']."</p>
							<p>Browser : ". $Agent['Browser']."</p>
							<p>Sistem Operasi :  ".$Agent['OSystem']."</p>";
		}
		return $this->NotifbySystem($To, $Content, $Subject, $Subject);
	}

	public function NotifbySystem($To, $Body, $Title, $Head)
	{
		$Subject = $Title;
        $Content = "<html><head><tittle>".$Head."</title></head>
        			<body>".$Body."
        			<b>Terima kasih telah menggunakan Jobs Ar Lizo (Connect with Us, Connect to All)</b>
        			<a href='arlizo.com'>Ar Lizo</a>
        			</body>
        			</html>";
		return $this->System($To, $Subject, $Content);
	}

	public function System($To, $Subject, $Content)
	{
		return $this->Send(null, $To, $Subject, $Content, $To);
	}
}