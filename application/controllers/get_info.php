<?php
class get_info extends Controller
{
    var $data_view = '';
    var $title = '';
    var $tags = '';
    var $description = '';
	/*
    var $cname = '';
    var $cemail = '';
    var $cphone = '';
    var $cquantity = '';
    var $cnote = '';
    var $id_hidden = '';
	var $caddress ='';
    var $bnt_submit01 = ''; */
    function get_info()
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
		/*
        $_SESSION['back_link'] = base_url();
        if (isset($_POST['cname']))
            $this->cname = $_POST['cname'];
        if (isset($_POST['cemail']))
            $this->cemail = $_POST['cemail'];
        if (isset($_POST['cphone']))
            $this->cphone = $_POST['cphone'];
        if (isset($_POST['cquantity']))
            $this->cquantity = $_POST['cquantity'];
        if (isset($_POST['cnote']))
            $this->cnote = $_POST['cnote'];
		if (isset($_POST['caddress']))
            $this->caddress = $_POST['caddress'];
        if (isset($_POST['id_hidden']))
            $this->id_hidden = $_POST['id_hidden'];
        if (isset($_POST['bnt_submit01']))
            $this->bnt_submit01 = $_POST['bnt_submit01']; */
		if(!isset($_SESSION['nid_member']))
			redirect(base_url().'dang-nhap');
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
		
		if(!isset($_SESSION["cart"]))
			redirect(base_url().'gio-hang');
		/*
        if ($this->id_hidden != '' AND $this->cquantity != '')
            add_cart($this->id_hidden, $this->cquantity);
        if ($this->bnt_submit01 != '') {
            $_SESSION["cname"]     = $this->cname;
            $_SESSION["cemail"]    = $this->cemail;
            $_SESSION["cphone"]    = $this->cphone;
            $_SESSION["cquantity"] = $this->cquantity;
            $_SESSION["cnote"]     = $this->cnote;
			$_SESSION["caddress"]     = $this->caddress;
			
        }
		*/
    }
    private function do_business()
    {
        $data['title']           = $this->title;
        $data['tags']            = $this->tags;
        $data['description']     = $this->description;
        $data['menu_sec']        = '';
        $data['menu_cat']        = '';
        $data['menu_top']        = 'get_info';
        $data['data_view']       = $this->data_view;
        $data['g_isget_info'] = 0;
        $this->load->view('get_info', $data);
    }
    function destroy_data()
    {
    }
}
	