<?php 
	if($m_message !='') 
	{
 ?>
 <div class="message"> <?php echo $m_message; ?></div>
 <?php
 	}
 ?>
<form name="frm_materia" id="frm_materia" method="post" action="<?php echo $link_page; ?>" >
<!-- Begin of main form list view (khi copy phai dat dung ten)-->
<div id="SiteContent_main">	
	<!-- Begin of header function listview style-->
	<div>
		<table width="100%" cellspacing="1" border="0" class="tbl_header_list">
			<tr>						
				<td style="text-align:left">			
					<input name="btn_delete" type="button" value="<?php echo $btn_delete; ?>"  
						   onclick="js_CheckValidBeforeDeleteListview(this.form,'chkItems',
								'<?php echo $msg_confirm_before_delete; ?>' ,
								'<?php echo $msg_invalid_before_delete;  ?>' )" class="button"/>
								
					<input name="btn_header_add" type="button" value="<?php echo $btn_add; ?>" 
						onclick="js_SetSubmitButtonClick(this.form,'btn_add');" class="button"/>
				<!--	<input name="btn_header_export" type="button" class="button"
						value="<?php// echo $btn_export; ?>" 
						onclick="js_SetSubmitButtonClick(this.form,'btn_export');"/>	
					<input name="btn_header_print" type="button" class="button"
						value="<?php// echo $btn_print; ?> " 
					onclick="window.open('<?php// echo $link_page . 'f_print'; ?>','_blank')"/>				-->
					<!--<input <?php //if($chkf_ctag == 1) echo 'checked = "checked"' ?> type="checkbox" value="1" name="chkf_ctag" /><label><?php //echo $lbl_not_tag ?></label>-->
				</td>
				<td style="text-align:center">&nbsp;</td>
				<td style="text-align:right">							
					<?php if($txt_current_page > 1): ?>
						<input name="btn_header_previous" type="button" 
						 value="<<" onclick="js_SetSubmitButtonClick(this.form,'btn_previous');"/>				
					<?php endif; ?>
					
					<label><?php echo $txt_current_page . ' / ' . $txt_total_page; ?></label>
					
					<?php if($txt_current_page < $txt_total_page): ?>
						<input name="btn_header_next" type="button" 
							value=">>" onclick="js_SetSubmitButtonClick(this.form,'btn_next');"/>
					<?php endif; ?>
							
					<input name="txt_header_current_page" type="text" value="<?php echo $txt_current_page ; ?>"
						   style="text-align:center" size="5" />
						   
					<input name="btn_header_page_number" type="button" value="<?php echo $btn_choose; ?>" onclick="js_SetSubmitButtonClick(this.form,this.name);" class="button"/>
				</td>
			</tr>					
		</table>
	</div> 
	<!-- End of header function listview style -->
	
	<!-- Begin table of content listview -->			
	<div style="clear:both">	
		<table class="ViewStyle01" width="100%" cellspacing="1">
			<thead>
				<tr>
					<th style="width:45px">
						<span style="float:left; width:20px">#</span>
						<span style="float:right; width:24px">
								<input name="chkItems" type="checkbox" class="checkbox" 
									   onclick="js_CheckAllClick(this,this.name);" />
						</span>					</th>

					
					<th style="width:120px">
						<a href=" <?php echo $link_page; ?>f_sort/ccode/<?php echo $orderby_sort; ?>" >							
						<?php echo $lbl_ccode;?>			
						<?php
								if (trim($orderby_field) == 'ccode')
									echo $sort_img;
							?>
			</a>					</th>
						
                     <th style="width:150px">
						<a href=" <?php echo $link_page; ?>f_sort/cbrand_products/<?php echo $orderby_sort; ?>" >							
						<?php echo $lbl_cbrand_product;?>			
						<?php
								if (trim($orderby_field) == 'cbrand_products')
									echo $sort_img;
							?>
			</a>					</th>
					
                    <th style="width:150px">
						<a href=" <?php echo $link_page; ?>f_sort/cmaterial_products/<?php echo $orderby_sort; ?>" >							
						<?php echo $lbl_cmateria_product;?>			
						<?php
								if (trim($orderby_field) == 'cmaterial_products')
									echo $sort_img;
							?>
			</a>					</th>
					 <th style="width:150px">
						<a href=" <?php echo $link_page; ?>f_sort/ccat_products/<?php echo $orderby_sort; ?>" >							
						<?php echo $lbl_ccat_product;?>			
						<?php
								if (trim($orderby_field) == 'ccat_products')
									echo $sort_img;
							?>
			</a>					</th>
					
                    <th >
						<a href="#" >							
						<?php echo $lbl_nstatus;?>			
						<?php
								if (trim($orderby_field) == 'nstatus')
									
							?>
			</a>					</th>
						
					<th style="width:70px" >
						<a href=" <?php echo $link_page; ?>f_sort/cindex/<?php echo $orderby_sort; ?>" >							
						<?php echo $lbl_index;?>			
						<?php
								if (trim($orderby_field) == 'cindex')
									echo $sort_img;
							?>
			</a>					</th>
					
					
					<th style="width:100px"> 
						<a href=" <?php echo $link_page; ?>f_sort/ddate01/<?php echo $orderby_sort; ?>" >							
						<?php echo $lbl_date01 ?>				
						<?php
								if (trim($orderby_field) == 'ddate01')
									echo $sort_img;
							?>
		</a>					</th>			
				</tr>
			</thead>
						
			<tbody>
				<tr>
					<td style="text-align:center">
						<input name="btn_filter" type="button" style="width:98%" value="<?php echo $btn_filter; ?>" onclick="js_SetSubmitButtonClick(this.form,this.name);"/>			</td>
					<td style="text-align:center">
						<input name="txtf_ccode" type="text" style="width:97%" 
							   value="<?php echo $txtf_ccode; ?>" />			</td>
									
                    <td style="text-align:center">
						<input name="txtf_ccat_products" type="text" style="width:97%" 
							   value="<?php echo $txtf_cbrand_products; ?>" />			</td>
					<td style="text-align:center">
						<?php echo $gencbo_material_product_list; ?>				</td>
					<td style="text-align:center"><div id="cnid_cat_products">
						<?php echo $gencbo_cat_product_list; ?></div>				</td>
					<td style="text-align:center"><?php echo $gen_cbo_status; ?></td>
				
                	<td style="text-align:center">
						<input name="txtf_cindex" type="text" style="width:97%" 
							   value="<?php echo $txtf_cindex; ?>" />					</td>
							   
					
					<td style="text-align:center">
					  <input name="txtf_ddate01" id="d_from" type="text" style="width:97%"
							   value="<?php echo $txtf_ddate01; ?>" />					</td>
				</tr>  			

					<?php
						$row_count = 1;
						foreach($data_view as $data):
					?>								
					<tr class="row<?php echo $row_count%2; ?>">
						
						<td style="text-align:center;width:50px"> 
							<span style="float:left; width:20px">
								<?php echo $txt_row_per_page * ($txt_current_page -1) + $row_count; ?>							</span>
							<span style="float:right; width:25px">	
							<input name="chk[]" type="checkbox" value="<?php echo $data['nid']; ?>"
								id="chkItems" class="checkbox" 								   
								onclick="js_CheckItemClick(this, 'chkItems','chkItems');" />
							</span>						</td>
						<td><?php echo Fview_text($data['ccode']) ?></td>
                        <td><a href="<?php echo base_url().'index.php/do_brand_product/f_edit/'.Fview_text($data['nid']); ?>"><?php echo Fview_text($data['cbrand_products']); ?></a></td>
                        <td><?php echo Fview_text($data['cmaterial_products']) ?></td>
						 <td><?php echo Fview_text($data['ccat_products']) ?></td>
						<td style="text-align:center">
						<?php  if(Fview_text($data['nstatus'])==1)
						{
							echo '<a href="'.base_url().'index.php/do_brand_product_listview/f_active/'.$data['nid'].'/'.$data['nstatus'].'"><img src="'.base_url() .'images/publish.png"></a>';
						
						}
						else 
												echo '<a href="'.base_url().'index.php/do_brand_product_listview/f_active/'.$data['nid'].'/'.$data['nstatus'].'"><img src="'.base_url() .'images/unpublish.png"></a>';

						  ?></td>
                        <td align="center"><?php echo Fview_text($data['cindex']); ?></td>					
														
						<td style="text-align:center"><?php echo Fview_date($data['ddate01']); ?></td>						
					</tr>
					<?php
						$row_count++;
						endforeach;
					?>					
			</tbody>		
		</table>
		<!-- End of content listview style -->		
	</div>
	
	<div>
		<!-- Begin of footer function listview style -->
		<table width="100%" cellspacing="1" border="0" class="tbl_header_list">
			<tr>						
				<td style="text-align:left">			
					<input name="btn_delete" type="button" value="<?php echo $btn_delete; ?>"  
						   onclick="js_CheckValidBeforeDeleteListview(this.form,'chkItems',
								'<?php echo $msg_confirm_before_delete; ?>' ,
								'<?php echo $msg_invalid_before_delete;  ?>' )" class="button" class="button"/>
								
					<input name="btn_add" type="button" value="<?php echo $btn_add; ?>" 
						onclick="js_SetSubmitButtonClick(this.form,'btn_add');" class="button" class="button"/>
					<!--<input name="btn_export" type="button" class="button"
						value="<?php// echo $btn_export; ?>" 
						onclick="js_SetSubmitButtonClick(this.form,'btn_export');"/>
					<input name="btn_print_page" type="button" class="button"
						value="<?php// echo $btn_print; ?> " 
						onclick="window.open('<?php// echo $link_page . 'f_print'; ?>','_blank')"/>				-->
				</td>
				
				<td style="text-align:center">						
						<label style="padding-left:5px;"><?php echo $lbl_rows_per_page; ?></label>
						
						<input name="txt_row_per_page" type="text" size="5" value="<?php echo $txt_row_per_page; ?>"
							style="text-align:center" />
						
						<input name="btn_row_per_page" type="button" value="<?php echo $btn_choose; ?>" onclick="js_SetSubmitButtonClick(this.form,this.name);" class="button"/>									
				</td>
				
				<td style="text-align:right">							
						<?php if($txt_current_page > 1): ?>
						<input name="btn_previous" type="button" value="<<" 
							onclick="js_SetSubmitButtonClick(this.form,'btn_previous');"/>				
						<?php endif; ?>
						
						<label><?php echo $txt_current_page . ' / ' . $txt_total_page; ?></label>
						
						<?php if($txt_current_page < $txt_total_page): ?>
						<input name="btn_next" type="button" value=">>" 
							onclick="js_SetSubmitButtonClick(this.form,'btn_next');"/>
						<?php endif ?>
								
						<input name="txt_current_page" type="text" value="<?php echo $txt_current_page ; ?>"
							style="text-align:center" size="5" />
							   
						<input name="btn_page_number" type="button" value="<?php echo $btn_choose; ?>" onclick="js_SetSubmitButtonClick(this.form,this.name);" class="button"/>
				</td>
			</tr>					
		</table>
		<input type="hidden" name="hidden_button"  id="hidden_button"/>
		<!-- End of footer function listview style -->
	</div>
</div>
</form>	
<script type="text/javascript" >
function js_SetSubmitButtonClick(obj_form, btn_name) 
	{
		obj_form.hidden_button.value = btn_name;
		obj_form.submit();		
	}	
$('#cbof_nid_material_products').change(function() {
	_nid_cat =this.value;
	$("#cnid_cat_products").html('loading...');
 	$.post("<?php echo base_url().'index.php/do_brand_product_listview/ajax_get_product_cat/'?>", { nid_cat: _nid_cat},
  	function(data) {
		$("#cnid_cat_products").html(data);
  	});
});
load_cat();
function load_cat(_nid_sec)
{
	_nid_sec ='<?php echo $cbof_nid_material_products?>';
	_nid_cat='<?php echo $cbof_nid_cat_products?>';
	if(_nid_cat !='')
	{
		$.post("<?php echo base_url().'index.php/do_brand_product_listview/ajax_get_product_cat_select/'?>", { nid_cat: _nid_cat,nid_cat_select:_nid_brand},
		function(data) {
			$("#cnid_cat_products").html(data);
		});
	}
}
</script>