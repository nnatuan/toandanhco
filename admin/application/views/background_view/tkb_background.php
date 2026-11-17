<div id="ContentMessage">
	<div style="padding:5px;color:#FF0000;">Image wight:1600px, height: 660px</div>
	<div id="NoteContentMessage">
		<?php echo $get_message_notnull ?>
	</div>
	
	<div id="ErrorContentMessage">
		<?php echo $m_error_msg; ?>		
	</div>
	
</div>		
<form  name='form_main' id="form_main" method="post" action="<?php echo $link_page; ?>" enctype="multipart/form-data">	
<div id="SiteContent_main">			
	
	
	<div id="EditContent">
		<table class="EditStyle01" style="width:100%" >
			<tbody>								
				
				
				<tr>
					<td class="key" width="150" align="right">
					<?php echo 'Tên'; ?><?php echo $get_icon_notnull; ?>					</td>
					<td width="400">
						<input style="width:300px;" type="text" width="" name="txt_cbackground" value="<?php echo $txt_cbackground; ?>">					
					</td>
				</tr>
				<tr>
					<td class="key" width="150" align="right">
						<?php echo ""; ?>					</td>
					<td width="400">
						<input style="width:300px;" type="text" width="" name="clink" value="<?php echo $clink; ?>">					
					</td>
				</tr>
				<tr>
					<td class="key" width="150" align="right">
						<?php echo "Note"; ?>					</td>
					<td width="400">
						<textarea id="editor1" style="width:300px; height:100px" name="txt_cnote"><?php echo $txt_cnote; ?></textarea>
					</td>
				</tr>
				<tr>
					<td align="right" class="key">
						<?php echo 'Hình ảnh'; ?>						</td>
					<td>
						<input name="txt_cthumb_img" type="file" id="txt_cthumb_img" value ="" size="33" />
						<div style="top:128px; left:650px;">
						<?php 
							$url = base_url().'index.php/do_background/delete_image/'.$nid; 
						?>
							<div id="images_div" style="width: 300px;    margin-top: 20px;">
							<?php if($txt_cthumb_img !=''): echo '<img style=" border:solid 1px #ccc;width: 100%;padding:5px;"  src="'.$fr_img.'upload/background/'.$txt_cthumb_img.'  "/>'?>
							<?php endif; ?>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td class="key" width="150" align="right">&nbsp;</td>
					<td width="400">
						<input type="button" name="btn_submit" style="width:80px;" value ="<?php echo $btn_update; ?>" 
							onclick ="js_SetSubmitButtonClick(this.form, this.name);" class="button" />
													   
						<input name="btn_cancel" style="width:80px;" type="button" 
							   value = "<?php echo $btn_cancel; ?>"
							   onclick="location.href='<?php echo $link_cancel; ?> '" class="button" />
					</td>
				</tr>			
				
			<tbody>				
		</table>
		
	</div>
	<input name="hidden_nid" type="hidden" value = "<?php echo $nid; ?>"  />
	<input name="hidden_event" type="hidden" value = "<?php echo $event; ?>"  />
	<input type="hidden" name="hidden_button_click"  value = "" />	
	<input type="hidden" name="hidden_image_old"  value = "<?php echo $txt_cthumb_img; ?>" />
</div>
</form>

<!-- BAT BUOC CAC FORM NHAP LIEU DEU PHAI DUNG SCRIPT NAY. -->

<script type="text/javascript" >
	document.form_main.txt_nid.focus();

function ajax_delete_image()
	{
		document.form_main.hidden_image_old.value = '';
		pb_display('<?php echo $url ?>','images_div');
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