<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   ?>  
   <style type="text/css">
   	.item-product{background: #fff;height: 258px;margin-bottom:28px;    text-align: center;}
.info-product{box-shadow:none;}
.item-product .title-item{height: 36px;}


   </style>
	  <section class="back-section solid-section">
         <div class="container page-info">
            <div class="section-alt-head">
               <h2 class="text-upper" data-inview-showup="showup-translate-right"><?php echo $title; ?></h2>
               <p data-inview-showup="showup-translate-left" style="opacity:0;">Khuyến mãi</p>
            </div>
         </div>
         <div class="section-footer">
            <div class="container" data-inview-showup="showup-translate-down">
               <ul class="page-path">
                  <li><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
                  <li class="path-separator"><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                  <li><?php echo $title; ?></li>
               </ul>
            </div>
         </div>
      </section>
      <section class="product-list">
      <div class="content-section container mtop-30">

         <div class="row cols-lg rows-lg">
				<?php  
				$obj_product = get_product_km2();
				foreach($obj_product as $product) {
				?>
				<div class="col-md-3 col-xs-6 showup-translate-up">
					<div class="item-product">
						<a href="<?php echo base_url(). $product['ccode_sec'] . '/' . $product['ccode_cat'] . '/' . $product['ccode']; ?>"><img src="<?php echo base_url().'upload/images_product/resize_images/'.$product['cimage_resize']?>" alt="<?php echo $product['cproducts']?>"/></a>
						<div class="info-product">
							<h6 class="title-item"><a href="<?php echo base_url(). $product['ccode_sec'] . '/' . $product['ccode_cat'] . '/' . $product['ccode']; ?>"><?php echo $product['cproducts']?></a></h6>
							<div class="row">
								<div class="col-md-10 pdr0">
									<?php if ($product['fprice_sale'] < $product['fprice'] && $product['ncheck'] == 1) { ?>
									<span class="price-old">
										<del>₫<?php echo number_format($product['fprice']); ?></del>
									</span>
									<span class="price">
										₫<?php echo number_format($product['fprice_sale']); ?>
									</span>
									<?php } else { ?>
									<span class="price">
										₫<?php echo number_format($product['fprice']); ?>
									</span>
									<?php } ?>
								</div>
								
							</div>
						</div>
						<?php if ($product['fprice_sale'] < $product['fprice']) { ?>
						<div class="shopee-item-card__badge-wrapper"><div class="shopee-badge shopee-badge--fixed-width shopee-badge--promotion"><div class="shopee-badge--promotion__label-wrapper shopee-badge--promotion__label-wrapper--vi-VN"><span class="percent"><?php echo number_format(round(($product['fprice']-$product['fprice_sale'])/$product['fprice']*100+0.4))?>%</span><span class="shopee-badge--promotion__label-wrapper__off-label shopee-badge--promotion__label-wrapper__off-label--vi-VN">giảm</span></div></div></div>
						<?php } ?>
						
						<?php if ($product['nhethang'] ==1) { ?>
						<div class="label-het-hang">Hết hàng</div>
						<?php } ?>
					</div>
				</div>
				<?php } ?>
				
		 </div>
		<?php if($ntotal_page >1) {	?>
						<div class="pagination cb">
							<?php
								for($i=1; $i<=$ntotal_page; $i++){
									if($i != $ncurr_page){
								?>		
						   <a href="<?php echo base_url() . 'khuyen-mai/trang-' . $i; ?>">
							  <?php echo $i?>
						   </a>
						   <?php }else{ ?>
						   <strong><?php echo $i?> </strong>
							<?php } } ?>
						</div>
						<?php } ?>
      </div>
      </section>

<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>