<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   ?> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
.bg-overlay {
    background-color: rgba(0,0,0,.3);
}
.news-bg, .bg-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    -webkit-transition: all .4s;
    -o-transition: all .4s;
    transition: all .4s;
    width: 100%;
}
.news-bg {
    z-index: 1;
    overflow: hidden;
}
.news-img {
	background-size: cover;
    background-position: 50%;
    z-index: 1;
    min-height: 350px;	
    transition-duration: 1500ms;	
	-webkit-transform: scale(1.2);
    -ms-transform: scale(1.2);
    transform: scale(1.2);
}
a.news-href {
    display: block;
    min-height: 350px;
	width: 100%;
    position: relative;
    border-radius: 3px;
    overflow: hidden;	
}
.news-href:hover .news-img {
    -webkit-transform: scale(1);
    -ms-transform: scale(1);
    transform: scale(1);
}
.news-content {
    position:absolute;
	bottom:35px;
	left:35px;
    z-index: 9;	
}
.news-content h3 {
	color:#fff;
	font-size: 24px;
}
.news-content span {
	color:#fff;
	background-color:#ff7029;
	padding: 5px 20px;
}
.news-content span:hover {
    color: #ff7029;
    background-color:#fff;
}
.news-item.home {
	min-height: 350px;
}
.mgb30 {
	margin-bottom:30px !important;
}
.content {padding:30px 0;}
.post-date {
	position: absolute;
    right: 0;
    top: 20px;
    padding: 5px 10px;
    background: rgb(51 51 51 / 50%);
    color: #fff;
    z-index: 1;
    font-style: italic;
    font-size: 14px;
}
</style>   
<div class="container content">
						<div class="row">
							<?php $i=1;
								$cat_link= base_url().'tin-tuc/';
								foreach($obj_news_list as $data) {
								?>
							<div class="col-md-4 news-item home mgb30">
						<a class="news-href" href="<?php echo base_url().'tin-tuc/'.$data['ccode']; ?>">
							<div class="news-bg">
								<div class="news-img" style="background-image: url('<?php echo base_url().'upload/image_article/'.$data['cimage_thumb'] ?>');"></div>
								<div class="bg-overlay"></div>
							</div>
							<div class="news-content">
								<h3 class="blog_title"><?php echo $data['ctitle']; ?></h3>
								<div><span>Xem thêm →</span></div>
							</div>
							<div class="post-date">
								Ngày đăng: <?php if($data['cpost_date']!="") echo $data['cpost_date']; else { $pieces = explode("-", $data['ddate02']); echo $pieces[2].'/'.$pieces[1].'/'.$pieces[0]; } ?>
							</div>
						</a> 
					 </div>
							<?php $i++;} ?>
						</div>
						
						<div class="pagination clearfix">
					   <?php 	
						  if($total_page >1){
							for($i=1; $i<=$total_page; $i++){
								if($i != $cur_page){
									?>
					   <a href="<?php echo base_url().'/tin-tuc/trang-'.$i ?>">
						  <?php echo $i?>
					   </a>
					   <?php }else{ ?>
					   <strong><?php echo $i?> </strong>
					   <?php }
						  } }?>
					</div>
					</div>	
<div class="h60"></div>		
<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>