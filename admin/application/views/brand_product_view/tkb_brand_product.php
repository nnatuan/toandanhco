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
		<table class="EditStyle01"  style="width:100%;">
			<tbody>		
			
				<tr>
						<td class="key" width="110" >
						<?php echo $lbl_ccode; ?><?php echo $get_icon_notnull; ?>					</td>
						<td width="400">
							<input style="width:320px;" type="text" width="" name="txt_ccode" value="<?php echo $txt_ccode; ?>">					</td>
				
                <tr>
						<td class="key">
						<?php echo $lbl_ccat_product; ?><?php echo $get_icon_notnull; ?>					</td>
						<td >
							<input style="width:320px;" type="text" width="" name="txt_ccat_products" value="<?php echo $txt_ccat_products; ?>">					</td>
				</tr>
				<tr>
					<td align="right" class="key">
						<?php echo 'Hình ảnh'; ?>						</td>
					<td>
						<input name="txt_cthumb_img" type="file" id="txt_cthumb_img" value ="" size="33" />
						<div style="position:absolute; top:128px; left:650px;">
						<?php 
							$url = base_url().'index.php/do_brand_product/delete_image/'.$nid; 
						?>
							<div id="images_div">
							<?php if($txt_cthumb_img !=''): echo '<img width="100" style=" border:solid 2px #999999;"  height="60" src="'.$fr_img.'upload/image_brand_product/'.$txt_cthumb_img.'  "/>'?>
							<p style="text-align:center"><a href="#" onclick="javascript:ajax_delete_image();">Delete</a></p>
							<?php endif; ?>
							</div>
						</div>
					</td>
				</tr>								
				<tr>
						<td class="key" >
						<?php echo $lbl_index; ?>					</td>
						<td >
							<input style="width:320px;" type="text" width="" name="txt_cindex" value="<?php echo $txt_cindex; ?>" maxlength="4"/>					</td>
				</tr>
                <tr>
						<td class="key" >
						<?php echo $lbl_nstatus; ?>					</td>
						<td ><?php echo $gen_cbo_status ;?></td>
				</tr>
                 <tr>
						<td class="key" >
						<?php echo $lbl_nid_material_products; ?><?php echo $get_icon_notnull; ?>					</td>
						<td><div style="width:153px"><?php echo $gencbo_material_product_list?></div></td>
				</tr>
				  <tr>
						<td class="key" >
						<div >
						<?php echo $lbl_nid_cat_products; ?>		<?php echo $get_icon_notnull; ?>			
						</div>
						</td>
						<td><div style="width:153px;" id="cnid_cat_products"><?php echo $gencbo_cat_product_list?></div></td>
				</tr>
				<tr style="display:none">
					<td class="key" width="150" align="right">
						<?php echo $lbl_tag; ?>					</td>
					<td width="400">
						<textarea style="width:300px; height:100px" name="txt_ctag"><?php echo $txt_ctag; ?></textarea></td>
				</tr>
				<tr>
						<td class="key">
						<?php echo $lbl_cnote; ?></td>
						<td height="500" >					
							<?php echo $this->fckeditor->Create('txt_cnote',$txt_cnote,'Basic');?>	
						</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<input type="button" name="btn_submit" style="width:80px;" value ="<?php echo $btn_update; ?>" 
							onclick ="js_SetSubmitButtonClick(this.form, this.name);" class="button"/>
													   
						<input name="btn_cancel" style="width:80px;" type="button" 
							   value = "<?php echo $btn_cancel; ?>"
							   onclick="location.href='<?php echo $link_cancel; ?> '" class="button"/>
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
function js_SetSubmitButtonClick(obj_form, btn_name) 
	{
		obj_form.hidden_button_click.value = btn_name;
		obj_form.submit();		
	}	
	$('#cbo_nid_material_products').change(function() {
	_nid_cat =this.value;
	$("#cnid_cat_products").html('loading...');
 	$.post("<?php echo base_url().'index.php/do_brand_product/ajax_get_product_cat/'?>", { nid_cat: _nid_cat},
  	function(data) {
		$("#cnid_cat_products").html(data);
  	});
});
load_cat();
function load_cat(_nid_sec)
{
	_nid_sec ='<?php echo $nid_material_products?>';
	_nid_cat='<?php echo $nid_cat_products?>';
	if(_nid_cat !='')
	{
		$.post("<?php echo base_url().'index.php/do_brand_product/ajax_get_product_cat_select/'?>", { nid_cat: _nid_cat,nid_cat_select:_nid_brand},
		function(data) {
			$("#cnid_cat_products").html(data);
		});
	}
}

function ajax_delete_image()
	{
		document.form_main.hidden_image_old.value = '';
		pb_display('<?php echo $url ?>','images_div');
	}	
</script>