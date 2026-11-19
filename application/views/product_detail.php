<?php 
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   $cat_product = get_product_cat_byid($id_cat);
   
   $bar1=0;$bar2=0;$bar3=0;$bar4=0;$bar5=0;$diem=0;
							  $list = get_rating_by_product($obj_detail['nid']);
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
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/rating.css"/>
<script src="<?php echo base_url(); ?>js/rating.js"></script>   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
 <style>
/* WooCommerce Star Rating Display & FontAwesome Restoration */
.woocommerce .star-rating,
.star-rating,
.woocommerce-product-rating .star-rating {
  display: inline-block !important;
  position: relative !important;
  font-family: 'FontAwesome' !important;
  font-size: 14px !important;
  line-height: 1.2 !important;
  height: 1.2em !important;
  width: 5.8em !important;
  letter-spacing: 2px !important;
  white-space: nowrap !important;
  overflow: hidden !important;
  vertical-align: middle !important;
}
.woocommerce .star-rating::before,
.star-rating::before,
.woocommerce-product-rating .star-rating::before {
  content: "\f005\f005\f005\f005\f005" !important;
  font-family: 'FontAwesome' !important;
  color: #cbd5e1 !important;
  float: left !important;
  top: 0 !important;
  left: 0 !important;
  position: absolute !important;
  letter-spacing: 2px !important;
  white-space: nowrap !important;
  font-size: 14px !important;
  line-height: 1.2 !important;
  font-style: normal !important;
  font-weight: normal !important;
}
.woocommerce .star-rating span,
.star-rating span,
.woocommerce-product-rating .star-rating span {
  overflow: hidden !important;
  float: left !important;
  top: 0 !important;
  left: 0 !important;
  position: absolute !important;
  padding-top: 1.5em !important;
  height: 0 !important;
  white-space: nowrap !important;
}
.woocommerce .star-rating span::before,
.star-rating span::before,
.woocommerce-product-rating .star-rating span::before {
  content: "\f005\f005\f005\f005\f005" !important;
  font-family: 'FontAwesome' !important;
  top: 0 !important;
  position: absolute !important;
  left: 0 !important;
  color: #f59e0b !important;
  letter-spacing: 2px !important;
  white-space: nowrap !important;
  font-size: 14px !important;
  line-height: 1.2 !important;
  font-style: normal !important;
  font-weight: normal !important;
}
.woocommerce-product-rating {
  display: flex !important;
  align-items: center !important;
  margin-bottom: 12px !important;
  line-height: 1 !important;
}

.summary.entry-summary p {
    margin-bottom: 5px;
}
.woocommerce div.product .product_title {
    font-size: 30px;
    line-height: 40px;
    margin-bottom: 20px;
}
.flexslider {margin-bottom:0;}

.item-obj {
    margin-bottom:30px;
	box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    transition-duration: 250ms;	
}
.item-obj img {
    height: 300px;
    width: 100%;
    object-fit: cover;
}
.col-md-6 .item-obj img {
    height: 450px;
}
.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
.col-md-4 {
    -ms-flex: 0 0 33.333333%;
    flex: 0 0 33.333333%;
    max-width: 33.333333%;
    padding-right: 15px;
    padding-left: 15px;	
}
/*
.col-md-3 {
    -ms-flex: 0 0 25%;
    flex: 0 0 25%;
    max-width: 25%;
    padding-right: 15px;
    padding-left: 15px;
}
*/
.col-md-6 {
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
    padding-right: 15px;
    padding-left: 15px;
}
.btn-buy {
    background-color: #fd8347 !important;
}
.btn-buy:hover {
    background-color: #ff7029 !important;
}
hr {
    border-bottom: 1px solid #eee;
}

