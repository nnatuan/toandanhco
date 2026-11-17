
<?php 
	$this->load->view('header.php');
	$this->load->view('banner.php');
?>

	<!-- Box header -->
	<div class="box_header" style="margin-top:20px;">
		<h2><?php echo 'Hệ thống quản trị nội dung PB Shopping Online'; ?></h2>
		<!-- Tabs -->
		<ul class="tabs">
			<li>&nbsp;</li>
		</ul>
	</div>
	<!-- Box Content -->
	<div class="box_content" style="text-align:center;">	
    <div style="width:680px;float:left;">		
		<?php	
			switch ($event) 
			{
				case'view':
					$this->load->view('home_view/home_page');
					break;		
				default:
					echo $event .'invalid event view site. please contact with admin site for more informations';
			}
		?>
	</div>
    <div style="float:left;">
    	<img src="<?php echo base_url(); ?>images/logo.png" style="width:180px;"/>
    </div></div>
	<div style="clear:both;"></div>

<?php		
	$this->load->view('footer');
?>