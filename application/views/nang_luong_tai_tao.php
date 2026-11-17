<?php 
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header'); 		
?>
<div class="page-header page-header_align_center" style="background-image:url(https://irecco.wgl-demo.net/wp-content/uploads/2019/12/contact_page-title.jpg); background-size:cover; background-repeat:no-repeat; background-attachment:scroll; background-position:bottom center;background-color: #f2f2f4; height: 350px; margin-bottom: 40px; padding-top: 80px; padding-bottom: 80px;"><div class="page-header_wrapper"><div class="wgl-container"><div class="page-header_content"><h1 class="page-header_title" style="color: #fefefe; font-size: 52px; line-height: 52px;">Năng lượng tái tạo</h1><div class="page-header_breadcrumbs" style="color: #e2e2e2; font-size: 16px; line-height: 24px;"><div class="breadcrumbs"><a href="<?php echo base_url(); ?>" class="home">Trang chủ</a> <span class="divider"></span> <span class="current">Năng lượng tái tạo</span></div><!-- .breadcrumbs --></div></div></div></div></div>
<main id="main">
   <div class="wgl-container">
      <div class="row ">
         <div id="main-content" class="wgl_col-12">
            <div data-elementor-type="wp-page" data-elementor-id="868" class="elementor elementor-868" data-elementor-settings="[]">
               <div class="elementor-inner">
                  <div class="elementor-section-wrap">
                     <section class="elementor-element elementor-element-3e655ab elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="3e655ab" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}" style="width: 1583px; left: 0px;">
                        <div class="elementor-container elementor-column-gap-default">
                           <div class="elementor-row">
                              <div class="elementor-element elementor-element-487a1aa elementor-column elementor-col-100 elementor-top-column" data-id="487a1aa" data-element_type="column">
                                 <div class="elementor-column-wrap  elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                       <div class="elementor-element elementor-element-7b1b8d2 elementor-widget elementor-widget-spacer" data-id="7b1b8d2" data-element_type="widget" data-widget_type="spacer.default">
                                          <div class="elementor-widget-container">
                                             <div class="elementor-spacer">
                                                <div class="elementor-spacer-inner"></div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="elementor-element elementor-element-d08985f elementor-widget elementor-widget-wgl-blog" data-id="d08985f" data-element_type="widget" data-settings="{&quot;blog_columns&quot;:&quot;4&quot;}" data-widget_type="wgl-blog.default">
                                          <div class="elementor-widget-container">
                                             <section class="wgl_cpt_section">
                                                <div class="blog-posts">
                                                   <div class="container-grid row blog_carousel blog-style-standard">
                                                      <div class="wgl-carousel_wrapper">
                                                         <section class="wgl_cpt_section">
                                                      <div class="blog-posts">
                                                         <div class="container-grid row blog_carousel blog-style-standard">
                                                            <div class="wgl-carousel_wrapper">
                                                               <div id=irecco_carousel_5ee8dd9c86a53 class="wgl-carousel pagination_circle_border pag_align_center">
                                                                  <div class="wgl-carousel_slick" data-slick='{"slidesToShow":3,"slidesToScroll":3,"infinite":false,"variableWidth":false,"autoplay":false,"autoplaySpeed":"","speed":300,"arrows":false,"dots":true,"adaptiveHeight":true,"responsive":[{"breakpoint":1025,"settings":{"slidesToShow":2,"slidesToScroll":2}},{"breakpoint":767,"settings":{"slidesToShow":1,"slidesToScroll":1}},{"breakpoint":480,"settings":{"slidesToShow":1,"slidesToScroll":1}}]}'>
                                                                     <?php $list = get_news_by_cat(3); 
																	 foreach ($list as $data) { 
																		if($data['clink']!="")
																			$href = $data['clink'];
																		else
																			$href = base_url().'nang-luong-tai-tao/'.$data['ccode'];
																	 ?>
																	 <div class="wgl_col-4 item">
                                                                        <div class="blog-post format-standard-image">
                                                                           <div class="blog-post_wrapper">
                                                                              <div class="blog-post_media">
                                                                                 <a href="<?php echo $href; ?>" class="bg-read-more"></a>
                                                                                 <div class="blog-post_media_part"><a href="<?php echo $href; ?>" class="blog-post_feature-link"><img src='<?php echo base_url().'upload/image_article/'.$data['cimage_thumb'] ?>' alt='' /></a></div>
                                                                              </div>
                                                                              <div class="blog-post_content">
                                                                                 <h3 class="blog-post_title"><a href="<?php echo $href; ?>"><?php echo $data['ctitle']; ?></a></h3>
                                                                                 <div class="blog-post_text">
                                                                                    <?php echo $data['cshort_content']; ?>
                                                                                 </div>
                                                                              </div>
                                                                           </div>
                                                                        </div>
                                                                     </div>
                                                                     <?php } ?>
																  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </section>
                                                      </div>
                                                   </div>
                                                </div>
                                             </section>
                                          </div>
                                       </div>
                                       <div class="elementor-element elementor-element-908be23 elementor-widget elementor-widget-spacer" data-id="908be23" data-element_type="widget" data-widget_type="spacer.default">
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
   </div>
</main>              
<?php 
	$this->load->view('modules/mod_footer'); 
	$this->load->view('footer'); 
?>