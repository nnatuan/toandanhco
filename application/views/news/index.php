<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   
   $bar1=0;$bar2=0;$bar3=0;$bar4=0;$bar5=0;$diem=0;
							  $list = get_rating_by_news($obj_news['nid']);
							  $qty=count($list);
								foreach($list as $data) { 
									$diem += $data['crating'];
									if($data['crating']==1) 
										$bar1 += 1;
									elseif($data['crating']==2) 
										$bar2 += 1;	
									elseif($data['crating']==3) 
										$bar3 += 1;	
									elseif($data['crating']==4) 
										$bar4 += 1;	
									elseif($data['crating']==5) 
										$bar5 += 1;	
								}
   ?>  

<link rel="stylesheet" id="progression-style-css" href="<?php echo base_url();?>css/style_gallery.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/rating.css"/>
<script src="<?php echo base_url(); ?>js/rating.js"></script>   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<style>
.elementor hr {
    margin: 20px 0 20px;
}
h4 {
    margin-bottom: 10px;
}
h3, h3 a, h3 span {
    font-size: 28px;
}
h4, h4 a, h4 span {
    font-size: 20px;
}
h5, h5 a, h5 span {
    font-size: 18px;
}
.area_img {display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;}
.href_img {flex: 1; margin-right: 10px;}
tr th {
    background: #eee;
    font-weight: bold;
}
</style>
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
.elementor-section.elementor-section-boxed > .elementor-container {
    max-width: 1330px;
}
.listReviews {width:100%;}
.thongke {
    width: 66%;
}
.item-obj {
    margin-bottom: 30px;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    transition-duration: 250ms;
}
.item-obj img {
    height: 300px;
    width: 100%;
    object-fit: cover;
}
</style>

