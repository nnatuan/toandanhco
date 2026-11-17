<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class product_detail extends Controller
{
    var $g_nid_session = '';
    var $g_nid_user = '';
    var $g_language = '';
    var $g_language_key = 'product_detail';
    var $g_form_folder = 'product_detail_form';
    var $g_menu_id = 'product';
    var $g_form_title = '';
    var $g_form_router = '';
    var $g_form_helpid = '';
    var $m_nid = '';
    var $g_form_link = '';
    var $g_hidden_button = '0';
    var $obj_detail = '';
    var $obj_cat = '';
    var $langsite = '';
    function product_detail()
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
        $lang_ = 'eng';
        if (isset($_SESSION['_lang']))
            $lang_ = $_SESSION['_lang'];
        $this->load->language('ap', $lang_);
        $this->langsite = $lang_;
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
        $obj_detail = get_product_byid($this->m_nid);
        if (!isset($obj_detail['nid']))
            header('Location: ' . base_url() . 'page_not_found');
        $data['title']       = $obj_detail['cproducts'];
        $data['cprice_sale']       = $obj_detail['fprice_sale'];
        $data['cproduct_fb']       = $obj_detail['cproduct_fb'];
        $data['fb_cdescription']       = $obj_detail['fb_cdescription'];
        $data['tags']        = strip_tags($obj_detail['ctag']);
        $data['description'] = strip_tags($obj_detail['cnote']);
        $data['nid']         = $this->m_nid;
        $data['obj_detail']  = $obj_detail;
        $data['menu_sec']    = '';
        $data['menu_cat']    = '';
        $data['menu_top']    = 'products';
        $data['id_cat']      = $obj_detail['nid_cat_products'];
        $data['sec_pro']     = get_product_sec_byid2($obj_detail['nid_material_products']);
        $data['cat_pro']     = get_product_cat_byid2($obj_detail['nid_cat_products']);
        $data['g_ishome']    = 0;
        $data['type_view']   = '1';
        $data['type_sort']   = '0';
        $data['langsite']    = $this->langsite;
        $this->load->view('product_detail', $data);
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
}
