<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class do_product extends CI_Controller
{
    var $m_language = '';
    var $m_nid_user_login = '';
    var $m_nid = '';
    var $m_event = '';
    var $m_button_click = '';
    var $m_link_page = '';
    var $m_link_cancel = '';
    var $m_form_title = '';
    var $m_txt_nid = '';
    var $m_txt_ccode = '';
    var $m_txt_cproducts = '';
    var $m_txt_cnote = '';
    var $m_chk_nspecial_product = 0;
    var $m_txt_nstatus = '';
	var $m_txt_ntype = '';
    var $m_txt_cindex = '';
    var $m_txt_user01 = '';
    var $m_txt_ddate01 = '';
    var $m_txt_ctag = '';
    var $clink = '';
	var $clink2 = '';
	var $clink3 = '';
	var $clink4 = '';
	var $clink_name = '';
	var $clink_name2 = '';
	var $clink_name3 = '';
	var $cproduct_fb = '';
    var $m_txt_cimage = '';
    var $m_hidden_image_old = '';
	var $cimage_gift = '';
    var $m_hidden_image_old_gift = '';
	var $cimage_cer = '';
    var $m_hidden_image_old_cer = '';
    var $m_txt_cimage_resize = '';
    var $m_hidden_image_old_resize = '';
    var $m_txt_fprice = '';
    var $m_txt_fprice_sale = '';
    var $m_txt_cdescription = '';
    var $m_txt_cdetail = '';
    var $nid_brand_products = '';
    var $m_cbo_nid_material_products = '';
    var $m_cbo_nid_cat_products = '';
    var $m_cbo_nid_weight = '';
    var $m_obj_material_product_view = '';
    var $m_obj_cat_product_view = '';
    var $m_obj_brand = '';
    var $m_obj_weight_view = '';
    var $m_obj_data_view = '';
    var $eng_cproducts = '';
    var $clink_shoppe = '';
    var $nid_sub_menu = '';
    var $m_error_msg = '';
    var $m_link_cancel_trans = '';
    function __construct()
	{
		parent::__construct();
        session_start();
        $this->load->database();
        $this->load->helper('ap_db');
        $this->load->helper('ap_function');
        $this->load->helper('ap_html');
        $this->load->helper('ap_view');
        $this->load->helper('ap_object');
        //$this->load->helper('ap_fck');
        $this->tokaban_system_check = '1';
        $this->load->model('product_model');
        //init_fck();
        //$this->load->library('fckeditor');
        //$this->fckeditor->BasePath = base_url() . 'ap_application/plugins/fckeditor/';
    }
    private function m_language_key($str_key)
    {
        return $this->lang->line('lbl.product.' . $str_key);
    }
    function f_edit($nid)
    {
        $this->m_event = 'edit';
        $this->m_nid   = $nid;
        $this->do_process();
    }
    function f_update_edit()
    {
        $this->m_event = 'update_edit';
        $this->do_process();
    }
    function f_add()
    {
        $this->m_event = 'add';
        $this->m_nid   = '0';
        $this->do_process();
    }
    function f_update_add()
    {
        $this->m_event = 'update_add';
        $this->do_process();
    }
    function do_process()
    {
        $this->get_data();
        $this->caculate_data();
        $this->do_business();
        $this->destroy_data();
    }
	private function convert_webp($path)
    {
		$webp_img = webpConvert2($path);
		delfile($path);
		return(basename($webp_img));
	}
    private function get_data()
    {
        $this->m_nid_user_login = Fget_userdata('session_nid_user');
        $this->load->language('ap', 'eng');
		if (isset($_FILES["cproduct_fb"])) {
            if ($_FILES["cproduct_fb"]["name"] != '') {
                    $path_fb               = '.././upload/fb/';
					$this->cproduct_fb = Fupload_resize_img($_FILES["cproduct_fb"], $path_fb, 600, 315);
					//if($this->cproduct_fb!="")
					//	$this->cproduct_fb = $this->convert_webp($path_fb . $this->cproduct_fb);
				}
			}
        if (isset($_FILES["txt_cimage"])) {
            if ($_FILES["txt_cimage"]["name"] != '') {
                $path_full                 = '.././upload/images_product/full_images/';
                $this->m_txt_cimage        = Fupload_resize_img($_FILES["txt_cimage"], $path_full, 3000, 3000);
                $path_detail               = '.././upload/images_product/resize_images/';
                $this->m_txt_cimage_resize = resize_img($_FILES["txt_cimage"], $this->m_txt_cimage, $path_full . $this->m_txt_cimage, $path_detail, 300, 300);
                
				if ($this->m_txt_cimage != '') {
                    //$this->m_txt_cimage = $this->convert_webp($path_full . $this->m_txt_cimage);
					
                    $path = '.././upload/images_product/full_images/';
                    delfile($path . $_POST['hidden_image_old']);
					
                    $this->m_hidden_image_old = $this->m_txt_cimage;
                } else
                    $this->m_hidden_image_old = $_POST['hidden_image_old'];
                if ($this->m_txt_cimage_resize != '') {
                    //$this->m_txt_cimage_resize = $this->convert_webp($path_detail . $this->m_txt_cimage_resize);
                    
					$path = '.././upload/images_product/resize_images/';
                    delfile($path . $_POST['hidden_image_old_resize']);
					
                    $this->m_hidden_image_old_resize = $this->m_txt_cimage_resize;
                } else
                    $this->m_hidden_image_old_resize = $_POST['hidden_image_old'];
            }
        }

        if (!empty($_POST['chk_nspecial_product']))
            $this->m_chk_nspecial_product = $_POST['chk_nspecial_product'];
        if (isset($_POST['eng_cproducts']))
            $this->eng_cproducts = trim($_POST['eng_cproducts']);
		if (isset($_POST['fprice']))
            $this->m_txt_fprice = Fstr_replace(',', '', trim($_POST['fprice']));
		if (isset($_POST['txt_fprice_sale']))
            $this->m_txt_fprice_sale = Fstr_replace(',', '', trim($_POST['txt_fprice_sale']));

        if (isset($_POST['clink_shoppe']))
            $this->clink_shoppe = trim($_POST['clink_shoppe']);
        if (isset($_POST['nid_sub_menu']))
            $this->nid_sub_menu = trim($_POST['nid_sub_menu']);
        if (isset($_POST['txt_ccode'])) {
            $this->m_txt_ccode        = trim($_POST['txt_ccode']);
            $this->m_txt_cproducts    = trim($_POST['txt_cproducts']);
            $this->m_txt_cnote        = trim($_POST['txt_cnote']);
            $this->m_txt_cindex       = $_POST['txt_cindex'];
            $this->m_txt_ctag         = $_POST['txt_ctag'];
            $this->m_txt_cdescription = $_POST['txt_cdescription'];
            $this->m_txt_cdetail      = $_POST['txt_cdetail'];
//			$this->clink      = $_POST['clink'];
			//$this->clink2      = $_POST['clink2'];
			//$this->clink3      = $_POST['clink3'];
			//$this->clink4      = $_POST['clink4'];
			//$this->clink_name      = $_POST['clink_name'];
			//$this->clink_name2      = $_POST['clink_name2'];
			//$this->clink_name3      = $_POST['clink_name3'];
			//$this->cproduct_fb      = $_POST['cproduct_fb'];
			//exit('1');
        }
        if (isset($_POST['cbo_nid_material_products']))
            $this->m_cbo_nid_material_products = $_POST['cbo_nid_material_products'];
        if (isset($_POST['cbo_nid_cat_products']))
            $this->m_cbo_nid_cat_products = $_POST['cbo_nid_cat_products'];
        if (isset($_POST['cbo_nid_weight']))
            $this->m_cbo_nid_weight = $_POST['cbo_nid_weight'];
        if (isset($_POST['hidden_nid']))
            $this->m_nid = $_POST['hidden_nid'];
        if (isset($_POST['hidden_event']))
            $this->m_event = $_POST['hidden_event'];
        if (isset($_POST['hidden_button']))
            $this->m_button_click = $_POST['hidden_button'];
		if (isset($_POST['hidden_image_old_cer']))
            $this->m_hidden_image_old_cer = $_POST['hidden_image_old_cer'];
		if (isset($_POST['hidden_image_old_gift']))
            $this->m_hidden_image_old_gift = $_POST['hidden_image_old_gift'];
        if (isset($_POST['hidden_image_old']))
            $this->m_hidden_image_old = $_POST['hidden_image_old'];
        if (isset($_POST['hidden_image_old_resize']))
            $this->m_hidden_image_old_resize = $_POST['hidden_image_old_resize'];
		if (isset($_POST['txt_ntype']))
            $this->m_txt_ntype = $_POST['txt_ntype'];
    }
    private function caculate_data()
    {
        $this->m_link_page   = base_url() . 'index.php/do_product/f_update_edit';
        $this->m_link_cancel = base_url() . 'index.php/do_product_listview';
        switch ($this->m_event) {
            case 'edit':
                $obj_data                          = $this->product_model->get_byid($this->m_nid);
                $this->m_txt_ccode                 = $obj_data['ccode'];
                $this->m_txt_cproducts             = $obj_data['cproducts'];
                $this->m_txt_cnote                 = $obj_data['cnote'];
                $this->m_chk_nspecial_product      = $obj_data['nspecial_products'];
                $this->m_txt_cindex                = $obj_data['cindex'];
                $this->m_txt_nstatus               = $obj_data['nstatus'];

                $this->m_txt_ctag                  = $obj_data['ctag'];

                $this->m_txt_cimage                = $obj_data['cimage'];
                $this->m_txt_cimage_resize         = $obj_data['cimage_resize'];
                $this->m_txt_fprice                = $obj_data['fprice'];
                $this->m_txt_fprice_sale           = $obj_data['fprice_sale'];
                $this->m_txt_cdescription          = $obj_data['cdescription'];
                $this->m_txt_cdetail               = $obj_data['cdetail'];
                $this->m_cbo_nid_material_products = $obj_data['nid_material_products'];
                $this->m_cbo_nid_cat_products      = $obj_data['nid_cat_products'];
                $this->nid_brand_products          = $obj_data['nid_brand_products'];
                $this->eng_cproducts               = $obj_data['eng_cproducts'];
                $this->clink_shoppe            = $obj_data['clink_shoppe'];
                $this->nid_sub_menu                 = $obj_data['nid_sub_menu'];
                $this->cproduct_fb            = $obj_data['cproduct_fb'];
                $this->m_link_page                 = base_url() . 'index.php/do_product/f_update_edit';
                $this->m_form_title                = $this->m_language_key('FormEditTitle') . '<label style="color:#FF6633"> ' . $this->m_txt_cproducts . '</label>';
                $this->m_event                     = 'update_edit';
                break;
            case 'add':
                $this->m_form_title = $this->m_language_key('FormAddTitle');
                $this->m_event      = 'update_add';
                break;
            case 'update_edit':
                if ($this->m_button_click == 'btn_submit')
                    if ($this->update_data() == TRUE)
                        redirect('do_product_listview');
                $this->m_form_title = $this->m_language_key('FormEditTitle') . '<label style="color:#FF6633"> ' . $this->m_txt_cproducts . '</label>';
                $this->m_link_page  = base_url() . 'index.php/do_product/f_update_edit';
                break;
            case 'update_add':
                if ($this->m_txt_cimage == '' && $this->m_txt_cimage_resize == '') {
                    $this->m_txt_cimage        = $this->m_hidden_image_old;
                    $this->m_txt_cimage_resize = $this->m_hidden_image_old_resize;
                }
				if ($this->cimage_cer == '') {
                    $this->cimage_cer        = $this->m_hidden_image_old_cer;
                }
				if ($this->cimage_gift == '') {
                    $this->cimage_gift        = $this->m_hidden_image_old_gift;
                }
                if ($this->m_button_click == 'btn_submit')
                    if ($this->insert_data() == TRUE)
                        redirect('do_product_listview');
                $this->m_link_page  = base_url() . 'index.php/do_product/f_update_add';
                $this->m_form_title = $this->m_language_key('FormAddTitle') . ' ' . $this->m_txt_cproducts;
                break;
        }
        $this->m_obj_material_product_view = Obj_get_material_product_list($this->m_nid_user_login);
        $this->m_obj_cat_product_view      = Obj_get_cat_product_list($this->m_nid_user_login, $this->m_cbo_nid_material_products);
    }
    private function do_business()
    {
		//
        $data['event']               = $this->m_event;
        $data['menu']                = Fget_menu_html($this->m_nid_user_login);
        $data['lbl_form_title']      = $this->m_form_title;
        $data['link_page']           = $this->m_link_page;
        $data['link_cancel']         = $this->m_link_cancel;
        $data['link_cancel_trans']   = $this->m_link_cancel_trans;
        $data['btn_update']          = $this->lang->line('btn.0000.Update');
        $data['btn_cancel']          = $this->lang->line('btn.0000.Cancel');
        $data['fr_img']              = Fstr_replace('admin/', '', base_url());
        $data['lbl_tag']             = $this->lang->line('lbl.0000.Tag');
        $data['get_icon_notnull']    = Fget_icon_notnull();
        $data['get_message_notnull'] = Fget_icon_notnull() . $this->lang->line('msg.0000.NotNullValue');
        
        $data['lbl_form_title']              = $this->m_form_title;
        $data['lbl_ccode']                   = $this->m_language_key('ccode');
        $data['lbl_cproducts']               = $this->m_language_key('cproducts');
        $data['lbl_cnote']                   = $this->m_language_key('cnote');
        $data['lbl_cindex']                  = $this->m_language_key('cindex');
        $data['lbl_nstatus']                 = $this->m_language_key('nstatus');
        $data['lbl_nspecial_product']        = $this->m_language_key('nspecial_product');
        $data['lbl_nid_metarial_product']    = $this->m_language_key('nid_metarial_product');
        $data['lbl_nid_brand_product']       = $this->m_language_key('nid_brand_product');
        $data['lbl_nid_cat_product']         = $this->m_language_key('nid_cat_product');
        $data['lbl_choose_metarial_product'] = $this->m_language_key('choose_metarial_product');
        $data['lbl_choose_cat_product']      = $this->m_language_key('choose_cat_product');
        $data['lbl_cimage']                  = $this->m_language_key('cimage');
        $data['lbl_fprice']                  = $this->m_language_key('fprice');
        $data['lbl_fprice_sale']             = $this->m_language_key('fprice_sale');
        $data['lbl_cdescription']            = $this->m_language_key('cdescription');
        $data['lbl_cdetail']                 = $this->m_language_key('cdetail');
        $data['lbl_cmodel']                  = $this->m_language_key('cmodel');
        $data['lbl_clink']                  = $this->m_language_key('clink');
        $data['lbl_error_msg']               = $this->m_error_msg;
        $data['txt_ccode']                   = $this->m_txt_ccode;
        $data['txt_cproducts']               = $this->m_txt_cproducts;
        $data['txt_cnote']                   = $this->m_txt_cnote;
        $data['txt_cindex']                  = $this->m_txt_cindex;
        $data['txt_nstatus']                 = $this->m_txt_nstatus;
		$data['txt_ntype']                 = $this->m_txt_ntype;
        $data['chk_nspecial_product']        = $this->m_chk_nspecial_product;
        $data['txt_ctag']                    = $this->m_txt_ctag;
		if ($this->cimage_cer == '')
            $this->cimage_cer = $this->m_hidden_image_old_cer;
        $data['cimage_cer'] = $this->cimage_cer;
		if ($this->cimage_gift == '')
            $this->cimage_gift = $this->m_hidden_image_old_gift;
        $data['cimage_gift'] = $this->cimage_gift;
        if ($this->m_txt_cimage == '')
            $this->m_txt_cimage = $this->m_hidden_image_old;
        $data['txt_cimage'] = $this->m_txt_cimage;
        if ($this->m_txt_cimage_resize == '')
            $this->m_txt_cimage_resize = $this->m_hidden_image_old_resize;
        $data['txt_cimage_resize']         = $this->m_txt_cimage_resize;
        $data['txt_fprice']                = $this->m_txt_fprice;
        $data['txt_fprice_sale']           = $this->m_txt_fprice_sale;
        $data['txt_cdescription']          = $this->m_txt_cdescription;
        $data['txt_cdetail']               = $this->m_txt_cdetail;
        $data['clink']                = $this->clink;
		$data['clink2']                = $this->clink2;
		$data['clink3']                = $this->clink3;
		$data['clink4']                = $this->clink4;
		$data['clink_name']                = $this->clink_name;
		$data['clink_name2']                = $this->clink_name2;
		$data['clink_name3']                = $this->clink_name3;
		$data['cproduct_fb']                = $this->cproduct_fb;
		
        $data['nid']                       = $this->m_nid;
        $data['nid_brand_products']        = $this->nid_brand_products;
        $data['cbo_nid_material_products'] = $this->m_cbo_nid_material_products;
        $data['material_product_view']     = $this->m_obj_material_product_view;
        $data['eng_cproducts']             = $this->eng_cproducts;
        $data['clink_shoppe']          = $this->clink_shoppe;
        $data['nid_sub_menu']               = $this->nid_sub_menu;
        $data['cbo_nid_cat_products']      = $this->m_cbo_nid_cat_products;
        $data['gen_cbo_status']            = Fget_combobox_yes_no('no', 'txt_nstatus', $this->m_txt_nstatus, 'width:200px', $this->lang->line('lbl.0000.Yes'), $this->lang->line('lbl.0000.No'));
        $data['gen_cbo_type']            = Fget_combobox_yes_no('no', 'txt_ntype', $this->m_txt_ntype, 'width:200px', "Domestic", "Export");
		$data['gencbo_cat_product_list']   = Fgen_html_combobox('no', 'cbo_nid_cat_products', $this->m_cbo_nid_cat_products, '', $this->m_obj_cat_product_view, 'nid', 'ccat_products', 'nosubmit', '');
        $data['cbo_nid_weight']            = $this->m_cbo_nid_weight;
        $data['obj_weight_view']           = $this->m_obj_weight_view;
        $data['menu_active']               = 'product';
        $this->load->view('product_view/index.php', $data);
    }
    private function destroy_data()
    {
    }
    private function check_valid_not_null()
    {
        if ($this->m_txt_ccode == '') {
            $this->m_error_msg = $this->m_language_key('ccode') . $this->lang->line('msg.0000.ErorNotNull');//exit("1");
            return FALSE;
        }
        if ($this->m_txt_cproducts == '') {
            $this->m_error_msg = $this->m_language_key('cproducts') . $this->lang->line('msg.0000.ErorNotNull');//exit("2");
            return FALSE;
        }
		/*
        if ($this->m_cbo_nid_material_products == '') {
            $this->m_error_msg = $this->m_language_key('nid_metarial_product') . $this->lang->line('msg.0000.ErorNotNull');
            return FALSE;
        }*/
        if ($this->m_cbo_nid_cat_products == '' OR $this->m_cbo_nid_cat_products == 0) {
            $this->m_error_msg = $this->m_language_key('nid_cat_product') . $this->lang->line('msg.0000.ErorNotNull');//exit("3");
            return FALSE;
        }
        return TRUE;
    }
    private function check_valid_before_insert()
    {
        if ($this->check_valid_not_null() == FALSE) {
            
            return FALSE;

        }
        if (fbcheck_exists_key_addnew('tproducts', 'ccode', $this->m_txt_ccode) == FALSE) {
            exit("aaa");
            $this->m_error_msg = $this->m_language_key('ccode') . $this->lang->line('msg.0000.ErorDoubleKey');
            return FALSE;
        }
        if (fbcheck_exists_key_addnew('tproducts', 'cproducts', $this->m_txt_cproducts) == FALSE) {
            $this->m_error_msg = $this->m_language_key('cproducts') . $this->lang->line('msg.0000.ErorDoubleKey');
            return FALSE;
        }
        return TRUE;
    }
    private function insert_data()
    {

        if ($this->check_valid_before_insert() == TRUE) {
            $data = array(
                'ccode' => $this->m_txt_ccode,
                'cproducts' => $this->m_txt_cproducts,
                'cnote' => $this->m_txt_cnote,
                //'nid_material_products' => $this->m_cbo_nid_material_products,
				'nid_material_products' => 1,
                //'nid_cat_products' => $this->m_cbo_nid_cat_products,
				'nid_cat_products' => 106,
                'nspecial_products' => $this->m_chk_nspecial_product,
                'eng_cproducts' => $this->eng_cproducts,
                'clink_shoppe' => $this->clink_shoppe,
                'nid_sub_menu' => 1,//$this->nid_sub_menu,
                'cindex' => $this->m_txt_cindex,
                'nstatus' => 1,
                'ncheck' => 0,
                'nnew'=>0,
				'nkm' => 0,
				'npb' => 0,
                'ctype' => 0,
                'ctag' => $this->m_txt_ctag,
				'clink' => $this->clink,
                'cimage' => $this->m_txt_cimage,
                'cimage_resize' => $this->m_txt_cimage_resize,
				'cproduct_fb' => $this->cproduct_fb,
                'fprice' => $this->m_txt_fprice,
                'fprice_sale' => $this->m_txt_fprice_sale,
                'cdescription' => $this->m_txt_cdescription,
                'cdetail' => $this->m_txt_cdetail,
                //'nid_weight' => $this->m_cbo_nid_weight,
                'niduser01' => $this->m_nid_user_login,
                'niduser02' => $this->m_nid_user_login,
                'ddate01' => dbget_current_date(),
                'ddate02' => dbget_current_date()

            );
           // exit("a");
            $this->product_model->insert($data);
			/*
            $nid_cat     = dbget_identity();
            $clink       = cleanText($this->m_txt_cproducts);
            $clink       = khongdau($this->m_txt_cproducts);
            $nid_product = dbget_identity();
            $data2       = array(
                'nid_detail' => $nid_product,
                'clink' => $clink,
                'ctable' => 'tproduct'
            );
            $this->db->insert('tindex', $data2);*/
            //exit("a");
            return TRUE;
        } else {
            return FALSE;
        }
    }
    private function check_valid_before_update()
    {
        if ($this->check_valid_not_null() == FALSE)
            return FALSE;
        if (fbcheck_exists_key_update('tproducts', 'ccode', $this->m_txt_ccode, $this->m_nid) == FALSE) {
            $this->m_error_msg = $this->m_language_key('ccode') . $this->lang->line('msg.0000.ErorDoubleKey');
            return FALSE;
        }
        return TRUE;
    }
    private function update_data()
    {
		//exit($this->m_error_msg);
        if ($this->check_valid_before_update() == TRUE) {
			
            $data = array(
                'ccode' => $this->m_txt_ccode,
                'cproducts' => $this->m_txt_cproducts,
                'cnote' => $this->m_txt_cnote,
                'nspecial_products' => $this->m_chk_nspecial_product,
                'cindex' => $this->m_txt_cindex,
                'ctag' => $this->m_txt_ctag,
                'eng_cproducts' => $this->eng_cproducts,
                'clink_shoppe' => $this->clink_shoppe,
                'nid_sub_menu' => $this->nid_sub_menu,
				'clink' => $this->clink,
                'fprice' => $this->m_txt_fprice,
                'fprice_sale' => $this->m_txt_fprice_sale,
                'cdescription' => $this->m_txt_cdescription,
                'cdetail' => $this->m_txt_cdetail,
                //'nid_material_products' => $this->m_cbo_nid_material_products,
                'nid_cat_products' => $this->m_cbo_nid_cat_products,

            //    'nid_weight' => $this->m_cbo_nid_weight,
                'niduser02' => $this->m_nid_user_login,
                'ddate01' => dbget_current_date(),
                'ddate02' => dbget_current_date()
            );
			if ($this->cimage_gift != '') {
                $path = '.././upload/images_product/gift_images/';
                delfile($path . $this->m_hidden_image_old_gift);
                $data['cimage_gift'] = $this->cimage_gift;
            }
			if ($this->cimage_cer != '') {
                $path = '.././upload/images_product/cer_images/';
                delfile($path . $this->m_hidden_image_old_cer);
                $data['cimage_cer'] = $this->cimage_cer;
            }
			if ($this->cproduct_fb != '') {
                //$path = '.././upload/fb/';
                //delfile($path . $this->m_hidden_image_old_fb);
                $data['cproduct_fb'] = $this->cproduct_fb;
            }
            if ($this->m_txt_cimage != '') {
                $path = '.././upload/images_product/full_images/';
                delfile($path . $this->m_hidden_image_old);
                $data['cimage'] = $this->m_txt_cimage;
            }
            if ($this->m_txt_cimage_resize != '') {
                $path = '.././upload/images_product/resize_images/';
                delfile($path . $this->m_hidden_image_old_resize);
                $data['cimage_resize'] = $this->m_txt_cimage_resize;
            }
            $this->product_model->update_bynid($this->m_nid, $data);
			/*
            $clink = cleanText($this->m_txt_cproducts);
            $clink = khongdau($this->m_txt_cproducts);
            $data2 = array(
                'clink' => $clink
            );
            $this->db->where('nid_detail', $this->m_nid);
            $this->db->where('ctable', 'tproduct');
            $this->db->update('tindex', $data2);*/
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function load_cbo_cat_product($nid_product, $nid_metarial_product = '')
    {
        $this->load->language('ap', 'eng');
        $m_nid_product     = $nid_product;
        $m_nid_cat_product = '';
        if ($nid_product != '' && $nid_product != 0) {
            $obj_data          = $this->product_model->get_byid($nid_product);
            $m_nid_cat_product = $obj_data['nid_cat_products'];
        } else
            $m_nid_cat_product = '';
        $this->m_obj_cat_product_view  = Obj_get_cat_product_list('', $nid_metarial_product);
        $data['nid_cat_products']      = $m_nid_cat_product;
        $data['nid_metarial_products'] = $nid_metarial_product;
        $data['datas']                 = $this->m_obj_cat_product_view;
        $this->load->view('product_view/ap_cbo_cat_product', $data);
    }
    function upload_img($file, $path)
    {
        $file_name = '';
        if ((($file["type"] == "image/gif") || ($file["type"] == "image/jpeg") || ($file["type"] == "image/pjpeg")) && ($file["size"] < 2000000)) {
            if ($file["error"] > 0) {
                $msg = "Co loi khi upload anh: " . $_FILES["image2"]["error"] . "<br />";
            } else {
                if (file_exists("upload/" . $file["name"])) {
                    $msg = $file["name"] . " Files da ton tai. ";
                } else {
                    list($name, $ext) = split('[.]', $file["name"]);
                    $file_name          = md5(rand(2, 999) . date('Ymdhis')) . '.' . $ext;
                    $this->m_txt_cimage = $file_name;
                    move_uploaded_file($file["tmp_name"], $path . $file_name);
                }
            }
        }
        return $file_name;
    }
    function ajax_get_product_cat()
    {
        $nid_cat   = '0';
        $obj_brand = '';
        if (isset($_POST['nid_cat']))
            $nid_cat = $_POST['nid_cat'];
        $this->db->select('nid,ccat_products');
        $this->db->where('nid_material_products', $nid_cat);
        $obj_brand = $this->db->get('tcat_products');
        $obj_brand = $obj_brand->result_array();
        $str       = '<select name="cbo_nid_cat_products" id="cbo_nid_cat_products" style="width:200px;" onchange="load_brand_select(this.value);">';
        $str .= '<option value="" ></option>';
        foreach ($obj_brand as $brand) {
            $str .= '<option value="' . $brand['nid'] . '">' . $brand['ccat_products'] . '</option>';
        }
        $str .= '</select>';
        echo $str;
    }
    function ajax_get_product_cat_select()
    {
        $nid_cat        = '0';
        $nid_cat_select = '0';
        $obj_brand      = '';
        if (isset($_POST['nid_cat']))
            $nid_cat = $_POST['nid_cat'];
        if (isset($_POST['nid_cat_select']))
            $nid_cat_select = $_POST['nid_cat_select'];
        $this->db->select('nid,ccat_products');
        $this->db->where('nid_material_products', $nid_cat);
        $obj_brand = $this->db->get('tcat_products');
        $obj_brand = $obj_brand->result_array();
        $str       = '<select name="cbo_nid_cat_products" id="cbo_nid_cat_products" style="width:200px;" onchange="load_brand_select(this.value);">';
        $str .= '<option value="" ></option>';
        foreach ($obj_brand as $brand) {
            if ($brand['nid'] == $nid_cat_select)
                $str .= '<option value="' . $brand['nid'] . '" selected="selected">' . $brand['ccat_products'] . '</option>';
            else
                $str .= '<option value="' . $brand['nid'] . '">' . $brand['ccat_products'] . '</option>';
        }
        $str .= '</select>';
        echo $str;
    }
    function ajax_get_product_brand()
    {
        $nid_cat   = '0';
        $obj_brand = '';
        if (isset($_POST['nid_cat']))
            $nid_cat = $_POST['nid_cat'];
        $this->db->select('nid,cbrand_products');
        $this->db->where('nid_cat_products', $nid_cat);
        $obj_brand = $this->db->get('tbrand_products');
        $obj_brand = $obj_brand->result_array();
        $str       = '<select name="nid_brand_products" id="nid_brand_products" style="width:200px;">';
        $str .= '<option value="" ></option>';
        foreach ($obj_brand as $brand) {
            $str .= '<option value="' . $brand['nid'] . '">' . $brand['cbrand_products'] . '</option>';
        }
        $str .= '</select>';
        echo $str;
    }
    function ajax_get_product_brand_select()
    {
        $nid_cat        = '0';
        $nid_cat_select = '0';
        $obj_brand      = '';
        if (isset($_POST['nid_cat']))
            $nid_cat = $_POST['nid_cat'];
        if (isset($_POST['nid_cat_select']))
            $nid_cat_select = $_POST['nid_cat_select'];
        $this->db->select('nid,cbrand_products');
        $this->db->where('nid_cat_products', $nid_cat);
        $obj_brand = $this->db->get('tbrand_products');
        $obj_brand = $obj_brand->result_array();
        $str       = '<select name="nid_brand_products" id="nid_brand_products" style="width:200px;">';
        $str .= '<option value="" ></option>';
        foreach ($obj_brand as $brand) {
            if ($brand['nid'] == $nid_cat_select)
                $str .= '<option value="' . $brand['nid'] . '" selected="selected">' . $brand['cbrand_products'] . '</option>';
            else
                $str .= '<option value="' . $brand['nid'] . '">' . $brand['cbrand_products'] . '</option>';
        }
        $str .= '</select>';
        echo $str;
    }
}
