<?php
	$this->load->view('excel_header1');
?>
<h1 style="text-align:center;font-size:16px;">DANH SÁCH ĐƠN HÀNG</h1>
<table width="100%" border="1" >
	<thead>  
		<tr>
			<th width="50px">#</th>
			<th>Mã đơn hàng</th>
			<th>Khách hàng</th>
			<th>Email</th>
			<th>Điện thoại</th>
			<th>Địa chỉ</th>	
		</tr>
	</thead>
	<tbody>
		<?php
                  $i = 1; $list = get_order_all(); 
                  foreach($list as $data):
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
		</tr>
		<?php $i++; endforeach; ?>
	</tbody>
</table>
