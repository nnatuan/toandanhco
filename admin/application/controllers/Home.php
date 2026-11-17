<?php
class Home extends CI_Controller
{
    var $data_view = '';
    var $title = '';
    var $tags = '';
    var $description = '';
    var $curr_page = '';
    var $row_per_page = '18';
    var $total_page = '';
    var $ntotal_row = 0;
	var $view_folder = '';
	var $nid_flash = '';
    function __construct()
    {
        parent::__construct();
        session_start();
        $this->load->database();
        $this->load->helper('ap_db');
        $this->load->helper('ap_object');
        //$this->load->helper('ap_function');
        //$this->load->helper('ap_view');
        //$this->load->helper('ap_module');
        $this->tokaban_system_check = 'begin';
        //reset_page();
        //$this->do_process();
    }
	/*
    function add_cart($nid)
    {
        if (isset($_SESSION['cart'][$nid])) {
            $qty = $_SESSION['cart'][$nid] + 1;
        } else {
            $qty = 1;
        }
        $s                      = '';
        $_SESSION['cart'][$nid] = $qty;
        $_SESSION['back_link']  = base_url();
        redirect('home');
    }
    function delete_cart($nid)
    {
        if (isset($_SESSION['cart'][$nid]))
            unset($_SESSION['cart'][$nid]);
        $url = '';
        if (isset($_SESSION['back_link']))
            $url = $_SESSION['back_link'];
        else
            $url = base_url();
        redirect($url);
    } */
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
        
    }
    private function caculate_data()
    {
        

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
        $data['curr_page']    = $this->curr_page;
        $data['row_per_page'] = $this->row_per_page;
        $data['total_page']   = $this->total_page;
        $data['total_row']    = $this->ntotal_row;
        $data['data_view']    = $this->data_view;
        $data['g_ishome']     = 0;
        $data['view_folder']    = $this->view_folder;
        $data['nid_flash']    = $this->nid_flash;
        $this->load->view('home', $data);
    }
    private function destroy_data()
    {
    }
}