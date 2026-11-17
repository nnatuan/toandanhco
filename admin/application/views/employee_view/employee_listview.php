		<div class="app-title">
            <div>
               <h1><i class="ico-user"></i>Quản lý người dùng</h1>
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/do_home"><i class="ico-home-1"></i></a></li>
               <li class="breadcrumb-item">Người dùng</li>
            </ul>
         </div>
		<form name="frm_employee" method="post" action="<?php echo $link_page; ?>">
		<div class="card card-flat table-responsive">
			<div class="card-header">
				<button class="btn mui-btn mui-btn--accent" style="margin-bottom:20px;" onclick="js_SetSubmitButtonClick(this.form,'btn_add');">Add more</button>
				<button class="btn mui-btn mui-btn--accent" style="margin-bottom:20px;" name="btn_delete" type="button" value="<?php echo $btn_delete; ?>"  
						   onclick="js_CheckValidBeforeDeleteListview(this.form,'chkItems',
								'<?php echo $msg_confirm_before_delete; ?>' ,
								'<?php echo $msg_invalid_before_delete;  ?>' )" />Delete Selected Items</button>
				<input type="hidden" name="hidden_button"  id="hidden_button"/>		
			</div>
            <table class="table datatable table-striped">
               <thead>
                  <tr>
                     <th>#</th>
                     <th><?php echo $lbl_cuserid; ?></th>
					 <th><?php echo $lbl_cemail; ?></th>
					 <th><?php echo $lbl_cisadmin; ?></th>
					 <th><?php echo $lbl_cnote; ?></th>
					 <th><?php echo $lbl_ddate01; ?></th>
					 <th><?php echo $lbl_ddate02; ?></th>
					 <th></th>
                  </tr>
               </thead>
               <tbody>
					<?php $i=1; 
						foreach($data_view as $data) {
					?>
                  <tr>
					 <td><?php echo $i; ?></td>
                     <td><a href="<?php echo base_url() . 'index.php/do_employee/f_edit/' . $data['nid']; ?>"><?php echo $data['cuserid']; ?></a></td>
                     <td><?php echo $data['cemail']; ?></td>
                     <td><?php echo $data['cisadmin_name']; ?></td>
					 <td><?php echo $data['cnote']; ?></td>
					 <td><?php echo Fview_date($data['ddate01']); ?></td>
					 <td><?php echo Fview_date($data['ddate02']); ?></td>
                     <td class="text-center">
						<ul class="icons-list">
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
                              <ul class="dropdown-menu dropdown-menu-right">
                                 <li><a href="<?php echo base_url() . 'index.php/do_employee/f_edit/' . $data['nid']; ?>" class="dropdown-item"><i class="ico-edit"></i> Edit</a></li>
                              </ul>
                           </li>
                        </ul>
                     </td>
                  </tr>
					<?php $i++;} ?>
			   </tbody>
            </table>
         </div>
         </form>