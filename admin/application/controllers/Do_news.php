<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class do_news extends CI_Controller
{
    var $m_language = '';
    var $m_nid_user_login = '';
    var $m_nid = '';
    var $m_event = '';
    var $m_button_click = '';
    var $m_link_page = '';
    var $m_link_cancel = '';
    var $m_form_title = '';
    var $m_hidden_image_old = '';
    var $m_hidden_image_old_fb = '';
    var $m_hidden_image_old_iphone = '';
    var $m_txt_nid = '';
    var $m_txt_ctitle = '';
    var $clink = '';
    var $m_txt_ctag = '';
    var $m_txt_cindex = '';
    var $m_txt_cthumb_img = '';
    var $m_txt_cfb_img = '';
    var $m_txt_ciphone_img = '';
    var $m_cbof_nid_cat_news = '';
    var $m_cbof_nid_section_news = 6;
    var $m_txt_cshort_content = '';
    var $m_txt_ccontent = '';
    var $m_arr_new = '';
    var $m_chk_alwcmt = '';
    var $m_obj_section_news_view = '';
    var $m_obj_cat_news_view = '';
    var $m_error_ccontent = '';
    var $m_error_ctitle = '';
    var $m_error_cshort_content = '';
    var $eng_ctitle = '';
    var $eng_cshort_content = '';
    var $eng_ccontent = '';
    var $ckeword_tag = '';
    var $cpost_date = '';
	var $cproduct_str_id = '';
    var $ccode = '';
	
    function __construct()
	{
		parent::__construct();
        session_start();
        $this->load->database();
        $this->load->helper('ap_db');
        $this->load->helper('ap_function');
        $this->load->helper('ap_html');
        $this->load->helper('ap_view');
        $this->load->helper('ap_object');       
        $this->tokaban_system_check = '1';
        $this->load->model('news_model');
        $this->load->model('cat_news_model');
    }
    private function m_language_key($str_key)
    {
        return $this->lang->line('lbl.news.' . $str_key);
    }
    private function f_set_cookie($cookie_name, $cookie_value)
    {
        return dbset_cookie('cookie_news_listview_' . $cookie_name, $cookie_value);
    }
    private function f_get_cookie($cookie_name)
    {
        return dbget_cookie('cookie_news_listview_' . $cookie_name);
    }
    function f_edit($nid)
    {
        $this->m_event = 'edit';
        $this->m_nid   = $nid;
        $this->do_process();
    }
    function f_update_edit()
    {
        $this->m_event = 'update_edit';
        $this->do_process();
    }
    function f_add()
    {
        $this->m_event = 'add';
        $this->m_nid   = '0';
        $this->do_process();
    }
    function f_update_add()
    {
        $this->m_event = 'update_add';
        $this->do_process();
    }
    function do_process()
    {
        $this->get_data();
        $this->caculate_data();
        $this->do_business();
        $this->destroy_data();
    }
	private function convert_webp($path)
    {
		$webp_img = webpConvert2($path);
		delfile($path);
		return(basename($webp_img));
	}
    private function get_data()
    {
        $this->m_nid_user_login = Fget_userdata('session_nid_user');
        //$this->load->language('ap', 'vni');
        if (isset($_FILES["txt_cthumb_img"])) {
            $path                   = './upload/image_article/';
            $this->m_txt_cthumb_img = Fupload_resize_img($_FILES["txt_cthumb_img"], '../' . $path, 2000, 2000);
			//if($this->m_txt_cthumb_img!="")
			//	$this->m_txt_cthumb_img = $this->convert_webp('../' . $path. $this->m_txt_cthumb_img);
        }
        if (isset($_POST['ckeword_tag']))
            $this->ckeword_tag = trim($_POST['ckeword_tag']);
        if (isset($_POST['cpost_date']))
            $this->cpost_date = trim($_POST['cpost_date']);
		if (isset($_POST['cproduct_str_id']))
            $this->cproduct_str_id = trim($_POST['cproduct_str_id']);
        if (isset($_FILES["txt_cfb_img"])) {
            $path                = './upload/fbthumb/';
            $this->m_txt_cfb_img = Fupload_resize_img($_FILES["txt_cfb_img"], '../' . $path, 100, 100);
        }
        if (isset($_FILES["txt_ciphone_img"])) {
            $path                    = './upload/ios/';
            $this->m_txt_ciphone_img = Fupload_resize_img($_FILES["txt_ciphone_img"], '../' . $path, 80, 80);
        }
        if (isset($_POST['eng_ctitle']))
            $this->eng_ctitle = $_POST['eng_ctitle'];
        if (isset($_POST['eng_cshort_content']))
            $this->eng_cshort_content = $_POST['eng_cshort_content'];
        if (isset($_POST['eng_ccontent']))
            $this->eng_ccontent = $_POST['eng_ccontent'];
         if (isset($_POST['ccode']))
            $this->ccode = $_POST['ccode'];
            
        if (isset($_POST['txt_ctitle'])) {
            $this->m_txt_ctitle  = $_POST['txt_ctitle'];
            $this->clink = $_POST['clink'];
//            $this->m_txt_ctag    = $_POST['txt_ctag'];
            $this->m_txt_cindex  = $_POST['txt_cindex'];
            if (!empty($_POST['chk_alwcmt']))
                $this->m_chk_alwcmt = 1;
            else
                $this->m_chk_alwcmt = 0;
            $this->m_txt_cshort_content = $_POST['txt_cshort_content'];
            $this->m_txt_ccontent       = $_POST['txt_ccontent'];
        }
		
		if (isset($_POST['cbof_nid_cat_news']))
            $this->m_cbof_nid_cat_news = $_POST['cbof_nid_cat_news'];
        if (isset($_POST['hidden_nid']))
            $this->m_nid = $_POST['hidden_nid'];
        if (isset($_POST['hidden_event']))
            $this->m_event = $_POST['hidden_event'];
        if (isset($_POST['hidden_button']))
            $this->m_button_click = $_POST['hidden_button'];
        if (isset($_POST['hidden_image_old']))
            $this->m_hidden_image_old = $_POST['hidden_image_old'];
        if (isset($_POST['hidden_image_old_fb']))
            $this->m_hidden_image_old_fb = $_POST['hidden_image_old_fb'];
        if (isset($_POST['hidden_image_old_iphone']))
            $this->m_hidden_image_old_iphone = $_POST['hidden_image_old_iphone'];
    }
    private function caculate_data()
    {
        $this->m_link_cancel       = base_url() . 'index.php/do_news_listview';
        $this->m_link_cancel_trans = base_url() . 'index.php/do_news_listview/f_list_trans/' . $this->f_get_cookie('nid_news_org');
        $id_org_news               = $this->f_get_cookie('nid_news_org');
        switch ($this->m_event) {
            case 'edit':
                $this->m_form_title         = $this->m_language_key('FormEditTitle');
                $this->m_link_page          = base_url() . 'index.php/do_news/f_update_edit';
                $this->m_arr_new            = $this->news_model->get_new_byid($this->m_nid);
                $news                       = $this->news_model->get_byid($this->m_nid);
                $this->m_txt_cthumb_img     = $news['cimage_thumb'];
                $this->m_txt_cfb_img        = $news['cimage_fb'];
                $this->m_txt_ciphone_img    = $news['cimage_iphone'];
                $this->m_txt_ctitle         = $news['ctitle'];
                $this->clink        = $news['clink'];
                $this->m_txt_ctag           = $news['ctag'];
                $this->m_txt_cindex         = $news['cindex'];
                $this->m_cbof_nid_cat_news  = $news['nid_cat_news'];
                $this->m_chk_alwcmt         = $news['alwcmt'];
                $this->m_txt_cshort_content = $news['cshort_content'];
                $this->m_txt_ccontent       = $news['ccontent'];
//                $this->eng_ctitle           = $news['eng_ctitle'];
//                $this->eng_cshort_content   = $news['eng_cshort_content'];
//                $this->eng_ccontent         = $news['eng_ccontent'];
//                $this->ckeword_tag          = $news['ckeword_tag'];
                $this->cpost_date     = $news['cpost_date'];
				$this->cproduct_str_id     = $news['cproduct_str_id'];
                $this->ccode     = $news['ccode'];
                
                $this->m_event              = 'update_edit';
                break;
            case 'add':
                $this->m_form_title = $this->m_language_key('FormAddTitle');
                $this->m_link_page  = base_url() . 'index.php/do_news/f_update_add';
                $this->m_event      = 'update_add';
                break;
            case 'update_edit':
                $this->m_form_title = $this->m_language_key('FormEditTitle');
                if ($this->m_button_click == 'btn_submit')
                    if ($this->update_data() == TRUE)
                        redirect('do_news_listview');
                $this->m_form_title = $this->m_language_key('FormEditTitle');
                $this->m_link_page  = base_url() . 'index.php/do_news/f_update_edit';
                break;
            case 'update_add':
                $this->m_form_title = $this->m_language_key('FormAddTitle');
                if ($this->m_button_click == 'btn_submit')
                    if ($this->insert_data() == TRUE)
                        redirect('do_news_listview');
                break;
            default: {
            }
        }
        $this->m_obj_cat_news_view = Obj_get_cat_news_by_nidsec(6);
    }
    private function do_business()
    {
        $data['event']               = $this->m_event;
        $data['menu']                = Fget_menu_html($this->m_nid_user_login);
        $data['lbl_form_title']      = $this->m_form_title;
        $data['link_page']           = $this->m_link_page;
        $data['link_cancel']         = $this->m_link_cancel;
        $data['btn_update']          = $this->lang->line('btn.0000.Update');
        $data['btn_cancel']          = $this->lang->line('btn.0000.Cancel');
        $data['lbl_tag']             = $this->lang->line('lbl.0000.Tag');
        $data['fr_img']              = Fstr_replace('admin/', '', base_url());
        $data['get_icon_notnull']    = Fget_icon_notnull();
        $data['get_message_notnull'] = Fget_icon_notnull() . $this->lang->line('msg.0000.NotNullValue');
        ;
        $data['nid']               = $this->m_nid;
        $data['lbl_form_title']    = $this->m_form_title;
        $data['lbl_nid']           = $this->m_language_key('nid');
        $data['lbl_image']         = $this->m_language_key('image');
        $data['lbl_image_fb']      = $this->m_language_key('image_fb');
        $data['lbl_image_iphone']  = $this->m_language_key('image_iphone');
        $data['lbl_title']         = $this->m_language_key('title');
        $data['lbl_author']        = $this->m_language_key('author');
        $data['lbl_cat']           = $this->m_language_key('cat');
        $data['lbl_index']         = $this->m_language_key('index');
        $data['lbl_section_news']  = $this->m_language_key('section_news');
        $data['lbl_short_content'] = $this->m_language_key('shortcontent');
        $data['lbl_content']       = $this->m_language_key('content');
        $data['lbl_status']        = $this->m_language_key('status');
        $data['lbl_lang']          = $this->m_language_key('lang');
        $data['lbl_first']         = $this->m_language_key('first');
        $data['lbl_alwcmt']        = $this->m_language_key('alwcmt');
       
        $data['gencbo_cat_news_list']    = Fgen_html_combobox('no', 'cbof_nid_cat_news', $this->m_cbof_nid_cat_news, '', $this->m_obj_cat_news_view, 'nid', 'ccat_news', 'nosubmit', '');
        $data['txt_ctitle']              = $this->m_txt_ctitle;
        $data['clink']             = $this->clink;
        $data['txt_ctag']                = $this->m_txt_ctag;
        $data['txt_cindex']              = $this->m_txt_cindex;
        $data['ckeword_tag']             = $this->ckeword_tag;
        $data['cpost_date']        = $this->cpost_date;
		$data['cproduct_str_id']        = $this->cproduct_str_id;
        $data['eng_ctitle']              = $this->eng_ctitle;
        $data['eng_cshort_content']      = $this->eng_cshort_content;
        $data['eng_ccontent']            = $this->eng_ccontent;
        $data['hidden_image_old']        = $this->m_hidden_image_old;
        $data['hidden_image_old_fb']     = $this->m_hidden_image_old_fb;
        $data['hidden_image_old_iphone'] = $this->m_hidden_image_old_iphone;
        if ($this->m_txt_cthumb_img != '')
            $data['txt_cthumb_img'] = $this->m_txt_cthumb_img;
        else
            $data['txt_cthumb_img'] = $this->m_hidden_image_old;
        if ($this->m_txt_cfb_img != '')
            $data['txt_cfb_img'] = $this->m_txt_cfb_img;
        else
            $data['txt_cfb_img'] = $this->m_hidden_image_old_fb;
        if ($this->m_txt_ciphone_img != '')
            $data['txt_ciphone_img'] = $this->m_txt_ciphone_img;
        else
            $data['txt_ciphone_img'] = $this->m_hidden_image_old_iphone;
        $data['chk_alwcmt']           = $this->m_chk_alwcmt;
        $data['txt_cshort_content']   = $this->m_txt_cshort_content;
        $data['txt_ccontent']         = $this->m_txt_ccontent;
        $data['error_ctitle']         = $this->m_error_ctitle;
        $data['ccode']         = $this->ccode;
        
        $data['error_ccontent']       = $this->m_error_ccontent;
        $data['error_cshort_content'] = $this->m_error_cshort_content;
        $data['menu_active']          = 'news';
        $this->load->view('news_view/index.php', $data);
    }
    private function destroy_data()
    {
    }
    private function check_valid_not_null()
    {
        if ($this->m_txt_ctitle == '') {
            $this->m_error_ctitle = $this->m_language_key('title') . $this->lang->line('msg.0000.ErorNotNull');
            return FALSE;
        }
        
        return TRUE;
    }
    private function check_valid_before_insert()
    {
        if ($this->check_valid_not_null() == FALSE)
            return FALSE;
        if (fbcheck_exists_key_addnew('tnews', 'ctitle', $this->m_txt_ctitle) == FALSE) {
            $this->m_error_ctitle = $this->m_language_key('title') . $this->lang->line('msg.0000.ErorDoubleKey');
            return FALSE;
        }
        return TRUE;
    }
    private function insert_data()
    {
   // exit($this->m_cbof_nid_cat_news.'asd');
        if ($this->check_valid_before_insert() == TRUE) {
            $data = array(
                'ctitle' => $this->m_txt_ctitle,
                'clink' => $this->clink,
                'ccode' => $this->ccode,
                
                'ctag' => $this->m_txt_ctag,
                'cindex' => $this->m_txt_cindex,
                'nstatus' => 1,
                'nactive' => 0,
              //  'chome' => 0,
                'cimage_thumb' => $this->m_txt_cthumb_img,
                'nid_cat_news' => $this->m_cbof_nid_cat_news,
			    //'nid_cat_news' => 54,
                'cimage_fb' => $this->m_txt_cfb_img,
                'cimage_iphone' => $this->m_txt_ciphone_img,
                'cshort_content' => $this->m_txt_cshort_content,
                'ccontent' => $this->m_txt_ccontent,
             //   'ckeword_tag' => $this->ckeword_tag,
                'cpost_date' => $this->cpost_date,
				'cproduct_str_id' => $this->cproduct_str_id,
                'nid_section_news' => 6,
                'alwcmt' => $this->m_chk_alwcmt,
                'niduser01' => $this->m_nid_user_login,
                'niduser02' => $this->m_nid_user_login,
             //   'eng_ctitle' => $this->eng_ctitle,
             //   'eng_cshort_content' => $this->eng_cshort_content,
             //   'eng_ccontent' => $this->eng_ccontent,
                'ddate01' => dbget_current_date(),
                'ddate02' => dbget_current_date()
            );
            $this->news_model->insert($data);
            return TRUE;
        } else {
            return FALSE;
        }
    }
    private function check_valid_before_update()
    {
        if ($this->check_valid_not_null() == FALSE)
            return FALSE;
        if (fbcheck_exists_key_update('tnews', 'ctitle', $this->m_txt_ctitle, $this->m_nid) == FALSE) {
            $this->m_error_ctitle = $this->m_language_key('title') . $this->lang->line('msg.0000.ErorDoubleKey');
            return FALSE;
        }
        return TRUE;
    }
    private function update_data()
    {
        if ($this->check_valid_before_update()) {
            $data = array(
                'ctitle' => $this->m_txt_ctitle,
                'clink' => $this->clink,
                'ctag' => $this->m_txt_ctag,
                'ccode' => $this->ccode,
                'cindex' => $this->m_txt_cindex,
                'cshort_content' => $this->m_txt_cshort_content,
              'ccontent' => $this->m_txt_ccontent,
                'alwcmt' => $this->m_chk_alwcmt,
                'nid_cat_news' => $this->m_cbof_nid_cat_news,
             //   'ckeword_tag' => $this->ckeword_tag,
                'cpost_date' => $this->cpost_date,
				'cproduct_str_id' => $this->cproduct_str_id,
                'niduser02' => $this->m_nid_user_login,
             //   'eng_ctitle' => $this->eng_ctitle,
             //   'eng_cshort_content' => $this->eng_cshort_content,
             //   'eng_ccontent' => $this->eng_ccontent,
                'ddate02' => dbget_current_date()
            );
            if ($this->m_txt_cthumb_img != '') {
                $path = '.././upload/image_article/';
                delfile($path . $this->m_hidden_image_old);
                $data['cimage_thumb'] = $this->m_txt_cthumb_img;
            }
            $this->news_model->update_bynid($this->m_nid, $data);
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function delete_image_iphone($nid)
    {
        $obj_data = $this->news_model->get_byid($nid);
        $path     = '.././upload/ios/';
        if (file_exists($path . $obj_data['cimage_iphone']))
            unlink($path . $obj_data['cimage_iphone']);
        $data['cimage_iphone'] = '';
        $this->news_model->update_bynid($nid, $data);
        gen_xml_category($nid);
        gen_xml_article($nid);
        echo 'Deleted images!!';
    }
    function delete_image_thumb($nid)
    {
        $obj_data = $this->news_model->get_byid($nid);
        $path     = '.././upload/image_article/';
        if (file_exists($path . $obj_data['cimage_thumb']))
            unlink($path . $obj_data['cimage_thumb']);
        $data['cimage_thumb'] = '';
        $this->news_model->update_bynid($nid, $data);
        echo 'Deleted images!!';
    }
    function delete_image_fb($nid)
    {
        $obj_data = $this->news_model->get_byid($nid);
        $path     = '.././upload/fbthumb/';
        if (file_exists($path . $obj_data['cimage_fb']))
            unlink($path . $obj_data['cimage_fb']);
        $data['cimage_fb'] = '';
        $this->news_model->update_bynid($nid, $data);
        echo 'Deleted images!!';
    }
}
