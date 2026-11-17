		<div class="app-title">
            <div>
               <h1><i class="ico-cube-1"></i>Quản lý Nhóm sản phẩm</h1>
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="#"><i class="ico-home-1"></i></a></li>
               <li class="breadcrumb-item">Nhóm sản phẩm</li>
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
                     <th><?php echo $lbl_ccat_product;?>	</th>
					 <th><?php echo $lbl_ccode;?>	</th>
					 <th><?php echo $lbl_index;?>	</th>
					 <th><?php echo $lbl_nstatus;?>	</th>
                     <th class="text-center">Actions</th>
                  </tr>
               </thead>
               <tbody>
					<?php $i=1; $list = get_cat_product_all();
						foreach($list as $data){
					?>
                  <tr>
                     <td><?php echo $i; ?></span></td>
                     <td><a href="<?php echo base_url() . 'index.php/do_cat_product/f_edit/' . $data['nid']; ?>"><?php echo Fview_text($data['ccat_products']); ?></a></td>   
					 <td><?php echo Fview_text($data['ccode']); ?></td>		
					<td><?php echo Fview_text($data['cindex']); ?></td>	
					 <td><?php  if(Fview_text($data['nstatus'])==1)
						{
							echo '<a href="'.base_url().'index.php/do_cat_product_listview/f_active/'.$data['nid'].'/'.$data['nstatus'].'"><img src="'.base_url() .'images/publish.png"></a>';
						
						}
						else 
												echo '<a href="'.base_url().'index.php/do_cat_product_listview/f_active/'.$data['nid'].'/'.$data['nstatus'].'"><img src="'.base_url() .'images/unpublish.png"></a>';

						  ?></td>
                     <td class="text-center">
                        <ul class="icons-list">
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
                              <ul class="dropdown-menu dropdown-menu-right">
                                 <li><a href="<?php echo base_url() . 'index.php/do_cat_product/f_edit/' . $data['nid']; ?>" class="dropdown-item"><i class="ico-edit"></i> Edit</a></li>
								 <li><a href="<?php echo base_url() . 'index.php/do_cat_product_listview/set_id_cat/' . $data['nid']; ?>" class="dropdown-item"><i class="ico-menu"></i> Sub menu</a></li>
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