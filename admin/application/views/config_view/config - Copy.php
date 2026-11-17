<!-- Chi thiet ke view trong phan nay, cac phan khac khong can thay doi;-->
	
<form  name='form_main' method="post" action="<?php echo $link_page; ?>" >	
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
                                <h6 class="card-subtitle">Thêm mới cấu hình</h6>
								
								<div>
								<table class="table  table-bordered" >
									<tbody>		
									
										<tr>
												<td class="key" width="150" align="right">
												<?php echo $lbl_cname; ?><?php echo $get_icon_notnull; ?>					</td>
												<td width="400">
													<input type="text" width="" name="txt_cname" value="<?php echo $txt_cname; ?>" class="form-control">					</td>
										</tr>
										<tr>
												<td class="key" width="150" align="right">
												<?php echo $lbl_cvalue; ?><?php echo $get_icon_notnull; ?>					</td>
												<td width="400">
													<input type="text" width="" name="txt_cvalue" value="<?php echo $txt_cvalue; ?>" class="form-control">					</td>
										</tr>							
										<tr>
												<td class="key" width="150" align="right">
												<?php echo $lbl_cnote; ?></td>
												<td>			
												<textarea name="txt_cnote" class="form-control"><?php echo $txt_cnote ?></textarea>	
												</td>
										</tr>
										<tr>
												<td class="key" width="150" align="right">&nbsp;</td>
												<td>			
													<input type="button"  class="btn btn-info"name="btn_submit" value ="<?php echo $btn_update; ?>" 
														onclick ="js_SetSubmitButtonClick(this.form, this.name);" class="button"/>
																			   
													<input name="btn_cancel" type="button"  class="btn btn-info"
													   value = "<?php echo $btn_cancel; ?>"
													   onclick="location.href='<?php echo $link_cancel; ?> '" class="button" />						
												</td>
										</tr>
									
									<tbody>	
									</table>	
								</div>
							</div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <?php $this->load->view('modules/mod_footer'); ?>
	<input name="hidden_nid" type="hidden" value = "<?php echo $nid; ?>"  />
	<input name="hidden_event" type="hidden" value = "<?php echo $event; ?>"  />
	<input type="hidden" name="hidden_button"  value = "" />	
</div>
</form>