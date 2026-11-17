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
   function update_cart_m(_id){
   	_qty = jQuery("#cquantity_m_"+_id).val();   
   		jQuery.post( "<?php echo base_url().'thao-tac/cap-nhat-san-pham'?>", { id: _id, qty: _qty })
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
      <section class="back-section solid-section">
         <div class="fix-image-wrap">
			<?php 
				$data = get_module_byid(66);
				if(isset($data['cnote']))
					echo $data['cnote'];
			?>
		 </div>
         <div class="theme-back"></div>
         <div class="container page-info">
            <div class="section-alt-head">
               <h2 class="text-upper" data-inview-showup="showup-translate-right">Giỏ hàng</h2>
               
            </div>
         </div>
         <div class="section-footer">
            <div class="container" data-inview-showup="showup-translate-down">
               <ul class="page-path">
                  <li><a href="<?php echo base_url()?>">Trang chủ</a></li>
                  <li class="path-separator"><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                  <li>Giỏ hàng</li>
               </ul>
            </div>
         </div>
      </section>
	  <section class="content-section" data-inview-showup="showup-translate-up">
         <div class="container">
			<h3 class="title-content">Thông tin giỏ hàng</h3>
			<?php 
            $obj_cart = '';
            $total = 0;
            if(isset($_SESSION["cart"]))
            $obj_cart = $_SESSION["cart"];				
            if($obj_cart !=''){
            ?>
            <table class="full-tab" id="mobile-cart">
            <?php 
             $i = 1;  
               foreach($obj_cart as $cart){
               $product = get_product_detail($cart['id']);
               if($product['cflash'] ==1)
                update_cart($cart['id'], 1);
               ?>
            <tr>
               <td class="no-padding"><?php echo $i?></td>
               <td class="no-padding"><a href="#" target="_blank">

                  <?php echo $product['cproducts']?></a>
                  <div class="item-cart-m">
                        <div class="col-xs-2">
                           <?php if($product['cflash'] !=1){?>
                           <select name ="cquantity" id="cquantity_m_<?php echo $cart['id']?>" class="input_dathang validate[required]" style="width: 50px;">
                     <?php for($j=1;$j<6;$j++){?>
                     <option <?php if($cart['qty']==$j){?>selected="selected"<?php }?>><?php echo $j?></option>
                     <?php }?>
                        </select>
                     <?php }else{?>
                           <span>1</span>
                     <?php }?>
                        </div>
                        <div class="col-xs-5">  x <?php echo Fview_price($product['fprice_sale']) ?></div>
                        <div class="col-xs-5 t-right">= <?php if($product['cflash']!=1){echo Fview_price($product['fprice_sale']*$cart['qty']);}else echo $product['fprice_sale']; ?></div>
                  </div>
                    <p>
                     

                        <a href="javascript:del_cart('<?php echo $cart['id'] ?>');" class="btn-link">Xóa</a> |
                     
                     <?php if($product['cflash']!=1){?>
                        <a class="btn-link" href="javascript:update_cart_m('<?php echo $cart['id']?>');">Cập nhật</a> 
                     <?php }?>
                  </p>
               </td>
              
                 
              
            </tr>
            <?php 
			if ($product['fprice_sale'] < $product['fprice'] && $product['ncheck'] == 1) 
						$price = $product['fprice_sale'];
					else
						$price = $product['fprice'];
					
                      if($product['cflash']!=1){
               $total += $price*$cart['qty'];
             }else{
               $total += $price;
            }
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
            
         <table class="full-tab" id="destop-cart">
            <tr>
               <td class="cart-title">Hình ảnh</td>
               <td class="cart-title no-padding">Sản phẩm</td>
               <td class="cart-title price2">Giá</td>
               <td class="cart-title">Số lượng</td>
               <td class="cart-title">Thành tiền</td>
               <td class="cart-title">Thao tác</td>
            </tr>
            <?php $total_sale = $total; $_SESSION['nsale'] = 0;
				if(isset($_SESSION['price_sale'])) {
					$total_sale = $total_sale - $_SESSION['price_sale']; 
					$_SESSION['nsale']	= $_SESSION['price_sale'];
				} else if(isset($_SESSION['per_sale'])) {
					$price_sale_all = ($_SESSION['per_sale']*$total_sale)/100;
					$total_sale = $total_sale - $price_sale_all;
					$_SESSION['nsale']	= $price_sale_all;
				}
               foreach($obj_cart as $cart){
               $i = 1;  
               $product = get_product_detail($cart['id']);
					if ($product['fprice_sale'] < $product['fprice'] && $product['ncheck'] == 1) 
						$price = $product['fprice_sale'];
					else
						$price = $product['fprice'];
               ?>
            <tr>
               <td class="cart-img"><a href="#" target="_blank"><img class="product-img" src="<?php echo base_url().'upload/images_product/resize_images/'.$product['cimage_resize']?>" align="middle" /></a></td>
               <td class="no-padding"><a href="#" target="_blank"><?php echo $product['cproducts']?></a></td>
               <td><?php echo Fview_price($price) ?></td>
               <td>
                  <?php if($product['cflash']!=1){?>
                  <select name ="cquantity" id="cquantity_<?php echo $cart['id']?>" class="input_dathang validate[required]" style="width: 50px;">
                     <?php for($j=1;$j<11;$j++){?>
                     <option <?php if($cart['qty']==$j){?>selected="selected"<?php }?>><?php echo $j?></option>
                     <?php }?>
                  </select>
               <?php }else{?>
                     <span>1</span>
            <?php }?>
               </td>
                <?php if($product['cflash']!=1){?>
               <td><?php echo Fview_price($price*$cart['qty']);?></td>
            <?php }else{?>
               <td><?php echo Fview_price($price);?></td>
            <?php }?>
               <td><a href="javascript:del_cart('<?php echo $cart['id'] ?>');" class="btn-link">Xóa</a> <?php if($product['cflash']!=1){?>| <a class="btn-link" href="javascript:update_cart('<?php echo $cart['id']?>');">Cập nhật</a> <?php }?></td>
            </tr>
            <?php 
             //  $total += $price*$cart['qty'];
               $i++;
               }
               ?>
            <tr class="cart-end">
               <td colspan="5" class="td_end">Tổng tiền (chưa giảm giá) :</td>
               <td style="color:red; font-weight:bold;"><?php echo Fview_price($total);?></td>
            </tr>
			
			<tr>
				<?php if(isset($_SESSION['price_sale'])) { ?>
					 <td colspan="5" style="text-align: right;">
						Giảm giá :
					</td>
					<td style="color: red;font-weight:bold;"><?php echo Fview_price($_SESSION['price_sale']);?></td>
					 <?php } else if(isset($_SESSION['per_sale'])) { ?>
					 <td colspan="5" style="text-align: right;">
						Giảm giá :
					</td>
					<td style="color: red;font-weight:bold;"><?php echo Fview_price($price_sale_all);?></td>
				<?php } else { ?>	
				<td colspan="6" style="text-align: right;padding: 10px;">
					<input type="input" id="ccode_sale" name="ccode_sale" value="" placeholder="Nhập mã giảm giá nếu có" style="border:1px solid #eee;padding: 5px;" />
					<a href="javascript:check_code_sale();" id="check-code-sale" style="display:inline-block;padding: 6px 10px;;background:#72cc5a;color:#fff;margin-right:5px;">Xác nhận</a>
					<p id="err_msg_code" style="display:none;color:red;font-style:italic;margin: 0;">Mã không đúng hoặc không tồn tại.</p>
				</td>
				<?php } ?>
			</tr>
			<?php if(isset($_SESSION['price_sale']) || isset($_SESSION['per_sale'])) { ?>
			<tr class="cart-end">
               <td colspan="5" class="td_end">Tổng tiền (sau khi giảm) :</td>
               <td style="color:red; font-weight:bold;"><?php echo Fview_price($total_sale);?></td>
            </tr>
			<?php } ?>
            <?php $_SESSION['ntotal'] = $total_sale?>
            <tr>
               <td colspan="6" class="td_end">
                  <input type="button" name="btn_return" class="mar-20" value="Mua thêm" onclick="location.href='<?php echo base_url() ?>'"/>
                 
                  <input type="button" name="bnt_submit01" id="bnt_submit01" value="Tiếp tục" onclick="location.href='<?php echo base_url().'xac-nhan' ?>'"/>
               
               </td>
            </tr>
         </table>
         <?php }else{?>
         <p>Giỏ hàng chưa có sản phẩm.</p>
         <?php }?> 	
         <div></br><p style="color: red;font-style: italic;">Lưu ý: Giá bán trên chưa bao gồm phí vận chuyển và VAT, phí vận chuyển khi xác thực đơn hàng nhân viên bán hàng sẽ báo trực tiếp cho quý khách.</p></div>
         </div>

      </section>
<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>