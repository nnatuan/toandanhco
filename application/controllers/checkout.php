<?php
class checkout extends Controller
{
    var $event = '';
    var $obj_checkout = '';
    var $m_language = 'eng';
    var $nid_material = '';
    var $nid_cat = '';
    var $title = '';
    var $tags = '';
    var $description = '';
    var $ntotal = '';
    var $cname = '';
    var $caddress = '';
    var $cemail = '';
    var $cphone = '';
    var $cnote = '';
    var $btn_click = '';
    function checkout()
    {
        parent::Controller();
        session_start();
        $this->load->database();
        $this->load->helper('ap_function');
        $this->load->helper('ap_object');
        $this->load->helper('ap_html');
        $this->load->helper('ap_view_helper');
        $this->load->helper('ap_db');
        $this->load->helper('ap_mail');
		$this->load->helper('ap_cart');
        $this->load->helper('ap_module');
    }
    private function f_set_cookie($cookie_name, $cookie_value)
    {
        return dbset_cookie('cookie_guide_' . $cookie_name, $cookie_value);
    }
    private function f_get_cookie($cookie_name)
    {
        return dbget_cookie('cookie_checkout_' . $cookie_name);
    }
    private function m_language_key($str_key)
    {
        return $this->lang->line('lbl.checkout.' . $str_key);
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
        $this->cname    = $_SESSION["cname"];
      //  $this->cemail   = $_SESSION["cemail"];
        $this->cphone   = $_SESSION["cphone"];
        $this->caddress = $_SESSION['caddress'];
        $this->cnote    = $_SESSION['cnote'];
        if(isset($_SESSION['ntotal']))
        $this->ntotal   = $_SESSION['ntotal'];
        if (isset($_POST['btn_submit']))
            $this->btn_click = $_POST['btn_submit'];
    }
    private function caculate_data()
    {
        $this->load->language('ap', $this->m_language);
        if ($this->cphone == '') {
            //empty_cart();
			$_SESSION["empty"] = 1;
            redirect(base_url().'thanh-toan');
        }
        if ($this->btn_click != '') {
            $this->insert_cart();
			//$this->send_mail_order();
			SendMail('no_reply@ansancosmetics.com', "phu2212@gmail.com", "website Ansancosmetics co don","Don hang Ansancosmetics", "Ansancosmetics");
			 empty_cart();
            redirect(base_url() . 'hoan-tat');
        }
    }
    private function do_business()
    {
        $data['title']       = $this->title;
        $data['tags']        = $this->tags;
        $data['description'] = $this->description;
        $data['menu_sec']    = '';
        $data['menu_cat']    = '';
        $data['menu_top']    = 'checkout';
        $data['g_ishome']    = 0;
        $this->load->view('checkout', $data);
    }
    private function destroy_data()
    {
    }
    private function get_where_guide_string()
    {
        $str = 'where nstatus = "1"';
        return $str;
    }
    function insert_cart()
    {
		$nid_code_sale = 0;
		if(isset($_SESSION['nid_code_sale']))
			$nid_code_sale = $_SESSION['nid_code_sale'];
		date_default_timezone_set('Asia/Saigon');
        $this->cname    = $_SESSION["cname"];
        $this->cemail   = $_SESSION["cemail"];
        $this->cphone   = $_SESSION["cphone"];
        $this->caddress = $_SESSION['caddress'];
        $this->cnote    = $_SESSION['cnote'];
        $obj_cart       = '';
        $data           = array(
            "cfullname" => $this->cname,
            "cemail" => $this->cemail,
            "nphone" => $this->cphone,
            "caddress" => $this->caddress,
            "nid_order_status" => 1,
			"ctime_search" => time(),
            "ddate01" => date("Y-m-d"),
            "ctime01" => date("H:i:s"),
            "cnote" => $this->cnote,
            "ntotal" => $this->ntotal,
			"nsale" => $_SESSION['nsale'],
			"nid_code_sale" => $nid_code_sale
        );
        $this->db->insert("torder_anvi", $data);
        $id_cart = dbget_identity();
        if (isset($_SESSION["cart"]))
            $obj_cart = $_SESSION["cart"];
        foreach ($obj_cart as $cart) {
            if($cart['iscolor']==1) {
				   $color = get_color_detail($cart['id']);
				   $product = get_product_detail($color['nid_product']);
				   if($color['cprice_sale_anvi'] != 0 && $color['cprice_sale_anvi'] != '')
						$price=$color['cprice_sale_anvi'];
				   else
						$price=$color['cprice_anvi'];
			   } else {
				   $product = get_product_detail($cart['id']);
				   if($product['cprice_sale_anvi'] != 0 && $product['cprice_sale_anvi'] != '')
						$price=$product['cprice_sale_anvi'];
					else
						$price=$product['cprice_anvi'];
			   }
            $data_detail = array(
                'nid_order' => $id_cart,
                'nid_product' => $cart['id'],
                'nquantity' => $cart['qty'],
                'cflash_sale'=> $product['cflash'],
				'niscolor' => $cart['iscolor'],
				'cprice' => $price
            );
            $this->db->insert('torder_detail_anvi', $data_detail);
            if($product['cflash'] ==1){
            $data_product= array('nflash_sold' =>$product['nflash_sold'] +1 );
            $this->db->where('nid', $cart['id']);
            $this->db->update('tproducts', $data_product);
            }
        }
    }
    function send_mail_order()
    {
        header("Content-Type: text/html; charset=UTF-8");
        $content = '';
        $content .= 'Xin Chào ' . $this->cname . '</br>';
        $content .= '<p>Rất cám ơn bạn tin tưởng và mua hàng tại hệ thống Cphone.vn, sau đây là thông tin đơn hàng của bạn. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất để tiến hành giao hàng trong thời gian sớm nhất.</p>';
        $content .= '<h3 style="color: #ed0d52;font-family: "Segoe UI",Helvetica,sans-serif;font-weight: bold;text-transform: uppercase;font-size: 14px;">Chi tiết đơn hàng</h3>';
        $obj_cart = array();
        $total    = 0;
        if (isset($_SESSION["cart"]))
            $obj_cart = $_SESSION["cart"];
        $content .= '<table cellspacing="0" cellpadding="0">';
        $content .= '<tr>';
        $content .= '<td style="padding: 20px;border: 1px solid #ccc;text-align: center;font-size: 12px;font-weight: bold;text-transform: uppercase;">STT</td>';
        $content .= '<td style="padding: 20px;border: 1px solid #ccc;text-align: center;font-size: 12px;font-weight: bold;text-transform: uppercase;">Sản phẩm</td>';
        $content .= '<td style="padding: 20px;border: 1px solid #ccc;text-align: center;font-size: 12px;font-weight: bold;text-transform: uppercase;">Đơn giá</td>';
        $content .= '<td style="padding: 20px;border: 1px solid #ccc;text-align: center;font-size: 12px;font-weight: bold;text-transform: uppercase;">Số lượng</td>';
        $content .= '<td style="padding: 20px;border: 1px solid #ccc;text-align: center;font-size: 12px;font-weight: bold;text-transform: uppercase;">Thành tiền</td>';
        $content .= '</tr>';
        foreach ($obj_cart as $cart) {
            $i       = 1;
            $product = get_product_detail($cart['id']);
            $content .= '<tr>';
            $content .= '<td style="padding: 20px;border: 1px solid #ccc;text-align: center;">' . $i . '</td>';
            $content .= '<td style="padding: 20px;border: 1px solid #ccc;text-align: center;">' . $product['cproducts'] . '</td>';
            $content .= '<td style="padding: 20px;border: 1px solid #ccc;text-align: center;">' . Fview_price($product['cprice_sale_anvi']) . '</td>';
            $content .= '<td style="padding: 20px;border: 1px solid #ccc;text-align: center;">' . $cart['qty'] . '</td>';
            $content .= '<td style="padding: 20px;border: 1px solid #ccc;text-align: center;">' . Fview_price($product['cprice_sale_anvi'] * $cart['qty']) . '</td>';
            $content .= '</tr>';
            $total += $product['cprice_sale_anvi'] * $cart['qty'];
            $i++;
        }
        $content .= '<tr class="cart-end">';
        $content .= ' <td colspan="4" style="padding: 20px;border: 1px solid #ccc;text-align: center;">Tổng tiền :</td>';
        $content .= '<td style="padding: 20px;border: 1px solid #ccc;text-align: center;">' . Fview_price($total) . '</td>';
        $content .= '</tr>';
        $content .= ' </table>';
       // exit($content);
        $email     = '';
        $obj_email = get_config_site(1);
        if (count($obj_email) > 0):
            foreach ($obj_email as $obj_email):
                $email = $obj_email['cvalue'];
            endforeach;
        endif;
        $title_email   = '';
        $obj_data_info = get_config_site(3);
        if (count($obj_data_info) > 0):
            foreach ($obj_data_info as $data):
                $title_email = $data['cvalue'];
            endforeach;
        endif;
							
        /*SendMail('no_reply@cphone.vn', $this->cemail, "Xác Nhận Dơn Hàng Cphone", $content, "Cphone");
        SendMail('no_reply@cphone.vn', $email, "Xác Nhận Dơn Hàng Cphone",$content, "Cphone");*/
		//SendMail('no_reply@nhancapnivoca.com', "phu2212@gmail.com", "Xác Nhận Dơn Hàng Nivoca.Com",$content, "Nhẫn Cặp Nivoca");
//exit($content); 
//	SendMail('no_reply@tuan.vn', "tuan.nguyen90@nhapchuot.net", "Xác Nhận Dơn Hàng Nivoca.Com",$content, "Nhẫn Cặp Nivoca");
   }
}