<main id="main">
    <div class="row ">
               <div id='main-content' class="wgl_col-12">
                  <div data-elementor-type="wp-page" data-elementor-id="459" class="elementor elementor-459" data-elementor-settings="[]">
                     <div class="elementor-inner">
                        <div class="elementor-section-wrap">
                           <?php $this->load->view('modules/mod_right'); ?> 
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
						   
						   <section class="listReviews" id="danhgia">
								<div class="row reviews_detail">
									<div class="diem col-md-4">
										<h3>SAO TRUNG BÌNH</h3>
										<p class="averageRatings"><?php if($qty!=0) echo round($diem/$qty, 1); ?> <i class="fa fa-star checked"></i>
										</p>
									</div>
									<div class="thongke col-md-8">
										<div>
											<div class="side">
												<div>5 <i class="fa fa-star checked"></i></div>
											</div>
											<div class="middle">
												<div class="bar-container">
													<div class="bar bar-5" style="width:<?php if($qty!=0) echo $bar5/$qty*100; ?>%"></div>
												</div>
											</div>
											<div class="side text-right">
												<div><?php echo $bar5; ?> đánh giá</div>
											</div>
										</div>
										<div>
											<div class="side">
												<div>4 <i class="fa fa-star checked"></i></div>
											</div>
											<div class="middle">
												<div class="bar-container">
													<div class="bar bar-4" style="width:<?php if($qty!=0) echo $bar4/$qty*100; ?>%"></div>
												</div>
											</div>
											<div class="side text-right">
												<div><?php echo $bar4; ?> đánh giá</div>
											</div>
										</div>
										<div>
											<div class="side">
												<div>3 <i class="fa fa-star checked"></i></div>
											</div>
											<div class="middle">
												<div class="bar-container">
													<div class="bar bar-3" style="width:<?php if($qty!=0) echo $bar3/$qty*100; ?>%"></div>
												</div>
											</div>
											<div class="side text-right">
												<div><?php echo $bar3; ?> đánh giá</div>
											</div>
										</div>
										<div>
											<div class="side">
												<div>2 <i class="fa fa-star checked"></i></div>
											</div>
											<div class="middle">
												<div class="bar-container">
													<div class="bar bar-2" style="width:<?php if($qty!=0) echo $bar2/$qty*100; ?>%"></div>
												</div>
											</div>
											<div class="side text-right">
												<div><?php echo $bar2; ?> đánh giá</div>
											</div>
										</div>
										<div>
											<div class="side">
												<div>1 <i class="fa fa-star checked"></i></div>
											</div>
											<div class="middle">
												<div class="bar-container">
													<div class="bar bar-1" style="width:<?php if($qty!=0) echo $bar1/$qty*100; ?>%"></div>
												</div>
											</div>
											<div class="side text-right">
												<div><?php echo $bar1; ?> đánh giá</div>
											</div>
										</div>
									</div>
									<div class="danhgia col-md-3 hide">
										<button class="btn btn-danger guiDanhGia">Gửi đánh giá của bạn</button>
									</div>

									<div class="formReview col-md-12">
										<form id="formReview" method="post" enctype="multipart/form-data">
											<div class="stars">
												<span><b>Vui lòng chọn đánh giá: </b></span>
												<label class="rate">
													<input type="radio" name="crating" id="star1" value="1">
													<i class="fa fa-star-o star one-star"></i>
												</label>
												<label class="rate">
													<input type="radio" name="crating" id="star2" value="2">
													<i class="fa fa-star-o star two-star"></i>
												</label>
												<label class="rate">
													<input type="radio" name="crating" id="star3" value="3">
													<i class="fa fa-star-o star three-star"></i>
												</label>
												<label class="rate">
													<input type="radio" name="crating" id="star4" value="4">
													<i class="fa fa-star-o star four-star"></i>
												</label>
												<label class="rate">
													<input type="radio" name="crating" id="star5" value="5">
													<i class="fa fa-star-o star five-star"></i>
												</label>
											</div>
											<div class="review">
												<div class="col-md-6">
													<div class="form-group">
														<label for="detail">Đánh giá:</label>
														<textarea class="form-control" rows="5" id="ccontent_rating" name="detail"></textarea>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="nickname">Họ và tên:</label>
														<input type="text" class="form-control" id="cname_rating" name="nickname">
													</div>
													<div class="form-group">
														<label for="phone">Số điện thoại:</label>
														<input type="text" class="form-control" id="cphone_rating" name="phone">
													</div>
													<center><button type="button" class="btn btn-danger" onclick="submit_rating('<?php echo $obj_news['nid']; ?>');">Gửi đánh giá</button></center>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="listReviews">
									<div class="list col-md-12"> 
										<ul class="list-detail">
											<?php $list = get_rating_by_news($obj_news['nid']);
											foreach($list as $data) { ?>
											<li id="review-8010">
												<div class="reviewer"><span><?php echo $data['cname']; ?></span> | <label class="smemberRv"><i class="fa fa-check-circle" aria-hidden="true"></i> Đã mua sản phẩm tại Toàn Danh</label> | Ngày <?php echo date("d/m/Y H:i:s",$data['ctime']); ?> </div>
												<div class="review-content"><p><span>
												<?php for($i=1;$i<6;$i++) { ?>
												<i class="fa fa-star <?php if($i<=$data['crating']) echo 'checked' ?>"></i>
												<?php } ?>  
												</span><i><?php echo $data['ccontent']; ?></i></p>
												</div>
											</li><hr>
											<?php } ?>                        
										</ul>
									</div>
								</div>
							 </section>
					
                           
                           <div class="elementor-element elementor-element-360affa elementor-widget elementor-widget-spacer" data-id="360affa" data-element_type="widget" data-widget_type="spacer.default">
                              <div class="elementor-widget-container">
                                 <div class="elementor-spacer">
                                    <div class="elementor-spacer-inner"></div>
                                 </div>
                              </div>
                           </div>
						   
						   <?php if($obj_news['cproduct_str_id']!="") {
						   $pieces = explode(",", $obj_news['cproduct_str_id']); 
						   $count = count($pieces);?>
						   <section class="related products">
							  <h2>Sản phẩm đặc biệt dành cho bạn</h2>
							  <div class="wgl-products-related wgl-products-wrapper columns-4">
								 <ul class="wgl-products appear-animation anim-slide-left">
									<?php for($i=0;$i<$count;$i++) {
												$product = get_product_by_id($pieces[$i]);
												if(isset($product['nid'])) {
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
										<span class="woocommerce-Price-amount amount"><bdi><?php if($product['fprice']!="" && $product['fprice']!=0) echo number_format($product['fprice']); else echo "Liên hệ"; ?><span class="woocommerce-Price-currencySymbol"></span></bdi></span>
										<?php } ?>
									</span>
								 </div>
							  </li>
								<?php } } ?>
								 </ul>
							  </div>
						   </section>
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
</div>
         </div>
      </main>
	  
<script defer>
	function submit_rating(_id){
		var _crating = jQuery("input[name=crating]:checked").val();
		var _cname = jQuery('#cname_rating').val();
		var _cphone = jQuery('#cphone_rating').val();
		var _ccontent = jQuery('#ccontent_rating').val();
		//alert(_crating);
		if(_cname != '' && _cphone != '' && _ccontent != '') {
					jQuery.ajax({
						url : "<?php echo base_url(); ?>ajax_actions/rating",
						type : "post",
						dataType:"text",
						data : {
							 ctype : 1,
							 nid_product : _id,
							 crating : _crating,
							 cname : _cname,
							 cphone : _cphone,
							 ccontent : _ccontent
						},
						success : function (result){
							window.location.reload();
						}
					});
				} else 
					alert('Bạn chưa nhập đủ thông tin.');
}	

	window.addEventListener('DOMContentLoaded', function() {
		reviews.rating();
		reviews.showInputRating();
	});
</script>
<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>