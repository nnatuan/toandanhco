<?php 
	$this->load->view('header');
	$this->load->view('banner');
	$this->load->view('content_style');
?>
<?php	
	
	switch ($event) 
	{
		case 'view':
			$this->load->view('support_online_view/support_online_listview');
			break;		
		case 'add':
			$this->load->view('support_online_view/support_online');
			break;
		case 'edit': 
			$this->load->view('support_online_view/support_online');
			break;
		
		case 'update_add': 
			$this->load->view('support_online_view/support_online');
			break;		
		case 'update_edit': 
			$this->load->view('support_online_view/support_online');
			break;

		default:
			echo $event . 'invalid event view site. please cotact with admin site for more informations';
	}
?>
<?php	
	$this->load->view('content_style_end');	
	$this->load->view('footer');
?>