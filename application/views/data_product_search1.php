<?php 
$key_word = $_POST['key_word']; 
$obj_product = get_search_product($key_word);
foreach($obj_product as $product) { 
$obj_color_list = get_product_color($product['nid']);
															if(isset($obj_color_list[0]['nid']))
																$href=base_url().$product['ccode_sec'].'/'.$product['ccode_cat'].'/'.$product['ccode'].'-'.$obj_color_list[0]['nid'];
															else
																$href=base_url().$product['ccode_sec'].'/'.$product['ccode_cat'].'/'.$product['ccode'];
?>
<div class="row-item-search">
	<div class="row">
		<div class="col-md-2 col-xs-3">
			<a href="<?php echo $href ?>"><img src="<?php echo base_url().'upload/images_product/resize_images/'.$product['cimage_resize']?>" alt="<?php echo $product['cproducts']?>"/></a>
		</div>	
		<div class="col-md-10 col-xs-9">
			<h6 class="title-item"><a href="<?php echo $href ?>"><?php echo $product['cproducts']?></a></h6>
			<div>
			<?php if ($product['fprice_sale'] < $product['fprice'] && $product['ncheck'] == 1) { ?>
			<span class="price">
				₫<?php echo number_format($product['fprice_sale']); ?>
			</span>
			<span class="price-old">
				<del>₫<?php echo number_format($product['fprice']); ?></del>
			</span>
			<?php } else { ?>
			<span class="price">
				₫<?php echo number_format($product['fprice']); ?>
			</span>
			<?php } ?>
			</div>
		</div>	
	</div>	
</div>	
<?php } ?>