		<div class="app-title">
            <div>
               <h1><i class="ico-menu"></i>Sub menu : <span class="text-danger"><?php $product = get_cat_product_by_id($nid_cat_product); echo $product['ccat_products']; ?></span></h1>
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="#"><i class="ico-home-1"></i></a></li>
               <li class="breadcrumb-item">Sub menu</li>
            </ul>
         </div>
		<form name="frm_employee" method="post" action="<?php echo $link_page; ?>"> 
		<div class="card card-flat table-responsive">
			<div class="card-header">
				<button class="btn mui-btn mui-btn--accent" style="margin-bottom:20px;" onclick="js_SetSubmitButtonClick(this.form,'btn_add');">Thêm mới</button>
				<button type="button" class="btn mui-btn mui-btn--accent" style="margin-bottom:20px;" onclick="location.href='<?php echo base_url().'index.php/do_cat_product_listview'?>'">Quay về</button>
				<input type="hidden" name="hidden_button"  id="hidden_button"/>		
			</div>
            <table class="table datatable table-striped">
               <thead>
                  <tr>
                     <th style="width:100px;">#</th>
                     <th>Tên</th>
					 <th>Chỉ mục</th>
					 <th>Trạng thái</th>

                  </tr>
               </thead>
               <tbody>
					<?php $i=1; $list = get_sub_menu_by_cat($nid_cat_product);
						foreach($list as $data){
					?>
                  <tr>
                     <td><?php echo $i; ?></span></td>
                     <td><a href="<?php echo base_url() . 'index.php/do_sub_menu/f_edit/' . $data['nid']; ?>"><?php echo Fview_text($data['cname']); ?></a></td>   
					 <td><?php echo Fview_text($data['cindex']); ?></td>					 
					 <td><a href="<?php echo base_url().'index.php/do_sub_menu_listview/f_active/'.$data['nid'].'/'.$data['nstatus'] ?>"><?php  echo show_img_pulish($data['nstatus']); ?></a></td>

                  </tr>
					<?php $i++;} ?>
			   </tbody>
            </table>
         </div>
         </form>