.list-product .col-md-3 {
    float: left;
    width: 24%;
    margin: 5px;
}
body.single main .wgl-container {
    max-width: 1330px;
    width: 1330px;	
}
.video-container {
  position: relative; /* Quan trọng để video con nằm trong đây */
  width: 100%;
  padding-bottom: 56.25%; /* Tỷ lệ 16:9 (9 / 16 = 0.5625) */
  height: 0; /* Đặt chiều cao bằng 0 để padding xác định chiều cao */
  overflow: hidden; /* Ngăn chặn nội dung thừa tràn ra ngoài */
}

/* Video bên trong container */
.responsive-video {
  position: absolute; /* Quan trọng để video phủ đầy container */
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
.table-container {
  width: 100%;
  overflow-x: auto;
  background: white;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}
table {
  width: 100%;
  border-collapse: collapse;
  min-width: 600px;
}
thead {
  background: #f1f5f9;
}
th, td {
  border: 1px solid #e5e7eb;
  padding: 10px 14px;
  text-align: left;
  font-size: 14px;
}
th {
  font-weight: 600;
  color: #0e7490;
}
tbody tr:nth-child(even) {
  background: #f9fafb;
}
.note {
  margin-top: 20px;
  font-size: 13px;
  color: #374151;
}
.note p {
  margin: 4px 0;
}
@media (max-width: 768px) {
  th, td {
    font-size: 13px;
    padding: 8px 10px;
  }
}
</style> 
<main id="main">
   <?php $this->load->view('modules/mod_right'); ?>
	<div class="breadcrumbs">
		<div class="wgl-container">
		<a href="<?php echo base_url()?>" class="home">Trang chủ</a> &rarr;<a href="<?php echo base_url().'san-pham/'.$cat_product['ccode'].'-'.$cat_product['nid']?>" class="home"><?php echo $cat_product['ccat_products']?></a> <span class="divider"></span>&rarr; <span class="current"><?php echo $obj_detail['cproducts']?></span>
		</div>
	</div>
   <div class="wgl-container single_product">
      <div class="row">
         <div id="main-content" class="wgl_col-12">
            <div class="woocommerce-notices-wrapper"></div>
            <div id="product-1871" class="product type-product post-1871 status-publish first instock product_cat-solar-panels product_tag-capacity product_tag-innovation product_tag-solar-energy has-post-thumbnail shipping-taxable purchasable product-type-simple">
               
			   <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4" style="">
                <figure class="woocommerce-product-gallery__wrapper">
                  <div data-thumb="<?php echo base_url().'upload/images_product/full_images/'.$obj_detail['cimage']; ?>" data-thumb-alt="" class="woocommerce-product-gallery__image">
                    <a href="<?php echo base_url().'upload/images_product/full_images/'.$obj_detail['cimage']; ?>">
                      <img width="1080" height="1080" src="<?php echo base_url().'upload/images_product/full_images/'.$obj_detail['cimage']; ?>" class="wp-post-image" alt="" loading="lazy" title="shop_01-1" data-caption="" data-src="<?php echo base_url().'upload/images_product/full_images/'.$obj_detail['cimage']; ?>" data-large_image="<?php echo base_url().'upload/images_product/full_images/'.$obj_detail['cimage']; ?>" data-large_image_width="1140" data-large_image_height="1140" srcset="<?php echo base_url().'upload/images_product/full_images/'.$obj_detail['cimage']; ?>" sizes="(max-width: 1080px) 100vw, 1080px" />
                    </a>
                  </div>
                  
                </figure>
              </div>
               <div class="summary entry-summary">
                  <h1 class="product_title entry-title"><?php echo $obj_detail['cproducts']?></h1>
                  <?php 
                    $avg_rating = ($qty > 0) ? round($diem / $qty, 1) : 5.0;
                    $rating_percent = ($qty > 0) ? round(($avg_rating / 5) * 100) : 100;
                  ?>
                  <div class="woocommerce-product-rating">
					<div class="star-rating" role="img" aria-label="<?php echo $avg_rating; ?>/5">
					<span style="width:<?php echo $rating_percent; ?>%">Rated <strong class="rating"><?php echo $avg_rating; ?></strong></span>
					</div>								
					</div>
				<p class="price">
				<?php if($obj_detail['fprice_sale'] < $obj_detail['fprice']) { ?>	
							<del aria-hidden="true"><span class="woocommerce-Price-amount amount"><bdi><?php echo number_format($obj_detail['fprice']); ?><span class="woocommerce-Price-currencySymbol">₫</span></bdi></span></del> 
							<ins><span class="woocommerce-Price-amount amount"><bdi><?php echo number_format($obj_detail['fprice_sale']); ?><span class="woocommerce-Price-currencySymbol">₫</span></bdi></span></ins>
							<?php } else { ?>
							<span class="woocommerce-Price-amount amount"><bdi><?php if($obj_detail['fprice']!="" && $obj_detail['fprice']!=0) echo number_format($obj_detail['fprice']); else echo "Liên hệ"; ?><span class="woocommerce-Price-currencySymbol"></span></bdi></span>
							<?php } ?>
				</p>
                  <div class="woocommerce-product-details__short-description">
                     <?php echo $obj_detail['cdescription']?>
                  </div>
				  <?php if($obj_detail['clink_shoppe']!="") { ?>
                  <div class="product_meta">
                     <a href="<?php echo $obj_detail['clink_shoppe']?>" target="_blank" class="btn button btn-buy">Mua trên Shoppe</a>
                  </div>
				  <?php } ?>
               </div>
               <div class="woocommerce-tabs wc-tabs-wrapper">
                  <ul class="tabs wc-tabs" role="tablist">
                     <li class="description_tab active" id="tab-title-description" role="tab" aria-controls="tab-description">
                        <a href="#tab-description">
                        MÔ TẢ SẢN PHẨM					
						</a>
                     </li>
                  </ul>
                  <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab" id="tab-description" role="tabpanel" aria-labelledby="tab-title-description" style="display: block;">
                     <?php if($obj_detail['cdetail']!="") echo $obj_detail['cdetail']; else echo "<em>Nội dung đang được cập nhật</em>"; ?>
                  </div>
			   </div>
			   
			   <section class="listReviews" id="danhgia">
								<div class="row reviews_detail">
									<div class="diem">
										<h3>SAO TRUNG BÌNH</h3>
										<p class="averageRatings"><?php if($qty!=0) echo round($diem/$qty, 1); ?> <i class="fa fa-star checked"></i>
										</p>
									</div>
									<div class="thongke">
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
									<div class="danhgia hide">
										<button class="btn btn-danger guiDanhGia">Gửi đánh giá của bạn</button>
									</div>

									<div class="formReview">
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
													<center><button type="button" class="btn btn-danger" onclick="submit_rating('<?php echo $obj_detail['nid']; ?>');">Gửi đánh giá</button></center>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="listReviews">
									<div class="list col-md-12"> 
										<ul class="list-detail">
											<?php $list = get_rating_by_product($obj_detail['nid']);
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
				
				<?php $list = get_product_relate($obj_detail['nid'],$obj_detail['nid_cat_products']);
				if(count($list)>0) {
				?>		
               <section class="related products">
                  <h2>Sản phẩm liên quan</h2>
                  <div class="wgl-products-related wgl-products-wrapper columns-4">
                     <ul class="wgl-products appear-animation anim-slide-left">
						<?php foreach ($list as $product) { 
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
						<?php } ?>
					 </ul>
                  </div>
               </section>
			   <?php } ?>
			   
			   <?php /* $list = get_product_relate($obj_detail['nid'],$obj_detail['nid_cat_products']);
				if(count($list)>0) {
				?>
			   <div class="wgl-products-catalog wgl-products-wrapper columns-4">
											   <ul class="wgl-products appear-animation anim-slide-left">
												<?php foreach($list as $product) {
													if($product['clink']!="")
																											$href = $product['clink'];
																										else
																											$href = base_url().'sanpham/'.$product['ccode'].'-'.$product['nid'];
												?>
												  <li class="product type-product post-1871 status-publish first instock product_cat-solar-panels product_tag-capacity product_tag-innovation product_tag-solar-energy has-post-thumbnail shipping-taxable purchasable product-type-simple animate">
													 <div class="woo_product_image shop_media">
														<div class="picture"><a class="woo_post-link" href="<?php echo $href; ?>" title="<?php echo $product['cproducts']?>">
														<img width="540" height="540" src="<?php echo base_url().'upload/images_product/full_images/'.$product['cimage']?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="<?php echo base_url().'upload/images_product/full_images/'.$product['cimage']?>" sizes="(max-width: 540px) 100vw, 540px">
														</a>
														</div>
													 </div>
													 <div class="woo_product_content">
														<h2 class="woocommerce-loop-product__title"><a href="<?php echo $href; ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link" title="<?php echo $product['cproducts']?>"><?php echo $product['cproducts']?></a></h2>
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
												  
												  <?php $news = get_news_by_id(532); $href = base_url().'dich-vu/'.$news['ccode'];
												  ?>
												  <li class="product type-product post-1871 status-publish first instock product_cat-solar-panels product_tag-capacity product_tag-innovation product_tag-solar-energy has-post-thumbnail shipping-taxable purchasable product-type-simple animate">
													 <div class="woo_product_image shop_media">
														<div class="picture"><a class="woo_post-link" href="<?php echo $href; ?>" title="">
														<img width="540" height="540" src="<?php echo base_url().'upload/image_article/'.$news['cimage_thumb'] ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="<?php echo base_url().'upload/image_article/'.$news['cimage_thumb'] ?>" sizes="(max-width: 540px) 100vw, 540px">
														</a>
														</div>
													 </div>
													 <div class="woo_product_content">
														<h2 class="woocommerce-loop-product__title"><a href="<?php echo $href; ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link" title=""><?php echo $news['ctitle']?></a></h2>
														<p class="short_content"><?php echo strip_tags($news['cshort_content']); ?></p>
														<span class="price">
															<span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol"></span>Liên hệ</bdi></span>
														</span>
													 </div>
												  </li>
											   </ul>
											</div>
			   <?php } */ ?>
			   
			   
			   <?php $list = get_news_relate($obj_detail['ctag']); 
			   if($obj_detail['ctag']!="" && count($list)>0) {
			   ?>
			   <section class="related products">
                  <h2>Tin tức liên quan</h2>
                  <div class="wgl-products-related wgl-products-wrapper columns-4">
                     <ul class="wgl-products appear-animation anim-slide-left">
						<?php 
							foreach ($list as $data) { 

				?>
                  <li class="product type-product post-1871 status-publish first instock product_cat-solar-panels product_tag-capacity product_tag-innovation product_tag-solar-energy has-post-thumbnail shipping-taxable purchasable product-type-simple animate">
                     <div class="woo_product_image shop_media">
                        <div class="picture"><a class="woo_post-link" href="<?php echo base_url().'tin-tuc/'.$data['ccode']; ?>">
						<img width="540" height="540" src="<?php echo base_url().'upload/image_article/'.$data['cimage_thumb'] ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="<?php echo base_url().'upload/image_article/'.$data['cimage_thumb'] ?>" sizes="(max-width: 540px) 100vw, 540px">
						<?php /*<img width="540" height="540" src="<?php echo base_url().'upload/images_product/full_images/'.$product['cimage']?>" class="attachment-shop_catalog size-shop_catalog" alt=""> */ ?>
						</a>
						</div>
                     </div>
                     <div class="woo_product_content">
                        <h2 class="woocommerce-loop-product__title"><a href="<?php echo base_url().'tin-tuc/'.$data['ccode']; ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><?php echo $data['ctitle']?></a></h2>
                        
                     </div>
                  </li>
						<?php } ?>
					 </ul>
                  </div>
               </section>
			   <?php } ?>
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
							 ctype : 0,
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