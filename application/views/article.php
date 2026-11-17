<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   
   ?>  

<div class="page-header page-header_align_center" style="background-image:url(https://irecco.wgl-demo.net/wp-content/uploads/2019/12/about_page-title.jpg); background-size:cover; background-repeat:no-repeat; background-attachment:scroll; background-position:bottom center;background-color: #f2f2f4; height: 350px; margin-bottom: 40px; padding-top: 80px; padding-bottom: 80px;"><div class="page-header_wrapper"><div class="wgl-container"><div class="page-header_content"><h1 class="page-header_title" style="color: #fefefe; font-size: 40px; line-height: 52px;"><?php echo $obj_content['ctitle']?> </h1><div class="page-header_breadcrumbs" style="color: #e2e2e2; font-size: 16px; line-height: 24px;"><div class="breadcrumbs"><a href="<?php echo base_url(); ?>" class="home">Trang chủ</a> <span class="divider"></span> <span class="current"><?php echo $obj_content['ctitle']?> </span></div><!-- .breadcrumbs --></div></div></div></div></div>
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
                           
                           <div class="elementor-element elementor-element-7543e09 elementor-widget elementor-widget-text-editor" data-id="7543e09" data-element_type="widget" data-widget_type="text-editor.default">
                              <div class="elementor-widget-container">
                                 <div class="elementor-text-editor elementor-clearfix">
                                    <?php echo $obj_content['eng_ccontent']?>
									<div class="wgl-products-catalog wgl-products-wrapper columns-4" style="margin-top:30px;">
									   <ul class="wgl-products appear-animation anim-slide-left">
										<?php $obj_product = get_product_by_sec_article($obj_content['nid_sec_product']);
										foreach($obj_product as $product) {
											if($product['clink']!="")
																									$href = $product['clink'];
																								else
																									$href = base_url().'sanpham/'.$product['ccode'].'-'.$product['nid'];
										?>
										  <li class="product type-product post-1871 status-publish first instock product_cat-solar-panels product_tag-capacity product_tag-innovation product_tag-solar-energy has-post-thumbnail shipping-taxable purchasable product-type-simple animate">
											 <div class="woo_product_image shop_media">
												<div class="picture"><a class="woo_post-link" href="<?php echo $href; ?>">
												<img width="540" height="540" src="<?php echo base_url().'upload/images_product/full_images/'.$product['cimage']?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="<?php echo base_url().'upload/images_product/full_images/'.$product['cimage']?>" sizes="(max-width: 540px) 100vw, 540px">
												<?php /*<img width="540" height="540" src="<?php echo base_url().'upload/images_product/full_images/'.$product['cimage']?>" class="attachment-shop_catalog size-shop_catalog" alt=""> */ ?>
												</a>
												</div>
											 </div>
											 <div class="woo_product_content">
												<h2 class="woocommerce-loop-product__title"><a href="<?php echo $href; ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><?php echo $product['cproducts']?></a></h2>
												<p class="short_content"><?php echo $product['cnote']; ?></p>
												<span class="price">
													<?php if($product['fprice_sale'] < $product['fprice']) { ?>	
													<del aria-hidden="true"><span class="woocommerce-Price-amount amount"><bdi><?php echo number_format($product['fprice']); ?><span class="woocommerce-Price-currencySymbol">₫</span></bdi></span></del> 
													<ins><span class="woocommerce-Price-amount amount"><bdi><?php echo number_format($product['fprice_sale']); ?><span class="woocommerce-Price-currencySymbol">₫</span></bdi></span></ins>
													<?php } else { ?>
													<span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol"></span><?php if($product['fprice']!="" && $product['fprice']!=0) echo number_format($product['fprice']); else echo "Liên hệ"; ?></bdi></span>
													<?php } ?>
												</span>
											 </div>
										  </li>
										  <?php } ?>
									   </ul>
									</div>
									
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