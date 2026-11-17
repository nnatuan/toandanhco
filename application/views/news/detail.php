<div class="mod-left">
   <div class="block_title" style="padding-left:0px;">
      <h1 class="h1-title"><?php echo $obj_news['ctitle'] ?></h1>
   </div>
   
 
   <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
   <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-526297fd331e8326"></script>
   <div style="padding:10px 40px 10px 10px;;">
      <?php echo $obj_news['ccontent']  ;?>
  

   <?php  
				$obj_product = get_product_in_array($obj_news['ctag']);
				foreach($obj_product as $product) {
				?>
				<div class="col-md-2 col-xs-6" data-inview-showup="showup-translate-up">
					<div class="item-product">
						<a href="<?php echo base_url(). $product['ccode_sec'] . '/' . $product['ccode_cat'] . '/' . $product['ccode']; ?>"><img src="<?php echo base_url().'upload/images_product/resize_images/'.$product['cimage_resize']?>" alt="<?php echo $product['cproducts']?>"/></a>
						<div class="info-product">
							<h6 class="title-item"><a href="<?php echo base_url(). $product['ccode_sec'] . '/' . $product['ccode_cat'] . '/' . $product['ccode']; ?>"><?php echo $product['cproducts']?></a></h6>
							<div class="row">
								<div class="col-md-10 pdr0">
									<?php if ($product['fprice_sale'] < $product['fprice']) { ?>
									<span class="price-old">
										<del>₫<?php echo number_format($product['fprice']); ?></del>
									</span>
									<?php } ?>
									<span class="price">
										₫<?php if ($product['fprice_sale'] == "" || $product['fprice_sale'] == 0) echo "Liên hệ"; else echo number_format($product['fprice_sale']); ?>
									</span>
								</div>
								<div class="col-md-2 pdl0">
									<a class="add-cart" onclick="add_cart('<?php echo $product['nid']?>',1);"><i class="fa fa-cart-arrow-down" aria-hidden="true" style="font-size:20px;"></i></a>
								</div>
							</div>
						</div>
						<?php if ($product['fprice_sale'] < $product['fprice']) { ?>
						<div class="shopee-item-card__badge-wrapper"><div class="shopee-badge shopee-badge--fixed-width shopee-badge--promotion"><div class="shopee-badge--promotion__label-wrapper shopee-badge--promotion__label-wrapper--vi-VN"><span class="percent"><?php echo number_format(round(($product['fprice']-$product['fprice_sale'])/$product['fprice']*100+0.4))?>%</span><span class="shopee-badge--promotion__label-wrapper__off-label shopee-badge--promotion__label-wrapper__off-label--vi-VN">giảm</span></div></div></div>
						<?php } ?>
					</div>
				</div>
				<?php } ?>
   </div>
</div>

