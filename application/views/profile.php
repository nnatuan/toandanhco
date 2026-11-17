<?php 
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   ?>
<style>
   .header-navigation>ul {
   display: none;
   }
   #column-left:hover ul{
   display: block;		
   }
   #column-left {
   position: absolute;
   z-index: 999;
   width: 240px;
   }
   .full {
   margin-top: 30px;
   }
   #column-left .box-category-heading {
   cursor: pointer;
   }
   .container.content-top .row {
   position: relative;
   }
   .right-slideshow {
   position: absolute;
   right: 0;
   }
   .top1, .top2 .logo, .top2-right-top, .top2-right-bot, #column-left {
   animation: none;
   }
   .right-prof label {
	   display: inline-block;
	   float: left;
	   margin: 0;
	    line-height: 30px;
   }
   .right-prof .box-info {
	    padding: 15px 0;
		border-bottom: 1px solid #ddd;
		padding-left: 10px;
   }
   .right-prof .box-info:last-child {
	   border-bottom: 0;
   }
   .info-view .edit {
	   display: block;
	   float: right;
	   text-align: right;
	    line-height: 30px;
   }
   .info-edit {
	   display: none;
   }
   .mt10 {
	   margin-top: 10px;
   }
   .box-info .cancel-edit, .box-info .change-edit {
	    display: inline-block;
		padding: 4px 12px;
		background-color: #f06015;
		color: #fff;
		border-radius: 2px;
		font-weight: bold;
		text-transform: uppercase;
		border: 1px solid #f06015;
		transition-duration: 150ms;
   }
   .box-info .cancel-edit:hover, .box-info .change-edit:hover {
	   background-color: #da501f;
   }  
	#edit-gender label {
		float: none;
		margin: 0;
		padding: 0 10px 0 5px;
	}
	.fail-empty {
		position: relative;
		margin-left: 6px;
		padding: 6px;
		text-align: center;
		white-space: nowrap;
		color: #fff;
		background: #ff4d46;
		-webkit-border-radius: 4px;
		-moz-border-radius: 4px;
		border-radius: 4px;
		opacity: 0;
		-webkit-transform: translate3d(20px, 0, 0);
		-moz-transform: translate3d(20px, 0, 0);
		-o-transform: translate3d(20px, 0, 0);
		transform: translate3d(20px, 0, 0);
		-webkit-transition: all 400ms ease;
		-moz-transition: all 400ms ease;
		-o-transition: all 400ms ease;
		transition: all 400ms ease;
		font-size: 12px;
	}
	.fail-empty:before {
		position: absolute;
		right: 100%;
		top: 50%;
		margin-top: -6px;
		width: 0;
		height: 0;
		border-right: 6px solid #ff4d46;
		border-top: 6px solid transparent;
		border-bottom: 6px solid transparent;
		content: '';
	}   
