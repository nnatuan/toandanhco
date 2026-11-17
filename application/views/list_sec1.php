<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   ?>  
	  <section class="back-section solid-section">
         <div class="fix-image-wrap">
			<?php 
				$data = get_module_byid(66);
				if(isset($data['cnote']))
					echo $data['cnote'];
			?>
		 </div>
         <div class="theme-back"></div>
         <div class="container page-info">
            <div class="section-alt-head">
               <h2 class="text-upper" data-inview-showup="showup-translate-right"><?php echo $title; ?></h2>
               <p data-inview-showup="showup-translate-left"><?php echo $obj_sec['cnote']; ?></p>
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
      <div class="content-section container">
         <div class="row cols-lg rows-lg">
				<?php  
				$obj_product = get_product_sec($ccode_sec, $nrow_per_page, $ncurr_page , $type_sort);
				foreach($obj_product as $product) {
				?>
				<div class="col-md-3">
					<div class="item-product">
						<a href="<?php echo base_url(). $ccode_sec . '/' . $product['ccode_cat'] . '/' . $product['ccode']; ?>"><img src="<?php echo base_url().'upload/images_product/resize_images/'.$product['cimage_resize']?>" /></a>
						<h6 class="title-item"><a href="<?php echo base_url(). $ccode_sec . '/' . $product['ccode_cat'] . '/' . $product['ccode']; ?>"><?php echo $product['cproducts']?></a></h6>
						<div class="row">
							<div class="col-md-8">
								<span class="price" style="color: #e00;font-weight: bold;font-size: 20px;">
									<?php if ($product['fprice_sale'] == "" || $product['fprice_sale'] == 0) echo "Liên hệ"; else echo number_format($product['fprice_sale']).' đ'; ?>
								</span>
								</br>
								<span class="price-old">
									<?php if ($product['fprice_sale'] < $product['fprice']) { ?><del><?php echo number_format($product['fprice']).' đ'; ?></del><?php } ?>
								</span>
							</div>
							<div class="col-md-4 text-right">
								<a class="add-cart" onclick="add_cart('<?php echo $product['nid']?>',1);"><i class="fa fa-cart-arrow-down fa-2x" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php if($ntotal_page >1) {	?>
						<div class="pagination cb">
							<?php
								for($i=1; $i<=$ntotal_page; $i++){
									if($i != $ncurr_page){
								?>		
						   <a href="<?php echo base_url() . $obj_sec['ccode'] . '/trang-' . $i; ?>">
							  <?php echo $i?>
						   </a>
						   <?php }else{ ?>
						   <strong><?php echo $i?> </strong>
							<?php } } ?>
						</div>
						<?php } ?>
		 </div>
      </div>
      
<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>