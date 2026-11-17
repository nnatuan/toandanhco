<?php $this->load->view('header'); ?>
<?php $this->load->view('modules/mod_header'); ?>
<?php $this->load->view('modules/mod_menu_center'); ?> 
<?php $this->load->view('modules/mod_left_news'); ?>

<div class="mod_right" style="padding-top: 0;">
   <div class="mod-show" style="margin-top: 10px;">
      <?php 
         $_nid_cat =0;
         if(isset($nid_cat))
         	$_nid_cat =  $nid_cat;
         $news_detail = get_first_news($nid_cat);
         
         if(!isset($news_detail['nid']))
         	echo "<h1> Not exits news </h1>";
         ?>
      <div class="news-cont">        
         <?php echo $news_detail[get_index_trans($langsite,'cshort_content')] ?>
      </div>
      <div>
      </div>
   </div>
</div>
<?php if(isset($news_detail['nid'])){?>
<style type="text/css">
	#<?php echo 'act'.$news_detail['nid'] ?>{font-weight:bold;}
</style>
<?php }?>
<script type="text/javascript">
   function set_page(_page)
   {
   	$.post( "<?php echo base_url().'home/set_page/'?>", { curr_page: _page})
   	  .done(function( data ) {
   		location.reload();
   	  });
   }
</script>
<?php $this->load->view('footer'); ?>