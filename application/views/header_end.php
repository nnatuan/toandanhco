</head>
<?php if($menu_top=="home") { ?>
<body class="home page-template-default page page-id-459 theme-irecco woocommerce-no-js elementor-default elementor-kit-1994 elementor-page elementor-page-459">
<?php } else if($menu_top=="product" || $menu_top=="product_detail") { ?>
<body class="product-template-default single single-product postid-1871 theme-irecco woocommerce woocommerce-page woocommerce-js elementor-default">
<?php } else { ?>
<body class="page-template-default page page-id-9 theme-irecco woocommerce-js elementor-default elementor-kit-1994 elementor-page elementor-page-9">
<?php } ?>

<!-- MODERN CORPORATE PRELOADER SCREEN (DARK TRANSPARENT GLASS EDITION) -->
<style>
   #td-page-preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(11, 20, 34, 0.78);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      z-index: 99999999;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: opacity 0.4s cubic-bezier(0.4, 0, 0.2, 1), visibility 0.4s ease;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
   }
   #td-page-preloader.fade-out {
      opacity: 0;
      visibility: hidden;
      pointer-events: none;
   }
   #td-page-preloader.fade-out .td-preloader-card {
      transform: scale(0.95) translateY(-6px);
      opacity: 0;
      filter: blur(4px);
   }
   .td-preloader-card {
      background: rgba(15, 23, 42, 0.88);
      border-radius: 20px;
      padding: 34px 42px;
      box-shadow: 0 25px 60px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.12);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      max-width: 360px;
      width: 90%;
      position: relative;
      transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
      box-sizing: border-box;
   }
   .td-logo-stage {
      position: relative;
      background: rgba(255, 255, 255, 0.96);
      border-radius: 16px;
      padding: 10px 22px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
   }
   .td-radar-pulse {
      position: absolute;
      width: 100%;
      height: 100%;
      border-radius: 16px;
      background: rgba(64, 160, 71, 0.15);
      animation: tdRadarWave 2s infinite cubic-bezier(0.2, 0.8, 0.4, 1);
      pointer-events: none;
   }
   .td-radar-pulse-2 {
      animation-delay: 0.9s;
   }
   .td-preloader-img {
      height: 68px;
      width: auto;
      max-width: 100%;
      object-fit: contain;
      position: relative;
      z-index: 2;
      filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.08));
      animation: tdLogoFloat 2.4s infinite ease-in-out;
   }
   .td-beam-track {
      width: 220px;
      height: 4.5px;
      background: rgba(255, 255, 255, 0.12);
      border-radius: 99px;
      overflow: hidden;
      position: relative;
      margin: 8px 0 16px;
      box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.4);
   }
   .td-beam-bar {
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 45%;
      border-radius: 99px;
      background: linear-gradient(90deg, #16a34a 0%, #22c55e 50%, #4ade80 100%);
      box-shadow: 0 0 12px rgba(34, 197, 94, 0.6);
      animation: tdBeamGlide 1.6s infinite cubic-bezier(0.65, 0, 0.35, 1);
   }
   .td-preloader-brand {
      font-size: 13px;
      font-weight: 800;
      letter-spacing: 0.7px;
      color: #f8fafc;
      text-transform: uppercase;
      margin-bottom: 6px;
      line-height: 1.3;
   }
   .td-preloader-status {
      font-size: 12px;
      font-weight: 600;
      color: #4ade80;
      display: inline-flex;
      align-items: center;
      gap: 7px;
      letter-spacing: 0.2px;
   }
   .td-live-dot {
      width: 7px;
      height: 7px;
      border-radius: 50%;
      background: #22c55e;
      box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.6);
      animation: tdLivePulse 1.4s infinite ease-in-out;
   }
   @keyframes tdLogoFloat {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-4px); }
   }
   @keyframes tdRadarWave {
      0% { transform: scale(0.8); opacity: 0.8; }
      100% { transform: scale(1.35); opacity: 0; }
   }
   @keyframes tdBeamGlide {
      0% { left: -45%; width: 35%; }
      50% { width: 60%; }
      100% { left: 105%; width: 35%; }
   }
   @keyframes tdLivePulse {
      0% { transform: scale(0.9); box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.7); }
      70% { transform: scale(1.1); box-shadow: 0 0 0 6px rgba(34, 197, 94, 0); }
      100% { transform: scale(0.9); box-shadow: 0 0 0 0 rgba(34, 197, 94, 0); }
   }
</style>

<div id="td-page-preloader">
   <div class="td-preloader-card">
      <div class="td-logo-stage">
         <div class="td-radar-pulse"></div>
         <div class="td-radar-pulse td-radar-pulse-2"></div>
         <img src="<?php echo base_url(); ?>images/logo.png" alt="Toàn Danh" class="td-preloader-img" />
      </div>
      <div class="td-beam-track">
         <div class="td-beam-bar"></div>
      </div>
      <div class="td-preloader-brand">CÔNG TY TNHH TM DV KT TOÀN DANH</div>
      <div class="td-preloader-status">
         <span class="td-live-dot"></span> Đang khởi tạo hệ thống...
      </div>
   </div>
</div>

<script>
   (function() {
      function hidePreloader() {
         var preloader = document.getElementById('td-page-preloader');
         if (preloader && !preloader.classList.contains('fade-out')) {
            var statusEl = preloader.querySelector('.td-preloader-status');
            if (statusEl) {
               statusEl.innerHTML = '<span class="td-live-dot" style="background:#22c55e; box-shadow:0 0 8px #22c55e;"></span> Hệ thống đã sẵn sàng!';
            }
            setTimeout(function() {
               preloader.classList.add('fade-out');
               setTimeout(function() {
                  preloader.style.display = 'none';
               }, 450);
            }, 150);
         }
      }

      // Hide when window finishes loading
      if (document.readyState === 'complete') {
         setTimeout(hidePreloader, 350);
      } else {
         window.addEventListener('load', function() {
            setTimeout(hidePreloader, 400);
         });
      }

      // Safety fallback (maximum 2.2 seconds)
      setTimeout(hidePreloader, 2200);
   })();
</script>
