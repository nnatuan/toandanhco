<!-- Chi thiet ke view trong phan nay, cac phan khac khong can thay doi;-->
	
<form  name='form_main' method="post" action="<?php echo $link_page; ?>" >	
	<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
			<!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Quản lý module</h4>
                                <h6 class="card-subtitle">Thêm mới module</h6>
								
								<div>
									<table class="table  table-bordered" >
										<tbody>								
											<tr>
												<td class="key" width="150" align="right">
												<?php echo $lbl_code; ?><?php echo $get_icon_notnull; ?>					</td>
												<td width="400">
													<input type="text" width="" name="txt_ccode" value="<?php echo $txt_ccode; ?>" class="form-control">					</td>
											</tr>
											
											<tr>
													<td class="key" width="150" align="right">
													<?php echo $lbl_module; ?><?php echo $get_icon_notnull; ?>					</td>
													<td width="400">
														<input type="text" width="" name="txt_cmodule" value="<?php echo $txt_cmodule; ?>" class="form-control">					</td>
											</tr>
											
											<tr>
												<td class="key" width="150" align="right">
													<?php echo $lbl_status; ?>					</td>
												<td width="400"><?php echo $gen_cbo_status;?></td>
											</tr>
															<tr>
												<td class="key" width="150" align="right">
													<?php echo $lbl_index; ?>					</td>
												<td width="400">
													<input type="text" name="txt_cindex" value="<?php echo $txt_cindex; ?>" maxlength="4" class="form-control"/>					</td>
											</tr>
											<tr>
												<td class="key" width="150" align="right">
													<?php echo $lbl_note; ?>					</td>
												<td width="700" height="400">						
													 <textarea id="editor1" name="txt_cnote" class="form-control"><?php echo $txt_cnote; ?></textarea>	
												</td>
											</tr>
											<tr>
												<td class="key" width="150" align="right">&nbsp;</td>
												<td>
													<input type="button" name="btn_submit" value ="<?php echo $btn_update; ?>" 
														onclick ="js_SetSubmitButtonClick(this.form, this.name);" class="button btn btn-info"/>
																				   
													<input name="btn_cancel" type="button" 
														   value = "<?php echo $btn_cancel; ?>"
														   onclick="location.href='<?php echo $link_cancel; ?> '" class="button btn btn-info" />	
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
	<input type="hidden" name="hidden_button_click"  value = "" />	
</div>
</form>

<!-- BAT BUOC CAC FORM NHAP LIEU DEU PHAI DUNG SCRIPT NAY. -->

<script type="text/javascript" >
	document.form_main.txt_nid.focus();

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