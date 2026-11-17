<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   $member = get_member_by_id($_SESSION['nid_member']);
   ?>  
<div class="container">
	<h5><a href="<?php echo base_url(); ?>gio-hang"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;TRỞ LẠI GIỎ HÀNG</a></h5>
	<h3>THANH TOÁN ĐƠN HÀNG</h3>
	<form id="frm_order" method="post" action="<?php echo base_url().'gio-hang'?>">
	<div class="row">
		<div class="col-md-8">
			<div class="box-thanh-toan" style="padding:20px 40px;border:1px solid #ddd;margin-bottom:10px;">
				<h4 class="h4-tt" style="margin-left:-20px;"><i class="fa fa-truck" aria-hidden="true"></i> Thông Tin Giao Hàng:</h4>
				<div class="h20"></div>
				<label class="box_label"><span class="required">*</span> Họ và Tên:</label>
				<input class="form-control" id="cname" name="cname" value="<?php echo $member['cname']; ?>" style="margin-bottom:20px;border-radius:0;border: 1px solid #ddd;" onkeyup="check_active_order();" required />
				<label class="box_label"><span class="required">*</span> Địa chỉ:</label>
				<input class="form-control" id="caddress" name="caddress" value="<?php echo $member['caddress']; ?>" style="margin-bottom:20px;border-radius:0;border: 1px solid #ddd;" onkeyup="check_active_order();" required />
				<label class="box_label"><span class="required">*</span> Tỉnh/Thành phố (bắt buộc chọn, nếu không đơn hàng sẽ bị trễ):</label>
				<select class="form-control" id="cprovince" name="cprovince" style="margin-bottom:20px;border-radius:0;border: 1px solid #ddd;" onchange="change_cost(this.value);check_active_order();" required>
					<option value="">Vui lòng chọn</option>
					<?php $list = get_province_all();
					foreach($list as $data) {
					?>
					<option value="<?php echo $data['ccost']; ?>"><?php echo $data['cname']; ?></option>
					<?php } ?>
				<select>
				<label class="box_label"><span class="required">*</span> Điện thoại nhà/di động:</label>
				<input class="form-control" id="cphone" name="cphone" value="<?php echo $member['cphone']; ?>" style="margin-bottom:20px;border-radius:0;border: 1px solid #ddd;" onkeyup="check_active_order();" required />
				<label class="box_label"><span class="required">*</span> Email (đơn hàng của bạn sẽ được gửi về email này):</label>
				<input class="form-control" id="cemail" type="email" name="cemail" value="<?php echo $member['cemail']; ?>" style="margin-bottom:20px;border-radius:0;border: 1px solid #ddd;" onkeyup="check_active_order();" required />
			</div>
			<div class="box-thanh-toan" style="padding:20px 40px;border:1px solid #ddd;margin-bottom:10px;">
				<h4 class="h4-tt" style="margin-left:-20px;"><i class="fa fa-credit-card" aria-hidden="true"></i> Phương Thức Thanh Toán:</h4>
				<div class="h20"></div>
				<?php $total=0;
				if(isset($_SESSION["cart"])) {
					$obj_cart = $_SESSION["cart"];	
					foreach($obj_cart as $cart) {
						$product = get_product_detail($cart['id']);
						$total += $product['fprice_sale']*$cart['qty']; 
					}
				}
				?>
				<select class="form-control" id="cmethod" name="cmethod" style="margin-bottom:20px;border-radius:0;border: 1px solid #ddd;float:none;" onchange="change_method(this.value);check_active_order();" required>
					<option value="">Vui lòng chọn</option>
					<option value="1" <?php if($total>2000000) echo "disabled"; ?>>Thanh toán khi nhận hàng</option>
					<option value="2">Thanh toán chuyển khoản</option>
				<select>
				<?php if($total>2000000) { ?>
				<p style="color:red;margin-bottom:10px;"><em>Bạn không thể chọn phương thức <strong>thanh toán khi nhận hàng</strong> với đơn hàng từ <strong>2.000.000 trở lên</strong>. Vui lòng chọn phương thức chuyển khoản. Xin cảm ơn!</em></p>
				<?php } ?>
				<div id="bank_transfer" style="display:none;">
							<?php $data = get_module_byid(8);
								if(isset($data['cnote']))
									echo $data['cnote'];
							?>
						</div>
				<div id="one_pay" style="display:none;">
							<?php $data = get_module_byid(9);
								if(isset($data['cnote']))
									echo $data['cnote'];
							?>
						</div>
				<div class="text-right"><input type="button" value="XEM LẠI ĐỊA CHỈ, NẾU ĐÚNG NHẤN TIẾP TỤC" style="background:#0f5caa;color:#fff;padding:10px 20px;display:none;"/></div>
			</div>
		</div>
		<div class="col-md-4">
			<div style="padding:20px;border:1px solid #ddd;">
				<h4 style="margin-bottom: 20px;"><strong>Xem lại đơn hàng</strong></h4>
				 <?php $i=1;$total=0;
				if(isset($_SESSION["cart"]))
					$obj_cart = $_SESSION["cart"];	
				   foreach($obj_cart as $cart){
				   $product = get_product_detail($cart['id']);
				   $total += $product['fprice_sale']*$cart['qty']; 
				   ?>
				<div class="cb" style="margin-bottom:10px;padding-bottom:10px;border-bottom:1px solid #ddd;<?php if($i==1) echo 'padding-top:10px;border-top:1px solid #ddd;';?>">
					<img class="product-img" src="<?php echo base_url().'upload/images_product/resize_images/'.$product['cimage_resize']?>" style="width:10%;float:left;margin-right:10px;" />
					<div style="width:40%;float:left;margin-right:10px;"><?php echo $product['cproducts']; ?></div>
					<div style="width:10%;float:left;margin-right:10px;">x <?php echo $cart['qty']; ?></strong></div>
					<div style="width:30%;float:left;text-align:right;"><strong><?php echo Fview_price($product['fprice_sale']*$cart['qty']); ?></strong><br></div>
				</div>
				<?php $i++;} ?>
				<div style="clear:both;height:10px;"></div>
				<div style="float:left;width:70%;">
					<strong>TỔNG GIÁ TRỊ ĐƠN HÀNG:</strong>
				</div>
				<div style="float:left;width:30%;text-align:right">
					<strong><?php echo Fview_price($total); ?></strong>
				</div>
				<div style="clear:both;height:10px;"></div>
				<div style="float:left;width:50%;color:red;">
					Phí giao hàng:
				</div>
				<div id="cost" style="float:left;width:50%;text-align:right;color:red;">
					N/A
				</div>
				<div style="clear:both;height:10px;"></div>
				<?php $giam_gia = 0; 
					$list = get_order_by_member($_SESSION["nid_member"]);
					if(count($list)==0) { 
						$giam_gia = 10000;
						$total = $total - $giam_gia; 	
				?>
				<div style="float:left;width:50%;color:red;">
					Giảm giá<br>
					(cho đơn hàng đầu tiên):
				</div>
				<div style="float:left;width:50%;text-align:right;color:red;">
					<?php echo '- '.Fview_price($giam_gia); ?>
				</div>
				<div style="clear:both;height:10px;"></div>
				<?php } ?>
				<p style="border-bottom:1px solid #ddd;margin-bottom:15px;padding-bottom:15px;font-style:italic;">Phí giao hàng tùy theo địa chỉ</p>
				<div style="float:left;width:30%;">
					<strong>TỔNG CỘNG:</strong>
				</div>
				<div style="float:left;width:70%;text-align:right">
					<strong id="total"><?php echo Fview_price($total); ?></strong>
					<br>Bao gồm phí giao hàng
				</div>
				<input type="hidden" name="ccost" id="ccost" value="0" />
				<input type="hidden" name="cgiam_gia" id="cgiam_gia" value="<?php echo $giam_gia; ?>" />
				<input type="hidden" name="ctotal" id="ctotal" value="<?php echo $total; ?>" />
				<input type="hidden" id="ctotal_old" value="<?php echo $total; ?>" />
				<input type="button" id="btn_order" name="bnt_submit01" value="ĐẶT HÀNG" style="background:#ccc;color:#fff;padding:10px 20px;width: 100%;"/>
			</div>
		</div>
	</div>
	</form>
