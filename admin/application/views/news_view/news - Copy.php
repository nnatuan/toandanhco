<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/tabs.css" />
<style type="text/css">
   .box_content{padding-bottom:20px;}
   textarea{height: 100px;
   width: 392px;margin-bottom:0;}
</style>
<div id="ContentMessage">
   <div id="NoteContentMessage">
      <?php echo $get_message_notnull ?>
   </div>
   <div id="ErrorContentMessage">
      <?php echo $error_ctitle; ?>
      <?php echo $error_ccontent; ?>
      <?php echo $error_cshort_content; ?>
   </div>
</div>
<ul class="tabs" >
   <li><a href="#tab1">Tiếng Việt</a></li>
   <li><a href="#tab2">Tiếng Anh</a></li>
</ul>
<form  name='form_main' id="form_main" method="post" action="<?php echo $link_page; ?>" enctype="multipart/form-data">
   <div id="SiteContent_main">
      <div id="EditContent">
         <div class="tab_container">
            <div id="tab1" class="tab_content">
               <table class="EditStyle01" >
                  <tbody>
					<?php /*
                     <tr>
                        <td class="key" width="150" align="right">
                           <?php echo $lbl_cat; ?>					
                        </td>
                        <td >
                           <?php echo $gencbo_cat_news_list; ?>	
                        </td>
                     </tr>*/ ?>
                     <tr>
                        <td class="key" width="150" align="right">
                           <?php echo $lbl_title; ?><?php echo $get_icon_notnull; ?>					
                        </td>
                        <td width="">
                           <input style="width:350px;" type="text" width="" name="txt_ctitle" value="<?php echo $txt_ctitle; ?>" onkeyup="document.getElementById('txt_ccode').value = locdau(this.value);">					
                        </td>
                     </tr>
                     <tr>
                        <td class="key" width="150" align="right">
                           <?php echo "Code"; ?><?php echo $get_icon_notnull; ?>					
                        </td>
                        <td width="">
                           <input style="width:350px;" type="text" width="" name="ccode" id="txt_ccode" value="<?php echo $ccode; ?>">					
                        </td>
                     </tr>
                     <tr>
                        <td class="key" width="150" align="right">
                           <?php echo $lbl_index; ?>					
                        </td>
                        <td >
                           <input style="width:100px;" type="text" width="" name="txt_cindex" value="<?php echo $txt_cindex; ?>" maxlength="4" />	
                        </td>
                     </tr>
                     <tr>
                        <td align="right" class="key">
                           <?php echo $lbl_image; ?>						
                        </td>
                        <td>
                           <input name="txt_cthumb_img" type="file" id="txt_cthumb_img" value ="" size="42" />
                           <div style="position:absolute; top:130px; left:600px; ">
                              <div id="images_div_thumb" style="text-align:center;padding:2px;width:130px;">
                                 <?php 
                                    $url_thumb = base_url().'index.php/do_news/delete_image_thumb/'.$nid; 
                                    
                                    ?>
                                 <?php 
                                    if($txt_cthumb_img !='') echo '<img style="width:200px; margin:0 20px 0 0;" src="'.$fr_img.'upload/image_article/'.$txt_cthumb_img.'  "/>';
                                    
                                    else echo 'no thumb image';
                                    
                                    ?>
                                 <?php if($txt_cthumb_img !=''): ?>
                                 <p style="text-align:center"><a href="#" onclick="javascript:if(confirm('Are you sure to delete?')) ajax_delete_image_thumb_123();">Delete (thumb_img)</a></p>
                                 <?php endif; ?>
                              </div>
                           </div>
                        </td>
                     </tr>
                    
                     <tr>
                        <td class="key" width="150" align="right">
                           <?php echo $lbl_short_content; ?>
                        </td>
                        <td colspan="2" style="width:730px;height:250px;">
                           <textarea cols="80" id="editor1" name="txt_cshort_content" rows="10"><?php echo $txt_cshort_content; ?></textarea>
                        </td>
                     </tr>
                     <tr>
                        <td class="key" width="150" align="right">
                           <?php echo $lbl_content; ?>
                        </td>
                        <td colspan="2" style="width:730px;height:250px;">
                           <textarea cols="80" id="editor3" name="txt_ccontent" rows="10"><?php echo $txt_ccontent; ?></textarea>
                        </td>
                     </tr>
                     
                  <tbody>				
               </table>
            </div>
            <div id="tab2" class="tab_content">
               <div>
                  <table class="EditStyle01" >
                     <tbody>
                        <tr>
                           <td class="key" width="150" align="right">
                              <?php echo $lbl_title; ?>					
                           </td>
                           <td width="">
                              <input style="width:350px;" type="text" width="" name="eng_ctitle" value="<?php echo $eng_ctitle; ?>">					
                           </td>
                        </tr>
                        <tr>
                           <td class="key" width="150" align="right">
                              <?php echo $lbl_short_content; ?>
                           </td>
                           <td colspan="2" style="width:730px;height:250px;">
                              <textarea cols="80" id="editor2" name="eng_cshort_content" rows="10"><?php echo $eng_cshort_content; ?></textarea>
                           </td>
                        </tr>
                        <tr>
                           <td class="key" width="150" align="right">
                              <?php echo $lbl_content; ?>
                           </td>
                           <td colspan="2" style="width:730px;height:250px;">
                              <textarea cols="80" id="editor4" name="eng_ccontent" rows="10"><?php echo $eng_ccontent; ?></textarea>
                           </td>
                        </tr>
                     <tbody>				
                  </table>
               </div>
            </div>
            <div style="padding: 30px;">
               <input type="button" name="btn_submit" style="width:80px;" value ="<?php echo $btn_update; ?>" 
                  onclick ="js_SetSubmitButtonClick(this.form, this.name);" class="button"/>
               <input name="btn_cancel" style="width:80px;" type="button" 
                  value = "<?php echo $btn_cancel; ?>"
                  onclick="location.href='<?php echo $link_cancel; ?> '" class="button"/>	
            </div>
         </div>
      </div>
      <input name="hidden_nid" type="hidden" value = "<?php echo $nid; ?>"  />
      <input name="hidden_event" type="hidden" value = "<?php echo $event; ?>"  />
      <input type="hidden" name="hidden_button_click"  value = "" />	
      <input type="hidden" name="hidden_image_old"  value = "<?php echo $txt_cthumb_img; ?>" />	
      <input type="hidden" name="hidden_image_old_fb"  value = "<?php echo $txt_cfb_img; ?>" />	
      <input type="hidden" name="hidden_image_old_iphone"  value = "<?php echo $txt_ciphone_img; ?>" />	
   </div>
