<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml">
   <head>
      <?php	header("Content-Type: text/html; charset=UTF-8"); ?>
      <?php
         $title_global		= '';
         $tags_global		= '';
         $description_global	= '';
         ?>

      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
      <meta name="apple-mobile-web-app-capable" content="yes"/>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="content-language" content ="vn" />
	  
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
	  <?php 
	  $desc = get_config_by_id(4);
		$img = get_config_by_id(5);
		if($menu_top=="product_detail") {
			//$fb_cimage_url  = base_url().'upload/fb/'.$obj_detail['cproduct_fb'];
			$fb_cimage_url  = base_url().'upload/images_product/full_images/'.$obj_detail['cimage'];
			$fb_cdescription  = strip_tags($obj_detail['cnote']);
		} elseif($menu_top=="news") {
			$fb_cimage_url  = base_url().'upload/image_article/'.$obj_news['cimage_thumb'];
			$fb_cdescription  = strip_tags($obj_news['cshort_content']);
		} elseif($menu_top=="product") {
			$fb_cimage_url  = base_url().'upload/fb/'.$img['cimage'];
			$fb_cdescription  = strip_tags($description_fb);
		} elseif($menu_top=="article") {
			$fb_cimage_url  = base_url().'upload/image_article/'.$obj_content['cimage_thumb'];
			$fb_cdescription  = strip_tags($description_fb);
		} else {
			$fb_cimage_url  = base_url().'upload/fb/'.$img['cimage'];
			$fb_cdescription  = strip_tags($desc['cvalue']);
		}
         ?>
      <meta property="og:title"              content="<?php echo $title; ?>" />
	  <meta property="og:description"        content="<?php echo $fb_cdescription?>" />
      <meta property="og:image"              content="<?php echo $fb_cimage_url; ?>" />
	  
      <link href="<?php echo base_url().'images/favicon.png' ?>" rel="shortcut icon" type="image/x-icon">	  
      
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/5ur4x_1.css" media="all"/>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/5ur4x_2.css" media="all"/>

      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/5ur4x_3.css" media="only screen and (max-width: 768px)"/>

      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/5ur4x_4.css" media="all"/>
      <style id='woocommerce-inline-inline-css' type='text/css'>
         .woocommerce form .form-row .required { visibility: visible; }
      </style>

      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/5ur4x_5.css" media="all"/>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style_inline.css" media="all"/>

      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/5ur4x_6.css" media="all"/>
      <link rel='stylesheet' id='elementor-post-772-css'  href='<?php echo base_url(); ?>css/post-772.css?ver=1582032868' type='text/css' media='all' />

      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/5ur4x_7.css" media="all"/>
      <link rel='stylesheet' id='elementor-post-459-css'  href='<?php echo base_url(); ?>css/post-459.css?ver=1585937320' type='text/css' media='all' />
      <!-- Google Font Inter - Modern, crisp, full Vietnamese glyph support -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap&subset=vietnamese" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/5ur4x_8.css" media="all"/>
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/my_style.css" media="all"/>
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/responsive_style.css" media="all"/>
	  <!-- FontAwesome 4.7.0 for icons -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	  <!-- Modern Corporate Theme & UI Styles (Dynamic Cache Busting) -->
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/electronic_theme.css?ver=<?php echo time(); ?>" media="all"/>

	  <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	  <!-- Electronic Slider & Smart Lazyload Engine -->
	  <script type="text/javascript" src="<?php echo base_url(); ?>js/electronic_slider.js"></script>
	  <script type="text/javascript" src="<?php echo base_url(); ?>js/lazyload_toandanh.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(). 'css/flexslider.css'; ?>"/>
<script type="text/javascript" src="<?php echo base_url(). 'js/jquery.flexslider.js'; ?>"></script>
<style>
		.flexslider ol, .flexslider ul, .flexslider li {
			margin: 0;
			padding: 0;
			position: initial;
		}
		ol.flex-control-nav{
			display: none;
		}
		.flexslider {
			float: none;
			border: 0;
		    margin: 0 0 50px;	
		}
		.flex-direction-nav a {
			line-height: initial;
		}
		.flexslider .slides > li:first-child {display: block; -webkit-backface-visibility: visible;} 
	</style>
