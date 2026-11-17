<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   ?>

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
				<a href="<?php echo base_url(); ?>">Trang chủ</a> / <span class="breadcrumb_last"><?php echo $obj_news['ctitle']?></span>
			</div>
            <div id="main-content" class="main-content box-page">         
               <div id="primary">
                  <div id="content" role="main">
                  	<h1 class="title-content"><?php echo $obj_news['ctitle']?></h1>
						<?php 
						switch ($event) 
						{
							case 'view':
								$this->load->view('news/news');
								break;			
							case 'sec':
								$this->load->view('news/sec_news');
								break;			
							case 'cat':
								$this->load->view('news/cat_news');
								break;			
							case 'detail':
								//$this->load->view('news/detail');
								echo $obj_news['ccontent'];
								break;
							default:
								echo $event . 'invalid event view site. please cotact with admin site for more informations';
						}
						?>
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
         <!-- .main-content-inner -->
      </div>
      <!-- .main_inner -->
   </div>
   <!-- #main -->
   </div>
   <?php $this->load->view('modules/mod_footer');?>
   <?php $this->load->view('footer');?>