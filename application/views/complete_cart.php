<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   ?>  
<div id="page">
            <div class="main" style="padding:100px 0;">
               <div class="container text-center">


			


              <p style="color: #2600ff;margin-bottom:20px;"><strong>Cảm ơn quý khách đã tin tưởng và sử dụng khẩu trang Perfetta!</strong></p>
			  <p>Perfetta rất vui thông báo đơn hàng của quý khách đã được tiếp nhận và đang trong quá trình xử lý.</p>
			  <p style="margin-bottom:20px;">Đơn hàng sẽ được giao đến cho Quý Khách trong vòng 3-5 ngày (trừ ngày thứ bảy và chủ nhật). Perfetta sẽ thông báo đến Quý Khách ngay khi hàng chuẩn bị được giao.</p>
				<a href="<?php echo base_url();?>">Quay về trang chủ</a>
			

                 
               </div>
            </div>
         </div>
<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>