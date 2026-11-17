<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   ?>  
<div class="container">
						<div class="row">
							<?php $obj_product = get_product_pb();
							foreach($obj_product as $product) {?>
							<div class="col-md-3 text-center item-pro" style="margin-bottom:30px;">
								<div class="img-container"><a href="<?php echo base_url(). $product['ccode_sec']. '/' . $product['ccode_cat'] . '/' . $product['ccode']; ?>"><img src="<?php echo base_url().'upload/images_product/resize_images/'.$product['cimage_resize']?>" alt="Shopping online" /></a></div>
								<h4 class="base_color tit-pro"><a href="<?php echo base_url(). $product['ccode_sec']. '/' . $product['ccode_cat'] . '/' . $product['ccode']; ?>"><?php echo $product['cproducts']; ?></a></h4>
								<?php if ($product['fprice_sale'] < $product['fprice']) { ?>
								<p class="price"><strong><?php echo number_format($product['fprice_sale']).'đ'; ?></strong>&nbsp;&nbsp;&nbsp;<del><?php echo number_format($product['fprice']).'đ'; ?></del></p>
								<?php } else { ?>
								<p class="price"><strong><?php echo number_format($product['fprice']).'đ'; ?></strong></p>
								<?php } ?>
							</div>
							<?php } ?>
						</div>
					</div>	
         
<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>