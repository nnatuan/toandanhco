<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   ?>  
<div class="page-header page-header_align_center" style="background-image:url(https://irecco.wgl-demo.net/wp-content/uploads/2019/12/about_page-title.jpg); background-size:cover; background-repeat:no-repeat; background-attachment:scroll; background-position:bottom center;background-color: #f2f2f4; height: 350px; margin-bottom: 40px; padding-top: 80px; padding-bottom: 80px;"><div class="page-header_wrapper"><div class="wgl-container"><div class="page-header_content"><h1 class="page-header_title" style="color: #fefefe; font-size: 40px; line-height: 52px;"><?php echo $obj_news['ctitle']?></h1><div class="page-header_breadcrumbs" style="color: #e2e2e2; font-size: 16px; line-height: 24px;"><div class="breadcrumbs"><a href="<?php echo base_url(); ?>" class="home">Trang chủ</a> <span class="divider"></span> <span class="current"><?php echo $obj_news['ctitle']?></span></div><!-- .breadcrumbs --></div></div></div></div></div>
<main id="main">
         <div class="wgl-container">
            <div class="row ">
               <div id='main-content' class="wgl_col-12">
					<div data-elementor-type="wp-page" data-elementor-id="9" class="elementor elementor-9" data-elementor-settings="[]">
   <div class="elementor-inner">
      <div class="elementor-section-wrap">
         <section class="elementor-element elementor-element-cbb5dfa elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="cbb5dfa" data-element_type="section">
            <div class="elementor-container elementor-column-gap-default">
               <div class="elementor-row">
                  <div class="elementor-element elementor-element-11c8d28 elementor-column elementor-col-100 elementor-top-column" data-id="11c8d28" data-element_type="column">
                     <div class="elementor-column-wrap  elementor-element-populated">
                        <div class="elementor-widget-wrap">
                           <div class="elementor-element elementor-element-cea22c2 elementor-widget elementor-widget-spacer" data-id="cea22c2" data-element_type="widget" data-widget_type="spacer.default">
                              <div class="elementor-widget-container">
                                 <div class="elementor-spacer">
                                    <div class="elementor-spacer-inner"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="elementor-element elementor-element-21e977e elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="21e977e" data-element_type="section">
            <div class="elementor-container elementor-column-gap-extended">
               <div class="elementor-row">
                  <div class="elementor-element elementor-element-5f416ac elementor-column elementor-col-60 elementor-top-column" data-id="5f416ac" data-element_type="column">
                     <div class="elementor-column-wrap  elementor-element-populated">
                        <div class="elementor-widget-wrap">
                           <div class="elementor-element elementor-element-f23bd20 elementor-widget elementor-widget-spacer" data-id="f23bd20" data-element_type="widget" data-widget_type="spacer.default">
                              <div class="elementor-widget-container">
                                 <div class="elementor-spacer">
                                    <div class="elementor-spacer-inner"></div>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="elementor-element elementor-element-7543e09 elementor-widget elementor-widget-text-editor" data-id="7543e09" data-element_type="widget" data-widget_type="text-editor.default">
                              <div class="elementor-widget-container">
                                 <div class="elementor-text-editor elementor-clearfix">
                                    <?php echo $obj_news['ccontent']; ?>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="elementor-element elementor-element-360affa elementor-widget elementor-widget-spacer" data-id="360affa" data-element_type="widget" data-widget_type="spacer.default">
                              <div class="elementor-widget-container">
                                 <div class="elementor-spacer">
                                    <div class="elementor-spacer-inner"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

			   </div>
            </div>
         </section>
         
	  </div>
   </div>
</div>
</div>
         </div>
      </main>
<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>