		<div class="app-title">
            <div>
               <h1><i class="ico-cube-1"></i>Quản lý Sản phẩm</h1>
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="#"><i class="ico-home-1"></i></a></li>
               <li class="breadcrumb-item">Sản phẩm</li>
            </ul>
         </div>
         <div class="card card-flat">
            <div class="card-header">
               <div class="card-title">Add / Update <strong><?php echo $txt_cproducts; ?></strong></div>
            </div>
            <div class="card-body">
               <form class="mui-form" name='form_main' method="post" action="<?php echo $link_page; ?>" enctype="multipart/form-data">
                  <div class="form-input form-has-error">
                     <input class="form-element-field" name="txt_cproducts" placeholder=" " type="text" value='<?php echo $txt_cproducts; ?>' required onkeyup="document.getElementById('txt_ccode').value = locdau(this.value);" />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Tiêu đề</label>
                  </div>
				  <div class="form-input">
                     <input class="form-element-field" id="txt_ccode" name="txt_ccode" placeholder=" " type="text" value="<?php echo $txt_ccode; ?>" required readonly />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Code</label>
                  </div>
				  <div class="form-input">
                     <?php echo $gencbo_cat_product_list; ?>
					 <div class="form-element-bar" style="opacity:0;"></div>
                  </div>
				  <div id="sub_menu" class="form-input">
				  <?php if($cbo_nid_cat_products!="") { 
				  $cat = get_cat_product_by_id($cbo_nid_cat_products); if($cat['nid_material_products']==30 || $cat['nid_material_products']==31) { ?>
					<p>Sub menu</p>
					<select class="form-control" id="nid_sub_menu" name="nid_sub_menu">
					<?php 
					$list = get_sub_menu_by_cat($cbo_nid_cat_products);
						foreach($list as $data){
					?>
					<option value="<?php echo $data['nid']; ?>" <?php if($nid_sub_menu==$data['nid']) echo "selected"; ?>><?php echo $data['cname']; ?></option>
				  <?php } } } ?>
					 </select>
					<div style="height:15px;"></div>
                  </div>
				  <div class="form-input">
                     <input class="form-element-field" name="fprice" placeholder=" " type="text" value="<?php echo $txt_fprice; ?>" required />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Giá</label>
                  </div>
				  <div class="form-input">
                     <input class="form-element-field" name="txt_fprice_sale" placeholder=" " type="text" value="<?php echo $txt_fprice_sale; ?>" required />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Khuyến mãi</label>
                  </div>
				  <div class="form-input">
                     <input class="form-element-field" name="clink_shoppe" placeholder=" " type="text" value="<?php echo $clink_shoppe; ?>" required />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Link Shoppe</label>
                  </div>
				  <div class="form-input">
                     <input class="form-element-field" name="txt_ctag" placeholder=" " type="text" value="<?php echo $txt_ctag; ?>" required />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Tags</label>
                  </div>
				  <div class="form-input">
                     <input class="form-element-field" name="txt_cindex" placeholder=" " type="text" value="<?php echo $txt_cindex; ?>" required />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Chỉ mục</label>
                  </div>
				  <div class="form-input">
					 <label>Mô tả FB</label>
                     <textarea class="form-element-field form-control" name="txt_cnote" placeholder=" " style="border:1px solid #ccc;opacity:1;padding:5px;"><?php echo $txt_cnote; ?></textarea>
                  </div>
				  <div class="form-input">
					 <label>Mô tả</label>
                     <textarea class="form-element-field form-control" id="editor1" name="txt_cdescription" placeholder=" " ><?php echo $txt_cdescription; ?></textarea>
                  </div>
                  <div class="form-input">
					 <label>Chi tiết</label>
                     <textarea class="form-element-field form-control" id="editor2" name="txt_cdetail" placeholder=" " ><?php echo $txt_cdetail; ?></textarea>
                  </div>
				  <div class="form-input">
					 <label>Image</label><br>
                     <input name="txt_cimage" type="file" id="txt_cimage" value ="" size="25" style="width:400px;margin-bottom:10px"/>
						 <br>
						 <?php if($txt_cimage != ''): ?>
						 <img  width="200" src="<?php echo $fr_img.'upload/images_product/full_images/'.$txt_cimage; ?>"/>
						 <?php endif; ?>
                  </div>
					<div class="form-input">
					 <label>Image FB (600x315)</label><br>
                     <input name="cproduct_fb" type="file" id="cproduct_fb" value ="" size="25" style="width:400px;margin-bottom:10px"/>
						 <br>
						 <?php if($cproduct_fb != ''): ?>
						 <img  width="200" src="<?php echo $fr_img.'upload/fb/'.$cproduct_fb; ?>"/>
						 <?php endif; ?>
                  </div>


				  <input name="hidden_nid" type="hidden" value = "<?php echo $nid; ?>"  />
				  <input name="hidden_event" type="hidden" value = "<?php echo $event; ?>"  />
				  <input name="hidden_image_old" type="hidden" value = "<?php echo $txt_cimage; ?>"  />
				  <input name="hidden_image_old_resize" type="hidden" value = "<?php echo $txt_cimage_resize; ?>"  />
				  <input name="hidden_image_old_gift" type="hidden" value = "<?php echo $cimage_gift; ?>"  />
				  <input type="hidden" name="hidden_button"  value = "" />	
				  
                  <button class="btn mui-btn mui-btn--accent mt20" type="button" name="btn_submit" value ="<?php echo $btn_update; ?>" 
							onclick ="js_SetSubmitButtonClick(this.form, this.name);">Submit</button>
					<button class="btn mui-btn mui-btn--accent mt20" type="button" name="btn_cancel" value ="<?php echo $btn_cancel; ?>" 
							onclick ="location.href='<?php echo $link_cancel; ?> '">Cancel</button>
               </form>
            </div>
         </div>
<script src="https://code.jquery.com/jquery-latest.min.js "></script>		 
<script>
(function($) {
	$(document).on("change" , "#cbo_nid_cat_products" , function() {
		//if(this.value==102 || this.value==103) {
			$.ajax({
                    url : "<?php echo base_url(); ?>index.php/load_sub_menu",
                    type : "post",
                    dataType:"text",
                    data : {
                         nid : this.value
                    },
                    success : function (result){
						$('#sub_menu').html(result);
						$('#sub_menu').removeClass('hide');
                    }
                });
	    //} else
		//	$('#sub_menu').addClass('hide');
	});
})(jQuery);
</script>