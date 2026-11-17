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
 * do_news class
 *
 * Quan ly them, sua thong tin danh muc quan huyen
 *
 * @subpackage	controllers
 * @category	
 * @author		Cao An Phu 
 *------------------------------------------------------------------
 */     
class do_customer extends CI_Controller  
{
//He thong	
	var $m_language 		= ''; // nhan ngon ngu tu file language
	var $m_nid_user_login 	= ''; // nhan iduser tu session

	var $m_nid 				= ''; // nhan nid cua phuong xa can chinh sua
	var $m_event			= ''; // nhan su kien cap nhat hoac bo qua
	var $m_button_click		= ''; // nhan su kien tu hidden button o trang ap_news
	
	var	$m_link_page  		= ''; // nhan link cua su kien
	var $m_link_cancel 		='';  // link toi trang ap_news_listview

	var $m_form_title 		= ''; // tieu de cua form
	var $m_hidden_image_old = ''; // giu lai duong dan cua hinh anh cu

// Nhung bien dung cho doi tuong.			  
	var $m_txt_ccode			  	= '';// dai dien cho bien ccode
	var $m_txt_customerid			= '';
	var $m_txt_cpassword			= '';
	var $cname				= '';
	var $cphone			= '';
	var $cma_so_thue			= '';
	var $m_txt_cmiddlename			= '';
	var $m_txt_clastname			= '';
	var $caddress				= '';
	var $m_txt_nstatus				= '';
	var $m_txt_user01				= '';
	var $m_txt_ddate01				='';
	var $m_obj_data_view    		= '';
	
	
	
	// Cac bien can xuat hien thi thong bao len view cho nguoi dung xem.
	var $m_error_msg 	    		= ''; 
	var $m_link_cancel_trans	= '';
	
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
		//Load cac thu vien he thong.
		$this->load->database();
		
		$this->load->helper('ap_db');	
		$this->load->helper('ap_function');
		$this->load->helper('ap_html');
		$this->load->helper('ap_view');
		$this->load->helper('ap_object');
		//$this->load->helper('ap_fck'); // load thu vien de xuat ra trinh soan thao van ban
				
		// Kiem tra dieu kien login theo ma so he thong 1
		$this->tokaban_system_check = '1';
		// Load cac thu vien rieng can thiet khac neu co
		$this->load->model('customer_model');
		
		//init_fck();
		
	}
	
	/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com

 * @finished date	: 2009/12/13
 * @description		: Lay nid tu view ap_news_listview
 * @access	        : public
 *
 * @param string	: $nid   : truong khoa chinh cua tnews
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
	
//Function Set Cookies
private function f_set_cookie($cookie_name,$cookie_value)
 { 
	return dbset_cookie('cookie_customer_'.$cookie_name,$cookie_value);
 }
//Get Cookie

private function f_get_cookie($cookie_name)
 { 
	return dbget_cookie('cookie_customer_'.$cookie_name);
 }
/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com

 * @finished date	: 2009/12/13
 * @description		: Lay nid tu view ap_news_listview
 * @access	        : public
 *
 * @param string	: $nid   : truong khoa chinh cua tnews
 *                  : 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
