<?php
class login extends Controller
{
    var $event = '';
    var $obj_login = '';
    var $m_language = 'eng';
    var $title = '';
    var $tags = '';
    var $description = '';
	
	var $user = '';	
	
	var $cpass = '';
	var $cname = '';	
	var $cemail = '';
	var $cgender = '';	
	var $type_login = '';
	
    function login()
    {
        parent::Controller();
        session_start();
        $this->load->database();
        $this->load->helper('ap_function');
        $this->load->helper('ap_object');
        $this->load->helper('ap_html');
        $this->load->helper('ap_view_helper');
        $this->load->helper('ap_db');
        $this->load->helper('ap_module');
		$this->load->helper('ap_mail');
    }
    private function f_set_cookie($cookie_name, $cookie_value)
    {
        return dbset_cookie('cookie_login_' . $cookie_name, $cookie_value);
    }
    private function f_get_cookie($cookie_name)
    {
        return dbget_cookie('cookie_login_' . $cookie_name);
    }
    private function m_language_key($str_key)
    {
        return $this->lang->line('lbl.login.' . $str_key);
    }
	function login_gg() {
		$this->cname = $_SESSION["name"];
		$this->cemail = $_SESSION["email"];
		$this->cgender = "1";
		$this->type_login = 1;
		//unset($_SESSION['token']);
		$_SESSION["name"] = NULL;
		$_SESSION["email"] = NULL;
		//exit('1');
		$this->do_process();
	}
	function login_fb() {		
		$this->cname = $_SESSION["name"];
		$this->cemail = $_SESSION["email"];
		$this->cgender = $_SESSION["cgender"];
		//exit($this->cname.''.$this->cemail);	
		if ($_SESSION["cgender"] == "male")
			$this->cgender = "1";
		else 
			$this->cgender = "2";
		$this->type_login = 2;
		$_SESSION["name"] = NULL;
		$_SESSION["email"] = NULL;
		$_SESSION["cgender"] = NULL;
		$this->do_process();
	}
	function empty_user_gg() {	
		unset($_SESSION['token']);
		$_SESSION["name"] = NULL;
		$_SESSION["email"] = NULL;
	}
	function empty_user_fb() {	
		//session_start();
		session_unset();
		$_SESSION['fbid'] = NULL;
		$_SESSION['name'] = NULL;
		$_SESSION['email'] =  NULL;
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
    }
    private function caculate_data()
    {
        $this->load->language('ap', $this->m_language);

		$this->db->where("cemail", $this->cemail);
		$member = $this->db->get("tmember");
		$member = $member->row_array();
		if(isset($member["nid"])){
			$data = array('cname' => $this->cname);
			$this->db->where("cemail", $this->cemail);
			$this->db->update("tmember", $data);
			$_SESSION["nid_member"] = $member["nid"];	
		} else {
			$data = array(
                'cname' => $this->cname,
                'cemail' => $this->cemail
            );
            $this->db->insert('tmember', $data);
			$id = dbget_identity();
			$_SESSION["nid_member"] = $id;
			$this->cpass = $this->randomPassword();
			$data = array('cpassword' => md5($this->cpass),'cnote' => 'Pass là '.$this->cpass);
			$this->db->where("cemail", $this->cemail);
			$this->db->update("tmember", $data);
        }
		if(isset($_SESSION["cart"])) {
			redirect(base_url().'thanh-toan');
		} else {
			redirect(base_url());
		}
    }
    function email_active_gg($user,$email){
    	$str = '<p>Xin chào <span style="font-weight:bold;">'.$user.'</span></p><br/>';
    	$str .= '<p>Bạn vừa đăng nhập bằng tài khoản <span style="font-weight:bold;">Google</span> tại <span style="font-weight:bold;">Gunshop.vn</span></p>';
		$str .= '<p>Từ bây giờ bạn có thể sử dụng Email này để đăng nhập vào Website</p>';
		$str .= '<p>Mật khẩu mới cho tài khoản Email này là: <span style="font-weight:bold;">'. $this->cpass .'</span>';	
    	$str .= '<p style="color:red;font-weight:bold;">Gunshop.vn</p>';
    	SendMail("no_reply", $email, "Tài khoản đăng nhập từ Google", $str, $fromfullname = "Gunshop");    
    }
	function email_active_fb($user,$email){
    	$str = '<p>Xin chào <span style="font-weight:bold;">'.$user.'</span></p><br/>';
    	$str .= '<p>Bạn vừa đăng nhập bằng tài khoản <span style="font-weight:bold;">Facebook</span> tại <span style="font-weight:bold;">Gunshop.vn</span></p>';
		$str .= '<p>Từ bây giờ bạn có thể sử dụng Email này để đăng nhập vào Website</p>';
		$str .= '<p>Mật khẩu mới cho tài khoản Email này là: <span style="font-weight:bold;">'. $this->cpass .'</span>';	
    	$str .= '<p style="color:red;font-weight:bold;">Gunshop.vn</p>';
    	SendMail("no_reply", $email, "Tài khoản đăng nhập từ Facebook", $str, $fromfullname = "Gunshop");    
    }
	function randomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}
    private function do_business()
    {
        //$this->output->cache(10);
        $data['title']        = $this->title;
        $data['tags']         = $this->tags;
        $data['description']  = $this->description;

    }
    private function destroy_data()
    {
    }
    private function get_where_guide_string()
    {
        $str = 'where nstatus = "1"';
        return $str;
    }
}