</form>
<!-- BAT BUOC CAC FORM NHAP LIEU DEU PHAI DUNG SCRIPT NAY. -->
<script type="text/javascript">
   $(document).ready(function() {
   
   
   
   	//Default Action
   
   	$(".tab_content").hide(); //Hide all content
   
   	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
   
   	$(".tab_content:first").show(); //Show first tab content
   
   	
   
   	//On Click Event
   
   	$("ul.tabs li").click(function() {
   
   	
   
   		$("ul.tabs li").removeClass("active"); //Remove any "active" class
   
   		$(this).addClass("active"); //Add "active" class to selected tab
   
   		$(".tab_content").hide(); //Hide all tab content
   
   		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
   
   		$(activeTab).fadeIn(); //Fade in the active content
   
   		return false;
   
   	});
   
   
   
   });
   
</script>
<script type="text/javascript" >
   function js_VerifyBeforeSubmit (obj_form, btn_name) 
   
   	{
   
   		if (document.form_main.txt_user_name.value=='')
   
   			{
   
   				document.form_main.txt_ccode.focus();
   
   				return false;
   
   			}
   
   		if (document.form_main.txt_password.value=='')
   
   			{
   
   				document.form_main.txt_password.focus();
   
   				return false;
   
   			}
   
   		return false;		
   
   	}		
   
   
   
   /*-------------------------------------------------------------------------------------
   
   * Tokaban Corp 1509
   
   * Package : TKB PHP SYSTEM CODE
   
   *--------------------------------------------------------------------------------------
   
   * huanlv77 - 1509/06/28.
   
   *--------------------------------------------------------------------------------------
   
   * Ham submit form co su dung su kien hidden de truyen bien flag dieu khien.
   
   * Nhiem vu gan gia tri cho bien hidden dieu khien nut nhan submit cua form.
   
   * Dung de controller nhan biet nut submit nao duoc nhan tren giao dien de xu ly tren server script.
   
   * Ham nay duoc dung chung cho toan bo ung dung.
   
   * Nen xay dung thanh chuan de tai su dung cho nhung du an khac.
   
   *--------------------------------------------------------------------------------------*/
   
   function js_SetSubmitButtonClick(obj_form, btn_name) 
   
   	{
   
   		obj_form.hidden_button_click.value = btn_name;
   
   		obj_form.submit();		
   
   	}	
   
   
   
  
   
   
   
</script>