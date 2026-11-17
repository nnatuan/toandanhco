<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$route['default_controller']                                        = "home";
$route['/?utm_source=(:any)&utm_medium=(:any)&utm_campaign=(:any)&zarsrc=(:any)'] = "home";
$route['/?zarsrc=(:any)&utm_source=(:any)&utm_medium=(:any)&utm_campaign=(:any)'] = "home";

$route['dang-nhap']                                                    = "login";
$route['gioi-thieu']                                                    = "about";
$route['lien-he']                                                    = "contact";
$route['tin-tuc/(:any)']                                            = "news/detail/$1";
$route['tin-tuc']                                                   = "news_list/cat/1";
$route['giai-phap/(:any)']                                            = "news/detail/$1";
$route['giai-phap']                                                   = "news_list/cat/2";
$route['du-an/(:any)']                                            = "news/detail/$1";
$route['du-an']                                                   = "news_list/cat/3";

$route['thao-tac/mua-san-pham']                                     = "ajax_actions/ajax_post_cart/";
$route['thao-tac/cap-nhat-san-pham']                                = "ajax_actions/ajax_update_cart/";
$route['thao-tac/xoa-san-pham']                                     = "ajax_actions/ajax_remove_cart/";
$route['gio-hang'] 			 = "buy_product";

$route['dang-xuat']                                      = "ajax_actions/dang_xuat";
$route['tim-kiem/([a-zA-Z0-9-_]+)/trang-(:num)']						= "search/page/$1/$2";
$route['tim-kiem/(:any)']												= "search/page/$1/1";

$route['san-pham/([a-zA-Z0-9-_]+)']                            = "product_detail/get/$1";
$route['danh-muc/([a-zA-Z0-9-_]+)']                  			= "products/set_page_cat/$1/1";

$route['thao-tac/mua-san-pham']                                     = "ajax_actions/ajax_post_cart/";
$route['thao-tac/xoa-san-pham']                                     = "ajax_actions/ajax_remove_cart/";
$route['thao-tac/cap-nhat-san-pham']                                = "ajax_actions/ajax_update_cart/";
$route['gio-hang'] 			 = "buy_product";
$route['hoan-tat']  = "complete_cart";
$route['ajax_actions/empty_cart'] 			 = "ajax_actions/empty_cart";

$route['chinh-sach-bao-mat']                                                    = "article/detail/2";
$route['chinh-sach-bao-hanh']                                                    = "article/detail/3";
$route['chinh-sach-doi-tra']                                                    = "article/detail/4";
$route['chinh-sach-van-chuyen']                                                    = "article/detail/5";