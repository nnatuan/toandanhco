<?php 
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   ?>
<script src="<?php echo base_url(); ?>js/jquery-ui.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui.css">
<script type="text/javascript">
   $(document).ready(function(){ 	
   	$( ".datepicker" ).datepicker({changeMonth: true,changeYear: true,dateFormat: 'dd/mm/yy',yearRange: '1900:2027'});
   	});
</script>
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
<div class="div-dk" style="background:#eee;padding:50px;">	
	<div class="box-dk" style="width:900px;margin:0 auto;position: relative;">
		<h4>Tạo tài khoản Phu Bao Group</h4>
		<h5 class="h5-dk" style="position:absolute;right:0;top:0;">Bạn đã là thành viên? <a href="<?php echo base_url(); ?>dang-nhap">Đăng nhập</a> tại đây</h5>
		<div id="register_box" style="background:#fff;padding:50px;margin-top: 20px;min-height: 300px;">
			<div class="row">
				<div class="col-md-7">
					<div class="row">
						<div class="col-md-7">
							<label>Email*</label>
							<input id="cemail" type="email" class="form-control" autocomplete="off" />
						</div>
						<div class="col-md-5">
							<label>Số điện thoại*</label>
							<input id="cid" type="text" class="form-control" autocomplete="off" />
						</div>
					</div>
					<div class="h10"></div>	
					<label>Mật khẩu*</label>
					<input id="cpassword" type="password" class="form-control" placeholder="Tối thiểu 6 ký tự bao gồm cả chữ và số" autocomplete="off" />
					<div class="h20"></div>	
					<div class="row">
						<div class="col-md-7">
							<label>Ngày sinh</label>
							<input id="cbirthday" type="text" class="form-control datepicker" />
						</div>
						<div class="col-md-5">
							<label>Giới tính</label>
							<select id="cgender" class="form-control">
								<option value="Nam">Nam</option>
								<option value="Nữ">Nữ</option>
							</select>
						</div>
					</div>
				</div>	
				<div class="col-md-5">
					<label>Họ tên*</label>
					<input id="cname" type="text" class="form-control" />
					<button style="width: 100%;background: #17375e;color: #fff;border: 0;padding: 10px 0;margin-top: 34px;margin-bottom: 20px;" onclick="dang_ky();">ĐĂNG KÝ</button>
					<p>Bằng cách ấn vào nút "ĐĂNG KÝ", tôi đồng ý với <a href="#">Điều Khoản Sử Dụng</a> và <a href="<?php echo base_url(); ?>chinh-sach-bao-mat">Chính Sách Bảo Mật của Phu Bao Group</a></p>
				</div>			
			</div>	
		</div>
	</div>
	<div class="h30"></div>	
</div>
<script>
	function dang_ky(){
		var _cname = $('#cname').val();
		var _cid = $('#cid').val();
		var _cemail = $('#cemail').val();
		var _cpassword = $('#cpassword').val();
		var _cbirthday = $('#cbirthday').val();
		var _cgender = $('#cgender').val();
		if(_cname != "" && _cemail != "" && _cid != "" && _cpassword != "") {
                $.ajax({
                    url : "<?php echo base_url(); ?>ajax_actions/dang_ky",
                    type : "post",
                    dataType:"text",
                    data : {
						cname: _cname,
                        cid: _cid,
						cemail: _cemail,
						cpassword: _cpassword,
						cbirthday: _cbirthday,
						cgender: _cgender
                    },
					beforeSend: function(){
						$('.ajax-loader').css("visibility", "visible");
					},
                    success : function (result){
						if(result=='0')
							alert("Đã tồn tại Số điện thoại hoặc Email!");
						else
							$('#register_box').html('<p style="color:#4CAF50;font-weight:bold;text-align:center;margin-top: 30px;font-size: 18px;">Chúc mừng bạn đã đăng ký tài khoản thành công!</p>');
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