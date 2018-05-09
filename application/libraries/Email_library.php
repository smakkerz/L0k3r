<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Email_library {

	function __construct() {
        $this->CI = &get_instance();
        $this->CI->load->database('data');
        $this->CI->load->model('cruddata_model');
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
		//$headers[] = 'Cc: yusuf.007@sekawan.xyz';
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
		$this->CI->cruddata_model->Add('History_mail', $data);
		return $result;
	}

	public function SendHtml($From = null, $To, $Subject, $Body, $Title, $By)
	{

	}

	public function NotifSession($To, $Subject, $Title)
	{
		$Subject = null;
		$Content = null;
    	$Agent = $this->CI->useragent_library->GetDataClient();
		if($Title == "login")
		{
			$Subject = "Masuk ke Jobs Ar Lizo pada  ".unix_to_human(time());
            $Content = "<html><head><tittle></title></head>
					<body>
					<h3>System Ar Lizo mendeteksi akun ".$To." masuk pada :</h3>
						<p>Waktu : ".unix_to_human(time())."</p>
						<p>Lokasi : ".$Agent['IP']." </p>
						<p>Perangkat : ".$Agent['Device']."</p>
						<p>Browser : ". $Agent['Browser']."</p>
						<p>Sistem Operasi :  ".$Agent['OSystem']."</p>
						<b>Terima kasih telah menggunakan Jobs Ar Lizo (Connect with Us)</b>
					</body>
					</html>";
		} elseif ($Title == "logout") {
			$Subject = "Keluar ke Jobs Ar Lizo pada  ".unix_to_human(time());
            $Content = "<html><head><tittle></title></head>
					<body>
						<p>Waktu : ".unix_to_human(time())."</p>
						<p>Lokasi : ".$Agent['IP']." </p>
						<p>Perangkat : ".$Agent['Device']."</p>
						<p>Browser : ". $Agent['Browser']."</p>
						<p>Sistem Operasi :  ".$Agent['OSystem']."</p>
						<b>Terima kasih telah menggunakan Jobs Ar Lizo (Connect with Us)</b>
					</body>
					</html>";
		}
		return $this->System($To, $Subject, $Content);
	}

	public function NotifPost($To, $Body, $Title)
	{
		$Subject = $Title;
        $Content = "<html><head><tittle></title></head>
        			<body>".$Body."
        			<b>Terima kasih telah menggunakan Jobs Ar Lizo (Connect with Us)</b>
        			</body>
        			</html>";
		return $this->System($To, $Subject, $Content);
	}

	public function System($To, $Subject, $Content)
	{
		return $this->Send(null, $To, $Subject, $Content, $To);
	}
}