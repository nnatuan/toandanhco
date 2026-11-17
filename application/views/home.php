<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');

   // FULL WIDTH MODERN HERO SLIDER
   $this->load->view('modules/mod_slideshow');

   $module_popup = get_module_byid(1);
?>  

<style>
    /* CSS Popup Modal */
    .custom-popup-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.75);
        backdrop-filter: blur(5px);
        z-index: 999999;
        justify-content: center;
        align-items: center;
    }
    .custom-popup-content {
        position: relative;
        max-width: 90%;
        max-height: 90vh;
    }
    .custom-popup-content img {
        max-width: 100%;
        max-height: 90vh;
        display: block;
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
    }
    .custom-popup-close {
        position: absolute;
        top: -14px;
        right: -14px;
        width: 34px;
        height: 34px;
        background: #ffffff;
        color: #1e293b;
        border-radius: 50%;
        text-align: center;
        line-height: 32px;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        border: 2px solid var(--td-primary);
        transition: transform 0.2s ease;
    }
    .custom-popup-close:hover {
        transform: scale(1.1);
        background: var(--td-primary);
        color: #fff;
    }
</style>

<!-- HTML Popup Modal -->
<?php if (!empty($module_popup) && isset($module_popup['nstatus']) && $module_popup['nstatus'] == 1 && !empty($module_popup['cimage'])) { ?>
<div id="sitePopup" class="custom-popup-overlay">
    <div class="custom-popup-content">
        <span class="custom-popup-close" onclick="closePopup()">&times;</span>
        <img 
            class="td-lazyload"
            src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1'%3E%3C/svg%3E" 
            data-src="<?php echo base_url(); ?>upload/images_module/<?php echo $module_popup['cimage']; ?>" 
            alt="Popup" 
            loading="lazy"
        />
    </div>
</div>
<?php } ?>

