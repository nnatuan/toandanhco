<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>uploadify/uploadify.css">
<style>
#file_upload-button{height:34px!important;}
</style>
		<div class="app-title">
            <div>
               <h1><i class="ico-low-price"></i>Quản lý Hình ảnh sản phẩm</h1>
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="#"><i class="ico-home-1"></i></a></li>
               <li class="breadcrumb-item">Hình ảnh sản phẩm</li>
            </ul>
         </div>
		<div class="card card-flat table-responsive">
			<div class="card-header">
               <div class="card-title"><?php $pro = get_product_byid($nid_product);?> Hình ảnh sản phẩm <strong><?php echo $pro['cproducts']; ?></strong></div>
            </div>
            <div class="card-body">
				<?php 
					$obj_img = get_img_by_product($nid_product);
					foreach ($obj_img as $data) {
				?>
					<div style="float:left;margin-right:10px;margin-bottom:10px;">
						<div style="width:80px;height:80px;">
						<img src="<?php echo $fr_img.'upload/images_product/sub_images/'.$data['cimage']; ?>" style="width:100%;height:100%;" alt="No Image"/>
						</div>
						<p style="text-align:center;margin-top:5px;">
							<a href="javascript:delete_img('<?php echo $data["nid"]?>')">Xóa</a>
						</p>
					</div>
				<?php } ?>
				<div style="clear:both;"></div>
				<form style="float: left;">
					<div id="queue"></div>
					<input id="file_upload" name="file_upload" type="file" multiple="true" style="margin-bottom: 10px;">
				</form>
				<button class="btn mui-btn mui-btn--accent" type="button" name="btn_cancel" 
							onclick ="location.href='<?php echo base_url().'index.php/do_product_listview'; ?> '" style="float: left; margin-top: 0;margin-left: 20px;">Cancel</button>
			</div>	
         </div>
		 
		 
<script type="text/javascript">
		function delete_img(id){
			var cfm = confirm(" Bạn muốn xóa hình này ?");
			if (cfm == true) {
			$.post( "<?php echo base_url().'index.php/do_product_img/delete_img'?>", { nid: id })
  				.done(function( data ) {
   					 setInterval('window.location.reload()', 500);
 				 });
 			}
		}
	</script>		 