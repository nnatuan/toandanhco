<?php 
class profile_order_detail extends Controller {

var $event 				= '';
var	$obj_about			='';
var $m_language			='eng';

var $nid		= '';
var $nid_cat			= '';

var	$title					= '';
var	$tags					= '';
var	$description			= ''; 
var $cemail		= '';

function profile_order_detail()
	{
		parent::Controller();	
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
private function get_data()
{  
	if (isset($_POST['cemail']))
		$this->cemail = $_POST['cemail'];
	if (isset($_POST['corder']))
		$this->nid = $_POST['corder'];
}
	
private function caculate_data()
{
	if(!isset($_SESSION['cemail_log'])) {
		redirect(base_url());
	}
}
	
private function do_business()
{	
	$data['title']			= $this->title;
	$data['tags']			= $this->tags;
	$data['description']	= $this->description;
	$data['nid']			= $this->nid;
	$data['cemail']			= $this->cemail;
	$data['menu_sec']		= '';
	$data['menu_cat']		= '';
	
	$data['menu_top']		= 'profile_order_detail';
	$data['g_ishome']		= 0;

	$this->load->view('profile_order_detail',$data);	
}
	
private function destroy_data()
{
			
}
private function get_where_guide_string()
{
		

		return $str ;
}

}