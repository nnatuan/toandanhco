
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
		<?php echo $lbl_error_msg; ?>
	</div>
</div>	
	
<form  name='form_main' id="form_main" method="post" action="<?php echo $link_page; ?>" enctype="multipart/form-data">	
<div id="SiteContent_main">			
	
	
	<div id="EditContent">
    
		<table class="EditStyle01" >
			<tbody>		
			
				<tr>
						<td class="key" width="110" >
						<?php echo $lbl_ccode; ?><?php echo $get_icon_notnull; ?>					</td>
						<td width="400">
							<input style="width:150px;" type="text" width="" id="txt_ccode" name="txt_ccode" value="<?php echo $txt_ccode; ?>">					</td>
				
                <tr>
						<td class="key">
						<?php echo $lbl_ccat_product; ?><?php echo $get_icon_notnull; ?>					</td>
						<td >
							<input style="width:150px;" type="text" width="" name="txt_ccat_products" value="<?php echo $txt_ccat_products; ?>" onkeyup="document.getElementById('txt_ccode').value = locdau(this.value);">					</td>
				</tr>
								
				<tr>
						<td class="key" >
						<?php echo $lbl_index; ?>					</td>
						<td >
							<input style="width:150px;" type="text" width="" name="txt_cindex" value="<?php echo $txt_cindex; ?>" maxlength="4"/>					</td>
				</tr>
                <tr>
						<td class="key" >
						<?php echo $lbl_nstatus; ?>					</td>
						<td ><?php echo $gen_cbo_status ;?></td>
				</tr>
                 <tr>
						<td class="key" >
						<?php echo $lbl_cmaterial_product; ?>					</td>
						<td><div style="width:153px"><?php echo $gencbo_material_product_list?></div></td>
				</tr>
				
				<tr>
						<td class="key">
						<?php echo $lbl_cnote; ?></td>
						<td>
                        	 <textarea style="width:300px; height:50px" name="txt_cnote"><?php echo $txt_cnote; ?></textarea>			
							
						</td>
				</tr>
				<tr>
						<td class="key" >
						<?php echo $lbl_tag; ?>					</td>
						<td >
							<input style="width:150px;" type="text" width="" name="txt_ctag" value="<?php echo $txt_ctag; ?>" />					</td>
				</tr>
				
			
			<tbody>				
		</table>
       
         <div style="margin:20px 10px 30px 10px;">
         
						<input type="button" name="btn_submit" style="width:80px;" value ="<?php echo $btn_update; ?>" 
							onclick ="js_SetSubmitButtonClick(this.form, this.name);" class="button"/>
													   
						<input name="btn_cancel" style="width:80px;" type="button" 
							   value = "<?php echo $btn_cancel; ?>"
							   onclick="location.href='<?php echo $link_cancel; ?> '" class="button"/>
						
         </div>
         
	</div>
	<input name="hidden_nid" type="hidden" value = "<?php echo $nid; ?>"  />
	<input name="hidden_event" type="hidden" value = "<?php echo $event; ?>"  />
	<input type="hidden" name="hidden_button_click"  value = "" />	
	<input type="hidden" name="hidden_image_old"  value = "<?php echo $txt_cthumb_img; ?>" />
</div>
</form>


<script type="text/javascript" >
function js_SetSubmitButtonClick(obj_form, btn_name) 
	{
		obj_form.hidden_button_click.value = btn_name;
		obj_form.submit();		
	}	
</script>