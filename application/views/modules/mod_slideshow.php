<?php
   $obj_data = get_banner_list();
   if (empty($obj_data)) {
       // Default slides if database has no active banners
       $obj_data = array(
           array(
               'cimage' => '1_20240521031604.png.webp',
               'cbanner_images' => 'THIẾT BỊ ĐIỆN CÔNG NGHIỆP & TỰ ĐỘNG HÓA',
               'cnote' => 'Giải pháp toàn diện & thiết bị chính hãng từ các thương hiệu hàng đầu thế giới',
               'clink' => base_url() . 'san-pham/thiet-bi-dien-va-tu-dong-hoa-23'
           ),
           array(
               'cimage' => '2_20240521031610.png.webp',
               'cbanner_images' => 'THIẾT BỊ ĐO BỨC XẠ MẶT TRỜI CHUYÊN DỤNG',
               'cnote' => 'Cảm biến và giải pháp đo đạc chính xác phục vụ dự án năng lượng tái tạo',
               'clink' => base_url() . 'san-pham/thiet-bi-do-buc-xa-mat-troi-111'
           ),
           array(
               'cimage' => '3_20240521031615.png.webp',
               'cbanner_images' => 'TỦ LỌC SÓNG HÀI CHỦ ĐỘNG AHF',
               'cnote' => 'Nâng cao chất lượng điện năng & bảo vệ tối ưu hệ thống điện công nghiệp',
               'clink' => base_url() . 'sanpham/tu-loc-song-hai-chu-dong-ahf-396'
           )
       );
   }
   $total_slides = count($obj_data);

   // Fallback presets for corporate look if local file is missing
   $fallback_presets = array(
       0 => array(
           'title' => 'GIẢI PHÁP ĐIỆN CÔNG NGHIỆP & TỰ ĐỘNG HÓA',
           'subtitle' => 'CÔNG TY TNHH TM DV KT TOÀN DANH • UY TÍN TỪ NĂM 2014',
           'desc' => 'Chuyên cung cấp thiết bị và tích hợp giải pháp kỹ thuật cao cho các nhà máy, tòa nhà và dự án trọng điểm.',
           'btn_text' => 'Xem sản phẩm',
           'btn_link' => base_url() . 'san-pham/thiet-bi-dien-va-tu-dong-hoa-23'
       ),
       1 => array(
           'title' => 'THIẾT BỊ ĐO BỨC XẠ NĂNG LƯỢNG MẶT TRỜI',
           'subtitle' => 'NĂNG LƯỢNG TÁI TẠO • TIÊU CHUẨN QUỐC TẾ',
           'desc' => 'Đại lý phân phối cảm biến bức xạ, trạm quan trắc thời tiết và giải pháp giám sát điện mặt trời chuyên nghiệp.',
           'btn_text' => 'Khám phá ngay',
           'btn_link' => base_url() . 'san-pham/thiet-bi-do-buc-xa-mat-troi-111'
       ),
       2 => array(
           'title' => 'HỆ THỐNG TỦ LỌC SÓNG HÀI CHỦ ĐỘNG AHF',
           'subtitle' => 'CHẤT LƯỢNG ĐIỆN NĂNG • TIẾT KIỆM NĂNG LƯỢNG',
           'desc' => 'Giải pháp khử sóng hài tối ưu, nâng cao hệ số công suất và bảo vệ tuổi thọ các thiết bị điện nhạy cảm.',
           'btn_text' => 'Tư vấn giải pháp',
           'btn_link' => base_url() . 'sanpham/tu-loc-song-hai-chu-dong-ahf-396'
       ),
       3 => array(
           'title' => 'THIẾT BỊ CHÍNH HÃNG MILWAUKEE & TONE',
           'subtitle' => 'DỤNG CỤ CẦM TAY & CƠ KHÍ CHUYÊN NGHIỆP',
           'desc' => 'Phân phối máy móc, công cụ dùng pin M12/M18 và dụng cụ cơ khí chất lượng cao xuất xứ Mỹ và Nhật Bản.',
           'btn_text' => 'Xem chi tiết',
           'btn_link' => base_url() . 'thiet-bi-milwaukee'
       ),
       4 => array(
           'title' => 'THIẾT BỊ ĐIỆN SCHNEIDER & PHỤ KIỆN ERICO',
           'subtitle' => 'ĐẤU NỐI & BẢO VỆ CHUYÊN NGHIỆP',
           'desc' => 'Thiết bị đóng cắt, biến dòng Robben, dây đồng bện và hệ thống tiếp địa chống sét toàn diện.',
           'btn_text' => 'Liên hệ tư vấn',
           'btn_link' => base_url() . 'lien-he'
       )
   );
