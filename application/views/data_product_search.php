<?php 
$key_word = $_POST['key_word']; 
$obj_product = get_search_product($key_word);
if(count($obj_product) > 0) {
foreach($obj_product as $product) { 

																$href=base_url().$product['ccode_sec'].'/'.$product['ccode_cat'].'/'.$product['ccode'];
?>
<div class="row-item-search">
	<div class="row">
		<div class="col-md-3 col-xs-3">
			<a href="<?php echo $href ?>"><img src="<?php echo base_url().'upload/images_product/resize_images/'.$product['cimage_resize']?>" alt="<?php echo $product['cproducts']?>"/></a>
		</div>	
		<div class="col-md-9 col-xs-9">
			<h5 class="title-item"><a href="<?php echo $href ?>"><?php echo $product['cproducts']?></a></h5>
			<div>
			<?php if ($product['fprice_sale'] < $product['fprice']) { ?>
			<span class="price">
				<?php echo number_format($product['fprice_sale']); ?>₫
			</span>
			<span class="price-old">
				<del><?php echo number_format($product['fprice']); ?>₫</del>
			</span>
			<?php } else { ?>
			<span class="price">
				<?php if($product['fprice']!="") echo number_format($product['fprice']).'₫'; else echo "Liên hệ"; ?>
			</span>
			<?php } ?>
			</div>
		</div>	
	</div>	
</div>	
<?php } } else exit('0'); ?>
