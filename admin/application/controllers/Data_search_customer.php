<?php	if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Tokaban Standard System
 *
 * Tokaban framework for PHP
 *
 * @package		ap_standard_system
 * @author		Tokaban R&D Team
 * @copyright	Copyright (c) 2009, Tokaban, Inc.
 * @since		Version 2.0
 *  
 */
  
// ------------------------------------------------------------------------
class data_search_customer extends CI_Controller 
{
	var $m_language 		= ''; 
	var $m_nid_user_login 	= ''; 
	
	var $m_event			= 'view';
		
	var $m_action			= ''; 	 
	var $m_frm_link_to_		= ''; 

	var $m_txt_user_name	= ''; 
	var $m_txt_password		= ''; 
	// ------------------------------------------------------------------------
	
/**
 * Constructor
 *
 * Load cac thu vien can su dung cho class
 *
 * @access	public
 */	
function __construct()
	{ 

		parent::__construct();  
		session_start();
		$this->load->database();
		$this->load->helper('ap_function');
		$this->load->helper('ap_db');
		$this->load->helper('ap_html');	
		$this->load->helper('ap_object');
		//$this->load->helper('ap_module');
		$this->tokaban_system_check = '1';  
	}
	
	// ------------------------------------------------------------------------
	
/**
 * Goi tuan tu cac ham theo dung quy dinh ve luong du lieu
 * 
 * @access	public
 */		
function index()
	{
		$this->get_data(); 
		$this->caculate_data(); 
		$this->do_business();
		$this->destroy_data();
	}		
	
	// ------------------------------------------------------------------------
	
/**
 * Khong can xu ly
 *
 * @access	private
 */	
private function get_data()
	{
		$this->m_nid_user_login = Fget_userdata('session_nid_user');
		$this->m_language = Fget_userdata('session_user_language');	
		// Load file ngon ngu can su dung.
		$this->load->language('ap', $this->m_language);
		
		// Your code at here		
	}

	// ------------------------------------------------------------------------
	
/**
 * Khong can xu ly
 *
 * @access	private
 */		
private function caculate_data()
	{
		// Your code at here				
	}
	
// ------------------------------------------------------------------------

/**
 * Thiet lap cac session dung chung cho toan he thong 
 * Redirect do_login controller
 *
 * @access	private
 */
private function do_business()
	{				 
		/*$data['view'] = 'sell';
		$data['password'] = Fget_userdata('session_user_full_name');		
		$data['user_fullname'] = Fget_userdata('session_user_full_name');
		$data['user_encode'] = Obj_get_encode($str);
		$data['user_decode'] = Obj_get_decode(Obj_get_encode($str));*/
		$data['menu'] = Fget_menu_html($this->m_nid_user_login);
		$data['nid_user'] = $this->m_nid_user_login;
		$data['menu_active']	= 'sell';
		$data['event'] = $this->m_event;
		$data['fr_img']                      = Fstr_replace('adminAM!/', '', base_url());
	
		$this->load->view('sell_view/data_search_customer', $data);
	}
		
	// ------------------------------------------------------------------------
	
/**
 * Khong can xy ly
 *
 * @access	private
 */			
private function destroy_data()
	{
	
	}

// END do_init class		
}		
/* End of file do_init.php */
/* Location: controller/do_init.php */