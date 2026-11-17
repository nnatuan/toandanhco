
<?php header("Content-Type: text/html; charset=UTF-8"); ?>
<?php if($nid_metarial_products != '' && $nid_metarial_products != 0)
	{ ?>
<select style="width:200px" name="cbo_nid_cat_products" >
	<?php foreach($datas as $data): 
	?>
		<option <?php if($data['nid'] == $nid_cat_products){echo 'selected="selected"';} ?> value="<?php echo $data['nid'] ?>">
			<?php echo $data['ccat_products'] ?>
		</option>
	<?php endforeach; ?>
</select>
<?php }
		else {
?>
<select style="width:200px" name="cbo_nid_cat_products" >
	<option value=""><?php echo $this->lang->line('lbl.product.choose_cat_product'); ?></option>
</select>
<?php } ?>


