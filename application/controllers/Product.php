<?php 
class product extends CI_Controller {

var $event 				= '';
var	$obj_product			='';
var $m_language			='eng';

var $nid_sec			= '';
var $nid_cat			= '';

var	$title					= '';
var	$tags					= '';
var	$description			= ''; 
var $id_cat					= '';
var $id_sec					= '';
var $id_sub				= '';
var $curr_page 		= '';
var $row_per_page 	= '60';
var $total_page	 	= '';
var $ntotal_row			= 0;
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
function sub($id_sub)
{
	$this->id_sub = $id_sub ;
	$this->event = 'list_sub';
	$this->do_process();
		
}
function cat($id_cat)
{
	$this->id_cat = $id_cat ;
	$this->event = 'list_cat';
	$this->do_process();
		
}
function sec($id_sec)
{
	$this->id_sec = $id_sec ;
	$this->event = 'list_sec';
	$this->do_process();
		
}
// Dinh nghia ham rut gon khi set cookie cho cac bien.
//
private function f_set_cookie($cookie_name,$cookie_value)
 { 
	return dbset_cookie('cookie_product_'.$cookie_name,$cookie_value);
 }
 
// Dinh nghia ham rut gon khi get cookie cho cac bien.
//
private function f_get_cookie($cookie_name)
 { 
	return dbget_cookie('cookie_product_'.$cookie_name);
 }
	
// Dinh nghia ham rut gon khi set language cho cac label.
// 
private function m_language_key($str_key)
{
	return $this->lang->line('lbl.product.'.$str_key);
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
function set_page()
{
	$curr_page = 1;
	if(isset($_POST['curr_page']))
		$curr_page = $_POST['curr_page'];
	$_SESSION['curr_page_product']=$curr_page;
	
}	
private function get_data()
{  
	
}

function next_()
{
	if(isset($_POST['btn_click_next']))	
	{
		if(isset($_SESSION['curr_page_product']))
			$this->curr_page = $_SESSION['curr_page_product'];
		if($this->curr_page == '' )
			$this->curr_page  = 1;
		$this->curr_page  += 1;	
		$_SESSION['curr_page_product'] = $this->curr_page;
		$this->do_process();
	}	
}

function previous_()
{
	if(isset($_POST['btn_click_previous']))	
	{
		if(isset($_SESSION['curr_page_product']))
			$this->curr_page = $_SESSION['curr_page_product'];
		if($this->curr_page == '' )
			$this->curr_page  = 1;
		$this->curr_page  -= 1;	
		$_SESSION['curr_page_product'] = $this->curr_page;
		$this->do_process();
	}	
}	


private function caculate_data()
{
	$this->load->language('ap', $this->m_language);
	//exit($_SESSION['curr_page'].'a');
	if(isset($_SESSION['curr_page_product']))
			$this->curr_page = $_SESSION['curr_page_product'];
	if($this->curr_page == '' OR $this->curr_page <0 )
		$this->curr_page  = 1;
		

	if($this->event=='list_sub')
	{
	$trow = get_count_product_sub($this->id_sub);	}
	else if($this->event=='list_cat')
	{
	$trow = get_count_product_cat($this->id_cat);
	}
	else if($this->event=='list_sec')
	{
	$trow = get_count_product_sec($this->id_sec);
	}

	$this->ntotal_row =$trow;
	$this->total_page = round($trow/$this->row_per_page+0.4);
	//exit($this->curr_page.'a');
	
}
	
private function do_business()
{	//$this->output->cache(10);
	$data['title']			= $this->title;
	$data['tags']			= $this->tags;
	$data['description']	= $this->description;
	$data['id_cat']			= $this->id_cat;
	$data['id_sec']			= $this->id_sec;
	
	$data['menu_sec']		= '';
	$data['menu_cat']		= '';
	$data['curr_page']		= $this->curr_page;
	$data['row_per_page']	= $this->row_per_page;
	$data['total_page']		= $this->total_page;
	$data['total_row']		= $this->ntotal_row;
	
	$data['menu_top']		= "product";
	$data['g_ishome']		= 0;
	if($this->event=='list_sub')
	{
		$obj_sub = get_sub_menu_by_id($this->id_sub);
		$obj_cat		= get_product_cat_byid($obj_sub['nid_cat_product']);
		//$data['nid_material_products']			= $obj_cat['nid_material_products'];
		$data['title']			= $obj_sub['cname'];
		//$data['tags']			= $obj_sub['ctag'];
		//$data['description']	= $obj_sub['cnote'];
		$data['id_sub']			= $this->id_sub;
		$data['obj_sub']		= $obj_sub;
		$data['obj_cat']		= get_product_cat_byid($obj_cat['nid']);
		$data['description_fb'] = $obj_cat['cdesc'];
		$this->load->view('list_sub',$data);	
	}
	else if($this->event=='list_cat')
	{
		$obj_cat = get_product_cat_byid($this->id_cat);
		$data['nid_material_products']			= $obj_cat['nid_material_products'];
		$data['title']			= $obj_cat['ccat_products'];
		$data['tags']			= $obj_cat['ctag'];
		$data['description']	= $obj_cat['cnote'];
		$data['description_fb'] = $obj_cat['cnote'];
		$data['obj_cat']		= $obj_cat;
		
		$list_sub = get_sub_menu_by_cat($obj_cat['nid']);
		if(count($list_sub)>0) 
			$this->load->view('list_cat_sub',$data);
		else
			$this->load->view('list_cat',$data);
	}
	else if($this->event=='list_sec')
	{	$obj_sec = get_product_sec_byid($this->id_sec);
		$data['obj_sec']		= $obj_sec;
		$data['title']			= $this->m_language_key('page');
		$data['tags']			= $this->m_language_key('page');
		$data['description']	= $this->m_language_key('page');
		$data['menu_top']		= '22';
		$this->load->view('list_sec',$data);	
	}
	else
		$this->load->view('product',$data);	
}
	
private function destroy_data()
{
			
}
private function get_where_guide_string()
{
		$str		= 'where nstatus = "1"';	
		//$str	   .= 'AND ccode_cat_news = "'.$this->m_nid_cat_news.'" ';
//Dieu kien get record nstatus
//0:Khong active
//1:Active

		return $str ;
}

}