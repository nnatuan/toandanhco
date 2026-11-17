<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   ?>
<div class="main-wrap full left">
	<div class="wrapper" style="min-height: 400px;padding: 30px 0;">
		<div class="text-center">
			<h2 style="margin-bottom:20px">KIỂM TRA ĐƠN HÀNG</h2>
			<input id="corder" type="text" placeholder="Nhập mã đơn hàng" style="padding: 10px;border: 1px solid #ddd;width: 200px;"/><button onclick="check_order();" style="background: #e2347e;color: #fff;border: 0;padding: 10px 20px;border: 1px solid #e2347e;outline:none;">Xác nhận</button>
		</div>
		<div id="order-result" style="margin-top:20px;">
		</div>
	</div>
	
<script type="text/javascript">
	function check_order(){
		var _corder = $('#corder').val();
                $.ajax({
                    url : "<?php echo base_url(); ?>ajax_check_order",
                    type : "post",
                    dataType:"text",
                    data : {
                         corder : _corder
                    },
                    success : function (result){
						$('#order-result').html(result);
                    }
                });
            }	
</script>			
<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>