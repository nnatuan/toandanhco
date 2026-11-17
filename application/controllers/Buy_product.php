<?php
class buy_product extends Controller
{
    var $data_view = '';
    var $title = '';
    var $tags = '';
    var $description = '';
    var $cname = '';
    var $cemail = '';
    var $cphone = '';
    var $cquantity = '';
    var $cmethod = '';
    var $id_hidden = '';
	var $caddress ='';
    var $bnt_submit01 = '';
	var $ctotal = '';
	var $ccost = '';
	var $cgiam_gia = 0;
    function buy_product()
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
        $this->load->language('ap', 'eng');
        $_SESSION['back_link'] = base_url();
        if (isset($_POST['cname']))
            $this->cname = $_POST['cname'];
		if (isset($_POST['caddress']))
            $this->caddress = $_POST['caddress'];
		if (isset($_POST['cphone']))
            $this->cphone = $_POST['cphone'];
		if (isset($_POST['cemail']))
            $this->cemail = $_POST['cemail'];
		if (isset($_POST['cmethod']))
            $this->cmethod = $_POST['cmethod'];
        if (isset($_POST['ctotal']))
            $this->ctotal = $_POST['ctotal'];
        if (isset($_POST['ccost']))
            $this->ccost = $_POST['ccost'];
		if (isset($_POST['cgiam_gia']))
            $this->cgiam_gia = $_POST['cgiam_gia'];

