	<section class="slide-banner">
		<div class="container">
			<div class="row">
			<div class="col-md-12 pdr0">
			 <div class="flexslider">
				<div class="slides">
					<?php 
					 $obj_data= get_banner_list();
					 foreach($obj_data as $data){
					 ?>
				   <div class="slide">
					  <img src="<?php echo base_url().'upload/banner/'.$data['cimage'] ?>" alt="" data-cover-image="true">
					  <div class="theme-back"></div>
				   </div>
				   <?php } ?>	
				</div>
				<div class="flex-custom-navigation"><a href="#" class="flex-prev"><i class="fa fa-angle-left" aria-hidden="true"></i> </a><a href="#" class="flex-next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
			 </div>
			</div>
			<div class="col-md-4">
				<div style="width:100%;height:240px;overflow:hidden;">
					<img src="<?php echo base_url(); ?>images/banner-right.png" alt="" data-cover-image="true">
				</div>
			</div>
			</div>
		</div>
      </section>