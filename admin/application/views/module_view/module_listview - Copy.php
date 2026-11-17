<!-- Chi thiet ke view trong phan nay, cac phan khac khong can thay doi;-->
<!-- Begin of main form list view (khi copy phai dat dung ten)-->
<form name="frm_main" method="post" action="<?php echo $link_page; ?>" >
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
                                <h6 class="card-subtitle">Liệt kê danh sách module</h6>
								<!-- Begin of header function listview style-->
								<div class="mgb15">
									<table width="100%" cellspacing="1" border="0" class="tbl_header_list">
										<tr>						
											<td style="text-align:left">			
												
												<!--			
												<input name="btn_header_add" type="button" value="<?php echo $btn_add; ?>" 
													onclick="js_SetSubmitButtonClick(this.form,'btn_add');" class="button btn btn-info"/>-->
												<!--<input name="btn_header_export" type="button" class="button btn btn-info"
													value="<?php //echo $btn_export; ?>" 
													onclick="js_SetSubmitButtonClick(this.form,'btn_export');"/>	
												<input name="btn_header_print" type="button" class="button btn btn-info"
													value="<?php //echo $btn_print; ?> " 
												onclick="window.open('<?php// echo $link_page . 'f_print'; ?>','_blank')"/>	-->	
												<!--<input <?php //if($chkf_ctag == 1) echo 'checked = "checked"' ?> type="checkbox" value="1" name="chkf_ctag" /><label><?php //echo $lbl_not_tag ?></label>	-->	
											</td>
											<td style="text-align:center">&nbsp;</td>
											<td style="text-align:right">							
												<?php if($txt_current_page > 1): ?>
													<input name="btn_header_previous" type="button" 
													 value="<<" onclick="js_SetSubmitButtonClick(this.form,'btn_previous');" class="button btn btn-info"/>				
												<?php endif; ?>
												
												<label><?php echo $txt_current_page . ' / ' . $txt_total_page; ?></label>
												
												<?php if($txt_current_page < $txt_total_page): ?>
													<input name="btn_header_next" type="button" 
														value=">>" onclick="js_SetSubmitButtonClick(this.form,'btn_next');" class="button btn btn-info"/>
												<?php endif; ?>
														
												<input name="txt_header_current_page" type="text" value="<?php echo $txt_current_page ; ?>"
													   style="text-align:center" size="5" class="form-control w80" />
													   
												<input name="btn_header_page_number" type="button" value="<?php echo $btn_choose; ?>" onclick="js_SetSubmitButtonClick(this.form,this.name);"  class="button btn btn-info"/>
											</td>
										</tr>					
									</table>
								</div> 
								<!-- End of header function listview style -->
								
								<!-- Begin table of content listview -->			
								<div style="clear:both">	
									<table class="table  table-bordered table-hover table-striped" width="100%" cellspacing="1">
										<thead>
											<tr>
												<th style="width:60px">
													<span style="float:left; width:20px">&nbsp;#</span>
													<span style="float:right; width:25px;">
															<input name="chkItems" type="checkbox" class="checkbox" 
																   onclick="js_CheckAllClick(this,this.name);" />
													</span>
													
												</th>					
												<?php $link_page = base_url() . 'index.php/do_module_listview'; ?>
												<th style="width:80px">
													<a href="<?php echo $link_page; ?>/f_sort/ccode/<?php echo $orderby_sort; ?>" >							
													<?php echo $lbl_code ?>		
													<?php
															if (trim($orderby_field) == 'ccode')
																echo $sort_img;
														?>
													</a>					
												</th>

												<th style="width:150px">
													<a href="<?php echo $link_page; ?>/f_sort/cmodule/<?php echo $orderby_sort; ?>" >							
													<?php echo $lbl_module ?>		
													<?php
															if (trim($orderby_field) == 'cmodule')
																echo $sort_img;
														?>
											</a>					</th>
													
											<!--	<th style="width:100px;">
													<a href="#" >							
													<?php // echo $lbl_lang ?>						</a>					</th>
							-->
												<th style="width:50px">
													<a href="<?php echo $link_page; ?>/f_sort/cindex/<?php echo $orderby_sort; ?>" >							
													<?php echo $lbl_index ?>		
													<?php
															if (trim($orderby_field) == 'cindex')
																echo $sort_img;
														?>
											</a>					</th>
												<th style="width:50px">
													<a href="<?php echo $link_page; ?>/f_sort/nstatus/<?php echo $orderby_sort; ?>" >							
													<?php echo $lbl_status ?>		
													<?php
															if (trim($orderby_field) == 'nstatus')
																echo $sort_img;
														?>
											</a>					</th>			
												<th style="width:80px"> 
													<a href="<?php echo $link_page; ?>/f_sort/ddate01/<?php echo $orderby_sort; ?>" >							
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
													<input name="txtf_ccode" type="text"
														   value="<?php echo $txtf_ccode; ?>" class="form-control" />					</td>					
												<td style="text-align:center"> 
													<input name="txtf_cmodule" type="text" 
														   value="<?php echo $txtf_cmodule; ?>" class="form-control" />					</td>
												<!--<td style="text-align:center"> 
														<?php // echo $gencbo_language_list; ?>					</td>-->

												<td style="text-align:center"> 
													<input name="txtf_cindex" type="text"
														   value="<?php echo $txtf_cindex; ?>" class="form-control" />					</td>
												<td style="text-align:center">
													<?php echo $gen_cbo_status; ?>					</td>
												<td style="text-align:center">
												  <input name="txtf_ddate01" id="d_from" type="text" 
														   value="<?php echo $txtf_ddate01; ?>" class="form-control" />					</td>
											</tr>  			

												<?php
													$row_count = 1;
													foreach($data_view as $data):
												?>								
												<tr class="row<?php echo $row_count%2; ?>">
													
													<td style="text-align:center"> 
														<span style="float:left; width:20px">
															<?php echo $txt_row_per_page * ($txt_current_page -1) + $row_count; ?>							</span>
														<span style="float:right; width:25px; padding-top:4px">	
														<input name="chk[]" type="checkbox" value="<?php echo $data['nid']; ?>"
															id="chkItems" class="checkbox" 								   
															onclick="js_CheckItemClick(this, 'chkItems','chkItems');" />
														</span>						
													</td>
													<td style="text-align:center"><?php echo Fview_text($data['ccode']); ?></td>						
													<td><a  href="<?php echo base_url() . 'index.php/do_module/f_edit/' . $data['nid']; ?>"  ><?php echo Fview_text($data['cmodule']); ?></a></td>				
													<!--<td style="text-align:center"><?php //echo Fview_text($data['clanguage']); ?></td>		-->							
													<td style="text-align:center"><?php echo Fview_text($data['cindex']); ?></td>						
													<td style="text-align:center"><a href="<?php echo base_url().'index.php/do_module_listview/f_active/'.$data['nid'] ?>"><?php  echo show_img_pulish($data['nstatus']); ?></a></td>											
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
												<!--<input name="btn_delete" type="button" value="<?php //echo $btn_delete; ?>"  
													   onclick="js_CheckValidBeforeDeleteListview(this.form,'chkItems',
															'<?php //echo $msg_confirm_before_delete; ?>' ,
															'<?php //echo $msg_invalid_before_delete;  ?>' )"  class="button btn btn-info"/>
															
												<input name="btn_add" type="button" value="<?php //echo $btn_add; ?>" 
													onclick="js_SetSubmitButtonClick(this.form,'btn_add');"  class="button btn btn-info"/>-->
												<!--<input name="btn_export" type="button" class="button btn btn-info"
													value="<?php //echo $btn_export; ?>" 
													onclick="js_SetSubmitButtonClick(this.form,'btn_export');"/>
												<input name="btn_print_page" type="button" class="button btn btn-info"
													value="<?php //echo $btn_print; ?> " 
													onclick="window.open('<?php //echo $link_page . 'f_print'; ?>','_blank')"/>	-->			
											</td>
											
											<td style="text-align:center">						
													<label style="padding-left:5px;"><?php echo $lbl_rows_per_page; ?></label>
													
													<input name="txt_row_per_page" type="text" size="5" value="<?php echo $txt_row_per_page; ?>"
														style="text-align:center" class="form-control w80" />
													
													<input name="btn_row_per_page" type="button" value="<?php echo $btn_choose; ?>" onclick="js_SetSubmitButtonClick(this.form,this.name);" class="button btn btn-info"/>									
											</td>
											
											<td style="text-align:right">							
													<?php if($txt_current_page > 1): ?>
													<input name="btn_previous" type="button" value="<<" 
														onclick="js_SetSubmitButtonClick(this.form,'btn_previous');" class="button btn btn-info"/>				
													<?php endif; ?>
													
													<label><?php echo $txt_current_page . ' / ' . $txt_total_page; ?></label>
													
													<?php if($txt_current_page < $txt_total_page): ?>
													<input name="btn_next" type="button" value=">>" 
														onclick="js_SetSubmitButtonClick(this.form,'btn_next');" class="button btn btn-info"/>
													<?php endif ?>
															
													<input name="txt_current_page" type="text" value="<?php echo $txt_current_page ; ?>"
														style="text-align:center" size="5" class="form-control w80" />
														   
													<input name="btn_page_number" type="button" value="<?php echo $btn_choose; ?>" onclick="js_SetSubmitButtonClick(this.form,this.name);"  class="button btn btn-info" />
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
