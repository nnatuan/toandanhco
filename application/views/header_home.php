<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml">
   <head>
   	<meta http-equiv="pragma" content="no-cache" />     
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">   
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="content-language" content ="vn" />
       <meta property="og:url"                content="<?php echo 'https://ansancosmectics.com'?>" />
      <meta property="og:type"               content="article" />
      <meta property="og:title"              content="Ansancosmectics - Mỹ Phẩm Chính Hãng" />
      <meta property="og:description"        content="An San Cosmetic cung cấp mỹ phẩm chính hãng giá tốt, tư vấn nhiệt tình, giá luôn luôn tốt!" />
      <meta property="og:image"              content="<?php echo base_url().'upload/banner_home.jpg' ?>" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">   

      <?php
         $title_global     = '';
         $tags_global      = '';
         $description_global  = '';
         ?>
      
      <title><?php 
         if($title != '') 
         	echo $title; 
         else 
         { 
         	$obj_data = get_config_byid(3);
         	 foreach($obj_data as $data):
         		$title_global	= $data['cvalue'];
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
         	$description_global		= $data['cvalue'];
          endforeach;	
         ?>
      <meta name="description" content="<?php echo $description_global ?>">
      <?php endif; ?>
      <meta name="robots" content="INDEX, FOLLOW"/>
      <meta name="robots" content="NOODP, NOYDIR"/>
      <link href="<?php echo base_url().'images/favicon.png' ?>" rel="shortcut icon" type="image/x-icon">	  
      
	  
	  <link href="https://file.yes24.vn/Content/desktop/css/bundle/Home.min.css?v=123132132132" media="all" rel="stylesheet" />
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
	  <link href="<?php echo base_url(); ?>css/my_style.css?v=1.0.0.4" rel="stylesheet" type="text/css" />
	  <link href="<?php echo base_url(); ?>css/responsive_style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript">	
		function add_cart_detail(_id){
			var _qty = $("#number").val();
			add_cart(_id, _qty);
		}
		 function add_cart(_id,_qty){
              jQuery.post( "<?php echo base_url()?>thao-tac/mua-san-pham", { id_pro: _id, qty_pro: _qty })
              .done(function( data ) { 
              		location.href="<?php echo base_url()?>gio-hang";
              });	
          }
      </script>