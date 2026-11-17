<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   ?>
<script type="text/javascript">
   function set_page(_page)
   {
   	jQuery.post( "<?php echo base_url().'news_list/set_page/'?>", { curr_page: _page})
   	  .done(function( data ) {
   		location.reload();
   	  });
   }
</script>
   <!--<div class="home-slider-inner banner-loading"></div>-->
   <div id="page" class="hfeed site full-width">
      <?php $this->load->view('modules/mod_header');
		$this->load->view('modules/mod_banner');
	  ?> 									
   </div>
   <!-- Start main slider -->
   <!-- #masthead -->
   <!-- Center -->
   <div id="main" class="site-main extra">
      <div class="main_inner">
         <div class="main-content-inner">
            <div class="linked">
			<a href="<?php echo base_url(); ?>">Trang chủ</a> / <span class="breadcrumb_last">Tin tức</span>
			</div>
            <div id="main-content" class="main-content box-page">         
               <div id="primary">
                  <div id="content" role="main">
						<?php  
				$cat_link= base_url().'tin-tuc/';
				foreach($obj_news_list as $data) {
				?>
				<div class="row news cb">
					<div class="col-md-3">
						<a href="<?php echo $cat_link.$data['ccode'].HTML; ?>"><img src="<?php echo base_url().'upload/image_article/'.$data['cimage_thumb']; ?>" /></a>
					</div>
					<div class="col-md-9">
						<h4 class="title"><a href="<?php echo $cat_link.$data['ccode'].HTML; ?>"><?php echo $data['ctitle']; ?></a></h4>
						<p class="post-date">Ngày đăng: <?php echo $data['ddate01']; ?></p>
						<?php echo $data['cshort_content']; ?>
					</div>
					<p class="read-more"><a href="<?php echo $cat_link.$data['ccode'].HTML; ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Đọc thêm</a></p>
				</div>
				
				<?php } ?>
				<div class="pagination clearfix">
					<?php
					   $total_page = round($total_row/$row_per_page +0.4);
					if($total_page > 1) {
					   for($i  =1;$i<=$total_page;$i++){
						if($i != $cur_page){
							?>
					<a href="javascript:set_page('<?php echo $i ?>')"><?php echo $i?>
					</a>
					<?php }else{ ?>
					<strong><?php echo $i?> </strong>
					<?php }
					   } } ?>
				 </div> 
                  </div>
               </div>
			   <div id="secondary">
                  <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                     <?php $this->load->view('modules/mod_menu_left'); ?>  
                  </div>
                  <!-- #primary-sidebar -->
               </div>
            </div>
         </div>
         <!-- .main-content-inner -->
      </div>
      <!-- .main_inner -->
   </div>
   <!-- #main -->
   </div>
   <?php $this->load->view('modules/mod_footer');?>
   <?php $this->load->view('footer');?>