<?php 
   // Chỉ hiển thị thanh danh mục sản phẩm trên Trang Chủ, ẩn hoàn toàn trên tất cả các trang con
   if (isset($menu_top) && $menu_top === 'home'): 
?>
<!-- BALANCED MODERN CATEGORY SHOWCASE BAR (HOME ONLY) -->
<section class="td-category-showcase-section elementor-section elementor-section-boxed elementor-top-section">
   <div class="elementor-container elementor-column-gap-default">
      
      <div class="td-category-grid">
         
         <!-- 1. Đo bức xạ mặt trời -->
         <a class="td-cat-item" href="<?php echo base_url().'san-pham/thiet-bi-do-buc-xa-mat-troi-111'; ?>">
            <div class="td-cat-icon td-icon-orange">
               <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="5"></circle>
                  <line x1="12" y1="1" x2="12" y2="3"></line>
                  <line x1="12" y1="21" x2="12" y2="23"></line>
                  <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                  <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                  <line x1="1" y1="12" x2="3" y2="12"></line>
                  <line x1="21" y1="12" x2="23" y2="12"></line>
                  <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                  <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
               </svg>
            </div>
            <div class="td-cat-info">
               <div class="td-cat-name">ĐO BỨC XẠ MẶT TRỜI</div>
               <div class="td-cat-sub">Cảm biến & Thiết bị đo</div>
            </div>
         </a>

         <!-- 2. Lọc sóng hài AHF -->
         <a class="td-cat-item" href="<?php echo base_url(); ?>sanpham/tu-loc-song-hai-chu-dong-ahf-396">
            <div class="td-cat-icon td-icon-green">
               <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
               </svg>
            </div>
            <div class="td-cat-info">
               <div class="td-cat-name">LỌC SÓNG HÀI AHF</div>
               <div class="td-cat-sub">Nâng cao chất lượng điện</div>
            </div>
         </a>

         <!-- Dynamic Categories from Database -->
         <?php 
            $obj_sec = get_material_products();
            
            // Map category code / name to specific high quality SVG icons
            $svg_icons = array(
               'drill' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11a2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2h-4z"></path></svg>',
               'wrench' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>',
               'shield' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
               'plug' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6L6 18"></path><path d="m2 10 10-8"></path><path d="m12 22 10-8"></path><path d="M14 14l3.5 3.5a2.12 2.12 0 0 1-3 3L11 17"></path></svg>',
               'chip' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>',
               'link' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>',
               'cube' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>',
               'solar' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"></circle><path d="M12 2v2"></path><path d="M12 20v2"></path><path d="m4.93 4.93 1.41 1.41"></path><path d="m17.66 17.66 1.41 1.41"></path><path d="M2 12h2"></path><path d="M20 12h2"></path><path d="m6.34 17.66-1.41 1.41"></path><path d="m19.07 4.93-1.41 1.41"></path></svg>'
            );

            $icon_keys = array('drill', 'wrench', 'shield', 'plug', 'chip', 'link', 'cube', 'solar');
            $icon_colors = array('td-icon-red', 'td-icon-blue', 'td-icon-cyan', 'td-icon-green', 'td-icon-purple', 'td-icon-amber', 'td-icon-indigo', 'td-icon-teal');
            
            $i = 0;
            foreach ($obj_sec as $sec): 
               $k = $icon_keys[$i % count($icon_keys)];
               $c = $icon_colors[$i % count($icon_colors)];
               $current_svg = isset($svg_icons[$k]) ? $svg_icons[$k] : $svg_icons['wrench'];
               $i++;
               $link = !empty($sec['clink']) ? $sec['clink'] : base_url() . 'san-pham';
         ?>
            <a class="td-cat-item" href="<?php echo $link; ?>">
               <div class="td-cat-icon <?php echo $c; ?>">
                  <?php echo $current_svg; ?>
               </div>
               <div class="td-cat-info">
                  <div class="td-cat-name"><?php echo htmlspecialchars($sec['cmaterial_products']); ?></div>
                  <div class="td-cat-sub">Thiết bị chính hãng</div>
               </div>
            </a>
         <?php endforeach; ?>

      </div>

   </div>
</section>
<?php endif; ?>
