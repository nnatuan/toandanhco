<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php	header("Content-Type: text/html; charset=UTF-8"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product name</title>

<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>tkb_css/css_front_end/screen.css" />
<link type="text/css" media="print" rel="stylesheet" href="<?php echo base_url()?>tkb_css/css_front_end/print.css" />

<script type="text/javascript" src="<?php echo base_url()?>tkb_js/js_front_end/mootools-1.2.1-core.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>tkb_js/js_front_end/mootools-1.2-more.js"></script>
<script type="text/javascript">
window.addEvent("domready", function(){
	var togglers = $$("#submenu h3 a");
	var elements = $$("#submenu ul ul");
	new Accordion(togglers, elements);
});
</script>
</head>

<body>
<div id="container">
	<div id="header">
		<h1><a href="/"><img align="middle" src="<?php echo base_url()?>tkb_images/image_front_end/logo.gif" alt="My Company" /></a>
			<span style="color:#009933;"><?php echo 'WEBPAGE TOKABAN CMS' ?></span>
		</h1>
		<ul id="menu">
			<li><a href="#">Trang chủ</a></li>
			<li><a href="#">Tin tức</a></li>
			<li><a href="#">Sản phẩm</a></li>
			<li><a href="#">Nghề nghiệp</a></li>
			<li><a href="#">Liên hệ</a></li>
		</ul>
	</div>
	<div id="content">
		<div id="submenu">
			<ul>
				<li>
					<h3><a href="#">Menu 1</a></h3>
					<ul>
						<li><a href="#">Menu 1.1</a></li>
						<li><a href="#">Menu 1.2</a></li>
						<li><a href="#">Menu 1.3</a></li>
						<li><a href="#">Menu 1.4</a></li>
						<li><a href="#">Menu 1.5</a></li>
					</ul>
				</li>
				<li>
					<h3><a href="#">Menu 2</a></h3>
					<ul>
						<li><a href="#">Menu 2.1</a></li>
						<li><a href="#">Menu 2.2</a></li>
						<li><a href="#">Menu 2.3</a></li>
						<li><a href="#">Menu 2.4</a></li>
						<li><a href="#">Menu 2.5</a></li>
					</ul>
				</li>
				<li>
					<h3><a href="#">Menu 3</a></h3>
					<ul>
						<li><a href="#">Menu 3.1</a></li>
						<li><a href="#">Menu 3.2</a></li>
						<li><a href="#">Menu 3.3</a></li>
						<li><a href="#">Menu 3.4</a></li>
						<li><a href="#">Menu 3.5</a></li>
					</ul>
				</li>
				<li>
					<h3><a href="#">Menu 4</a></h3>
					<ul>
						<li><a href="#">Menu 4.1</a></li>
						<li><a href="#">Menu 4.2</a></li>
						<li><a href="#">Menu 4.3</a></li>
						<li><a href="#">Menu 4.4</a></li>
						<li><a href="#">Menu 4.5</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<div id="mainContent">
			<h5 class="breadcum"><a href="<?php echo base_url().'index.php/home';?>">Trang chu</a></h5>
			<?php foreach ($datas as $obj_data):?>
				<div style="font-weight:bold;font-size:14px;color:#999;margin-bottom:5px;">
					<a href="<?php echo base_url().'index.php/detail/get_detail_byid/'.$obj_data['nid']; ?>"><?php echo $obj_data['ctitle']; ?></a>
				</div>
				<div style="overflow:hidden">
					<div style="float:left;margin-right:10px;">
						<a href="<?php echo base_url().'index.php/detail/get_detail_byid/'.$obj_data['nid']; ?>">
							<img width="150" height="150" src="<?php echo base_url().'upload/images/'.$obj_data['cthumb_img']; ?>"> 
						</a>
					</div>
					<div style="float:left"><?php echo $obj_data['cshort_content']; ?></div>
				</div>
				<div style="width:100%;border-bottom:1px #CCCCCC solid;"></div>
				<br/>
			<?php endforeach;?>
		</div>
		<div id="subContent">
			<div>a
			</div>
			<div>b
			</div>
			<div>c
			</div>
		</div>
	</div>
	<div id="footer">
		<ul>
			<li><a href="#">Trang chủ</a></li>
			<li><a href="#">Tin tức</a></li>
			<li><a href="#">Sản phẩm</a></li>
			<li><a href="#">Nghề nghiệp</a></li>
			<li><a href="#">Liên hệ</a></li>
		</ul>
	</div>
</div>
</body>
</html>

