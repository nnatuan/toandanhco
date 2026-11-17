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


         
           

               <div>
             

              <table class="full-tab" id="mobile-cart">
            
            <?php 
             $i = 1;  
               foreach($obj_cart as $cart){
              
               $product = get_product_detail($cart['id']);
               ?>
            <tr>
               <td class="no-padding"><?php echo $i?></td>
               <td class="no-padding"><a href="#" target="_blank">

                  <?php echo $product['cproducts']?></a>
                  <div class="item-cart-m">
                        <div class="col-xs-2">
                           <select name ="cquantity" id="cquantity_<?php echo $cart['id']?>" class="input_dathang validate[required]" style="width: 50px;">
                     <?php for($j=1;$j<6;$j++){?>
                     <option <?php if($cart['qty']==$j){?>selected="selected"<?php }?>><?php echo $j?></option>
                     <?php }?>
                        </select>
                        </div>
                        <div class="col-xs-5">  x <?php echo Fview_price($product['fprice_sale']) ?></div>
                        <div class="col-xs-5 t-right">= <?php echo Fview_price($product['fprice_sale']*$cart['qty']);?></div>
                  </div>
                    <p>
                     
                        <a href="javascript:del_cart('<?php echo $cart['id'] ?>');" class="btn-link">Xóa</a> |
                     
                     
                        <a class="btn-link" href="javascript:update_cart('<?php echo $cart['id']?>');">Cập nhật</a> 
                     
                  </p>
               </td>
              
                 
              
            </tr>
            <?php 
               $total += $product['fprice_sale']*$cart['qty'];
               $i++;
               }
               ?>
            <tr class="cart-end">
               
               <td class="t-price t-right" colspan="2"><?php echo Fview_price($total);?></td>
            </tr>
            <?php $_SESSION['cart_total'] = $total?>
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

             

         </div>


           
         
            
            
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
               foreach($obj_cart as $cart){
               $i = 1;  
               $product = get_product_detail($cart['id']);
               ?>
            <tr>
               <td class="cart-img"><a href="#" target="_blank"><img class="product-img" src="<?php echo base_url().'upload/images_product/resize_images/'.$product['cimage_resize']?>" align="middle" /></a></td>
               <td class="no-padding"><a href="#" target="_blank"><?php echo $product['cproducts']?></a></td>
               <td><?php echo Fview_price($product['fprice_sale']) ?></td>
               <td>
                  <select name ="cquantity" id="cquantity_<?php echo $cart['id']?>" class="input_dathang validate[required]" style="width: 50px;">
                     <?php for($j=1;$j<6;$j++){?>
                     <option <?php if($cart['qty']==$j){?>selected="selected"<?php }?>><?php echo $j?></option>
                     <?php }?>
                  </select>
               </td>
               <td><?php echo Fview_price($product['fprice_sale']*$cart['qty']);?></td>
               <td><a href="javascript:del_cart('<?php echo $cart['id'] ?>');" class="btn-link">Xóa</a> | <a class="btn-link" href="javascript:update_cart('<?php echo $cart['id']?>');">Cập nhật</a> </td>
            </tr>
            <?php 
               $total += $product['fprice_sale']*$cart['qty'];
               $i++;
               }
               ?>
            <tr class="cart-end">
               <td colspan="5" class="td_end">Tổng tiền :</td>
               <td style="color:red; font-weight:bold;"><?php echo Fview_price($total);?></td>
            </tr>
            <?php $_SESSION['cart_total'] = $total?>
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
         </div>
      </section>
<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>