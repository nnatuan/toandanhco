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
  
class do_customer_listview extends CI_Controller
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
		var $m_row_per_page     	= 15;  
		
// Cac bien tuy bien cua lop doi tuong
	
		var $m_txtf_ccode			  	= '';// dai dien cho bien ccode
		var $m_txtf_customerid			= '';
		var $m_txtf_cpassword			= '';
		var $m_txtf_cemail				= '';
		var $m_txtf_chandphone			= '';
		var $m_txtf_cfirstname			= '';
		var $m_txtf_cmiddlename			= '';
		var $m_txtf_clastname			= '';
		var $m_txtf_caddress			= '';

		var $m_txtf_nstatus				= '';
	
		var $m_txtf_user01				= '';
		var $m_txtf_ddate01				='';

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
		
		$this->load->model('customer_model'); 	// load de su dung cac ham duoc khai bao trong model	
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
		return $this->lang->line('lbl.customer.'.$str_key);
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
	return dbset_cookie('cookie_customer_listview_'.$cookie_name,$cookie_value);
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
	return dbget_cookie('cookie_customer_listview_'.$cookie_name);
 }
 function f_active($nid,$status)   
{
	if($status == '0')
		$status = '1';
	else
		$status = '0';
		
			$data =	array(		
										
				'nstatus'				=> $status,
		        );
			$this->customer_model->update_bynid($nid, $data);		
		
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
		$this->m_language = Fget_userdata('session_user_language');	
		// Load file ngon ngu can su dung.
		$this->load->language('ap', $this->m_language);
		
		if(isset($_POST['hidden_button']))
		{
			$hidden_button = $_POST['hidden_button']; //gan su kien tu listview chuyen sang thong qua hidden button
			switch($hidden_button) // lua chon xu ly tuy thuoc vao su kien hidden button
			{
				case "btn_filter": //su kien loc
				{
				//Phan vung nhan bien loc	
			
				if(isset($_POST['txtf_user01']))	
					$this->m_txtf_user01 			=   $_POST['txtf_user01'];
				if(isset($_POST['txtf_ddate01']))	
					$this->m_txtf_ddate01 			=   $_POST['txtf_ddate01'];	
				if(isset($_POST['txtf_customerid']))	
					$this->m_txtf_customerid 		=   $_POST['txtf_customerid'];	
				if(isset($_POST['txtf_cpassword']))	
					$this->m_txtf_cpassword			=   $_POST['txtf_cpassword'];	
				if(isset($_POST['txtf_cemail']))	
					$this->m_txtf_cemail			=   $_POST['txtf_cemail'];	
				if(isset($_POST['txtf_chandphone']))	
					$this->m_txtf_chandphone		=   $_POST['txtf_chandphone'];	
				if(isset($_POST['txtf_cfirstname']))	
					$this->m_txtf_cfirstname 		=   $_POST['txtf_cfirstname'];	
				if(isset($_POST['txtf_cmiddlename']))	
					$this->m_txtf_cmiddlename 		=   $_POST['txtf_cmiddlename'];	
				if(isset($_POST['txtf_clastname']))	
					$this->m_txtf_clastname 		=   $_POST['txtf_clastname'];	
				if(isset($_POST['txtf_caddress']))	
					$this->m_txtf_caddress 			=   $_POST['txtf_caddress'];	
				if(isset($_POST['txtf_nstatus']))	
					$this->m_txtf_nstatus 			=   $_POST['txtf_nstatus'];	
			
				//Vung gan bien loc vao cookie
			
				$this->f_set_cookie('txtf_user01',$this->m_txtf_user01);
				$this->f_set_cookie('txtf_ddate01',$this->m_txtf_ddate01);
				$this->f_set_cookie('txtf_customerid',$this->m_txtf_customerid);
				$this->f_set_cookie('txtf_cpassword',$this->m_txtf_cpassword);
				$this->f_set_cookie('txtf_cemail',$this->m_txtf_cemail);
				$this->f_set_cookie('txtf_chandphone',$this->m_txtf_chandphone);
				$this->f_set_cookie('txtf_cfirstname',$this->m_txtf_cfirstname);
				$this->f_set_cookie('txtf_cmiddlename',$this->m_txtf_cmiddlename);
				$this->f_set_cookie('txtf_clastname',$this->m_txtf_clastname);
				$this->f_set_cookie('txtf_caddress',$this->m_txtf_caddress);
				$this->f_set_cookie('txtf_nstatus',$this->m_txtf_nstatus);
			
				break;			
	
				}
				case "btn_row_per_page": // su kien chon so dong tren trang
				{
					if (isset($_POST['txt_row_per_page']))
					{
           			 	$this->m_row_per_page = Fconvert_to_int($_POST['txt_row_per_page']);
						//$this->f_set_cookie('m_row_per_page',$this->m_row_per_page);		
						
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
					redirect(base_url() . 'index.php/do_customer/f_add');
				}
				
				case "btn_delete" : // su kien delete data
				{
					$this->delete();
					break;
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
		$this->m_link_page 			= base_url() . 'index.php/do_customer_listview/';
	    // Kiem tra va gan gia tri tuong ung cho ten truong va kieu sap xep
		// phuc vu cho chuc nang sort
		/*if (trim($this->m_orderby_clause)=='')
		{
			$this->m_orderby_clause = $this->f_get_cookie('m_orderby_clause');
			$this->m_orderby_sort   = $this->f_get_cookie('m_orderby_sort');
		}
		
		// neu chua co dieu kien sap xep thi mac dinh la sap xep theo ma phuong xa va co thu tu tang dan

		if (trim($this->m_orderby_clause)=='')
		{
			$this->m_orderby_clause = 'nid';
			$this->m_orderby_sort   = 'asc';			
		}*/
		
		$this->f_set_cookie('m_orderby_clause',$this->m_orderby_clause);
		$this->f_set_cookie('m_orderby_sort',$this->m_orderby_sort);		 
	
		// Lay gia tri tu cookie, phuc vu cho chuc nang loc
		$this->m_txtf_user01 					= $this->f_get_cookie('txtf_user01');
		$this->m_txtf_ddate01 					= $this->f_get_cookie('txtf_ddate01');
		$this->m_txtf_customerid 				= $this->f_get_cookie('txtf_customerid');
		$this->m_txtf_cpassword					= $this->f_get_cookie('txtf_cpassword');
		$this->m_txtf_cemail 					= $this->f_get_cookie('txtf_cemail');
		$this->m_txtf_chandphone 				= $this->f_get_cookie('txtf_chandphone');
		$this->m_txtf_cfirstname 				= $this->f_get_cookie('txtf_cfirstname');
		$this->m_txtf_cmiddlename 				= $this->f_get_cookie('txtf_cmiddlename');
		$this->m_txtf_clastname 				= $this->f_get_cookie('txtf_clastname');
		$this->m_txtf_caddress	 				= $this->f_get_cookie('txtf_caddress');
		
		$this->m_txtf_nstatus 					= $this->f_get_cookie('txtf_nstatus');
		
		
		// Xac dinh menh de where cua cau lenh sql		
		$this->m_where_clause 		= $this->get_where_string();	
		
		// Lay tong so dong
		$this->m_total_row 			= $this->customer_model->get_count_listview($this->m_where_clause);		
		
		// Kiem tra va gan gia tri tuong ung cho bien so dong tren trang
		if ($this->m_row_per_page <= 0)
			$this->m_row_per_page  = Fget_userdata('session_user_row_per_page');			
		else
			Fset_userdata('session_user_row_per_page', $this->m_row_per_page);			
	
	    // Tinh toan tong so trang
		$this->m_total_page = Fget_total_page($this->m_row_per_page, $this->m_total_row);
		
		// Kiem tra va gan gia tri tuong ung cho bien trang hien tai
		if ($this->m_current_page <= 0)
			$this->m_current_page = dbget_cookie('cookie_customer_listview_txt_current_page');
			
		if ($this->m_current_page <= 0)
			$this->m_current_page = 1;		
			
		if ($this->m_current_page > $this->m_total_page)
			$this->m_current_page = $this->m_total_page;
		
		dbset_cookie('cookie_customer_listview_txt_current_page', $this->m_current_page);	
		
		
		// Lay mang du lieu duoc tra ve tu cau lenh sql
		
		$this->m_obj_data_view   = $this->customer_model->get_listview($this->m_where_clause,
																	$this->m_orderby_clause.' '. 																	$this->m_orderby_sort, 
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
	//	echo Fget_userdata('session_begin_application').'aaaaaaaaaaaaa';

		// Xac dinh ten truong can sap xep
		$data['orderby_field'] 		= $this->m_orderby_clause;
		
		// Xac dinh kieu sap xep
		$data['orderby_sort']   	= $this->m_orderby_sort;
		$data['sort_img']       	= $this->m_sort_img;

		// Xac dinh cac duong link
		 // Duong dan URL den controller
		$data['link_page']          = $this->m_link_page;
		
		// tieu de danh muc
		$data['lbl_form_title'] =  $this->m_language_key('title.form');

		// tieu de cac truong
	
		$data['lbl_title'] 	        	= $this->m_language_key('title');
		$data['lbl_customerid']		 	= $this->m_language_key('customerid');
		$data['lbl_cpassword'] 	  		= $this->m_language_key('cpassword');
		$data['lbl_cemail'] 	     	= $this->m_language_key('cemail');
		$data['lbl_chandphone'] 	    = $this->m_language_key('chandphone');
		$data['lbl_cfirstname'] 	    = $this->m_language_key('cfirstname');
		$data['lbl_cmiddlename'] 	    = $this->m_language_key('cmiddlename');
		$data['lbl_clastname'] 		    = $this->m_language_key('clastname');
		$data['lbl_caddress'] 	  		= $this->m_language_key('caddress');
		$data['lbl_nstatus']	 	    = $this->m_language_key('nstatus');

		$data['lbl_date01'] 	        = $this->m_language_key('date01');
		$data['lbl_niduser01'] 	        = $this->m_language_key('niduser01');
		
		// Ten cac button he thong
		$data['btn_add'] 	        	= $this->lang->line('btn.0000.Add');
		$data['btn_delete'] 	    	= $this->lang->line('btn.0000.Delete');
		$data['btn_export']         	= $this->lang->line('btn.0000.Export');
		$data['btn_choose'] 	    	= $this->lang->line('btn.0000.Choose');
		$data['btn_filter']         	= $this->lang->line('btn.0000.Filter');
		$data['btn_print']          	= $this->lang->line('btn.0000.Print');
		
		// Cac thong bao khi nhan button Xoa
		$data['msg_invalid_before_delete'] = $this->lang->line('msg.0000.InvalidBeforeDelete');
		$data['msg_confirm_before_delete'] = $this->lang->line('msg.0000.ConfirmBeforeDelete');
		// So dong tren trang
		$data['lbl_rows_per_page'] 	= $this->lang->line('lbl.0000.RowPerPage');
		
		// Xac dinh so dong tren trang
		$data['txt_row_per_page']   = $this->m_row_per_page;

		// Xac dinh gia tri trang hien tai
		$data['txt_current_page']   = $this->m_current_page;
		
		// Xac dinh tong so trang
		$data['txt_total_page']     = $this->m_total_page;			
				
		// Xac dinh cac gia tri can cho chuc nang loc
		$data['event']							= $this->m_event;
		$data['txtf_customerid']				= $this->m_txtf_customerid;
		$data['txtf_cpassword']    				= $this->m_txtf_cpassword;
		$data['txtf_cemail']    				= $this->m_txtf_cemail;
		$data['txtf_chandphone']    			= $this->m_txtf_chandphone;
		$data['txtf_cfirstname']    			= $this->m_txtf_cfirstname;
		$data['txtf_cmiddlename']    			= $this->m_txtf_cmiddlename;
		$data['txtf_clastname']    				= $this->m_txtf_clastname;
		$data['txtf_caddress']    				= $this->m_txtf_caddress;
		

		$data['txtf_user01']    				= $this->m_txtf_user01;
		$data['txtf_ddate01']    				= $this->m_txtf_ddate01;
		
		$data['gen_cbo_status']					= Fget_combobox_yes_no('','txtf_nstatus',$this->m_txtf_nstatus,'width:90px',$this->lang->line('lbl.0000.Yes'),$this->lang->line('lbl.0000.No'));
			
		// Xac dinh mang du lieu de hien thi tren view
		$data['data_view']         				= $this->m_obj_data_view;
		$data['menu'] = Fget_menu_html($this->m_nid_user_login);
		
		//Kiem tra neu la truong hop xuat excel thi chay ham goi export_excel va dung lai
		
		// Load view tuong ung voi su kien m_event.
		$data['event'] 			= $this->m_event;
	
		$data['menu_active']		= 'customer';
		
		$this->load->view('customer_view/index.php',$data);
		
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
		$str_result = ' WHERE nid is not null AND niduser01 = '.$this->m_nid_user_login;
		if ($this->m_txtf_user01 != '')
			$str_result = $str_result . ' AND cfullname like "%' . trim($this->m_txtf_user01) . '%" ';	
		if ($this->m_txtf_ddate01 != '')
			$str_result = $str_result . ' AND ddate01 = "' . Fget_strdate($this->m_txtf_ddate01) . '" ';
		if ($this->m_txtf_customerid != '')
			$str_result = $str_result . ' AND customerid like "%' . trim($this->m_txtf_customerid) . '%" ';

		if ($this->m_txtf_cpassword != '')
			$str_result = $str_result . ' AND cpassword like "%' . trim($this->m_txtf_cpassword) . '%" ';

		if ($this->m_txtf_cemail != '')
			$str_result = $str_result . ' AND cemail like "%' . trim($this->m_txtf_cemail) . '%" ';

		if ($this->m_txtf_chandphone != '')
			$str_result = $str_result . ' AND chandphone like "%' . trim($this->m_txtf_chandphone) . '%" ';
			
		if ($this->m_txtf_cfirstname != '')
			$str_result = $str_result . ' AND cfirstname like "%' . trim($this->m_txtf_cfirstname) . '%" ';
			
		if ($this->m_txtf_cmiddlename != '')
			$str_result = $str_result . ' AND cmiddlename like "%' . trim($this->m_txtf_cmiddlename) . '%" ';
			
		if ($this->m_txtf_clastname != '')
			$str_result = $str_result . ' AND clastname like "%' . trim($this->m_txtf_clastname) . '%" ';
			
		if ($this->m_txtf_caddress != '')
			$str_result = $str_result . ' AND caddress like "%' . trim($this->m_txtf_caddress) . '%" ';

		if ($this->m_txtf_nstatus != '')
			$str_result = $str_result . ' AND nstatus like "%' . trim($this->m_txtf_nstatus) . '%" ';
		
			  
		
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
		{
			if($this->checkvalid_delete($nid))						
			{
				$this->customer_model->delete_byid($nid);	
			}
		}
	}
			
}		


// End do_news_listview class
}	
// End of file do_news_listview.php
// Location: controllers/do_news_listview.php
