<?php 
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   ?>
<style>
.ajax-loader {
  visibility: hidden;
  background-color: rgba(0,0,0,0.5);
  position: fixed;
  z-index: +100 !important;
  width: 100%;
  height:100%;
  top: 0;
  left: 0;
  text-align: center;
}
.ajax-loader .fa-spin {
	font-size:40px !important;
	position: absolute;
	top: 50%;
	color: #fff;
}
</style>
<div class="ajax-loader">
	<i class="fa fa-spinner fa-spin fa-3x"></i>
</div>
<div class="div-dn" style="background:#eee;padding:50px;">	
	<div class="box-dn" style="width:900px;margin:0 auto;position: relative;">
		<h4>Khôi phục lại mật khẩu tài khoản Phu Bao Group!</h4>
		<h5 class="h5-dn" style="position:absolute;right:0;top:0;">Thành viên mới? <a href="<?php echo base_url(); ?>dang-ky">Đăng ký</a> tại đây</h5>
		<div id="register_box" style="background:#fff;padding:50px;margin-top: 20px;min-height: 200px;">
			<p style="color:red;margin-bottom:10px;">Vui lòng nhập email mà bạn đã đăng ký, <strong>Phu Bao Group</strong> sẽ cung cấp lại mật khẩu mới cho bạn qua địa chỉ email này.</p>
			<div class="row">
				<div class="col-md-7">
					<input id="cemail" type="text" class="form-control" placeholder="Email của bạn" autocomplete="off" />
				</div>	
				<div class="col-md-5">
					<button id="btn-login" style="width: 100%;background: #17375e;color: #fff;border: 0;padding: 10px 0;" onclick="khoi_phuc_mk();">GỬI YÊU CẦU</button>
				</div>			
			</div>	
		</div>
	</div>
	<div class="h30"></div>	
</div>
<script>
	function khoi_phuc_mk(){
		var _cemail = $('#cemail').val();
		if(_cemail != "") {
                $.ajax({
                    url : "<?php echo base_url(); ?>ajax_actions/khoi_phuc_mk",
                    type : "post",
                    dataType:"text",
                    data : {
                        cemail: _cemail
                    },
					beforeSend: function(){
						$('.ajax-loader').css("visibility", "visible");
					},
                    success : function (result){
						if(result=='0')
							alert("Email không tồn tại!");
						else
							$('#register_box').html('<p style="color:#4CAF50;font-weight:bold;text-align:center;margin-top: 30px;font-size: 18px;">Mật khẩu mới đã được gửi đến Email của quý khách!</p>');
                    },
					complete: function(){
						$('.ajax-loader').css("visibility", "hidden");
					}
                });
        } else 
			alert("Vui lòng nhập email của bạn!");
	}
</script> 		
<?php $this->load->view('modules/mod_footer');?>
<?php $this->load->view('footer');?>