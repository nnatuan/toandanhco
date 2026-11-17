<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
?> 

<style>
/* Modern Product Search Styles */
.td-search-page-wrapper {
   padding: 40px 0 60px 0;
   min-height: 520px;
}

.td-search-header-box {
   background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
   border: 1px solid #e2e8f0;
   border-radius: 16px;
   padding: 30px;
   margin-bottom: 40px;
   box-shadow: 0 4px 16px rgba(0, 0, 0, 0.03);
   display: flex;
   align-items: center;
   justify-content: space-between;
   flex-wrap: wrap;
   gap: 20px;
}

.td-search-title-wrap h1 {
   font-family: 'Inter', sans-serif !important;
   font-size: 24px !important;
   font-weight: 800 !important;
   color: #17375e !important;
   margin: 0 0 6px 0 !important;
}

.td-search-count-desc {
   font-family: 'Inter', sans-serif;
   font-size: 14px;
   color: #64748b;
   margin: 0;
}

.td-search-count-desc strong {
   color: var(--td-primary, #40a047);
   font-weight: 700;
}

.td-search-inline-form {
   display: flex;
   align-items: center;
   position: relative;
   max-width: 420px;
   width: 100%;
}

.td-search-inline-input {
   width: 100%;
   height: 46px;
   padding: 0 50px 0 20px;
   border: 1.5px solid #cbd5e1;
   border-radius: 30px;
   font-family: 'Inter', sans-serif;
   font-size: 14px;
   font-weight: 500;
   color: #1e293b;
   background: #ffffff;
   outline: none;
   transition: all 0.25s ease;
   box-sizing: border-box;
}

.td-search-inline-input:focus {
   border-color: var(--td-primary, #40a047);
   box-shadow: 0 0 0 4px rgba(64, 160, 71, 0.12);
}

.td-search-inline-btn {
   position: absolute;
   right: 6px;
   width: 34px;
   height: 34px;
   background: var(--td-primary, #40a047);
   color: #ffffff;
   border: none;
   border-radius: 50%;
   display: flex;
   align-items: center;
   justify-content: center;
   cursor: pointer;
   transition: all 0.2s ease;
}

.td-search-inline-btn:hover {
   background: var(--td-primary-dark, #338a39);
   transform: scale(1.06);
}

/* Empty State */
.td-search-empty-box {
   text-align: center;
   padding: 60px 20px;
   background: #ffffff;
   border: 1px dashed #cbd5e1;
   border-radius: 16px;
   margin: 20px 0 40px 0;
}

.td-search-empty-icon {
   width: 72px;
   height: 72px;
   margin: 0 auto 18px auto;
   background: #f1f5f9;
   border-radius: 50%;
   display: flex;
   align-items: center;
   justify-content: center;
   color: #94a3b8;
}

.td-search-empty-title {
   font-family: 'Inter', sans-serif;
   font-size: 20px;
   font-weight: 700;
   color: #1e293b;
   margin-bottom: 10px;
}

.td-search-empty-text {
   font-family: 'Inter', sans-serif;
   font-size: 14.5px;
   color: #64748b;
   max-width: 500px;
   margin: 0 auto 24px auto;
   line-height: 1.6;
}

.td-search-empty-btn {
   display: inline-flex;
   align-items: center;
   gap: 8px;
   padding: 11px 26px;
   background: var(--td-primary, #40a047);
   color: #ffffff !important;
   font-family: 'Inter', sans-serif;
   font-size: 14px;
   font-weight: 600;
   border-radius: 25px;
   text-decoration: none !important;
   transition: all 0.25s ease;
   box-shadow: 0 4px 14px rgba(64, 160, 71, 0.25);
}

.td-search-empty-btn:hover {
   background: var(--td-primary-dark, #338a39);
   transform: translateY(-2px);
   box-shadow: 0 6px 20px rgba(64, 160, 71, 0.35);
}

/* Modern Product Card Styling in Search Grid */
.td-search-page-wrapper ul.wgl-products li .picture {
   display: table;
   width: 100%;
}

.td-search-page-wrapper ul.wgl-products li .picture .woo_post-link {
   vertical-align: middle;
   display: table-cell;
}

.td-search-page-wrapper .woocommerce-loop-product__title a {
   transition: color 0.2s ease;
}

.td-search-page-wrapper .woocommerce-loop-product__title a:hover {
   color: var(--td-primary, #40a047) !important;
}

/* Modern Pagination */
.td-search-pagination-wrap {
   display: flex;
   justify-content: center;
   align-items: center;
   gap: 8px;
   margin-top: 45px;
   clear: both;
}

.td-search-pagination-wrap a,
.td-search-pagination-wrap span.current {
   display: inline-flex;
   align-items: center;
   justify-content: center;
   min-width: 40px;
   height: 40px;
   padding: 0 14px;
   border-radius: 8px;
   font-family: 'Inter', sans-serif;
   font-size: 14px;
   font-weight: 600;
   text-decoration: none;
   transition: all 0.2s ease;
   box-sizing: border-box;
}

.td-search-pagination-wrap a {
   background: #ffffff;
   color: #334155;
   border: 1px solid #cbd5e1;
}

.td-search-pagination-wrap a:hover {
   background: #f8fafc;
   border-color: var(--td-primary, #40a047);
   color: var(--td-primary, #40a047);
   transform: translateY(-2px);
}

.td-search-pagination-wrap span.current {
   background: var(--td-primary, #40a047);
   color: #ffffff;
   border: 1px solid var(--td-primary, #40a047);
   box-shadow: 0 4px 10px rgba(64, 160, 71, 0.25);
}

@media (max-width: 768px) {
   .td-search-header-box {
      flex-direction: column;
      align-items: flex-start;
      padding: 20px;
   }
   .td-search-inline-form {
      max-width: 100%;
   }
}
</style>

<script type="text/javascript">
   function set_page(_page) {
      $.post("<?php echo base_url() . 'search/set_page/'; ?>", { ncurr_page: _page })
        .done(function() {
           location.reload();
        });
   }
</script>

<main id="main">
   <!-- Breadcrumbs Navigation -->
   <div class="breadcrumbs">
      <div class="wgl-container">
         <a href="<?php echo base_url(); ?>" class="home">Trang chủ</a> 
         <span class="divider">&rarr;</span> 
         <span class="current">Tìm kiếm sản phẩm</span>
      </div>
   </div>

   <div class="wgl-container td-search-page-wrapper">
      <div id="main-content">
         
         <?php 
            $list = get_search($key_word, $nrow_per_page, $ncurr_page);
            $total_count = isset($total_items) ? $total_items : get_count_search($key_word);
         ?>

         <!-- Search Header Box -->
         <div class="td-search-header-box">
            <div class="td-search-title-wrap">
               <div class="td-sec-badge" style="margin-bottom:8px;">
                  <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-right:6px; vertical-align:-1px;"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                  KẾT QUẢ TÌM KIẾM SẢN PHẨM
               </div>
               <h1>
                  <?php if (!empty($key_word)): ?>
                     Từ khóa: &ldquo;<?php echo htmlspecialchars($key_word); ?>&rdquo;
                  <?php else: ?>
                     Tất cả sản phẩm &amp; thiết bị
                  <?php endif; ?>
               </h1>
               <p class="td-search-count-desc">
                  Tìm thấy <strong><?php echo number_format($total_count); ?></strong> sản phẩm phù hợp.
               </p>
            </div>

            <!-- Quick Re-Search Form -->
            <form action="<?php echo base_url(); ?>search" method="post" class="td-search-inline-form">
               <input 
                  type="text" 
                  name="key_word" 
                  class="td-search-inline-input" 
                  value="<?php echo !empty($key_word) ? htmlspecialchars($key_word) : ''; ?>" 
                  placeholder="Nhập tên sản phẩm, mã thiết bị..." 
                  autocomplete="off" 
               />
               <button type="submit" class="td-search-inline-btn" aria-label="Tìm kiếm">
                  <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
               </button>
            </form>
         </div>

         <!-- Product Results Grid -->
         <?php if (!empty($list)): ?>
            <div class="wgl-products-catalog wgl-products-wrapper columns-4">
               <ul class="wgl-products appear-animation anim-slide-left">
                  <?php foreach ($list as $product): 
                     if (!empty($product['clink'])) {
                        $href = $product['clink'];
                     } else {
                        $href = base_url() . 'sanpham/' . $product['ccode'] . '-' . $product['nid'];
                     }
                     $img_src = !empty($product['cimage']) 
                        ? base_url() . 'upload/images_product/full_images/' . $product['cimage']
                        : base_url() . 'images/home_section_01-1.webp';
                  ?>
                  <li class="product type-product post-1871 status-publish first instock product_cat-solar-panels product_tag-capacity product_tag-innovation product_tag-solar-energy has-post-thumbnail shipping-taxable purchasable product-type-simple animate">
                     <div class="woo_product_image shop_media td-shimmer-wrap">
                        <div class="picture">
                           <a class="woo_post-link" href="<?php echo $href; ?>" title="<?php echo htmlspecialchars($product['cproducts']); ?>">
                              <img 
                                 class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail td-lazyload"
                                 src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 540 540'%3E%3C/svg%3E"
                                 data-src="<?php echo $img_src; ?>" 
                                 alt="<?php echo htmlspecialchars($product['cproducts']); ?>" 
                                 data-srcset="<?php echo $img_src; ?>" 
                                 sizes="(max-width: 540px) 100vw, 540px"
                                 loading="lazy"
                              />
                           </a>
                        </div>
                     </div>
                     <div class="woo_product_content">
                        <h2 class="woocommerce-loop-product__title">
                           <a href="<?php echo $href; ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link" title="<?php echo htmlspecialchars($product['cproducts']); ?>">
                              <?php echo htmlspecialchars($product['cproducts']); ?>
                           </a>
                        </h2>
                        <p class="short_content">
                           <?php 
                              if (!empty($product['cnote'])) {
                                 echo htmlspecialchars(mb_substr(strip_tags($product['cnote']), 0, 95, 'UTF-8')) . (mb_strlen(strip_tags($product['cnote']), 'UTF-8') > 95 ? '...' : '');
                              } else {
                                 echo "Thiết bị chính hãng tiêu chuẩn công nghiệp phân phối bởi Toàn Danh.";
                              }
                           ?>
                        </p>
                        <span class="price">
                           <?php if (!empty($product['fprice_sale']) && !empty($product['fprice']) && $product['fprice_sale'] < $product['fprice'] && $product['fprice_sale'] > 0): ?>	
                              <del aria-hidden="true"><span class="woocommerce-Price-amount amount"><bdi><?php echo number_format($product['fprice']); ?><span class="woocommerce-Price-currencySymbol">₫</span></bdi></span></del> 
                              <ins><span class="woocommerce-Price-amount amount"><bdi><?php echo number_format($product['fprice_sale']); ?><span class="woocommerce-Price-currencySymbol">₫</span></bdi></span></ins>
                           <?php else: ?>
                              <span class="woocommerce-Price-amount amount"><bdi><?php if (!empty($product['fprice']) && $product['fprice'] != 0) echo number_format($product['fprice']) . ' ₫'; else echo "Liên hệ"; ?></bdi></span>
                           <?php endif; ?>
                        </span>
                     </div>
                  </li>
                  <?php endforeach; ?>
               </ul>
            </div>

            <!-- Pagination -->
            <?php if ($ntotal_page > 1): ?>
            <div class="td-search-pagination-wrap">
               <?php if ($ncurr_page > 1): ?>
                  <a href="javascript:set_page(<?php echo $ncurr_page - 1; ?>)" title="Trang trước">&laquo; Trước</a>
               <?php endif; ?>

               <?php for ($i = 1; $i <= $ntotal_page; $i++): ?>
                  <?php if ($i == $ncurr_page): ?>
                     <span class="current"><?php echo $i; ?></span>
                  <?php else: ?>
                     <a href="javascript:set_page(<?php echo $i; ?>)"><?php echo $i; ?></a>
                  <?php endif; ?>
               <?php endfor; ?>

               <?php if ($ncurr_page < $ntotal_page): ?>
                  <a href="javascript:set_page(<?php echo $ncurr_page + 1; ?>)" title="Trang sau">Sau &raquo;</a>
               <?php endif; ?>
            </div>
            <?php endif; ?>

         <?php else: ?>
            <!-- Empty State when No Products Found -->
            <div class="td-search-empty-box">
               <div class="td-search-empty-icon">
                  <svg viewBox="0 0 24 24" width="36" height="36" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
               </div>
               <h3 class="td-search-empty-title">Không tìm thấy sản phẩm nào!</h3>
               <p class="td-search-empty-text">
                  Rất tiếc, chúng tôi không tìm thấy sản phẩm nào khớp với từ khóa <strong>&ldquo;<?php echo htmlspecialchars($key_word); ?>&rdquo;</strong>.<br />
                  Vui lòng thử lại với tên thương hiệu (như <em>ABB, Schneider, Milwaukee, Tone, Erico, Robben...</em>) hoặc từ khóa tổng quát hơn.
               </p>
               <a href="<?php echo base_url(); ?>" class="td-search-empty-btn">
                  <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                  Quay về Trang chủ
               </a>
            </div>
         <?php endif; ?>

      </div>
   </div>
</main>

<?php 
   $this->load->view('modules/mod_footer');
   $this->load->view('footer');
?>