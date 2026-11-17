<?php 
	$this->load->view('header');
	$this->load->view('banner');
	$this->load->view('content_style');
?>
<?php	
	
	switch ($event) 
	{
		case 'view':
			$this->load->view('background_view/tkb_background_listview');
			break;			
		case 'add':
			$this->load->view('background_view/tkb_background');
			break;
		case 'edit': 
			$this->load->view('background_view/tkb_background');
			break;
		case 'update_add_trans':
			$this->load->view('background_view/tkb_background_trans');
			break;
		case 'edit_trans': 
			$this->load->view('background_view/tkb_background_trans');
			break;			
		case 'update_add': 
			$this->load->view('background_view/tkb_background');
			break;		
		case 'update_edit': 
			$this->load->view('background_view/tkb_background');
			break;
		case 'update_edit_trans': 
			$this->load->view('background_view/tkb_background_trans');
			break;
		case 'list_trans': 
			$this->load->view('background_view/tkb_trans_listview');
			break;
			

		default:
			echo $event . 'invalid event view site. please cotact with admin site for more informations';
	}
?>
<?php		
	$this->load->view('content_style_end');	
	$this->load->view('footer');
?>