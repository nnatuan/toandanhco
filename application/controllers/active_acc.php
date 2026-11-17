<?php 
class active_acc extends Controller {

var $event 				= '';
var	$obj_about			='';
var $m_language			='eng';

var $cactive_code		= '';
//var $status = '0';

var	$title					= '';
var	$tags					= '';
var	$description			= ''; 

function active_acc()
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
function active($cactive_code)	
{
	$this->cactive_code = $cactive_code;
	$this->do_process();
}
private function get_data()
{  
	
}
	
private function caculate_data()
{
	$obj_user = get_user_by_active_code($this->cactive_code);
	//print_r($obj_user);
	if($obj_user == NULL) {
		//$this->status = "0";
		//exit("Truy cập không hợp lệ!");
		redirect(base_url().'in-valid');
	} else {
		$data = array('cactive' => '1');
		$this->db->where('cactive_code', $this->cactive_code);
		$this->db->update('tmember', $data);
		//$this->status = "1";
		//exit('0');
		//exit("Tài khoản của bạn đã được kích hoạt!");
		redirect(base_url().'kich-hoat-thanh-cong');
	}
}
	
private function do_business()
{	
	$data['title']			= $this->title;
	$data['tags']			= $this->tags;
	$data['description']	= $this->description;
	//$data['nid']			= $this->nid;
	$data['menu_sec']		= '';
	$data['menu_cat']		= '';
	//$data['status']			= $this->status;
	$data['menu_top']		= 'active_acc';
	$data['g_ishome']		= 0;

	$this->load->view('active_acc',$data);	
}
	
private function destroy_data()
{
			
}
private function get_where_guide_string()
{
		

		return $str ;
}

}