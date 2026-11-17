<div id="SiteContent_main">

 	<!-- Quick Links -->			
<?php $permission = Fget_userdata('session_user_isadmin');
if($permission ==3){
?>
<ul class="quicklinks" style="margin-top:0;padding-top:0">				

	<li><a href="<?php echo base_url().'index.php/do_config_listview' ?>"><img src="<?php echo base_url() ?>images/fatcow_icons/32x32/cog.png" alt="" />Cấu hình</a></li>	
	<li><a href="<?php echo base_url().'index.php/do_employee_listview' ?>"><img src="<?php echo base_url() ?>images/fatcow_icons/32x32/group.png" alt="" />Người dùng</a></li>
  <li><a href="<?php echo base_url().'index.php/do_banner_images_listview' ?>"><img src="<?php echo base_url() ?>images/fatcow_icons/32x32/calendar.png" alt="" />Slider</a></li>
	<li><a href="<?php echo base_url().'index.php/do_module_listview' ?>"><img src="<?php echo base_url() ?>images/fatcow_icons/32x32/icon_module_new_32.png" alt="" />Module </a></li>	
    
				

</ul>	

<ul class="quicklinks" style="padding:10px 0 10px 0">
	<li><a href="<?php echo base_url().'index.php/do_article_listview' ?>"><img src="<?php echo base_url() ?>images/fatcow_icons/32x32/kontact_news.png" alt="" />Bài Viết</a></li>
    <li><a href="<?php echo base_url().'index.php/do_news_listview' ?>"><img src="<?php echo base_url() ?>images/fatcow_icons/32x32/kontact_news.png" alt="" />Tin tức </a></li>
	<li><a href="<?php echo base_url().'index.php/do_gallery_img_listview/get/35' ?>"><img src="<?php echo base_url() ?>images/fatcow_icons/32x32/gallery.png" alt="" />Gallery</a></li>
	<li><a href="<?php echo base_url().'index.php/do_testimonial_listview' ?>"><img src="<?php echo base_url() ?>images/fatcow_icons/32x32/testimonial.png" alt="" />Testimonial</a></li>
</ul>


	<!-- Box / 2/3 Width / Graphs -->
<?php }else if($permission =="1"){ ?>
<ul class="quicklinks" style="padding:10px 0 10px 0">
<li><a href="<?php echo base_url().'index.php/do_news_listview' ?>"><img src="<?php echo base_url() ?>images/fatcow_icons/32x32/kontact_news.png" alt="" />Tin tức </a></li>
 <li><a href="<?php echo base_url().'index.php/do_article_listview' ?>"><img src="<?php echo base_url() ?>images/fatcow_icons/32x32/kontact_news.png" alt="" />Bài Viết</a></li>
</ul>
<?php }?>
</div>
