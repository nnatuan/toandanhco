		<div class="app-title">
            <div>
               <h1><i class="ico-user"></i>Quản lý Người dùng</h1>
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/do_home"><i class="ico-home-1"></i></a></li>
               <li class="breadcrumb-item">Người dùng</li>
            </ul>
         </div>
		 <div class="card card-flat">
            <div class="card-header">
               <div class="card-title">Add / Update <strong><?php echo $txt_cuserid; ?></strong></div>
            </div>
            <div class="card-body">
               <form class="mui-form" name='form_main' method="post" action="<?php echo $link_page; ?>" enctype="multipart/form-data">
                  <div class="form-input form-has-error">
                     <input class="form-element-field" name="txt_cuserid" placeholder=" " type="text" value="<?php echo $txt_cuserid; ?>" required />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">ID Đăng nhập</label>
                  </div>
				  <div class="form-input">
                     <input class="form-element-field" name="txt_cpassword" placeholder=" " type="password" value="<?php echo $txt_cpassword; ?>" required />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label"><?php echo $lbl_cpassword ?></label>
                  </div>
                  <div class="form-input">
                     <input class="form-element-field" name="txt_ccode" placeholder=" " type="text" value="<?php echo $txt_ccode; ?>" />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label"><?php echo $lbl_ccode ?></label>
                  </div>
				  <div class="form-input">
                     <input class="form-element-field" name="txt_cfirstname" placeholder=" " type="text" value="<?php echo $txt_cfirstname; ?>" />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label"><?php echo $lbl_cfirstname ?></label>
                  </div>
				  <div class="form-input">
                     <input class="form-element-field" name="txt_cmiddlename" placeholder=" " type="text" value="<?php echo $txt_cmiddlename; ?>" />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label"><?php echo $lbl_cmiddlename ?></label>
                  </div>
				  <div class="form-input">
                     <input class="form-element-field" name="txt_clastname" placeholder=" " type="text" value="<?php echo $txt_clastname; ?>" />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label"><?php echo $lbl_clastname ?></label>
                  </div>
				  <div class="form-input">
                     <input class="form-element-field" name="txt_cemail" placeholder=" " type="text" value="<?php echo $txt_cemail; ?>" />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label"><?php echo $lbl_cemail ?></label>
                  </div>
				  <div class="form-input">
                     <?php echo $gencbo_user_type; ?>
					 <div class="form-element-bar" style="opacity:0;"></div>
                  </div>
                  <div class="form-input">
                     <textarea class="form-element-field" name="txt_cnote" placeholder=" " /><?php echo $txt_cnote; ?></textarea>
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Note</label>
                  </div>
				  <div class="text-danger-800"></div>
				  
				  <input name="hidden_nid" type="hidden" value = "<?php echo $nid; ?>"  />
				<input name="hidden_event" type="hidden" value = "<?php echo $event; ?>"  />
				<input type="hidden" name="hidden_button"  value = "" />	
				  
                  <button class="btn mui-btn mui-btn--accent mt20" type="button" name="btn_submit" value ="<?php echo $btn_update; ?>" 
							onclick ="js_SetSubmitButtonClick(this.form, this.name);">Submit</button>
					<button class="btn mui-btn mui-btn--accent mt20" type="button" name="btn_cancel" value ="<?php echo $btn_cancel; ?>" 
							onclick ="location.href='<?php echo $link_cancel; ?> '">Cancel</button>
               </form>
            </div>
         </div>