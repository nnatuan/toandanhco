<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class do_news_listview extends Controller
{
    var $m_nid_user_login = '';
    var $m_link_page = '';
    var $m_link_export = '';
    var $m_event = '';
    var $m_where_clause = '';
    var $m_orderby_clause = '';
    var $m_orderby_sort = '';
    var $m_sort_image = '';
    var $m_total_row = 0;
    var $m_total_page = 0;
    var $m_current_page = 0;
    var $m_previous_page = 0;
    var $m_next_page = 0;
    var $m_row_per_page = 0;
    var $m_txtf_nid = '';
    var $m_txtf_ctitle = '';
    var $m_chkf_ctag = 0;
    var $m_chkf_cindex = 0;
    var $m_cbof_nid_cat_news = '';
    var $m_cbof_nid_section_news = '';
    var $m_txtf_nstatus = '';
    var $m_txtf_nactive = '';
    var $m_txtf_ddate01 = '';
    var $m_txtf_alwcmt = '';
    var $m_err_delete = '';
    var $m_cbof_language = '';
    var $m_obj_cat_news_view = '';
    var $m_obj_section_news_view = '';
    var $m_obj_data_view = '';
    var $flag_news = '';
    function do_news_listview()
    {
        parent::Controller();
        session_start();
        $this->load->database();
        $this->load->helper('ap_db');
        $this->load->helper('ap_function');
        $this->load->helper('ap_html');
        $this->load->helper('ap_view');
        $this->load->helper('ap_object');
        $this->load->model('news_model');
        $this->m_link_page          = base_url() . 'index.php/do_news_listview/';
        $this->tokaban_system_check = '1';
    }
    private function m_language_key($str_key)
    {
        return $this->lang->line('lbl.news.' . $str_key);
    }
    function tintuc()
    {
        $this->flag_news = 'tintuc';
        $this->f_set_cookie('m_cbof_nid_cat_news', '29');
        $this->f_set_cookie('m_cbof_nid_section_news', '8');
        $this->do_process();
    }
    function kientruc()
    {
        $this->flag_news = 'kientruc';
        $this->f_set_cookie('m_cbof_nid_cat_news', '');
        $this->f_set_cookie('m_cbof_nid_section_news', '6');
        $this->do_process();
    }
    function sxgo()
    {
        $this->flag_news = 'sxgo';
        $this->f_set_cookie('m_cbof_nid_cat_news', '');
        $this->f_set_cookie('m_cbof_nid_section_news', '9');
        $this->do_process();
    }
    function baikhac()
    {
        $this->flag_news = 'baikhac';
        $this->f_set_cookie('m_cbof_nid_cat_news', '');
        $this->f_set_cookie('m_cbof_nid_section_news', '');
        $this->do_process();
    }
    function xaydung()
    {
        $this->flag_news = 'xaydung';
        $this->f_set_cookie('m_cbof_nid_cat_news', '7');
        $this->f_set_cookie('m_cbof_nid_section_news', '');
        $this->do_process();
    }
    function f_sort($field_name, $orderby_sort)
    {
        $this->m_orderby_clause = $field_name;
        $this->m_orderby_sort   = $orderby_sort;
        $this->do_process();
    }
    function f_sort_trans($field_name, $orderby_sort, $id_trans)
    {
        $this->m_orderby_clause = $field_name;
        $this->m_orderby_sort   = $orderby_sort;
        $this->f_list_trans($id_trans);
    }
    function f_print()
    {
        $this->m_event = 'print';
        $this->do_process();
    }
    private function f_set_cookie($cookie_name, $cookie_value)
    {
        return dbset_cookie('cookie_news_listview_' . $cookie_name, $cookie_value);
    }
    private function f_get_cookie($cookie_name)
    {
        return dbget_cookie('cookie_news_listview_' . $cookie_name);
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
        $this->m_nid_user_login = Fget_userdata('session_nid_user');
        $this->load->language('ap', 'eng');
        if (isset($_POST['hidden_id_org'])) {
            $this->m_hidden_id_org = $_POST['hidden_id_org'];
        }
        if (isset($_POST['cbof_nid_section_news'])) {
            $this->m_cbof_nid_section_news = $_POST['cbof_nid_section_news'];
            $this->f_set_cookie('m_cbof_nid_section_news', $this->m_cbof_nid_section_news);
        }
        if (isset($_POST['cbof_nid_cat_news'])) {
            $this->m_cbof_nid_cat_news = $_POST['cbof_nid_cat_news'];
            $this->f_set_cookie('m_cbof_nid_cat_news', $this->m_cbof_nid_cat_news);
        }
        if (isset($_POST['hidden_button'])) {
            $hidden_button = $_POST['hidden_button'];
            switch ($hidden_button) {
                case "btn_filter": {
                    if (isset($_POST['hidden_event']))
                        $this->m_event = $_POST['hidden_event'];
                    if (!empty($_POST['chkf_ctag']))
                        $this->m_chkf_ctag = $_POST['chkf_ctag'];
                    $this->f_set_cookie('m_chkf_ctag', $this->m_chkf_ctag);
                    if (isset($_POST['txtf_nstatus']))
                        $this->m_txtf_nstatus = $_POST['txtf_nstatus'];
                    if (isset($_POST['txtf_nstatus']))
                        $this->m_txtf_nactive = $_POST['txtf_nactive'];
                    if (isset($_POST['txtf_ctitle'])) {
                        $this->m_txtf_ctitle       = $_POST['txtf_ctitle'];
                        $this->m_cbof_nid_cat_news = $_POST['cbof_nid_cat_news'];
                        $this->m_txtf_cindex       = $_POST['txtf_cindex'];
                    }
                    $this->f_set_cookie('m_txtf_nid', $this->m_txtf_nid);
                    $this->f_set_cookie('m_txtf_ctitle', $this->m_txtf_ctitle);
                    $this->f_set_cookie('m_txtf_cindex', $this->m_txtf_cindex);
                    $this->f_set_cookie('m_cbof_nid_cat_news', $this->m_cbof_nid_cat_news);
                    $this->f_set_cookie('m_cbof_nid_section_news', $this->m_cbof_nid_section_news);
                    $this->f_set_cookie('m_txtf_alwcmt', $this->m_txtf_alwcmt);
                    $this->f_set_cookie('m_txtf_nstatus', $this->m_txtf_nstatus);
                    $this->f_set_cookie('m_txtf_nactive', $this->m_txtf_nactive);
                    $this->f_set_cookie('m_txtf_ddate01', $this->m_txtf_ddate01);
                    $this->f_set_cookie('m_cbof_language', $this->m_cbof_language);
                    break;
                }
                case "btn_row_per_page": {
                    if (isset($_POST['txt_row_per_page'])) {
                        $this->m_row_per_page = Fconvert_to_int($_POST['txt_row_per_page']);
                    }
                    break;
                }
                case "btn_page_number": {
                    $this->m_current_page = 1;
                    if (isset($_POST['txt_current_page']))
                        $this->m_current_page = $_POST['txt_current_page'];
                    break;
                }
                case "btn_header_page_number": {
                    $this->m_current_page = 1;
                    if (isset($_POST['txt_header_current_page']))
                        $this->m_current_page = $_POST['txt_header_current_page'];
                    break;
                }
                case ("btn_next"): {
                    $this->m_current_page = $_POST['txt_current_page'];
                    $this->m_current_page += 1;
                    break;
                }
                case ("btn_previous"): {
                    $this->m_current_page = $_POST['txt_current_page'];
                    $this->m_current_page -= 1;
                    break;
                }
                case "btn_export": {
                    $this->m_event = 'excel';
                    break;
                }
                case "btn_add": {
                    redirect(base_url() . 'index.php/do_news/f_add');
                }
                case "btn_delete": {
                    $this->delete();
                    break;
                }
                case "btn_header_add": {
                    redirect(base_url() . 'index.php/do_news/f_add_trans');
                }
                default: {
                }
            }
        }
    }
    private function caculate_data()
    {
        $this->m_obj_section_news_view = Obj_get_section_news();
        $this->m_obj_cat_news_view     = Obj_get_cat_news_by_nidsec($this->m_cbof_nid_section_news);
        if (trim($this->m_orderby_clause) == '') {
            $this->m_orderby_clause = $this->f_get_cookie('m_orderby_clause');
            $this->m_orderby_sort   = $this->f_get_cookie('m_orderby_sort');
        }
        if (trim($this->m_orderby_clause) == '') {
            $this->m_orderby_clause = 'nid';
            $this->m_orderby_sort   = 'asc';
        }
        $this->f_set_cookie('m_orderby_clause', $this->m_orderby_clause);
        $this->f_set_cookie('m_orderby_sort', $this->m_orderby_sort);
        $this->m_txtf_nid              = $this->f_get_cookie('m_txtf_nid');
        $this->m_txtf_ctitle           = $this->f_get_cookie('m_txtf_ctitle');
        $this->m_txtf_cindex           = $this->f_get_cookie('m_txtf_cindex');
        $this->m_chkf_ctag             = $this->f_get_cookie('m_chkf_ctag');
        $this->m_cbof_nid_cat_news     = $this->f_get_cookie('m_cbof_nid_cat_news');
        $this->m_cbof_nid_section_news = $this->f_get_cookie('m_cbof_nid_section_news');
        $this->m_txtf_nstatus          = $this->f_get_cookie('m_txtf_nstatus');
        $this->m_txtf_nactive          = $this->f_get_cookie('m_txtf_nactive');
        $this->m_txtf_alwcmt           = $this->f_get_cookie('m_txtf_alwcmt');
        $this->m_txtf_ddate01          = $this->f_get_cookie('m_txtf_ddate01');
        $this->m_where_clause          = $this->get_where_string();
        $this->m_total_row             = $this->news_model->get_count_listview($this->m_where_clause);
        if ($this->m_row_per_page <= 0)
            $this->m_row_per_page = Fget_userdata('session_user_row_per_page');
        else
            Fset_userdata('session_user_row_per_page', $this->m_row_per_page);
        $this->m_total_page = Fget_total_page($this->m_row_per_page, $this->m_total_row);
        if ($this->m_current_page <= 0)
            $this->m_current_page = dbget_cookie('cookie_news_listview_txt_current_page');
        if ($this->m_current_page <= 0)
            $this->m_current_page = 1;
        if ($this->m_current_page > $this->m_total_page)
            $this->m_current_page = $this->m_total_page;
        dbset_cookie('cookie_news_listview_txt_current_page', $this->m_current_page);
        $this->m_obj_data_view = $this->news_model->get_listview($this->m_where_clause, $this->m_orderby_clause . ' ' . $this->m_orderby_sort, $this->m_row_per_page, $this->m_current_page, $this->m_total_row);
        if (trim($this->m_orderby_sort) == 'asc' || trim($this->m_orderby_sort) == '')
            $this->m_orderby_sort = 'desc';
        else
            $this->m_orderby_sort = 'asc';
        $this->m_sort_img = Fget_image_sort($this->m_orderby_sort);
        if ($this->m_event == '')
            $this->m_event = 'view';
    }
    private function do_business()
    {
        $data['err_delete']                = $this->m_err_delete;
        $data['orderby_field']             = $this->m_orderby_clause;
        $data['orderby_sort']              = $this->m_orderby_sort;
        $data['sort_img']                  = $this->m_sort_img;
        $data['link_page']                 = $this->m_link_page;
        $data['lbl_form_title']            = $this->lang->line('lbl.news.title.form');
        $data['lbl_title']                 = $this->m_language_key('title');
        $data['lbl_cat']                   = $this->m_language_key('cat');
        $data['lbl_index']                 = $this->m_language_key('index');
        $data['lbl_section_news']          = $this->m_language_key('section_news');
        $data['lbl_status']                = $this->m_language_key('status');
        $data['lbl_active']                = $this->m_language_key('active');
        $data['lbl_alwcmt']                = $this->m_language_key('alwcmt');
        $data['lbl_nid']                   = $this->m_language_key('nid');
        $data['lbl_user01']                = $this->m_language_key('user01');
        $data['lbl_date01']                = $this->m_language_key('date01');
        $data['lbl_not_tag']               = $this->lang->line('lbl.0000.DataNotTag');
        $data['btn_add']                   = $this->lang->line('btn.0000.Add');
        $data['btn_delete']                = $this->lang->line('btn.0000.Delete');
        $data['btn_export']                = $this->lang->line('btn.0000.Export');
        $data['btn_choose']                = $this->lang->line('btn.0000.Choose');
        $data['btn_filter']                = $this->lang->line('btn.0000.Filter');
        $data['btn_print']                 = $this->lang->line('btn.0000.Print');
        $data['msg_invalid_before_delete'] = $this->lang->line('msg.0000.InvalidBeforeDelete');
        $data['msg_confirm_before_delete'] = $this->lang->line('msg.0000.ConfirmBeforeDelete');
        $data['error_delete_active']       = $this->m_err_delete;
        $data['lbl_rows_per_page']         = $this->lang->line('lbl.0000.RowPerPage');
        $data['txt_row_per_page']          = $this->m_row_per_page;
        $data['txt_current_page']          = $this->m_current_page;
        $data['txt_total_page']            = $this->m_total_page;
        $data['event']                     = $this->m_event;
        $data['txtf_nid']                  = $this->m_txtf_nid;
        $data['txtf_ctitle']               = $this->m_txtf_ctitle;
        $data['chkf_ctag']                 = $this->m_chkf_ctag;
        $data['txtf_cindex']               = $this->m_txtf_cindex;
        $data['txtf_nstatus']              = $this->m_txtf_nstatus;
        $data['txtf_nactive']              = $this->m_txtf_nactive;
        $data['m_txtf_alwcmt']             = $this->m_txtf_alwcmt;
        $data['txtf_ddate01']              = $this->m_txtf_ddate01;
        $data['menu_active']               = 'news';
        $data['data_view']                 = $this->m_obj_data_view;
        $data['gencbo_cat_news_list']      = Fgen_html_combobox('', 'cbof_nid_cat_news', $this->m_cbof_nid_cat_news, '', $this->m_obj_cat_news_view, 'nid', 'ccat_news', 'submit', '');
        $data['gencbo_section_news_list']  = Fgen_html_combobox('', 'cbof_nid_section_news', $this->m_cbof_nid_section_news, '', $this->m_obj_section_news_view, 'nid', 'csection_news', 'submit', '');
        $data['menu']                      = Fget_menu_html($this->m_nid_user_login);
        $data['gen_cbo_status']            = Fget_combobox_yes_no('', 'txtf_nstatus', $this->m_txtf_nstatus, 'width:98%', $this->lang->line('lbl.0000.Yes'), $this->lang->line('lbl.0000.No'));
        $data['gen_cbo_active']            = Fget_combobox_yes_no('', 'txtf_nactive', $this->m_txtf_nactive, 'width:98%', $this->lang->line('lbl.0000.Yes'), $this->lang->line('lbl.0000.No'));
        if ($this->m_event == 'excel') {
            $data['datas'] = $this->news_model->get_listview_report($this->m_where_clause, $this->m_orderby_clause . ' ' . $this->m_orderby_sort);
            $this->news_model->export_excel('news_report.xls', $data);
            return;
        }
        if ($this->m_event == 'print') {
            $this->load->view('news_view/ap_news_listview_print', $data);
            return;
        }
        $data['event'] = $this->m_event;
        $this->load->view('news_view/index.php', $data);
    }
    private function destroy_data()
    {
    }
    private function get_where_string()
    {
        $str_result = ' WHERE nid is not null ';
        if ($this->m_txtf_nid != '')
            $str_result = $str_result . ' AND nid like "%' . trim($this->m_txtf_nid) . '%" ';
        if ($this->m_txtf_ctitle != '')
            $str_result = $str_result . ' AND ctitle like "%' . trim($this->m_txtf_ctitle) . '%" ';
        if ($this->m_txtf_cindex != '')
            $str_result = $str_result . ' AND cindex like "%' . trim($this->m_txtf_cindex) . '%" ';
        if ($this->m_chkf_ctag == 1)
            $str_result = $str_result . ' AND ctag = "" ';
        if ($this->m_cbof_nid_cat_news != '')
            $str_result = $str_result . ' AND nid_cat = "' . trim($this->m_cbof_nid_cat_news) . '" ';
        if ($this->m_cbof_nid_section_news != '')
            $str_result = $str_result . ' AND nid_section_news = "' . trim($this->m_cbof_nid_section_news) . '" ';
        if ($this->m_txtf_nstatus != '')
            $str_result = $str_result . ' AND nstatus like "%' . trim($this->m_txtf_nstatus) . '%" ';
        if ($this->m_txtf_nactive != '')
            $str_result = $str_result . ' AND nactive like "%' . trim($this->m_txtf_nactive) . '%" ';
        if ($this->m_txtf_alwcmt != '')
            $str_result = $str_result . ' AND alwcmt like "%' . trim($this->m_txtf_alwcmt) . '%" ';
        if ($this->m_txtf_ddate01 != '')
            $str_result = $str_result . ' AND ddate01 like "%' . Fget_strdate(trim($this->m_txtf_ddate01)) . '%" ';
        if ($this->flag_news == 'baikhac') {
            $str_result = $str_result . ' AND nid_cat != "29" AND nid_section_news = "8" ';
        }
        return $str_result;
    }
    function checkvalid_delete($id)
    {
        return true;
    }
    private function delete()
    {
        if (!empty($_POST['chk'])) {
            foreach ($_POST['chk'] as $nid) {
                if ($this->checkvalid_delete($nid)) {
                    $obj_data = $this->news_model->get_byid($nid);
                    if ($obj_data['cimage_thumb'] != '') {
                        $path = '.././upload/image_article/';
                        @unlink($path . $obj_data['cimage_thumb']);
                    }
                    $this->news_model->delete_byid($nid);
                }
            }
        }
    }
    private function update_status($nid, $status)
    {
        $data = array(
            'nstatus' => $status
        );
        $this->news_model->update_bynid($nid, $data);
    }
    function f_active($id)
    {
        $status = 1;
        $this->update_status($id, $status);
        $this->do_process();
    }
    function f_unactive($id)
    {
        $status = 0;
        $this->update_status($id, $status);
        $this->do_process();
    }
    private function update_status_02($nid, $active)
    {
        $data = array(
            'nactive' => $active
        );
        $this->news_model->update_bynid($nid, $data);
    }
    function f_active_02($id)
    {
        $active = 1;
        $this->update_status_02($id, $active);
        $this->do_process();
    }
    function f_unactive_02($id)
    {
        $active = 0;
        $this->update_status_02($id, $active);
        $this->do_process();
    }
    function f_actives($nid)
    {
        $tmp     = $this->news_model->get_byid($nid);
        $nstatus = 0;
        if (count($tmp) > 0) {
            $nstatus = $tmp['nimg'] == 0 ? 1 : 0;
        }
        $data = array(
            'nimg' => $nstatus
        );
        $this->news_model->update_bynid($nid, $data);
        $this->do_process();
    }
    function f_special($nid)
    {
        $tmp     = $this->news_model->get_byid($nid);
        $nstatus = 0;
        if (count($tmp) > 0) {
            $nstatus = $tmp['nactive'] == 0 ? 1 : 0;
        }
        
        $data = array(
            'nactive' => $nstatus
        );
        $this->news_model->update_bynid($nid, $data);
        $this->do_process();
    }
}
