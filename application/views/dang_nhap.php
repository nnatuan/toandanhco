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
		<h4>Chào mừng đến với Phu Bao Group!</h4>
		<h5 class="h5-dn" style="position:absolute;right:0;top:0;">Thành viên mới? <a href="<?php echo base_url(); ?>dang-ky">Đăng ký</a> tại đây</h5>
		<div id="register_box" style="background:#fff;padding:50px;margin-top: 20px;min-height: 300px;">
			<div class="row">
				<div class="col-md-7">
					<label>Số điện thoại hoặc email*</label>
					<input id="cid" type="text" class="form-control" placeholder="Vui lòng nhập số điện thoại hoặc email của bạn" autocomplete="off" />
					<div class="h30"></div>	
					<label>Mật khẩu*</label>
					<input id="cpassword" type="password" class="form-control" placeholder="Tối thiểu 6 ký tự bao gồm cả chữ và số" autocomplete="off" />
					<div class="h10"></div>	
					<div class="text-right"><a href="<?php echo base_url(); ?>khoi-phuc-mat-khau">Quên mật khẩu?</a></div>	
				</div>	
				<div class="col-md-5">
					<button id="btn-login" style="width: 100%;background: #17375e;color: #fff;border: 0;padding: 10px 0;margin-top: 20px;" onclick="dang_nhap();">ĐĂNG NHẬP</button>
					<p style="margin: 10px 0;">Hoặc, đăng nhập bằng</p>
					<button style="width: 100%;background: #4267b2;color: #fff;border: 0;padding: 10px 0;margin-bottom: 10px;" onclick="location.href='<?php echo base_url(); ?>login-with-facebook'"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</button>
					<button style="width: 100%;background: #ea4335;color: #fff;border: 0;padding: 10px 0;" onclick="location.href='<?php echo base_url(); ?>login-with-google'"><i class="fa fa-google-plus" aria-hidden="true"></i> Google</button>
				</div>			
			</div>	
		</div>
	</div>
	<div class="h30"></div>	
</div>
<script>
	function dang_nhap(){
		var _cid = $('#cid').val();
		var _cpassword = $('#cpassword').val();
		if(_cid != "" && _cpassword != "") {
                $.ajax({
                    url : "<?php echo base_url(); ?>ajax_actions/dang_nhap",
                    type : "post",
                    dataType:"text",
                    data : {
                        cid: _cid,
						cpassword: _cpassword
                    },
					beforeSend: function(){
						$('.ajax-loader').css("visibility", "visible");
					},
                    success : function (result){
						if(result=='0')
							alert("Sai ID hoặc Password!");
						else if(result=='1')
							location.href = "<?php echo base_url(); ?>";
						else
							location.href = "<?php echo base_url(); ?>thanh-toan";
                    },
					complete: function(){
						$('.ajax-loader').css("visibility", "hidden");
					}
                });
        } else 
			alert("Vui lòng nhập đầy đủ thông tin các mục *");
	}
</script> 		
<?php $this->load->view('modules/mod_footer');?>
<?php $this->load->view('footer');?>