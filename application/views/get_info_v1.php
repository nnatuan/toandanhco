<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   ?>  
<script type="text/javascript">
   function update_cart(_id){
   	_qty = jQuery("#cquantity_"+_id).val();   
   		jQuery.post( "<?php echo base_url().'thao-tac/cap-nhat-san-pham'?>", { id: _id, qty: _qty })
   	  .done(function( data ) {  		
   		location.reload();
   	  });
   }   
   function del_cart(_id){
   	cfm= confirm("Bạn muốn xóa sản phẩm này khỏi giỏ hàng của mình ?");
   	if(cfm == true){
   		jQuery.post( "<?php echo base_url().'thao-tac/xoa-san-pham'?>", { id: _id })
   	  .done(function( data ) {	
   		location.reload();
   	  });
   	}
   }
</script>

	  
	  <section class="content-section main" data-inview-showup="showup-translate-up">
         <div class="container">
			<div class="breadcrumb clearfix">
                           <ul>
                              <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                                 <a title="Đến trang chủ" href="<?php echo base_url()?>" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                              </li>
                              <li class="productname icon-li"><strong>Thông tin thanh toán</strong> </li>
                           </ul>
                        </div>
			<h3 class="title-content">Thông tin liên hệ</h3>
			<div id="box_dathang2">
            <form id="mua_hang_2" method="post" action="<?php echo base_url().'gio-hang'?>" >
               <p style="font-size: 13px;">Vui lòng cung cấp số điện thoại của bạn để chúng tôi tiến hành liên hệ giao hàng, xin cảm ơn.</p>
               <label class="box_label">Tên </label>
               <input class="input_dathang_2" name="cname" value="" /><br />
               <label class="box_label">Điện Thoại *</label>
               <input class="input_dathang_2" name="cphone" value="" required/><br />
               <label class="box_label">Địa chỉ *</label>
               <input class="input_dathang_2" name="caddress" value="" required/><br />
               <label class="box_label">Ghi Chú </label>
               <textarea class="input_dathang_2 " name="cnote" ></textarea>
               <br />
               <input type="hidden" name="id_hidden_pr" value="" />
               <div class="clear-25"></div>
               <input type="button" name="btn_return" value="Trở lại" onclick="location.href='<?php echo base_url() ?>'"/>
               <input type="submit" name="bnt_submit01" id="bnt_submit01" value="Tiếp tục"/>
            </form>
         </div>	
         </div>
      </section>
<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>