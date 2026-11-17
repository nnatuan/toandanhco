	<header id="header" class="header">
         <div class="topbar-wrapper">
            <a class="navbar-toggle nav-link">
               <div class="lines">
                  <span></span>
                  <span></span>
                  <span></span>
               </div>
            </a>
            <a class="brand-logo" href="<?php echo base_url(); ?>index.php/do_home">
            <img src="<?php echo base_url(); ?>images/logo.png" class="full" alt="Vego Admin" />
            <img src="<?php echo base_url(); ?>images/logo.png" class="mobile" alt="Vego Admin" />
            </a>
            <div class="topbar-nav">
               <div class="topbar-link topbar-dropdown user-dropdown hidden-sm-down">
                  <a href="#" data-toggle="dropdown"><img src="<?php echo base_url(); ?>images/user.jpg" alt="user-avatar" class="user-avatar" /></a>
                  <div class="dropdown-menu animate fadeUp quick nop">
                     <div class="user-info">
                        <img src="<?php echo base_url(); ?>images/user.jpg" class="rounded-circle" alt="John Doe">
                        <div class="username"><?php $obj_user_row = Obj_get_user_datarow(Fget_userdata('session_nid_user')); echo $obj_user_row['cfirstname'] . ' ' . $obj_user_row['cmiddlename'] . ' ' . $obj_user_row['clastname']; ?></div>
                        <div class="useremail"><?php echo $obj_user_row['cemail']; ?></div>
                        <div class="clearfix"></div>
                     </div>

                     <div class="text-center p10"><a href="<?php echo base_url().'index.php/do_logout'?>" class="btn btn-block btn-labeled"><b><i class="ico-power i-16"></i></b>Logout</a></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="navbar" id="topnav">
            <div class="navbar-wrapper">
               <div id="navigation">
                  <ul class="navigation-menu">
					 <li class="has-submenu <?php if($menu_active=="config") echo 'active'; ?>">
                        <a href="#"><i class="ico-settings-1"></i>Hệ thống</a>
						<ul class="submenu">
							<li><a href="<?php echo base_url(); ?>index.php/do_config_listview">Cấu hình</a></li>
							<li><a href="<?php echo base_url(); ?>index.php/do_employee_listview">Người dùng</a></li>
							<li><a href="<?php echo base_url(); ?>index.php/do_module_listview">Module</a></li>
						</ul>
                     </li>
					 <li class="has-submenu <?php if($menu_active=="banner_images") echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>index.php/do_banner_images_listview"><i class="ico-picture"></i>Slider</a>
                     </li>
					 <li class="has-submenu <?php if($menu_active=="module") echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>index.php/do_module_listview"><i class="ico-puzzle"></i>Modules</a>
                     </li>
					<li class="has-submenu" <?php if($menu_active=="news") echo 'active'; ?>>
                        <a href="<?php echo base_url(); ?>index.php/do_news_listview"><i class="ico-newspaper"></i>Bài viết</a>  
					</li>
					 <li class="has-submenu" <?php if($menu_active=="article") echo 'active'; ?>>
                        <a href="<?php echo base_url(); ?>index.php/do_article_listview"><i class="ico-artist"></i>Bài viết khác</a>  
					</li>				
					<li class="has-submenu" <?php if($menu_active=="product") echo 'active'; ?>>
                        <a href="#"><i class="ico-cube-1"></i>Sản phẩm</a> 
						<ul class="submenu">
							<li><a href="<?php echo base_url(); ?>index.php/do_material_product_listview">Phân loại sản phẩm</a></li>
							<li><a href="<?php echo base_url(); ?>index.php/do_cat_product_listview">Nhóm sản phẩm</a></li>
							<li><a href="<?php echo base_url(); ?>index.php/do_product_listview">Sản phẩm</a></li>
						</ul>		
					</li>
                  </ul>
               </div>
            </div>
         </div>
      </header>
      <main class="app-content">