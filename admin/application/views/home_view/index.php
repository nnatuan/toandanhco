<?php 
	$this->load->view('header');
	$this->load->view('header_end');
	$this->load->view('modules/mod_header'); 
	//$this->load->view('modules/mod_left'); 
?>

        <div class="app-title">
            <div>
               <h1><i class="ico-line-chart-1"></i>Danh sách đơn hàng mới nhận</h1>
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>index.php/do_home"><i class="ico-home-1"></i></a></li>
            </ul>
         </div>
		<div class="card card-flat table-responsive">
            <table class="table datatable table-striped">
               <thead>
                  <tr>
                     <th style="width:50px">#</th>
                     <th>Mã đơn hàng</th>
                     <th>Khách hàng</th>
					 <th>Email</th>
					 <th>Điện thoại</th>
					 <th>Địa chỉ</th>
					 <th class="text-center">Actions</th>
                  </tr>
               </thead>
               <tbody>
					<?php 
						$i=1; $list = lay_dh_moi_nhan(); 
						foreach ($list as $data) {
							//$kh = get_customer_by_id($data['nid_customer']);
					?>
                  <tr>
                     <td><?php echo $i; ?></td>
                     <td><a href="<?php echo base_url() . 'index.php/do_order/f_edit/' . $data['nid']; ?>"><?php echo $data['ccode']; ?></a></td>
                     <td><?php echo $data['cfullname']; ?></td>
                     <td><?php echo $data['cemail']; ?></td>
					 <td><?php echo $data['nphone']; ?></td>
					 <td><?php echo $data['caddress']; ?></td>
					 <td class="text-center">
                        <ul class="icons-list">
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
                              <ul class="dropdown-menu dropdown-menu-right">
                                 <li><a href="<?php echo base_url() . 'index.php/do_order/f_edit/' . $data['nid']; ?>" class="dropdown-item"><i class="ico-edit"></i> Edit</a></li>
                              </ul>
                           </li>
                        </ul>
                     </td>
                  </tr>
					<?php $i++;} ?>
			   </tbody>
            </table>
         </div>
         
<?php
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>