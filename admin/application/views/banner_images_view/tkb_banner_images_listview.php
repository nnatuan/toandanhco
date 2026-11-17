		<div class="app-title">
            <div>
               <h1><i class="ico-picture"></i>Quản lý Slider</h1>
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="#"><i class="ico-home-1"></i></a></li>
               <li class="breadcrumb-item">Slider</li>
            </ul>
         </div>
		<form name="frm_employee" method="post" action="<?php echo $link_page; ?>"> 
		<div class="card card-flat table-responsive">
			<div class="card-header">
				<button class="btn mui-btn mui-btn--accent" style="margin-bottom:20px;" onclick="js_SetSubmitButtonClick(this.form,'btn_add');">Thêm mới</button>
				<input type="hidden" name="hidden_button"  id="hidden_button"/>		
			</div>
            <table class="table datatable table-striped">
               <thead>
                  <tr>
                     <th style="width:100px;">#</th>
                     <th><?php echo $lbl_code ?>	</th>
					 <th><?php echo $lbl_banner_images ?>
					 <th><?php echo $lbl_index ?>	</th>
					 <th><?php echo $lbl_status ?>	</th>
					 <th><?php echo $lbl_date01 ?>	</th>
                     <th class="text-center">Actions</th>
                  </tr>
               </thead>
               <tbody>
					<?php $i=1; $list = get_banner_all();
						foreach($list as $data){
					?>
                  <tr>
                     <td><?php echo $i; ?></span></td>
                     <td><a href="<?php echo base_url() . 'index.php/do_banner_images/f_edit/' . $data['nid']; ?>"><?php echo Fview_text($data['cbanner_images']); ?></a></td>   
					 <td><?php echo Fview_text($data['ccode']); ?></td>					 
					 <td><?php echo Fview_text($data['cindex']); ?></td>	
					 <td><a href="<?php echo base_url().'index.php/do_banner_images_listview/f_active/'.$data['nid'] ?>"><?php  echo show_img_pulish($data['nstatus']); ?></td>
					<td><?php echo Fview_text($data['ddate01']); ?></td>	
                     <td class="text-center">
                        <ul class="icons-list">
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
                              <ul class="dropdown-menu dropdown-menu-right">
                                 <li><a href="<?php echo base_url() . 'index.php/do_banner_images/f_edit/' . $data['nid']; ?>" class="dropdown-item"><i class="ico-edit"></i> Edit</a></li>
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