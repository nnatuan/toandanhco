<?php
class ajax_actions extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
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
		$iscolor = '';
        if (isset($_POST['id_pro']))
            $id_pro = $_POST['id_pro'];
        if (isset($_POST['qty_pro']))
            $qty_pro = $_POST['qty_pro'];
		if (isset($_POST['iscolor']))
            $iscolor = $_POST['iscolor'];
        add_cart($id_pro, $qty_pro, $iscolor);
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
		$iscolor = '';
        if (isset($_POST['id']))
            $id_pro = $_POST['id'];
        if (isset($_POST['qty']))
            $qty_pro = $_POST['qty'];
		if (isset($_POST['iscolor']))
            $iscolor = $_POST['iscolor'];
        update_cart($id_pro, $qty_pro, $iscolor);
      //exit("done");
    }
    function ajax_remove_cart()
    {
        $id_pro = '';
		$iscolor = '';
        if (isset($_POST['id']))
            $id_pro = $_POST['id'];
		if (isset($_POST['iscolor']))
            $iscolor = $_POST['iscolor'];
        remove_cart($id_pro,$iscolor);
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
	function update_data() {
		$list= $this->db->get("torder_365");
		$list= $list->result_array();

		foreach($list as $data){
			$ctime_search = strtotime($data['ddate01']);
			$data_update = array('ctime_search' => $ctime_search);
			$this->db->where('nid',$data['nid']);
			$this->db->update('torder_365', $data_update);
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
	function dang_nhap()
    {
        $cid      = '';
        $cpassword   = '';
        if (isset($_POST['cid']))
			$cid = $_POST['cid'];		       
        if (isset($_POST['cpassword']))
            $cpassword = $_POST['cpassword'];
		
		$member = get_member($cid, $cpassword);
        if (!isset($member['nid'])) {	
			exit("0");
		} else {
			$_SESSION['nid_member'] = $member['nid'];
			if (!isset($_SESSION["cart"]))
				exit("1");
			else
				exit("2");
		}
    }
	function dang_ky()
	{
		if (isset($_POST['cname']))
            $cname = $_POST['cname'];	
		if (isset($_POST['cid']))
            $cid = $_POST['cid'];
		if (isset($_POST['cemail']))
            $cemail = $_POST['cemail'];
		if (isset($_POST['cpassword']))
            $cpassword = $_POST['cpassword'];
		if (isset($_POST['cbirthday']))
            $cbirthday = $_POST['cbirthday'];
		if (isset($_POST['cgender']))
            $cgender = $_POST['cgender'];
		
		$member = get_member_by_userid($cid);
		$member2 = get_member_by_mail($cemail);
		if (isset($member['nid']) || isset($member2['nid'])) {
			exit("0");
        } else {
			$data           = array(
				"cname" => $cname,
				"cid" => $cid,
				"cphone" => $cid,
				"cemail" => $cemail,
				"cpassword" => md5($cpassword),
				"cbirthday" => $cbirthday,
				"cgender" => $cgender,
				"nstatus" => 1
			);	
			$this->db->insert("tmember", $data);
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
	function khoi_phuc_mk()
	{
		if (isset($_POST['cemail']))
            $cemail = $_POST['cemail'];
		
		$member = get_member_by_mail($cemail);
		if (!isset($member['nid'])) {
			exit("0");
        } else {
			$cpass = $this->randomPassword();
			$data = array('cpassword' => md5($cpass));
			$this->db->where("cemail", $cemail);
			$this->db->update("tmember", $data);
			$str = '<div>';
			$str .= '<p style="color: #2600ff;"><strong>Cảm ơn quý khách đã tin tưởng và sử dụng khẩu trang Perfetta!</strong></p>';
			$str .= '<p>Perfetta rất vui thông báo tài khoản của quý khách đã được thay đổi mật khẩu. Mật khẩu mới là: <strong>'.$cpass.'</strong></p>';
			$str .= '<p><img src="http://nhapchuot.net/demo/shopping/images/logo.png" style="width:100px;"></p>';
			$str .= '</div>';
			$this->send_mail($str,$cemail,"KHÔI PHỤC MẬT KHẨU PERFETTA");
		}
	}
	function dang_xuat() {
		$_SESSION['nid_member'] = NULL;
		redirect(base_url());
	}
	function send_mail($str, $cemail, $subject)
    {
        header("Content-Type: text/html; charset=UTF-8");
		$this->load->library('email');
        $config['protocol']  = 'sendmail';
        $config['charset']   = 'utf-8';
        $config['wordwrap']  = TRUE;
        $config['mailtype']  = "html";
        $config['protocol']  = 'smtp';
        $config['smtp_host'] = 'in-v3.mailjet.com';
        $config['smtp_port'] = '587';
        $config['smtp_user'] = "6f768cb5a8f3ded14ae4054ebe45ebd6";
        $config['smtp_pass'] = "9f3c80e150a3297c87939d4544433d73";
        $config['charset']   = 'utf-8';
        $config['mailtype']  = 'html';
        $config['newline']   = "rn";
        $this->email->initialize($config);
		
		$config = get_config_by_id(1);
        $list      = array(
            $config['cvalue'],
			$cemail
        );
        $this->email->from('no_reply@perfetta.com.vn', $subject);
        //$this->email->to($config['cvalue']);
		$this->email->to($list);
        $this->email->subject($subject);
        $this->email->message($str);
        try {
            $this->email->send();
            // exit('Message has been sent.');
        }
        catch (Exception $e) {
            exit($e->getMessage());
        }
    }
	function rating()
    {
		$ctype        = '';
		$nid_product        = '';
		$crating        = '';
        $cname        = '';
		$cphone        = '';
		$ccontent        = '';
		
		if (isset($_POST['ctype']))
            $ctype = $_POST['ctype'];
		if (isset($_POST['nid_product']))
            $nid_product = $_POST['nid_product'];
		if (isset($_POST['crating']))
            $crating = $_POST['crating'];
        if (isset($_POST['cname']))
            $cname = $_POST['cname'];
		if (isset($_POST['cphone']))
            $cphone = $_POST['cphone'];
		if (isset($_POST['ccontent']))
            $ccontent = $_POST['ccontent'];
		if($nid_product != '') {
			$data = array(
				'ctype' => $ctype,
				'nid_product' => $nid_product,
				'crating' => $crating,
				'cname' => $cname,
				'cphone' => $cphone,
				'ccontent' => $ccontent,
				'nstatus' => 1,
				"ctime" => time()
			);
			$this->db->insert('trating', $data);
		} 
		exit('1');
    }
	
	// code chuyển đổi toàn bộ ảnh các đối tượng sang webp
	function update_product() {
		$list = get_product_all();
		$i=0;
		foreach($list as $data) {
			$pieces = explode(".", $data['cimage']);
			//exit($pieces[1].' --- '.$pieces[0].' --- '.$pieces[2]);
			//exit(count($pieces).'');
			if(count($pieces)==2 && $pieces[1]!="webp") {
				$data_u = array(
					"cimage" => $data['cimage'].'.webp',
					"cimage_resize" => $data['cimage_resize'].'.webp',
					"cproduct_fb" => $data['cproduct_fb'].'.webp',
				);
				$this->db->where("nid", $data['nid']);
				$this->db->update("tproducts", $data_u);
				$i++;
			}
		}
		exit('Đã update '.$i .' record');
	}
	function convert_webp_product() {
		$i=1;
		$handle = opendir('./upload/images_product/');
		while($file = readdir($handle)){
		  if($file !== '.' && $file !== '..'){
			//echo '<img src="upload/images_product/'.$file.'" border="0" />';
			$dir = "./upload/images_product/".$file.'/';
			$images = glob($dir."*.{jpg,png,gif,jfif,jpeg}", GLOB_BRACE);
			//exit(count($images).'-');
			$str='';
			//extract only the name of the file without the extension and save in an array named $find
			foreach( $images as $image ) {
				//exit(count($images).'-');
				//$str .= $image['name'];
				//exit($image);
				$webp_img = webpConvert2($image);
				//exit($webp_img.'<br>'.$image);
				//if($webp_img!==$image)
					delfile($image);
				//echo "<img src='" . $image . "' />";
				$i++;
			}
		  }
		}
		exit('Đã convert '.$i .' record');
	}
	function update_product_img() {
		$list = get_product_img_all();
		$i=0;
		foreach($list as $data) {
			$pieces = explode(".", $data['cimage']);
			//exit($pieces[1].' --- '.$pieces[0].' --- '.$pieces[2]);
			//exit(count($pieces).'');
			if(count($pieces)==2 && $pieces[1]!="webp") {
				$data_u = array(
					"cimage" => $data['cimage'].'.webp'
				);
				$this->db->where("nid", $data['nid']);
				$this->db->update("tproduct_images", $data_u);
				$i++;
			}
		}
		exit('Đã update '.$i .' record');
	}
	function update_cat_product() {
		$list = get_cat_product_all();
		$i=0;
		foreach($list as $data) {
			$pieces = explode(".", $data['cimage']);
			//exit($pieces[1].' --- '.$pieces[0].' --- '.$pieces[2]);
			//exit(count($pieces).'');
			if(count($pieces)==2 && $pieces[1]!="webp") {
				$data_u = array(
					"cimage" => $data['cimage'].'.webp'
				);
				$this->db->where("nid", $data['nid']);
				$this->db->update("tcat_products", $data_u);
				$i++;
			}
		}
		exit('Đã update '.$i .' record');
	}
	function convert_webp_cat_product() {
		$dir = "./upload/image_cat_product/";
		$images = glob($dir."*.{jpg,png,gif,jfif,jpeg}", GLOB_BRACE);
		$i=0;
		foreach( $images as $image ) {
			$webp_img = webpConvert2($image);
			delfile($image);
			$i++;
		}
		exit('Đã convert '.$i .' record');
	}
	function update_sec_product() {
		$list = get_sec_product_all();
		$i=0;
		foreach($list as $data) {
			$pieces = explode(".", $data['cimage']);
			//exit($pieces[1].' --- '.$pieces[0].' --- '.$pieces[2]);
			//exit(count($pieces).'');
			if(count($pieces)==2 && $pieces[1]!="webp") {
				$data_u = array(
					"cimage" => $data['cimage'].'.webp'
				);
				$this->db->where("nid", $data['nid']);
				$this->db->update("tmaterial_products", $data_u);
				$i++;
			}
		}
		exit('Đã update '.$i .' record');
	}
	function convert_webp_sec_product() {
		$dir = "./upload/image_sec_product/";
		$images = glob($dir."*.{jpg,png,gif,jfif,jpeg}", GLOB_BRACE);
		$i=0;
		foreach( $images as $image ) {
			$webp_img = webpConvert2($image);
			delfile($image);
			$i++;
		}
		exit('Đã convert '.$i .' record');
	}
	function convert_webp_fb() {
		$dir = "./upload/fb/";
		$images = glob($dir."*.{jpg,png,gif,jfif,jpeg}", GLOB_BRACE);
		$i=0;
		foreach( $images as $image ) {
			$webp_img = webpConvert2($image);
			delfile($image);
			$i++;
		}
		exit('Đã convert '.$i .' record');
	}
	function update_config() {
		$list = get_config_all();
		$i=0;
		foreach($list as $data) {
			$pieces = explode(".", $data['cimage']);
			if(count($pieces)==2 && $pieces[1]!="webp") {
				$data_u = array(
					"cimage" => $data['cimage'].'.webp'
				);
				$this->db->where("nid", $data['nid']);
				$this->db->update("tconfig", $data_u);
				$i++;
			}
		}
		exit('Đã update '.$i .' record');
	}
	
	function update_news() {
		$list = get_news_all();
		$i=0;
		foreach($list as $data) {
			$pieces = explode(".", $data['cimage_thumb']);
			//exit($pieces[1].' --- '.$pieces[0].' --- '.$pieces[2]);
			//exit(count($pieces).'');
			if(count($pieces)==2 && $pieces[1]!="webp") {
				$data_u = array(
					"cimage_thumb" => $data['cimage_thumb'].'.webp'
				);
				$this->db->where("nid", $data['nid']);
				$this->db->update("tnews", $data_u);
				$i++;
			}
		}
		exit('Đã update '.$i .' record');
	}
	function convert_webp_news() {
		$dir = "./upload/image_article/";
		$images = glob($dir."*.{jpg,png,gif,jfif,jpeg}", GLOB_BRACE);
		$i=0;
		foreach( $images as $image ) {
			$webp_img = webpConvert2($image);
			delfile($image);
			$i++;
		}
		exit('Đã convert '.$i .' record');
	}
	
	function update_banner() {
		$list = get_banner_all();
		$i=0;
		foreach($list as $data) {
			$pieces = explode(".", $data['cimage']);
			//exit($pieces[1].' --- '.$pieces[0].' --- '.$pieces[2]);
			//exit(count($pieces).'');
			if(count($pieces)==2 && $pieces[1]!="webp") {
				$data_u = array(
					"cimage" => $data['cimage'].'.webp'
				);
				$this->db->where("nid", $data['nid']);
				$this->db->update("tbanner_images", $data_u);
				$i++;
			}
		}
		exit('Đã update '.$i .' record');
	}
	function convert_webp_banner() {
		$dir = "./upload/banner/";
		$images = glob($dir."*.{jpg,png,gif,jfif,jpeg}", GLOB_BRACE);
		$i=0;
		foreach( $images as $image ) {
			$webp_img = webpConvert2($image);
			delfile($image);
			$i++;
		}
		exit('Đã convert '.$i .' record');
	}
	
	function update_module() {
		$list = get_module_all();
		$i=0;
		foreach($list as $data) {
			$pieces = explode(".", $data['cimage']);
			//exit($pieces[1].' --- '.$pieces[0].' --- '.$pieces[2]);
			//exit(count($pieces).'');
			if(count($pieces)==2 && $pieces[1]!="webp") {
				$data_u = array(
					"cimage" => $data['cimage'].'.webp'
				);
				$this->db->where("nid", $data['nid']);
				$this->db->update("tmodule", $data_u);
				$i++;
			}
		}
		exit('Đã update '.$i .' record');
	}
	function convert_webp_module() {
		$dir = "./upload/images_module/";
		$images = glob($dir."*.{jpg,png,gif,jfif,jpeg}", GLOB_BRACE);
		$i=0;
		foreach( $images as $image ) {
			$webp_img = webpConvert2($image);
			delfile($image);
			$i++;
		}
		exit('Đã convert '.$i .' record');
	}
	function convert_webp_images() {
		$dir = "./images/";
		$images = glob($dir."*.{jpg,png,gif,jfif,jpeg}", GLOB_BRACE);
		$i=0;
		foreach( $images as $image ) {
			$webp_img = webpConvert2($image);
			delfile($image);
			$i++;
		}
		exit('Đã convert '.$i .' record');
	}
	
	function convert_webp() {
		$handle = opendir('./upload/images_product/');
		while($file = readdir($handle)){
		  if($file !== '.' && $file !== '..'){
			//echo '<img src="upload/images_product/'.$file.'" border="0" />';
			$dir = "./upload/images_product/".$file.'/';
			$images = glob($dir."*.{jpg,png,gif,jfif,jpeg}", GLOB_BRACE);
			//exit(count($images).'-');
			$str='';
			//extract only the name of the file without the extension and save in an array named $find
			foreach( $images as $image ) {
				//exit(count($images).'-');
				//$str .= $image['name'];
				//exit($image);
				$webp_img = webpConvert2($image);
				//exit($webp_img.'<br>'.$image);
				//if($webp_img!==$image)
					delfile($image);
				//echo "<img src='" . $image . "' />";
			}
		  }
		}
		exit('1');
		
		$dir = "./upload/images_product/*";
		//$dir = "./upload/image_article/*.jpg";
		//get the list of all files with .jpg extension in the directory and safe it in an array named $images
		//$images = glob( $dir );
		$images = glob($dir."*.{jpg,png,gif,jfif,jpeg}", GLOB_BRACE);
		exit(count($images).'-');
		$str='';
		//extract only the name of the file without the extension and save in an array named $find
		foreach( $images as $image ) {
			//exit(count($images).'-');
			//$str .= $image['name'];
			//exit($image);
			$webp_img = webpConvert2($image);
			//exit($webp_img.'<br>'.$image);
			//if($webp_img!==$image)
				delfile($image);
			//echo "<img src='" . $image . "' />";
		}
		exit('1');
		//exit($str);
	}
	function convert_webp2() {
		$dir = "./upload/image_article/*.jpg";
		//get the list of all files with .jpg extension in the directory and safe it in an array named $images
		$images = glob( $dir );

		//extract only the name of the file without the extension and save in an array named $find
		foreach( $images as $image ) {
			$jpg=imagecreatefromjpeg($image);
			$w=imagesx($jpg);
			$h=imagesy($jpg);
			$webp=imagecreatetruecolor($w,$h);
			imagecopy($webp,$jpg,0,0,0,0,$w,$h);
			imagewebp($webp, 'filename.webp', 80);
			//imagedestroy($jpg);
			//imagedestroy($webp);
		}
		exit('1');
	}
	// code chuyển đổi toàn bộ ảnh các đối tượng sang webp
	
	function get_count_product() {
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$list = get_product_all();
		$i=0;
		foreach($list as $data) {
			//exit(strtotime($data['ddate01']).'');
			if(strtotime($data['ddate01'])>=1721754000)
				$i++;
		}
		exit($i.'');
	}
	
}
	