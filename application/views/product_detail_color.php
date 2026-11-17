<?php
   $this->load->view('header_product');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   ?>
<script type="text/javascript">
function incrementValue()
{
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
	if(value <= 10)
		document.getElementById('number').value = value;
}
function decrementValue()
{
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value--;
	if(value != 0)
		document.getElementById('number').value = value;
}
</script> 
<?php 
   $obj_color_list = get_product_color($obj_detail['nid']);
   $obj_color_detail = get_color_detail($nid_color);
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
            
         </div>
         <div class="section-footer">
            <div class="container" data-inview-showup="showup-translate-down">
               <ul class="page-path">
                  <li><a href="<?php echo base_url()?>">Trang chủ</a></li>
                  <li class="path-separator"><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
				  <li><a href="<?php echo base_url().$sec_pro['ccode']; ?>"><?php echo $sec_pro['cmaterial_products'] ?></a></li>
                  <li class="path-separator"><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                  <li><?php echo $obj_detail['cproducts']; ?></li>
               </ul>
            </div>
         </div>
      </section>
	  <section class="content-section" data-inview-showup="showup-translate-up">
         <div class="container">
			<div class="row">
				<div class="col-sm-8 ">
					<div class="row">
										<div class="col-sm-4">
											<img class="main-img mrb10" id="main-img" src="<?php echo base_url()?>upload/images_product/full_images/<?php echo $obj_detail['cimage']?>" />
											<div class="sub-container mrb10 cb">
												<div class="col-xs-3">
													<img class="sub-img active" src="<?php echo base_url()?>upload/images_product/full_images/<?php echo $obj_detail['cimage']?>"/>
												</div>
												<?php $i=1; $obj_img = get_img_by_product($obj_detail['nid']);
													foreach ($obj_img as $img) { ?>
													<div class="col-xs-3"><img class="sub-img" src="<?php echo base_url().'upload/images_product/sub_images/'.$img['cimage']; ?>"/></div>
												<?php $i++; } ?>
											</div>
										</div>
										<div class="col-sm-8 mrb20">
											<?php echo $obj_detail['cdescription']; ?>
											
											<div class="sp-dt-short-choise clearfix">
													 <div class="choice-tt">Màu sắc:</div>
													 <ul class="sp-dt-choice-radio">
														<?php $i=101;foreach($obj_color_list as $color){?>
														<li>
														   <input id="color-sp<?php echo $i?>" class="choice-button" type="radio" name="color" value="<?php echo $color['nid']?>" data-url="<?php echo base_url().$sec_pro['ccode'].'/'.$cat_pro['ccode'].'/'.$obj_detail['ccode'].'-'.$color['nid']; ?>" <?php if($color['nid'] == $nid_color) {?>checked<?php }?> />
														   <label for="color-sp<?php echo $i?>">
														   <?php echo $color['cname']?>
														   </label>
														</li>
														<?php $i++;}?>
													 </ul>
												  </div>
												  
											<div class="price-box">
												Giá bán: 
												<?php if($obj_detail['ncheck'] == 1 ){?>
												<span class="price">
													<?php if ($obj_color_detail['fprice_sale'] == "" || $obj_color_detail['fprice_sale'] == 0) echo "Liên hệ"; else echo number_format($obj_color_detail['fprice_sale']).' đ'; ?>
												</span>
													<?php if ($obj_color_detail['fprice_sale'] < $obj_color_detail['fprice']) { ?>
													<span class="price-old">
														<del><?php echo number_format($obj_color_detail['fprice']).' đ'; ?></del>
													</span>
													<?php }?>
												<?php }else{?>
													<span class="price">
														<?php echo number_format($obj_color_detail['fprice']).' đ'; ?>
													</span>
												<?php }?>	
											</div>
											<div class="quantity cb">
												<span class="label-sl desktop">Số lượng: </span>
												<span class="label-sl mobile">SL: </span>
												<button class="btn" onclick="decrementValue()"><i class="fa fa-minus"></i></button>
												<input class="form-control qty" type="number" step="1" min="1" max="10" name="quantity" id="number" value="1" title="Số lượng">
												<button class="btn" onclick="incrementValue()"><i class="fa fa-plus"></i></button>
											</div>
											<?php if(($obj_detail['nflash_sold'] < $obj_detail['nflash'] OR $obj_detail['cflash'] !=1) && $obj_detail['nhethang']!=1){?>
											<a onclick="add_cart_detail('<?php echo $obj_color_detail['nid']?>', '<?php echo $niscolor; ?>');" class="btn btn-success btn-add-cart mrt10"><i class="fa fa-cart-arrow-down fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;ĐẶT HÀNG</a>
										<?php }?>

											<?php if($obj_detail['clink_shopee_as'] != ''){ ?>
                                            <a href="<?php echo $obj_detail['clink_shopee_as']?>" class="btn btn-success btn-add-cart mrt10 shopee-cart" target="_blank"><i class="fa fa-cart-arrow-down fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;MUA QUA SHOPEE</a>
                                        

                                         <?php }?>
										</div>
									</div>
						<div style="height:30px;"></div>
						<div role="tabpanel">
						   <!-- Nav tabs -->
						   <ul class="nav nav-tabs" role="tablist">
							  <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">MÔ TẢ</a></li>
							  <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">BÌNH LUẬN</a></li>
						   </ul>
						   <!-- Tab panes -->
						   
						   <div class="tab-content">
							  <div role="tabpanel" class="tab-pane active" id="tab1">    
								 <?php echo $obj_detail['cdetail']; ?>
							  </div>
							  <div role="tabpanel" class="tab-pane" id="tab2">
							  <?php $list_comment = get_comment_by_product($obj_detail['nid']);
								foreach($list_comment as $data) {
							  ?>
							  <div class="comment-item">
								  <h5 class="mgb0"><strong><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?php echo $data['cname']; ?></strong></h5>
								  <div class="question"><?php echo nl2br($data['ccontent']); ?></div>
							  </div>
							  <?php } ?>
							  <form id="comment-form" method="post">
								 <div class="comment-box">
									<textarea id="content-comment" name="ccontent" placeholder="Mời bạn để lại bình luận..." required></textarea>
									<div class="send-box text-right">
										<span class="msg_err_comment">Vui lòng nhập nội dung</span>
										<button type="button" id="send-comment" class="btn btn-info">GỬI</button>
										<button type="button" class="btn btn-info" id="send-comment-hide" data-toggle="modal" data-target="#myModal">GỬI</button>
									</div>
								 </div>
								 <?php /*
								 <div class="fb-comments" data-href="<?php echo base_url().$obj_detail['ccode'].HTML ?>" data-width="100%" data-colorscheme="light"></div>
								 */ ?>
								 <div id="myModal" class="modal fade" role="dialog">
								  <div class="modal-dialog">
									
									<!-- Modal content-->
									<div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">THÔNG TIN NGƯỜI GỬI</h4>
									  </div>
									  <div class="modal-body">
										<input class="info-comment" name="cname" value="" placeholder="Họ tên" required/>
										<input class="info-comment" type="email" name="cemail" value="" placeholder="Email" required/>
										<input class="info-comment" name="cphone" value="" placeholder="Số điện thoại" required/>
										<input type="hidden" name="nid_product" value="<?php echo $obj_detail['nid']; ?>">
									  </div>
									  <div class="modal-footer">
										<button type="submit" value="submit" class="btn">GỬI</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
									  </div>
									</div>
									
								  </div>
								</div>
							  </div>
							  </form>
						   </div>
						</div>
				</div>
						
				<div class="col-sm-4">
					<h3 class="tit-pro-hot">Sản phẩm khác</h3>
					<?php $obj_product = get_product_hot(6); 
						foreach ($obj_product as $product) {
					?>
						<div class="col-xs-6" data-inview-showup="showup-translate-up">
					<div class="item-product">
						<a href="<?php echo base_url(). $product['ccode_sec'] . '/' . $product['ccode_cat'] . '/' . $product['ccode']; ?>"><img src="<?php echo base_url().'upload/images_product/resize_images/'.$product['cimage_resize']?>" alt="<?php echo $product['cproducts']?>"/></a>
						<div class="info-product">
							<h6 class="title-item"><a href="<?php echo base_url(). $product['ccode_sec'] . '/' . $product['ccode_cat'] . '/' . $product['ccode']; ?>"><?php echo $product['cproducts']?></a></h6>
							<div class="row">
								<div class="col-md-12 pdr0">
									<?php if ($product['fprice_sale'] < $product['fprice']) { ?>
									<span class="price-old">
										<del>₫<?php echo number_format($product['fprice']); ?></del>
									</span>
									<?php } ?>
									<span class="price">
										₫<?php if ($product['fprice_sale'] == "" || $product['fprice_sale'] == 0) echo "Liên hệ"; else echo number_format($product['fprice_sale']); ?>
									</span>
								</div>
								
							</div>
						</div>
						<?php if ($product['fprice_sale'] < $product['fprice']) { ?>
						<div class="shopee-item-card__badge-wrapper"><div class="shopee-badge shopee-badge--fixed-width shopee-badge--promotion"><div class="shopee-badge--promotion__label-wrapper shopee-badge--promotion__label-wrapper--vi-VN"><span class="percent"><?php echo number_format(round(($product['fprice']-$product['fprice_sale'])/$product['fprice']*100+0.4))?>%</span><span class="shopee-badge--promotion__label-wrapper__off-label shopee-badge--promotion__label-wrapper__off-label--vi-VN">giảm</span></div></div></div>
						<?php } ?>
					</div>
				</div>
					<?php } ?>
					<div class="mod-right-img">
					<?php 
						$data = get_module_byid(65);
						if(isset($data['cnote']))
							//echo $data['cnote'];
					?>
				</div>
				</div>
			</div>	
         </div>
      </section>
<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>
