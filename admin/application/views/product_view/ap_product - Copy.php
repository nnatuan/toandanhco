<style type="text/css">
   .box_content{padding-bottom:20px;}
   textarea{height: 100px;
   width: 392px;margin-bottom:0;}
</style>
<div id="ContentMessage">
   <div id="NoteContentMessage">
      <?php echo $get_message_notnull ?>
   </div>
   <div id="ErrorContentMessage">
      <?php echo $lbl_error_msg; ?>
   </div>
</div>
<form  name='form_main' id="form_main" method="post" action="<?php echo $link_page; ?>" enctype="multipart/form-data">
   <div id="SiteContent_main">
   <div id="EditContent">
      <div class="tab_container">
         <table class="EditStyle01" >
            <tbody>
               <tr>
                  <td class="key" style="width:150px">
                     <?php echo 'Code'; ?><?php echo $get_icon_notnull; ?>					
                  </td>
                  <td style="width:210px">
                     <input style="width:200px;" type="text" width="" name="txt_ccode" id="txt_ccode" value="<?php echo $txt_ccode; ?>">					
                  </td>
                  <td class="key" style="width:150px"><?php echo $lbl_nid_metarial_product; ?><?php echo $get_icon_notnull; ?></td>
                  <td>
                     <?php 
                        $url = base_url().'index.php/do_product/load_cbo_cat_product/'; 
                        if($cbo_nid_cat_products != '')
                        	$url .= $nid.'/';
                        else 
                        	$url .= '0/';
                        ?>
                     <select name="cbo_nid_material_products" style="width:200px" id="cbo_nid_material_products" >
                        <option value=""><?php echo $lbl_choose_metarial_product ?></option>
                        <?php foreach($material_product_view as $data): ?>	
                        <option <?php if($data['nid'] == $cbo_nid_material_products){echo 'selected="selected"';} ?> value="<?php echo $data['nid'] ?>"><?php echo $data['cmaterial_products'] ?></option>
                        <?php endforeach; ?>
                     </select>
                  </td>
               </tr>
               <tr>
                  <td class="key">
                     <?php echo 'Tiêu đề'; ?><?php echo $get_icon_notnull; ?>					
                  </td>
                  <td>
                     <input style="width:200px;" type="text" width="" name="txt_cproducts" value="<?php echo $txt_cproducts; ?>" onkeyup="document.getElementById('txt_ccode').value = locdau(this.value);">					
                  </td>
                  <td class="key">
                     <?php echo $lbl_nid_cat_product; ?><?php echo $get_icon_notnull; ?>
                  </td>
                  <td>
                     <div id="cnid_cat_products">
                        <select id="cbo_nid_cat_products" name="cbo_nid_cat_products" style="width:200px;">
                           <option></option>
                        </select>
                     </div>
                  </td>
               </tr>
               <tr>
                  <td class="key"><?php echo 'Chỉ mục'; ?></td>
                  <td><input style="width:200px;" type="text" maxlength="4" name="txt_cindex" value="<?php echo $txt_cindex; ?>"/>	 	</td>
				  <td class="key">
                     		
                  </td>
                   <td width="400"></td>				
               </tr> 
            <tbody>				
         </table>
         <table class="EditStyle01">
			<tr>
                  
                  <td class="key">
                     <?php echo 'Giá'; ?><?php echo $get_icon_notnull; ?>					
                  </td>
                  <td>
                     <input style="width:400px;" type="text" width="" name="fprice" value="<?php echo $txt_fprice; ?>">					
                  </td>
               </tr>
			<tr>
                  
                  <td class="key">
                     <?php echo 'Khuyến mãi'; ?><?php echo $get_icon_notnull; ?>					
                  </td>
                  <td>
                     <input style="width:400px;" type="text" width="" name="txt_fprice_sale" value="<?php echo $txt_fprice_sale; ?>">					
                  </td>
               </tr>
			<tr>
				<td class="key" style="width:150px"><?php echo 'Tag'; ?></td>
				<td ><input style="width:400px;" type="text" name="txt_ctag" value="<?php echo $txt_ctag; ?>"/>	 	</td>
            </tr>
			<tr>
               <td class="key" style="width:150px"><?php echo 'Chứng nhận'; ?></td>
               <td style="height:200px;">
                  <textarea cols="80" id="editor3" name="txt_cnote" rows="10"><?php echo $txt_cnote; ?></textarea>
               </td>
            </tr>
            <tr>
               <td class="key" style="width:150px"><?php echo 'Mô tả'; ?></td>
               <td style="height:200px;">
                  <textarea cols="80" id="editor2" name="txt_cdescription" rows="10"><?php echo $txt_cdescription; ?></textarea>
               </td>
            </tr>
            <tr>
               <td class="key" style="width:150px"><?php echo 'Chi tiết'; ?></td>
               <td style="height:400px;">
                  <textarea cols="80" id="editor1" name="txt_cdetail" rows="10"><?php echo $txt_cdetail; ?></textarea>
               </td>
            </tr>
            <tr style="height:200px;">
               <td class="key" style="width:150px"><?php echo $lbl_cimage; ?><?php echo $get_icon_notnull; ?></td>
               <td>
                  <div style="position:relative">
                     <input name="txt_cimage" type="file" id="txt_cimage" value ="" size="25" style="width:400px;"/>
                     <p style="color:#FF0000"><b>Chú ý</b>: Chỉ upload các hình có định dạng:  jpg và có kích thước chuẩn là rộng: 500px, cao: 500px </p>
                     <?php if($txt_cimage != ''): ?>
                     <img  width="160" style="position:absolute; top:50px; right:-15px;" src="<?php echo $fr_img.'upload/images_product/full_images/'.$txt_cimage; ?>"/>
                     <?php endif; ?>
                  </div>
               </td>
            </tr>
			<tr style="height:200px;">
               <td class="key" style="width:150px">IMG Certifications<?php echo $get_icon_notnull; ?></td>
               <td>
                  <div style="position:relative">
                     <input name="cimage_cer" type="file" id="cimage_cer" value ="" size="25" style="width:400px;"/>
                     <p style="color:#FF0000"><b>Chú ý</b>: Chỉ upload các hình có định dạng:  jpg  </p>
                     <?php if($cimage_cer != ''): ?>
                     <img  width="160" style="position:absolute; top:50px; right:-15px;" src="<?php echo $fr_img.'upload/images_product/cer_images/'.$cimage_cer; ?>"/>
                     <?php endif; ?>
                  </div>
               </td>
            </tr>
         </table>
         <div style="height:20px;"></div>
      </div>
      <input name="hidden_nid" type="hidden" value = "<?php echo $nid; ?>"  />
      <input name="hidden_event" type="hidden" value = "<?php echo $event; ?>"  />
      <input name="hidden_image_old" type="hidden" value = "<?php echo $txt_cimage; ?>"  />
      <input name="hidden_image_old_resize" type="hidden" value = "<?php echo $txt_cimage_resize; ?>"  />
      <input type="hidden" name="hidden_button_click"  value = "" />	
	  <input name="hidden_image_old_cer" type="hidden" value = "<?php echo $cimage_cer; ?>"  />
   </div>
   <div style="clear:both;height:20px;"></div>
   <div style="padding-top:20px;">
      <input type="button" name="btn_submit" style="width:80px;" value ="<?php echo $btn_update; ?>" 
         onclick ="js_SetSubmitButtonClick(this.form, this.name);" class="button"/>
      <input name="btn_cancel" style="width:80px;" type="button" 
         value = "<?php echo $btn_cancel; ?>"
         onclick="location.href='<?php echo $link_cancel; ?> '" class="button"/>					
   </div>
