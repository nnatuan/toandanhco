<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   ?>  
<style>
ul.wgl-products li .picture {
    display: table;
}
ul.wgl-products li .picture .woo_post-link {
    vertical-align: middle;
    display: table-cell;
}
.flexslider {margin-bottom:0;}
</style>
<main id="main">
    <?php $this->load->view('modules/mod_slideshow'); ?> 
	<div class="breadcrumbs">
		<div class="wgl-container">
		<a href="<?php echo base_url()?>" class="home">Trang chủ</a> <span class="divider"></span>&rarr; <span class="current"><?php echo $obj_cat['ccat_products']?></span>
		</div>
	</div>
   <div class="wgl-container single_product wgl-content-sidebar">
         <div id="main-content">
            <header class="woocommerce-products-header"></header>
			<?php if($obj_cat['cdesc']!="") echo $obj_cat['cdesc']; else { ?>
            <div class="wgl-products-catalog wgl-products-wrapper columns-4">
               <ul class="wgl-products appear-animation anim-slide-left">
				<?php $obj_product = get_product_cat($id_cat,$row_per_page,$curr_page);
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
						<p class="short_content"><?php if($product['cnote']!="") echo $product['cnote']; else echo "Vivamus non lectus justo. Sed accumsan mauris erat, elementum dapibus massa convallis vitae"; ?></p>
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
			<?php } ?>
         </div>
	  
   </div>
</main>
<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>