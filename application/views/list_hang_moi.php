<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   ?>  
	  <section class="back-section solid-section">
         <div class="fix-image-wrap">
			
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
				$obj_product = get_product_hang_moi($nrow_per_page, $ncurr_page , $type_sort);
				foreach($obj_product as $product) {
					$obj_color_list = get_product_color($product['nid']);
															if(isset($obj_color_list[0]['nid']))
																$href=base_url().$product['ccode_sec'].'/'.$product['ccode_cat'].'/'.$product['ccode'].'-'.$obj_color_list[0]['nid'];
															else
																$href=base_url().$product['ccode_sec'].'/'.$product['ccode_cat'].'/'.$product['ccode'];
				?>
				<div class="col-md-2 col-xs-6 showup-translate-up">
					<div class="item-product">
						<a class="img-container" href="<?php echo $href ?>"><img src="<?php echo base_url().'upload/images_product/resize_images/'.$product['cimage_resize']?>" alt="<?php echo $product['cproducts']?>"/></a>
						<div class="info-product">
							<h6 class="title-item"><a href="<?php echo $href ?>"><?php echo $product['cproducts']?></a></h6>
							<div class="row">
								<div class="col-md-10 pdr0">
									<?php if ($product['cprice_sale_anvi'] < $product['cprice_anvi'] && ($product['ncheck'] == 1 || $product['cflash'] == 1)) { ?>
									<span class="price-old">
										<del>₫<?php echo number_format($product['cprice_anvi']); ?></del>
									</span>
									<span class="price">
										₫<?php echo number_format($product['cprice_sale_anvi']); ?>
									</span>
									<?php } else { ?>
									<span class="price">
										₫<?php echo number_format($product['cprice_anvi']); ?>
									</span>
									<?php } ?>
								</div>
								<?php if ($product['nhethang'] !=1) { ?>
								<div class="col-md-2 pdl0">
									<a class="add-cart" onclick="add_cart('<?php echo $product['nid']?>',1);"><i class="fa fa-cart-arrow-down" aria-hidden="true" style="font-size:20px;"></i></a>
								</div>
								<?php } ?>
							</div>
						</div>
						<?php if ($product['cprice_sale_anvi'] < $product['cprice_anvi'] && $product['ncheck'] == 1) { ?>
						<div class="shopee-item-card__badge-wrapper"><div class="shopee-badge shopee-badge--fixed-width shopee-badge--promotion"><div class="shopee-badge--promotion__label-wrapper shopee-badge--promotion__label-wrapper--vi-VN"><span class="percent"><?php echo number_format(round(($product['cprice_anvi']-$product['cprice_sale_anvi'])/$product['cprice_anvi']*100+0.4))?>%</span><span class="shopee-badge--promotion__label-wrapper__off-label shopee-badge--promotion__label-wrapper__off-label--vi-VN">giảm</span></div></div></div>
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
						   <a href="<?php echo base_url() . 'hang-moi/trang-' . $i; ?>">
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