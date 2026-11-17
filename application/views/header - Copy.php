<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml">
   <head>
   	<meta http-equiv="pragma" content="no-cache" />
      <?php	header("Content-Type: text/html; charset=UTF-8"); ?>
      <?php
         $title_global		= '';
         $tags_global		= '';
         $description_global	= '';
         ?>
      <meta property="fb:admins" content="503265236428815" />
      <meta property="fb:admins" content="100000209869996" />
      <meta property="fb:app_id" content="787435227950349" />
      <meta property="fb:pages" content="1943632909212911" />
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
      <link href="<?php echo base_url().'images/favicon.png' ?>" rel="shortcut icon" type="image/x-icon">
	  
	  <base href="http://runecom02.runtime.vn/" />
      <script src="<?php echo base_url(); ?>js/jquery-1.11.3.min.js"></script>
      <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
      <!--<script src="/assets/100002/js/option_selection.min.js"></script>-->
      <!--<script src="/assets/100002/js/api.jquery.min.js"></script>-->
      <script src='<?php echo base_url(); ?>js/select2.min.js?v=42' type='text/javascript'></script>
      <script src='<?php echo base_url(); ?>js/jquery.bxslider.min.js?v=42' type='text/javascript'></script>
      <script src='<?php echo base_url(); ?>js/owl.carousel.min.js?v=42' type='text/javascript'></script>
      <script src='<?php echo base_url(); ?>js/modernizr.min.js?v=42' type='text/javascript'></script>
      <script src='<?php echo base_url(); ?>js/jquery.cookie.js?v=42' type='text/javascript'></script>
      <script src='<?php echo base_url(); ?>js/jquery.countdown.min.js?v=42' type='text/javascript'></script>
      <script src='<?php echo base_url(); ?>js/jquery.fancybox.js?v=42' type='text/javascript'></script>
      <!--<script src='img/jquery.lazyload.js?v=42' type='text/javascript'></script> -->
      <script src='<?php echo base_url(); ?>js/jquery.flexslider-min.js?v=42' type='text/javascript'></script>
      <script src='<?php echo base_url(); ?>js/jquery.plugin.js?v=42' type='text/javascript'></script>
      <script src='<?php echo base_url(); ?>js/jquery.actual.min.js?v=42' type='text/javascript'></script>
      <script src='<?php echo base_url(); ?>js/jquery-ui.min.js?v=42' type='text/javascript'></script>
      <script src="<?php echo base_url(); ?>js/html5shiv.js"></script>
      <script src="<?php echo base_url(); ?>js/jquery-migrate-1.2.0.min.js"></script>
      <script src='<?php echo base_url(); ?>js/jquery.touchSwipe.min.js' type='text/javascript'></script>
      <!--<script src="/assets/100002/js/haravan.plugin.1.0.min.js"></script>-->
      <script async="" defer="defer" data-target=".product-resize" data-parent=".products-resize" data-img-box=".image-resize" src="<?php echo base_url(); ?>js/fixheightproductv2.js?v=42"></script>
      <!--------------CSS----------->
      <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href='<?php echo base_url(); ?>css/reset.css?v=42' rel='stylesheet' type='text/css' media='all' />
      <link href='<?php echo base_url(); ?>css/flexslider.css?v=42' rel='stylesheet' type='text/css' media='all' />
      <link href='<?php echo base_url(); ?>css/animate.css?v=42' rel='stylesheet' type='text/css' media='all' />
      <link href='<?php echo base_url(); ?>css/jquery.bxslider.css?v=42' rel='stylesheet' type='text/css' media='all' />
      <link href='<?php echo base_url(); ?>js/jquery.fancybox.css?v=42' rel='stylesheet' type='text/css' media='all' />
      <link href='<?php echo base_url(); ?>js/jquery-ui.css?v=42' rel='stylesheet' type='text/css' media='all' />
      <link href='<?php echo base_url(); ?>js/owl.carousel.css?v=42' rel='stylesheet' type='text/css' media='all' />
      <link href='<?php echo base_url(); ?>css/select2.min.css?v=42' rel='stylesheet' type='text/css' media='all' />
      <script src="<?php echo base_url(); ?>js/mycard.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>js/jquery.lazyload.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>js/angular.min.js"></script>
      <script src="<?php echo base_url(); ?>js/angular-sanitize.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>js/spin.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>js/angular-spinner.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>js/angular-loading-spinner.js"></script>
      <script src="<?php echo base_url(); ?>js/appMain.js"></script>
      <script src="<?php echo base_url(); ?>js/directive.js"></script>
      <script src="<?php echo base_url(); ?>js/angular-summernote.js"></script>
      <script src="<?php echo base_url(); ?>js/paging.js"></script>
      <script src="<?php echo base_url(); ?>js/ajaxServices.js"></script>
      <script src="<?php echo base_url(); ?>js/alertsServices.js"></script>
      <script src='<?php echo base_url(); ?>js/theme-script.js?v=42' type='text/javascript'></script>
      <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url(); ?>css/responsive.css" rel="stylesheet" type="text/css" />
	  <link href="<?php echo base_url(); ?>css/my_style.css" rel="stylesheet" type="text/css" />
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
