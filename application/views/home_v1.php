<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   //$this->load->view('modules/mod_slideshow');
   ?>     

                        <div class="slider-mainB-home" style="display:block; background-image: linear-gradient(to right, #fff , #f5f5f5);width:100%;">
							<?php 
							 $obj_data= get_banner_list();
							 foreach($obj_data as $data){
							 ?>
                           <a target="_blank" class="full left tr-2banner-link" href="#">
                           <img class="lazyOwl" src="<?php echo base_url(); ?>images/ImgBlank.png" data-src="<?php echo base_url().'upload/banner/'.$data['cimage'] ?>" alt="Đi chợ tại gia, chẳng sợ Corona - Yes24 Việt Nam"  />
                           </a>
							 <?php } ?>
                        </div>
                                 
<div class="h30 desktop"></div>		
<div class="container">
						<div class="row">
							<div class="col-xs-4">
								<?php $m = get_module_byid(1); ?>
								<a href="#"><img src="<?php echo base_url().'upload/images_module/'.$m['cimage']; ?>" alt="Shopping online" class="img-banner" /></a>
							</div>
							<div class="col-xs-4">
								<?php $m = get_module_byid(2); ?>
								<a href="#"><img src="<?php echo base_url().'upload/images_module/'.$m['cimage']; ?>" alt="Shopping online" class="img-banner" /></a>
							</div>
							<div class="col-xs-4">
								<?php $m = get_module_byid(3); ?>
								<a href="#"><img src="<?php echo base_url().'upload/images_module/'.$m['cimage']; ?>" alt="Shopping online" class="img-banner" /></a>
							</div>
						</div>
					</div>
<div class="part text-center pdt-0-m">					
	<div class="container">
		<h3 class="tit-main"><span>CHƯƠNG TRÌNH KHUYẾN MÃI</span>&nbsp;&nbsp;<span style="border: 0;font-size: 16px;"><a href="#" style="color:#d3364a;"><em>Xem tất cả <i class="fa fa-long-arrow-right" aria-hidden="true"></i></em></a></span></h3>
			<div id="myCarousel" class="carousel slide text-center desktop" data-ride="carousel" data-interval="false" data-pause="hover">
			   <div class="carousel-inner">
				<?php $list = get_product_km(); 
					$count = count($list);
					for($i=0;$i<$count;$i=$i+4) { ?>
				  <div class="item <?php if($i==0) echo 'active'; ?>">
						<div class="row">
							<?php $list = get_product_km_limit($i,4);
								foreach ($list as $product) { ?>
							<div class="col-md-3 item-pro">
								<a href="<?php echo base_url(). $product['ccode_sec']. '/' . $product['ccode_cat'] . '/' . $product['ccode']; ?>"><img src="<?php echo base_url().'upload/images_product/resize_images/'.$product['cimage_resize']?>" alt="Shopping online" /></a>
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
					<?php } ?>
				</div>
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			   <span class="glyphicon glyphicon-chevron-left"></span>
			   <span class="sr-only">Previous</span>
			   </a>
			   <a class="right carousel-control" href="#myCarousel" data-slide="next">
			   <span class="glyphicon glyphicon-chevron-right"></span>
			   <span class="sr-only">Next</span>
			   </a>
			</div>
			<div id="myCarousel-m" class="carousel slide text-center mobile" data-ride="carousel" data-interval="false" data-pause="hover">
			   <div class="carousel-inner">
				<?php $i=0; $list = get_product_km(); 
					foreach ($list as $product) { ?>
				  <div class="item <?php if($i==0) echo 'active'; ?>">
						<div class="row">
							<div class="col-md-3 item-pro">
								<a href="<?php echo base_url(). $product['ccode_sec']. '/' . $product['ccode_cat'] . '/' . $product['ccode']; ?>"><img src="<?php echo base_url().'upload/images_product/resize_images/'.$product['cimage_resize']?>" alt="Shopping online" /></a>
								<h4 class="base_color tit-pro"><a href="<?php echo base_url(). $product['ccode_sec']. '/' . $product['ccode_cat'] . '/' . $product['ccode']; ?>"><?php echo $product['cproducts']; ?></a></h4>
								<?php if ($product['fprice_sale'] < $product['fprice']) { ?>
								<p class="price"><strong><?php echo number_format($product['fprice_sale']).'đ'; ?></strong>&nbsp;&nbsp;&nbsp;<del><?php echo number_format($product['fprice']).'đ'; ?></del></p>
								<?php } else { ?>
								<p class="price"><strong><?php echo number_format($product['fprice']).'đ'; ?></strong></p>
								<?php } ?>
							</div>
						</div>
					</div>	
					<?php $i++;} ?>
				</div>
				<a class="left carousel-control" href="#myCarousel-m" data-slide="prev">
			   <span class="glyphicon glyphicon-chevron-left"></span>
			   <span class="sr-only">Previous</span>
			   </a>
			   <a class="right carousel-control" href="#myCarousel-m" data-slide="next">
			   <span class="glyphicon glyphicon-chevron-right"></span>
			   <span class="sr-only">Next</span>
			   </a>
			</div>
	</div>
</div>	
<div class="part part-popular text-center">					
	<div class="container">
		<h3 class="tit-main"><span>SẢN PHẨM PHỔ BIẾN</span></h3>
						<div class="row">
							<?php $list = get_product_pb();
								foreach ($list as $product) { ?>
							<div class="col-md-3 item-pro">
								<a href="<?php echo base_url(). $product['ccode_sec']. '/' . $product['ccode_cat'] . '/' . $product['ccode']; ?>"><img src="<?php echo base_url().'upload/images_product/resize_images/'.$product['cimage_resize']?>" alt="Shopping online" /></a>
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
</div>	
<div class="part text-center">					
	<div class="container">
		<h3 class="tit-main"><span>CẨM NANG</span></h3>
						<div class="row">
							<?php  
								$list = get_news_home_by_cat(54);
								foreach($list as $data) {
								?>
							<div class="col-md-4">
								<div class="box-news">
									<a href="<?php echo base_url().'cam-nang/'.$data['ccode']; ?>"><img src="<?php echo base_url().'upload/image_article/'.$data['cimage_thumb'] ?>" alt="Shopping online" /></a>
									<div class="box-news-tit">
										<h4 style="font-size: 16px;text-align: left;line-height: 22px;min-height:44px;"><a href="<?php echo base_url().'cam-nang/'.$data['ccode']; ?>" class="base_color"><?php echo $data['ctitle']; ?></a></h4>
										<div class="h30"></div>	
										<div class="text-right"><a href="<?php echo base_url().'cam-nang/'.$data['ccode']; ?>" class="view-more">Xem thêm <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>		
</div>				
<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>