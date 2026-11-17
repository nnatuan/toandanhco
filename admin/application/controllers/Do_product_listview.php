<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * =================================================================
 * Tokaban Standard System.
 * CodeIniter Tokaban framework for PHP.
 *
 * @package		: CI-TKB 
 * @author		: Tokaban R&D Team.
 * 				: phu_ca86	
 * @copyright	: Copyright (c) 2009, Tokaban, Inc.
 * @since		: Version 2.0
 * =================================================================
 */   
  
/** 
 *------------------------------------------------------------------
 * do_news_listview class
 *
 * Quan ly danh muc materia
 *
 * @subpackage	controllers
 * @category	
 * @author		Cao An Phu 
 *------------------------------------------------------------------
 */	   
  
class do_product_listview extends CI_Controller
{ 	 
		// Cac bien bat buoc phai co 
		// de chay cac ham co ban cua lop
		var $m_nid_user_login   	= ''; // nhan iduser tu session
		
		var	$m_link_page  			= ''; // chua duong dan toi cac trang khac nhau trong moi event
		var $m_link_export			= '';
		
		var $m_event         		= ''; // nhan event de xu ly				
		 
		var $m_where_clause   		= ''; // nhan dieu kien where trong cac lenh loc hay chon trang 			
		var $m_orderby_clause 		= ''; // nhan truong de sap xep
		var $m_orderby_sort   		= ''; // nhan yeu cau de sap xep
		var $m_sort_image   		= '';
			
		var $m_total_row  			= 0;  // nhan tong so hang du lieu 				
		var $m_total_page 			= 0;  // nhan tong so trang du lieu			
		
		var $m_current_page  		= 0; 			
		var $m_previous_page 		= 0; 			
		var $m_next_page     		= 0;				
		var $m_row_per_page     	= 0;  
		
// Cac bien tuy bien cua lop doi tuong
		var $m_txtf_nid 			  	= ''; // nhan ma tin 
		var $m_txtf_ccode			  	= '';// dai dien cho bien ccode
		var $m_txtf_cproducts 			= '';
		var $m_chkf_ctag	       		= 0;	
		var $m_txtf_cimage				= '';
		var $m_txtf_nstatus				= '';
		var $m_txtf_ncheck				= '';
		var $m_txtf_cindex				= '';
		var $nid_brand					= '';
		//var $m_txtf_user01				= '';
		var $m_txtf_ddate01				= '';
		
		var $m_cbof_nid_material_products 	= '';
		var $m_cbof_nid_cat_products 	= '';

		var $m_obj_material_product_view = '';
		var $m_obj_cat_product_view 	= '';
		var $m_obj_brand				= '';
		var $m_obj_data_view    		= '';
		
		
/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com
 * @finished date	: 2009/12/13
 * @description		: Ham khoi tao, load cac thu vien can dung cho class
 * @access	        : public
 *
 * @param string	: None
 * 					: 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */  
function __construct()
	{ 		
		parent::__construct(); 
		session_start();
		$this->load->database();	
		
		$this->load->helper('ap_db');	
		$this->load->helper('ap_function');
		$this->load->helper('ap_html'); 	// load de su dung ham tao ra khoi combobox tren trang view
		$this->load->helper('ap_view'); 	// load de su dung cac truong trong database duoc khai bao trong helper
		$this->load->helper('ap_object');	// load de su dung ham de tra ve doi tuong combobox
		
		$this->load->model('product_model'); 	// load de su dung cac ham duoc khai bao trong model	
		// Xac dinh cac duong dan can su dung cho view hien thi thong tin controller.		
		
		
		// Kiem tra dieu kien login theo ma so he thong 1.
		$this->tokaban_system_check = '1'; 	
	}	
	
/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com

 * @finished date	: 2009/12/13
 * @description		: Lay nid tu view ap_city_listview
 * @access	        : public
 *
 * @param string	: $nid   : truong khoa chinh cua tcity
 *                  : 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
 
