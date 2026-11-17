	
<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml">
   <head>
    <meta http-equiv="pragma" content="no-cache" />
      <?php header("Content-Type: text/html; charset=UTF-8"); ?>
      <?php
         $title_global     = '';
         $tags_global      = '';
         $description_global  = '';
         ?>
      <meta property="fb:admins" content="503265236428815" />
      <meta property="fb:admins" content="100000209869996" />
      <meta property="fb:app_id" content="787435227950349" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
      <meta name="apple-mobile-web-app-capable" content="yes"/>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="content-language" content ="vn" />
      <meta property="og:url"                content="<?php echo 'https://myphamhanquocso1.com'.$_SERVER['REQUEST_URI']?>" />
      <meta property="og:type"               content="article" />
      <meta property="og:title"              content="<?php echo $title . ' - Giá cực rẻ!'?>" />
      <meta property="og:description"        content="<?php echo $fb_cdescription?>" />
      <meta property="og:image"              content="<?php echo base_url().'upload/images_product/fb/'.$cproduct_fb ?>" />
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
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,800,900" rel="stylesheet">
      <link href="<?php echo base_url()?>css/pentix.min.css?v=1.01" rel="stylesheet" type="text/css">
      <link href="<?php echo base_url()?>css/pex-theme.min.css?v=1.02" rel="stylesheet" type="text/css">
     <link href="<?php echo base_url()?>css/my_style.css?v=1.01" rel="stylesheet" type="text/css">
     <link href="<?php echo base_url()?>css/responsive_style.css?v=1.04" rel="stylesheet" type="text/css">
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
     
