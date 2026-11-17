<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class product_update extends Controller
{
    var $g_nid_session = '';
    var $g_nid_user = '';
    var $g_language = '';
    var $g_language_key = 'product_update';
    var $g_form_folder = 'product_update_form';
    var $g_menu_id = 'product';
    var $g_form_title = '';
    var $g_form_router = '';
    var $g_form_helpid = '';
    var $m_nid = '';
    var $g_form_link = '';
    var $g_hidden_button = '0';
    var $obj_detail = '';
    var $obj_cat = '';
    function product_update()
    {
        parent::Controller();
        session_start();
        $this->load->database();
        $this->load->helper('ap_db');
        $this->load->helper('ap_object');
        $this->load->helper('ap_function');
        $this->load->helper('ap_view');
        $this->load->helper('ap_module');
    }
    function index()
    {
        $this->do_process();
    }
    function get($ccode)
    {
        $this->m_nid = $ccode;
        $str_query   = ' UPDATE ' . Fget_ap_table('tproducts') . ' SET nview = nview +1 where ccode = "' . $ccode . '"';
		$flag = 0;
		
		if(!isset($_SESSION['recent_view'])) {
			$id_array= array();
			$id_array[]= $ccode;
			session_start();
			$_SESSION['recent_view']= $id_array;
		}else{
			foreach($_SESSION['recent_view'] as $value){
				if($ccode==$value) {
					$flag= 1;
					break;
				}
			}
			if($flag ==0)
				$_SESSION['recent_view'][]= $ccode;		
		}
        $this->db->query($str_query);
        $this->do_process();
    }
    private function do_process()
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
    }
    private function do_business()
    {
		//$this->output->cache(10);
        $obj_detail          = get_product_bycode($this->m_nid);
        $data['title']       = $obj_detail['cproducts'];
        $data['tags']        = strip_tags($obj_detail['ctag']);
        $data['description'] = strip_tags($obj_detail['cnote']);
        $data['nid']         = $this->m_nid;
        $data['obj_detail']  = $obj_detail;
        $data['menu_sec']    = '';
        $data['menu_cat']    = '';
        $data['id_cat']      = $obj_detail['nid_cat_products'];
        $data['g_ishome']    = 0;
        $this->load->view('product_update', $data);
    }
    private function destroy_data()
    {
    }
    private function get_language($p_key)
    {
        $obj_key = $this->g_language_key . '.';
        return Fget_language($obj_key . $p_key);
    }
    private function get_cookie($p_key)
    {
        return '';
    }
    private function set_cookie($p_key)
    {
        return '';
    }
	
	function update_detail()
	{
		//$this->db->get("tproducts");
		$products= $this->db->get("tproducts");
		$products= $products->result_array();
		
	//	print_r($products);
		foreach($products as $product){
			$data = array('cdetail' => '<p>Aliquam a hendrerit tortor, vitae dictum sapien. Proin quis iaculis nisi. Donec convallis, erat eget facilisis laoreet, arcu ante elementum orci, efficitur vulputate nibh turpis id elit. In magna ligula, vestibulum sit amet augue quis, consequat hendrerit turpis. Nam egestas facilisis ipsum aliquam egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam eget viverra odio. Nulla quis iaculis nibh, id cursus odio.</p>

<p>Morbi neque felis, tincidunt eget urna ut, commodo mollis erat. Donec facilisis, nisi eu ultrices fermentum, mauris dolor varius lacus, eu pulvinar risus sapien ut massa. Morbi congue dictum urna. Proin et tellus congue, vulputate purus ac, pulvinar lectus. Nunc sed elit vel massa euismod suscipit ac in nisi. Proin sit amet diam justo. Etiam sed velit sem. Sed tincidunt rutrum orci at viverra.</p>

<p>Cras vestibulum dolor ac leo egestas, in luctus sapien dapibus. Vestibulum eleifend sed ligula tempor auctor. Nunc iaculis faucibus arcu, sit amet egestas magna euismod ac. Nunc nunc velit, auctor non suscipit et, tincidunt hendrerit lacus. Curabitur blandit lacus mauris, id blandit leo tincidunt feugiat. Donec venenatis nulla eu augue consequat sollicitudin. Nullam vitae aliquam est, in malesuada mi. Maecenas in scelerisque lectus. Integer lobortis libero sed consequat venenatis. Nullam aliquam nisi eu libero porta, sit amet finibus purus congue. Integer aliquam lectus at dui dapibus, id pellentesque elit rutrum. Sed nec venenatis est.</p>

<p>Nunc mattis lacus eu vehicula feugiat. Suspendisse nec velit eget justo pharetra varius at eget ex. Etiam imperdiet elit quis ex maximus, id tincidunt nunc sodales. Donec dui odio, pretium eget lectus ac, dictum auctor turpis. Curabitur aliquam viverra purus, eu accumsan ante. Nunc sagittis efficitur pretium. Aenean a accumsan nibh. Duis nulla orci, semper ut finibus eget, interdum id turpis.</p>

<p>Duis a tristique urna. Sed fringilla, purus venenatis congue feugiat, augue turpis vestibulum ex, sed elementum purus quam ut eros. Pellentesque odio sem, varius ac tortor quis, congue consectetur dolor. Vivamus sit amet convallis elit. Morbi ultrices, est nec pellentesque sodales, diam est rutrum diam, non sodales sem mauris eget tellus. Integer rutrum neque id nunc euismod, vel viverra purus accumsan. Quisque congue rutrum erat at pulvinar. Vestibulum ullamcorper pretium ex nec posuere. Suspendisse potenti. Vivamus diam turpis, accumsan ut dapibus eget, sollicitudin a ligula. Cras efficitur maximus venenatis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent a nibh id erat placerat auctor sed id odio.</p>
');
			$this->db->where('nid', $product['nid']);
			$this->db->order_by('nid + 0',"asc" );
			$this->db->update('tproducts', $data);
		}
		//echo "abc";
		exit("Update done...");
	//	die()
		
	}
	function update_name()
	{
		//$this->db->get("tproducts");
		$products= $this->db->get("tproducts");
		$products= $products->result_array();
		$i = 1;
		
	//	print_r($products);
		foreach($products as $product){
			$data = array('ccode' => 'nhan-'.$i, 'cproducts' => 'Nhẫn '.$i,'cindex'=>$i);
			$this->db->where('nid', $product['nid']);
			$this->db->order_by('nid + 0',"asc" );
			$this->db->update('tproducts', $data);
			$i++;
		}
		//echo "abc";
		exit("Update done...");
	//	die()
		
	}
	function update_product()
	{
		//$this->db->get("tproducts");
		$products= $this->db->get("tproducts");
		$products= $products->result_array();
		$i = 1;
		
	//	print_r($products);
		foreach($products as $product){
			$data = array('fprice' => 1200000, 'fprice_sale' => 990000);
			$this->db->where('nid', $product['nid']);
			$this->db->order_by('nid + 0',"asc" );
			$this->db->update('tproducts', $data);
			$i++;
		}
		//echo "abc";
		exit("Update done...");
	//	die()
		
	}
	function update_cnew()
	{
		//$this->db->get("tproducts");
		$products= $this->db->get("tproducts");
		$products= $products->result_array();
		
	//	print_r($products);
		foreach($products as $product){
			$data = array('cnew' => '0');
			$this->db->where('nid', $product['nid']);
			$this->db->order_by('nid + 0',"asc" );
			$this->db->update('tproducts', $data);
		}
		//echo "abc";
		exit("Update done...");
	//	die()
		
	}
	function update_cgift()
	{
		//$this->db->get("tproducts");
		$products= $this->db->get("tproducts");
		$products= $products->result_array();
		
	//	print_r($products);
		foreach($products as $product){
			$data = array('cgift' => 'Tặng kèm 1 hộp BCS Innova 12S');
			$this->db->where('nid', $product['nid']);
			$this->db->order_by('nid + 0',"asc" );
			$this->db->update('tproducts', $data);
		}
		//echo "abc";
		exit("Update done...");
	//	die()		
	}
	function update_sub_img()
	{
		$products= $this->db->get("tproduct_images");
		$products= $products->result_array();
		$flag = 1;
		
		foreach($products as $product){
			if($flag == 1){
				$data = array('cimage' => 'sub1.jpg');
				$flag = 2;
			} else if ($flag == 2){
				$data = array('cimage' => 'sub2.jpg');
				$flag = 3;
			} else if ($flag == 3){
				$data = array('cimage' => 'sub3.jpg');
				$flag = 4;
			} else if ($flag == 4){
				$data = array('cimage' => 'sub4.jpg');
				$flag = 5;
			} else if ($flag == 5){
				$data = array('cimage' => 'sub5.jpg');
				$flag = 1;
			}
			
			$this->db->where('nid', $product['nid']);
			$this->db->order_by('nid + 0',"asc" );
			$this->db->update('tproduct_images', $data);			
		}
		exit("Update done...");	
	}
	function update_image()
	{
		//$this->db->get("tproducts");
		$products= $this->db->get("tproducts");
		$products= $products->result_array();
		$flag = 1;
		
	//	print_r($products);
		foreach($products as $product){
			if($flag == 1){
				$data = array('cimage_resize' => 'product1.jpg');
				//$data = array('cimage' => 'product1.jpg');
				$flag = 2;
			} else if ($flag == 2){
				$data = array('cimage_resize' => 'product2.jpg');
				//$data = array('cimage' => 'product2.jpg');
				$flag = 3;
			} else if ($flag == 3){
				$data = array('cimage_resize' => 'product3.jpg');
				//$data = array('cimage' => 'product3.jpg');
				$flag = 4;
			} else if ($flag == 4){
				$data = array('cimage_resize' => 'product4.jpg');
				//$data = array('cimage' => 'product4.jpg');
				$flag = 5;
			} else if ($flag == 5){
				$data = array('cimage_resize' => 'product5.jpg');
				//$data = array('cimage' => 'product5.jpg');
				$flag = 1;
			}
			
			$this->db->where('nid', $product['nid']);
			$this->db->order_by('nid + 0',"asc" );
			$this->db->update('tproducts', $data);			
		}
		//echo "abc";
		exit("Update done...");
	//	die()	
	}
	function update_fields()
	{
		//$this->db->get("tproducts");
		$products= $this->db->get("tproducts");
		$products= $products->result_array();
		$flag = 1;
		
	//	print_r($products);
		foreach($products as $product){
			if($flag == 1){
				$data = array('cmanufac' => 'Intimate Organics', 
							'cmade' => 'Mỹ',
							'cimport' => 'Canada',
							'cunit' => 'Chai 30 ml');
				$flag = 2;
			} else if ($flag == 2){
				$data = array('cmanufac' => 'Nunc vitae', 
							'cmade' => 'Thái Lan',
							'cimport' => 'Trung Quốc',
							'cunit' => 'Hộp 5 gói');
				$flag = 3;
			} else if ($flag == 3){
				$data = array('cmanufac' => 'Morbi interdum', 
							'cmade' => 'Mỹ',
							'cimport' => 'Trung Quốc',
							'cunit' => 'Chai 100 ml');
				$flag = 4;
			} else if ($flag == 4){
				$data = array('cmanufac' => 'Suspendisse posuere', 
							'cmade' => 'Đài Loan',
							'cimport' => 'Thái Lan',
							'cunit' => 'Hộp 4 gói');
				$flag = 5;
			} else if ($flag == 5){
				$data = array('cmanufac' => 'Maecenas dignissim', 
							'cmade' => 'Hàn Quốc',
							'cimport' => 'Thái Lan',
							'cunit' => 'Chai 50 ml');
				$flag = 1;
			}
			
			$this->db->where('nid', $product['nid']);
			$this->db->order_by('nid + 0',"asc" );
			$this->db->update('tproducts', $data);
		}
		//echo "abc";
		exit("Update done...");
	//	die()	
	}
	function update_code()
	{
		//$this->db->get("tproducts");
		$products= $this->db->get("tproducts");
		$products= $products->result_array();
		$flag = 1;
		
	//	print_r($products);
		foreach($products as $product){
			if($flag == 1){
				$data = array('cproducts_code' => 'SHH2UK12260.000');
				$flag = 2;
			} else if ($flag == 2){
				$data = array('cproducts_code' => 'SHH2UK12260.000');
				$flag = 3;
			} else if ($flag == 3){
				$data = array('cproducts_code' => 'SVH2UK12259.000');
				$flag = 4;
			} else if ($flag == 4){
				$data = array('cproducts_code' => 'SHH2KK12257.100');
				$flag = 5;
			} else if ($flag == 5){
				$data = array('cproducts_code' => 'GND1WB61152.106');
				$flag = 1;
			}
			
			$this->db->where('nid', $product['nid']);
			$this->db->order_by('nid + 0',"asc" );
			$this->db->update('tproducts', $data);			
		}
		//echo "abc";
		exit("Update done...");
	//	die()
	}
	function update_video()
	{
		//$this->db->get("tproducts");
		$products= $this->db->get("tproducts");
		$products= $products->result_array();
		$flag = 1;
		
	//	print_r($products);
		foreach($products as $product){
			$data = array('cvideo' => '<p><iframe allowfullscreen="" frameborder="0" height="478" src="https://www.youtube.com/embed/uv9sQVB6F0M" width="100%"></iframe></p>');

			$this->db->where('nid', $product['nid']);
			$this->db->order_by('nid + 0',"asc" );
			$this->db->update('tproducts', $data);			
		}
		//echo "abc";
		exit("Update done...");
	//	die()
	}
	function update_promotion()
	{
		$products= $this->db->get("tproducts");
		$products= $products->result_array();
		foreach($products as $product){
			$data = array('cpromotion' => '');
			$this->db->where('nid', $product['nid']);
			$this->db->order_by('nid + 0',"asc" );
			$this->db->update('tproducts', $data);			
		}
		exit("Update done...");
	}
	function update_desc()
	{
		//$this->db->get("tproducts");
		$products= $this->db->get("tproducts");
		$products= $products->result_array();
		$flag = 1;
		
	//	print_r($products);
		foreach($products as $product){
			$data = array('cdescription' => '<p style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: rgb(102, 102, 102); line-height: 20px; text-align: justify;"><span style="font-size: 16px;">Nhẫn cặp bạc tuy l&agrave; m&oacute;n qu&agrave; tuy đơn giản nhưng cực kỳ &yacute; nghĩa. Nhẫn cặp kh&ocirc;ng chỉ l&agrave; th&ocirc;ng điệp để chứng minh cho t&igrave;nh y&ecirc;u của bạn gửi đến đối phương m&agrave; c&ograve;n gi&uacute;p bạn ngầm khẳng định &ldquo;chủ quyền&rdquo; của m&igrave;nh trong l&ograve;ng người ấy nữa đấy.&nbsp;</span></p>

<p style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: rgb(102, 102, 102); line-height: 20px; text-align: justify;"><span style="font-size: 16px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sản phẩm&nbsp;<a href="http://www.nhancapnivoca.com/nhan-cap-Beautiful.html" style="color: rgb(51, 51, 51); text-decoration: none; line-height: 24px;" target="_blank"><span style="color: rgb(0, 84, 145);">nhẫn cặp bạc Beautiful</span></a>&nbsp;với thiết kế nhẹ nh&agrave;ng, uyển chuyển mang đến hơi hướng hiện đại cho người đeo. Chiếc nhẫn nữ với tạo h&igrave;nh đ&ocirc;i c&aacute;nh thi&ecirc;n thần gi&uacute;p t&ocirc;n l&ecirc;n vẻ đẹp trong s&aacute;ng, thuần khiết của t&igrave;nh y&ecirc;u đ&ocirc;i lứa. Chiếc nhẫn nam với đường n&eacute;t tinh xảo tạo điểm nhấn cho chiếc nhẫn c&ugrave;ng vi&ecirc;n đ&aacute; chủ ở ch&iacute;nh giữa. Tất cả sản phẩm của cửa h&agrave;ng trang sức Nivoca lu&ocirc;n lấy ti&ecirc;u chuẩn chất lượng đặt l&ecirc;n h&agrave;ng đầu, với ti&ecirc;u ch&iacute; kh&aacute;ch h&agrave;ng l&agrave; thượng đế, ch&uacute;ng t&ocirc;i lu&ocirc;n cố gắng hết sức ho&agrave;n thiện m&igrave;nh từ kh&acirc;u sản phẩm đến quy c&aacute;ch phục vụ kh&aacute;ch h&agrave;ng.</span></p>

<p style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: rgb(102, 102, 102); line-height: 20.8px; text-align: center;"><span style="font-size: 16px;"><img alt="nhẫn cặp, nhẫn đôi, nhẫn cặp bạc, nhẫn đôi bạc, nhan cap, nhan doi, nhẫn cặp bạc cao cấp, nhẫn đôi bạc cao cấp, nhẫn bạc cao cấp, nhẫn đôi cao cấp" src="http://nivoca.com/fileman/Uploads/Nhan%20cap/nhan-cap-bac-Beautiful.jpg" style="width: 600px; height: 375px;" /></span></p>

<p style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: rgb(102, 102, 102); line-height: 20px; text-align: center;"><em>Nhẫn cặp (đ&ocirc;i) bạc cao cấp Beautiful ( H&igrave;nh ảnh sản phẩm thật của Nivoca )</em></p>

<p style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: rgb(102, 102, 102); line-height: 20px; text-align: justify;"><span style="font-size: 16px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ngo&agrave;i những sản phẩm nhẫn đ&ocirc;i,&nbsp;<a href="http://www.nhancapnivoca.com/" style="color: rgb(51, 51, 51); text-decoration: none; line-height: 24px;" target="_blank"><span style="color: rgb(0, 84, 145);">nhẫn cặp</span></a>, ch&uacute;ng t&ocirc;i c&ograve;n cung cấp th&ecirc;m c&aacute;c d&ograve;ng sản phẩm đa dạng kh&aacute;c nhau như, d&acirc;y chuyền, lắc tay, lắc ch&acirc;n, b&ocirc;ng tai...v...v.... Đặc biệt, nhận đặt h&agrave;ng theo thiết kế của từng kh&aacute;ch h&agrave;ng. Mỗi sản phẩm của Nivoca đều c&oacute; chế độ bảo h&agrave;nh vĩnh viễn, nhằm đem đến sự h&agrave;i l&ograve;ng v&agrave; y&ecirc;n t&acirc;m cho kh&aacute;ch h&agrave;ng.</span></p>

<p style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: rgb(102, 102, 102); line-height: 20.8px; text-align: center;"><span style="font-size: 16px;"><img alt="nhẫn cặp, nhẫn đôi, nhẫn cặp bạc, nhẫn đôi bạc, nhan cap, nhan doi, nhẫn cặp bạc cao cấp, nhẫn đôi bạc cao cấp, nhẫn bạc cao cấp, nhẫn đôi cao cấp" src="http://nivoca.com/fileman/Uploads/Nhan%20cap/nhan-doi-bac-Beautiful.jpg" style="width: 600px; height: 375px;" /></span></p>

<p style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: rgb(102, 102, 102); line-height: 20px; text-align: center;"><em>Nhẫn cặp (đ&ocirc;i) bạc cao cấp Beautiful ( H&igrave;nh ảnh sản phẩm thật của Nivoca )</em></p>

<p style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: rgb(102, 102, 102); line-height: 20px; text-align: justify;"><span style="font-size: 16px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Nếu bạn đang ph&acirc;n v&acirc;n chọn lựa cho m&igrave;nh một bộ nhẫn đ&ocirc;i, nhẫn cặp ưng &yacute;, đừng ngại ng&ugrave;ng h&atilde;y li&ecirc;n hệ với ch&uacute;ng t&ocirc;i để được tư vấn, giải đ&aacute;p những thắc mắc v&agrave; gi&uacute;p bạn lựa chọn cho m&igrave;nh những sản phẩm ưng &yacute;. Hi vọng rằng t&igrave;nh y&ecirc;u của c&aacute;c bạn sẽ sớm đ&acirc;m chồi nảy lộc, ra hoa kết tr&aacute;i.&nbsp;</span></p>

<p style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: rgb(102, 102, 102); line-height: 20.8px; text-align: center;"><span style="line-height: 20.8px; color: rgb(204, 0, 102);">- - - - - - - - - - - -&nbsp;</span><strong style="line-height: 20.8px; color: rgb(204, 0, 102);"><span style="font-size: 20px;">Nivoca&nbsp;</span></strong><em style="line-height: 20.8px; color: rgb(204, 0, 102);">Jewelry &amp; More&nbsp;</em><span style="line-height: 20.8px; color: rgb(204, 0, 102);">- - - - - - - - - - - -</span></p>');

			$this->db->where('nid', $product['nid']);
			$this->db->order_by('nid + 0',"asc" );
			$this->db->update('tproducts', $data);			
		}
		//echo "abc";
		exit("Update done...");
	//	die()
	}
}
