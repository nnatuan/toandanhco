<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   ?>
<script type="text/javascript">
   function set_page(_page)
   {
   	$.post("<?php echo base_url().'search/set_page/'?>", { ncurr_page: _page})
   	  .done(function( data ) {
   		location.reload();
   	  });
   }
</script>   
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
               <h2 class="text-upper" data-inview-showup="showup-translate-right">Kết quả tìm kiếm</h2>
               <p data-inview-showup="showup-translate-left"></p>
            </div>
         </div>
         <div class="section-footer">
            <div class="container" data-inview-showup="showup-translate-down">
               <ul class="page-path">
                  <li><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
                  <li class="path-separator"><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                  <li>Tìm kiếm sản phẩm</li>
               </ul>
            </div>
         </div>
      </section>
      <section class="product-list">
      <div class="content-section container mtop-30">

         <div class="row cols-lg rows-lg">
				<?php  
				$obj_product = get_search($key_word,$nrow_per_page,$ncurr_page);
				foreach($obj_product as $product) {
				?>
				<div class="col-md-2 col-xs-6 showup-translate-up">
					<div class="item-product">
						<a href="<?php echo base_url(). $product['ccode_sec'] . '/' . $product['ccode_cat'] . '/' . $product['ccode']; ?>"><img src="<?php echo base_url().'upload/images_product/resize_images/'.$product['cimage_resize']?>" alt="<?php echo $product['cproducts']?>"/></a>
						<div class="info-product">
							<h6 class="title-item"><a href="<?php echo base_url().  $product['ccode_sec']. '/' . $product['ccode_cat'] . '/' . $product['ccode']; ?>"><?php echo $product['cproducts']?></a></h6>
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
				<?php if($ntotal_page >1) {	?>
						<div class="pagination cb">
							<?php
								for($i=1; $i<=$ntotal_page; $i++){
									if($i != $ncurr_page){
								?>		
						   <a href="javascript:set_page('<?php echo $i ?>')">
							  <?php echo $i?>
						   </a>
						   <?php }else{ ?>
						   <strong><?php echo $i?> </strong>
							<?php } } ?>
						</div>
						<?php } ?>
		 </div>
      
      </div>
      </section>
<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>