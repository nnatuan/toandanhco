<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   ?>  
<link rel="stylesheet" id="progression-style-css" href="<?php echo base_url();?>css/style_gallery.css" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript">
               jQuery(document).ready(function($) {
               	'use strict';
               	// Default Masonry Load Code
               	var $container = $('.gallery-masonry').masonry();
               	// layout Masonry again after all images have loaded
               	$container.imagesLoaded( function() {
               		$(".gallery-item-pro").addClass('opacity-pro');
					
               		$container.masonry({
                	  		itemSelector: '.gallery-item-pro',
               			columnWidth: function() { return this.size.innerWidth / 3; }
                		});
               	});
               	// END Default Masonry Load Code 

                  // Adding column size fix 
                   Masonry.prototype._getMeasurement = function (measurement, size) {
                       var option = this.options[measurement];
                       var elem;
                       if (!option) {
                           this[measurement] = 0;
                       } else if (typeof option === 'function') {
                           this[measurement] = option.call(this);
                       } else {
                           if (typeof option === 'string') {
                               elem = this.element.querySelector(option);
                           } else if (isElement(option)) {
                               elem = option;
                           }
                           this[measurement] = elem ? getSize(elem)[size] : option;
                       }
                   };
    
               		
               		
               });
</script>	
<script type="text/javascript">
	(function($) {
		$(document).ready(function() {
			$('.fancybox').fancybox();
		});
	})(jQuery);
</script>
<style>
p {
    margin: 0 0 5px 0;
}
.gallery-container-pro img {width:100%;}
/*
.elementor-slideshow__header, .elementor-lightbox .dialog-lightbox-close-button {
    display:none;
}*/
.eicon-share-arrow {display:none;}
#elementor-lightbox-slideshow-single-img {display:none !important;}
</style>

<main id="main">
    <div class="row ">
               <div id='main-content' class="wgl_col-12">
                  <div data-elementor-type="wp-page" data-elementor-id="459" class="elementor elementor-459" data-elementor-settings="[]">
                     <div class="elementor-inner">
                        <div class="elementor-section-wrap">
                           <section class="elementor-element elementor-element-6d0d8ac elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="6d0d8ac" data-element_type="section">
                              <div class="flexslider">
   <ul class="slides">
      <?php 
         $obj_data= get_banner_list();
         foreach($obj_data as $data){
         ?>
      <li class="tmhomeslider-container">
         <a href="#">
         <img src="<?php echo base_url().'upload/banner/'.$data['cimage'] ?>" />
         </a>
      </li>
      <?php }?>     
   </ul>
      
</div>

  
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
                  <div class="elementor-element elementor-element-5f416ac elementor-column elementor-col-100 elementor-top-column" data-id="5f416ac" data-element_type="column">
                     <div class="elementor-column-wrap  elementor-element-populated">
                        <div class="elementor-widget-wrap">
                           <div class="elementor-element elementor-element-f23bd20 elementor-widget elementor-widget-spacer" data-id="f23bd20" data-element_type="widget" data-widget_type="spacer.default">
                              <div class="elementor-widget-container">
                                 <div class="elementor-spacer">
                                    <div class="elementor-spacer-inner"></div>
                                 </div>
                              </div>
                           </div>
                            <div class="breadcrumbs" style="position:relative;width:100%"><a href="<?php echo base_url()?>" class="home">Trang chủ</a> <span class="divider"></span>&rarr; <span class="current"><?php echo $obj_news['ctitle']; ?></span>
							
							<div style="font-style: italic;position:absolute;right:0;bottom:0;color: #666;"><i class="fa fa-clock" aria-hidden="true"></i> 
							<?php if($obj_news['cpost_date']!="") echo $obj_news['cpost_date']; else { $pieces = explode("-", $obj_news['ddate02']); echo $pieces[2].'/'.$pieces[1].'/'.$pieces[0]; } ?>
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