</style>
<script>
	function edit_name() {
		$('#view-name').css('display', 'none');
		$('#edit-name').css('display', 'block');
	}
	function cancel_edit_name() {
		$('#view-name').css('display', 'block');
		$('#edit-name').css('display', 'none');
		var old_name = $('#old-name').html();
		$("input[name='cname']").val(old_name);
		$("#name-empty").attr('style', 'opacity:0 !important');
	}
	function change_name() {
		var _cname = $("input[name='cname']").val();
		if(_cname == ""){
		    $("#name-empty").attr('style', 'opacity:1 !important');
		} else {
			$.post("<?php echo base_url().'thao-tac/update-name-member'?>", {
				cname: _cname
			}).done(function(data) {
				$('#old-name').html(_cname);
				$('#view-name').css('display', 'block');
				$('#edit-name').css('display', 'none');
				$("#name-empty").attr('style', 'opacity:0 !important');
			});
		}
	}
	
	function edit_phone() {
		$('#view-phone').css('display', 'none');
		$('#edit-phone').css('display', 'block');	
	}
	function cancel_edit_phone() {
		$('#view-phone').css('display', 'block');
		$('#edit-phone').css('display', 'none');
		var old_phone = $('#old-phone').html();
		$("input[name='cphone']").val(old_phone);
		$("#phone-empty").attr('style', 'opacity:0 !important');
	}
	function change_phone() {
		var _cphone = $("input[name='cphone']").val();
		if(_cphone == ""){
		    $("#phone-empty").attr('style', 'opacity:1 !important');
		} else {
			$.post("<?php echo base_url().'thao-tac/update-phone-member'?>", {
				cphone: _cphone
			}).done(function(data) {
				$('#old-phone').html(_cphone);
				$('#view-phone').css('display', 'block');
				$('#edit-phone').css('display', 'none');
				$("#phone-empty").attr('style', 'opacity:0 !important');
			});
		}
	}
	
	function edit_address() {
		$('#view-address').css('display', 'none');
		$('#edit-address').css('display', 'block');
	}
	function cancel_edit_address() {
		$('#view-address').css('display', 'block');
		$('#edit-address').css('display', 'none');
		var old_address = $('#old-address').html();
		$("input[name='caddress']").val(old_address);
		$("#address-empty").attr('style', 'opacity:0 !important');
	}
	function change_address() {
		var _caddress = $("input[name='caddress']").val();
		if(_caddress == ""){
		    $("#address-empty").attr('style', 'opacity:1 !important');
		} else {
			$.post("<?php echo base_url().'thao-tac/update-address-member'?>", {
				caddress: _caddress
			}).done(function(data) {
				$('#old-address').html(_caddress);
				$('#view-address').css('display', 'block');
				$('#edit-address').css('display', 'none');
				$("#address-empty").attr('style', 'opacity:0 !important');
			});
		}
	}
	
	function edit_pass() {
		$('#view-pass').css('display', 'none');
		$('#edit-pass').css('display', 'block');
		$("input[name='cpass_old']").val("");
		$("input[name='cpass_new']").val("");
		$("input[name='cpass_re']").val("");
	}
	function cancel_edit_pass() {
		$('#view-pass').css('display', 'block');
		$('#edit-pass').css('display', 'none');
		$("#pass-old-empty").attr('style', 'opacity:0 !important');
		$("#pass-new-empty").attr('style', 'opacity:0 !important');
		$("#pass-re-empty").attr('style', 'opacity:0 !important');
	}
	function change_pass() {
		var _cpass_old = $("input[name='cpass_old']").val();
		var _cpass_new = $("input[name='cpass_new']").val();
		var _cpass_re = $("input[name='cpass_re']").val();
		//alert (_cpassold);
		if (_cpass_old == "") {
		    $("#pass-old-empty").attr('style', 'opacity:1 !important');
			$("#pass-new-empty").attr('style', 'opacity:0 !important');
			$("#pass-re-empty").attr('style', 'opacity:0 !important');
			$("#pass-old-empty").html("Không được để trống!");
			return;
		} 
		if (_cpass_new == "") {
			$("#pass-old-empty").attr('style', 'opacity:0 !important');
		    $("#pass-new-empty").attr('style', 'opacity:1 !important');
			$("#pass-re-empty").attr('style', 'opacity:0 !important');
			return;
		}
		if (_cpass_re == "") {
			$("#pass-old-empty").attr('style', 'opacity:0 !important');
			$("#pass-new-empty").attr('style', 'opacity:0 !important');
		    $("#pass-re-empty").attr('style', 'opacity:1 !important');
			$("#pass-re-empty").html("Không được để trống!");
			return;
		}
		if (_cpass_new != _cpass_re) {
			$("#pass-old-empty").attr('style', 'opacity:0 !important');
			$("#pass-new-empty").attr('style', 'opacity:0 !important');
			$("#pass-re-empty").attr('style', 'opacity:1 !important');
			$("#pass-re-empty").html("Mật khẩu nhập lại không khớp!");
			return;
		}
		
			$.post("<?php echo base_url().'thao-tac/update-pass-member'?>", {
				cpass_old: _cpass_old,
				cpass_new: _cpass_new
			}).done(function(data) {
				//$('#old-pass').html(_cpass);
				$("#pass-new-empty").attr('style', 'opacity:0 !important');
				$("#pass-re-empty").attr('style', 'opacity:0 !important');
				if(data == "1") {
					$('#view-pass').css('display', 'block');
					$('#edit-pass').css('display', 'none');
					$("#pass-old-empty").attr('style', 'opacity:0 !important');
				} else {
					$("#pass-old-empty").attr('style', 'opacity:1 !important');
					$("#pass-old-empty").html("Mật khẩu hiện tại không đúng!");
				}
			});
	}
	
	function edit_gender() {
		$('#view-gender').css('display', 'none');
		$('#edit-gender').css('display', 'block');
	}
	function cancel_edit_gender() {
		$('#view-gender').css('display', 'block');
		$('#edit-gender').css('display', 'none');
		var old_gender = $('#old-gender').text();
		if (old_gender.trim() == "Anh") {
			//$("#anh").checked = true;
			//$("#anh").attr('checked', 'checked');
			$("#anh").prop("checked", true);
		} else if (old_gender.trim() == "Chị") {
			$("#chi").prop("checked", true);
		} else if (old_gender.trim() == "Cô") {
			$("#co").prop("checked", true);
		} else {
			$("#chu").prop("checked", true);
		}
	}
	function change_gender() {
		var _cgender = $("input[name='cgender']:checked").val();
		$.post("<?php echo base_url().'thao-tac/update-gender-member'?>", {
			cgender: _cgender
		}).done(function(data) {
			$('#view-gender').css('display', 'block');
			$('#edit-gender').css('display', 'none');
			if (_cgender == "0") {
				$("#anh").prop("checked", true);
				$("#old-gender").html("Anh");
			} else if (data == "1") {
				$("#chi").prop("checked", true);
				$("#old-gender").html("Chị");
			} else if (data == "2") {
				//$("#co").checked = true;
				$("#co").prop("checked", true);
				$("#old-gender").html("Cô");
			} else {
				$("#chu").prop("checked", true);
				$("#old-gender").html("Chú");	
			}		
		});		
	}	
