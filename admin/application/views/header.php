<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>	
		<?php	header("Content-Type: text/html; charset=UTF-8"); ?>			
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />					
		<meta name="robots" content="all" />
		<meta name="rating" content="general" />
		<title><?php  echo $this->lang->line('lbl.Application.Name') ?></title>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/animate.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/icomoon.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/leaf.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/vendor.css">
		<link href="<?php echo base_url(); ?>css/my_style.css?v=1.0.0" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/responsive_style.css?v=1.0.0" rel="stylesheet">
		<script type="text/javascript">
		function locdau(str) {  
		  str= str.toLowerCase();  
		  str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");  
		  str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");  
		  str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");  
		  str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");  
		  str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");  
		  str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");  
		  str= str.replace(/đ/g,"d");  
		  str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-"); 
		/* tìm và thay thế các kí tự đặc biệt trong chuỗi sang kí tự - */ 
		str= str.replace(/[^0-9a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ\s]/gi, '-');
		  str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1- 
		  str= str.replace(/^\-+|\-+$/g,"");  
		//cắt bỏ ký tự - ở đầu và cuối chuỗi  
		  return str;  
		}   
		</script>
		
		
	</head> 
 