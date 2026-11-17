<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>	
		<?php	header("Content-Type: text/html; charset=UTF-8"); ?>			
	
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />					
		<meta name="author" content="info@raruregaming.com - http://www.raruregaming.com" />
		<meta name="description" content="raruregaming Solutions" />
		<meta name="keywords" content="raruregaming  Solutions" />
		<meta name="robots" content="all" />
		<meta name="rating" content="general" />
		<meta name="copyright" content="Copyright (c) raruregaming.net " />
		
		<!--<link href="<?php //echo base_url().'images/favicon.ico' ?>" rel="shortcut icon" type="image/x-icon">-->
		
		<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.4.3.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>js/resource/tiny_mce.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>js/resource/lightbox.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>js/js.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>js/js01.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>js/ajax_product.js"></script>	
		
		<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/resource/lightbox.css" />
		<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/template.css" />
		
		<!-- CSS -->
		<link rel="stylesheet" href="<?php echo base_url()?>css/theme/styles.css" /> 
		<link rel="stylesheet" href="<?php echo base_url()?>css/theme/skyblue.css" title="skyblue" />
		<link rel="alternate stylesheet" href="<?php echo base_url()?>css/theme/blue.css" title="blue"/> 
		<link rel="alternate stylesheet" href="<?php echo base_url()?>css/theme/violet.css" title="violet" />
		<link rel="alternate stylesheet" href="<?php echo base_url()?>css/theme/purple.css" title="purple" />
		<link rel="alternate stylesheet" href="<?php echo base_url()?>css/theme/mint.css" title="mint" />
		<link rel="alternate stylesheet" href="<?php echo base_url()?>css/theme/lime.css" title="lime" />
		<link rel="alternate stylesheet" href="<?php echo base_url()?>css/theme/darkgreen.css" title="darkgreen" />
		<link rel="alternate stylesheet" href="<?php echo base_url()?>css/theme/orange.css" title="orange" />
		<link rel="alternate stylesheet" href="<?php echo base_url()?>css/theme/hotpink.css" title="hotpink" />
		<link rel="alternate stylesheet" href="<?php echo base_url()?>css/theme/pink.css" title="pink" />
		<link rel="alternate stylesheet" href="<?php echo base_url()?>css/theme/salmon.css" title="salmon" />
		<link rel="alternate stylesheet" href="<?php echo base_url()?>css/theme/turquoise.css" title="turquoise" />
		<link rel="alternate stylesheet" href="<?php echo base_url()?>theme/css/red.css" title="red" />
		
		<!-- Jquery loaded at bottom -->
		
		<link href="<?php echo base_url()?>images/title_icon.gif" rel="shortcut icon" type="image/x-icon" />
		
		<title><?php  echo $this->lang->line('lbl.Application.Name') ?></title>
			
	</head> 
<?php 
	$url = base_url().'index.php/ajax/do_load_menu_type/option/'.$txt_nid_function_frontend; 
	if($txt_iditem != '')
		$url .= '/'.$txt_iditem;
?> 
<body onload="pb_display('<?php echo $url ?>','load_iditem_menu');""> 
<div id="SiteContainer">	
<div id="div_che"></div>
<div id="box">
 	<span id="boxtitle"></span>
  <?php  $this->load->view('logout_view/confirm_logout') ?>
</div>
<!--<ul id="switcher">
	<li><a href="#" rel="skyblue" class="styleswitch">Sky Blue</a></li>
	<li><a href="#" rel="blue" class="styleswitch">Blue</a></li>
	<li><a href="#" rel="darkgreen" class="styleswitch">Dark Green</a></li>
	<li><a href="#" rel="lime" class="styleswitch">Lime</a></li>
	<li><a href="#" rel="red" class="styleswitch">Red</a></li>
	<li><a href="#" rel="orange" class="styleswitch">Orange</a></li>
	<li><a href="#" rel="violet" class="styleswitch">Violet</a></li>
	<li><a href="#" rel="purple" class="styleswitch">Purple</a></li>
	<li><a href="#" rel="turquoise" class="styleswitch">Turquoise</a></li>
	<li><a href="#" rel="pink" class="styleswitch">Pink</a></li>
	<li><a href="#" rel="hotpink" class="styleswitch">Hot Pink</a></li>
</ul>-->