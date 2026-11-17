<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class do_cat_product extends CI_Controller
{
    var $m_language = '';
    var $m_nid_user_login = '';
    var $m_nid = '';
    var $m_event = '';
    var $m_button_click = '';
    var $m_link_page = '';
    var $m_link_cancel = '';
    var $m_form_title = '';
    var $m_txt_cimage = '';
    var $m_txt_ccode = '';
    var $m_txt_ccat_products = '';
    var $m_txt_cnote = '';
    var $m_txt_nstatus = '';
    var $m_txt_cindex = '';
    var $m_txt_user01 = '';
    var $m_txt_ddate01 = '';
    var $m_txt_ctag = '';
    var $m_cbo_nid_material_products = '';
    var $m_obj_material_product_view = '';
    var $m_obj_data_view = '';
    var $eng_ccat_products = '';
    var $m_hidden_image_old = '';
    var $m_txt_cthumb_img = '';
    var $m_error_msg = '';
    var $m_link_cancel_trans = '';
	var $cdesc = '';
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
        $this->load->helper('ap_fck');
        $this->tokaban_system_check = '1';
        $this->load->model('cat_product_model');
    }
    function delete_image($nid)
    {
        $obj_data = $this->cat_product_model->get_byid($nid);
        $path     = '.././upload/image_cat_product/';
        unlink($path . $obj_data['cimage']);
        $data['cimage'] = '';
        $this->cat_product_model->update_bynid($nid, $data);
        echo 'Da xoa image!!';
    }
    private function m_language_key($str_key)
    {
        return $this->lang->line('lbl.cat.' . $str_key);
    }
    private function f_set_cookie($cookie_name, $cookie_value)
    {
        return dbset_cookie('cookie_cat_' . $cookie_name, $cookie_value);
    }
    private function f_get_cookie($cookie_name)
    {
        return dbget_cookie('cookie_cat_' . $cookie_name);
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
    private function get_data()
    {
        $this->m_nid_user_login = Fget_userdata('session_nid_user');
        $this->load->language('ap', 'eng');
        if (isset($_FILES["txt_cthumb_img"])) {
            $path                   = './upload/image_cat_product/';
            $this->m_txt_cthumb_img = Fupload_resize_img($_FILES["txt_cthumb_img"], '../' . $path, 1000, 1000);
        }
        if (isset($_POST['eng_ccat_products']))
            $this->eng_ccat_products = trim($_POST['eng_ccat_products']);
        if (isset($_POST['txt_ccat_products'])) {
            $this->m_cbo_nid_material_products = trim($_POST['cbo_nid_material_products']);
            $this->m_txt_ccat_products         = trim($_POST['txt_ccat_products']);
            $this->m_txt_cindex                = trim($_POST['txt_cindex']);
            $this->m_txt_cnote                 = trim($_POST['txt_cnote']);
            $this->m_txt_ccode                 = trim($_POST['txt_ccode']);
            $this->m_txt_nstatus               = trim($_POST['txt_nstatus']);
            $this->m_txt_ctag                  = trim($_POST['txt_ctag']);
			$this->cdesc                 = trim($_POST['cdesc']);
        }
        if (isset($_POST['hidden_nid']))
            $this->m_nid = $_POST['hidden_nid'];
        if (isset($_POST['hidden_image_old']))
            $this->m_hidden_image_old = $_POST['hidden_image_old'];
        if (isset($_POST['hidden_event']))
            $this->m_event = $_POST['hidden_event'];
        if (isset($_POST['hidden_button']))
            $this->m_button_click = $_POST['hidden_button'];
    }
    private function caculate_data()
    {
        $this->m_link_page   = base_url() . 'index.php/do_cat_product/f_update_edit';
        $this->m_link_cancel = base_url() . 'index.php/do_cat_product_listview';
        switch ($this->m_event) {
            case 'edit':
                $this->m_form_title                = $this->m_language_key('FormEditTitle');
                $this->m_link_page                 = base_url() . 'index.php/do_cat_product/f_update_edit';
                $cat                               = $this->cat_product_model->get_byid($this->m_nid);
                $this->m_txt_cthumb_img            = $cat['cimage'];
                $this->m_txt_ccat_products         = $cat['ccat_products'];
                $this->m_txt_cnote                 = $cat['cnote'];
                $this->m_txt_ctag                  = $cat['ctag'];
                $this->m_txt_ccode                 = $cat['ccode'];
                $this->m_txt_cindex                = $cat['cindex'];
                $this->m_txt_nstatus               = $cat['nstatus'];
                $this->m_cbo_nid_material_products = $cat['nid_material_products'];
                $this->eng_ccat_products           = $cat['eng_ccat_products'];
				$this->cdesc                 = $cat['cdesc'];
                $this->m_event                     = 'update_edit';
                break;
            case 'add':
                $this->m_form_title = $this->m_language_key('FormAddTitle');
                $this->m_event      = 'update_add';
                break;
            case 'update_edit':
                $this->m_form_title = $this->m_language_key('FormEditTitle');
                if ($this->m_button_click == 'btn_submit')
                    if ($this->update_data() == TRUE)
                        redirect('do_cat_product_listview');
                $this->m_link_page = base_url() . 'index.php/do_cat_product/f_update_edit';
                break;
            case 'update_add':
                $this->m_form_title = $this->m_language_key('FormAddTitle');
                if ($this->m_button_click == 'btn_submit')
                    if ($this->insert_data() == TRUE)
                        redirect('do_cat_product_listview');
                $this->m_link_page = base_url() . 'index.php/do_cat_product/f_update_add';
                break;
        }
        $this->m_obj_material_product_view = Obj_get_material_product_list($this->m_nid_user_login);
    }
    private function do_business()
    {
        $data['event']               = $this->m_event;
        $data['menu']                = Fget_menu_html($this->m_nid_user_login);
        $data['lbl_form_title']      = $this->m_form_title;
        $data['link_page']           = $this->m_link_page;
        $data['link_cancel']         = $this->m_link_cancel;
        $data['link_cancel_trans']   = $this->m_link_cancel_trans;
        $data['btn_update']          = $this->lang->line('btn.0000.Update');
        $data['btn_cancel']          = $this->lang->line('btn.0000.Cancel');
        $data['lbl_tag']             = $this->lang->line('lbl.0000.Tag');
        $data['get_icon_notnull']    = Fget_icon_notnull();
        $data['get_message_notnull'] = Fget_icon_notnull() . $this->lang->line('msg.0000.NotNullValue');
        ;
        $data['lbl_form_title']        = $this->m_form_title;
        $data['lbl_ccat_product']      = $this->m_language_key('ccat_product');
        $data['lbl_index']             = $this->m_language_key('index');
        $data['lbl_cnote']             = $this->m_language_key('cnote');
        $data['lbl_ccode']             = $this->m_language_key('ccode');
        $data['lbl_nstatus']           = $this->m_language_key('nstatus');
        $data['lbl_cmaterial_product'] = $this->m_language_key('cmaterial_product');
        $data['lbl_error_msg']         = $this->m_error_msg;
        if ($this->m_txt_cthumb_img != '')
            $data['txt_cthumb_img'] = $this->m_txt_cthumb_img;
        else
            $data['txt_cthumb_img'] = $this->m_hidden_image_old;
        $data['fr_img']                       = Fstr_replace('admin/', '', base_url());
        $data['txt_ccat_products']            = $this->m_txt_ccat_products;
        $data['txt_cindex']                   = $this->m_txt_cindex;
        $data['txt_cnote']                    = $this->m_txt_cnote;
		$data['cdesc']                    = $this->cdesc;
        $data['txt_ccode']                    = $this->m_txt_ccode;
        $data['txt_ctag']                     = $this->m_txt_ctag;
        $data['eng_ccat_products']            = $this->eng_ccat_products;
        $data['gencbo_material_product_list'] = Fgen_html_combobox('no', 'cbo_nid_material_products', $this->m_cbo_nid_material_products, '', $this->m_obj_material_product_view, 'nid', 'cmaterial_products', 'nosubmit', '');
        $data['gen_cbo_status']               = Fget_combobox_yes_no('no', 'txt_nstatus', $this->m_txt_nstatus, 'width:150px', $this->lang->line('lbl.0000.Yes'), $this->lang->line('lbl.0000.No'));
        $data['nid']                          = $this->m_nid;
        $data['menu_active']                  = 'cat_product';
        $this->load->view('cat_product_view/index.php', $data);
    }
    private function destroy_data()
    {
    }
    private function check_valid_not_null()
    {
        if ($this->m_txt_ccode == '') {
            $this->m_error_msg = $this->m_language_key('ccode') . $this->lang->line('msg.0000.ErorNotNull');
            return FALSE;
        }
        if ($this->m_txt_ccat_products == '') {
            $this->m_error_msg = $this->m_language_key('ccat_product') . $this->lang->line('msg.0000.ErorNotNull');
            return FALSE;
        }
        return TRUE;
    }
    private function check_valid_before_insert()
    {
        if ($this->check_valid_not_null() == FALSE) {
            return FALSE;
        }
        return TRUE;
    }
    private function insert_data()
    {
        if ($this->check_valid_before_insert() == TRUE) {
            $data = array(
                'nid_material_products' => $this->m_cbo_nid_material_products,
                'ccat_products' => $this->m_txt_ccat_products,
                'eng_ccat_products' => $this->eng_ccat_products,
                'cnote' => $this->m_txt_cnote,
				'cdesc' => $this->cdesc,
                'ccode' => $this->m_txt_ccode,
                'cindex' => $this->m_txt_cindex,
                'ctag' => $this->m_txt_ctag,
                'nstatus' => 1,
                'cimage' => $this->m_txt_cthumb_img,
                'niduser01' => $this->m_nid_user_login,
                'ddate01' => dbget_current_date()
            );
            $this->cat_product_model->insert($data);
            return TRUE;
        } else {
            return FALSE;
        }
    }
    private function check_valid_before_update()
    {
        if ($this->check_valid_not_null() == FALSE)
            return FALSE;
        return TRUE;
    }
    private function update_data()
    {
        if ($this->check_valid_before_update() == TRUE) {
            $data = array(
                'nid_material_products' => $this->m_cbo_nid_material_products,
                'ccat_products' => $this->m_txt_ccat_products,
                'eng_ccat_products' => $this->eng_ccat_products,
                'cnote' => $this->m_txt_cnote,
				'cdesc' => $this->cdesc,
                'ccode' => $this->m_txt_ccode,
                'ctag' => $this->m_txt_ctag,
                'cindex' => $this->m_txt_cindex,
                //'nstatus' => $this->m_txt_nstatus,
                'cimage' => $this->m_txt_cthumb_img,
                'niduser01' => $this->m_nid_user_login,
                'ddate01' => dbget_current_date()
            );
            $this->cat_product_model->update_bynid($this->m_nid, $data);
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