 private function m_language_key($str_key)
	{
		return $this->lang->line('lbl.product.'.$str_key);
	}
		
/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com
 * @finished date	: 2009/12/13
 * @description		: Sap xep du lieu tang dan, giam dan theo ten field
 * @access	        : public
 *
 * @param string	: $field_name   : ten truong
 *                  : $orderby_sort : kieu sap xep
 * 					: 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
function f_sort($field_name, $orderby_sort)
	{
		$this->m_orderby_clause = $field_name;
		$this->m_orderby_sort   = $orderby_sort;
		
		$this->do_process();
	}
/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com
 * @finished date	: 2009/12/13
 * @description		: Xuat exel
 * @access	        : public
 *
 * @param string	: 
 * 					: 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */
 function f_print()
 	{
		$this->m_event = 'print';
		$this->do_process();
	}

/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com
 * @finished date	: 2009/12/13
 * @description		: Khai bao ten cookie cho table chuan 1 lan, sau gia tri sau se them rieng cho tung phan
 * @access	        : public
 *
 * @param string	: $cookie_name  : ten cookie
 *                  : $cookie_value : gia tri cua cookie
 * 					: 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */	
private function f_set_cookie($cookie_name,$cookie_value)
 { 
	return dbset_cookie('cookie_product_listview_'.$cookie_name,$cookie_value);
 }
/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com
 * @finished date	: 2009/12/13
 * @description		: Khai bao lai ham lay cookie cho rieng man hinh nay
 * @access	        : public
 *
 * @param string	: $cookie_name   : ten cookie
 * 					: 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */	
private function f_get_cookie($cookie_name)
 { 
	return dbget_cookie('cookie_product_listview_'.$cookie_name);
 }
 
/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com
 * @finished date	: 2009/12/13
 * @description		: Khai bao lai ham lay cookie cho rieng man hinh nay
 * @access	        : public
 *
 * @param string	: $nid   : chi so trang thai 0 hoac 1
 * 					: 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */	
function f_active($nid,$status)   
{
	if($status == '0')
		$status = '1';
	else
		$status = '0';
		
	$data =	array(		
								
		'nstatus'				=> $status,
		);
	$this->product_model->update_bynid($nid, $data);		
	
	$this->do_process();
}  
function f_check($nid,$check)   
{
	if($check == '0')
		$check = '1';
	else
		$check = '0';
		
	$data =	array(		
								
		'ncheck'				=> $check,
		);
	$this->product_model->update_bynid($nid, $data);		
	
	$this->do_process();
}  
function f_km($nid,$nspecial)   
{
	if($nspecial == '0')
		$nspecial = '1';
	else
		$nspecial = '0';
		
	$data =	array(		
								
		'nkm'				=> $nspecial,
		);
	$this->product_model->update_bynid($nid, $data);		
	
	$this->do_process();
}  
function f_pb($nid,$nspecial)   
{
	if($nspecial == '0')
		$nspecial = '1';
	else
		$nspecial = '0';
		
	$data =	array(		
								
		'npb'				=> $nspecial,
		);
	$this->product_model->update_bynid($nid, $data);		
	
	$this->do_process();
}  				
/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com
 * @finished date	: 2009/12/13
 * @description		: 
 * @access	        : public
 *
 * @param string	: None
 * 					: 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
function index()
	{				
		$this->do_process();
	}    
			
/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com
 * @finished date	: 2009/12/13
 * @description		: Goi tuan tu cac ham theo dung quy dinh ve luong du lieu
 * @access	        : public
 *
 * @param string	: None
 * 					: 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
function do_process() 
	{
		$this->get_data(); 		
		$this->caculate_data(); 		
		$this->do_business(); 		
		$this->destroy_data();
	} 

/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com
 * @finished date	: 2009/12/13
 * @description		: Nhan du lieu
 * @access	        : private
 *
 * @param string	: None
 * 					: 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
private function get_data()
	{         
		$this->m_nid_user_login = Fget_userdata('session_nid_user');
		$this->load->language('ap', 'eng');
		
		if(isset($_POST['cbof_nid_material_products']))
		{	
			$this->m_cbof_nid_material_products =   $_POST['cbof_nid_material_products'];
			$this->f_set_cookie('m_cbof_nid_material_products',$this->m_cbof_nid_material_products);
		}
		if(isset($_POST['cbof_nid_cat_products']))
		{	
			$this->m_cbof_nid_cat_products 		=   $_POST['cbof_nid_cat_products'];
			$this->f_set_cookie('m_cbof_nid_cat_products',$this->m_cbof_nid_cat_products);
		}
		if(isset($_POST['cbof_nid_brand_products']))
		{	
			$this->nid_brand 		=   $_POST['cbof_nid_brand_products'];
			$this->f_set_cookie('nid_brand',$this->nid_brand);
		}
		if(isset($_POST['hidden_button']))
		{
			$hidden_button = $_POST['hidden_button']; //gan su kien tu listview chuyen sang thong qua hidden button
			switch($hidden_button) // lua chon xu ly tuy thuoc vao su kien hidden button
			{
				case "btn_filter": //su kien loc
				{
					if (!empty($_POST['chkf_ctag']))
						$this->m_chkf_ctag		 		=   $_POST['chkf_ctag'];
					$this->f_set_cookie('m_chkf_ctag',$this->m_chkf_ctag);
					//Phan vung nhan bien loc	
					if(isset($_POST['txtf_cproducts']))	
					{
						$this->m_txtf_ccode 				=   $_POST['txtf_ccode'];
						$this->m_txtf_cproducts 			=   $_POST['txtf_cproducts'];
						//$this->m_txtf_user01 				=   $_POST['txtf_user01'];
						//$this->m_txtf_ddate01 				=   $_POST['txtf_ddate01'];	
						//$this->m_txtf_cindex 				=   $_POST['txtf_cindex'];		
						$this->m_txtf_nstatus 				=   $_POST['txtf_nstatus'];

					}	
	
					//Vung gan bien loc vao cookie
					$this->f_set_cookie('m_txtf_ccode',$this->m_txtf_ccode);
					$this->f_set_cookie('m_txtf_cproducts',$this->m_txtf_cproducts);
					//$this->f_set_cookie('m_txtf_user01',$this->m_txtf_user01);
					$this->f_set_cookie('m_txtf_ddate01',$this->m_txtf_ddate01);
					$this->f_set_cookie('m_txtf_cindex',$this->m_txtf_cindex);
					$this->f_set_cookie('m_txtf_nstatus',$this->m_txtf_nstatus);
					$this->f_set_cookie('m_txtf_ncheck',$this->m_txtf_ncheck);
						
					break;			
	
				}
				case "btn_row_per_page": // su kien chon so dong tren trang
				{
					if (isset($_POST['txt_row_per_page']))
					{
           			 	$this->m_row_per_page = Fconvert_to_int($_POST['txt_row_per_page']);				
					}
					break;
				}
				case "btn_page_number": // su kien chon so trang
				{
					$this->m_current_page = 1;
					
					if (isset($_POST['txt_current_page']))
					$this->m_current_page = $_POST['txt_current_page'];
												
				 	break;	
				
				}
				case "btn_header_page_number": // su kien chon so trang tren dau bang
				{
					$this->m_current_page = 1;
					
					if (isset($_POST['txt_header_current_page']))
					$this->m_current_page = $_POST['txt_header_current_page'];
												
				 	break;	
				
				}
				case ("btn_next") : // su kien chuyen den trang ke tiep
				{
					$this->m_current_page = $_POST['txt_current_page'];
					$this->m_current_page += 1;
					
					break;	
				
				}
				case ("btn_previous") : // su kien lui lai trang phia truoc
				{
					$this->m_current_page = $_POST['txt_current_page'];
					$this->m_current_page -= 1;
					
					break;	
				
				}
				case "btn_export": // su kien export ra excel
				{
					$this->m_event = 'excel';
					break;
				}
				
				case "btn_add" : // su kien add them data
				{
					redirect(base_url() . 'index.php/do_product/f_add');
				}
				
				case "btn_delete" : // su kien delete data
				{
					$this->delete();
					break;
				}
				
				case "btn_add_trans":
				{
					redirect(base_url() . 'index.php/do_news/f_cfm_trans');
				}
				case "btn_header_add":
				{
					redirect(base_url() . 'index.php/do_news/f_add_trans');
				}
				default:
				{
					//hien tai default khong lam gi ca
				}
			}
		
		}
							
	} 
	
/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com
 * @finished date	: 2009/12/13
 * @description		: Xu ly du lieu
 * @access	        : private
 *
 * @param string	: None
 * 					: 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
private function caculate_data()
	{	   
	
//		Xac dinh link page:
		$this->m_link_page 			= base_url() . 'index.php/do_product_listview/';
		
	    // Kiem tra va gan gia tri tuong ung cho ten truong va kieu sap xep
		// phuc vu cho chuc nang sort
		if (trim($this->m_orderby_clause)=='')
		{
			$this->m_orderby_clause = $this->f_get_cookie('m_orderby_clause');
			$this->m_orderby_sort   = $this->f_get_cookie('m_orderby_sort');
		}
		
		// neu chua co dieu kien sap xep thi mac dinh la sap xep theo ma phuong xa va co thu tu tang dan

		if (trim($this->m_orderby_clause)=='')
		{
			$this->m_orderby_clause = 'cproducts';
			$this->m_orderby_sort   = 'asc';
		}
		
		$this->f_set_cookie('m_orderby_clause',$this->m_orderby_clause);
		$this->f_set_cookie('m_orderby_sort',$this->m_orderby_sort);		 
	
		// Lay gia tri tu cookie, phuc vu cho chuc nang loc
		$this->m_txtf_ccode		 					= $this->f_get_cookie('m_txtf_ccode');
		$this->m_txtf_cproducts 					= $this->f_get_cookie('m_txtf_cproducts');
		//$this->m_txtf_user01 						= $this->f_get_cookie('m_txtf_user01');
		$this->m_txtf_ddate01 						= $this->f_get_cookie('m_txtf_ddate01');
		$this->m_txtf_cindex 						= $this->f_get_cookie('m_txtf_cindex');
		$this->m_txtf_nstatus 						= $this->f_get_cookie('m_txtf_nstatus');
		$this->m_txtf_ncheck 						= $this->f_get_cookie('m_txtf_ncheck');
		$this->m_cbof_nid_material_products			= $this->f_get_cookie('m_cbof_nid_material_products');
		$this->m_cbof_nid_cat_products				= $this->f_get_cookie('m_cbof_nid_cat_products');
		$this->m_chkf_ctag							= $this->f_get_cookie('m_chkf_ctag');	
		
		// Xac dinh menh de where cua cau lenh sql		
		$this->m_where_clause 		= $this->get_where_string();	
		
		// Lay tong so dong
		$this->m_total_row 			= $this->product_model->get_count_listview($this->m_where_clause);		
		
		// Kiem tra va gan gia tri tuong ung cho bien so dong tren trang
		if ($this->m_row_per_page <= 0)
			$this->m_row_per_page  = Fget_userdata('session_user_row_per_page');			
		else
			Fset_userdata('session_user_row_per_page', $this->m_row_per_page);			
	
	    // Tinh toan tong so trang
		$this->m_total_page = Fget_total_page($this->m_row_per_page, $this->m_total_row);
		
		// Kiem tra va gan gia tri tuong ung cho bien trang hien tai
		if ($this->m_current_page <= 0)
			$this->m_current_page = $this->f_get_cookie('m_current_page');
			
		if ($this->m_current_page <= 0)
			$this->m_current_page = 1;		
			
		if ($this->m_current_page > $this->m_total_page)
			$this->m_current_page = $this->m_total_page;
		
		$this->f_set_cookie('m_current_page', $this->m_current_page);	
		
		
		// Lay mang du lieu duoc tra ve tu cau lenh sql
		
		$this->m_obj_data_view   = $this->product_model->get_listview( $this->m_where_clause, 
																	$this->m_orderby_clause . ' ' . 																	$this->m_orderby_sort , 
																	$this->m_row_per_page, 
																	$this->m_current_page, 
																	$this->m_total_row );
		

		// -------------------------------------------
		// LUU Y:
		// KHONG DUOC TU Y THAY DOI THONG TIN CUA NHUNG DOAN CODE DA DUOC XU LY BEN DUOI.
		// -------------------------------------------
		// Xac dinh kieu sap xep.
		// Phai xu ly tinh huong nay sau khi da thuc hien truy van du lieu xac dinh cac dong thong tin da truy xuat.
		
		//nhan object de chuan bi cho combobox 
		
		$this->m_obj_material_product_view 	= Obj_get_material_product_list($this->m_nid_user_login);
		$this->m_obj_cat_product_view 		= Obj_get_cat_product_list( $this->m_cbof_nid_material_products);
		
		$this->m_obj_brand					= Obj_get_brand_product_list($this->m_cbof_nid_cat_products);
		if (trim($this->m_orderby_sort) == 'asc' || trim($this->m_orderby_sort) == '')
			$this->m_orderby_sort   = 'desc';			
		else
			$this->m_orderby_sort   = 'asc';
		
		// Xac dinh image can hien thi tuong ung theo dieu kien sort.	
		$this->m_sort_img       = Fget_image_sort($this->m_orderby_sort);
		
		// Xac dinh su kien form
		if($this->m_event == '')
			$this->m_event='view';		
	}
	   
/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com
 * @finished date	: 2009/12/13
 * @description		: Xu ly nghiep vu
 * @access	        : private
 *
 * @param string	: None
 * 					: 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
private function do_business()
	{	
		// Load file ngon ngu can su dung

		// Xac dinh ten truong can sap xep
		$data['orderby_field'] 		= $this->m_orderby_clause;
		
		// Xac dinh kieu sap xep
		$data['orderby_sort']   	= $this->m_orderby_sort;
		$data['sort_img']       	= $this->m_sort_img;

		// Xac dinh cac duong link
		 // Duong dan URL den controller
		$data['link_page']          = $this->m_link_page;
		
		// tieu de danh muc
		$data['lbl_form_title'] 	=  $this->m_language_key('title.form');

		// Ten cac button he thong
		$data['btn_add'] 	        	= $this->lang->line('btn.0000.Add');
		$data['btn_delete'] 	    	= $this->lang->line('btn.0000.Delete');
		$data['btn_export']         	= $this->lang->line('btn.0000.Export');
		$data['btn_choose'] 	    	= $this->lang->line('btn.0000.Choose');
		$data['btn_filter']         	= $this->lang->line('btn.0000.Filter');
		$data['btn_print']          	= $this->lang->line('btn.0000.Print');
		
		// Cac thong bao khi nhan button Xoa
		$data['error_full_trans']		   = $this->m_language_key('full.trans');
		$data['msg_invalid_before_delete'] = $this->lang->line('msg.0000.InvalidBeforeDelete');
		$data['msg_confirm_before_delete'] = $this->lang->line('msg.0000.ConfirmBeforeDelete');
		// So dong tren trang
		$data['lbl_rows_per_page'] 		= $this->lang->line('lbl.0000.RowPerPage');
		$data['lbl_not_tag'] 	    = $this->lang->line('lbl.0000.DataNotTag');
		// Xac dinh so dong tren trang
		$data['txt_row_per_page']   	= $this->m_row_per_page;

		// Xac dinh gia tri trang hien tai
		$data['txt_current_page']   	= $this->m_current_page;
		
		// Xac dinh tong so trang
		$data['txt_total_page']    		= $this->m_total_page;			
		
		// tieu de cac truong
		$data['lbl_ccode'] 	        	= $this->m_language_key('ccode');
		$data['lbl_cindex'] 	   	    = $this->m_language_key('cindex');
		$data['lbl_cproducts'] 	        = $this->m_language_key('cproducts');
		$data['lbl_cnote'] 	        	= $this->m_language_key('cnote');
		$data['lbl_nstatus'] 	        = $this->m_language_key('nstatus');
		$data['lbl_niduser01'] 	        = $this->m_language_key('niduser01');
		$data['lbl_date01'] 	        = $this->m_language_key('date01');
		$data['lbl_nid_metarial_product'] = $this->m_language_key('nid_metarial_product');
		$data['lbl_nid_cat_product'] 	= $this->m_language_key('nid_cat_product');
		$data['lbl_cimage'] 			= $this->m_language_key('cimage');
		$data['lbl_add_image'] 			= $this->m_language_key('add_image');
		$data['lbl_nid_brand_product'] 	= $this->m_language_key('nid_brand_product');
				
		// Xac dinh cac gia tri can cho chuc nang loc
		$data['event']					= $this->m_event;
		$data['txtf_nid']         		= $this->m_txtf_nid;
		
		$data['txtf_ccode']				= $this->m_txtf_ccode;
		$data['txtf_cproducts']			= $this->m_txtf_cproducts;
		$data['txtf_nstatus']    		= $this->m_txtf_nstatus;
		$data['txtf_ncheck']    		= $this->m_txtf_ncheck;
		//$data['txtf_user01']    		= $this->m_txtf_user01;
		$data['txtf_ddate01']    		= $this->m_txtf_ddate01;
		$data['txtf_cindex']  			= $this->m_txtf_cindex;
		$data['chkf_ctag']        		= $this->m_chkf_ctag;
		$data['gencbo_brand_product_list']        		= $this->m_chkf_ctag;
		
		$data['gen_cbo_status']			= Fget_combobox_yes_no('','txtf_nstatus',$this->m_txtf_nstatus,'width:98%',$this->lang->line('lbl.0000.Yes'),$this->lang->line('lbl.0000.No'));
		$data['gen_cbo_check']			= Fget_combobox_yes_no('','txtf_ncheck',$this->m_txtf_ncheck,'width:98%',$this->lang->line('lbl.0000.Yes'),$this->lang->line('lbl.0000.No'));
		
		$data['gencbo_material_product_list']	= Fgen_html_combobox('', 'cbof_nid_material_products', $this->m_cbof_nid_material_products, '', $this->m_obj_material_product_view, 'nid', 'cmaterial_products','','');
		$data['gencbo_cat_product_list']		= Fgen_html_combobox('', 'cbof_nid_cat_products', $this->m_cbof_nid_cat_products, '', $this->m_obj_cat_product_view, 'nid', 'ccat_products','','');
		
		$data['gencbo_brand_product_list']		= Fgen_html_combobox('', 'cbof_nid_brand_products', $this->nid_brand, '', $this->m_obj_brand, 'nid', 'cbrand_products','','');

		// Xac dinh mang du lieu de hien thi tren view
		$data['data_view']         				= $this->m_obj_data_view;
		$data['menu'] = Fget_menu_html($this->m_nid_user_login);
		
		//Kiem tra neu la truong hop xuat excel thi chay ham goi export_excel va dung lai
		
		// Load view tuong ung voi su kien m_event.
		$data['event'] 			= $this->m_event;
		if($this->m_event == 'list_trans')
		$data['lbl_form_title'] =  $this->m_language_key('title.tran.form');
		
		$data['menu_active']		= 'product';
		$this->load->view('product_view/index.php', $data);
	}
	
/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com
 * @finished date	: 2009/12/13
 * @description		: Huy du lieu
 * @access	        : private
 *
 * @param string	: None
 * 					: 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */				
private function destroy_data()
	{
					
	}
	
/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com
 * @finished date	: 2009/12/13
 * @description		: Thiet lap menh de where cho cau lenh sql
 * @access	        : private
 *
 * @param string	: None
 * 					
 * @return string	: $str_result : menh de where
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */					
private function get_where_string()
   {
		$str_result = ' WHERE nid is not null ';
		if ($this->m_txtf_ccode != '')
			$str_result = $str_result . ' AND ccode like "%' . trim($this->m_txtf_ccode) . '%" ';
		if ($this->m_txtf_cproducts != '')
			$str_result = $str_result . ' AND cproducts like "%' . trim($this->m_txtf_cproducts) . '%" ';
		//if ($this->m_txtf_user01 != '')
			//$str_result = $str_result . ' AND cfullname like "%' . trim($this->m_txtf_user01) . '%" ';
		//if ($this->m_txtf_ddate01 != '')
		//	$str_result = $str_result . ' AND ddate01 = "' . Fget_strdate($this->m_txtf_ddate01) . '" ';
		if ($this->m_txtf_cindex != '')
			$str_result = $str_result . ' AND cindex like "%' . trim($this->m_txtf_cindex) . '%" ';
		if ($this->m_txtf_nstatus != '')
			$str_result = $str_result . ' AND nstatus = "' . trim($this->m_txtf_nstatus) . '" ';
		if ($this->m_txtf_ncheck != '')
			$str_result = $str_result . ' AND ncheck = "' . trim($this->m_txtf_ncheck) . '" ';
		
		if ($this->m_cbof_nid_material_products != '')
			$str_result = $str_result . ' AND nid_material_products = "' . trim($this->m_cbof_nid_material_products) . '" ';
		if ($this->m_cbof_nid_cat_products != '')
			$str_result = $str_result . ' AND nid_cat_products = "' . trim($this->m_cbof_nid_cat_products) . '" ';
		
		if ($this->m_chkf_ctag == 1)
			$str_result = $str_result . ' AND ctag = "" ';	
		
		return $str_result;
	}
function checkvalid_delete($id)
{

	return TRUE;
	
}
/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com
 * @finished date	: 2009/12/13
 * @description		: Xoa du lieu trong DB theo gia tri nid tuong ung
 * @access	        : private
 *
 * @param string	: None
 * 					: 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
private function delete()
{					
	if (!empty($_POST['chk']))
	{
		foreach ($_POST['chk'] as $nid)			
			$this->product_model->delete_byid($nid);
	}
			
}		
function ajax_get_product_cat()
{
	$nid_cat 	= '0';
	$obj_brand 	= '';
	if(isset($_POST['nid_cat']))
		$nid_cat = $_POST['nid_cat'];
	$this->db->select('nid,ccat_products');	
	$this->db->where('nid_material_products',$nid_cat);
	$obj_brand = $this->db->get('tcat_products');
	$obj_brand = $obj_brand->result_array();
	
	$str= '<select name="cbo_nid_cat_products" id="cbo_nid_cat_products" style="width:98%;" onchange="load_brand(this.value);">';
	$str.='<option value="" ></option>';
	foreach($obj_brand as $brand)
	{
		$str.='<option value="'.$brand['nid'].'">'.$brand['ccat_products'].'</option>';
	}
	$str.='</select>';
	
	echo $str;
}
function ajax_get_product_brand()
{
	$nid_cat 	= '0';
	$obj_brand 	= '';
	if(isset($_POST['nid_cat']))
		$nid_cat = $_POST['nid_cat'];
	$this->db->select('nid,cbrand_products');	
	$this->db->where('nid_cat_products',$nid_cat);
	$obj_brand = $this->db->get('tbrand_products');
	$obj_brand = $obj_brand->result_array();
	
	$str= '<select name="nid_brand_products" id="nid_brand_products" style="width:98%;">';
	$str.='<option value="" ></option>';
	foreach($obj_brand as $brand)
	{
		$str.='<option value="'.$brand['nid'].'">'.$brand['cbrand_products'].'</option>';
	}
	$str.='</select>';
	
	echo $str;
}

// End do_news_listview class
}	
// End of file do_news_listview.php
// Location: controllers/do_news_listview.php