<script type="text/javascript">
   jQuery(window).load(function() {
      if (jQuery('.flexslider').length && typeof jQuery('.flexslider').flexslider === 'function') {
         jQuery('.flexslider').flexslider({
            slideshowSpeed: 3000,
            controlNav: true,
            animation: "slide"
         });
      }
   });
</script> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript">
	(function($) {
		$(document).ready(function() {
			$('.fancybox').fancybox();
		});
	})(jQuery);
</script>

      <script type='text/javascript' src='<?php echo base_url(); ?>js/jquery-migrate.min.js?ver=1.4.1'></script>
      <script type='text/javascript' src='<?php echo base_url(); ?>js/revolution.tools.min.js?ver=6.0'></script>
      <script type='text/javascript' src='<?php echo base_url(); ?>js/rs6.min.js?ver=6.1.8'></script>
      <script type='text/javascript' src='<?php echo base_url(); ?>js/wgl-toolbar-public.js?ver=1.0.0'></script>
      <script type='text/javascript' src='<?php echo base_url(); ?>js/jquery.swipebox.min.js?ver=5.3.4'></script>
      <script type='text/javascript' src='<?php echo base_url(); ?>js/v4-shims.min.js?ver=2.9.2'></script>
      
      <noscript>
         <style>.woocommerce-product-gallery{ opacity: 1 !important; }</style>
      </noscript>
      <meta name="generator" content="Powered by Slider Revolution 6.1.8 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface." />
      <script type="text/javascript">function setREVStartSize(e){			
         try {								
         var pw = document.getElementById(e.c).parentNode.offsetWidth,
         newh;
         pw = pw===0 || isNaN(pw) ? window.innerWidth : pw;
         e.tabw = e.tabw===undefined ? 0 : parseInt(e.tabw);
         e.thumbw = e.thumbw===undefined ? 0 : parseInt(e.thumbw);
         e.tabh = e.tabh===undefined ? 0 : parseInt(e.tabh);
         e.thumbh = e.thumbh===undefined ? 0 : parseInt(e.thumbh);
         e.tabhide = e.tabhide===undefined ? 0 : parseInt(e.tabhide);
         e.thumbhide = e.thumbhide===undefined ? 0 : parseInt(e.thumbhide);
         e.mh = e.mh===undefined || e.mh=="" || e.mh==="auto" ? 0 : parseInt(e.mh,0);		
         if(e.layout==="fullscreen" || e.l==="fullscreen") 						
         newh = Math.max(e.mh,window.innerHeight);				
         else{					
         e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
         for (var i in e.rl) if (e.gw[i]===undefined || e.gw[i]===0) e.gw[i] = e.gw[i-1];					
         e.gh = e.el===undefined || e.el==="" || (Array.isArray(e.el) && e.el.length==0)? e.gh : e.el;
         e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
         for (var i in e.rl) if (e.gh[i]===undefined || e.gh[i]===0) e.gh[i] = e.gh[i-1];
         var nl = new Array(e.rl.length),
         ix = 0,						
         sl;					
         e.tabw = e.tabhide>=pw ? 0 : e.tabw;
         e.thumbw = e.thumbhide>=pw ? 0 : e.thumbw;
         e.tabh = e.tabhide>=pw ? 0 : e.tabh;
         e.thumbh = e.thumbhide>=pw ? 0 : e.thumbh;					
         for (var i in e.rl) nl[i] = e.rl[i]<window.innerWidth ? 0 : e.rl[i];
         sl = nl[0];									
         for (var i in nl) if (sl>nl[i] && nl[i]>0) { sl = nl[i]; ix=i;}															
         var m = pw>(e.gw[ix]+e.tabw+e.thumbw) ? 1 : (pw-(e.tabw+e.thumbw)) / (e.gw[ix]);					
         newh =  (e.type==="carousel" && e.justify==="true" ? e.gh[ix] : (e.gh[ix] * m)) + (e.tabh + e.thumbh);
         }			
         if(window.rs_init_css===undefined) window.rs_init_css = document.head.appendChild(document.createElement("style"));					
         document.getElementById(e.c).height = newh;
         window.rs_init_css.innerHTML += "#"+e.c+"_wrapper { height: "+newh+"px }";				
         } catch(e){
         console.log("Failure at Presize of Slider:" + e)
         }					   
         };
      </script>
      <style type="text/css" title="dynamic-css" class="options-output">#side-panel .side-panel_sidebar{padding-top:40px;padding-right:50px;padding-bottom:40px;padding-left:50px;}</style>