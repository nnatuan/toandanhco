<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   ?>  
<script type="text/javascript">
   function update_cart(_id, _iscolor){
   	_qty = jQuery("#cquantity_"+_id).val();   
   		jQuery.post( "<?php echo base_url().'thao-tac/cap-nhat-san-pham'?>", { id: _id, qty: _qty, iscolor: _iscolor })
   	  .done(function( data ) {  		
   		location.reload();
   	  });
   }   
   function del_cart(_id, _iscolor){
   	cfm= confirm("Bạn muốn xóa sản phẩm này khỏi giỏ hàng của mình ?");
   	if(cfm == true){
   		jQuery.post( "<?php echo base_url().'thao-tac/xoa-san-pham'?>", { id: _id, iscolor: _iscolor })
   	  .done(function( data ) {	
   		location.reload();
   	  });
   	}
   }
   function update_cart_m(_id, _iscolor){
   	_qty = jQuery("#cquantity_m_"+_id).val();   
   		jQuery.post( "<?php echo base_url().'thao-tac/cap-nhat-san-pham'?>", { id: _id, qty: _qty, iscolor: _iscolor })
   	  .done(function( data ) {  		
   		location.reload();
   	  });
   }   
   function check_code_sale(){
            _code = $("#ccode_sale").val();
			if(_code != "") {
				$.post("<?php echo base_url()?>thao-tac/check-code-sale", {
					 code: _code
				})
				.done(function(data) {
					 if(data == "0") {
						$("#err_msg_code").text("Mã không đúng hoặc không tồn tại.");
						$("#err_msg_code").css({'display': 'block'});
					 } else {
						//$("#err_msg_code").css({'display': 'none'});
						window.location.reload();
					 }
				});
			} else {
				$("#err_msg_code").text("Vui lòng nhập mã rồi nhấn Xác nhận.");
				$("#err_msg_code").css({'display': 'block'});
			}
	}
