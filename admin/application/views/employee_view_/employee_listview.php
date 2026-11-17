<!-- Chi thiet ke view trong phan nay, cac phan khac khong can thay doi;-->

<!-- Begin of main form list view (khi copy phai dat dung ten)-->
<div id="SiteContent_main">	
<form name="frm_employee" method="post" action="<?php echo $link_page; ?>" >
	<!-- Begin of header function listview style-->
	<div>
		<table width="100%" cellspacing="1" border="0" class="tbl_header_list">
			<tr>						
			  <td style="text-align:left">			
					<input name="btn_header_delete" type="button" value="<?php echo $btn_delete; ?>"
						   onclick="js_CheckValidBeforeDeleteListview(this.form,'chkItems',
								'<?php echo $msg_confirm_before_delete; ?>' ,
								'<?php echo $msg_invalid_before_delete;  ?>' )" class="button"/>
								
					<input type="button" name="btn_header_add" value = "<?php echo $btn_add ?>" 
						onclick ="js_SubmitButtonClick(this.form, 'btn_add');" class="button"/>
						
					
			  </td>
				
				<td style="text-align:center">
				</td>
				
				<td style="text-align:right">							
						<?php if($txt_current_page > 1): ?>
							<input name="btn_header_previous" type="button" 
								   value="<<" onclick="js_SubmitButtonClick(this.form,'btn_previous');"/>
						<?php endif; ?>

						<label class="lbl_page"><?php echo $txt_current_page . ' / ' . $txt_total_page; ?></label>

						<?php if($txt_current_page < $txt_total_page): ?>
							<input name="btn_header_next" type="button" 
								value=">>" onclick="js_SubmitButtonClick(this.form,'btn_next');"/>
						<?php endif; ?>
								
						<input name="txt_header_current_page" type="text" 
							value="<?php echo $txt_current_page ; ?>" style="text-align:center" size="5" />
							   
						<input name="btn_header_page_number" type="button" value="<?php echo $btn_choose; ?>" 
							onclick="js_SubmitButtonClick(this.form,this.name);" class="button"/>
					
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
						<span style="float:left; width:20px">&nbsp;#</span>
						<span style="float:right; width:25px">
								<input name="chkItems" type="checkbox" class="checkbox" 
									   onclick="js_CheckAllClick(this,this.name);" />
						</span>					</th>
					
					<th style="width:80px">
						<a href="<?php echo $link_page; ?>/f_sort/ccode/<?php echo $orderby_sort; ?>" >							
						<?php  echo $lbl_ccode; ?></a>						<a href="<?php echo $link_page; ?>/f_sort/ccode/<?php echo $orderby_sort; ?>" >
						<?php
								if (trim($orderby_field) == 'ccode')
									echo $sort_img;
							?>
						</a></th>
					
					<th style="width:100px">
						<a href="<?php echo $link_page; ?>/f_sort/cuserid/<?php echo $orderby_sort; ?>" >							
							<?php echo $lbl_cuserid; ?>
							<?php
								if (trim($orderby_field) == 'cuserid')
									echo $sort_img;
							?>
						</a>						</th>
					<th style="width:200px">
						<a href="<?php echo $link_page; ?>/f_sort/cemail/<?php echo $orderby_sort; ?>" >
							<?php echo $lbl_cemail; ?>
							<?php
								if (trim($orderby_field) == 'cemail')
										echo $sort_img;
							?>
						</a>					</th>
					<th style="width:120px">
						<a href="<?php echo $link_page; ?>/f_sort/cisadmin/<?php echo $orderby_sort; ?>" >
							<?php echo $lbl_cisadmin; ?>
							<?php
								if (trim($orderby_field) == 'cisadmin')
										echo $sort_img;
							?>
						</a>					</th>
					<th>
						<a href="<?php echo $link_page; ?>/f_sort/cnote/<?php echo $orderby_sort; ?>" >							
							<?php echo $lbl_cnote; ?>
							<?php
								if (trim($orderby_field) == 'cnote')
									echo $sort_img;
							?>
						</a>						</th>
									
					<th style="width:80px"> 
						<a href="<?php echo $link_page; ?>/f_sort/ddate01/<?php echo $orderby_sort; ?>" >							
							<?php echo $lbl_ddate01; ?>
							<?php
								if (trim($orderby_field) == 'ddate01')
									echo $sort_img;
							?>
						</a>						</th>
					
					<th style="width:80px"> 
						<a href="<?php echo $link_page; ?>/f_sort/ddate02/<?php echo $orderby_sort; ?>" >							
							<?php echo $lbl_ddate02; ?>
							<?php
								if (trim($orderby_field) == 'ddate02')
									echo $sort_img;
							?>
						</a>						</th>
				</tr>
			</thead>
						
			<tbody>
				
				<tr>
				
					<td style="text-align:center">
						<input name="btn_filter" id="btn_filter" type="button" style="width:98%" value="<?php echo $btn_filter; ?>"  onclick="js_SubmitButtonClick(this.form,this.name);"/>						</td>
					
					<td style="text-align:center"> 
						<input name="txtf_ccode" type="text" style="width:96%" 
							   value="<?php echo $txtf_ccode; ?>" />						</td>
					
					<td style="text-align:center"> 
						<input name="txtf_cuserid" type="text" style="width:97%" 
							   value="<?php echo $txtf_cuserid ?>" />						</td>
					<td style="text-align:center">
						<input name="txtf_cemail" type="text" style="width:97%" 
							   value="<?php echo $txtf_cemail; ?>" />						</td>	   
					<td style="text-align:center">
						<?php echo $gencbo_user_type ?> 						</td>
					<td style="text-align:center">
						<input name="txtf_cnote" type="text" style="width:97%" 
							   value="<?php echo $txtf_cnote; ?>" />						</td>
					
					<td>&nbsp;</td>
							
					<td>&nbsp;</td>	
				</tr>
				

					<?php
						$row_count = 1;
						foreach($data_view as $data):
					?>								
					<tr class="row<?php echo $row_count%2; ?>">
						
						<td style="text-align:center; width:45px">
						<span style="float:left; width:20px">
								<?php echo $txt_row_per_page * ($txt_current_page -1) + $row_count; ?>								</span>
							<span style="float:right; width:25px">		
						<input name="chk[]" type="checkbox" value="<?php echo $data['nid']; ?>"
								id="chkItems" class="checkbox" 								   
								onclick="js_CheckItemClick(this, 'chkItems','chkItems');" />
					  </span>							</td>
			
						<td>						
							<a href="<?php echo base_url() . 'index.php/do_employee/f_edit/' . $data['nid']; ?>"  >
								<?php echo  Fview_text($data['ccode']); ?>							</a>						</td>
						
						<td><?php echo Fview_text($data['cuserid']); ?></td>										
						<td><?php echo Fview_text($data['cemail']); ?></td>
						<td><?php echo Fview_text($data['cisadmin_name']); ?></td>
						<td><?php echo Fview_text($data['cnote']); ?></td>						
						<td style="text-align:right"><?php echo Fview_date($data['ddate01']); ?></td>						
						<td style="text-align:right"><?php echo Fview_date($data['ddate02']); ?></td>
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
		<table width="100%" cellspacing="1" border="0" class="tbl_bottom_list">
			<tr>						
				<td style="text-align:left">														
					<input name="btn_footer_delete" type="button" value="<?php echo $btn_delete; ?>"
						   onclick="js_CheckValidBeforeDeleteListview(this.form,'chkItems',
								'<?php echo $msg_confirm_before_delete; ?>' ,
								'<?php echo $msg_invalid_before_delete;  ?>' )" class="button"/>
					<input type="button" name="btn_footer_add" value = "<?php echo $btn_add ?>" 
						onclick ="js_SubmitButtonClick(this.form, 'btn_add');" class="button"/>
						   	
						</td>
				
				<td style="text-align:center">						
					
						<label style="padding-left:5px;"><?php echo $lbl_rows_per_page; ?></label>
						
						<input name="txt_row_per_page" type="text" size="5" value="<?php echo $txt_row_per_page; ?>"
							style="text-align:center" />
						
						<input name="btn_row_per_page" type="button" value="<?php echo $btn_choose; ?>" onclick="js_SubmitButtonClick(this.form,this.name);" class="button"/>				</td>
				
				<td style="text-align:right">							
					
						<?php if($txt_current_page > 1): ?>
						<input name="btn_footer_previous" type="button" value="<<" 
							onclick="js_SubmitButtonClick(this.form,'btn_previous');"/>				
						<?php endif; ?>
						
						<label class="lbl_page"><?php echo $txt_current_page . ' / ' . $txt_total_page; ?></label>
						
						<?php if($txt_current_page < $txt_total_page): ?>
						<input name="btn_footer_next" type="button" value=">>" 
							onclick="js_SubmitButtonClick(this.form,'btn_next');"/>
						<?php endif ?>
								
						<input name="txt_footer_current_page" type="text" value="<?php echo $txt_current_page ; ?>"
							style="text-align:center" size="5" />
							   
						<input name="btn_footer_page_number" type="button" value="<?php echo $btn_choose; ?>" onclick="js_SubmitButtonClick(this.form,this.name);" class="button" />				</td>
			</tr>					
		</table>
		<input type="hidden" name="hidden_button"  id="hidden_button" value= "<?php echo $default_hidden ?>"  />
		<!-- End of footer function listview style -->
	</div>
	</form>
</div>