</script>
<div class="container content-top">
   <div class="row">
      <?php $this->load->view('modules/mod_menu_left'); ?>
   </div>
</div>
<div class="content full">
   <div id="columns" class="contentin container">
      <?php //$this->load->view('modules/mod_content_header');?>             
      <div class="product full">
         <div class="content-detail">
			<h2 class="h1-title">Tài khoản</h2>
            <div class="left-prof" style="width:22%;float:left;">
				<?php $this->load->view('modules/mod_menu_profile'); ?>
			</div>
			<div class="right-prof" style="width:76%;float:right;border:1px solid #ccc;padding:20px;">
				<h4 class="h1-title" style="border-bottom:1px solid #ddd;text-transform:uppercase; margin: 0 !important;padding-bottom:10px; font-size: 15px;">Thông tin tài khoản</h4>
				<?php $user = get_user_bymail($_SESSION['cemail_log']); ?>
				<div class="box-info cb">
					<div id="view-name" class="info-view cb">
						<label style="width:20%;">Họ tên:</label>
						<label style="width:60%;" id="old-name"><?php echo $user['cuser']; ?></label>
						<a href="javascript:void(0);" onclick="edit_name();" class="edit">Chỉnh sửa <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
					</div>
					<div id="edit-name" class="info-edit cb">
						<div class="line">
							<label style="width:20%;">Họ tên:</label>
							<input style="width:45%;" type="text" name="cname" value="<?php echo $user['cuser']; ?>" />
							<span class="fail-empty" id="name-empty">Không được để trống!</span>
						</div>
						<div class="line mt10">
							<label style="width:20%;line-height: 30px;"> &nbsp </label>
							<a href="javascript:void(0);" class="change-edit" onclick="change_name();" />Xác nhận</a>
							<a href="javascript:void(0);" class="cancel-edit" onclick="cancel_edit_name();">Hủy</a>
						</div>
					</div>
				</div>
				<div class="box-info cb">
					<div id="view-gender" class="info-view cb">
						<label style="width:20%;">Giới tính:</label>
						<label id="old-gender" style="width:60%;">
							<?php 
							if ($user['cgender']=='0')
								echo "Anh";
							else if ($user['cgender']=='1')
								echo "Chị";
							else if ($user['cgender']=='2')
								echo "Cô";
							else 
								echo "Chú";
							?>
						</label>
						<a href="javascript:void(0);" onclick="edit_gender();" class="edit">Chỉnh sửa <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
					</div>
					<div id="edit-gender" class="info-edit cb">
						<div class="line">
							<label style="width:20%;">Giới tính:</label>
                            <input name="cgender" id="anh" type="radio" value="0" <?php if ($user['cgender']=='0') echo 'checked="checked"'; ?>><label for="anh">Anh</label>
                            <input name="cgender" id="chi" type="radio" value="1" <?php if ($user['cgender']=='1') echo 'checked="checked"'; ?>><label for="chi">Chị</label>
                            <input name="cgender" id="co" type="radio" value="2" <?php if ($user['cgender']=='2') echo 'checked="checked"'; ?>><label for="co">Cô</label>
                            <input name="cgender" id="chu" type="radio" value="3" <?php if ($user['cgender']=='3') echo 'checked="checked"'; ?>><label for="chu">Chú</label>
                        </div>
						<div class="line mt10">
							<label style="width:20%;line-height: 30px;"> &nbsp </label>
							<a href="javascript:void(0);" class="change-edit" onclick="change_gender();" />Xác nhận</a>
							<a href="javascript:void(0);" class="cancel-edit" onclick="cancel_edit_gender();">Hủy</a>
						</div>
					</div>
				</div>
				<div class="box-info cb">
					<div id="view-phone" class="info-view cb">
						<label style="width:20%;">Số điện thoại:</label>
						<label style="width:60%;" id="old-phone"><?php echo $user['cphone'];?></label>
						<a href="javascript:void(0);" onclick="edit_phone();" class="edit">Chỉnh sửa <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
					</div>
					<div id="edit-phone" class="info-edit cb">
						<div class="line">
							<label style="width:20%;">Số điện thoại:</label>
							<input style="width:45%;" type="text" name="cphone" value="<?php echo $user['cphone']; ?>" />
							<span class="fail-empty" id="phone-empty">Không được để trống!</span>
						</div>
						<div class="line mt10">
							<label style="width:20%;line-height: 30px;"> &nbsp </label>
							<a href="javascript:void(0);" class="change-edit" onclick="change_phone();" />Xác nhận</a>
							<a href="javascript:void(0);" class="cancel-edit" onclick="cancel_edit_phone();">Hủy</a>
						</div>
					</div>
				</div>
				<div class="box-info cb">
					<label style="width:20%;">Email:</label>
					<label style="width:60%;"><?php echo $user['cemail'];?></label>
				</div>
				<div class="box-info cb">
					<div id="view-pass" class="info-view cb">
						<label style="width:20%;">Mật khẩu:</label>
						<label style="width:60%;">**********</label>
						<a href="javascript:void(0);" onclick="edit_pass();" class="edit">Chỉnh sửa <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
					</div>
					<div id="edit-pass" class="info-edit cb">
						<div class="line">
							<label style="width:20%;">Mật khẩu cũ:</label>
							<input style="width:45%;" type="password" name="cpass_old" value="" />
							<span class="fail-empty" id="pass-old-empty">Không được để trống!</span>
						</div>
						<div class="line mt10">
							<label style="width:20%;">Mật khẩu mới:</label>
							<input style="width:45%;" type="password" name="cpass_new" value="" />
							<span class="fail-empty" id="pass-new-empty">Không được để trống!</span>
						</div>
						<div class="line mt10">
							<label style="width:20%;">Xác nhận mật khẩu:</label>
							<input style="width:45%;" type="password" name="cpass_re" value="" />
							<span class="fail-empty" id="pass-re-empty">Không được để trống!</span>
						</div>
						<div class="line mt10">
							<label style="width:20%;line-height: 30px;"> &nbsp </label>
							<a href="javascript:void(0);" class="change-edit" onclick="change_pass();" />Xác nhận</a>
							<a href="javascript:void(0);" class="cancel-edit" onclick="cancel_edit_pass();">Hủy</a>
						</div>
					</div>
				</div>
				<div class="box-info cb">
					<div id="view-address" class="info-view cb">
						<label style="width:20%;">Địa chỉ liên hệ:</label>
						<label style="width:60%;" id="old-address"><?php echo $user['caddress'];?></label>
						<a href="javascript:void(0);" onclick="edit_address();" class="edit">Chỉnh sửa <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
					</div>
					<div id="edit-address" class="info-edit cb">
						<div class="line">
							<label style="width:20%;">Địa chỉ liên hệ:</label>
							<input style="width:45%;" type="text" name="caddress" value="<?php echo $user['caddress']; ?>" />
							<span class="fail-empty" id="address-empty">Không được để trống!</span>
						</div>
						<div class="line mt10">
							<label style="width:20%;line-height: 30px;"> &nbsp </label>
							<a href="javascript:void(0);" class="change-edit" onclick="change_address();" />Xác nhận</a>
							<a href="javascript:void(0);" class="cancel-edit" onclick="cancel_edit_address();">Hủy</a>
						</div>
					</div>
				</div>
				<div class="box-info cb">
					<label style="width:20%;">Thành viên:</label>
					<label style="width:60%;"></label>
				</div>
			</div>
			<div class="clearboth"></div>
         </div>
      </div>
   </div>
   <!-- begin index content -->
   <div class="clearboth"></div>
</div>
<?php $this->load->view('modules/mod_footer');?>
<?php $this->load->view('footer');?>