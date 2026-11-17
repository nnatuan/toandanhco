<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 *-------------------------------------------------------------------
 * @creator 		: 
 * @finished date	: 2009/011/09
 * @description		: Tra ve tong so dong tu cau lenh sql tuong ung
 * @access	        : public
 *
 * @param string	: $str_where_clause       : menh de where
 * 					: 
 * @return string	: $obj_result->num_rows() : tong so dong
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */	
function get_user_byid($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tuser').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = '.$nid;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_material_products()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tmaterial_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND nstatus = 1 ';
		$str_query .= ' ORDER BY cindex+0, nid desc ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_material_products_home()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tmaterial_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND nstatus = 1 ';
		$str_query .= ' AND nspecial = 1 ';
		$str_query .= ' ORDER BY cindex+0, nid desc ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	

function get_config_byid($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tconfig').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = '.$nid;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_module_byid($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tmodule').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = '.$nid;
		$str_query .= ' AND a.nstatus = 1 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
function get_config_site($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tconfig').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = '.$nid;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
	
/*End Important helper*/
	//
function get_banner_list()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tbanner_images');
		$str_query .= ' WHERE nid is not null ';
		$str_query .= ' AND nstatus = 1 ';
		$str_query .= ' ORDER BY cindex+0 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
	
//
function get_home_product()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' ORDER BY a.cindex+0 asc, a.nid desc ';
		$str_query .= ' LIMIT 0,20 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_home_menu()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tcat_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' ORDER BY a.cindex+0 desc, a.nid desc ';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_center_menu()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tcat_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.chome	  =	1';
		$str_query .= ' ORDER BY a.cindex+0 desc, a.nid desc ';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_specific_product()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.ncheck =	1';
		$str_query .= ' ORDER BY a.cindex+0 desc, a.nid desc ';
		$str_query .= ' LIMIT 0,3 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_product_byid($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.ccode = "'.$nid.'"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}

function get_other_product_by_cat($nid,$nid_cat)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid != "'.$nid.'"';
		$str_query .= ' AND a.nid_cat_products = '.$nid_cat;
		$str_query .= ' ORDER BY a.cindex+0 desc, a.nid desc ';			
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}


function get_count_search($keyword)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.ccode like "%'.$keyword.'%"';
		$str_query .= ' OR a.cproducts like "%'.$keyword.'%"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_search($keyword,$row_per_page,$curr_page)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		//$str_query .= ' AND a.ccode like "%'.$keyword.'%"';
		$str_query .= ' AND a.cproducts like "%'.$keyword.'%"';
		$str_query .= ' ORDER BY a.cindex+0 desc, a.nid desc ';	
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function reset_page()
{
	$_SESSION['curr_page_product'] = '1';
	$_SESSION['curr_page_search'] = '1';
		
}

function get_news_byccode_detail($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.ccode = "'.$nid.'"';
		$str_query .= ' AND a.nstatus = 1 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
function get_section_news_byid($nid_sec)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.nid,a.ccat_news,a.cimage,a.ctag, a.cnote ';
		$str_query .= ' FROM '.Fget_ap_table('tcat_news').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		if($nid_sec != '')
			$str_query .= ' AND a.nid = '.$nid_sec;
		else
			$str_query .= ' AND a.nid is not null ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}	
function get_count_news_by_cat($nid_sec)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.nid';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		if($nid_sec != '')
			$str_query .= ' AND a.nid_cat_news = '.$nid_sec;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_news_by_cat($nid_sec,$row_per_page,$curr_page)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		if($nid_sec != '')
			$str_query .= ' AND a.nid_cat_news = '.$nid_sec;		
		$str_query .= ' ORDER BY  a.nid+0 desc ';			
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
	
	function get_hot_news()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nactive =	1';	
		$str_query .= ' LIMIT 0,1';	
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
	function get_other_home()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nactive !=1 ';	
		$str_query .= ' ORDER BY nid desc ';		
		$str_query .= ' LIMIT 0,10';	
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
	
	function get_home_section()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tsection_news').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_service()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.* ';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		//$str_query .= ' AND a.nactive !=1 ';	
		$str_query .= ' AND a.nid_section_news = "7"';
		$str_query .= ' ORDER BY nid desc ';		
		//$str_query .= ' LIMIT 0,10';	
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
	
	function get_other_news($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid != "'.$nid.'"';
		$str_query .= ' ORDER BY a.cindex+0 desc, a.nid desc ';		
$str_query .= ' LIMIT 0,5 ';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_news_by_id_detail($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.ccode = "'.$nid.'"';
	//	$str_query .= ' AND a.nstatus = 1 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
	
function get_article_list()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tarticle').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND nid > 1';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_product_cat_byid($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tcat_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.ccode = "'.$nid.'"';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
function get_product_sec_byid($nid) //theo ccode
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tmaterial_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.ccode = "'.$nid.'"';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}		
function get_product_cat($ccode_cat, $row_per_page, $curr_page, $type_sort)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND b.ccode = "'.$ccode_cat.'"';
		if ($type_sort == 0) {
			$str_query .= ' ORDER BY a.fprice';
		} else if ($type_sort == 1) {
			$str_query .= ' ORDER BY a.fprice desc';
		} else if ($type_sort == 2) {
			$str_query .= ' ORDER BY a.cproducts+0';
		} else if ($type_sort == 3) {
			$str_query .= ' ORDER BY a.cproducts desc';
		} else if ($type_sort == 4) {
			$str_query .= ' ORDER BY a.nid';
		} else if ($type_sort == 5) {
			$str_query .= ' ORDER BY a.nid desc';
		} else if ($type_sort == 6) {
		}
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}
function get_product_cat2($row_per_page,$curr_page)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as cat_ccode';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a,  ';
		$str_query .= Fget_ap_table('tcat_products').' as b  ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		//$str_query .= ' AND b.ccode = "'.$nid.'"';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' ORDER BY a.cindex+0 asc, a.nid desc ';	
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_product_sec($ccode_sec, $row_per_page, $curr_page, $type_sort)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
		$str_query .= ' AND c.ccode = "'.$ccode_sec.'"';
		if ($type_sort == 0) {
			$str_query .= ' ORDER BY a.fprice';
		} else if ($type_sort == 1) {
			$str_query .= ' ORDER BY a.fprice desc';
		} else if ($type_sort == 2) {
			$str_query .= ' ORDER BY a.cproducts+0';
		} else if ($type_sort == 3) {
			$str_query .= ' ORDER BY a.cproducts desc';
		} else if ($type_sort == 4) {
			$str_query .= ' ORDER BY a.nid';
		} else if ($type_sort == 5) {
			$str_query .= ' ORDER BY a.nid desc';
		} else if ($type_sort == 6) {
		}
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}

function get_count_product_cat($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND b.ccode = "'.$nid.'"';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_count_product_cat2()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
	//	$str_query .= ' AND b.ccode = "'.$nid.'"';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_count_product_sec($ccode_sec)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as b ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_material_products = b.nid';
		$str_query .= ' AND b.ccode = "'.$ccode_sec.'"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_menu_left($nid_sec)
{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tcat_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';	
		if($nid_sec !='')	
		$str_query .= ' AND a.nid_material_products =	"'.$nid_sec.'"';	
		$str_query .= ' ORDER BY a.cindex+0 asc, a.nid desc ';	
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
}
function Fview_price($number)
{
	return number_format($number).' đ';
}
function get_product_relate($nid_product,$nid_cat_products)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		$str_query .= ' AND a.nstatus =	1';
		if($nid_product !='')
			$str_query .= ' AND a.nid != "'.$nid_product.'"';		
		if($nid_cat_products !='')
			$str_query .= ' AND a.nid_cat_products = "'.$nid_cat_products.'"';	
		$str_query .= ' ORDER BY  a.nid+0 desc ';	
		$str_query .= ' LIMIT 0,8';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}

function get_menutop()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('ttopmenu').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';	
		$str_query .= ' ORDER BY  a.cindex+0 asc ';	
		//$str_query .= ' LIMIT 0,8';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_product_detail($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	//$str_query .= ' AND a.nstatus =	1';	
	$str_query .= ' AND a.nid = '.$nid;
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}

function Bget_guest_online()
{
    $obj_helper =& get_instance();
    $session    = session_id();
    $time       = time();
    $tbl_name   = 'tguest_online';
    $time_check = $time - 300;
    $online     = 7;
    $obj_helper->db->where('csession_id', $session);
    $obj_result = $obj_helper->db->get($tbl_name);
    if ($obj_result->num_rows() == 0) {
        $data_log = array(
            'csession_id' => $session,
            'ctime_log' => $time
        );
        $obj_helper->db->insert($tbl_name, $data_log);
        $obj_helper->db->set('ntotal', 'ntotal+1', FALSE);
        $obj_helper->db->where('nid', 1);
        $obj_helper->db->update('total_visit');
    } else {
        $data_log = array(
            'ctime_log' => $time
        );
        $obj_helper->db->where('csession_id', $session);
        $obj_helper->db->update($tbl_name, $data_log);
    }
    $obj_result = $obj_helper->db->get($tbl_name);
    $online += $obj_result->num_rows();
    $obj_helper->db->where('ctime_log <', $time_check);
    $obj_helper->db->delete($tbl_name);
    return $online;
}
function Bget_total_vistis()
{
    $total = '0';
    $obj_helper =& get_instance();
    $obj_helper->db->where('nid', '1');
    $obj_result = $obj_helper->db->get('total_visit');
    $obj_result = $obj_result->row_array();
    $total      = $obj_result['ntotal'];
    return $total;
}
function get_count_product_by_mat($nid_material_products)
{
    $obj_helper =& get_instance();
    $obj_helper->load->database();
    $str_query = ' SELECT a.nid';
    $str_query .= ' FROM ' . Fget_ap_table('tproducts') . ' as a ';  
    $str_query .= ' WHERE a.nid is not null ';
    $str_query .= ' AND a.nstatus =	1';
    if($nid_material_products!='')
    	$str_query .= ' AND a.nid_material_products = "'.$nid_material_products.'"';
    $obj_result = $obj_helper->db->query($str_query);
    return $obj_result->num_rows();
	//exit($obj_result->num_rows()); 
}
function get_count_product_by_cat($nid_cat_products)
{
    $obj_helper =& get_instance();
    $obj_helper->load->database();
    $str_query = ' SELECT a.nid';
    $str_query .= ' FROM ' . Fget_ap_table('tproducts') . ' as a ';  
    $str_query .= ' WHERE a.nid is not null ';
    $str_query .= ' AND a.nstatus =	1';
    if($nid_cat_products!='')
    	$str_query .= ' AND a.nid_cat_products = "'.$nid_cat_products.'"';
    $obj_result = $obj_helper->db->query($str_query);
    return $obj_result->num_rows();
	//exit($obj_result->num_rows()); 
}
function get_products_mat_paging($nid_material_products,$ncurrent_page,$nrow_per_page) //note
{
    $obj_helper =& get_instance();
    $obj_helper->load->database();
    $str_query = ' SELECT *';
    $str_query .= ' FROM ' . Fget_ap_table('tproducts').' as a';
    $str_query .= ' WHERE nid is not null ';
    $str_query .= ' AND nstatus = 1 ';
	if($nid_material_products !='')
		$str_query .= ' AND nid_material_products = "'.$nid_material_products.'"';
	$str_query .=  ' limit '. ($ncurrent_page -1 )* $nrow_per_page . ' , ' . $nrow_per_page;	
    $obj_result = $obj_helper->db->query($str_query);
    return $obj_result->result_array();
}
function get_material_by_idl($nid_material)
{
    $obj_helper =& get_instance();
    $obj_helper->load->database();
    $str_query = ' SELECT *';
    $str_query .= ' FROM ' . Fget_ap_table('tmaterial_products') . ' as a ';
    $str_query .= ' WHERE a.nid is not null ';
   
     if($nid_material !='')
		$str_query .= ' AND a.nid	 ="'.$nid_material.'"';
    
    $obj_result = $obj_helper->db->query($str_query);
    return $obj_result->row_array();
}	
function get_product_bymat($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_material_products = "'.$nid.'"';		
		$str_query .= ' LIMIT 0,10';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_product_bycat($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = "'.$nid.'"';		
		$str_query .= ' LIMIT 0,10';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_product_new()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' ORDER BY a.nid desc ';
		$str_query .= ' LIMIT 0,10';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_product_cat_byid2($nid) //theo id
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tcat_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = "'.$nid.'"';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
function get_product_sec_byid2($nid) //theo id
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tmaterial_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = "'.$nid.'"';		
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}	
function get_news_home_by_cat($nid_cat)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.chome = 1';
		if($nid_cat != '')
			$str_query .= ' AND a.nid_cat_news = '.$nid_cat;		
		$str_query .= ' ORDER BY cindex+0, a.nid+0 desc ';			
		$str_query .= ' LIMIT 0,6 ';
		$obj_result = $obj_helper->db->query($str_query);
		return $obj_result->result_array();
	}
function get_product_mat()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tmaterial_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' ORDER BY a.nid desc ';
		$str_query .= ' LIMIT 0,3';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_cat_product_bymat($nid_sec)
{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tcat_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';	
		if($nid_sec !='')	
		$str_query .= ' AND a.nid_material_products =	"'.$nid_sec.'"';	
		$str_query .= ' ORDER BY a.cindex+0 asc, a.nid desc ';	
		$str_query .= ' LIMIT 0,10';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
}
function get_product_hot($limit)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		$str_query .= ' AND a.nstatus =	1';	
		$str_query .= ' AND a.ncheck = 1';
		$str_query .= ' ORDER BY a.nid desc ';
		$str_query .= ' LIMIT 0, ' . $limit;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_img_by_product($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT *';
	$str_query .= ' FROM '.Fget_ap_table('tproduct_images').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	//$str_query .= ' AND a.nstatus =	1';
	$str_query .= ' AND a.nid_product = "' . $nid . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}