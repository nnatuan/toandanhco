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
                                <h4 class="card-title">Quản lý nhân viên</h4>
                                <h6 class="card-subtitle">Thêm mới nhân viên</h6>
								
								<div>
									<table class="table  table-bordered table-hover" >
										<tbody>								
											<tr>
												<td class="key" align="right">
													<?php echo $lbl_ccode ?><?php echo $get_icon_notnull; ?>						
												</td>
												<td >
													<input type="text" name="txt_ccode" value ="<?php echo $txt_ccode; ?>" size="20" class="form-control" />						
												</td>			
											</tr>
											<tr>
												<td class="key" align="right">
													<?php echo $lbl_cuserid ?><?php echo $get_icon_notnull; ?>
												</td>
												<td >
													<input type="text" name="txt_cuserid" value ="<?php echo $txt_cuserid?>" size="20" class="form-control" />
												</td>			
											</tr>
											<tr>
												<td class="key" align="right">
													<?php echo $lbl_cfirstname ?><?php echo $get_icon_notnull; ?>
												</td>
												<td >
													<input type="text" name="txt_cfirstname" value ="<?php echo $txt_cfirstname?>" size="20" class="form-control" />
												</td>			
											</tr>
											<tr>
												<td class="key" align="right">
													<?php echo $lbl_cmiddlename ?><?php echo $get_icon_notnull; ?>
												</td>
												<td >
													<input type="text" name="txt_cmiddlename" value ="<?php echo $txt_cmiddlename?>" size="20" class="form-control" />
												</td>			
											</tr>
											<tr>
												<td class="key" align="right">
													<?php echo $lbl_clastname ?><?php echo $get_icon_notnull; ?>
												</td>
												<td >
													<input type="text" name="txt_clastname" value ="<?php echo $txt_clastname?>" size="20" class="form-control" />
												</td>			
											</tr>
											<tr>
												<td class="key" align="right">
													<?php echo $lbl_cemail ?><?php echo $get_icon_notnull; ?>
												</td>
												<td >
													<input type="text" name="txt_cemail" value ="<?php echo $txt_cemail?>" size="20" class="form-control" />
												</td>			
											</tr>
											<tr>
												<td class="key" align="right">
													<?php echo $lbl_cpassword ?><?php echo $get_icon_notnull; ?>
												</td>
												<td >
													<input type="password" name="txt_cpassword" value ="<?php echo $txt_cpassword ?>" size="20" class="form-control" />
												</td>			
											</tr>
											<tr>
												<td class="key" align="right">
													Chi nhánh
												</td>
												<td >
													<?php echo $gencbo_department_list?>
												</td>				
											</tr>		
											<tr>
												<td class="key" align="right">
													<?php echo $lbl_cisadmin ?><?php echo $get_icon_notnull; ?>
												</td>
												<td >
													<?php echo $gencbo_user_type?>
												</td>				
											</tr>
											<tr>
												<td class="key" align="right">
													<?php echo $lbl_cnote; ?>
												</td>
												<td >			
													<textarea name="txt_cnote" rows="5" cols="50" class="form-control"><?php echo $txt_cnote ?></textarea>					</td>			
											</tr>	
											
											<tr>
												<td></td>
												<td>
													<input type="button" name="btn_submit" value ="<?php echo $btn_update; ?>" 
														onclick ="js_SetSubmitButtonClick(this.form, this.name);" class="btn btn-info"/>
																				   
													<input name="btn_cancel" type="button" 
														   value = "<?php echo $btn_cancel; ?>"
														   onclick="location.href='<?php echo $link_cancel; ?> '"  class="btn btn-info"/>
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
	<!-- DAY LA 3 BIEN CO BAN, KHONG DUOC TU Y THAY DOI. -->
	<input name="hidden_nid" type="hidden" value = "<?php echo $nid; ?>"  />
	<input name="hidden_event" type="hidden" value = "<?php echo $event; ?>"  />
	<input type="hidden" name="hidden_button"  value = "" />	
</div>
</form>


<!-- BAT BUOC CAC FORM NHAP LIEU DEU PHAI DUNG SCRIPT NAY. -->

<script type="text/javascript" >
	document.form_main.txt_ccode.focus();

function js_VerifyBeforeSubmit (obj_form, btn_name) 
	{
		if (document.form_main.txt_user_name.value=='')
			{
				document.form_main.txt_user_name.focus();
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
* Tokaban Corp 2009
* Package : TKB PHP SYSTEM CODE
*--------------------------------------------------------------------------------------
* huanlv77 - 2009/06/28.
*--------------------------------------------------------------------------------------
* Ham submit form co su dung su kien hidden de truyen bien flag dieu khien.
* Nhiem vu gan gia tri cho bien hidden dieu khien nut nhan submit cua form.
* Dung de controller nhan biet nut submit nao duoc nhan tren giao dien de xu ly tren server script.
* Ham nay duoc dung chung cho toan bo ung dung.
* Nen xay dung thanh chuan de tai su dung cho nhung du an khac.
*--------------------------------------------------------------------------------------*/		
</script>