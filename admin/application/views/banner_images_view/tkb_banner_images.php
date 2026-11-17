		<div class="app-title">
            <div>
               <h1><i class="ico-picture"></i>Quản lý Slider</h1>
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/do_home"><i class="ico-home-1"></i></a></li>
               <li class="breadcrumb-item">Slider</li>
            </ul>
         </div>
         <div class="card card-flat">
            <div class="card-header">
               <div class="card-title">Add / Update <strong><?php echo $txt_cbanner_images; ?></strong></div>
            </div>
            <div class="card-body">
               <form class="mui-form" name='form_main' method="post" action="<?php echo $link_page; ?>" enctype="multipart/form-data">
                  <div class="form-input form-has-error">
                     <input class="form-element-field" name="txt_cbanner_images" placeholder="Please fill in name" type="text" value="<?php echo $txt_cbanner_images; ?>" required />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Name</label>
                  </div>
				  <div class="form-input">
                     <input class="form-element-field" name="txt_ccode" placeholder="Please fill in name" type="text" value="<?php echo $txt_ccode; ?>" required />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Link</label>
                  </div>
                  <div class="form-input">
                     <input class="form-element-field" name="txt_cindex" placeholder=" " type="text" value="<?php echo $txt_cindex; ?>" />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label"><?php echo $lbl_index; ?></label>
                  </div>
                  <div class="form-input">
                     <textarea class="form-element-field" name="txt_cnote" placeholder=" " /><?php echo $txt_cnote; ?></textarea>
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Note</label>
                  </div>
				  <div class="form-input">
					 <label>Image</label><br>
                     <input name="txt_cthumb_img" type="file" id="txt_cimage" value ="" size="25" style="width:400px;margin-bottom:10px"/>
						 <br>
						 <?php if($txt_cthumb_img != ''): ?>
						 <img  width="200" src="<?php echo $fr_img.'upload/banner/'.$txt_cthumb_img; ?>"/>
						 <?php endif; ?>
                  </div>
				  <div class="text-danger-800"></div>
				  
				  <input name="hidden_nid" type="hidden" value = "<?php echo $nid; ?>"  />
				<input name="hidden_event" type="hidden" value = "<?php echo $event; ?>"  />
				<input type="hidden" name="hidden_button"  value = "" />	
				<input type="hidden" name="hidden_image_old"  value = "<?php echo $txt_cthumb_img; ?>" />
				  
                  <button class="btn mui-btn mui-btn--accent mt20" type="button" name="btn_submit" value ="<?php echo $btn_update; ?>" 
							onclick ="js_SetSubmitButtonClick(this.form, this.name);">Submit</button>
					<button class="btn mui-btn mui-btn--accent mt20" type="button" name="btn_cancel" value ="<?php echo $btn_cancel; ?>" 
							onclick ="location.href='<?php echo $link_cancel; ?> '">Cancel</button>
               </form>
            </div>
         </div>