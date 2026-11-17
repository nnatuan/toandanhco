		<div class="app-title">
            <div>
               <h1><i class="ico-newspaper"></i>Quản lý Tin tức</h1>
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="#"><i class="ico-home-1"></i></a></li>
               <li class="breadcrumb-item">Tin tức</li>
            </ul>
         </div>
		<form name="frm_employee" method="post" action="<?php echo $link_page; ?>"> 
		<div class="card card-flat table-responsive">
			<div class="card-header">
				<button class="btn mui-btn mui-btn--accent" style="margin-bottom:20px;" onclick="js_SetSubmitButtonClick(this.form,'btn_add');">Thêm mới</button>
				<button class="btn mui-btn mui-btn--accent" style="margin-bottom:20px;" name="btn_delete" type="button" value="<?php echo $btn_delete; ?>"  
						   onclick="js_CheckValidBeforeDeleteListview(this.form,'chkItems',
								'<?php echo $msg_confirm_before_delete; ?>' ,
								'<?php echo $msg_invalid_before_delete;  ?>' )" />Xóa các mục đã chọn</button>
				<input type="hidden" name="hidden_button"  id="hidden_button"/>		
			</div>
            <table class="table datatable table-striped">
               <thead>
                  <tr>
                     <th style="width:100px;">#</th>
                     <th>Tiêu đề</th>
					 <th>Danh mục</th>
					 <th>Chỉ mục</th>
					 <th>Status</th>
                     <th class="text-center">Actions</th>
                  </tr>
               </thead>
               <tbody>
					<?php $i=1; $list = get_news_all();
						foreach($list as $data){
							
					?>
                  <tr>
                     <td><span style="float:left; width:20px">
								<?php echo $i; ?>							</span>
							<span style="float:left; width:25px">	
							<input name="chk[]" type="checkbox" value="<?php echo $data['nid']; ?>"
								id="chkItems" class="checkbox" 								   
								onclick="js_CheckItemClick(this, 'chkItems','chkItems');" />
							</span>		</td>
                     <td><a href="<?php echo base_url() . 'index.php/do_news/f_edit/' . $data['nid']; ?>"><?php echo Fview_text($data['ctitle']); ?></a></td>   
					 <td><?php echo Fview_text($data['ccat_news']); ?></td>
					 <td><?php echo Fview_text($data['cindex']); ?></td>					 
					 <td><?php if($data['nstatus'] =='1') {?>
							<a href="<?php echo base_url().'index.php/do_news_listview/f_unactive/'.$data['nid'] ?>">
						<?php }else{?>
							<a href="<?php echo base_url().'index.php/do_news_listview/f_active/'.$data['nid'] ?>">
						
						<?php } echo show_img_pulish($data['nstatus']); ?></td>
                     <td class="text-center">
                        <ul class="icons-list">
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
                              <ul class="dropdown-menu dropdown-menu-right">
                                 <li><a href="<?php echo base_url() . 'index.php/do_news/f_edit/' . $data['nid']; ?>" class="dropdown-item"><i class="ico-edit"></i> Edit</a></li>
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