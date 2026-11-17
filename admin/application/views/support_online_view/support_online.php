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
					<td class="key" width="150" align="right">
					<?php echo $lbl_ccontact_nick; ?><?php echo $get_icon_notnull; ?>					</td>
						<td width="400">
							<input style="width:250px;" type="text" width="" name="txt_ccontact_nick" value="<?php echo $txt_ccontact_nick; ?>">					</td>
				</tr>
				<tr>
						<td class="key" width="150" align="right">
					<?php echo $lbl_cname; ?><?php echo $get_icon_notnull; ?>					</td>
						<td width="400">

						<input style="width:250px;" type="text" width="" name="txt_cname" value="<?php echo $txt_cname; ?>">					</td>
				</tr>							
				<tr>
						<td class="key" width="150" align="right">
						<?php echo 'Index'; ?>					</td>
						<td width="400">
							<input style="width:250px;" type="text" width="" name="txt_cindex" value="<?php echo $txt_cindex; ?>" maxlength="4"/>					</td>
				</tr>
                <tr>
						<td class="key" width="150" align="right">
						<?php echo $lbl_nstatus; ?>					</td>
						<td width="400"><?php echo $gen_cbo_status ?></td>
				</tr>
				<tr>
						<td class="key" width="150" align="right">
						<?php echo $lbl_cnote; ?></td>
						<td>			
						<textarea name="txt_cnote"><?php echo $txt_cnote ?></textarea>	
						</td>
				</tr>
				<tr>
						<td class="key" width="150" align="right">&nbsp;</td>
						<td>			
							<input type="button" name="btn_submit" style="width:80px;" value ="<?php echo $btn_update; ?>" 
								onclick ="js_SetSubmitButtonClick(this.form, this.name);" class="button"/>
													   
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
</div>
</form>

<!-- BAT BUOC CAC FORM NHAP LIEU DEU PHAI DUNG SCRIPT NAY. -->

<script type="text/javascript" >

function js_SetSubmitButtonClick(obj_form, btn_name) 
	{
		obj_form.hidden_button_click.value = btn_name;
		obj_form.submit();		
	}	

</script>