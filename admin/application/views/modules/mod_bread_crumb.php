	<?php $user = Obj_get_user_datarow(Fget_userdata('session_nid_user'));
	$chinhanh = get_chi_nhanh_by_id($user['nid_department']); ?>
	<!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h5 class="text-primary" style="margin:0;">
						Xin chào: <strong><?php echo $user['cname']; ?></strong>
						<?php if($user['cisadmin']!=3) { ?>
						- <strong><?php echo $chinhanh['cname']; ?></strong>
						<?php } ?>
					</h5> 
				</div>
                <div class="col-md-7 align-self-center hide">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->