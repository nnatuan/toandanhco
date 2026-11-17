<?php 
	$this->load->view('header');
	//$this->load->view('header_end');
	//$this->load->view('modules/mod_header'); 
?>

<body class="background">
      <div class="auth-container">
         <div class="center-block">
            <div class="auth-module">
               <div class="form text-center">
                  <img src="<?php echo base_url(); ?>images/logo.png" alt="Leaf Admin" style="height:auto;" />
                  <h3 style="text-transform:uppercase;">Content Management System</h3>
                  <form class="form-horizontal" action="<?php echo $link_page; ?>" method="post" name="form_main">
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" name="txt_user_name"  />
                     </div>
                     <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="txt_password" />
                     </div>
					 <div class="text-danger-800"><?php echo $error_message; ?></div>
                     <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-rounded" name="btn_login" onclick="js_SetSubmitButtonClick(this.form, this.name);" value="<?php echo $btn_login ?>">Sign In</button>
                     </div>
					 <input type="hidden" name="hidden_button"  value = "" />
                  </form>
               </div> 
            </div>
         </div>
      </div>
<script src="<?php echo base_url(); ?>js/js.js"></script>	
<?php	
	//$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>