        if (isset($_POST['bnt_submit01']))
            $this->bnt_submit01 = $_POST['bnt_submit01'];
    }
    private function caculate_data()
    {
        $obj_data = get_config_byid(3);
        foreach ($obj_data as $data):
            $this->title = $data['cvalue'];
        endforeach;
        $obj_data = get_config_byid(2);
        foreach ($obj_data as $data):
            $this->tags = $data['cvalue'];
        endforeach;
        $obj_data = get_config_byid(4);
        foreach ($obj_data as $data):
            $this->description = $data['cvalue'];
        endforeach;
        if ($this->id_hidden != '' AND $this->cquantity != '')
            add_cart($this->id_hidden, $this->cquantity);
        
		if ($this->bnt_submit01 != '') {
			
			if ($this->cphone == '') {
				//empty_cart();
				$_SESSION["empty"] = 1;
				redirect(base_url().'thanh-toan');
			}
			
			$this->insert_cart();
            //SendMail('no_reply@myphamhanquocso1.com', "phu2212@gmail.com", "website myphamhanquocso1 co don","Don hang myphamhanquocso1", "myphamhanquocso1");
            redirect(base_url() . 'hoan-tat');
        }
    }
	function insert_cart()
    {
		date_default_timezone_set('Asia/Saigon');
        $obj_cart       = '';
		$ccode = "PBG".time();
        $data           = array(
			"nid_customer" => $_SESSION["nid_member"],
			"ccode" => $ccode,
            "cfullname" => $this->cname,
            "cemail" => $this->cemail,
            "nphone" => $this->cphone,
            "caddress" => $this->caddress,
            "nid_order_status" => 1,
			//"ctime_search" => time(),
            "ddate01" => date("Y-m-d"),
            "ctime01" => date("H:i:s"),
            //"cnote" => $this->cnote,
			"cmethod" => $this->cmethod,
            "ntotal" => $this->ctotal,
			"ccost" => $this->ccost,
			"cgiam_gia" => $this->cgiam_gia,
			//"nsale" => $_SESSION['nsale'],
			//"nid_code_sale" => $nid_code_sale
        );
        $this->db->insert("torder", $data);
        $id_cart = dbget_identity();
        $_SESSION["cart_id"] = $id_cart;

        if (isset($_SESSION["cart"]))
            $obj_cart = $_SESSION["cart"];
        foreach ($obj_cart as $cart) {
            $product = get_product_detail($cart['id']);
				   if($product['fprice_sale'] != 0 && $product['fprice_sale'] != '')
						$price=$product['fprice_sale'];
					else
						$price=$product['fprice'];
            $data_detail = array(
                'nid_order' => $id_cart,
                'nid_product' => $cart['id'],
                'nquantity' => $cart['qty'],
                //'cflash_sale'=> $product['cflash'],
				//'niscolor' => $cart['iscolor'],
				'cprice' => $price
            );
            $this->db->insert('torder_detail', $data_detail);
        }
		
		$data_m           = array(
			"cemail" => $this->cemail,
			"caddress" => $this->caddress,
			"cphone" => $this->cphone
        );
        $this->db->where("nid", $_SESSION["nid_member"]);
		$this->db->update("tmember", $data_m);
		
		$str = '<div>';
		$str .= '<p style="color: #2600ff;"><strong>Cảm ơn quý khách '.$this->cname.' đã tin tưởng và sử dụng khẩu trang Perfetta!</strong></p>';
		$str .= '<p>Perfetta rất vui thông báo đơn hàng <strong>'. $ccode .'</strong> của quý khách đã được tiếp nhận và đang trong quá trình xử lý.</p>';
		$str .= '<p>Đơn hàng sẽ được giao đến cho Quý Khách trong vòng 3-5 ngày (trừ ngày thứ bảy và chủ nhật). Perfetta sẽ thông báo đến Quý Khách ngay khi hàng chuẩn bị được giao.</p>';
		$str .= '<h3 style="color: #2600ff;"><u>Thông tin đơn hàng</u></h3>';
		$str .= '<h4>Thông tin thanh toán</h4>';
		$str .= '			<table width="100%" style="border-collapse: collapse;">';
		$str .= '			  <tr>';
		$str .= '				 <td style="border: 1px solid #ddd;padding: 10px;width: 30%;"><strong>Họ tên</strong></td>';
		$str .= '				 <td style="border: 1px solid #ddd;padding: 10px;">'.$this->cname.'</td>';
		$str .= '			  </tr>';
		$str .= '			  <tr>';
		$str .= '				 <td style="border: 1px solid #ddd;padding: 10px;"><strong>Số điện thoại</strong></td>';
		$str .= '				 <td style="border: 1px solid #ddd;padding: 10px;">'.$this->cphone.'</td>';
		$str .= '			  </tr>';
		$str .= '			  <tr>';
		$str .= '				 <td style="border: 1px solid #ddd;padding: 10px;"><strong>Địa chỉ</strong></td>';
		$str .= '				 <td style="border: 1px solid #ddd;padding: 10px;">'.$this->caddress.'</td>';
		$str .= '			  </tr>';
		$str .= '			 </table>';
		$str .= '<h4>Chi tiết đơn hàng: ';
		if($this->cmethod=="1")
			$str .= 'Thanh toán khi nhận hàng';
		else {
			$str .= '<br>Thanh toán chuyển khoản: để giúp Perfetta thuận tiện theo dõi việc thanh toán và chuyển hàng cho bạn đúng thời gian, vui lòng chuyển khoản theo nội dung sau:';	
		$str .= '</h4>';
		$str .= '<div style="padding:15px;border:1px solid #ccc;margin-bottom:10px;">';
		$str .= '<p style="color: #e74c3c;">TÊN QUÝ KHÁCH - SỐ ĐIỆN THOẠI - NGÀY ĐẶT HÀNG</p>';
		$str .= '<p>Thông tin tài khoản:</p>';
		$str .= '<p><strong>Tên tài khoản: CÔNG TY TNHH TẬP TOÀN PHÚ BẢO</strong></p>';
		$str .= '<p><strong>Số tài khoản: 117 002 774 003</strong></p>';
		$str .= '<p><strong>Ngân hàng: Ngân hàng TMCP Công thương Việt Nam (VietinBank) - Chi nhánh 3 TP. HCM</strong></p>';
		$str .= '</div>';
		}
		
		$str .= '			<table width="100%" style="border-collapse: collapse;">';
		$str .= '			  <tr>';
		$str .= '				 <td style="border: 1px solid #ddd;padding: 10px;background: #ddd;"><strong>Sản phẩm</strong></td>';
		$str .= '				 <td style="border: 1px solid #ddd;padding: 10px;background: #ddd;"><strong>Đơn giá</strong></td>';
		$str .= '				 <td style="border: 1px solid #ddd;padding: 10px;background: #ddd;"><strong>Số lượng</strong></td>';
		$str .= '				 <td style="border: 1px solid #ddd;padding: 10px;background: #ddd;"><strong>Tổng tạm</strong></td>';
		$str .= '			  </tr>';
		$total = 0;
		foreach ($obj_cart as $cart) {
			$product = get_product_detail($cart['id']);	
				if($product['fprice_sale'] != 0 && $product['fprice_sale'] != '')
						$price=$product['fprice_sale'];
					else
						$price=$product['fprice'];
				$total += $price*$cart['qty'];
		$str .= '			  <tr>';
		$str .= '				 <td style="border: 1px solid #ddd;padding: 10px;"><strong>'.$product['cproducts'].'</strong></td>';
		$str .= '				 <td style="border: 1px solid #ddd;padding: 10px;"><strong>'.number_format($price).'đ</strong></td>';
		$str .= '				 <td style="border: 1px solid #ddd;padding: 10px;"><strong>'.$cart['qty'].'</strong></td>';
		$str .= '				 <td style="border: 1px solid #ddd;padding: 10px;"><strong>'.number_format($price*$cart['qty']).'đ</strong></td>';
		$str .= '			  </tr>';
		}
		$str .= '			  <tr>';
		$str .= '				 <td colspan="3" style="border: 1px solid #ddd;padding: 10px;text-align:right;"><strong>Tạm tính:</strong></td>';
		$str .= '				 <td style="border: 1px solid #ddd;padding: 10px;"><strong>'.number_format($total).'đ</strong></td>';
		$str .= '			  </tr>';
		if($this->cgiam_gia!="" && $this->cgiam_gia!=0) {
		$str .= '			  <tr>';
		$str .= '				 <td colspan="3" style="border: 1px solid #ddd;padding: 10px;text-align:right;"><strong>Giảm giá (cho đơn hàng đầu tiên):</strong></td>';
		$str .= '				 <td style="border: 1px solid #ddd;padding: 10px;"><strong>- '.number_format($this->cgiam_gia).'đ</strong></td>';
		$str .= '			  </tr>';	
		}
		$str .= '			  <tr>';
		$str .= '				 <td colspan="3" style="border: 1px solid #ddd;padding: 10px;text-align:right;"><strong>Phí vận chuyển:</strong></td>';
		$str .= '				 <td style="border: 1px solid #ddd;padding: 10px;"><strong>'.number_format($this->ccost).'đ</strong></td>';
		$str .= '			  </tr>';
		$str .= '			  <tr>';
		$str .= '				 <td colspan="3" style="border: 1px solid #ddd;padding: 10px;text-align:right;"><strong>Tổng giá trị đơn hàng:</strong></td>';
		$str .= '				 <td style="border: 1px solid #ddd;padding: 10px;"><strong>'.number_format($total+$this->ccost- $this->cgiam_gia).'đ</strong></td>';
		$str .= '			  </tr>';
		$str .= '			 </table>';		
		$str .= '<p>Một lần nữa, xin cảm ơn Qúy khách!</p>';
		$str .= '<p><img src="http://nhapchuot.net/demo/shopping/images/logo.png" style="width:100px;"></p>';
		$str .= '</div>';
		$this->send_mail($str,"ĐƠN HÀNG TỪ PERFETTA");
		empty_cart();
		redirect(base_url().'hoan-tat-dat-hang');
		//exit($str);
    }
	function send_mail($str, $subject)
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
			$this->cemail
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
    private function do_business()
    {
        $data['title']           = $this->title;
        $data['tags']            = $this->tags;
        $data['description']     = $this->description;
        $data['menu_sec']        = '';
        $data['menu_cat']        = '';
        $data['menu_top']        = 'buy_product';
        $data['data_view']       = $this->data_view;
        $data['g_isbuy_product'] = 0;
	
        $this->load->view('buy_product', $data);
    }
    function destroy_data()
    {
    }
    function empty_cart_2()
    {
        $_SESSION["cart"]      = NULL;
		$_SESSION["cname"]     = NULL;
		$_SESSION["cemail"]    = NULL;
		$_SESSION["cphone"]    = NULL;
		$_SESSION["cquantity"] = NULL;
		$_SESSION["cnote"]     = NULL;
		$_SESSION["ntotal"]    = NULL;
		
		$_SESSION['price_sale'] = NULL;
		$_SESSION['per_sale'] = NULL;
		$_SESSION['nsale'] = NULL;
		$_SESSION['nid_code_sale'] = NULL;
		exit('done');
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
       // echo 'done';
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
      exit("done");
    }
    function ajax_remove_cart()
    {
        $id_pro = '';
        if (isset($_POST['id']))
            $id_pro = $_POST['id'];
        remove_cart($id_pro);
       exit("done");
    }
    function update2($id, $qty)
    {
        exit($_SESSION["cemail"]);
    }
}
	