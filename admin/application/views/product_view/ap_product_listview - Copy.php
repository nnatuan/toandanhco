<!-- Chi thiet ke view trong phan nay, cac phan khac khong can thay doi;-->
<form name="frm_product" id="frm_product" method="post" action="<?php echo $link_page; ?>" >
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
						   
					<input name="btn_header_page_number" type="button" value="<?php echo $btn_choose; ?>" onclick="js_SetSubmitButtonClick(this.form,this.name);"/>
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
						<span style="float:left; width:20px">
						<a href="<?php echo $link_page; ?>f_sort/nid/<?php echo $orderby_sort; ?>" >							
						<?php echo '#' ?>			
						<?php
								if (trim($orderby_field) == 'nid')
									echo $sort_img;
							?>
						</a>
						</span>
						<span style="float:right; width:25px">
								<input name="chkItems" type="checkbox" class="checkbox" 
									   onclick="js_CheckAllClick(this,this.name);" />
						</span>					
					</th>
					
					<th style="width:100px">
						<a href="<?php echo $link_page; ?>f_sort/ccode/<?php echo $orderby_sort; ?>" >							
						<?php echo $lbl_ccode ?>			
						<?php
								if (trim($orderby_field) == 'ccode')
									echo $sort_img;
							?>
						</a>					
					</th>
					
					<th>
						<a href="<?php echo $link_page; ?>f_sort/cproducts/<?php echo $orderby_sort; ?>" >							
						<?php echo $lbl_cproducts;?>			
						<?php
								if (trim($orderby_field) == 'cproducts')
									echo $sort_img;
							?>
						</a>					
					</th>
					
					<th style="width:100px">
						<a href="<?php echo $link_page; ?>f_sort/cmaterial_products/<?php echo $orderby_sort; ?>" >							
						<?php echo $lbl_nid_metarial_product ?>			
						<?php
								if (trim($orderby_field) == 'cmaterial_products')
									echo $sort_img;
							?>
						</a>					
					</th>
					
					<th style="width:100px">
						<a href="<?php echo $link_page; ?>f_sort/ccat_products/<?php echo $orderby_sort; ?>" >							
						<?php echo $lbl_nid_cat_product ?>			
						<?php
								if (trim($orderby_field) == 'ccat_products')
									echo $sort_img;
							?>
						</a>					
					</th>
					
					<th style="width:70px;">
						<a href="<?php echo $link_page; ?>f_sort/nstatus/<?php echo $orderby_sort; ?>" >							
						<?php echo $lbl_nstatus;?>			
						<?php
								if (trim($orderby_field) == 'nstatus')
									echo $sort_img;
							?>
						</a>					
					</th>
					<th style="width:70px;">
						<a href="<?php echo $link_page; ?>f_sort/ncheck/<?php echo $orderby_sort; ?>" >							
						Home			
						<?php
								if (trim($orderby_field) == 'ncheck')
									echo $sort_img;
							?>
						</a>					
					</th>	
					<th style="width:70px;">
						<a href="<?php echo $link_page; ?>f_sort/nkm/<?php echo $orderby_sort; ?>" >							
						Khuyến mãi			
						<?php
								if (trim($orderby_field) == 'nkm')
									echo $sort_img;
							?>
						</a>					
					</th>
					<th style="width:70px;">
						<a href="<?php echo $link_page; ?>f_sort/npb/<?php echo $orderby_sort; ?>" >							
						Phổ biến			
						<?php
								if (trim($orderby_field) == 'npb')
									echo $sort_img;
							?>
						</a>					
					</th>
					<th style="width:100px">&nbsp</th>	
				</tr>
			</thead>
						
			<tbody>
				<tr>
					<td style="text-align:center">
						<input name="btn_filter" type="button" style="width:98%" value="<?php echo $btn_filter; ?>" onclick="js_SetSubmitButtonClick(this.form,this.name);"/>					</td>
					<td style="text-align:center">
						<input name="txtf_ccode" type="text" style="width:97%" 
							   value="<?php echo $txtf_ccode; ?>" />					</td>
					<td style="text-align:center">
						<input name="txtf_cproducts" type="text" style="width:97%" 
							   value="<?php echo $txtf_cproducts; ?>" />					</td>
							   
					<td style="text-align:center"><?php echo $gencbo_material_product_list ?></td>
					
					<td style="text-align:center"><div id="cnid_cat_products"><?php echo $gencbo_cat_product_list ?></div></td>
					
                	<td style="text-align:center"><?php echo $gen_cbo_status ?></td>
					<td style="text-align:center"><?php echo $gen_cbo_check ?></td>
					<td style="text-align:center">&nbsp</td>
					<td style="text-align:center">&nbsp</td>
					<td style="text-align:center">&nbsp</td>
				</tr>  			

					<?php
						$row_count = 1;
						foreach($data_view as $data):
					?>								
					<tr class="row<?php echo $row_count%2; ?>">
						
						<td style="text-align:center;; width:45px"> 
							<span style="float:left; width:20px">
								<?php echo $txt_row_per_page * ($txt_current_page -1) + $row_count; ?>							</span>
							<span style="float:right; width:25px">	
							<input name="chk[]" type="checkbox" value="<?php echo $data['nid']; ?>"
								id="chkItems" class="checkbox" 								   
								onclick="js_CheckItemClick(this, 'chkItems','chkItems');" />
							</span>						
						</td>
						<td><?php echo Fview_text($data['ccode']); ?></td>
						<td><a href="<?php echo base_url().'index.php/do_product/f_edit/'.$data['nid']; ?>"><?php echo Fview_text($data['cproducts']); ?></a></td>
						<td><?php echo Fview_text($data['cmaterial_products']); ?></td>
						<td><?php echo Fview_text($data['ccat_products']); ?></td>					
						<td style="text-align:center">
						<?php 
							$link = $link_page.'f_active/'.$data['nid'].'/'.$data['nstatus'];
							echo show_img_pulish_active($link,$data['nstatus']); 
						?>
						</td>
						<td style="text-align:center">
						<?php 
							$link = $link_page.'f_check/'.$data['nid'].'/'.$data['ncheck'];
							echo show_img_pulish_active($link,$data['ncheck']); 
						?>
						</td>
						<td style="text-align:center">
						<?php 
							$link = $link_page.'f_km/'.$data['nid'].'/'.$data['nkm'];
							echo show_img_pulish_active($link,$data['nkm']); 
						?>
						</td>
						<td style="text-align:center">
						<?php 
							$link = $link_page.'f_pb/'.$data['nid'].'/'.$data['npb'];
							echo show_img_pulish_active($link,$data['npb']); 
						?>
						</td>
						<td style="text-align:center"><a href="<?php echo base_url().'index.php/do_product_img/get_id/'.$data['nid']?>">Thêm hình</a> </td>		
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
				</td>
				
				<td style="text-align:center">						
						<label style="padding-left:5px;"><?php echo $lbl_rows_per_page; ?></label>
						
						<input name="txt_row_per_page" type="text" size="5" value="<?php echo $txt_row_per_page; ?>"
							style="text-align:center" />
						
						<input name="btn_row_per_page" type="button" value="<?php echo $btn_choose; ?>" onclick="js_SetSubmitButtonClick(this.form,this.name);" class="button" class="button"/>									
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
<script type="text/javascript">
$('#cbof_nid_material_products').change(function() {
	_nid_cat =this.value;
	$("#cnid_cat_products").html('loading...');
 	$.post("<?php echo base_url().'index.php/do_product_listview/ajax_get_product_cat/'?>", { nid_cat: _nid_cat},
  	function(data) {
		$("#cnid_cat_products").html(data);
  	});
});


$('#cbof_nid_cat_products').change(function() {
	_nid_cat =this.value;
	$("#dv_brand").html('loading...');
 	$.post("<?php echo base_url().'index.php/do_product_listview/ajax_get_product_brand/'?>", { nid_cat: _nid_cat},
  	function(data) {
		$("#dv_brand").html(data);
  	});
});




function load_brand(nid_cat)
{
		_nid_cat =nid_cat;
		$("#dv_brand").html('loading...');
		$.post("<?php echo base_url().'index.php/do_product_listview/ajax_get_product_brand/'?>", { nid_cat: _nid_cat},
		function(data) {
			$("#dv_brand").html(data);
		});	
}

</script>