</script>
	
	  
	  <section class="content-section main" data-inview-showup="showup-translate-up">
         <div class="container">
			<h3 class="title-content">Thông tin giỏ hàng</h3>
		<?php if(!isset($_SESSION['nid_member'])){?>
            <span><i style="color: red;"> Bạn cần đăng nhập hoặc đăng ký tài khoản để tiếp tục thanh toán đơn hàng này!</i></span>
      <?php }?>
         <?php 
			$obj_cart = '';
            $total = 0;
            if(isset($_SESSION["cart"]))
            $obj_cart = $_SESSION["cart"];				
            if($obj_cart !=''){			
            ?> 
            <p>&nbsp</p>
         <table class="full-tab" id="destop-cart">
            <tr>
               <td class="cart-title">Hình ảnh</td>
               <td class="cart-title no-padding">Sản phẩm</td>
               <td class="cart-title price2">Giá</td>
               <td class="cart-title">Số lượng</td>
               <td class="cart-title">Thành tiền</td>
               <td class="cart-title">Thao tác</td>
            </tr>
            <?php 
				$i = 1;  
               foreach($obj_cart as $cart){
               $product = get_product_detail($cart['id']);
			   $total += $product['fprice_sale']*$cart['qty']; 
               ?>
            <tr>
               <td class="cart-img"><a href="#" target="_blank"><img class="product-img" src="<?php echo base_url().'upload/images_product/resize_images/'.$product['cimage_resize']?>" align="middle" /></a></td>
               <td class="no-padding"><a href="#" target="_blank"><?php echo $product['cproducts']?></a>
			   </td>
               <td><?php echo Fview_price($product['fprice_sale']) ?></td>
               <td>
                  <select name ="cquantity" id="cquantity_<?php echo $cart['id']?>" class="input_dathang validate[required]" style="width: 60px;float: none;border: 1px solid #ddd;">
                     <?php for($j=1;$j<6;$j++){?>
                     <option <?php if($cart['qty']==$j){?>selected="selected"<?php }?>><?php echo $j?></option>
                     <?php }?>
                  </select>
               </td>
               <td><?php echo Fview_price($product['fprice_sale']*$cart['qty']);?></td>
               <td><a href="javascript:del_cart('<?php echo $cart['id'] ?>');" class="btn-link">Xóa</a> | <a class="btn-link" href="javascript:update_cart('<?php echo $cart['id']?>');">Cập nhật</a> </td>
            </tr>
            <?php 
             //  $total += $product['fprice_sale']*$cart['qty'];
               $i++;
               }
               ?>
            <tr class="cart-end">
               <td colspan="5" class="td_end"><strong>TỔNG TIỀN:</strong></td>
               <td style="color:red; font-weight:bold;"><strong><?php echo Fview_price($total);?></strong></td>
            </tr>

            <tr>
               <td colspan="6" class="td_end">
                  <input type="button" name="btn_return" class="mar-20" value="Mua thêm" onclick="location.href='<?php echo base_url() ?>'"/>
                 
                  <input type="button" name="bnt_submit01" id="bnt_submit01" value="Tiếp tục" onclick="location.href='<?php echo base_url().'xac-nhan' ?>'"/>
               
               </td>
            </tr>
         </table>
		 
		 <table class="full-tab" id="mobile-cart">
            <?php  $i = 1; $total = 0;
			foreach($obj_cart as $cart){
               $product = get_product_detail($cart['id']);
			   $total += $product['fprice_sale']*$cart['qty']; 
               ?>
            <tr>
               <td class="no-padding"><?php echo $i?></td>
               <td class="no-padding"><a href="#" target="_blank">

                  <?php echo $product['cproducts']?></a>
                  <div class="item-cart-m">
                        <div class="col-xs-2" style="padding-right:0;">
                           <select name ="cquantity" id="cquantity_m_<?php echo $cart['id']?>" class="input_dathang validate[required]" style="width: 50px;padding: 5px;">
                     <?php for($j=1;$j<6;$j++){?>
                     <option <?php if($cart['qty']==$j){?>selected="selected"<?php }?>><?php echo $j?></option>
                     <?php }?>
                        </select>
                        </div>
                        <div class="col-xs-5">  x <?php echo Fview_price($product['fprice_sale']) ?></div>
                        <div class="col-xs-5 t-right">= <?php echo Fview_price($product['fprice_sale']*$cart['qty']);?></div>
                  </div>
                    <p>
                     
                        <a href="javascript:del_cart('<?php echo $cart['id'] ?>','<?php echo $cart['iscolor'] ?>');" class="btn-link">Xóa</a> |
                     
                     
                        <a class="btn-link" href="javascript:update_cart_m('<?php echo $cart['id']?>','<?php echo $cart['iscolor'] ?>');">Cập nhật</a> 
                     
                  </p>
               </td>
              
                 
              
            </tr>
            <?php 
               $i++;
               }
               ?>
            <tr class="cart-end">
               
               <td class="t-price t-right" colspan="2"><?php echo Fview_price($total);?></td>
            </tr>
            <tr>
               <td colspan="6" class="td_end">
                  <div class="col-xs-6"> 
                  <input type="button" name="btn_return" class="mar-20" value="Mua thêm" onclick="location.href='<?php echo base_url() ?>'"/>
               </div>
               <div class="col-xs-6"> 
                  <input type="button" name="bnt_submit01" id="bnt_submit01" value="Tiếp tục" onclick="location.href='<?php echo base_url().'xac-nhan' ?>'"/>
               </div>
               </td>
            </tr>
         </table>
         <?php }else{?>
         <p>Giỏ hàng chưa có sản phẩm.</p>
         <?php }?> 	
         <div><p style="color: red;font-style: italic;margin-top: 10px;display:none;">Lưu ý: Giá bán trên chưa bao gồm phí vận chuyển và VAT, phí vận chuyển khi xác thực đơn hàng nhân viên bán hàng sẽ báo trực tiếp cho quý khách.</p></div>
         </div>

      </section>

<div class="h60"></div>		  
<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>