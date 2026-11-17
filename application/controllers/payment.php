<?php
class payment extends Controller
{
    var $event = '';
    var $obj_payment = '';
    var $m_language = 'eng';
    var $nid_material = '';
    var $nid_cat = '';
    var $title = '';
    var $tags = '';
    var $description = '';
	
	/*
	var $cgender = '';
	var $cfullname = '';
	var $caddress = '';	
	var $cphone = '';
	var $cemail = '';
	var $nid_province = '';
	var $nid_district = '';
	var $cgift = '';
	var $cvat_company = '';
	var $cvat_tax = '';
	var $cvat_address = '';
	var $cnote = '';
	var $btn_submit = ''; */
	
    function payment()
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
        reset_page();
    }
    private function f_set_cookie($cookie_name, $cookie_value)
    {
        return dbset_cookie('cookie_guide_' . $cookie_name, $cookie_value);
    }
    private function f_get_cookie($cookie_name)
    {
        return dbget_cookie('cookie_payment_' . $cookie_name);
    }
    private function m_language_key($str_key)
    {
        return $this->lang->line('lbl.payment.' . $str_key);
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
		if (isset($_POST['cgender']))
			$_SESSION["cgender"] = $_POST['cgender'];
		if (isset($_POST['cfullname']))
            $_SESSION["cfullname"] = $_POST['cfullname'];
        if (isset($_POST['cphone']))
            $_SESSION["cphone"] = $_POST['cphone'];
		if (isset($_POST['caddress']))
            $_SESSION["caddress"] = $_POST['caddress'];
		if (isset($_POST['province']))
            $_SESSION["province"] = $_POST['province'];
		if (isset($_POST['district']))
            $_SESSION["district"] = $_POST['district'];
		if (isset($_POST['cvat_company']))
            $_SESSION["cvat_company"] = $_POST['cvat_company'];
		if (isset($_POST['cvat_tax']))
            $_SESSION["cvat_tax"] = $_POST['cvat_tax'];
        if (isset($_POST['cvat_address']))
            $_SESSION["cvat_address"] = $_POST['cvat_address'];
        if (isset($_POST['paymethod'])){
            $_SESSION["paymethod"] = $_POST['paymethod'];
            }
            
		if (isset($_POST['cgift'])) {
			/*
			if(!empty($_POST['cgift'])){
				$_SESSION["cgift"] = '1';
			} else {
				$_SESSION["cgift"] = '0';
			} */
			$_SESSION["cgift"] = $_POST['cgift'];
		}  
    }
    private function caculate_data()
    {
        $this->load->language('ap', $this->m_language);
		
		if (!isset($_SESSION['cemail']) && !isset($_SESSION['cemail_log'])) {
			redirect(base_url().'mua-hang/dang-nhap');
		} 
    }
    private function do_business()
    {
        $data['title']       = $this->title;
        $data['tags']        = $this->tags;
        $data['description'] = $this->description;
        $data['menu_sec']    = '';
        $data['menu_cat']    = '';
        $data['menu_top']    = 'payment';
        $data['g_ishome']    = 0;
        $this->load->view('payment', $data);
    }
    private function destroy_data()
    {
    }
    private function get_where_guide_string()
    {
        $str = 'where nstatus = "1"';
        return $str;
    }
}