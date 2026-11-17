<?php 
	$this->load->view('header');
	//$this->load->view('banner');
	//$this->load->view('content_style');
?>
<div class="inner">
<?php	
	
	switch ($event) 
	{
		case 'change_password':
		{
			$this->load->view('login_view/change_pasword');
			break;
		}	
		default:
		{
			// your content at here
			$this->load->view('login_view/login');
			
		}	
	}
?>

<?php	
	//$this->load->view('content_style_end');	
	$this->load->view('footer');
?>
