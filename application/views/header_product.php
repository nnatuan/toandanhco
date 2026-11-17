	
<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml">
   <head>
    <meta http-equiv="pragma" content="no-cache" />
     
      <?php
         $title_global     = '';
         $tags_global      = '';
         $description_global  = '';
         ?>
    
      <meta name="apple-mobile-web-app-capable" content="yes"/>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="content-language" content ="vn" />
      <meta property="og:url"                content="<?php echo 'http://ansancosmectics.com'.$_SERVER['REQUEST_URI']?>" />
      <meta property="og:type"               content="article" />
      <meta property="og:title"              content="<?php echo $title . ' - Giá cực rẻ!'?>" />
      <meta property="og:description"        content="<?php echo $fb_cdescription?>" />
      <meta property="og:image"              content="<?php echo base_url().'upload/images_product/fb/'.$cproduct_fb ?>" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">   
     
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="content-language" content ="vn" />
      <title><?php 
         if($title != '') 
            echo $title; 
         else 
         { 
            $obj_data = get_config_byid(3);
             foreach($obj_data as $data):
               $title_global  = $data['cvalue'];
             endforeach;
            echo $title_global;
         }
         ?>
      </title>
      <?php if($description != ''): ?>
      <meta name="description" content="<?php echo $description ?>">
      <?php 
         else: 
          $obj_data = get_config_byid(4);
          foreach($obj_data as $data):
            $description_global     = $data['cvalue'];
          endforeach;   
         ?>
      <meta name="description" content="<?php echo $description_global ?>">
      <?php endif; ?>
      <meta name="robots" content="INDEX, FOLLOW"/>
      <meta name="robots" content="NOODP, NOYDIR"/>
      <link href="<?php echo base_url().'images/favicon.png' ?>" rel="shortcut icon" type="image/x-icon">

            <link href="<?php echo base_url(); ?>css/materialdesignicons.min.css" media="all" rel="stylesheet" />
            <link href="<?php echo base_url(); ?>css/owl.carousel.css" rel="stylesheet" />
            <link href="<?php echo base_url(); ?>css/global.css?v=202004201550" media="all" rel="stylesheet" />
            <link href="<?php echo base_url(); ?>css/RecentProduct.css" media="all" rel="stylesheet" />
            <link href="<?php echo base_url(); ?>css/Category.css?v=202004201550" rel="stylesheet" />
            <link href="<?php echo base_url(); ?>css/ion.rangeSlider.min.css" rel="stylesheet" />
            <link href="<?php echo base_url(); ?>css/productDetailV2.css?v=202004201550" media="all" rel="stylesheet" />
            <style>
               .black-img-big img {
               border: solid 1px #ededed;
               }
               #spProductDetails {
               line-height: 1.5;
               }
               #spProductDetails b, #spProductDetails strong {
               font-family: RobotoBold;
               }
               #spProductDetails ul {
               list-style-type: disc;
               width: 100%;
               float: left;
               padding-left: 30px;
               -moz-box-sizing: border-box;
               -webkit-box-sizing: border-box;
               -ms-box-sizing: border-box;
               box-sizing: border-box;
               }
               table#table-product-detail {
               border-collapse: collapse;
               border-spacing: 0;
               background-color: transparent;
               max-width: 100%;
               width: 100%;
               margin-bottom: 20px;
               border: 1px solid #ddd;
               border-bottom: none;
               margin: 0;
               }
               table#table-product-detail > tbody > tr:nth-of-type(odd) {
               background-color: #f9f9f9;
               }
               table#table-product-detail > tbody > tr > td, table#table-product-detail > tbody > tr > th, table#table-product-detail > tfoot > tr > td, table#table-product-detail > tfoot > tr > th, table#table-product-detail > thead > tr > td, table#table-product-detail > thead > tr > th {
               border: 1px solid #d5d5d5;
               }
               table#table-product-detail > tbody > tr > td, table#table-product-detail > tfoot > tr > td, table#table-product-detail > tfoot > tr > th {
               padding: 10px 15px;
               line-height: 1.42857;
               vertical-align: top;
               border-top: 1px solid #d5d5d5;
               border-left: 0;
               border-right: 0;
               }
               table#table-product-detail > tbody > tr > td:first-child {
               color: #4f4f4f;
               font-size: 13px;
               background: #efefef;
               border-right: 1px solid #d5d5d5;
               width: 25%;
               text-align: left;
               box-sizing: border-box;
               border-top: none;
               font-family: RobotoBold;
               font-size: 13px;
               text-transform: capitalize;
               float: none;
               }
               table#table-product-detail > tbody > tr > td:last-child {
               color: #242424;
               font-size: 13px;
               background: #fff;
               }
               table#table-product-detail > tbody > tr > td:nth-child(2), table#table-product-detail > tfoot > tr > td:nth-child(2), table#table-product-detail > tfoot > tr > th:nth-child(2) {
               padding: 10px 15px;
               line-height: 1.42857;
               vertical-align: top;
               border-top: 1px solid #d5d5d5;
               border-left: 0;
               border-right: 0;
               width: 75%;
               float: left;
               text-align: left;
               box-sizing: border-box;
               border-top: none;
               float: none;
               }
            </style>
			<script type="text/javascript" src="https://image.yes24.vn/Upload/Content/yes24/js/OneSignalSDK.js" async></script> <!-- https://cdn.onesignal.com/sdks/OneSignalSDK.js -->
            <script type="text/javascript">
               var OneSignal = window.OneSignal || [];
               OneSignal.push(["init", {
                   appId: "6c5a9254-e9e8-41b0-94e8-24e52d33806c",
                   safari_web_id: 'web.onesignal.auto.6c5a9254-e9e8-41b0-94e8-24e52d33806c',
                   autoRegister: true,
                   notifyButton: { enable: false }
               }]);
            </script>
            <!-- Start Alexa Certify Javascript -->
            <script type="text/javascript">
               _atrk_opts = { atrk_acct: "SLxBf1a8Md00MX", domain: "yes24.vn", dynamic: true };
               (function () { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://image.yes24.vn/Upload/Content/yes24/js/atrk.js"; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(as, s); })();
            </script>
            <noscript><img src="https://certify.alexametrics.com/atrk.gif?account=SLxBf1a8Md00MX" style="display:none" height="1" width="1" alt="" /></noscript>
            <!-- End Alexa Certify Javascript -->
            <!--ematics-->
            <script type="text/javascript">
               (function (i, s, o, g, r, a, m) {
                   i['EmaticsObject'] = r; i[r] = i[r] || function () {
                       (i[r].q = i[r].q || []).push(arguments);
                   }, i[r].l = 1 * new Date(); a = s.createElement(o),
                       m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g;
                   m.parentNode.insertBefore(a, m);
               })(window, document, 'script', 'https://image.yes24.vn/Upload/Content/yes24/js/ematic.min.js', 'ematics');
               var ematicApikey = "832d7386411b11e796c00242ac110002-sg7";
               var opt = { email: "", country_iso: "vietnam", currency_iso: "vnd", language_iso: "vietnam" };
               opt.events = {
                   onAfterSubscribe: function (email) {
                       $.ajax({
                           type: 'POST',
                           async: true,
                           url: '/Account/_InsertWelcomeLog',
                           data: {
                               gender: false,
                               email: email
                           },
                       });
                   }
               };
               ematics("create", ematicApikey, opt);
            </script>
            <!--End Ematics-->
            <!-- Admicro Tag Manager -->
            <script>
               (function (a, b, d, c, e) {
                   a[c] = a[c] || [];
                   a[c].push({ "atm.start": (new Date).getTime(), event: "atm.js" });
                   a = b.getElementsByTagName(d)[0]; b = b.createElement(d); b.async = !0;
                   b.src = "//deqik.com/tag/corejs/" + e + ".js"; a.parentNode.insertBefore(b, a)
               })(window, document, "script", "atmDataLayer", "ATM6ZPEMD187B");
            </script>
            <!-- End Admicro Tag Manager -->
            <!-- Facebook Pixel Code -->
            <script>
               !function (f, b, e, v, n, t, s) {
                   if (f.fbq) return; n = f.fbq = function () {
                       n.callMethod ?
                           n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                   }; if (!f._fbq) f._fbq = n;
                   n.push = n; n.loaded = !0; n.version = '2.0'; n.queue = []; t = b.createElement(e); t.async = !0;
                   t.src = v; s = b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t, s)
               }(window,document, 'script', 'https://image.yes24.vn/Upload/Content/yes24/js/fbevents.js');
               fbq('init', '812920822131359');
               fbq('track', 'PageView');
               fbq('track', 'Lead');
            </script>
            <noscript>
               <img height="1" width="1" style="display:none"
                  src="https://www.facebook.com/tr?id=812920822131359&ev=PageView&noscript=1" />
            </noscript>
            <!-- Google Tag Manager -->
            <script>
               (function (w, d, s, l, i) {
                   w[l] = w[l] || []; w[l].push({
                       'gtm.start':
                           new Date().getTime(), event: 'gtm.js'
                   }); var f = d.getElementsByTagName(s)[0],
                       j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                           'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
               })(window, document, 'script', 'dataLayer', 'GTM-T7NB544');
            </script>
            <!-- End Google Tag Manager -->
			
			
			
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link href="<?php echo base_url(); ?>css/my_style.css" rel="stylesheet" type="text/css" />
	  <link href="<?php echo base_url(); ?>css/responsive_style.css" rel="stylesheet" type="text/css" />
      <script type="text/javascript">    
		/*
		function add_cart_detail(_id){
			var _qty = $("#number").val();
			add_cart(_id, _qty);
		}
       function add_cart(_id,_qty){
              jQuery.post( "<?php echo base_url()?>thao-tac/mua-san-pham", { id_pro: _id, qty_pro: _qty })
              .done(function( data ) { 
                  location.href="<?php echo base_url()?>gio-hang";
              }); 
          }*/
		
		function add_cart_detail(_id, _iscolor){
					 var _qty = $("#txtBlackQty").val();
					 var qty_remain = $("#number_remain").val();
					 if(_qty>qty_remain)
						$('#msg_err').css({'display': 'block'});
					 else
						add_cart(_id, _qty, _iscolor);
				 }
                  function add_cart(_id,_qty, _iscolor){
					$.post( "<?php echo base_url(); ?>thao-tac/mua-san-pham", { id_pro: _id, qty_pro: _qty, iscolor: _iscolor })
					  .done(function( data ) {
						location.href="<?php echo base_url(); ?>gio-hang";
					  });	
				  }	
		
		//add cart ko chuyen qua gio hang
		function add_cart_detail_2(_id, _iscolor){
					 var _qty = $("#txtBlackQty").val();
					 var qty_remain = $("#number_remain").val();
					 if(_qty>qty_remain)
						$('#msg_err').css({'display': 'block'});
					 else
						add_cart_2(_id, _qty, _iscolor);
				 }	
		function add_cart_2(_id,_qty, _iscolor){
					$.post( "<?php echo base_url(); ?>thao-tac/mua-san-pham", { id_pro: _id, qty_pro: _qty, iscolor: _iscolor })
					  .done(function( data ) {
						  $('.add_cart_alert').addClass('active');
						//location.reload();
						
					  });	
				  }	
      </script>
     