<main id="main">
         <div class="wgl-container">
            <div class="row">
               <div id='main-content' class="wgl_col-12">
                  <div data-elementor-type="wp-page" data-elementor-id="459" class="elementor elementor-459" data-elementor-settings="[]">
                     <div class="elementor-inner">
                        <div class="elementor-section-wrap">
                           
                           <!-- 1. Balanced Category Showcase Bar -->
                           <?php $this->load->view('modules/mod_right'); ?> 

                           <!-- 2. BRAND NEW MODERN ABOUT US SHOWCASE SECTION -->
                           <section class="td-about-home-section elementor-section elementor-section-boxed elementor-top-section">
                              <div class="elementor-container elementor-column-gap-default">
                                 <div class="td-about-row">
                                    
                                    <!-- Left: Image Showcase with Floating Experience Badge -->
                                    <div class="td-about-col-image">
                                       <div class="td-about-image-wrapper">
                                          <div class="td-about-main-img-box td-shimmer-wrap">
                                             <img 
                                                class="td-lazyload td-about-img"
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 600 420'%3E%3C/svg%3E"
                                                data-src="<?php echo base_url(); ?>images/home_section_01-1.webp" 
                                                alt="Kỹ thuật Toàn Danh"
                                                loading="lazy"
                                             />
                                          </div>
                                          <!-- Floating Experience Badge -->
                                          <div class="td-about-exp-badge">
                                             <div class="td-exp-icon">
                                                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="M9 12l2 2 4-4"></path></svg>
                                             </div>
                                             <div class="td-exp-text">
                                                <span class="td-exp-num">10+ NĂM</span>
                                                <span class="td-exp-label">Kinh nghiệm & Uy tín</span>
                                             </div>
                                          </div>
                                       </div>
                                    </div>

                                    <!-- Right: Corporate Narrative & Value Highlights -->
                                    <div class="td-about-col-content">
                                       <div class="td-about-tag">
                                          <svg viewBox="0 0 24 24" width="13" height="13" fill="currentColor" stroke="none" style="margin-right:6px; vertical-align:-1px;"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg> VỀ CHÚNG TÔI
                                       </div>
                                       
                                       <h2 class="td-about-heading">
                                          Giải Pháp Toàn Diện Về Điện Công Nghiệp & Tự Động Hóa
                                       </h2>
                                       
                                       <div class="td-about-subheading">
                                          Công ty TNHH Thương Mại Dịch Vụ Kỹ Thuật TOÀN DANH
                                       </div>
                                       
                                       <p class="td-about-desc">
                                          Được thành lập từ năm 2014, <strong>TOÀN DANH</strong> là đối tác tin cậy hàng đầu chuyên cung cấp thiết bị đo bức xạ năng lượng mặt trời, hệ thống tủ lọc sóng hài chủ động AHF, thiết bị điện công nghiệp và dụng cụ kỹ thuật chính hãng tại Việt Nam.
                                       </p>

                                       <!-- 4 Stat Highlight Cards -->
                                       <div class="td-about-stats-grid">
                                          <div class="td-stat-card">
                                             <div class="td-stat-number">10+</div>
                                             <div class="td-stat-label">Năm Phát Triển</div>
                                          </div>
                                          <div class="td-stat-card">
                                             <div class="td-stat-number">1,000+</div>
                                             <div class="td-stat-label">Dự Án Toàn Quốc</div>
                                          </div>
                                          <div class="td-stat-card">
                                             <div class="td-stat-number">100%</div>
                                             <div class="td-stat-label">Chính Hãng</div>
                                          </div>
                                          <div class="td-stat-card">
                                             <div class="td-stat-number">24/7</div>
                                             <div class="td-stat-label">Tư Vấn Kỹ Thuật</div>
                                          </div>
                                       </div>

                                       <!-- Commitments Checklist -->
                                       <ul class="td-about-checklist">
                                          <li>
                                             <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0; margin-top:2px; color:var(--td-primary); display:inline-block; vertical-align:text-top;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                             <span>Phân phối chính hãng các thương hiệu quốc tế: <strong>Milwaukee, Tone, Schneider, ABB, Erico, Robben...</strong></span>
                                          </li>
                                          <li>
                                             <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0; margin-top:2px; color:var(--td-primary); display:inline-block; vertical-align:text-top;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                             <span>Chuyên sâu thiết bị đo bức xạ mặt trời, trạm quan trắc năng lượng và tủ lọc sóng hài AHF.</span>
                                          </li>
                                          <li>
                                             <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0; margin-top:2px; color:var(--td-primary); display:inline-block; vertical-align:text-top;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                             <span>Khảo sát tận nơi, hỗ trợ kỹ thuật chuyên nghiệp và chế độ bảo hành chu đáo.</span>
                                          </li>
                                       </ul>

                                       <div class="td-about-action">
                                          <a href="<?php echo base_url(); ?>gioi-thieu" class="td-about-btn-primary">
                                             Tìm hiểu thêm về chúng tôi <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-left:8px; vertical-align:middle; display:inline-block;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                          </a>
                                          <a href="<?php echo base_url(); ?>lien-he" class="td-about-btn-secondary">
                                             Liên hệ tư vấn
                                          </a>
                                       </div>

                                    </div>

                                 </div>
                              </div>
                           </section>

                           <!-- 3. SECTION: SẢN PHẨM NỔI BẬT -->
                           <section class="elementor-element elementor-element-029d8c9 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="029d8c9" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                              <div class="elementor-container elementor-column-gap-default">
                                 <div class="elementor-row">
                                    <div class="elementor-element elementor-element-156e81e elementor-column elementor-col-100 elementor-top-column" data-id="156e81e" data-element_type="column">
                                        <div class="elementor-column-wrap elementor-element-populated">
                                        
                                           <div class="elementor-widget-wrap">
                                              
                                              <div class="toandanh-section-header">
                                                 <div class="td-sec-badge">
                                                     <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-right:6px; vertical-align:-1px;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                                     THIẾT BỊ TIÊU BIỂU
                                                  </div>
                                                  <h3>SẢN PHẨM NỔI BẬT</h3>
                                                  <div class="td-title-divider">
                                                     <span class="td-divider-line"></span>
                                                     <span class="td-divider-diamond"></span>
                                                     <span class="td-divider-line"></span>
                                                  </div>
                                              </div>

                                              <div class="wgl-products-catalog wgl-products-wrapper columns-4">
											   <ul class="wgl-products appear-animation anim-slide-left">
												<?php $obj_product = get_product_pb();
												foreach($obj_product as $product) {
													if($product['clink']!="")
														$href = $product['clink'];
													else
														$href = base_url().'sanpham/'.$product['ccode'].'-'.$product['nid'];
												?>
												  <li class="product type-product post-1871 status-publish first instock product_cat-solar-panels product_tag-capacity product_tag-innovation product_tag-solar-energy has-post-thumbnail shipping-taxable purchasable product-type-simple animate">
													 <div class="woo_product_image shop_media td-shimmer-wrap">
														<div class="picture">
                                                           <a class="woo_post-link" href="<?php echo $href; ?>" title="<?php echo htmlspecialchars($product['cproducts']); ?>">
														      <img 
                                                                 class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail td-lazyload"
                                                                 src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 540 540'%3E%3C/svg%3E"
                                                                 data-src="<?php echo base_url().'upload/images_product/full_images/'.$product['cimage']; ?>" 
                                                                 alt="<?php echo htmlspecialchars($product['cproducts']); ?>" 
                                                                 data-srcset="<?php echo base_url().'upload/images_product/full_images/'.$product['cimage']; ?>" 
                                                                 sizes="(max-width: 540px) 100vw, 540px"
                                                                 loading="lazy"
                                                              >
														   </a>
														</div>
													 </div>
													 <div class="woo_product_content">
														<h2 class="woocommerce-loop-product__title"><a href="<?php echo $href; ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link" title="<?php echo htmlspecialchars($product['cproducts']); ?>"><?php echo $product['cproducts']; ?></a></h2>
														<p class="short_content"><?php if($product['cnote']!="") echo $product['cnote']; else echo "Thiết bị chính hãng tiêu chuẩn công nghiệp phân phối bởi Toàn Danh."; ?></p>
														<span class="price">
															<?php if($product['fprice_sale'] < $product['fprice'] && $product['fprice_sale'] > 0) { ?>	
															<del aria-hidden="true"><span class="woocommerce-Price-amount amount"><bdi><?php echo number_format($product['fprice']); ?><span class="woocommerce-Price-currencySymbol">₫</span></bdi></span></del> 
															<ins><span class="woocommerce-Price-amount amount"><bdi><?php echo number_format($product['fprice_sale']); ?><span class="woocommerce-Price-currencySymbol">₫</span></bdi></span></ins>
															<?php } else { ?>
															<span class="woocommerce-Price-amount amount"><bdi><?php if(!empty($product['fprice']) && $product['fprice']!=0) echo number_format($product['fprice']) . ' ₫'; else echo "Liên hệ"; ?></bdi></span>
															<?php } ?>
														</span>
													 </div>
												  </li>
												  <?php } ?>
												  
												  <?php 
                                                     $news = get_news_by_id(532); 
                                                     if (!empty($news)) {
                                                        $href = base_url().'dich-vu/'.$news['ccode'];
												  ?>
												  <li class="product type-product post-1871 status-publish first instock product_cat-solar-panels product_tag-capacity product_tag-innovation product_tag-solar-energy has-post-thumbnail shipping-taxable purchasable product-type-simple animate">
													 <div class="woo_product_image shop_media td-shimmer-wrap">
														<div class="picture">
                                                           <a class="woo_post-link" href="<?php echo $href; ?>" title="<?php echo htmlspecialchars($news['ctitle']); ?>">
														      <img 
                                                                 class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail td-lazyload"
                                                                 src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 540 540'%3E%3C/svg%3E"
                                                                 data-src="<?php echo base_url().'upload/image_article/'.$news['cimage_thumb']; ?>" 
                                                                 alt="<?php echo htmlspecialchars($news['ctitle']); ?>" 
                                                                 data-srcset="<?php echo base_url().'upload/image_article/'.$news['cimage_thumb']; ?>" 
                                                                 sizes="(max-width: 540px) 100vw, 540px"
                                                                 loading="lazy"
                                                              >
														   </a>
														</div>
													 </div>
													 <div class="woo_product_content">
														<h2 class="woocommerce-loop-product__title"><a href="<?php echo $href; ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link" title="<?php echo htmlspecialchars($news['ctitle']); ?>"><?php echo $news['ctitle']; ?></a></h2>
														<p class="short_content"><?php echo strip_tags($news['cshort_content']); ?></p>
														<span class="price">
															<span class="woocommerce-Price-amount amount"><bdi>Liên hệ</bdi></span>
														</span>
													 </div>
												  </li>
												  <?php } ?>
											   </ul>
											</div>
											
                                             <!-- DYNAMIC SECTIONS BY MATERIAL PRODUCTS -->
                                             <?php 
                                                $list_sec = get_material_products_home(); 
											    foreach($list_sec as $sec) {
											 ?>
											 
											 <div class="toandanh-section-header">
                                                <div class="td-sec-badge">
                                                   <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-right:6px; vertical-align:-1px;"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                                                   DANH MỤC THIẾT BỊ
                                                </div>
                                                <h3><?php echo htmlspecialchars($sec['cmaterial_products']); ?></h3>
                                                <div class="td-title-divider">
                                                   <span class="td-divider-line"></span>
                                                   <span class="td-divider-diamond"></span>
                                                   <span class="td-divider-line"></span>
                                                </div>
                                             </div>

                                             <div class="wgl-products-catalog wgl-products-wrapper columns-4">
											   <ul class="wgl-products appear-animation anim-slide-left">
												<?php 
												if($sec['nid']==30 || $sec['nid']==31)
													$obj_product = get_product_bymat_home_hassub($sec['nid']);
												else 
													$obj_product = get_product_bymat_home($sec['nid']);
												foreach($obj_product as $product) {
													if($product['clink']!="")
														$href = $product['clink'];
													else
														$href = base_url().'sanpham/'.$product['ccode'].'-'.$product['nid'];
												?>
												  <li class="product type-product post-1871 status-publish first instock product_cat-solar-panels product_tag-capacity product_tag-innovation product_tag-solar-energy has-post-thumbnail shipping-taxable purchasable product-type-simple animate">
													 <div class="woo_product_image shop_media td-shimmer-wrap">
														<div class="picture">
                                                           <a class="woo_post-link" href="<?php echo $href; ?>" title="<?php echo htmlspecialchars($product['cproducts']); ?>">
														      <img 
                                                                 class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail td-lazyload"
                                                                 src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 540 540'%3E%3C/svg%3E"
                                                                 data-src="<?php echo base_url().'upload/images_product/full_images/'.$product['cimage']; ?>" 
                                                                 alt="<?php echo htmlspecialchars($product['cproducts']); ?>" 
                                                                 data-srcset="<?php echo base_url().'upload/images_product/full_images/'.$product['cimage']; ?>" 
                                                                 sizes="(max-width: 540px) 100vw, 540px"
                                                                 loading="lazy"
                                                              >
														   </a>
														</div>
													 </div>
													 <div class="woo_product_content">
														<h2 class="woocommerce-loop-product__title"><a href="<?php echo $href; ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link" title="<?php echo htmlspecialchars($product['cproducts']); ?>"><?php echo $product['cproducts']; ?></a></h2>
														<p class="short_content"><?php if($product['cnote']!="") echo $product['cnote']; else echo "Thiết bị chính hãng phân phối bởi Toàn Danh."; ?></p>
														<span class="price">
															<?php if($product['fprice_sale'] < $product['fprice'] && $product['fprice_sale'] > 0) { ?>	
															<del aria-hidden="true"><span class="woocommerce-Price-amount amount"><bdi><?php echo number_format($product['fprice']); ?><span class="woocommerce-Price-currencySymbol">₫</span></bdi></span></del> 
															<ins><span class="woocommerce-Price-amount amount"><bdi><?php echo number_format($product['fprice_sale']); ?><span class="woocommerce-Price-currencySymbol">₫</span></bdi></span></ins>
															<?php } else { ?>
															<span class="woocommerce-Price-amount amount"><bdi><?php if(!empty($product['fprice']) && $product['fprice']!=0) echo number_format($product['fprice']) . ' ₫'; else echo "Liên hệ"; ?></bdi></span>
															<?php } ?>
														</span>
													 </div>
												  </li>
												  <?php } ?>
											   </ul>
											</div>
                                             
											 <?php } ?>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </section>
                           
                           <!-- 4. SECTION: TIN TỨC MỚI NHẤT (6 TIN THEO NID) -->
                            <section class="td-news-home-section elementor-section elementor-section-boxed elementor-top-section">
                               <div class="elementor-container elementor-column-gap-default">
                                  <div class="elementor-row">
                                     <div class="elementor-element elementor-column elementor-col-100 elementor-top-column">
                                         <div class="elementor-column-wrap elementor-element-populated">
                                        
                                           <div class="elementor-widget-wrap">
                                              
                                              <div class="td-news-section-header">
                                                 <div class="td-news-header-left">
                                                    <div class="td-news-tag">
                                                       <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-right:6px; vertical-align:-1px;"><path d="M19 20H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v1m2 13a2 2 0 0 1-2-2V7m2 13a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                                       BẢN TIN &amp; HOẠT ĐỘNG
                                                    </div>
                                                    <h3 class="td-news-heading">TIN TỨC MỚI NHẤT</h3>
                                                 </div>
                                                 <div class="td-news-header-right">
                                                    <a href="<?php echo base_url(); ?>tin-tuc" class="td-news-viewall">
                                                       Xem tất cả tin tức
                                                       <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                                    </a>
                                                 </div>
                                              </div>

                                              <?php 
                                                 $latest_news = get_latest_news_home(6);
                                                 if (!empty($latest_news)):
                                              ?>
                                              <div class="td-news-grid">
                                                 <?php foreach ($latest_news as $news_item): 
                                                    $news_url = base_url() . 'tin-tuc/' . $news_item['ccode'];
                                                    $img_src = !empty($news_item['cimage_thumb']) 
                                                       ? base_url() . 'upload/image_article/' . $news_item['cimage_thumb'] 
                                                       : base_url() . 'images/home_section_01-1.webp';
                                                    
                                                    if (!empty($news_item['cpost_date'])) {
                                                       $post_date = $news_item['cpost_date'];
                                                    } elseif (!empty($news_item['ddate01'])) {
                                                       $parts = explode('-', $news_item['ddate01']);
                                                       $post_date = (count($parts) === 3) ? $parts[2] . '/' . $parts[1] . '/' . $parts[0] : $news_item['ddate01'];
                                                    } else {
                                                       $post_date = date('d/m/Y');
                                                    }

                                                    $clean_summary = strip_tags($news_item['cshort_content']);
                                                    if (empty($clean_summary)) {
                                                       $clean_summary = strip_tags($news_item['ccontent']);
                                                    }
                                                    $clean_summary = html_entity_decode($clean_summary, ENT_QUOTES, 'UTF-8');
                                                 ?>
                                                 <article class="td-news-card">
                                                    <div class="td-news-thumb-wrapper td-shimmer-wrap">
                                                       <a href="<?php echo $news_url; ?>" title="<?php echo htmlspecialchars($news_item['ctitle']); ?>">
                                                          <img 
                                                             class="td-news-thumb td-lazyload" 
                                                             src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 240'%3E%3C/svg%3E"
                                                             data-src="<?php echo $img_src; ?>" 
                                                             alt="<?php echo htmlspecialchars($news_item['ctitle']); ?>" 
                                                             loading="lazy"
                                                          />
                                                       </a>
                                                       <div class="td-news-date-badge">
                                                          <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                                          <span><?php echo $post_date; ?></span>
                                                       </div>
                                                    </div>
                                                    <div class="td-news-card-body">
                                                       <h4 class="td-news-title">
                                                          <a href="<?php echo $news_url; ?>" title="<?php echo htmlspecialchars($news_item['ctitle']); ?>">
                                                             <?php echo htmlspecialchars($news_item['ctitle']); ?>
                                                          </a>
                                                       </h4>
                                                       <p class="td-news-excerpt">
                                                          <?php echo htmlspecialchars(mb_substr($clean_summary, 0, 110, 'UTF-8')) . (mb_strlen($clean_summary, 'UTF-8') > 110 ? '...' : ''); ?>
                                                       </p>
                                                       <div class="td-news-card-footer">
                                                          <a href="<?php echo $news_url; ?>" class="td-news-readmore">
                                                             Xem chi tiết 
                                                             <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                                          </a>
                                                       </div>
                                                    </div>
                                                 </article>
                                                 <?php endforeach; ?>
                                              </div>
                                              <?php endif; ?>

                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </section>
                            
                            <!-- 5. SECTION: ĐỐI TÁC CHIẾN LƯỢC (FULL WIDTH MARQUEE LOOP) -->
						   <section class="td-partners-section elementor-element elementor-element-532ceb5" data-id="532ceb5" data-element_type="section">
                              <!-- Tiêu đề Section căn giữa độc lập 100% trong Container 1140px -->
                              <div class="td-partners-header-container">
                                 <div class="toandanh-section-header">
                                    <div class="td-sec-badge">
                                       <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-right:6px; vertical-align:-1px;"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                       HỢP TÁC &amp; PHÁT TRIỂN
                                    </div>
                                    <h3>ĐỐI TÁC CHIẾN LƯỢC</h3>
                                    <div class="td-title-divider">
                                       <span class="td-divider-line"></span>
                                       <span class="td-divider-diamond"></span>
                                       <span class="td-divider-line"></span>
                                    </div>
                                 </div>
                              </div>

                              <!-- Dải Logo Marquee Tràn Màn Hình 100vw Nằm Bên Dưới Tiêu Đề -->
                              <div class="td-marquee-fullwidth-wrapper">
                                 <div class="td-marquee-container">
                                    <div class="td-marquee-fade td-marquee-fade-left"></div>
                                    <div class="td-marquee-fade td-marquee-fade-right"></div>
                                    <div class="td-marquee-track">
                                       <?php 
                                          $partners = array(
                                             array('name' => 'ABB', 'img' => 'abb.png', 'sub' => 'Thụy Sĩ', 'color' => '#ff000f'),
                                             array('name' => 'Schneider', 'img' => 'schneider.png', 'sub' => 'Pháp', 'color' => '#3dcd58'),
                                             array('name' => 'Milwaukee', 'img' => 'milwaukee.png', 'sub' => 'Hoa Kỳ', 'color' => '#db011c'),
                                             array('name' => 'TONE', 'img' => 'tone.png', 'sub' => 'Nhật Bản', 'color' => '#e60012'),
                                             array('name' => 'Robben', 'img' => 'robben.png', 'sub' => 'Đức', 'color' => '#0f52ba'),
                                             array('name' => 'Erico', 'img' => 'erico.png', 'sub' => 'Hoa Kỳ', 'color' => '#1e293b'),
                                             array('name' => 'LS Electric', 'img' => 'ls.png', 'sub' => 'Hàn Quốc', 'color' => '#ed1b24'),
                                             array('name' => 'Mitsubishi', 'img' => 'mitshubishielectric.png', 'sub' => 'Nhật Bản', 'color' => '#e60012'),
                                             array('name' => 'OBO Bettermann', 'img' => 'obo-bettermann.png', 'sub' => 'Đức', 'color' => '#1d3557'),
                                             array('name' => 'Kipp & Zonen', 'img' => 'kipp-zonen.png', 'sub' => 'Hà Lan', 'color' => '#d97706'),
                                             array('name' => 'Sinexcel', 'img' => 'sinexcel.png', 'sub' => 'Bộ Lọc AHF', 'color' => '#16a34a'),
                                             array('name' => 'Hensel', 'img' => 'hensel.png', 'sub' => 'Đức', 'color' => '#2563eb')
                                          );
                                       ?>
                                       <!-- Nhóm 1: Logo Đối tác -->
                                       <div class="td-marquee-group">
                                          <?php foreach ($partners as $partner): ?>
                                          <div class="td-partner-card" title="<?php echo htmlspecialchars($partner['name']); ?>">
                                             <div class="td-partner-card-inner">
                                                <img 
                                                   src="<?php echo base_url(); ?>fileman/Uploads/partners/<?php echo $partner['img']; ?>" 
                                                   alt="<?php echo htmlspecialchars($partner['name']); ?>" 
                                                   loading="lazy"
                                                   onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                                />
                                                <div class="td-partner-badge-fallback" style="display:none;">
                                                   <span class="td-badge-brand" style="color:<?php echo $partner['color']; ?>;"><?php echo htmlspecialchars($partner['name']); ?></span>
                                                   <span class="td-badge-sub"><?php echo htmlspecialchars($partner['sub']); ?></span>
                                                </div>
                                             </div>
                                          </div>
                                          <?php endforeach; ?>
                                       </div>

                                       <!-- Nhóm 2: Bản sao nối đuôi tạo hiệu ứng vô tận 60fps -->
                                       <div class="td-marquee-group" aria-hidden="true">
                                          <?php foreach ($partners as $partner): ?>
                                          <div class="td-partner-card" title="<?php echo htmlspecialchars($partner['name']); ?>">
                                             <div class="td-partner-card-inner">
                                                <img 
                                                   src="<?php echo base_url(); ?>fileman/Uploads/partners/<?php echo $partner['img']; ?>" 
                                                   alt="<?php echo htmlspecialchars($partner['name']); ?>" 
                                                   loading="lazy"
                                                   onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                                />
                                                <div class="td-partner-badge-fallback" style="display:none;">
                                                   <span class="td-badge-brand" style="color:<?php echo $partner['color']; ?>;"><?php echo htmlspecialchars($partner['name']); ?></span>
                                                   <span class="td-badge-sub"><?php echo htmlspecialchars($partner['sub']); ?></span>
                                                </div>
                                             </div>
                                          </div>
                                          <?php endforeach; ?>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </section>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </main>

<?php if (!empty($module_popup) && isset($module_popup['nstatus']) && $module_popup['nstatus'] == 1 && !empty($module_popup['cimage'])) { ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var popup = document.getElementById("sitePopup");
        if (popup) {
            popup.style.display = "flex";
        }
    });

    function closePopup() {
        var popup = document.getElementById("sitePopup");
        if (popup) {
            popup.style.display = "none";
        }
    }

    // Đóng khi click ra vùng tối bên ngoài ảnh
    window.addEventListener("click", function(event) {
        var popup = document.getElementById("sitePopup");
        if (event.target === popup) {
            popup.style.display = "none";
        }
    });
</script>
<?php } ?>
      
<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>
