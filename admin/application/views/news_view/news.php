		<div class="app-title">
            <div>
               <h1><i class="ico-newspaper"></i>Quản lý Tin tức</h1>
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="#"><i class="ico-home-1"></i></a></li>
               <li class="breadcrumb-item">Tin tức</li>
            </ul>
         </div>
         <div class="card card-flat">
            <div class="card-header">
               <div class="card-title">Add / Update <strong><?php echo $txt_ctitle; ?></strong></div>
            </div>
            <div class="card-body">
               <form class="mui-form" name='form_main' method="post" action="<?php echo $link_page; ?>" enctype="multipart/form-data">
                  <div class="form-input form-has-error">
                     <input class="form-element-field" name="txt_ctitle" placeholder=" " type="text" value="<?php echo $txt_ctitle; ?>" required onkeyup="document.getElementById('txt_ccode').value = locdau(this.value);" />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Tiêu đề</label>
                  </div>
				  <div class="form-input">
                     <input class="form-element-field" id="txt_ccode" name="ccode" placeholder=" " type="text" value="<?php echo $ccode; ?>" required />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Code</label>
                  </div>
				  <div class="form-input">
                     <?php echo $gencbo_cat_news_list; ?>
					 <div class="form-element-bar" style="opacity:0;"></div>
                  </div>
				  <div class="form-input">
                     <input class="form-element-field" name="clink" placeholder=" " type="text" value="<?php echo $clink; ?>" required />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Link</label>
                  </div>
				  <div class="form-input">
                     <input class="form-element-field" name="cpost_date" placeholder=" " type="text" value="<?php echo $cpost_date; ?>" required />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Ngày đăng</label>
                  </div>
				  <div class="form-input">
                     <input class="form-element-field" name="cproduct_str_id" placeholder="Cách nhau bằng dấu phẩy" type="text" value="<?php echo $cproduct_str_id; ?>" required />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">ID sản phẩm</label>
                  </div>
				  <div class="form-input">
                     <input class="form-element-field" name="txt_cindex" placeholder=" " type="text" value="<?php echo $txt_cindex; ?>" required />
                     <div class="form-element-bar"></div>
                     <label class="form-element-label">Chỉ mục</label>
                  </div>
				  <div class="form-input">
					 <label>Mô tả</label>
                     <textarea class="form-element-field form-control" id="editor1" name="txt_cshort_content" placeholder=" " ><?php echo $txt_cshort_content; ?></textarea>
                  </div>
                  <div class="form-input">
					 <label>Nội dung</label>
                     <textarea class="form-element-field form-control" id="editor2" name="txt_ccontent" placeholder=" " ><?php echo $txt_ccontent; ?></textarea>
                  </div>
				  <div class="form-input">
					 <label>Image</label><br>
                     <input name="txt_cthumb_img" type="file" id="txt_cimage" value ="" size="25" style="width:400px;margin-bottom:10px"/>
						 <br>
						 <?php if($txt_cthumb_img != ''): ?>
						 <img  width="200" src="<?php echo $fr_img.'upload/image_article/'.$txt_cthumb_img; ?>"/>
						 <?php endif; ?>
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