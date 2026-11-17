		<div class="app-title">
            <div>
               <h1><i class="ico-puzzle"></i>Quản lý Module</h1>
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="#"><i class="ico-home-1"></i></a></li>
               <li class="breadcrumb-item">Module</li>
            </ul>
         </div>
		<form name="frm_employee" method="post" action="<?php echo $link_page; ?>"> 
		<div class="card card-flat table-responsive">
            <table class="table datatable table-striped">
               <thead>
                  <tr>
                     <th style="width:100px;">#</th>
                     <th><?php echo $lbl_module ?>	</th>
					 <th>Status</th>
					 <th><?php echo $lbl_date01 ?>	</th>
                     <th class="text-center">Actions</th>
                  </tr>
               </thead>
               <tbody>
					<?php $i=1; $list = get_module_all(); 
						foreach($list as $data){
					?>
                  <tr>
                     <td><?php echo $i; ?></span></td>
                     <td><a href="<?php echo base_url() . 'index.php/do_module/f_edit/' . $data['nid']; ?>"><?php echo Fview_text($data['cmodule']); ?></a></td>   
					 <td style="text-align:center"><a href="<?php echo base_url().'index.php/do_module_listview/f_active/'.$data['nid'] ?>"><?php  echo show_img_pulish($data['nstatus']); ?></a></td>				 
					 <td><?php echo Fview_date($data['ddate01']); ?></td>
                     <td class="text-center">
                        <ul class="icons-list">
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
                              <ul class="dropdown-menu dropdown-menu-right">
                                 <li><a href="<?php echo base_url() . 'index.php/do_module/f_edit/' . $data['nid']; ?>" class="dropdown-item"><i class="ico-edit"></i> Edit</a></li>
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