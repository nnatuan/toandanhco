<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   ?>  
   <link href="<?php echo base_url(); ?>css/CategoryAll.min.css?v=202004211410" media="all" rel="stylesheet" />
   <link href="<?php echo base_url(); ?>css/my_style.css" rel="stylesheet" type="text/css" />
<div class="main-wrap full left">
   <div class="cate-wrapp">
      <div class="full left tr-banner-bread">
         <div class="th-breadcrumb">
            <ul vocab="https://schema.org/" typeof="BreadcrumbList">
               <li property="itemListElement" typeof="ListItem">
                  <a property="item" typeof="WebPage" href="<?php echo base_url(); ?>">
                  <span property="name">Trang chủ</span>
                  </a>
                  <meta property="position" content="1">
               </li>
               <li property="itemListElement" typeof="ListItem">
                  <a property="item" typeof="WebPage" href="#">
                  <span property="name"><?php echo $title; ?></span>
                  </a>
                  <meta property="position" content="2">
               </li>
            </ul>
         </div>

	  </div>
      
	  <div class="">
         <div class="">
            <div class="th-view-option">
               <h1><?php echo $title; ?></h1>
               <div class="th-select-wrap" style="display:none">
                  <select id="ddlItem">
                     <option value="60">
                        Xem 60 sản phẩm mỗi lượt
                     </option>
                     <option value="90">
                        Xem 90 sản phẩm mỗi lượt
                     </option>
                     <option value="120">
                        Xem 120 sản phẩm mỗi lượt
                     </option>
                  </select>
                  <select id="ddlsort">
                     <option value="1">Bán chạy nhất</option>
                     <option selected="'selected'" value="2">Sản phẩm mới</option>
                     <option value="3">Đánh giá sản phẩm</option>
                     <option value="5">Giá cao</option>
                     <option value="6">Giá thấp</option>
                     <option value="7">Khuyến mãi</option>
                     <option value="30">Sản phẩm giao nhanh</option>
                  </select>
                  <label id="lbsort">Sắp xếp theo</label>
               </div>
               <ul class="tr-choose-sort">
				<?php 
								$list_cat = get_cat_product_bymat($obj_sec['nid']);
								foreach($list_cat as $cat){
								?>
                  <li onclick="location.href='<?php echo base_url().$obj_sec['ccode'].'/'.$cat['ccode']; ?>'"><?php echo $cat['ccat_products'];?></li>
				  <?php } ?>
               </ul>
            </div>
            <div class="tr-wrapper-shopping-today full left">
                           <ul class="th-product-wrapp full left">
							<?php  
								$obj_product = get_product_sec($ccode_sec, $nrow_per_page, $ncurr_page , $type_sort);
							foreach($obj_product as $product) {
								$obj_color_list = get_product_color($product['nid']);
																		if(isset($obj_color_list[0]['nid']))
																			$href=base_url().$ccode_sec.'/'.$product['ccode_cat'].'/'.$product['ccode'].'-'.$obj_color_list[0]['nid'];
																		else
																			$href=base_url().$ccode_sec.'/'.$product['ccode_cat'].'/'.$product['ccode'];
													?>
							<li class="th-product-item-wrap"><div class="th-product-item"><a href="<?php echo $href ?>" title="<?php echo $product['cproducts']?>"><img class="subimg lazyloaded" data-pos="1" src="<?php echo base_url().'upload/images_product/resize_images/'.$product['cimage_resize']?>" data-src="<?php echo base_url().'upload/images_product/resize_images/'.$product['cimage_resize']?>" alt="<?php echo $product['cproducts']?>" width="259" height="259"></a><!--image gift--><!--end image gift-->
							<div class="th-product-info full left">
							<h3 class="left"><a href="<?php echo $href ?>" title="<?php echo $product['cproducts']?>"><?php echo $product['cproducts']?></a></h3>
							</div>
							<div class="th-product-price full left">
								<?php if ($product['cprice_sale_anvi'] < $product['cprice_anvi'] && ($product['ncheck'] == 1 || $product['cflash'] == 1)) { ?>
								<span class="th-product-price-new"><?php echo number_format($product['cprice_sale_anvi']); ?>đ</span><span class="th-product-price-old"><?php echo number_format($product['cprice_anvi']); ?>đ</span><span class="th-product-discount">-<?php echo number_format(round(($product['cprice_anvi']-$product['cprice_sale_anvi'])/$product['cprice_anvi']*100+0.4))?>%</span>
								<?php } else { ?>
								<span class="th-product-price-new"><?php echo number_format($product['cprice_anvi']); ?>đ</span>
								<?php } ?>
							</div>
							</li>
							<?php } ?>
						   </ul>
                        </div>
					
                     </div>
         </div>
      </div>
   </div>
</div>
         
<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>