<?php
class data_product_search extends Controller
{
    var $data_view = '';
    var $title = '';
    var $tags = '';
    var $description = '';

    function data_product_search()
    {
        parent::Controller();
        session_start();
        $this->load->database();
        $this->load->helper('ap_db');
        $this->load->helper('ap_object');
        $this->load->helper('ap_function');
        $this->load->helper('ap_view');
        $this->load->helper('ap_module');
        reset_page();
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
        $data['title']        = $this->title;
        $data['tags']         = $this->tags;
        $data['description']  = $this->description;
        $data['menu_sec']     = '';
        $data['menu_cat']     = '';
        $data['menu_top']     = 'data_product_search';
        $data['g_isdata']     = 0;
        $this->load->view('data_product_search', $data);
    }
    private function destroy_data()
    {
    }
}