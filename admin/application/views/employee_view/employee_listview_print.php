<?php
		$this->load->view('print_header.php')
?>
<div id="container_print">
	<h1 style="text-align:center;text-transform:uppercase;">
		<?php echo $lbl_form_title; ?>
	</h1>
	<table width="100%" border="0" cellpadding="0" cellspacing="1px">
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
			<td><?php echo Fview_text($data['cemail']) ; ?></td>
			<td><?php echo Fview_text($data['cnote']) ; ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
	<br/>
	<input type="button" onclick="window.print();" name="btn_print" value="In báo cáo" />
	<?php
			$this->load->view('header_end.php')
	?>
</div>