<?php
		$this->load->view('excel_header1.php')
?>
<h1 style="text-align:center"><?php echo $lbl_form_title; ?></h1>
<table width="100%" border="1" >
	<thead>
		<tr>
			<th width="150px"> 										
				<?php echo $lbl_ccode ?>			</th>
			<th width="150px"> 
				<?php echo $lbl_cuserid ?>			</th>
			<th width="150px"> 
				<?php echo $lbl_clastname; ?>		</th>
			<th> 
				<?php echo $lbl_cemail; ?>			</th>
			<th width="150px"> 
				<?php echo $lbl_cnote; ?>			</th>			
		</tr>
	</thead>
	<tbody>
		<?php
		foreach($data_report as $data):
		?>
		<tr>
			<td><?php echo Fview_text($data['ccode'] ); ?>  </td>
			<td><?php echo Fview_text($data['cuserid']) ; ?> </td>
			<td><?php echo Fview_text($data['clastname']) ; ?></td>
			<td><?php echo Fview_text($data['cemail']) ; ?> </td>
			<td><?php echo Fview_text($data['cnote']) ; ?> </td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
