<div id="module-menu">
	<div style="float:left;padding-left:5px; padding-right:5px; padding-top:5px;">
	<a href="<?php echo base_url()?>index.php/do_home">
	<img src="<?php echo base_url() . 'tkb_images/tkb_icons/ok16-home.png';?> " alt="Home" />
	</a>
	</div>
	<ul id="menu" >
		<?php echo $menu; ?>
	</ul>
	<div class = "note" style="float:right; padding-top:5px; padding-right:5px; 11px; font-weight: bold; text-decoration: none;
	cursor: default;">
	<?php 
		echo $this->lang->line('lbl.Hello'); 
	?>
	<div>
	<?php 
		$tmp = base_url();
		$tmp = str_replace('/admin','',$tmp);
	?><a href="<?php echo $tmp ; ?>" target="_blank"> Trang chủ</a>
	</div>
	</div>	
	
</div>
