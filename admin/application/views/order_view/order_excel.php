<?php
	$this->load->view('excel_header1');
	$list_product = get_product_excel();
	$count = count($list_product);
?>
<h1 style="text-align:center;font-size:16px;">DANH SÁCH ĐƠN HÀNG</h1>
<table width="100%" border="1" >

		<tr style="background:#ccc;font-weight:bold;text-align:center;">
			<td>#</td>
			<td>Mã đơn hàng</td>
			<td>Khách hàng</td>
			<td>Email</td>
			<td>Điện thoại</td>
			<td>Địa chỉ</td>	
			<td>Ngày tạo</td>							
			<td>Thanh toán</td>
			<td colspan="<?php echo $count; ?>" style="text-align:center;">Sản phẩm</td>
			<td>Thành tiền</td>
			<td>Trạng thái</td>
			<td>Ghi chú</td>
		</tr>
		<tr style="background:#ccc;font-weight:bold;text-align:center;">
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>	
			<td></td>							
			<td></td>
			<?php foreach($list_product as $data) { ?>	
			<td style="background:#f9e912;width:100px;"><?php echo $data['cproducts']; ?></td>
			<?php } ?>
			<td></td>
			<td></td>
			<td></td>
		</tr>

		<?php
                  $i = 1; $list = get_order_all(); 
                  foreach($list as $data) {
					  $status = get_order_status_by_id($data['nid_order_status']);
                  ?>	
		<tr>
				<td> 
                     <?php echo $i ?>
                  </td>
				<td><?php echo $data['ccode']; ?></td>
                     <td><?php echo $data['cfullname']; ?></td>
                     <td><?php echo $data['cemail']; ?></td>
					 <td style="text-align:left;"><?php echo $data['nphone']; ?></td>
					 <td><?php echo $data['caddress']; ?></td>
					 <td><?php echo $data['ddate01']; ?></td>
					 <td><?php if($data['cmethod']==1) echo "Thanh toán khi nhận hàng"; else echo "<strong>Thanh toán chuyển khoản</strong>"; ?></td>
					 <?php foreach($list_product as $pro) { 
						$order_detail = get_order_detail_excel($data['nid'],$pro['nid']);
					 ?>	
					 <td style="text-align:center;"><?php if(isset($order_detail['nquantity'])) echo $order_detail['nquantity']; ?></td>
					<?php } ?>
					 <td><?php echo (number_format($data['ntotal'])); ?></td>
					 <td><?php echo $status['corder_status']; ?></td>
					 <td><?php echo $data['cnote']; ?></td>
		</tr>
		<?php $i++; } ?>

</table>
