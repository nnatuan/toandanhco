		<div class="app-title">
            <div>
               <h1><i class="ico-cube-1"></i>Quản lý Nhóm sản phẩm</h1>
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="#"><i class="ico-home-1"></i></a></li>
               <li class="breadcrumb-item">Nhóm sản phẩm</li>
            </ul>
         </div>
         <div class="card card-flat">
            <div class="card-header">
               <div class="card-title">Add / Update <strong><?php echo $txt_ccat_products; ?></strong></div>
            </div>
            <div class="card-body">
               <form class="mui-form" name='form_main' method="post" action="<?php echo $link_page; ?>" enctype="multipart/form-data">
                  <div class="form-input form-has-error">
                     <input class="form-element-field" name="txt_ccat_products" placeholder=" " type="text" value="<?php echo $txt_ccat_products; ?>" required onkeyup="document.getElementById('txt_ccode').value = locdau(this.value);" />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Tên</label>
                  </div>
                  <div class="form-input form-has-error">
                     <input class="form-element-field" id="txt_ccode" name="txt_ccode" placeholder=" " type="text" value="<?php echo $txt_ccode; ?>" required />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Code</label>
                  </div>
				  <div class="form-input">
                     <?php echo $gencbo_material_product_list; ?>
					 <div class="form-element-bar" style="opacity:0;"></div>
                  </div>
				  <div class="form-input">
                     <input class="form-element-field" name="txt_cindex" placeholder=" " type="text" value="<?php echo $txt_cindex; ?>" />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Chỉ mục</label>
                  </div>
				  <div class="form-input">
					 <label>Mô tả FB</label>
                     <textarea class="form-element-field form-control" style="border:1px solid #ccc;opacity:1;height:100px;padding:10px;" name="txt_cnote" placeholder=" " ><?php echo $txt_cnote; ?></textarea>
                  </div>
				  <div class="form-input">
					 <label>Nội dung</label>
                     <textarea class="form-element-field form-control" id="editor1" name="cdesc" placeholder=" " ><?php echo $cdesc; ?></textarea>
                  </div>
				  <input name="hidden_nid" type="hidden" value = "<?php echo $nid; ?>"  />
				  <input name="hidden_event" type="hidden" value = "<?php echo $event; ?>"  />
				  <input type="hidden" name="hidden_button"  value = "" />
				  <input name="hidden_image_old" type="hidden" value = "<?php echo $txt_cthumb_img; ?>"  />
				  
                  <button class="btn mui-btn mui-btn--accent mt20" type="button" name="btn_submit" value ="<?php echo $btn_update; ?>" 
							onclick ="js_SetSubmitButtonClick(this.form, this.name);">Submit</button>
					<button class="btn mui-btn mui-btn--accent mt20" type="button" name="btn_cancel" value ="<?php echo $btn_cancel; ?>" 
							onclick ="location.href='<?php echo $link_cancel; ?> '">Cancel</button>
               </form>
            </div>
         </div>