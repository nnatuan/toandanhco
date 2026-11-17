<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$route['default_controller']  = "home";
$route['/?utm_source=(:any)&utm_medium=(:any)&utm_campaign=(:any)&zarsrc=(:any)'] = "home";
$route['/?zarsrc=(:any)&utm_source=(:any)&utm_medium=(:any)&utm_campaign=(:any)'] = "home";
$route['scaffolding_trigger'] = "";
$route['gioi-thieu']  = "about";
$route['dich-vu-khac']  = "new_list/cat/3";
$route['ke-toan-thue']  = "new_list/cat/55";
$route['bang-gia']  = "new_list/cat/4";
$route['tin-tuc']  = "news_list/cat/56";
$route['tin-tuc/trang-(:num)']  = "news_list/cat_page/56/$1";
$route['tin-tuc/(:any)']                                            = "news/detail/$1";

$route['danh-sach/(:any)-(:num)']        = "product/cat/$2";
$route['san-pham/(:any)-(:num)/(:any)-(:num)']        = "product/sub/$4";
$route['san-pham/(:any)-(:num)']        = "product/cat/$2";
$route['sanpham/(:any)-(:num)']        = "product_detail/get/$2";
$route['thiet-bi/(:any)-(:num)']        = "product/sec/$2";
$route['lien-he']  = "contact";
$route['search']  = "search";
$route['chi-tiet/(:any)-(:num)']        = "news/detail/$2";
$route['du-an/(:any)']        = "news/detail/$1";
$route['dich-vu/(:any)']        = "news/detail/$1";
$route['nang-luong-tai-tao/(:any)']        = "news/detail/$1";
$route['search/page-(:num)']        = "search/page/$2";
$route['([a-zA-Z0-9-_]+)-([a-zA-Z0-9-_]+)']    = "news/detail/$2";
$route['dich-vu']  = "service";
$route['du-an']  = "project";
$route['nang-luong-tai-tao']  = "nang_luong_tai_tao";
//$route['nang-luong-tai-tao']  = "article/detail/18";
$route['ajax_actions/rating']  = "ajax_actions/rating";
$route['thiet-bi-milwaukee']  = "article/detail/19";
$route['thiet-bi-tone']  = "article/detail/20";
$route['san-pham/bai-viet/(:any)']  = "article/detail_code/$1";
