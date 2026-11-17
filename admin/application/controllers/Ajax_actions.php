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
        //$this->load->helper('ap_module');
        //$this->load->helper('ap_cart');
        //$this->load->helper('ap_mail');
		$this->tokaban_system_check = '1';  
    }
	function update_session_name()
    {
        $value  = '';
        if (isset($_POST['value']))
            $_SESSION['cname'] = $_POST['value'];
		exit("done");
    }
	function update_session_email()
    {
        $value  = '';
        if (isset($_POST['value']))
            $_SESSION['cemail'] = $_POST['value'];
		exit("done");
    }
	function update_session_sdt()
    {
        $value  = '';
        if (isset($_POST['value']))
            $_SESSION['cphone'] = $_POST['value'];
		exit("done");
    }
	function update_session_address()
    {
        $value  = '';
        if (isset($_POST['value']))
            $_SESSION['caddress'] = $_POST['value'];
		exit("done");
    }
	function update_session_website()
    {
        $value  = '';
        if (isset($_POST['value']))
            $_SESSION['cwebsite'] = $_POST['value'];
		exit("done");
    }
	/*
	function change_color()
    {
        $id_color_old  = '';
		$id_color_new = '';
        if (isset($_POST['id_color_old']))
            $id_color_old = $_POST['id_color_old'];
		if (isset($_POST['id_color_new']))
            $id_color_new = $_POST['id_color_new'];
        change_color_cart($id_color_old,$id_color_new);
		exit("done");
    }*/
	function ajax_change_qty_cart()
    {
        $id_pro  = '';
        $qty_pro = '';
        if (isset($_POST['id_pro']))
            $id_pro = $_POST['id_pro'];
        if (isset($_POST['qty_pro']))
            $qty_pro = $_POST['qty_pro'];
        change_qty_cart($id_pro, $qty_pro);
		exit("done");
    }
	function ajax_update_chiet_xuat_cart()
    {
        $id  = '';
        if (isset($_POST['id']))
            $id = $_POST['id'];
		if (isset($_POST['cprice_sale_vnd']))
            $cprice_sale_vnd = $_POST['cprice_sale_vnd'];
		if (isset($_POST['cprice_sale_per']))
            $cprice_sale_per = $_POST['cprice_sale_per'];
		if (isset($_POST['cnote']))
            $cnote = $_POST['cnote'];
        update_chiet_xuat_cart($id, $cprice_sale_vnd, $cprice_sale_per, $cnote);
		exit("done");
    }
	function ajax_decrement_cart()
    {
        $id_pro  = '';
        if (isset($_POST['id_pro']))
            $id_pro = $_POST['id_pro'];
        decrement_cart($id_pro);
		exit("done");
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
	function check_code_sale()
	{
		$code      = '';
		if (isset($_POST['code']))
            $code = $_POST['code'];
		if (isset($_SESSION["cart"]))
            $obj_cart = $_SESSION["cart"];
		$str = "0";
		foreach ($obj_cart as $cart) {
			$unit = get_unit_detail($cart['id']);
			$product = get_product_detail($unit['nid_product']);
			if(isset($product['nid_code_sale'])) {
				$code_sale = get_code_sale_detail($product['nid_code_sale']);
				if(isset($code_sale['ccode']) && $code_sale['ccode'] == $code) {
					$price = $unit['cprice'];
					if($unit['cprice_flash_sale'] != 0 && $unit['cprice_flash_sale'] != "")
						$price = $unit['cprice_flash_sale'];
					else if($unit['cprice_sale'] != 0 && $unit['cprice_sale'] != "")
						$price = $unit['cprice_sale'];
					
					$str = "1";
					$_SESSION['price_sale'] = (($code_sale['cper']*$price)/100)*$cart['qty'];
					
					break;
				}
			}
        }
		
		$list_code = get_code_sale_all();
		//exit(count($list_code).'-');
		foreach ($list_code as $data) {
			if($data['call'] == "1" && $data['ccode'] == $code) {
				$str = "2";
				$_SESSION['per_sale'] = $data['cper'];
				break;
			}
		}
		
		exit($str);
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
	
	function gui_phan_hoi()
    {
        $ctitle   = '';
        $ccontent      = '';

        if (isset($_POST['ctitle']))
            $ctitle = $_POST['ctitle'];
        if (isset($_POST['ccontent']))
            $ccontent = $_POST['ccontent'];

        $data = array(
			'ctitle' => $ctitle,
			'ccontent' => $ccontent,
			'nid_user' => Fget_userdata('session_nid_user'),
			'ctime' => time()
		);
		$this->db->insert('tgop_y', $data);
		exit("1");
    }
    function register_member()
    {
        $cname   = '';
        $cemail      = '';
        $cpassword   = '';
        $cre_password = '';
        if (isset($_POST['cname']))
            $cname = $_POST['cname'];
        if (isset($_POST['cemail']))
            $cemail = $_POST['cemail'];
        if (isset($_POST['cpassword']))
            $cpassword = $_POST['cpassword'];
        if (isset($_POST['cre_password']))
            $cre_password = $_POST['cre_password'];
		$active_code = md5($cpassword.time());
        if (get_user_bymail($cemail) != NULL) {
			exit("0");
        } else {
            if (strcmp($cpassword, $cre_password) != 0) {
                exit("1");
            } else {
				$data = array(
					'cname' => $cname,
					'cemail' => $cemail,
					'cactive' => '1',
					'cactive_code' => $active_code,
					'cpassword' => md5($cpassword)
				);
				$this->db->insert('tmember', $data);
				exit("2");
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
        $cusername      = '';
        $cpassword   = '';
        if (isset($_POST['cusername']))
			$cusername = $_POST['cusername'];		       
        if (isset($_POST['cpassword']))
            $cpassword = $_POST['cpassword'];
		
		$member = get_member_login($cusername, $cpassword);
        if ($member == NULL) {	
			exit("false");
		} else {
			$_SESSION['nid_member'] = $member['nid'];
			$_SESSION['type'] = 0;
			exit("true");
		}
    }
	function login_member_sale()
    {
        $cusername      = '';
        $cpassword   = '';
        if (isset($_POST['cusername']))
			$cusername = $_POST['cusername'];		       
        if (isset($_POST['cpassword']))
            $cpassword = $_POST['cpassword'];
		
		$member = get_member_login($cusername, $cpassword);
        if ($member == NULL) {	
			exit("false");
		} else {
			$_SESSION['nid_member'] = $member['nid'];
			$_SESSION['type'] = 1;
			exit("true");
		}
    }
	function logout_member() {
		$_SESSION['nid_member'] = NULL;
		$_SESSION['type'] = NULL;
		empty_cart();
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
		$_SESSION['nid_district'] = NULL;
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
	function get_id_district() {
		$nid_district = '';
		if (isset($_POST['nid_district']))
            $_SESSION['nid_district'] = $_POST['nid_district'];
		exit("done");
	}
	function update_product() {
		$this->db->set('cshort_content', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ac pretium ex. Donec lacinia enim quis viverra vehicula. Nullam sed rutrum urna, nec posuere lorem. Donec hendrerit enim at est varius convallis. Vivamus nunc ex, consequat id nisi consequat, tempor malesuada risus. Aliquam maximus massa nec lobortis sodales. Vestibulum a condimentum risus. Sed pretium venenatis ligula, sed faucibus augue rutrum dignissim.</p>');
		$this->db->update('tproducts');
		exit("done");
	}
	function update_order_detail() {
		$members= $this->db->get("torder_detail");
		$members= $members->result_array();

		foreach($members as $member){
			$data = array('cprice_sale_vnd' => 0, 'cprice_sale_per' => 0);
			$this->db->where('nid', $member['nid']);
			$this->db->update('torder_detail', $data);
		}
		exit("done");
	}
	function empty_code_sale()
    {
        $_SESSION["price_sale"] 		= NULL;
		$_SESSION["per_sale"] 		= NULL;
	}
	
	function insert_card()
    {
		$nid_wrapper        = '';
        $cname        = '';
		if (isset($_POST['nid_wrapper']))
            $nid_wrapper = $_POST['nid_wrapper'];
        if (isset($_POST['cname']))
            $cname = $_POST['cname'];
		
		$ccode = $this->vn_to_str(implode('-', explode(' ',$cname)));
		$data = array(
			'nid_wrapper' => $nid_wrapper,
			'cname' => $cname,
			'ccode' => $ccode,
			'nstatus' => 1
		);
		$this->db->insert('tcard', $data);
		exit("1");
    }
	function insert_wrapper()
    {
		$nid_board        = '';
        $cname        = '';
		$max        = '';
		if (isset($_POST['nid_board']))
            $nid_board = $_POST['nid_board'];
        if (isset($_POST['cname']))
            $cname = $_POST['cname'];
		$index = get_max_index_wrapper_by_board($nid_board);
		if(isset($index['max']))
			$max = $index['max'] + 1;
		else 
			$max = 1;
		$ccode = $this->vn_to_str(implode('-', explode(' ',$cname)));
		$data = array(
			'nid_board' => $nid_board,
			'cname' => $cname,
			'ccode' => $ccode,
			'cindex' => $max,
			'nstatus' => 1
		);
		$this->db->insert('twrapper', $data);
		exit('1');
    }
	function insert_board()
    {
        $cname        = '';
        if (isset($_POST['cname']))
            $cname = $_POST['cname'];
		
		$ccode = $this->vn_to_str(implode('-', explode(' ',$cname)));
		$data = array(
			'nid_member' => $_SESSION['nid_member'],
			'cname' => $cname,
			'ccode' => $ccode,
			'nstatus' => 1
		);
		$this->db->insert('tboard', $data);
		exit($ccode);
    }
	function edit_card()
    {
		$nid        = '';
        $cdesc        = '';
		if (isset($_POST['nid']))
            $nid = $_POST['nid'];
        if (isset($_POST['cdesc']))
            $cdesc = $_POST['cdesc'];
		
		$data = array(
			'cdesc' => $cdesc
		);
		$this->db->where("nid", $nid);
		$this->db->update("tcard", $data);
		exit("1");
    }
	function edit_wrapper()
    {
		$nid        = '';
        $cname        = '';
		if (isset($_POST['nid']))
            $nid = $_POST['nid'];
        if (isset($_POST['cname']))
            $cname = $_POST['cname'];
		
		$data = array(
			'cname' => $cname
		);
		$this->db->where("nid", $nid);
		$this->db->update("twrapper", $data);
		exit("1");
    }
	function edit_card_name()
    {
		$nid        = '';
        $cname        = '';
		if (isset($_POST['nid']))
            $nid = $_POST['nid'];
        if (isset($_POST['cname']))
            $cname = $_POST['cname'];
		
		$data = array(
			'cname' => $cname
		);
		$this->db->where("nid", $nid);
		$this->db->update("tcard", $data);
		exit("1");
    }
	function add_comment()
    {
		$nid        = '';
        $ccontent        = '';
		if (isset($_POST['nid']))
            $nid = $_POST['nid'];
        if (isset($_POST['ccontent']))
            $ccontent = $_POST['ccontent'];
		
		$data = array(
			'nid_card' => $nid,
			'nid_member' => $_SESSION['nid_member'],
			'ccontent' => $ccontent,
			'ctime' => time(),
			'nstatus' => 1
		);
		$this->db->insert('tcomment', $data);
		exit("1");
    }
	function add_invite()
    {
		$nid_board        = '';
        $nid_member       = '';
		if (isset($_POST['nid_board']))
            $nid_board = $_POST['nid_board'];
        if (isset($_POST['nid_member']))
            $nid_member = $_POST['nid_member'];
		
		$data = array(
			'nid_board' => $nid_board,
			'nid_member' => $nid_member
		);
		$this->db->insert('tboard_member', $data);
		exit("1");
    }
	function del_member_invite()
    {
        $nid_board        = '';
        $nid_member       = '';
		if (isset($_POST['nid_board']))
            $nid_board = $_POST['nid_board'];
        if (isset($_POST['nid_member']))
            $nid_member = $_POST['nid_member'];
		
		$this->db->where('nid_member', $nid_member);
		$this->db->where('nid_board', $nid_board);
		$this->db->delete('tboard_member', $data);
		exit("1");
    }
	function swap_index_wrapper()
    {
		$id1        = '';
        $id2       = '';
		if (isset($_POST['id1']))
            $id1 = $_POST['id1'];
        if (isset($_POST['id2']))
            $id2 = $_POST['id2'];
		$wrapper1 = get_wrapper_by_id($id1);
		$wrapper2 = get_wrapper_by_id($id2);
		/*
		$data = array(
			'nid_board' => $nid_board,
			'nid_member' => $nid_member
		);
		$this->db->insert('tboard_member', $data);*/
		
		//$tmp = $wrapper1['cindex'];
		$data1 = array(
			'cindex' => $wrapper1['cindex']
		);
		$data2 = array(
			'cindex' => $wrapper2['cindex']
		);
		$this->db->where("nid", $id1);
		$this->db->update("twrapper", $data2);
		$this->db->where("nid", $id2);
		$this->db->update("twrapper", $data1);
		exit($id1.'-'.$id2.'---'.$wrapper1['cindex'] . '-' . $wrapper2['cindex']);
    }
	function vn_to_str ($str){
	 
	$unicode = array(
	 
		'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
		 
		'd'=>'đ',
		 
		'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
		 
		'i'=>'í|ì|ỉ|ĩ|ị',
		 
		'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
		 
		'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
		 
		'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
		 
		'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
		 
		'D'=>'Đ',
		 
		'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		 
		'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
		 
		'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
		 
		'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
		 
		'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
		 
		);
		 
		foreach($unicode as $nonUnicode=>$uni){
		 
		$str = preg_replace("/($uni)/i", $nonUnicode, $str);
		 
		}
		//$str = str_replace(' ','_',$str);
		 
		return $str;
	 
	}
	function phat_sinh_ma_giam_gia() {
		$sl        = '';
		$cper        = '';
		$ctype        = '';
		$call        = '';
		if (isset($_POST['sl']))
            $sl = $_POST['sl'];
		if (isset($_POST['cper']))
            $cper = $_POST['cper'];
		if (isset($_POST['ctype']))
            $ctype = $_POST['ctype'];
		if (isset($_POST['call']))
            $call = $_POST['call'];
		for($i=0;$i<$sl;$i++) {
			$s = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 6)), 0, 6);
			$data = array(
				'cname' => $s,
				'ccode' => $s,
				'cper' => $cper,
				'ctype' => $ctype,
				'call' => $call,
				'cactive' => "0",
				'nstatus' => 1
			);
			$this->db->insert('tcode_sale', $data);
		}
		exit("done");
	}
	function themDonHangTam() {
		$list = get_order_tmp_by_member(Fget_userdata('session_nid_user'));
		
		foreach($list as $order){
			$data = array('nactive' => 0);
			$this->db->where('nid', $order['nid']);
			$this->db->update('torder_tmp', $data);
		}
			
		$data = array(
			'nid_member' => Fget_userdata('session_nid_user'),
			'cprice_receive' => 0,
			'cprice_refund' => 0,
			'cprice_sale_vnd' => 0,
			'cprice_sale_per' => 0,
			'cnote' => '',
			'nactive' => 1
		);
		$this->db->insert('torder_tmp', $data);
		$id = dbget_identity();
		$_SESSION['nid_order_tmp'] = $id;

		exit("1");
	}
	function xoaDonHangTam() {
		$id        = '';
		if (isset($_POST['id']))
            $id = $_POST['id'];
		
		$this->db->where('nid', $id);
		$this->db->delete('torder_tmp');
		$this->db->where('nid_order', $id);
		$this->db->delete('torder_detail_tmp');
	
		//neu xoa DH cuoi dang active
		$list = get_order_tmp_active_by_member(Fget_userdata('session_nid_user'));
		if(count($list)==0) {
			$order = get_order_tmp_max_id(Fget_userdata('session_nid_user'));
			$data = array('nactive' => 1);
			$this->db->where('nid', $order['nid']);
			$this->db->update('torder_tmp', $data);
			$_SESSION['nid_order_tmp'] = $order['nid'];
		}			

		exit("1");
	}
	function kichHoatDonHangTam() {
		$id        = '';
		if (isset($_POST['id']))
            $id = $_POST['id'];
		$list = get_order_tmp_by_member(Fget_userdata('session_nid_user'));
		
		foreach($list as $order){
			$data = array('nactive' => 0);
			$this->db->where('nid', $order['nid']);
			$this->db->update('torder_tmp', $data);
		}
			
		$data = array('nactive' => 1);
		$this->db->where('nid', $id);
		$this->db->update('torder_tmp', $data);
		$_SESSION['nid_order_tmp'] = $id;

		exit("1");
	}
	function add_cart()
    {
        $id_pro  = '';
        $qty_pro = '';
        if (isset($_POST['id_pro']))
            $id_pro = $_POST['id_pro'];
        if (isset($_POST['qty_pro']))
            $qty_pro = $_POST['qty_pro'];
		
		$order_detail = get_order_detail_tmp_exist($_SESSION['nid_order_tmp'], $id_pro);
		if(isset($order_detail['nid'])) {
			$qty_pro = $qty_pro + $order_detail['nquantity'];
			$data = array('nquantity' => $qty_pro);
			$this->db->where('nid', $order_detail['nid']);
			$this->db->update('torder_detail_tmp', $data);
		} else {
			$data = array(
				'nid_product' => $id_pro,
				'nquantity' => $qty_pro,
				'cprice_sale_vnd' => 0,
				'cprice_sale_per' => 0,
				'cnote' => '',
				'nid_order' => $_SESSION['nid_order_tmp']
			);
			$this->db->insert('torder_detail_tmp', $data);
		}
		
		exit("1");
    }
	function remove_cart()
    {
        $id_pro = '';
        if (isset($_POST['id']))
            $id_pro = $_POST['id'];
		
		$this->db->where('nid_order', $_SESSION['nid_order_tmp']);
		$this->db->where('nid_product', $id_pro);
		$this->db->delete('torder_detail_tmp');
		
		exit("1");
    }
	function change_color()
    {
        $id  = '';
		$id_color = '';
        if (isset($_POST['id']))
            $id = $_POST['id'];
		if (isset($_POST['id_color']))
            $id_color = $_POST['id_color'];
		
		$data = array('nid_product' => $id_color);
		$this->db->where('nid', $id);
		$this->db->update('torder_detail_tmp', $data);
		
		exit("1");
    }
	function decrement_cart()
    {
        $id  = '';
        if (isset($_POST['id']))
            $id = $_POST['id'];
        
		$data = get_order_detail_tmp_by_id($id);
		$data = array('nquantity' => $data['nquantity']-1);
		$this->db->where('nid', $id);
		$this->db->update('torder_detail_tmp', $data);
		
		exit("1");
    }
	function increment_cart()
    {
        $id  = '';
        if (isset($_POST['id']))
            $id = $_POST['id'];
        
		$data = get_order_detail_tmp_by_id($id);
		$data = array('nquantity' => $data['nquantity']+1);
		$this->db->where('nid', $id);
		$this->db->update('torder_detail_tmp', $data);
		
		exit("1");
    }
	function change_qty_cart()
    {
        $id  = '';
        $qty_pro = '';

        if (isset($_POST['id']))
            $id = $_POST['id'];
        if (isset($_POST['qty_pro']))
            $qty_pro = $_POST['qty_pro'];

        $data = array('nquantity' => $qty_pro);
		$this->db->where('nid', $id);
		$this->db->update('torder_detail_tmp', $data);
		
		exit("1");
    }
	function update_chiet_khau_cart()
    {
        $id  = '';
		$cprice_sale_vnd = 0;
		$cprice_sale_per = 0;
		$cnote = '';
        if (isset($_POST['id']))
            $id = $_POST['id'];
		if (isset($_POST['cprice_sale_vnd']))
            $cprice_sale_vnd = $_POST['cprice_sale_vnd'];
		if (isset($_POST['cprice_sale_per']))
            $cprice_sale_per = $_POST['cprice_sale_per'];
		if (isset($_POST['cnote']))
            $cnote = $_POST['cnote'];
        
		$data = array(
			'cprice_sale_vnd' => $cprice_sale_vnd,
			'cprice_sale_per' => $cprice_sale_per,
			'cnote' => $cnote
		);
		$this->db->where('nid', $id);
		$this->db->update('torder_detail_tmp', $data);
		exit("1");
    }
	function update_order_name()
    {
        $value  = '';
        if (isset($_POST['value']))
            $value = $_POST['value'];
		
		$data = array(
			'cname' => $value
		);
		$this->db->where('nid', $_SESSION['nid_order_tmp']);
		$this->db->update('torder_tmp', $data);
		exit("1");
    }
	function update_order_email()
    {
        $value  = '';
        if (isset($_POST['value']))
            $value = $_POST['value'];
		
		$data = array(
			'cemail' => $value
		);
		$this->db->where('nid', $_SESSION['nid_order_tmp']);
		$this->db->update('torder_tmp', $data);
		exit("1");
    }
	function update_order_sdt()
    {
        $value  = '';
        if (isset($_POST['value']))
            $value = $_POST['value'];
		
		$data = array(
			'cphone' => $value
		);
		$this->db->where('nid', $_SESSION['nid_order_tmp']);
		$this->db->update('torder_tmp', $data);
		exit("1");
    }
	function update_order_address()
    {
        $value  = '';
        if (isset($_POST['value']))
            $value = $_POST['value'];
		
		$data = array(
			'caddress' => $value
		);
		$this->db->where('nid', $_SESSION['nid_order_tmp']);
		$this->db->update('torder_tmp', $data);
		exit("1");
    }
	function update_order_website()
    {
        $value  = '';
        if (isset($_POST['value']))
            $value = $_POST['value'];
		
		$data = array(
			'cwebsite' => $value
		);
		$this->db->where('nid', $_SESSION['nid_order_tmp']);
		$this->db->update('torder_tmp', $data);
		exit("1");
    }
	function update_order_mst()
    {
        $value  = '';
        if (isset($_POST['value']))
            $value = $_POST['value'];
		
		$data = array(
			'cmst' => $value
		);
		$this->db->where('nid', $_SESSION['nid_order_tmp']);
		$this->db->update('torder_tmp', $data);
		exit("1");
    }
	function update_order_note()
    {
        $value  = '';
        if (isset($_POST['value']))
            $value = $_POST['value'];
		
		$data = array(
			'cnote' => $value
		);
		$this->db->where('nid', $_SESSION['nid_order_tmp']);
		$this->db->update('torder_tmp', $data);
		exit("1");
    }
	function update_order_price_receive()
    {
        $value  = '';
        if (isset($_POST['value']))
            $value = $_POST['value'];
		
		$data = array(
			'cprice_receive' => $value
		);
		$this->db->where('nid', $_SESSION['nid_order_tmp']);
		$this->db->update('torder_tmp', $data);
		exit("1");
    }
	function update_order_cprice_sale()
    {
        $value  = '';
        if (isset($_POST['value']))
            $value = $_POST['value'];
		
		$data = array(
			'cprice_sale_vnd' => $value
		);
		$this->db->where('nid', $_SESSION['nid_order_tmp']);
		$this->db->update('torder_tmp', $data);
		exit("1");
    }
	function update_order_vat()
    {
        $value  = '';
        if (isset($_POST['value']))
            $value = $_POST['value'];
		
		$data = array(
			'cvat' => $value
		);
		$this->db->where('nid', $_SESSION['nid_order_tmp']);
		$this->db->update('torder_tmp', $data);
		exit("1");
    }
	function update_order_ship()
    {
        $value  = '';
        if (isset($_POST['value']))
            $value = $_POST['value'];
		
		$data = array(
			'cship' => $value
		);
		$this->db->where('nid', $_SESSION['nid_order_tmp']);
		$this->db->update('torder_tmp', $data);
		exit("1");
    }
	function search_customer_by_phone()
    {
        $value  = '';
        if (isset($_POST['value']))
            $value = $_POST['value'];
		
		$data = get_customer_by_phone($value);
		if(isset($data['nid']))
			//exit("1");
			exit(json_encode($data,true));
		else
			exit("0");
    }
	function ajax_get_customer_all()
    {
		$list = ajax_get_customer_by_user(Fget_userdata('session_nid_user'));
			 
		exit(json_encode($list,true));
    }
	
	function get_customer_by_id()
    {
        $nid  = '';
        if (isset($_POST['nid']))
            $nid = $_POST['nid'];
		
		$data = get_customer_by_id($nid);
		if(isset($data['nid']))
			//exit("1");
			exit(json_encode($data,true));
		else
			exit("0");
    }

	function insert_order_ghn()
    {
		$nid_user = Fget_userdata('session_nid_user');
		$client_order_code = '';
        $to_name = '';
        $to_phone = '';
		$to_address = '';
		$to_ward_name = '';
		$to_district_name = '';
		$cod_amount = '';
		$cod_failed_amount = '';
		$weight = '';
		$length = '';
		$width = '';
		$height = '';
		$required_note = '';
		$insurance_value = '';
		$payment_type_id = '';
		
		$nid_order_active = '';
		$product_list = '';
		
		if (isset($_POST['client_order_code']))
            $client_order_code = $_POST['client_order_code'];
        if (isset($_POST['to_name']))
            $to_name = $_POST['to_name'];
        if (isset($_POST['to_phone']))
            $to_phone = $_POST['to_phone'];
		if (isset($_POST['to_address']))
            $to_address = $_POST['to_address'];
		if (isset($_POST['to_ward_name']))
            $to_ward_name = $_POST['to_ward_name'];
		if (isset($_POST['to_district_name']))
            $to_district_name = $_POST['to_district_name'];
		if (isset($_POST['cod_amount']))
            $cod_amount = $_POST['cod_amount'];
		if (isset($_POST['weight']))
            $weight = $_POST['weight'];
		if (isset($_POST['length']))
            $length = $_POST['length'];
		if (isset($_POST['width']))
            $width = $_POST['width'];
		if (isset($_POST['height']))
            $height = $_POST['height'];
		if (isset($_POST['cod_failed_amount']))
            $cod_failed_amount = $_POST['cod_failed_amount'];
		if (isset($_POST['required_note']))
            $required_note = $_POST['required_note'];
		if (isset($_POST['note']))
            $note = $_POST['note'];
		if (isset($_POST['insurance_value']))
            $insurance_value = $_POST['insurance_value'];
		if (isset($_POST['payment_type_id']))
            $payment_type_id = $_POST['payment_type_id'];
		
		if (isset($_POST['nid_order_active']))
            $nid_order_active = $_POST['nid_order_active'];
		if (isset($_POST['product_list']))
            $product_list = $_POST['product_list'];
		
		//goi api insert order ghn
		$nbh = get_setting_by_user(Fget_userdata('session_nid_user'));
		$shopid = $nbh['shopid'];
		$token = $nbh['token'];
			
		$items = [];
		$list = json_decode($product_list,true);
		foreach($list as $item) {
			$arr = array(
				"name" => $item['name'],
				"price" => $item['price'],
				"quantity" => $item['quantity']
			);
			$items[] = $arr;
		}
		
		$par = array(
			"client_order_code" => $client_order_code,
			"to_name" => $to_name,
			"to_phone" => $to_phone,
			"to_address" => $to_address,
			"to_ward_name" => $to_ward_name,
			"to_district_name" => $to_district_name,
			"cod_amount" => $cod_amount,
			"weight" => $weight,
			"length" => $length,
			"width" => $width,
			"height" => $height,
			//"items" => json_decode($product_list,true),
			"items" => $items,
			"required_note" => $required_note,
			"note" => $note,
			"insurance_value" => $insurance_value,
			"payment_type_id" => $payment_type_id,
			"service_type_id" => 5,
		);
		//exit(json_encode($par));
		
		$url = 'https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/create?'.http_build_query($par);
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  //CURLOPT_POSTFIELDS => $arr,
		  CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"shopid: ".$shopid,
			"token: ".$token
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		
		if ($err) {
			exit("cURL Error #:" . $err);
		 // echo "cURL Error #:" . $err;
		} else {
		  exit($response);
		  /*
		  exit(json_encode($response));
		  exit(json_encode($product));
		  exit($data);
		  exit(json_encode($data));
		  */
		}


    }
	function insert_order()
    {
		$nid_user = Fget_userdata('session_nid_user');
        $cname = '';
        $cemail = '';
		$cphone = '';
		$caddress = '';
		$cmst = '';
		$cprice_sale_vnd = '';
        $cvat = '';
		$cship = '';
		$cprice_receive = '';
		$cprice_refund = '';
		$ntotal = '';
		$cnote = '';
		$cpayment_method = '';
		$nid_order_active = '';
		$product_list = '';
		
        if (isset($_POST['cname']))
            $cname = $_POST['cname'];
        if (isset($_POST['cemail']))
            $cemail = $_POST['cemail'];
		if (isset($_POST['cphone']))
            $cphone = $_POST['cphone'];
		if (isset($_POST['caddress']))
            $caddress = $_POST['caddress'];
		if (isset($_POST['cmst']))
            $cmst = $_POST['cmst'];
		if (isset($_POST['cprice_sale_vnd']))
            $cprice_sale_vnd = $_POST['cprice_sale_vnd'];
        if (isset($_POST['cvat']))
            $cvat = $_POST['cvat'];
		if (isset($_POST['cship']))
            $cship = $_POST['cship'];
		if (isset($_POST['cprice_receive']))
            $cprice_receive = $_POST['cprice_receive'];
		if (isset($_POST['cprice_refund']))
            $cprice_refund = $_POST['cprice_refund'];
		if (isset($_POST['ntotal']))
            $ntotal = $_POST['ntotal'];
		if (isset($_POST['cnote']))
            $cnote = $_POST['cnote'];
		if (isset($_POST['cpayment_method']))
            $cpayment_method = $_POST['cpayment_method'];
		if (isset($_POST['nid_order_active']))
            $nid_order_active = $_POST['nid_order_active'];
		if (isset($_POST['product_list']))
            $product_list = $_POST['product_list'];

		$cus = get_customer_by_phone($cphone);
		if(!isset($cus['nid'])) {
			$data_customer           = array(
				"cname" => $cname,
				"cemail" => $cemail,
				"cphone" => $cphone,
				"caddress" => $caddress,
				"cma_so_thue" => $cmst,
				"niduser01"  => $nid_user,
				"ddate01" => date("Y-m-d"),
			);		
			$this->db->insert("tcustomer", $data_customer);
			$id_customer = dbget_identity();
		} else 
			$id_customer = $cus['nid'];
		
		$order_status = 1;	
		$data           = array(
							"nid_customer" => $id_customer,
							//"nid_member" => $this->m_nid_user_login,
							"cfullname" => $cname,
							"cemail" => $cemail,
							"nphone" => $cphone,
							"caddress" => $caddress,
							"cnote" => $cnote,
							"ntotal" => $ntotal,
							"cmst" => $cmst,
							"cvat" => Fstr_replace(',','',$cvat),
							"cship" => Fstr_replace(',','',$cship),
							"cin_hoa_don" => 0,
							"cprice_receive" => Fstr_replace(',','',$cprice_receive),
							"cprice_refund" => Fstr_replace(',','',$cprice_refund),
							"cprice_sale_vnd" => Fstr_replace(',','',$cprice_sale_vnd),
							//"cprice_sale_per" => $cprice_sale_per,
							"cpayment_method" => $cpayment_method,
							"ctime" => time(),
							"ctime_search" => strtotime(date("m/d/Y",time())),
							"nid_order_status" => $order_status,
							"nid_order_status_tt" => 1,
							"nid_order_status_vc" => 1,
							"ctype" => 1,
							"niduser01"     			=> $nid_user,
							"ddate01" => date("Y-m-d"),
							"ctime01" => date("H:i:s")
						);
						$this->db->insert("torder", $data);
						$id_cart = dbget_identity();
						//$ccode_order= "ANMY".($id_cart+100000000);
						$ccode_order= "AM".$id_cart;
						$data_code_order = array('ccode' => $ccode_order);
						$this->db->where('nid', $id_cart);
						$this->db->update('torder',$data_code_order);

		//$list = json_decode($product_list);	
		$list = json_decode($product_list,true);
		//exit(json_encode($list));
		foreach ($list as $data) {
			if($data['nid_order']==$nid_order_active) {
				$data_detail = array(
					'nid_order' => $id_cart,
					'nid_product' => $data['nid_product'],
					'nquantity' => $data['qty'],
					'cprice' => $data['price'],
				);
				$this->db->insert('torder_detail', $data_detail);
			}
		}
		
		$thong_ke = get_thong_ke_by_user($nid_user);
			$data_thong_ke           = array(
				'cdon_trong_ngay' => $thong_ke['cdon_trong_ngay']+1,
				'ctong_don' => $thong_ke['ctong_don']+1,
				'cdoanh_thu_ngay' => $thong_ke['cdoanh_thu_ngay']+$ntotal,
				'ctong_doanh_thu' => $thong_ke['ctong_doanh_thu']+$ntotal,
		);
		$this->db->where("nid_user", $nid_user);
		$this->db->update('tthong_ke', $data_thong_ke);
		
		exit($id_cart);
    }
	function reset_data() 
	{ 
		$data =	array(								
			'cdon_trong_ngay' => 0,
			'cdoanh_thu_ngay' => 0
		);
		$this->db->update("tthong_ke", $data);
		exit('1');
    }

	function dang_ky()
	{
		$cname   = '';
		$cuserid      = '';
        $cemail      = '';
        $cpassword   = '';
        $cpassword_confirm = '';
        if (isset($_POST['cname']))
            $cname = $_POST['cname'];
		if (isset($_POST['cuserid']))
            $cuserid = $_POST['cuserid'];
        if (isset($_POST['cemail']))
            $cemail = $_POST['cemail'];
        if (isset($_POST['cpassword']))
            $cpassword = $_POST['cpassword'];
        if (isset($_POST['cpassword_confirm']))
            $cpassword_confirm = $_POST['cpassword_confirm'];

		$user_id = get_user_by_id($cuserid);
		$user_mail = get_user_by_mail($cemail);
        if (isset($user_id['nid'])) {
			exit("0");
        } elseif (isset($user_mail['nid'])) {
			exit("2");
        } else {
            $data           = array(
				"cuserid" => $cuserid,
				"cname" => $cname,
				"cpassword" => md5($cpassword),
				"cemail" => $cemail,
				"cphone" => $cphone,
				"nid_master" => 1,
				"cisadmin" => 2,
				"nactive" => 0
			);
			$this->db->insert("tuser", $data);
			$nid_user = dbget_identity();
			
			$data_s =	array(								
				'ccompany'					=> $cname,
				'cemail' => $cemail,
				'cphone' => $cphone,
				'cmau_nen'						=> '#784532',
				'cmau_menu'						=> '#524039',
				'nid_user' 		=> $nid_user
			);
			$this->db->insert("tsetting", $data_s);
				
			exit("1");
        }
	}
}
	