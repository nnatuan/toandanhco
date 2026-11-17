<?php
class contact extends CI_Controller
{
    var $data_view = '';
    var $title = '';
    var $tags = '';
    var $description = '';
	var $cname	= '';
	var $ctitle	= '';
	var $cemail	= '';
	var $cphone ='';
	var $ccontent ='';
	var $btn_submit ='';
	var $err_cap = '';
	var $langsite = '';
	
    function __construct()
	{
		parent::__construct();	
        session_start();
        $this->load->database();
        $this->load->helper('ap_function');
        $this->load->helper('ap_object');
        $this->load->helper('ap_html');
        $this->load->helper('ap_view');
        $this->load->helper('ap_db');
		 $this->load->helper('ap_mail');
        $this->load->helper('ap_module');
		$this->load->helper('ap_captcha');
    }
    private function f_set_cookie($cookie_name, $cookie_value)
    {
        return dbset_cookie('cookie_contact_' . $cookie_name, $cookie_value);
    }
    private function f_get_cookie($cookie_name)
    {
        return dbget_cookie('cookie_contact_' . $cookie_name);
    }
    private function m_language_key($str_key)
    {
        return $this->lang->line('lbl.contact.' . $str_key);
    }
    function index()
    {
        $this->do_process();
    }
    function do_process()
    {
        $this->get_data();
        $this->caculate_data();
        $this->do_business();
        $this->destroy_data();
    }
    private function get_data()
    {
        $lang_ = 'eng';
        if (isset($_SESSION['_lang']))
            $lang_ = $_SESSION['_lang'];
        $this->load->language('ap', $lang_);
        $this->langsite = $lang_;
		
		if(isset($_POST['btn_submit']))
			$this->btn_submit = $_POST['btn_submit'];
		if(isset($_POST['cname']))
			$this->cname = $_POST['cname'];
		if(isset($_POST['ctitle']))
			$this->ctitle = $_POST['ctitle'];
		if(isset($_POST['cemail']))
			$this->cemail = $_POST['cemail'];
		if(isset($_POST['ccontent']))
			$this->ccontent = $_POST['ccontent'];		
    }
	function valid_form()
    {
        $recaptcha_secret = "6LeB-hAUAAAAANuqVrQymYJGRxlMpi8EG9Gm7I8_";
        $response         = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $recaptcha_secret . "&response=" . $_POST['g-recaptcha-response']);
        $response         = json_decode($response, true);
        if ($response["success"] === true) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    private function caculate_data()
    {	
		if($this->btn_submit != '')
		{	
			$str_mail = '<div style="width:860px;margin:0 auto;">';
			$str_mail .= '			<table width="100%" style="border-collapse: collapse;">';
			$str_mail .= '			  <tr>';
			$str_mail .= '				 <td style="border: 1px solid #ddd;padding: 10px;color:#f26522;" colspan="2"><strong>Thông tin phản hồi:</strong></td>';
			$str_mail .= '			  </tr>';
			$str_mail .= '			  <tr>';
			$str_mail .= '				 <td style="border: 1px solid #ddd;padding: 10px;width: 30%;"><strong>Họ tên</strong></td>';
			$str_mail .= '				 <td style="border: 1px solid #ddd;padding: 10px;">'.$this->cname.'</td>';
			$str_mail .= '			  </tr>';
			$str_mail .= '			  <tr>';
			$str_mail .= '				 <td style="border: 1px solid #ddd;padding: 10px;"><strong>Email</strong></td>';
			$str_mail .= '				 <td style="border: 1px solid #ddd;padding: 10px;">'.$this->cemail.'</td>';
			$str_mail .= '			  </tr>';
			$str_mail .= '			  <tr>';
			$str_mail .= '				 <td style="border: 1px solid #ddd;padding: 10px;"><strong>Tiêu đề</strong></td>';
			$str_mail .= '				 <td style="border: 1px solid #ddd;padding: 10px;">'.$this->ctitle.'</td>';
			$str_mail .= '			  </tr>';
			$str_mail .= '			  <tr>';
			$str_mail .= '				 <td style="border: 1px solid #ddd;padding: 10px;"><strong>Nội dung:</strong></td>';
			$str_mail .= '				 <td style="border: 1px solid #ddd;padding: 10px;">'.$this->ccontent.'</td>';
			$str_mail .= '			  </tr>';
			$str_mail .= '			 </table>';
			$str_mail .= '</div>';
			exit($str_mail);
			$config = get_config_by_id(1);
			SendMail("no_reply@toandanhco.com", $config['cvalue'], "Liên hệ ToanDanh", $str, "ToanDanh");
		}
    }
    private function do_business()
    {	
		$this->title = "Liên hệ";
        $data['title']       = $this->title;
        $data['tags']        = $this->tags;
        $data['description'] = $this->description;
        $data['menu_cat']    = '';
        $data['menu_news']   = '';
        $data['menu_top'] = 'contact';
        $data['langsite']    = $this->langsite;

		$data['cname']    = $this->cname;
		$data['ctitle']    = $this->ctitle;
		$data['cemail']    = $this->cemail;

		$data['ccontent']    = $this->ccontent;
		$data['err_cap']    = $this->err_cap;

        $this->load->view('contact', $data);
    }
    private function destroy_data()
    {
    }
}