<?php 
$nid = $_POST['nid']; 
$list = get_sub_menu_by_cat($nid);
if(count($list)>0) { ?>
<p>Sub menu</p>
<select class="form-control" id="nid_sub_menu" name="nid_sub_menu">
<?php 
	foreach($list as $data){
?>
<option value="<?php echo $data['nid']; ?>"><?php echo $data['cname']; ?></option>
<?php } ?>
</select>
<div style="height:15px;"></div>
<?php } ?>