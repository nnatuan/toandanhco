<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class product_detail extends CI_Controller
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
    }
    function index()
    {
        $this->do_process();
    }
    function get($ccode)
    {
        $this->m_nid = $ccode;
     //   $str_query   = ' UPDATE ' . Fget_ap_table('tproducts') . ' SET nview = nview +1 where ccode = "' . $ccode . '"';
     //   $this->db->query($str_query);
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
        $obj_detail          = get_product_byid($this->m_nid);
        if (empty($obj_detail) || ! is_array($obj_detail)) {
            redirect(base_url());
            return;
        }
        $data['title']       = isset($obj_detail['cproducts']) ? $obj_detail['cproducts'] : '';
        $data['tags']        = isset($obj_detail['ctag']) ? strip_tags($obj_detail['ctag']) : '';
        $data['description'] = isset($obj_detail['cnote']) ? strip_tags($obj_detail['cnote']) : '';
        $data['nid']         = $this->m_nid;
        $data['obj_detail']  = $obj_detail;
		$data['nid_type']    = isset($obj_detail['nid_cat_products']) ? $obj_detail['nid_cat_products'] : '';
        $data['menu_top']    = 'product_detail';
        $data['menu_cat']    = '';
        $data['id_cat']      = isset($obj_detail['nid_cat_products']) ? $obj_detail['nid_cat_products'] : '';
        $data['g_ishome']    = 0;
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
