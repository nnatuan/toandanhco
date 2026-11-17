<?php
class home extends CI_Controller
{
    var $data_view = '';
    var $title = '';
    var $tags = '';
    var $description = '';
    var $popup = 0;
    var $row_per_page = '18';
    var $total_page = '';
    var $ntotal_row = 0;
	var $langsite='';
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
        reset_page();
    }
    private function f_set_cookie($cookie_name, $cookie_value)
    {
        return dbset_cookie('cookie_popup_' . $cookie_name, $cookie_value);
    }
	private function f_get_cookie($cookie_name)
    {
        return dbget_cookie('cookie_popup_' . $cookie_name);
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
    private function caculate_data()
    {
		if($this->f_get_cookie('ip')==$_SERVER['REMOTE_ADDR']) {
			$this->popup = 1;
			//exit('0');
		} else
			$this->f_set_cookie('ip',$_SERVER['REMOTE_ADDR']);
    }
    private function do_business()
    {
    //$this->output->cache(10);
        $data['title']        = $this->title;
        $data['tags']         = $this->tags;
        $data['description']  = $this->description;
        $data['menu_sec']     = '';
        $data['menu_cat']     = '';
        $data['menu_top']     = 'home';
        $data['g_ishome']     = 0;
		$data['description']  = $this->description;
		$data['popup']    = $this->popup;
        $this->load->view('home', $data);
    }
    private function destroy_data()
    {
    }
}