function f_edit($nid) // ham chinh sua, tham so la nid cua phuong xa can chinh sua
	{
		$this->m_event = 'edit';
		$this->m_nid   = $nid;		 	
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
 *                  : 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
function f_update_edit() // ham update cac thong tin da chinh sua
	{	
		$this->m_event = 'update_edit';		
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
 *                  : 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
function f_add() // ham them phuong xa
	{				
		$this->m_event 	= 'add';
		$this->m_nid 	= '0';
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
 *                  : 
 * @return string	: None
 *-------------------------------------------------------------------
 * @editor   	    : 
 * @finished date	: 
 * @editing content	: 
 *-------------------------------------------------------------------
 */		
function f_update_add() // ham cap nhat thong tin cua phuong xa moi can tao
	{		
		$this->m_event = 'update_add';
		$this->do_process();
				
	}
	
	
	
/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com

 * @finished date	: 2009/11/11
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
function do_process() // ham xu ly
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
		
		if (isset($_POST['cname']))
		{
			//$this->m_txt_customerid			 	= trim($_POST['txt_customerid']);
			//$this->m_txt_cpassword		 		= trim($_POST['txt_cpassword']);
			$this->cname		 			= trim($_POST['cname']);
			$this->cphone	 			= trim($_POST['cphone']);
			$this->cma_so_thue		 		= trim($_POST['cma_so_thue']);
			//$this->m_txt_cmiddlename			= trim($_POST['txt_cmiddlename']);
			//$this->m_txt_clastname	 			= trim($_POST['txt_clastname']);
			$this->caddress	 			= trim($_POST['caddress']);

			//$this->m_txt_nstatus	 			= trim($_POST['txt_nstatus']);
			
			
		}
// Kiem tra va nhan cac bien hidden neu co.
		if (isset($_POST['hidden_nid']))
			$this->m_nid 			= $_POST['hidden_nid'];
			
		if (isset($_POST['hidden_event']))
			$this->m_event			= $_POST['hidden_event'];
			
		if (isset($_POST['hidden_button']))
			$this->m_button_click	= $_POST['hidden_button'];
	
			
	}
		

/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com

 * @finished date	: 2009/12/13
 * @description		: Tinh toan du lieu
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
// Link khi click nut cancel
		$this->m_link_page 	= base_url() . 'index.php/do_customer/f_update_edit';	
		$this->m_link_cancel = base_url() . 'index.php/do_customer_listview';		
		
		switch ($this->m_event)
		{
			case 'edit':	
				$this->m_form_title = $this->m_language_key('FormEditTitle');
				$this->m_link_page 	= base_url() . 'index.php/do_customer/f_update_edit';	

				$cus = $this->customer_model->get_byid($this->m_nid);

		
			//$this->m_txt_customerid		 		= $cus['customerid'];
			//$this->m_txt_cpassword 				= Obj_get_password_normal();
			$this->cname		 			= $cus['cname'];
			$this->cphone	 			= $cus['cphone'];
			$this->cma_so_thue		 		= $cus['cma_so_thue'];
			//$this->m_txt_cmiddlename			= $cus['cmiddlename'];
			//$this->m_txt_clastname	 			= $cus['clastname'];
			$this->caddress	 			= $cus['caddress'];

			//$this->m_txt_nstatus	 			= $cus['nstatus'];
		


				$this->m_event 	= 'update_edit';
				break;
			case 'add':
				$this->m_form_title = $this->m_language_key('FormAddTitle');
				$this->m_event 	= 'update_add';
				break;
			case 'update_edit':
				$this->m_form_title = $this->m_language_key('FormEditTitle');
				if ($this->m_button_click == 'btn_submit')
				if ($this->update_data()==TRUE)
							redirect ('do_customer_listview');
				
				
				
				$this->m_link_page 	= base_url() . 'index.php/do_customer/f_update_edit';
				break;
			
			case 'update_add':
				$this->m_form_title = $this->m_language_key('FormAddTitle');
				if ($this->m_button_click == 'btn_submit')
						if ($this->insert_data()==TRUE)
							redirect ('do_customer_listview');
						
				
				$this->m_link_page 	= base_url() . 'index.php/do_customer/f_update_add';
			
					break;
		}		
		
		
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
//He thong					
		$data['event'] 				= $this->m_event;
		$data['menu'] 				= Fget_menu_html($this->m_nid_user_login);
		$data['lbl_form_title'] 	= $this->m_form_title;
		
		$data['link_page'] 			= $this->m_link_page;
		$data['link_cancel'] 		= $this->m_link_cancel;		
		$data['link_cancel_trans'] 	= $this->m_link_cancel_trans;
// Ten cac button		
		$data['btn_update'] 		= $this->lang->line('btn.0000.Update');
		$data['btn_cancel'] 		= $this->lang->line('btn.0000.Cancel');
	

// Ky hieu dung de xac dinh cac truong thong tin khong duoc phep thieu.
		$data['get_icon_notnull']   	= Fget_icon_notnull();		
		$data['get_message_notnull']   	= Fget_icon_notnull() . $this->lang->line('msg.0000.NotNullValue');;
		
//lbl_form
		//$data['lbl_form_title'] 		= $this->m_form_title;
		$data['lbl_title'] 	        	= $this->m_language_key('title');
		$data['lbl_customerid']		 	= $this->m_language_key('customerid');
		$data['lbl_cpassword'] 	  		= $this->m_language_key('cpassword');
		$data['lbl_cname'] 	     	= $this->m_language_key('cname');
		$data['lbl_cphone'] 	    = $this->m_language_key('cphone');
		$data['lbl_cma_so_thue'] 	    = $this->m_language_key('cma_so_thue');
		$data['lbl_cmiddlename'] 	    = $this->m_language_key('cmiddlename');
		$data['lbl_clastname'] 		    = $this->m_language_key('clastname');
		$data['lbl_caddress'] 	  		= $this->m_language_key('caddress');
		$data['lbl_nstatus']	 	    = $this->m_language_key('nstatus');

// lbl err
		$data['lbl_error_msg']			=$this->m_error_msg;

//Bien doi tuong 
		$data['txt_customerid']				= $this->m_txt_customerid;
		$data['txt_cpassword']    			= $this->m_txt_cpassword;
		$data['cname']    				= $this->cname;
		$data['cphone']    			= $this->cphone;
		$data['cma_so_thue']    			= $this->cma_so_thue;
		$data['txt_cmiddlename']    		= $this->m_txt_cmiddlename;
		$data['txt_clastname']    			= $this->m_txt_clastname;
		$data['caddress']    			= $this->caddress;
	
			
		$data['gen_cbo_status']				= Fget_combobox_yes_no('no','txt_nstatus',$this->m_txt_nstatus,'width:150px',$this->lang->line('lbl.0000.Yes'),$this->lang->line('lbl.0000.No'));
		
//Truyen bien nid cho view
		$data['nid']						=$this->m_nid;
	
		
		

		$data['menu_active']		= 'customer';
	
// Load view voi su kien tuong ung.
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
 |====================================================================
 | DANH SACH CAC HAM DINH NGHIA THEM
 |====================================================================
 */
private function check_valid_not_null()
	{
		
		// Kiem tra truong title khong rong
		/*
		if($this->m_txt_customerid == '')
		{
			$this->m_error_msg	= $this->m_language_key('customerid') . $this->lang->line('msg.0000.ErorNotNull');
			return FALSE;
		}
		*/

		return TRUE;
	}
/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com

 * @finished date	: 2009/12/13
 * @description		: Kiem tra du lieu truoc khi insert
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
private function check_valid_before_insert()
	{
	
		if ($this->check_valid_not_null()== FALSE)
		{
			return FALSE;
		}
		/*
		if (fbcheck_exists_key_addnew('tcustomer', 'customerid',$this->m_txt_customerid)==FALSE)
		{
			$this->m_error_msg	 	= $this->m_language_key('customerid') . $this->lang->line('msg.0000.ErorDoubleKey');
			return FALSE;		
		}
		*/
		return TRUE;		
	}

/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com

 * @finished date	: 2009/12/13
 * @description		: Insert du lieu vao tnews
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
private function insert_data()
	{
	
		if ($this->check_valid_before_insert()== TRUE)
		{
			
		$data =	array(	
  						//'customerid'				=> $this->m_txt_customerid,
						//'cpassword' 				=> Fget_encode($this->m_txt_cpassword),
						'cname'					=> $this->cname,
						'cphone'				=> $this->cphone,
						'cma_so_thue'				=> $this->cma_so_thue,
						//'cmiddlename'				=> $this->m_txt_cmiddlename,
						//'clastname'					=> $this->m_txt_clastname,
						'caddress'					=> $this->caddress,
						'nstatus'					=> 1,		
						'niduser01'     			=> $this->m_nid_user_login,
						'ddate01'					=> dbget_current_date()
						);
		
		// Goi phuong thuc cap nhat thong tin vao database.	
		$this->customer_model->insert($data);
		return TRUE;
		}
		else
		{
			return FALSE;
		}
	}


/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com

 * @finished date	: 2009/12/13
 * @description		: Kiem tra du lieu truoc khi update
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
private function check_valid_before_update()
	{
		if ($this->check_valid_not_null()== FALSE)
			return FALSE;

		/*
		if (fbcheck_exists_key_update('tcustomer', 'customerid',$this->m_txt_customerid, $this->m_nid)==FALSE)
		{
		
			$this->m_error_msg	 	= $this->m_language_key('customerid') . $this->lang->line('msg.0000.ErorDoubleKey');

			return FALSE;		
		}
		*/
		return TRUE;
	}

/**
 *-------------------------------------------------------------------
 * @creator 		: Cao An Phu - phu_ca86@tokaban.com

 * @finished date	: 2009/12/13
 * @description		: Update du lieu vao tnews
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
private function update_data()
	{
		if ($this->check_valid_before_update()==TRUE)
		{
			if (trim(Obj_get_password_normal())!=$this->m_txt_cpassword)	
				$data =	array(	
  						//'customerid'				=> $this->m_txt_customerid,
						//'cpassword'					=> Fget_encode($this->m_txt_cpassword),
						'cname'					=> $this->cname,
						'cphone'				=> $this->cphone,
						'cma_so_thue'				=> $this->cma_so_thue,
						//'cmiddlename'				=> $this->m_txt_cmiddlename,
						//'clastname'					=> $this->m_txt_clastname,
						'caddress'					=> $this->caddress,
						//'nstatus'					=> $this->m_txt_nstatus,		
						//'niduser01'     			=> $this->m_nid_user_login,
						//'ddate01'					=> dbget_current_date()
						);
			else
				$data =	array(	
  						//'customerid'				=> $this->m_txt_customerid,
						'cname'					=> $this->cname,
						'cphone'				=> $this->cphone,
						'cma_so_thue'				=> $this->cma_so_thue,
						//'cmiddlename'				=> $this->m_txt_cmiddlename,
						//'clastname'					=> $this->m_txt_clastname,
						'caddress'					=> $this->caddress,
						//'nstatus'					=> $this->m_txt_nstatus,		
						//'niduser01'     			=> $this->m_nid_user_login,
						//'ddate01'					=> dbget_current_date()
						);
			$this->customer_model->update_bynid($this->m_nid, $data);		
			return TRUE; 
		}
		else
		{
			return FALSE;
		}
	}

}


// End do_news class
	
// End of file do_news.php
// Location: controllers/do_news.php




