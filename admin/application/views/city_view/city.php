		<div class="app-title">
            <div>
               <h1><i class="ico-low-price"></i>Quản lý Phí giao hàng</h1>
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/do_home"><i class="ico-home-1"></i></a></li>
               <li class="breadcrumb-item">Phí giao hàng</li>
            </ul>
         </div>
         <div class="card card-flat">
            <div class="card-header">
               <div class="card-title">Add / Update <strong><?php echo $txt_cname; ?></strong></div>
            </div>
            <div class="card-body">
               <form class="mui-form" name='form_main' method="post" action="<?php echo $link_page; ?>">
                  <div class="form-input form-has-error">
                     <input class="form-element-field" name="txt_cname" placeholder=" " type="text" value="<?php echo $txt_cname; ?>" required />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Tỉnh/Thành phố</label>
                  </div>
                  <div class="form-input">
                     <input class="form-element-field" name="txt_ccost" placeholder=" " type="text" value="<?php echo $txt_ccost; ?>" />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Phí giao hàng</label>
                  </div>
				  
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