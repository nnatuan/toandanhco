<?php 
class get_json extends CI_Controller {

var $event 				= '';
var	$obj_detail			='';
var $m_language			='eng';

var $nid		= '';
var $nid_cat			= '';

var	$title					= '';
var	$tags					= '';
var	$description			= ''; 
var	$shopid			= ''; 
var	$token			= ''; 

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
		//$this->load->helper('ap_module');		
		
		$nbh = get_setting_by_user(Fget_userdata('session_nid_user'));
		$this->shopid = $nbh['shopid'];
		$this->token = $nbh['token'];
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
function get_shop_info()
    { 
		$url = 'https://online-gateway.ghn.vn/shiip/public-api/v2/shop/all';
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"shopid: ".$this->shopid,
			"token: ".$this->token
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		//$data = '{"nid":"John"}';
		//$product = get_news_by_id(491);
		//$product = get_product_all();
		
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  exit($response);
		  /*
		  exit(json_encode($response));
		  exit(json_encode($product));
		  exit($data);
		  exit(json_encode($data));
		  */
		}
	}
function get_province()
    { 
		$url = 'https://online-gateway.ghn.vn/shiip/public-api/master-data/province';
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"shopid: ".$this->shopid,
			"token: ".$this->token
			//"token: d4717513-d13c-11ee-8586-12380ed2f541"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		//$data = '{"nid":"John"}';
		//$product = get_news_by_id(491);
		//$product = get_product_all();
		
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  exit($response);
		  /*
		  exit(json_encode($response));
		  exit(json_encode($product));
		  exit($data);
		  exit(json_encode($data));
		  */
		}
	}
function get_district()
    { 
		$url = 'https://online-gateway.ghn.vn/shiip/public-api/master-data/district?province_id='.$_POST['nid_province'];
		//exit($_POST['nid_province']);
		//$arr = ['province_id' => 202];
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  //CURLOPT_POSTFIELDS => $arr,
		  CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"shopid: ".$this->shopid,
			"token: ".$this->token
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		//$data = '{"nid":"John"}';
		//$product = get_news_by_id(491);
		//$product = get_product_all();
		
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  exit($response);
		  /*
		  exit(json_encode($response));
		  exit(json_encode($product));
		  exit($data);
		  exit(json_encode($data));
		  */
		}
	}	
function get_ward()
    { 
		$url = 'https://online-gateway.ghn.vn/shiip/public-api/master-data/ward?district_id='.$_POST['nid_district'];
		//$arr = ['district_id' => $_POST['nid_district']];
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  //CURLOPT_POSTFIELDS => $arr,
		  CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"shopid: ".$this->shopid,
			"token: ".$this->token
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		//$data = '{"nid":"John"}';
		//$product = get_news_by_id(491);
		//$product = get_product_all();
		
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  exit($response);
		  /*
		  exit(json_encode($response));
		  exit(json_encode($product));
		  exit($data);
		  exit(json_encode($data));
		  */
		}
	}
function tinh_phi_ghn()
    { 
		//$par = '?service_type_id=2'.'&to_district_id='.$_POST['to_district_name'].'&to_ward_code='.$_POST['to_ward_name'].'&height='.$_POST['height'].'&length='.$_POST['length'].'&weight='.$_POST['weight'].'&width='.$_POST['width'];
		//$url = 'https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/fee'.$par;
		
		$par = array(
			"service_type_id" => 2,
			"to_district_id" => $_POST['to_district_name'],
			"to_ward_code" => $_POST['to_ward_name'],
			"height" => $_POST['height'],
			"length" => $_POST['length'],
			"weight" => $_POST['weight'],
			"width" => $_POST['width']
		);
		$url = 'https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/fee?'.http_build_query($par);
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  //CURLOPT_POSTFIELDS => $arr,
		  CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"shopid: ".$this->shopid,
			"token: ".$this->token
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		//$data = '{"nid":"John"}';
		//$product = get_news_by_id(491);
		//$product = get_product_all();
		
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  exit($response);
		  /*
		  exit(json_encode($response));
		  exit(json_encode($product));
		  exit($data);
		  exit(json_encode($data));
		  */
		}
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
	
	$data['menu_top']		= "get_json";
	$data['g_ishome']		= 0;

	$this->load->view('get_json',$data);	
}
	
private function destroy_data()
{
			
}
private function get_where_get_json_string()
{
		

		return $str ;
}

}