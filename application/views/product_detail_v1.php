<?php 
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.fancybox.js?v=2.1.5"></script>   
<script type="text/javascript" src="<?php echo base_url(). 'js/jquery.elevatezoom.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url(). 'js/cloudzoom.js'; ?>"></script>
<script type = "text/javascript">
   CloudZoom.quickStart();         
</script> 
<script>
jQuery(document).ready(function() {
	jQuery(".sub-img").click(function(){
		var src = jQuery(this).attr('src');	
		jQuery(".sub-img").removeClass('active');
		jQuery(this).addClass('active');		
		jQuery("#main-img").attr('src',src);
	});
});

$(document).ready(function() {
    $(".tabs-menu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
});
</script>
<section class="product_detail">
	<div class="div1">
	   <div class="container">
			<div class="row">
				<div class="col-md-5">
					<img class="main-img cloudzoom" id="main-img" src="<?php echo base_url()?>upload/images_product/full_images/<?php echo $obj_detail['cimage']?>" data-cloudzoom='zoomSizeMode:"zoom", autoInside: 404, zoomWidth: 300, zoomHeight: 300'/>
					<div class="sub-container mrb10 cb">
												<div class="col-md-5ths">
													<img class="sub-img cloudzoom-gallery mgb10 active" src="<?php echo base_url()?>upload/images_product/full_images/<?php echo $obj_detail['cimage']?>" data-cloudzoom ="useZoom:'.cloudzoom', image:'<?php echo base_url().'upload/images_product/full_images/'.$obj_detail['cimage']; ?>'"/>
												</div>
												<?php $i=1; $obj_img = get_img_by_product($obj_detail['nid']);
													foreach ($obj_img as $img) { ?>
													<div class="col-md-5ths"><img class="sub-img cloudzoom-gallery" src="<?php echo base_url().'upload/images_product/sub_images/'.$img['cimage']; ?>" data-cloudzoom ="useZoom:'.cloudzoom', image:'<?php echo base_url().'upload/images_product/sub_images/'.$img['cimage']; ?>'"/></div>
												<?php $i++; } ?>
											</div>
											
									
				</div>
				<div class="col-md-7">
					<h3 class="font-Avenir" style="color:#17375e;"><strong><i class="fa fa-caret-right" aria-hidden="true"></i> <?php echo $title; ?></strong></h3>
					<?php echo $obj_detail['cdescription']; ?>
					<div style="height: 15px;border-bottom: 1px dotted #ddd;margin-bottom: 15px;"></div>	
					<div style="font-size:20px;font-weight:bold;color:#17375e;margin-bottom:15px;">
					<?php if ($obj_detail['fprice_sale'] < $obj_detail['fprice']) { 
						echo number_format($obj_detail['fprice_sale']).'đ'; ?></strong>&nbsp;&nbsp;&nbsp;<del style="color: #ccc;font-size: 16px;"><?php echo number_format($obj_detail['fprice']).'đ'; ?></del> 
					<?php } else {
						echo number_format($obj_detail['fprice']).' đ'; } ?>
					</div>
					<div>
						Số lượng <input id="number" type="number" value="1" style="margin-left: 10px; padding: 5px;border: 1px solid #ddd;width: 100px;" />
						<a href="#" style="" onclick="add_cart_detail('<?php echo $obj_detail['nid']?>');" class="btn-1">Mua ngay</a>
						<a href="#" style="border-radius: 50px;padding: 10px 20px;text-decoration: none;background: #d53d4a;color: #fff;" onclick="add_cart_detail_2('<?php echo $obj_detail['nid']?>');">Thêm vào giỏ hàng</a>
					</div>
				</div>
			</div>	
			<div>
				<div id="tabs-container">
    <ul class="tabs-menu cb">
        <li class="current"><a href="#tab-1">Thông tin sản phẩm</a></li>
        <li><a href="#tab-2">Chứng nhận sản phẩm</a></li>
    </ul>
    <div class="tab">
        <div id="tab-1" class="tab-content">
            <?php echo $obj_detail['cdetail']; ?>
        </div>
        <div id="tab-2" class="tab-content">
            <?php echo $obj_detail['cnote']; ?>
        </div>
    </div>
</div>
			</div>
		<div class="h30"></div>		
		<h3 class="tit-main text-center"><span>SẢN PHẨM KHÁC</span></h3>
						<div class="row">
							<?php $obj_products = get_product_relate($obj_detail['nid'], $obj_detail['nid_cat_products']); 
							foreach($obj_products as $product) { ?>
							<div class="col-md-3 text-center item-pro">
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
  	
</section>  
<div class="h60"></div>	
<script type="text/javascript">
$(document).ready(function() {
	$('.fancybox').fancybox();
});
</script> 
<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>