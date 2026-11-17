<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/tabs.css" />
<style type="text/css">
.box_content{padding-bottom:20px;}
</style>
<script type="text/javascript">
function tkb_getXmlHttpRequestObject() 
{	
	if (window.XMLHttpRequest) 
	{ // Mozilla, Safari,...
		return new XMLHttpRequest();		
	} 
	else if (window.ActiveXObject) 
	{ // IE
		try
		{
			return new ActiveXObject("Msxml2.XMLHTTP");
		} 
		catch (e) 
		{
			try 
			{
				return new ActiveXObject("Microsoft.XMLHTTP");
			} 
			catch (e)
			{
				alert('Cannot create XMLHTTP instance');
				return false;
			}
		}
	}

}

function js_del_img(p_nid)
{
	if(confirm('Are you sure you want to delete this images ? This action can not undo !'))
	{ 
		
		var obj_ajax 				= tkb_getXmlHttpRequestObject();
		str_g_hidden_base_url 		= '<?php echo base_url()."index.php/"?>';
		str_url						= str_g_hidden_base_url + 'do_news/del_img/'+p_nid;
		document.getElementById('div_img_thumb').innerHTML ='Please wait....';
		if (obj_ajax.readyState == 4 || obj_ajax.readyState  == 0) 
		{
			obj_ajax.open("POST", str_url, true);
			obj_ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			obj_ajax.onreadystatechange = function()
			{
				if(obj_ajax.readyState == 4 && obj_ajax.status == 200)
				{
					 document.location.href =str_g_hidden_base_url + 'do_news/f_edit/'+p_nid;
				}
			}
			
		}
		obj_ajax.send(null);
	}	
}
</script>
<div id="ContentMessage">
	<div id="NoteContentMessage">
		<?php echo $get_message_notnull ?>
	</div>
	
	<div id="ErrorContentMessage">
		<?php echo $error_ctitle; ?>
		<?php echo $error_sec; ?>
		<?php echo $error_cat; ?>
		<?php echo $error_ccontent; ?>
		<?php echo $error_cshort_content; ?>
	</div>
</div>

<ul class="tabs" >
   <li><a href="#tab1">Vietnamese</a></li>
   <li><a href="#tab2">English</a></li>
</ul>
		
<form  name='form_main' id="form_main" method="post" action="<?php echo $link_page; ?>" enctype="multipart/form-data">	
<div id="SiteContent_main">			
	
	
	<div id="EditContent">
	   <div class="tab_container">
            <div id="tab1" class="tab_content">
		<table class="EditStyle01" >
			<tbody>								
		
				<tr>
						<td class="key" width="150" align="right">
						<?php echo $lbl_title; ?><?php echo $get_icon_notnull; ?>					</td>
						<td width="">
							<input style="width:350px;" type="text" width="" name="txt_ctitle" value="<?php echo $txt_ctitle; ?>">					</td>
				</tr>
                
				<tr>
						<td class="key" width="150" align="right">Code URL</td>
						<td width="">
							<input style="width:350px;" type="text" width="" name="ccode" value="<?php echo $ccode; ?>">					</td>
				</tr>
				<tr>
					<td class="key" width="150" align="right">
						<?php echo $lbl_content; ?><?php echo $get_icon_notnull; ?>					</td>
					  <td colspan="2" style="width:730px;height:500px;">
					  <textarea cols="80" id="editor1" name="eng_ccontent" rows="10"><?php echo $eng_ccontent; ?></textarea>
				  	<?php /*<textarea cols="80" id="editor1" name="txt_ccontent" rows="10"><?php echo $txt_ccontent; ?></textarea>*/ ?></td>
				</tr>
			<tbody>				
		</table>
		
		 </div>
				
				<?php /*
               <div id="tab2" class="tab_content" style="display:none;">
		
				<table class="EditStyle01" >
			<tbody>								

				<tr>
						<td class="key" width="150" align="right">
						<?php echo $lbl_title; ?><?php echo $get_icon_notnull; ?>					</td>
						<td width="">
							<input style="width:350px;" type="text" width="" name="eng_ctitle" value="<?php echo $eng_ctitle; ?>">					</td>
				</tr>
				
				<tr>
					<td class="key" width="150" align="right">
						<?php echo $lbl_content; ?><?php echo $get_icon_notnull; ?>					</td>
					  <td colspan="2" style="width:730px;height:500px;">
				  	<textarea cols="80" id="editor2" name="eng_ccontent" rows="10"><?php echo $eng_ccontent; ?></textarea></td>
				</tr>
				
			<tbody>				
		</table>
		
		</div> */ ?>
		<div style="margin-bottom:50px;margin-left:180px;">
			<input type="button" name="btn_submit" style="width:80px;" value ="<?php echo $btn_update; ?>" 
							onclick ="js_SetSubmitButtonClick(this.form, this.name);" class="button"/>
													   
						<input name="btn_cancel" style="width:80px;" type="button" 
							   value = "<?php echo $btn_cancel; ?>"
							   onclick="location.href='<?php echo $link_cancel; ?> '" class="button"/>	
		</div>
	</div>
	<input name="hidden_nid" type="hidden" value = "<?php echo $nid; ?>"  />
	<input name="hidden_event" type="hidden" value = "<?php echo $event; ?>"  />
	<input type="hidden" name="hidden_button_click"  value = "" />	
	<input type="hidden" name="hidden_image_old"  value = "<?php echo $txt_cthumb_img; ?>" />	
</div>
</form>

<!-- BAT BUOC CAC FORM NHAP LIEU DEU PHAI DUNG SCRIPT NAY. -->
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
<script type="text/javascript" >
function js_VerifyBeforeSubmit (obj_form, btn_name) 
	{
		if (document.form_main.txt_user_name.value=='')
			{
				document.form_main.txt_ccode.focus();
				return false;
			}
		if (document.form_main.txt_password.value=='')
			{
				document.form_main.txt_password.focus();
				return false;
			}
		return false;		
	}		

/*-------------------------------------------------------------------------------------
* Tokaban Corp 1509
* Package : TKB PHP SYSTEM CODE
*--------------------------------------------------------------------------------------
* huanlv77 - 1509/06/28.
*--------------------------------------------------------------------------------------
* Ham submit form co su dung su kien hidden de truyen bien flag dieu khien.
* Nhiem vu gan gia tri cho bien hidden dieu khien nut nhan submit cua form.
* Dung de controller nhan biet nut submit nao duoc nhan tren giao dien de xu ly tren server script.
* Ham nay duoc dung chung cho toan bo ung dung.
* Nen xay dung thanh chuan de tai su dung cho nhung du an khac.
*--------------------------------------------------------------------------------------*/
function js_SetSubmitButtonClick(obj_form, btn_name) 
	{
		obj_form.hidden_button_click.value = btn_name;
		obj_form.submit();		
	}

</script>