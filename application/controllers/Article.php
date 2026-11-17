<?php 
class article extends CI_Controller {

var $event 				= '';
var	$obj_about			='';
var $m_language			='eng';

var $nid		= '';
var $nid_cat			= '';

var	$title					= '';
var	$tags					= '';
var	$description			= ''; 

function __construct()
	{
		parent::__construct();
		session_start();
		
		$this->load->database();	
		$this->load->helper('ap_function');
		$this->load->helper('ap_object');
		$this->load->helper('ap_html');
		$this->load->helper('ap_view_helper');
		$this->load->helper('ap_db');
		$this->load->helper('ap_module');		

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
function detail($nid)	
{
	$this->nid = $nid;
	$this->do_process();
}
function detail_code($code)	
{
	$data = get_article_by_code($code);
	$this->nid = $data['nid'];
	$this->do_process();
}
private function get_data()
{  
	
}
	
private function caculate_data()
{
	
}
	
private function do_business()
{	
	$data['title']			= $this->title;
	$data['tags']			= $this->tags;
	$data['description']	= $this->description;
	$data['nid']			= $this->nid;
	$data['menu_sec']		= '';
	$data['menu_cat']		= '';
	
	$data['menu_top']		= "article";
	$data['g_ishome']		= 0;

	$obj_content = Bget_article($this->nid);
	$data['obj_content']		= $obj_content;
	$data['title']		= $obj_content['ctitle'];
	$data['description_fb']		= $obj_content['cdescription'];

	$this->load->view('article',$data);	
}
	
private function destroy_data()
{
			
}
private function get_where_guide_string()
{
		

		return $str ;
}

}