</div>
<div class="h60"></div>	
<script>
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
function change_method(value){
	if(value==1) {
		$('#bank_transfer').css({'display': 'block'});	
		$('#one_pay').css({'display': 'none'});	
	} else {
		$('#one_pay').css({'display': 'block'});	
		$('#bank_transfer').css({'display': 'none'});	
	}
}
function change_cost(value){
	var cost = value;
	var total = $('#ctotal_old').val();
	if(total>=500000)
		cost = "0";
	if(cost!="") {
		$('#ccost').val(cost);
		$('#ctotal').val(parseInt(total)+parseInt(cost));
		$('#cost').text(cost.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")+' đ');
		$('#total').text((parseInt(total)+parseInt(cost)).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")+' đ');
	} else {
		$('#ccost').val("");
		$('#cost').text("N/A");
		$('#total').text(parseInt(total).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")+' đ');
	}
}
function check_active_order(){
	if($('#cname').val() != "" && $('#caddress').val() != "" && $('#cphone').val() != "" && $('#cemail').val() != "" && isEmail($('#cemail').val()) && $('#cprovince').val() != "" && $('#cmethod').val() != "") {
		$('#btn_order').css({'background': '#0f5caa'});	
		$("#btn_order").prop("type", "submit");
	} else {
		$('#btn_order').css({'background': '#ccc'});	
		$("#btn_order").prop("type", "button");
	}
}
</script>	  
<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>