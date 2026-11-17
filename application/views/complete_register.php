<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   ?>
<style>
   .header-navigation>ul {
   display: none;
   }
   #column-left:hover ul{
   display: block;		
   }
   #column-left {
   position: absolute;
   z-index: 999;
   width: 230px;
   }
   .full {
   margin-top: 30px;
   }
   #column-left .box-category-heading {
   cursor: pointer;
   }
   .container.content-top .row {
	   position: relative;
   }
   .right-slideshow {
	   position: absolute;
	   right: 0;
   }
   .top1, .top2 .logo, .top2-right-top, .top2-right-bot, #column-left {
	   animation: none;
   }
</style>
<div class="container content-top">
   <div class="row">
      <?php $this->load->view('modules/mod_menu_left'); ?>
   </div>
</div>
<div class="content full">
   <div id="columns" class="contentin container">
      <?php //$this->load->view('modules/mod_content_header');?>            
      <div class="product full">
         <h1 class="h1-title">Kích hoạt tài khoản</h1>
         <p style="text-align:center;">
			Tài khoản của bạn đã được kích hoạt thành công!
			</br><a href="<?php echo base_url(); ?>" style="font-weight: bold;">Trở về trang chủ</a> 
         </p>
      </div>
   </div>
</div>
<?php $this->load->view('modules/mod_footer');?>
<?php $this->load->view('footer');?>