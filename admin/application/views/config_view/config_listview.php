		<div class="app-title">
            <div>
               <h1><i class="ico-settings-1"></i>Quản lý cấu hình</h1>
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="#"><i class="ico-home-1"></i></a></li>
               <li class="breadcrumb-item">Cấu hình</li>
            </ul>
         </div>
		<form name="frm_employee" method="post" action="<?php echo $link_page; ?>"> 
		<div class="card card-flat table-responsive">
            <table class="table datatable table-striped">
               <thead>
                  <tr>
                     <th style="width:100px;">#</th>
                     <th><?php echo $lbl_cname;?>	</th>
					 <th><?php echo $lbl_cvalue;?></th>
					 <th><?php echo $lbl_cnote;?>	</th>
					 <th><?php echo $lbl_date01 ?>	</th>
                     <th class="text-center">Actions</th>
                  </tr>
               </thead>
               <tbody>
					<?php $i=1;
						foreach($data_view as $data){
					?>
                  <tr>
                     <td><?php echo $i; ?></span></td>
                     <td><a href="<?php echo base_url() . 'index.php/do_config/f_edit/' . $data['nid']; ?>"><?php echo Fview_text($data['cname']); ?></a></td>   
					<td><?php echo Fview_text($data['cvalue']); ?></td>					 
                     <td><?php if(strlen($data['cnote'])>35) echo Fview_text(substr($data['cnote'],0,35)).'...';else  echo Fview_text($data['cnote']); ?></td>
					 <td><?php echo Fview_date($data['ddate01']); ?></td>
                     <td class="text-center">
                        <ul class="icons-list">
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
                              <ul class="dropdown-menu dropdown-menu-right">
                                 <li><a href="<?php echo base_url() . 'index.php/do_config/f_edit/' . $data['nid']; ?>" class="dropdown-item"><i class="ico-edit"></i> Edit</a></li>
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