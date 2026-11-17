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
               <h2 class="text-upper" data-inview-showup="showup-translate-right">Xác nhận đơn hàng</h2>
               
            </div>
         </div>
         <div class="section-footer">
            <div class="container" data-inview-showup="showup-translate-down">
               <ul class="page-path">
                  <li><a href="<?php echo base_url()?>">Trang chủ</a></li>
                  <li class="path-separator"><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                  <li>Xác nhận đơn hàng</li>
               </ul>
            </div>
         </div>
      </section>
	  <section class="content-section" data-inview-showup="showup-translate-up">
         <div class="container">
			<h3 class="title-content">Xác nhận đơn hàng</h3>
			<h4 class="h3-title">Thông tin cá nhân</h4>
         <div class="contact-info">
            <table>
            	<?php if($_SESSION["cname"] !=''){?>
               <tr>
                  <td class ="td-0">Họ tên</td>
                  <td><?php echo $_SESSION["cname"]?></td>
               </tr>
              <?php }?>
               <tr>
                  <td class ="td-0">Điện thoại</td>
                  <td><?php echo $_SESSION["cphone"]?></td>
               </tr>
               <tr>
                  <td class ="td-0">Địa chỉ</td>
                  <td><?php echo $_SESSION["caddress"]?></td>
               </tr>
               <?php if($_SESSION["cnote"] !=''){?>
               <tr>
                  <td class ="td-0">Ghi chú</td>
                  <td><?php echo $_SESSION["cnote"]?></td>
               </tr>
           <?php }?>
            </table>
         </div>
         <div class="clear-25"></div>
         <?php 
            $obj_cart = '';
            $total = 0;
            if(isset($_SESSION["cart"]))
            $obj_cart = $_SESSION["cart"];				
            if($obj_cart !=''){
            
            ?>
         <h4 class="h3-title">Chi tiết đơn hàng</h4>
         <form class="frm_order" name="frm_order" method="post" action="">
            <table class="desktop">
               <tr>
                  <td class="cart-title">STT</td>
                  <td class="cart-title no-padding">Sản phẩm</td>
                  <td class="cart-title price2">Giá</td>
                  <td class="cart-title">Số lượng</td>
                  <td class="cart-title">Thành tiền</td>
               </tr>
               <?php 
                  foreach($obj_cart as $cart){
                  $i = 1;
                  $product = get_product_detail($cart['id']);
					if ($product['fprice_sale'] < $product['fprice'] && $product['ncheck'] == 1) 
						$price = $product['fprice_sale'];
					else
						$price = $product['fprice'];
                  ?>
               <tr>
                  <td class="no-padding"><?php echo $i?></td>
                  <td class="no-padding"><a href="#"><?php echo $product['cproducts']?></a></td>
                  <td><?php echo Fview_price($price) ?></td>
                  <td><?php echo $cart['qty']?></td>
                  <td><?php echo Fview_price($price*$cart['qty']);?></td>
               </tr>
               <?php 
                  $total += $price*$cart['qty'];
                  $i++;
                  }
                  ?>
               <tr class="cart-end">
                  <td colspan="4" class="td_end">Tổng tiền (chưa giảm giá) :</td>
                  <td><?php echo Fview_price($total);?></td>
               </tr>
			   <tr class="cart-end">
                  <td colspan="4" class="td_end">Giảm giá :</td>
                  <td><?php echo Fview_price($_SESSION['nsale']);?></td>
               </tr>
			   <tr class="cart-end">
                  <td colspan="4" class="td_end">Tổng tiền (sau khi giảm) :</td>
                  <td><?php echo Fview_price($total - $_SESSION['nsale']);?></td>
               </tr>
               <tr>
                  <td colspan="5" class="td_end td-no-bor">
                     <input type="button" name="btn_return" class="mar-20" value="Mua thêm" onclick="location.href='<?php echo base_url() ?>'"/>
                     <input type="submit" name="btn_submit" id="btn_submit" value="Tiếp tục"/>
                  </td>
               </tr>
            </table>
			<table class="mobile" style="border: 0;">
               <tr>
                  <td class="cart-title price2">Đơn giá</td>
                  <td class="cart-title">SL</td>
                  <td class="cart-title">Thành tiền</td>
               </tr>
               <?php 
                  foreach($obj_cart as $cart){
                  $i = 1;
                  $product = get_product_detail($cart['id']);
					if ($product['fprice_sale'] < $product['fprice'] && $product['ncheck'] == 1) 
						$price = $product['fprice_sale'];
					else
						$price = $product['fprice'];
                  ?>
               <tr>
                  <td style="text-align:left;"><strong><?php echo $product['cproducts']?></strong><br><?php echo Fview_price($price); ?></td>
                  <td><?php echo $cart['qty']; ?></td>
                  <td><?php echo Fview_price($price*$cart['qty']);?></td>
               </tr>
               <?php 
                //  $total += $price*$cart['qty'];
                  $i++;
                  }
                  ?>
               <tr class="cart-end">
                  <td colspan="2" class="td_end">Tổng tiền (chưa giảm giá) :</td>
                  <td><?php echo Fview_price($total);?></td>
               </tr>
			   <tr class="cart-end">
                  <td colspan="2" class="td_end">Giảm giá :</td>
                  <td><?php echo Fview_price($_SESSION['nsale']);?></td>
               </tr>
			   <tr class="cart-end">
                  <td colspan="2" class="td_end">Tổng tiền (sau khi giảm) :</td>
                  <td><?php echo Fview_price($total - $_SESSION['nsale']);?></td>
               </tr>
               <tr>
                  <td colspan="3" class="td_end td-no-bor" style="padding: 10px;">
                     <input type="button" name="btn_return" class="mar-20" value="Mua thêm" onclick="location.href='<?php echo base_url() ?>'" style="margin: 0;"/>
                     <input type="submit" name="btn_submit" id="btn_submit" value="Tiếp tục" style="margin: 0;"/>
                  </td>
               </tr>
            </table>
         </form>
         <?php }?>
         <div><p style="color: red;font-style: italic;">Lưu ý: Giá bán trên chưa bao gồm phí vận chuyển và VAT, phí vận chuyển khi xác thực đơn hàng nhân viên bán hàng sẽ báo trực tiếp cho quý khách.</p></div>
         </div>
      </section>
<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>