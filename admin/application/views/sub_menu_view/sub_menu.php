		<div class="app-title">
            <div>
               <h1><i class="ico-menu"></i>Quản lý Sub menu</h1>
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="#"><i class="ico-home-1"></i></a></li>
               <li class="breadcrumb-item">Sub menu</li>
            </ul>
         </div>
         <div class="card card-flat">
            <div class="card-header">
               <div class="card-title">Add / Update <strong><?php echo $txt_cname; ?></strong></div>
            </div>
            <div class="card-body">
               <form class="mui-form" name='form_main' method="post" action="<?php echo $link_page; ?>" enctype="multipart/form-data">
                  <div class="form-input form-has-error">
                     <input class="form-element-field" name="txt_cname" placeholder=" " type="text" value="<?php echo $txt_cname; ?>" required onkeyup="document.getElementById('txt_ccode').value = locdau(this.value);" />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Tiêu đề</label>
                  </div>
				  <div class="form-input">
                     <input class="form-element-field" id="txt_ccode" name="txt_ccode" placeholder=" " type="text" value="<?php echo $txt_ccode; ?>" required readonly />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Code</label>
                  </div>
                  <div class="form-input">
                     <input class="form-element-field" name="txt_cindex" placeholder=" " type="text" value="<?php echo $txt_cindex; ?>" required />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Chỉ mục</label>
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