		<div class="app-title">
            <div>
               <h1><i class="ico-puzzle"></i>Quản lý Module</h1>
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="#"><i class="ico-home-1"></i></a></li>
               <li class="breadcrumb-item">Module</li>
            </ul>
         </div>
         <div class="card card-flat">
            <div class="card-header">
               <div class="card-title">Add / Update <strong><?php echo $txt_cmodule; ?></strong></div>
            </div>
            <div class="card-body">
               <form class="mui-form" name='form_main' method="post" action="<?php echo $link_page; ?>" enctype="multipart/form-data">
                  <div class="form-input form-has-error">
                     <input class="form-element-field" name="txt_cmodule" placeholder="Tên Module" type="text" value="<?php echo $txt_cmodule; ?>" required />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Tên Module</label>
                  </div>
				  <div class="form-input">
                     <input class="form-element-field" name="txt_cindex" placeholder=" " type="text" value="<?php echo $txt_cindex; ?>" required />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Link</label>
                  </div>
                  <div class="form-input">
					 <label>Nội dung</label>
                     <textarea class="ckeditor" id="editor1" name="txt_cnote" placeholder=" " ><?php echo $txt_cnote; ?></textarea>
                  </div>
				  <div class="form-input">
					 <label>Image/Background</label><br>
                     <input name="txt_cthumb_img" type="file" id="txt_cimage" value ="" size="25" style="width:400px;margin-bottom:10px"/>
						 <br>
						 <?php if($txt_cthumb_img != ''): ?>
						 <img  width="200" src="<?php echo $fr_img.'upload/images_module/'.$txt_cthumb_img; ?>"/>
						 <?php endif; ?>
                  </div>
				  
				  <div class="text-danger-800"><?php //echo $error_message; ?></div>
				  
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