<?php
class ajax_actions extends Controller
{
    function ajax_actions()
    {
        parent::Controller();
        session_start();
        $this->load->database();
        $this->load->helper('ap_db');
        $this->load->helper('ap_object');
        $this->load->helper('ap_function');
        $this->load->helper('ap_view');
        $this->load->helper('ap_module');
        $this->load->helper('ap_cart');
        $this->load->helper('ap_mail');
    }
    function ajax_post_cart()
    {
        $id_pro  = '';
        $qty_pro = '';
        if (isset($_POST['id_pro']))
            $id_pro = $_POST['id_pro'];
        if (isset($_POST['qty_pro']))
            $qty_pro = $_POST['qty_pro'];
        add_cart($id_pro, $qty_pro);
		exit("done");
    }
	function ajax_post_cart2()
	{
		$ds = []; 
        $qty_pro = '';
        if (isset($_POST['ds']))
			$ds = $_POST['ds'];
        if (isset($_POST['qty_pro']))
            $qty_pro = $_POST['qty_pro'];
		for ($i=0; $i<count($ds); $i++)
			add_cart($ds[$i], $qty_pro);
		exit("done");
	}
    function ajax_update_cart()
    {
        $id_pro  = '';
        $qty_pro = '';
        if (isset($_POST['id']))
            $id_pro = $_POST['id'];
        if (isset($_POST['qty']))
            $qty_pro = $_POST['qty'];
        update_cart($id_pro, $qty_pro);
      //exit("done");
    }
    function ajax_remove_cart()
    {
        $id_pro = '';
        if (isset($_POST['id']))
            $id_pro = $_POST['id'];
        remove_cart($id_pro);
       exit("done");
    }
	function get_email()
    {
        $cemail = '';
		if (isset($_POST['cemail']))
		{
			$_SESSION["cemail"] = $_POST['cemail'];
		} 
       exit("done");
    }
	function get_district() 
	{
		$obj_ds = get_all_district();
		exit(json_encode($obj_ds));
	}
    function register_member()
    {
        $cgender        = '';
        $cuser   = '';
        $cemail      = '';
        $cphone      = '';
        $cpassword   = '';
        $crepassword = '';
		$recaptcha = '';
        if (isset($_POST['cgender']))
            $cgender = $_POST['cgender'];
        if (isset($_POST['cuser']))
            $cuser = $_POST['cuser'];
        if (isset($_POST['cemail']))
            $cemail = $_POST['cemail'];
        if (isset($_POST['cphone']))
            $cphone = $_POST['cphone'];
        if (isset($_POST['cpassword']))
            $cpassword = $_POST['cpassword'];
        if (isset($_POST['crepassword']))
            $crepassword = $_POST['crepassword'];
		if (isset($_POST['recaptcha']))
            $recaptcha = $_POST['recaptcha'];
		$active_code = md5($cpassword.time());
        if (get_user_bymail($cemail) != NULL) {
			exit("0");
        } else {
            if (strcmp($cpassword, $crepassword) != 0) {
                exit("1");
            } else {
				if($this->valid_form($recaptcha) == false) {	
					exit("2");
				} else {
					$data = array(
						'cgender' => $cgender,
						'cuser' => $cuser,
						'cemail' => $cemail,
						'cphone' => $cphone,
						'cactive' => '1',
						'cactive_code' => $active_code,
						'cpassword' => md5($cpassword)
					);
					$this->db->insert('tmember', $data);
					$_SESSION['cemail_log'] = $cemail;
					exit("3");
					//$this->email_active($cuser,$active_code,$cemail);  
				}
            }
        }
    }
    function email_active($user,$active_code,$email){
    	$str="<p>Xin chào ".$user."</p><br/>";
    	$str .= "<p>Cám ơn bạn đã đăng ký tài khoản tại Gunshop.vn</p>";
    	$str .= "<p>Để có thể đăng nhập tài khoản và sử dụng các tiện ích của website. Vui lòng kích hoạt tài khoản bằng cách click vào <a href='".base_url()."active-account/".$active_code."'>link này.</p><br/>";
    	$str.="<p>Gunshop.vn</p>";
    	SendMail("no_reply", $email, "Kích hoạt tài khoản tại Gunshop", $str, $fromfullname = "Gunshop");
    }
	function valid_form($recaptcha)
    {
        $recaptcha_secret = "6LddFQsUAAAAAMNEOfzkEB3Tw8jtcIyYxpap22bH";
        $response         = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $recaptcha_secret . "&response=" . $recaptcha);
        $response         = json_decode($response, true);
        if ($response["success"] === true) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	function get_pass_forgot()
	{
		$cemail      = '';
		if (isset($_POST['cemail']))
            $cemail = $_POST['cemail'];
		$obj_user = get_user_bymail($cemail);
		if ($obj_user == NULL) {	
			exit("0");
		} else {
			$new_pass = $this->randomPassword();
			$data = array('cpassword' => md5($new_pass));
			$this->db->where('cemail', $cemail);
			$this->db->update('tmember', $data);
			$this->send_mail_get_pass($obj_user['cuser'], $cemail, $new_pass);
			exit("1");
		}
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
	function send_mail_get_pass($user, $cemail, $pass){
    	$str="<p>Xin chào <strong>".$user."</strong></p><br/>";
    	$str .= "<p>Cám ơn bạn đã sử dụng dịch vụ tại <strong>Gunshop.vn</strong></p>";
		$str .= "<p>Bạn đã yêu cầu chúng tôi gửi lại mật khẩu cho bạn</p>";
    	$str .= '<p>Mật khẩu hiện tại của bạn là: <span style="font-weight:bold;">'.$pass.'</span><p>';
    	$str .= '<p style="color:red;font-weight:bold;">Gunshop.vn</p>';
    	SendMail("no_reply", $cemail, "Khôi phục mật khẩu tại Gunshop", $str, $fromfullname = "Gunshop");
    }
	function login_member()
    {
        $cemail_log      = '';
        $cpassword_log   = '';
        if (isset($_POST['cemail_log']))
			$cemail_log = $_POST['cemail_log'];		       
        if (isset($_POST['cpassword_log']))
            $cpassword_log = $_POST['cpassword_log'];
		
		$obj_user = get_user_bymail_andpass($cemail_log, $cpassword_log);
        if ($obj_user == NULL) {	
			exit("false");
		} else {
			$_SESSION['cemail_log'] = $cemail_log;
			$_SESSION['cemail'] = NULL;
			exit("true");
		}
    }
	function logout_member() {
		$_SESSION['cemail_log'] = NULL;
		exit("done");
	}
	function update_name_member() {
		$cname = '';
        if (isset($_POST['cname']))
            $cname = $_POST['cname'];
		
		$members= $this->db->get("tmember");
		$members= $members->result_array();

		foreach($members as $member){
			$data = array('cuser' => $cname);
			$this->db->where('cemail', $_SESSION['cemail_log']);
			$this->db->update('tmember', $data);
		}
		exit($cname);
	}
	function update_phone_member() {
		$cphone = '';
        if (isset($_POST['cphone']))
            $cphone = $_POST['cphone'];
		
		$members= $this->db->get("tmember");
		$members= $members->result_array();

		foreach($members as $member){
			$data = array('cphone' => $cphone);
			$this->db->where('cemail', $_SESSION['cemail_log']);
			$this->db->update('tmember', $data);
		}
		exit($cphone);
	}
	function update_address_member() {
		$caddress = '';
        if (isset($_POST['caddress']))
            $caddress = $_POST['caddress'];
		
		$members= $this->db->get("tmember");
		$members= $members->result_array();

		foreach($members as $member){
			$data = array('caddress' => $caddress);
			$this->db->where('cemail', $_SESSION['cemail_log']);
			$this->db->update('tmember', $data);
		}
		exit($caddress);
	}
	function update_gender_member() {
		$cgender = '';
        if (isset($_POST['cgender']))
            $cgender = $_POST['cgender'];
		
		$members= $this->db->get("tmember");
		$members= $members->result_array();

		foreach($members as $member){
			$data = array('cgender' => $cgender);
			$this->db->where('cemail', $_SESSION['cemail_log']);
			$this->db->update('tmember', $data);
		}
		exit($cgender);
	}
	function update_order() {
		$members= $this->db->get("torder");
		$members= $members->result_array();

		foreach($members as $member){
			$data = array('nid_code_sale' => 0);
			$this->db->where('nid',$member['nid']);
			$this->db->update('torder', $data);
		}
		exit("done");
	}
	function update_pass_member() {
		$cpass_old = '';
		$cpass_new = '';
		$user = '';
		
		if (isset($_POST['cpass_old']))
            $cpass_old = $_POST['cpass_old'];
		if (isset($_POST['cpass_new']))
            $cpass_new = $_POST['cpass_new'];
		
		$this->db->where("cemail", $_SESSION['cemail_log']);
		$this->db->where("cpassword", md5($cpass_old));
		$user = $this->db->get("tmember");
		$user = $user->row_array();
		
		if(isset($user["nid"])){
			$data = array('cpassword' => md5($cpass_new));
			$this->db->where("cemail", $_SESSION['cemail_log']);
			$this->db->where("cpassword", md5($cpass_old));
			$this->db->update("tmember", $data);
			exit("1");
		}
		exit("0");
	}
	function empty_cart()
    {
        $_SESSION["cart"] 		= NULL;
		$_SESSION["cname"]     = NULL;
		$_SESSION["cemail"]    = NULL;
		$_SESSION["cphone"]    = NULL;
		$_SESSION["cquantity"] = NULL;
		$_SESSION["cnote"]     = NULL;
		$_SESSION["caddress"]     = NULL;
		$_SESSION["empty"] = NULL;
		
		$_SESSION["cemail_log"]    = NULL;
		
		$_SESSION["cgender"]  = NULL;
		$_SESSION["cfullname"] = NULL;
		$_SESSION["cphone"] = NULL;
		$_SESSION['caddress'] = NULL;
		$_SESSION['province'] = NULL ;
		$_SESSION['district'] = NULL;
		$_SESSION['cvat_company'] = NULL;
		$_SESSION['cvat_tax'] = NULL;
		$_SESSION['cvat_address'] = NULL;
		$_SESSION['cgift'] = NULL;
		$_SESSION['price_sale'] = NULL;
		$_SESSION['per_sale'] = NULL;
		$_SESSION['nsale'] = NULL;
		$_SESSION['nid_code_sale'] = NULL;
    }
		function get_all_location() {
		$obj_loc = get_all_location();
		exit(json_encode($obj_loc));
	}
	function get_location_by_province() {
		$nid = '';
		if (isset($_POST['nid']))
			$nid = $_POST['nid'];
		$obj_loc = get_location_by_province($nid);
		exit(json_encode($obj_loc));
	}
	function get_location_by_district() {
		$nid = '';
		if (isset($_POST['nid']))
			$nid = $_POST['nid'];
		$obj_loc = get_location_by_district($nid);
		exit(json_encode($obj_loc));
	}
	function get_location_by_id() {
		$nid = '';
		if (isset($_POST['nid']))
			$nid = $_POST['nid'];
		$obj_loc = get_location_by_id($nid);
		exit(json_encode($obj_loc));
	}
	function get_district_loc_by_province() {
		$nid = '';
		if (isset($_POST['nid']))
			$nid = $_POST['nid'];
		$obj_data = get_district_loc_by_province($nid);
		exit(json_encode($obj_data));
	}
	function get_all_district_loc() {
		$obj_data = get_all_district_loc();
		exit(json_encode($obj_data));
	}	
	function check_code_sale()
	{
		$code      = '';
		if (isset($_POST['code']))
            $code = $_POST['code'];
		if (isset($_SESSION["cart"]))
            $obj_cart = $_SESSION["cart"];
		$str = "0";
		
		$code_sale = get_code_sale_bycode($code);
		if(isset($code_sale['ccode'])) {
			if($code_sale['ctype'] == "0" || $code_sale['cactive'] == "0") {
				$_SESSION['per_sale'] = $code_sale['cper'];
				$data = array('cactive' => "1");
				$this->db->where('nid',$code_sale['nid']);
				$this->db->update('tcode_sale', $data);
				$str = "1";
			} else {
				$str = "2";
			}
		}
		/*
		foreach ($obj_cart as $cart) {
			$product = get_product_detail($cart['id']);
			if(isset($product['nid_code_sale'])) {
				$code_sale = get_code_sale_detail($product['nid_code_sale']);
				if(isset($code_sale['ccode']) && $code_sale['ccode'] == $code) {
					if ($product['fprice_sale'] < $product['fprice'] && $product['ncheck'] == 1) 
						$price = $product['fprice_sale'];
					else
						$price = $product['fprice'];
					
					$str = "1";
					$_SESSION['price_sale'] = (($code_sale['cper']*$price)/100)*$cart['qty'];
					$_SESSION['nid_code_sale'] = $code_sale['nid'];
					break;
				}
			}
        }
		
		$list_code = get_code_sale_all();
		foreach ($list_code as $data) {
			if($data['call'] == "1" && $data['ccode'] == $code) {
				$str = "2";
				$_SESSION['per_sale'] = $data['cper'];
				$_SESSION['nid_code_sale'] = $data['nid'];
				break;
			}
		}*/
		
		exit($str);
	}
}
	