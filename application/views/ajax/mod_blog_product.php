
<?php  
	$data_cat	= get_cat_product_byid($nid_cat_product);
?>

<div class="left_product">
	<?php 
		if($data_cat['cimage'] != ''):
	?>
	<a href="<?php echo base_url().'product/list_product/'.$data_cat['nid_material_products'].'/'.$data_cat['nid']; ?>"><img src="<?php echo base_url().'upload/image_cat_product/'.$data_cat['cimage']; ?>" alt="<?php echo $data_cat['cimage']; ?>" class="border_product"/></a>
	<?php endif; ?>
</div>
<div class="right_product">


<?php
	$obj_product	= get_tab_product_by_cat($nid_cat_product);
	$count = 1;
	$num_colum = 5;	
	foreach($obj_product as $data): 
?>
<?php if($count > 1 && $count%$num_colum == 1): ?>
</div>
<?php endif; ?>
<?php if($count == 1 OR $count%$num_colum == 1 ): ?>
<div class="row_product">
<?php endif; ?>
	<?php if($count > 1 && $count%5==0): ?>
	<div class="item_product border_product last">
	<?php else: ?>
	<div class="item_product border_product">
	<?php endif; ?>
		<?php if($data['cimage_resize'] !=''): ?>
		<p><a href="<?php echo base_url().'product/detail/'.$data['nid'] ?>" onMouseOver="ShowTooltip('<?php echo base_url()."ajax/ajax_product/getid/".$data['nid'];?>'); return false;" onMouseOut="HideTooltip();"><img src="<?php echo base_url().'upload/images_product/resize_images/'.$data['cimage_resize'] ?>" alt="<?php echo $data['cproducts'] ?>"/></a></p>
		<?php else: ?>
		<p><a href="<?php echo base_url().'product/detail/'.$data['nid'] ?>" onMouseOver="ShowTooltip('<?php echo base_url()."ajax/ajax_product/getid/1";?>'); return false;" onMouseOut="HideTooltip();"><img src="<?php echo base_url().'images/noimage.jpg'; ?>" alt="<?php echo $data['cproducts'] ?>" width="170" height="135" class="img_fade"/></a></p>
		<?php endif; ?>
		<h4><a href="<?php echo base_url().'product/detail/'.$data['nid'] ?>"><?php echo $data['cproducts'] ?></a></h4>
		<p class="price">
			<?php 
				if($data['fprice_sale'] != 0 && $data['fprice_sale'] != '')
					echo show_price($data['fprice_sale']).show_price_sale($data['fprice']);
				else
					echo show_price($data['fprice']);
			?>
		</p>
	</div>			
<?php if($count == count($obj_product)): ?>
</div>
<?php endif; ?>
<?php
	$count++;  
	endforeach; 
?>
</div>
<div class="clear"></div>