<!-- Start: Header -->	
<div id="header">
	<!-- Reapting background to stop cut off on the right hand side of the header -->			
	<div class="repeating_bg"></div>
	<div class="inner">
	<!-- Company/Application Logo -->				
		<h1 id="logo"><?php echo $this->lang->line('lbl.Application.Name') ?></h1>				
		<!-- User Control Panel -->				
		<div id="control">					
			<ul>
			<!-- User info -->
				<li><p>Signed in as <a href="<?php echo base_url().'index.php/do_home' ?>"><?php echo Fget_userdata('session_user_full_name'); ?></a></p></li>
				<!-- Important : List items must remain on the same line due to browser bugs -->						
				<li class="control_button first">
					<a href="#"  onclick="openbox('box','CONFIRM LOGOUT')">
						<?php echo $this->lang->line('lbl.0000.Exit'); ?>
					</a>
				</li>
				<li class="control_button last">
					<?php 
						$tmp = base_url();
						$tmp = str_replace('/admin','',$tmp);
					?>
					<a target="_blank" href="<?php echo $tmp ; ?>">Home page</a>
				</li>
			</ul>				
		</div>	
		<!-- Main Navigation -->
		<div id="menu">				
			<ul id="ddmenu">					
				<li class="first-child <?php if($menu_active == 'home') echo 'current'; ?>"><a href="<?php echo base_url().'index.php/do_home' ?>">Dashboard</a></li>
				
			</ul>				
			<!-- Sub Navigation -->				
		</div>
	</div>
</div>
<!-- End: Header -->
<div class="inner">