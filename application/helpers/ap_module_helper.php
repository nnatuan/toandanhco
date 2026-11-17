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
function get_obj_cat($nid_sec)
{
    $obj_helper =& get_instance();
    $obj_helper->load->database();
    $str_query = ' SELECT *';
    $str_query .= ' FROM ' . Fget_ap_table('tcat_products') . ' as a ';
    $str_query .= ' WHERE a.nid is not null ';
    $str_query .= ' AND a.nstatus =	1';
    if ($nid_sec != '')
        $str_query .= ' AND a.nid_material_products = "' . $nid_sec . '"';
    $str_query .= ' ORDER BY a.cindex+0 asc, a.nid desc ';
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
		$str_query .= ' ORDER BY cindex+0 asc ';
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
		$str_query .= ' ORDER BY nid desc ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_config_by_id($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tconfig').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = '.$nid;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
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
		//$str_query .= ' AND a.nstatus = 1 ';
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
		$str_query .= ' ORDER BY cindex+0 asc ';
		$str_query .= ' LIMIT 0,5 ';
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
	/*
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
	}*/
function get_product_byid($nid)
{
    $obj_helper =& get_instance();
    $obj_helper->load->database();
    $str_query = ' SELECT *';
    $str_query .= ' FROM ' . Fget_ap_table('tproducts') . ' as a ';
    $str_query .= ' WHERE a.nid is not null ';
    $str_query .= ' AND a.nid = "' . $nid . '"';
    $obj_result = $obj_helper->db->query($str_query);
    return $obj_result->row_array();
}
function get_product_by_id($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		$str_query .= ' AND a.nid = "'.$nid.'"';
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

function get_news_relate($ctag)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$arr = explode(",",$ctag);
		$count = count($arr);
		if($count>0) {
			$str_query .= ' AND (';
			for($i=0;$i<$count;$i++) {
				$str_query .= ' (a.ccode like "%'.$arr[$i].'%"';
				$str_query .= ' OR a.ctitle like "%'.$arr[$i].'%")';
				if($i<$count-1)
					$str_query .= ' OR ';
			}
			$str_query .= ' ) ';
		}
		$str_query .= ' LIMIT 0,8 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_count_search($keyword)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$keyword = trim($keyword);
		$str_query = ' SELECT a.nid ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus = 1 ';
		if($keyword != '') {
			$safe_kw = $obj_helper->db->escape_like_str($keyword);
			$str_query .= ' AND (a.ccode LIKE "%'.$safe_kw.'%" ';
			$str_query .= ' OR a.cproducts LIKE "%'.$safe_kw.'%" ';
			$str_query .= ' OR a.cnote LIKE "%'.$safe_kw.'%" ';
			$str_query .= ' OR a.ctag LIKE "%'.$safe_kw.'%") ';
		}
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_search($keyword, $row_per_page, $curr_page)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$keyword = trim($keyword);
		$curr_page = max(1, intval($curr_page));
		$row_per_page = max(1, intval($row_per_page));
		$offset = ($curr_page - 1) * $row_per_page;

		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' LEFT JOIN '.Fget_ap_table('tcat_products').' as b ON a.nid_cat_products = b.nid ';
		$str_query .= ' LEFT JOIN '.Fget_ap_table('tmaterial_products').' as c ON a.nid_material_products = c.nid ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus = 1 ';
		if($keyword != '') {
			$safe_kw = $obj_helper->db->escape_like_str($keyword);
			$str_query .= ' AND (a.ccode LIKE "%'.$safe_kw.'%" ';
			$str_query .= ' OR a.cproducts LIKE "%'.$safe_kw.'%" ';
			$str_query .= ' OR a.cnote LIKE "%'.$safe_kw.'%" ';
			$str_query .= ' OR a.ctag LIKE "%'.$safe_kw.'%") ';
		}
		$str_query .= ' ORDER BY a.cindex+0 asc, a.nid desc ';	
		$str_query .= ' LIMIT '.$offset.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
/*	
function get_count_search($keyword)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND (a.ccode like "%'.$keyword.'%"';
		$str_query .= ' OR a.cproducts like "%'.$keyword.'%")';
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
		$str_query .= ' AND (a.ccode like "%'.$keyword.'%"';
		$str_query .= ' OR a.cproducts like "%'.$keyword.'%")';
		$str_query .= ' ORDER BY a.cindex+0 desc, a.nid desc ';	
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
*/	
function get_search_product($keyword)
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
		$str_query .= ' AND (a.ccode like "%'.$keyword.'%"';
		$str_query .= ' OR a.cproducts like "%'.$keyword.'%")';
		$str_query .= ' ORDER BY a.cindex+0 desc, a.nid desc ';	
		$str_query .= ' LIMIT 0,20';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function reset_page()
{
	$_SESSION['curr_page_product'] = '1';
	$_SESSION['curr_page_search'] = '1';
		
}
function get_news_by_id($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = "'.$nid.'"';
		$str_query .= ' AND a.nstatus = 1 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
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
		$str_query = ' SELECT a.* ';
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
function get_news_by_cat($nid_cat)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		if($nid_cat != '')
			$str_query .= ' AND a.nid_cat_news = '.$nid_cat;		
		$str_query .= ' ORDER BY a.cindex+0, a.nid+0 desc ';			
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_news_by_cat_page($nid_sec,$row_per_page,$curr_page)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		if($nid_sec != '')
			$str_query .= ' AND a.nid_cat_news = '.$nid_sec;

		$str_query .= ' ORDER BY a.cindex+0, a.nid+0 desc ';			
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
function get_article_by_code($ccode)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tarticle').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.ccode = "'.$ccode.'"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}	
	
/*	
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
	}*/
function get_sub_menu_by_code($ccode)
{
    $obj_helper =& get_instance();
    $obj_helper->load->database();
    $str_query = ' SELECT *';
    $str_query .= ' FROM ' . Fget_ap_table('tsub_menu') . ' as a ';
    $str_query .= ' WHERE a.nid is not null ';
    $str_query .= ' AND a.ccode = "' . $ccode . '"';
    $obj_result = $obj_helper->db->query($str_query);
    return $obj_result->row_array();
}	
function get_sub_menu_by_id($nid)
{
    $obj_helper =& get_instance();
    $obj_helper->load->database();
    $str_query = ' SELECT *';
    $str_query .= ' FROM ' . Fget_ap_table('tsub_menu') . ' as a ';
    $str_query .= ' WHERE a.nid is not null ';
    $str_query .= ' AND a.nid = "' . $nid . '"';
    $obj_result = $obj_helper->db->query($str_query);
    return $obj_result->row_array();
}	
function get_product_cat_byid($nid)
{
    $obj_helper =& get_instance();
    $obj_helper->load->database();
    $str_query = ' SELECT *';
    $str_query .= ' FROM ' . Fget_ap_table('tcat_products') . ' as a ';
    $str_query .= ' WHERE a.nid is not null ';
    $str_query .= ' AND a.nid = "' . $nid . '"';
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
/*	
function get_product_cat($ccode_cat, $row_per_page, $curr_page)
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
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND b.ccode = "'.$ccode_cat.'"';
		$str_query .= ' LIMIT '.($curr_page -1)*$row_per_page.', '.$row_per_page;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();	
	}*/
function get_product_by_sec_article($nid)
{
    $obj_helper =& get_instance();
    $obj_helper->load->database();
    $str_query = ' SELECT a.*';
    $str_query .= ' FROM ' . Fget_ap_table('tproducts') . ' as a,  ';
    $str_query .= Fget_ap_table('tcat_products') . ' as b  ';
    $str_query .= ' WHERE a.nid is not null ';
    $str_query .= ' AND a.nstatus =	1';
	$str_query .= ' AND a.nid_cat_products = b.nid ';
    //$str_query .= ' AND b.ccode = "' . $nid . '"';
    $str_query .= ' AND b.nid_material_products = "'.$nid.'"';
    $str_query .= ' ORDER BY a.cindex+0 asc, a.nid desc ';
    //$str_query .= ' LIMIT 0,36';
    $obj_result = $obj_helper->db->query($str_query);
    return $obj_result->result_array();
}	
function get_product_sub($nid, $row_per_page, $curr_page)
{
    $obj_helper =& get_instance();
    $obj_helper->load->database();
    $str_query = ' SELECT a.*';
    $str_query .= ' FROM ' . Fget_ap_table('tproducts') . ' as a  ';
  //  $str_query .= Fget_ap_table('tcat_products') . ' as b  ';
    $str_query .= ' WHERE a.nid is not null ';
    $str_query .= ' AND a.nstatus =	1';
    //$str_query .= ' AND b.ccode = "' . $nid . '"';
    if($nid!='')
    	$str_query .= ' AND a.nid_sub_menu = "'.$nid.'"';
    $str_query .= ' ORDER BY a.cindex+0 asc, a.nid desc ';
    $str_query .= ' LIMIT ' . ($curr_page - 1) * $row_per_page . ', ' . $row_per_page;
    $obj_result = $obj_helper->db->query($str_query);
    return $obj_result->result_array();
}	
function get_product_by_sub_limit($nid,$limit)
{
    $obj_helper =& get_instance();
    $obj_helper->load->database();
    $str_query = ' SELECT a.*';
    $str_query .= ' FROM ' . Fget_ap_table('tproducts') . ' as a  ';
    $str_query .= ' WHERE a.nid is not null ';
    $str_query .= ' AND a.nstatus =	1';
    $str_query .= ' AND a.nid_sub_menu = "'.$nid.'"';
	$str_query .= ' LIMIT 0, '.$limit;
    $obj_result = $obj_helper->db->query($str_query);
    return $obj_result->result_array();
}	
function get_product_by_cat($nid)
{
    $obj_helper =& get_instance();
    $obj_helper->load->database();
    $str_query = ' SELECT a.*';
    $str_query .= ' FROM ' . Fget_ap_table('tproducts') . ' as a  ';
    $str_query .= ' WHERE a.nid is not null ';
    $str_query .= ' AND a.nstatus =	1';
    $str_query .= ' AND a.nid_cat_products = "'.$nid.'"';
	$str_query .= ' ORDER BY a.cindex+0 asc, a.nid desc ';
    $obj_result = $obj_helper->db->query($str_query);
    return $obj_result->result_array();
}	
function get_product_cat($nid, $row_per_page, $curr_page)
{
    $obj_helper =& get_instance();
    $obj_helper->load->database();
    $str_query = ' SELECT a.*';
    $str_query .= ' FROM ' . Fget_ap_table('tproducts') . ' as a  ';
  //  $str_query .= Fget_ap_table('tcat_products') . ' as b  ';
    $str_query .= ' WHERE a.nid is not null ';
    $str_query .= ' AND a.nstatus =	1';
    //$str_query .= ' AND b.ccode = "' . $nid . '"';
    if($nid!='')
    	$str_query .= ' AND a.nid_cat_products = "'.$nid.'"';
    $str_query .= ' ORDER BY a.cindex+0 asc, a.nid desc ';
    $str_query .= ' LIMIT ' . ($curr_page - 1) * $row_per_page . ', ' . $row_per_page;
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
/*
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
	}*/
function get_count_product_cat($nid)
{
    $obj_helper =& get_instance();
    $obj_helper->load->database();
    $str_query = ' SELECT a.nid';
    $str_query .= ' FROM ' . Fget_ap_table('tproducts') . ' as a ';  
    $str_query .= ' WHERE a.nid is not null ';
    $str_query .= ' AND a.nstatus =	1';
    if($nid!='')
    	$str_query .= ' AND a.nid_cat_products = "'.$nid.'"';
    $obj_result = $obj_helper->db->query($str_query);
    return $obj_result->num_rows();
}
function get_count_product_sub($nid)
{
    $obj_helper =& get_instance();
    $obj_helper->load->database();
    $str_query = ' SELECT a.nid';
    $str_query .= ' FROM ' . Fget_ap_table('tproducts') . ' as a ';  
    $str_query .= ' WHERE a.nid is not null ';
    $str_query .= ' AND a.nstatus =	1';
    if($nid!='')
    	$str_query .= ' AND a.nid_sub_menu = "'.$nid.'"';
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
		$str_query .= ' LIMIT 0,4';
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
    if (empty($session)) {
        $session = isset($_SERVER['REMOTE_ADDR']) ? md5($_SERVER['REMOTE_ADDR']) : 'guest';
    }
    $time       = time();
    $tbl_name   = 'tguest_online';
    $time_check = $time - 300;
    $online     = 7;

    $old_db_debug = $obj_helper->db->db_debug;
    $obj_helper->db->db_debug = FALSE;
    try {
        $obj_helper->db->where('csession_id', $session);
        $obj_result = $obj_helper->db->get($tbl_name);
        if ($obj_result && $obj_result->num_rows() == 0) {
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
        if ($obj_result) {
            $online += $obj_result->num_rows();
        }
        $obj_helper->db->where('ctime_log <', $time_check);
        $obj_helper->db->delete($tbl_name);
    } catch (\Throwable $e) {
        // Fail-safe: Khong lam sap website neu bang guest online bi loi
    }
    $obj_helper->db->db_debug = $old_db_debug;

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
function get_product_home()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		$str_query .= ' AND a.ncheck = 1';	
		$str_query .= ' ORDER BY a.cindex+0, a.nid+0 desc ';	
		$str_query .= ' LIMIT 0,8';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_product_pb()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		$str_query .= ' AND a.npb = 1';	
		$str_query .= ' ORDER BY a.cindex+0, a.nid+0 desc ';	
		//$str_query .= ' LIMIT 0,4';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_product_km()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		$str_query .= ' AND a.nkm = 1';		
		//$str_query .= ' LIMIT 0,4';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_product_km_limit($index, $limit)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		$str_query .= ' AND a.nkm = 1';		
		$str_query .= ' LIMIT '.$index.','.$limit;
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
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
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		$str_query .= ' AND a.nid_cat_products = "'.$nid.'"';		
		//$str_query .= ' LIMIT 0,10';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_product_bymat_home($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND b.nid_material_products = c.nid ';
		$str_query .= ' AND c.nid = "'.$nid.'"';	
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND a.ncheck = 1 ';	
		$str_query .= ' ORDER BY a.nid+0 desc ';
		$str_query .= ' LIMIT 0,8';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_count_product_km()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nkm = 1 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_count_product_pb()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.npb = 1 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_product_flash_sale()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		//$str_query .= ' AND a.nid_material_products = "'.$nid.'"';	
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND a.cflash = 1 ';	
		$str_query .= ' ORDER BY a.cindex+0 asc ';
		$str_query .= ' LIMIT 0,6';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}

function get_product_hang_moi_home()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		//$str_query .= ' AND a.nid_material_products = "'.$nid.'"';	
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND a.nnew = 1 ';	
		$str_query .= ' AND a.cflash != 1 ';	
		$str_query .= ' ORDER BY a.ctime_update+0 desc';
		$str_query .= ' LIMIT 0,20';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_count_product_hang_moi()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nnew = 1 ';	
		$str_query .= ' AND a.cflash != 1 ';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_product_hang_moi($row_per_page, $curr_page, $type_sort)
	{		
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec ';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nnew = 1 ';	
		$str_query .= ' AND a.cflash != 1 ';
		$str_query .= ' AND a.nid_cat_products = b.nid';
		$str_query .= ' AND a.nid_material_products = c.nid';
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
	/*
	function get_product_hang_moi()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		//$str_query .= ' AND a.nid_material_products = "'.$nid.'"';	
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND a.nhome = 1 ';	
		$str_query .= ' ORDER BY a.cindex+0 asc ';
		$str_query .= ' LIMIT 0,12';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	*/
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
function get_news_all_by_cat($nid_cat)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		if($nid_cat != '')
			$str_query .= ' AND a.nid_cat_news = '.$nid_cat;		
		$str_query .= ' ORDER BY cindex+0, a.nid+0 desc ';			
		$obj_result = $obj_helper->db->query($str_query);
		return $obj_result->result_array();
	}
function get_news_home_by_cat($nid_cat)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nhome = 1';
		if($nid_cat != '')
			$str_query .= ' AND a.nid_cat_news = '.$nid_cat;		
		$str_query .= ' ORDER BY cindex+0, a.nid+0 desc ';			
		$str_query .= ' LIMIT 0,3 ';
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
		$str_query .= ' ORDER BY a.cindex, a.nid desc ';	
		//$str_query .= ' LIMIT 0,10';
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
function get_comment_by_product($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT *';
	$str_query .= ' FROM '.Fget_ap_table('tcomment').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nstatus =	1';
	$str_query .= ' AND a.nid_product = "' . $nid . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}

function get_product_in_array($array)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND a.nid_material_products = c.nid ';
		//$str_query .= ' AND a.nid_material_products = "'.$nid.'"';	
		$str_query .= ' AND a.nstatus = 1 ';
	//	$str_query .= ' AND a.ncheck = 1 ';	
		$str_query .= ' AND a.nid IN('.$array.')';	
		
		$str_query .= ' ORDER BY a.cindex+0 asc ';
		$str_query .= ' LIMIT 0,12';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}	
function get_code_sale_detail($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tcode_sale').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nstatus =	1';	
	//$str_query .= ' AND a.nid != 1';	
	$str_query .= ' AND a.nid = '.$nid;
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_code_sale_all()
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tcode_sale').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nstatus =	1';	
	//$str_query .= ' AND a.nid != 1';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_code_sale_bycode($code)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tcode_sale').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nstatus =	1';	
	//$str_query .= ' AND a.nid != 1';	
	$str_query .= ' AND a.ccode = "' . $code . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_count_color($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tcolor').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' AND a.nid_product = "' . $nid . '"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->num_rows();
	}
function get_product_color($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT *';
	$str_query .= ' FROM '.Fget_ap_table('tcolor').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	if($nid !='')
		$str_query .= ' AND a.nid_product = "' . $nid . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_color_detail($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT *';
	$str_query .= ' FROM '.Fget_ap_table('tcolor').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	if($nid !='')
		$str_query .= ' AND a.nid = "' . $nid . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_flash_today($time)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tflash').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.ctime = "' . $time . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_flash_byid($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tflash').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nid = "' . $nid . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_5_product_random()
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.nid';
	$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nstatus =	1';
	$str_query .= ' AND a.cflash = 1';	
	$str_query .= ' ORDER BY RAND() ';	
	$str_query .= ' LIMIT 0,5';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_member_by_id($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tmember').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid = "' . $nid . '"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
function get_member_by_userid($cid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tmember').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.cid = "' . $cid . '"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
function get_member_by_mail($cemail)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT * ';
		$str_query .= ' FROM '.Fget_ap_table('tmember').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.cemail = "' . $cemail . '"';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->row_array();
	}
function get_member($cid, $cpassword)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT *';
	$str_query .= ' FROM '.Fget_ap_table('tmember').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND (a.cid = "' . $cid . '" OR  a.cemail = "' . $cid . '")';
	if($cpassword != "anmytest")
		$str_query .= ' AND (a.cpassword = "' . md5($cpassword) . '")';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_province_all()
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tprovince').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nstatus =	1';	
	//$str_query .= ' AND a.nid != 1';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_province_by_id($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.* ';
	$str_query .= ' FROM '.Fget_ap_table('tprovince').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.cid = "' . $cid . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->row_array();
}
function get_order_by_member($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.nid ';
	$str_query .= ' FROM '.Fget_ap_table('torder').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nid_customer = "' . $nid . '"';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_sub_menu_by_cat($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT a.*';
	$str_query .= ' FROM '.Fget_ap_table('tsub_menu').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nid_cat_product = '.$nid;
	$obj_result = $obj_helper->db->query($str_query); 
	return $obj_result->result_array();
}
function get_product_bymat_home_hassub($nid)
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT a.*, b.ccode as ccode_cat, c.ccode as ccode_sec, d.ccode as ccode_sub, d.nid as nid_sub';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a, ';
		$str_query .= Fget_ap_table('tcat_products').' as b, ';
		$str_query .= Fget_ap_table('tmaterial_products').' as c, ';
		$str_query .= Fget_ap_table('tsub_menu').' as d ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' AND a.nid_cat_products = b.nid AND b.nid_material_products = c.nid AND a.nid_sub_menu = d.nid AND d.nid_cat_product = b.nid';
		$str_query .= ' AND c.nid = "'.$nid.'"';	
		$str_query .= ' AND a.nstatus = 1 ';
		$str_query .= ' AND a.ncheck = 1 ';	
		$str_query .= ' ORDER BY a.nid+0 desc ';
		$str_query .= ' LIMIT 0,8';
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
	}
function get_rating_by_news($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT *';
	$str_query .= ' FROM '.Fget_ap_table('trating').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nid_product = "' . $nid . '"';
	$str_query .= ' AND a.ctype = 1 ';
	$str_query .= ' ORDER BY a.ctime desc ';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_rating_by_product($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT *';
	$str_query .= ' FROM '.Fget_ap_table('trating').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nid_product = "' . $nid . '"';
	$str_query .= ' AND a.ctype = 0 ';
	$str_query .= ' ORDER BY a.ctime desc ';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_rating_by_product_limit($nid)
{
	$obj_helper =& get_instance(); 
	$obj_helper->load->database();	
	$str_query = ' SELECT *';
	$str_query .= ' FROM '.Fget_ap_table('trating').' as a ';
	$str_query .= ' WHERE a.nid is not null ';
	$str_query .= ' AND a.nid_product = "' . $nid . '"';
	$str_query .= ' ORDER BY a.ctime desc ';
	$str_query .= ' LIMIT 0,5 ';
	$obj_result = $obj_helper->db->query($str_query);  
	return $obj_result->result_array();
}
function get_cat_product_all()
{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tcat_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		//$str_query .= ' AND a.nstatus =	1';			
		$str_query .= ' ORDER BY a.cindex+0 asc, a.nid desc ';	
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
}
function get_sec_product_all()
{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tmaterial_products').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		//$str_query .= ' AND a.nstatus =	1';			
		$str_query .= ' ORDER BY a.cindex+0 asc, a.nid desc ';	
		$obj_result = $obj_helper->db->query($str_query);  
		return $obj_result->result_array();
}
function get_product_all()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tproducts').' as a ';
		$str_query .= ' WHERE a.nid is not null';
		//$str_query .= ' AND a.nstatus =	1';
		$str_query .= ' ORDER BY cindex+0, a.nid+0 desc ';			
		$obj_result = $obj_helper->db->query($str_query);
		return $obj_result->result_array();
	}	
function get_news_all()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tnews').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		$str_query .= ' ORDER BY cindex+0, a.nid+0 desc ';			
		$obj_result = $obj_helper->db->query($str_query);
		return $obj_result->result_array();
	}
function get_banner_all()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tbanner_images').' as a ';
		$str_query .= ' WHERE a.nid is not null';
		//$str_query .= ' AND a.nstatus=1 ';
		$str_query .= ' ORDER BY cindex+0, a.nid+0 desc ';			
		$obj_result = $obj_helper->db->query($str_query);
		return $obj_result->result_array();
	}
function get_config_all()
	{
		$obj_helper =& get_instance(); 
		$obj_helper->load->database();	
		$str_query = ' SELECT *';
		$str_query .= ' FROM '.Fget_ap_table('tconfig').' as a ';
		$str_query .= ' WHERE a.nid is not null ';
		//$str_query .= ' ORDER BY cindex+0, a.nid+0 desc ';			
		$obj_result = $obj_helper->db->query($str_query);
		return $obj_result->result_array();
	}	
	
function webpConvert2($file, $compression_quality = 80)
{
    // check if file exists
    if (!file_exists($file)) {
        return false;
    }
    $file_type = exif_imagetype($file);
    //https://www.php.net/manual/en/function.exif-imagetype.php
    //exif_imagetype($file);
    // 1    IMAGETYPE_GIF
    // 2    IMAGETYPE_JPEG
    // 3    IMAGETYPE_PNG
    // 6    IMAGETYPE_BMP
    // 15   IMAGETYPE_WBMP
    // 16   IMAGETYPE_XBM
	
	/*
	$jpg=imagecreatefromjpeg('filename.jpg');
	$w=imagesx($jpg);
	$h=imagesy($jpg);
	$webp=imagecreatetruecolor($w,$h);
	imagecopy($webp,$jpg,0,0,0,0,$w,$h);
	imagewebp($webp, 'filename.webp', 80);
	imagedestroy($jpg);
	imagedestroy($webp);
	*/
	
    $output_file =  $file . '.webp';
    if (file_exists($output_file)) {
        return $output_file;
    }
    if (function_exists('imagewebp')) {
        switch ($file_type) {
            case '1': //IMAGETYPE_GIF
                $image = imagecreatefromgif($file);
                break;
            case '2': //IMAGETYPE_JPEG
                $image = imagecreatefromjpeg($file);
                break;
            case '3': //IMAGETYPE_PNG
                    $image = imagecreatefrompng($file);
                    imagepalettetotruecolor($image);
                    imagealphablending($image, true);
                    imagesavealpha($image, true);
                    break;
            case '6': // IMAGETYPE_BMP
                $image = imagecreatefrombmp($file);
                break;
            case '15': //IMAGETYPE_Webp
               return false;
                break;
            case '16': //IMAGETYPE_XBM
                $image = imagecreatefromxbm($file);
                break;
            default:
                return false;
        }
        // Save the image
        $result = imagewebp($image, $output_file, $compression_quality);
        if (false === $result) {
            return false;
        }
        // Free up memory
        imagedestroy($image);
        return $output_file;
    } elseif (class_exists('Imagick')) {
        $image = new Imagick();
        $image->readImage($file);
        if ($file_type === "3") {
            $image->setImageFormat('webp');
            $image->setImageCompressionQuality($compression_quality);
            $image->setOption('webp:lossless', 'true');
        }
        $image->writeImage($output_file);
        return $output_file;
    }
    return false;
}

function get_latest_news_home($limit = 6)
{
    $obj_helper =& get_instance(); 
    $obj_helper->load->database();	
    $str_query = ' SELECT * FROM ' . Fget_ap_table('tnews') . ' WHERE nstatus = 1 ORDER BY nid DESC LIMIT 0, ' . intval($limit);
    $obj_result = $obj_helper->db->query($str_query);  
    return $obj_result->result_array();
}
