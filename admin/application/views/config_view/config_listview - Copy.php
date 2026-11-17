<!-- Chi thiet ke view trong phan nay, cac phan khac khong can thay doi;-->
<!-- Begin of main form list view (khi copy phai dat dung ten)-->
<form name="frm_main" method="post" action="<?php echo $link_page; ?>" >
	<div class="page-wrapper">
            <?php $this->load->view('modules/mod_bread_crumb'); ?>
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Quản lý cấu hình</h4>
                                <h6 class="card-subtitle">Liệt kê danh sách cấu hình</h6>
								<!-- Begin of header function listview style-->
								<div class="mgb15">
		<table width="100%" cellspacing="1" border="0" class="tbl_header_list">
			<tr>						
				<td style="text-align:left">			
					<input name="btn_delete" type="button"  class="btn btn-info"value="<?php echo $btn_delete; ?>"  
						   onclick="js_CheckValidBeforeDeleteListview(this.form,'chkItems',
								'<?php echo $msg_confirm_before_delete; ?>' ,
								'<?php echo $msg_invalid_before_delete;  ?>' )" class="button" />
								
					<input name="btn_header_add" type="button"  class="btn btn-info"value="<?php echo $btn_add; ?>" 
						onclick="js_SetSubmitButtonClick(this.form,'btn_add');" class="button"/>
				</td>
				<td style="text-align:center">&nbsp;</td>
				<td style="text-align:right">							
					<?php if($txt_current_page > 1): ?>
						<input name="btn_header_previous" type="button"  class="btn btn-info"
						 value="<<" onclick="js_SetSubmitButtonClick(this.form,'btn_previous');"/>				
					<?php endif; ?>
					
					<label><?php echo $txt_current_page . ' / ' . $txt_total_page; ?></label>
					
					<?php if($txt_current_page < $txt_total_page): ?>
						<input name="btn_header_next" type="button"  class="btn btn-info"
							value=">>" onclick="js_SetSubmitButtonClick(this.form,'btn_next');"/>
					<?php endif; ?>
							
					<input name="txt_header_current_page" type="text" value="<?php echo $txt_current_page ; ?>"
						   style="text-align:center" size="5" class="form-control w80" />
						   
					<input name="btn_header_page_number" type="button"  class="btn btn-info"value="<?php echo $btn_choose; ?>" onclick="js_SetSubmitButtonClick(this.form,this.name);" class="button"/>
				</td>
			</tr>					
		</table>
	</div> 
	<!-- End of header function listview style -->

	<!-- Begin table of content listview -->			
	<div>	
		<table class="table  table-bordered table-hover table-striped" width="100%" cellspacing="1">
			<thead>
				<tr>
					<th style="width:60px">
						<span style="float:left; width:20px">#</span>
						<span style="float:right; width:25px">
								<input name="chkItems" type="checkbox" class="checkbox" 
									   onclick="js_CheckAllClick(this,this.name);" />
						</span>					</th>

					
					<th style="width:200px">
						<a href=" <?php echo $link_page; ?>f_sort/cname/<?php echo $orderby_sort; ?>" >							
						<?php echo $lbl_cname;?>			
						<?php
								if (trim($orderby_field) == 'cname')
									echo $sort_img;
							?>
						</a>					
					</th>
					
					<th style="width:200px">
						<a href=" <?php echo $link_page; ?>f_sort/cvalue/<?php echo $orderby_sort; ?>" >							
						<?php echo $lbl_cvalue;?>			
						<?php
								if (trim($orderby_field) == 'cvalue')
									echo $sort_img;
							?>
						</a>					
					</th>
															
					<th >
						<a href=" <?php echo $link_page; ?>f_sort/cnote/<?php echo $orderby_sort; ?>" >							
						<?php echo $lbl_cnote;?>			
						<?php
								if (trim($orderby_field) == 'cnote')
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
						<button name="btn_filter" id="btn_filter" type="button" style="width:100%;" value="<?php echo $btn_filter; ?>"  onclick="js_SubmitButtonClick(this.form,this.name);" class="button btn btn-info"/><i class="fa fa-search" aria-hidden="true"></i></button>
					</td>
					<td style="text-align:center">
						<input name="txtf_cname" type="text" class="form-control"
							   value="<?php echo $txtf_cname; ?>" />					</td>
					<td style="text-align:center">
						<input name="txtf_cvalue" type="text" class="form-control"
							   value="<?php echo $txtf_cvalue; ?>" />					</td>
					<td style="text-align:center">
						<input name="txtf_cnote" type="text" class="form-control"
							   value="<?php echo $txtf_cnote; ?>" />					</td>
				
					<td style="text-align:center">
					  <input name="txtf_ddate01" id="d_from" type="text" class="form-control"
							   value="<?php echo $txtf_ddate01; ?>" />					</td>
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
							</span>						</td>
						<td><a href="<?php echo base_url().'index.php/do_config/f_edit/'.Fview_text($data['nid']); ?>"><?php echo Fview_text($data['cname']); ?></a></td>
						<td><?php echo Fview_text($data['cvalue']); ?></td>			
						<td><?php if(strlen($data['cnote'])>35) echo Fview_text(substr($data['cnote'],0,35)).'...';else  echo Fview_text($data['cnote']); ?></td>									
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
	
	<div class="mgt15">
		<!-- Begin of footer function listview style -->
		<table width="100%" cellspacing="1" border="0" class="tbl_bottom_list">
			<tr>						
				<td style="text-align:left">			
					<input name="btn_delete" type="button"  class="btn btn-info"value="<?php echo $btn_delete; ?>"  
						   onclick="js_CheckValidBeforeDeleteListview(this.form,'chkItems',
								'<?php echo $msg_confirm_before_delete; ?>' ,
								'<?php echo $msg_invalid_before_delete;  ?>' )" class="button"/>
								
					<input name="btn_add" type="button"  class="btn btn-info"value="<?php echo $btn_add; ?>" 
						onclick="js_SetSubmitButtonClick(this.form,'btn_add');" class="button"/>
					<!--<input name="btn_export" type="button"  class="btn btn-info"class="button"
						value="<?php// echo $btn_export; ?>" 
						onclick="js_SetSubmitButtonClick(this.form,'btn_export');"/>
					<input name="btn_print_page" type="button"  class="btn btn-info"class="button"
						value="<?php// echo $btn_print; ?> " 
						onclick="window.open('<?php// echo $link_page . 'f_print'; ?>','_blank')"/>				-->
				</td>
				
				<td style="text-align:center">						
						<label style="padding-left:5px;"><?php echo $lbl_rows_per_page; ?></label>
						
						<input name="txt_row_per_page" type="text" size="5" value="<?php echo $txt_row_per_page; ?>"
							style="text-align:center" class="form-control w80" />
						
						<input name="btn_row_per_page" type="button"  class="btn btn-info"value="<?php echo $btn_choose; ?>" onclick="js_SetSubmitButtonClick(this.form,this.name);" class="button"/>									
				</td>
				
				<td style="text-align:right">							
						<?php if($txt_current_page > 1): ?>
						<input name="btn_previous" type="button"  class="btn btn-info"value="<<" 
							onclick="js_SetSubmitButtonClick(this.form,'btn_previous');"/>				
						<?php endif; ?>
						
						<label><?php echo $txt_current_page . ' / ' . $txt_total_page; ?></label>
						
						<?php if($txt_current_page < $txt_total_page): ?>
						<input name="btn_next" type="button"  class="btn btn-info"value=">>" 
							onclick="js_SetSubmitButtonClick(this.form,'btn_next');"/>
						<?php endif ?>
								
						<input name="txt_current_page" type="text" value="<?php echo $txt_current_page ; ?>"
							style="text-align:center" size="5" class="form-control w80" />
							   
						<input name="btn_page_number" type="button"  class="btn btn-info"value="<?php echo $btn_choose; ?>" onclick="js_SetSubmitButtonClick(this.form,this.name);" class="button" />
				</td>
			</tr>					
		</table>
		<input type="hidden" name="hidden_button"  id="hidden_button"/>
		<!-- End of footer function listview style -->
	</div>
</div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <?php $this->load->view('modules/mod_footer'); ?>
	</div>
</form>
