<?php
class products extends Controller
{
    var $event = '';
    var $obj_products = '';
    var $m_language = 'eng';
    var $ccode_sec = '';
    var $ccode_cat = '';
    var $title = '';
    var $tags = '';
    var $description = '';
    var $ncurr_page = '';
    var $nrow_per_page = '48';
    var $ntotal_page = '';
    var $ntotal_row = 0;
	var $type_view = '';
	var $type_sort = '';
	var $langsite = '';
	
    function products()
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
	function set_page($type_view, $type_sort, $page)
    {
		$this->type_view = $type_view;
		$this->type_sort = $type_sort;
        $this->ncurr_page = $page;
        $this->do_process();
    }
	function set_page_sec($ccode_sec, $type_view, $type_sort, $page)
    {
		//exit($ccode_sec. $type_view. $type_sort. $page);
		$this->ccode_sec = $ccode_sec;
		$this->type_view = $type_view;
		$this->type_sort = $type_sort;
        $this->ncurr_page = $page;
		$this->event  = 'list_sec';
        $this->do_process();
    }
	function set_page_cat($ccode_sec, $ccode_cat, $type_view, $type_sort, $page)
    {
		//exit($ccode_sec. $ccode_cat. $type_view. $type_sort. $page);
       // exit('a');
		$this->ccode_sec = $ccode_sec;
		$this->ccode_cat = $ccode_cat;
		$this->type_view = $type_view;
		$this->type_sort = $type_sort;
        $this->ncurr_page = $page;
		$this->event  = 'list_cat';
        $this->do_process();
    }
    private function f_set_cookie($cookie_name, $cookie_value)
    {
        return dbset_cookie('cookie_products_' . $cookie_name, $cookie_value);
    }
    private function f_get_cookie($cookie_name)
    {
        return dbget_cookie('cookie_products_' . $cookie_name);
    }
    private function m_language_key($str_key)
    {
        return $this->lang->line('lbl.products.' . $str_key);
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
    private function get_data()
    {
		$lang_ = 'eng';
		if (isset($_SESSION['_lang']))
			$lang_ = $_SESSION['_lang'];
		$this->load->language('ap', $lang_);
		$this->langsite = $lang_;
    }
    private function caculate_data()
    {
        $this->load->language('ap', $this->m_language);
        if ($this->ncurr_page == '' OR $this->ncurr_page < 0)
            $this->ncurr_page = 1;
		if($this->type_view == '0')
			$this->nrow_per_page = '10';
		if ($this->ccode_sec == 'khuyen-mai')
			$trow = get_count_product_km();
		else if ($this->ccode_sec == 'hang-moi')
			$trow = get_count_product_hang_moi();
        else if ($this->event == 'list_cat') {
            $trow = get_count_product_cat($this->ccode_cat);
        } else if ($this->event == 'list_sec') {
            $trow = get_count_product_sec($this->ccode_sec);
        } else {
			redirect(base_url());
			$trow = get_count_product();
		}
        $this->ntotal_row = $trow;	
        $this->ntotal_page = round($trow / $this->nrow_per_page + 0.4);
		//exit($this->ntotal_row.'-'.$this->ntotal_page);
    }
    private function do_business()
    {
        //$this->output->cache(10);
		$this->title = "Products";
        $data['title']        = $this->title;
        $data['tags']         = $this->tags;
        $data['description']  = $this->description;
        $data['ccode_cat']       = $this->ccode_cat;
        $data['ccode_sec']       = $this->ccode_sec;
        $data['menu_sec']     = '';
        $data['menu_cat']     = '';
        $data['ncurr_page']    = $this->ncurr_page;
        $data['nrow_per_page'] = $this->nrow_per_page;
        $data['ntotal_page']   = $this->ntotal_page;
        $data['total_row']    = $this->ntotal_row;
        //$data['menu_top']     = $this->ccode_cat;
		$data['type_view']    = $this->type_view;
		$data['type_sort']    = $this->type_sort;
        $data['g_ishome']     = 0;
		$data['menu_top'] = "products";
		$data['langsite']    = $this->langsite;
		if ($this->ccode_sec == 'khuyen-mai') {
			$data['title']       = "Khuyến mãi";
			$this->load->view('list_km', $data);
		}
		else if ($this->ccode_sec == 'hang-moi') {
			$data['title']       = "Hàng mới";
			$this->load->view('list_hang_moi', $data);
		}
        else if ($this->event == 'list_cat') {
            $obj_cat             = get_product_cat_byid($this->ccode_cat);
			if($obj_cat == NULL)
				redirect(base_url().'page_not_found');

			$obj_sec             = get_product_sec_byid($this->ccode_sec);

            $data['title']       = $obj_cat['ccat_products'];
			$data['title_sec']   = $obj_sec['cmaterial_products'];
            $data['tags']        = $obj_cat['ctag'];
            $data['description'] = $obj_cat['cnote'];
			$data['description_fb'] = $obj_cat['cdesc'];
            $data['obj_cat']     = $obj_cat;
			$data['obj_sec']     = $obj_sec;
            $this->load->view('list_cat', $data);//exit($this->ccode_cat);
        } else if ($this->event == 'list_sec') {
			$obj_sec             = get_product_sec_byid($this->ccode_sec);
			if($obj_sec == NULL)
				redirect(base_url().'page_not_found');
            $data['title']       = $obj_sec['cmaterial_products'];
            $data['tags']        = $obj_sec['ctag'];
            $data['description'] = $obj_sec['cnote'];
            $data['obj_sec']     = $obj_sec;
            $this->load->view('list_sec', $data);
        } else {
			$this->load->view('products', $data);
		}
			
            
    }
    private function destroy_data()
    {
    }
    private function get_where_guide_string()
    {
        $str = 'where nstatus = "1"';
        return $str;
    }
}