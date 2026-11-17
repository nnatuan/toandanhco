<?php 
$corder = $_POST['corder']; 
$order = get_order_by_code($corder);
if(isset($order['nid'])) {
?>
						<div style="width: 48%;float:left;">
							<h3 class="title-content" style="font-size: 20px;">Thông tin khách hàng</h3>
							<table class="desktop table-cart">
							   <tr>
								  <td class="cart-title">Họ tên</td>
								  <td><?php echo $order['cfullname'] ?></td>
								</tr>
								<tr> 
								  <td class="cart-title">Điện thoại</td>
								  <td><?php echo $order['nphone'] ?></td>
								</tr>
								<tr>  
								  <td class="cart-title">Địa chỉ</td>
								  <td><?php echo $order['caddress'] ?></td>
								</tr>
								<tr>  
								  <td class="cart-title">Ghi chú</td>
								  <td><?php echo $order['cnote'] ?></td>
							   </tr>
							</table>
						</div>
						<div style="width: 4%;float:left;">&nbsp;</div>
						<div style="width: 48%;float:left;">
							<h3 class="title-content" style="font-size: 20px;">Thông tin đơn hàng</h3>
							<table class="desktop table-cart">
							   <tr>
								  <td class="cart-title" style="background: #eee;">STT</td>
								  <td class="cart-title" style="background: #eee;">Sản phẩm</td>
								  <td class="cart-title title-price" style="background: #eee;">Giá</td>
								  <td class="cart-title" style="background: #eee;">SL</td>
								  <td class="cart-title title-tt" style="background: #eee;">Thành tiền</td>
							   </tr>
							   <?php 
								$i = 1;$total=0;
								$obj_cart = get_order_detail($order['nid']);
								  foreach($obj_cart as $cart){
								 
								  
								  if($cart['niscolor']==1) {
									   $color = get_color_detail($cart['nid_product']);
									   $product = get_product_detail($color['nid_product']);
									   if($color['fprice_sale'] != 0 && $color['fprice_sale'] != ''&& $color['ncheck'] == 1)
											$price=$color['fprice_sale'];
									   else
											$price=$color['fprice'];
								   } else {
									   $product = get_product_detail($cart['nid_product']);
									   $time_search = strtotime(date("m/d/Y",time()));
														$flash = get_flash_today($time_search);
														$arr = explode(',',$flash['cvalue']);
														$flag_fl = 0;
														for($i=0;$i<count($arr)-1;$i++) {
															if($product['nid']==$arr[$i])
																$flag_fl = 1;
														}
														
									   if($product['fprice_sale'] != 0 && $product['fprice_sale'] != '' && ($product['ncheck'] == 1 || ($product['cflash'] == 1 && $flag_fl == 1)))
											$price=$product['fprice_sale'];
										else
											$price=$product['fprice'];
								   }
								  ?>
							   <tr>
								  <td><?php echo $i?></td>
								  <td><a href="#"><?php echo $product['cproducts']?></a></td>
								  <td><?php echo Fview_price($price) ?></td>
								  <td><?php echo $cart['nquantity']?></td>
								  <td><?php echo Fview_price($price*$cart['nquantity']);?></td>
							   </tr>
							   <?php 
								  $total += $price*$cart['nquantity'];
								  $i++;
								  }
								  ?>
							   <tr class="cart-end">
								  <td colspan="4" class="td_end">Tổng tiền :</td>
								  <td><?php echo Fview_price($total);?></td>
							   </tr>
							</table>
						</div>
						<div style="clear:both;"></div>
<?php } else { ?>
<p class="text-center">Không tìm thấy kết quả.</p>
<?php } ?>					
						