</form>
<!-- BAT BUOC CAC FORM NHAP LIEU DEU PHAI DUNG SCRIPT NAY. -->
<script type="text/javascript" >
   function js_SetSubmitButtonClick(obj_form, btn_name) 
   	{
   		obj_form.hidden_button_click.value = btn_name;
   		obj_form.submit();		
   	}	
   $('#cbo_nid_material_products').change(function() {
   	_nid_cat =this.value;
   	$("#cnid_cat_products").html('loading...');
    	$.post("<?php echo base_url().'index.php/do_product/ajax_get_product_cat/'?>", { nid_cat: _nid_cat},
     	function(data) {
   		$("#cnid_cat_products").html(data);
     	});
   });
   load_cat();
   function load_cat()
   {
   	_nid_sec ='<?php echo $cbo_nid_material_products?>';
   	_nid_cat='<?php echo $cbo_nid_cat_products?>';
   	if(_nid_cat !='')
   	{
   		$.post("<?php echo base_url().'index.php/do_product/ajax_get_product_cat_select/'?>", { nid_cat: _nid_sec,nid_cat_select:_nid_cat},
   		function(data) {
   		
   			$("#cnid_cat_products").html(data);
   		});
   	}
   }
</script>
<script type="text/javascript">
   $(document).ready(function() {
   	//Default Action
   	$(".tab_content").hide(); //Hide all content
   	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
   	$(".tab_content:first").show(); //Show first tab content
   	//On Click Event
   	$("ul.tabs li").click(function() {
   		$("ul.tabs li").removeClass("active"); //Remove any "active" class
   		$(this).addClass("active"); //Add "active" class to selected tab
   		$(".tab_content").hide(); //Hide all tab content
   		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
   		$(activeTab).fadeIn(); //Fade in the active content
   		return false;
   	});
   });
</script>