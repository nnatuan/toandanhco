		<div class="app-title">
            <div>
               <h1><i class="ico-low-price"></i>Quản lý Phí giao hàng</h1>
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="#"><i class="ico-home-1"></i></a></li>
               <li class="breadcrumb-item">Phí giao hàng</li>
            </ul>
         </div>
		<form name="frm_employee" method="post" action="<?php echo $link_page; ?>"> 
		<div class="card card-flat table-responsive">
            <table class="table datatable table-striped">
               <thead>
                  <tr>
                     <th style="width:100px;">#</th>
                     <th>Tỉnh/Thành phố</th>
					 <th>Phí giao hàng</th>
					 <th>Status</th>
                     <th class="text-center">Actions</th>
                  </tr>
               </thead>
               <tbody>
					<?php $i=1; $list = get_phi_giao_hang_all(); 
						foreach ($list as $data) {
					?>
                  <tr>
                     <td><?php echo $i; ?></span></td>
                     <td><?php echo Fview_text($data['cname']); ?></td>   
					 <td><?php echo Fview_text($data['ccost']); ?></td>					 
					 <td><?php 
								$link = $link_page.'f_active/'.$data['nid'].'/'.$data['nstatus'];
								echo show_img_pulish_active($link,$data['nstatus']); 
								?></td>
                     <td class="text-center">
                        <ul class="icons-list">
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
                              <ul class="dropdown-menu dropdown-menu-right">
                                 <li><a href="<?php echo base_url() . 'index.php/do_city/f_edit/' . $data['nid']; ?>" class="dropdown-item"><i class="ico-edit"></i> Edit</a></li>
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