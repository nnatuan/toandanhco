		<div class="app-title">
            <div>
               <h1><i class="ico-cube-1"></i>Quản lý Sản phẩm</h1>
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="#"><i class="ico-home-1"></i></a></li>
               <li class="breadcrumb-item">Sản phẩm</li>
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
                     <th style="width:50px;">#</th>
                     <th style="width:300px;"><?php echo $lbl_cproducts;?></th>
					 <th style="width:200px;"><?php echo $lbl_nid_cat_product;?></th>
					 <th style="width:80px;">Home</th>
					 <th style="width:80px;">Hot</th>
					 <th style="width:80px;">Status</th>
                     <th class="text-center" style="width:50px;">Actions</th>
                  </tr>
               </thead>
               <tbody>
					<?php $i=1; $list = get_product_all();
						foreach($list as $data){
							$cat = get_cat_product_by_id($data['nid_cat_products']);
					?>
                  <tr>
                     <td><?php echo $i; ?></span></td>
                     <td><a href="<?php echo base_url() . 'index.php/do_product/f_edit/' . $data['nid']; ?>"><?php echo Fview_text($data['cproducts']); ?></a></td>   	
					<td><?php echo Fview_text($cat['ccat_products']); ?></td>	
					 <td><?php 
							$link = $link_page.'f_check/'.$data['nid'].'/'.$data['ncheck'];
							echo show_img_pulish_active($link,$data['ncheck']); 
						?></td>
					<td><?php 
							$link = $link_page.'f_pb/'.$data['nid'].'/'.$data['npb'];
							echo show_img_pulish_active($link,$data['npb']); 
						?></td>
					<td><?php 
							$link = $link_page.'f_active/'.$data['nid'].'/'.$data['nstatus'];
							echo show_img_pulish_active($link,$data['nstatus']); 
						?></td>	
                     <td class="text-center">
                        <ul class="icons-list">
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
                              <ul class="dropdown-menu dropdown-menu-right">
                                 <li><a href="<?php echo base_url() . 'index.php/do_product/f_edit/' . $data['nid']; ?>" class="dropdown-item"><i class="ico-edit"></i> Chỉnh sửa</a></li>

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