?>

<!-- MODERN FULL-WIDTH CORPORATE SLIDER -->
<div class="td-hero-slider-container">
   <div class="td-hero-slider-wrapper">

      <!-- Slides -->
      <?php foreach ($obj_data as $idx => $data): ?>
         <?php 
            $img_url = base_url() . 'upload/banner/' . $data['cimage'];
            $slide_link = !empty($data['clink']) && $data['clink'] != '#' ? $data['clink'] : base_url() . 'gioi-thieu';
            $preset = isset($fallback_presets[$idx % count($fallback_presets)]) ? $fallback_presets[$idx % count($fallback_presets)] : $fallback_presets[0];
            $raw_title = !empty($data['cbanner_images']) ? trim($data['cbanner_images']) : '';
            if (empty($raw_title) || preg_match('/^slide\s*\d*$/i', $raw_title) || $raw_title == '#') {
               $display_title = $preset['title'];
            } else {
               $display_title = $raw_title;
            }
         ?>
         <div class="td-hero-slide <?php echo $idx === 0 ? 'active' : ''; ?>" data-slide-index="<?php echo $idx; ?>">
            
            <!-- Real image (if exists) -->
            <img 
               class="td-hero-img" 
               src="<?php echo $img_url; ?>" 
               alt="<?php echo htmlspecialchars($display_title); ?>"
               onerror="this.style.display='none';"
            />

            <!-- Clean Corporate Overlay & Content (Always visible over slide!) -->
            <div class="td-hero-overlay"></div>
            <div class="wgl-container" style="position:relative; z-index:2; height:100%; display:flex; align-items:center;">
               <div class="td-hero-text-content">
                  <span class="td-hero-badge"><?php echo htmlspecialchars($preset['subtitle']); ?></span>
                  <h1 class="td-hero-title"><?php echo htmlspecialchars($display_title); ?></h1>
                  <p class="td-hero-desc"><?php echo htmlspecialchars($preset['desc']); ?></p>
                  <div class="td-hero-btn-group">
                     <a href="<?php echo $preset['btn_link']; ?>" class="td-btn td-btn-primary">
                        <?php echo $preset['btn_text']; ?> <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-left:6px; display:inline-block; vertical-align:-2px;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                     </a>
                     <a href="<?php echo base_url(); ?>lien-he" class="td-btn td-btn-outline">
                        Liên hệ hotline <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-left:6px; display:inline-block; vertical-align:-2px;"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                     </a>
                  </div>
               </div>
            </div>

         </div>
      <?php endforeach; ?>

      <!-- Standard Modern Controls (Arrows) -->
      <button type="button" class="td-slider-arrow td-prev-arrow" aria-label="Slide trước">
         <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#0f172a" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round" style="display:block; margin:auto; flex-shrink:0;"><polyline points="15 18 9 12 15 6"></polyline></svg>
      </button>
      <button type="button" class="td-slider-arrow td-next-arrow" aria-label="Slide kế tiếp">
         <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="#0f172a" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round" style="display:block; margin:auto; flex-shrink:0;"><polyline points="9 18 15 12 9 6"></polyline></svg>
      </button>

      <!-- Standard Modern Dots (Pill indicators) -->
      <div class="td-slider-dots">
         <?php for ($i = 0; $i < $total_slides; $i++): ?>
            <span class="td-dot <?php echo $i === 0 ? 'active' : ''; ?>" data-slide-to="<?php echo $i; ?>"></span>
         <?php endfor; ?>
      </div>

   </div>
</div>
