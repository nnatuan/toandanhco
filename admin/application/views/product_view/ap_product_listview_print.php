<?php
		$this->load->view('print_header.php')
?>
<div id="container_print">
	<h1 style="text-align:center;text-transform:uppercase;">
		<?php echo $lbl_form_title; ?>
	</h1>
	<table cellpadding="0" cellspacing="1px">
		<thead>
			<tr>
				<th width="150px"> 										
					<?php echo $lbl_nid; ?>				</th>
				<th width="200px"> 
					<?php echo $lbl_title; ?>			</th>
				<th width="200px"> 
					<?php echo $lbl_cat; ?>			</th>
				<th width="200px"> 
					<?php echo $lbl_status; ?>			</th>
				<th> 
					<?php echo $lbl_user01; ?>				</th>
				<th width="100px"> 
					<?php echo $lbl_date01; ?>				</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach($data_view as $news_listview):
			?>
			<tr>
				<td><?php echo Fview_text($news_listview['nid'] ); ?>  </td>
				<td><?php echo Fview_text($news_listview['ctitle']) ; ?> </td>
				<td><?php echo Fview_text($news_listview['cnid_cat']); ?></td>
				<td><?php echo Fview_text($news_listview['nstatus']) ; ?> </td>
				<td><?php echo Fview_text( $news_listview['niduser01']) ; ?></td>
				<td style="text-align:center"><?php echo Fview_date($news_listview['ddate01']) ; ?></td>
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