/**
 * TOÀN DANH (TODE CO., LTD) - SMART LAZYLOAD SYSTEM
 * Ultra-fast, zero-dependency, IntersectionObserver-powered image lazyloader with Shimmer Skeleton & Silky Smooth Fade-in
 */

(function() {
  'use strict';

  var ToanDanhLazyLoad = {
    observer: null,
    bgObserver: null,

    init: function() {
      var self = this;

      // 1. Prepare existing DOM images
      this.prepareImages();

      // 2. Setup IntersectionObserver
      if ('IntersectionObserver' in window) {
        this.observer = new IntersectionObserver(function(entries, observer) {
          entries.forEach(function(entry) {
            if (entry.isIntersecting) {
              self.loadImage(entry.target);
              observer.unobserve(entry.target);
            }
          });
        }, {
          root: null,
          rootMargin: '250px 0px 250px 0px', // Preload when 250px away
          threshold: 0.01
        });

        this.bgObserver = new IntersectionObserver(function(entries, observer) {
          entries.forEach(function(entry) {
            if (entry.isIntersecting) {
              self.loadBg(entry.target);
              observer.unobserve(entry.target);
            }
          });
        }, {
          root: null,
          rootMargin: '250px 0px 250px 0px',
          threshold: 0.01
        });

        this.observeAll();
      } else {
        // Fallback for very old browsers without IntersectionObserver
        this.loadAllImmediately();
      }

      // 3. Setup MutationObserver for dynamic content (AJAX, tabs, etc.)
      if ('MutationObserver' in window) {
        var domObserver = new MutationObserver(function(mutations) {
          var shouldReindex = false;
          mutations.forEach(function(mutation) {
            if (mutation.addedNodes.length > 0) {
              shouldReindex = true;
            }
          });
          if (shouldReindex) {
            self.prepareImages();
            self.observeAll();
          }
        });

        domObserver.observe(document.body, {
          childList: true,
          subtree: true
        });
      }
    },

    prepareImages: function() {
      // Find candidate images that are not yet loaded and not part of the active banner slide 1
      var selector = 'img:not(.td-lazyload):not(.td-loaded):not(.default_logo):not(.logo-mobile)';
      var images = document.querySelectorAll(selector);

      images.forEach(function(img) {
        // Don't lazyload the first slide of banner or main logo for best LCP
        if (img.closest('.electronic-slide:first-child')) {
          return;
        }

        // Add native loading="lazy"
        img.setAttribute('loading', 'lazy');

        // Check if img is inside product cards, news, or partners
        var parentBox = img.closest('.woo_product_image, .picture, .clients_image, .wgl-products li');
        if (parentBox && !parentBox.classList.contains('td-shimmer-wrap')) {
          parentBox.classList.add('td-shimmer-wrap');
        }

        // Convert src to data-src if not already done
        var src = img.getAttribute('src');
        if (src && !img.getAttribute('data-src')) {
          img.setAttribute('data-src', src);
          img.removeAttribute('src');
        }

        var srcset = img.getAttribute('srcset');
        if (srcset && !img.getAttribute('data-srcset')) {
          img.setAttribute('data-srcset', srcset);
          img.removeAttribute('srcset');
        }

        img.classList.add('td-lazyload');
      });

      // Background image elements (e.g. .news-img with inline background-image)
      var bgElements = document.querySelectorAll('[style*="background-image"]:not(.td-bg-lazyload):not(.td-loaded)');
      bgElements.forEach(function(el) {
        var style = el.getAttribute('style') || '';
        var match = style.match(/background-image:\s*url\((['"]?)(.*?)\1\)/i);
        if (match && match[2]) {
          var bgUrl = match[2];
          el.setAttribute('data-bg', bgUrl);
          // Remove background-image from inline style temporarily
          el.style.backgroundImage = 'none';
          el.classList.add('td-bg-lazyload', 'td-shimmer-wrap');
        }
      });
    },

    observeAll: function() {
      var self = this;
      var lazyImgs = document.querySelectorAll('img.td-lazyload:not(.td-observing)');
      lazyImgs.forEach(function(img) {
        img.classList.add('td-observing');
        self.observer.observe(img);
      });

      var lazyBgs = document.querySelectorAll('.td-bg-lazyload:not(.td-observing)');
      lazyBgs.forEach(function(el) {
        el.classList.add('td-observing');
        self.bgObserver.observe(el);
      });
    },

    loadImage: function(img) {
      var dataSrc = img.getAttribute('data-src');
      var dataSrcset = img.getAttribute('data-srcset');

      var onComplete = function() {
        img.classList.add('td-loaded');
        var shimmerParent = img.closest('.td-shimmer-wrap');
        if (shimmerParent) {
          shimmerParent.classList.add('td-loaded');
        }
      };

      if (dataSrcset) {
        img.setAttribute('srcset', dataSrcset);
      }

      if (dataSrc) {
        // Preload in memory to ensure smooth reveal
        var tempImg = new Image();
        tempImg.onload = function() {
          img.setAttribute('src', dataSrc);
          onComplete();
        };
        tempImg.onerror = function() {
          img.setAttribute('src', dataSrc);
          onComplete();
        };
        tempImg.src = dataSrc;
      } else {
        onComplete();
      }
    },

    loadBg: function(el) {
      var dataBg = el.getAttribute('data-bg');
      if (dataBg) {
        var tempImg = new Image();
        tempImg.onload = function() {
          el.style.backgroundImage = 'url("' + dataBg + '")';
          el.classList.add('td-loaded');
        };
        tempImg.onerror = function() {
          el.classList.add('td-loaded');
        };
        tempImg.src = dataBg;
      }
    },

    loadAllImmediately: function() {
      var imgs = document.querySelectorAll('img[data-src]');
      imgs.forEach(function(img) {
        img.setAttribute('src', img.getAttribute('data-src'));
        img.classList.add('td-loaded');
      });

      var bgs = document.querySelectorAll('[data-bg]');
      bgs.forEach(function(el) {
        el.style.backgroundImage = 'url("' + el.getAttribute('data-bg') + '")';
        el.classList.add('td-loaded');
      });
    }
  };

  // Reliable Menu Hover Support for Primary Nav
  function initMenuDropdowns() {
    if (typeof jQuery !== 'undefined') {
      jQuery(function($) {
        $('.primary-nav li.menu-item-has-children, .primary-nav li:has(> ul.sub-menu)')
          .on('mouseenter', function() {
            $(this).addClass('td-hover-open');
          })
          .on('mouseleave', function() {
            $(this).removeClass('td-hover-open');
          });
      });
    }
  }

  // Run on DOM ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function() {
      ToanDanhLazyLoad.init();
      initMenuDropdowns();
    });
  } else {
    ToanDanhLazyLoad.init();
    initMenuDropdowns();
  }

  // Export for external trigger if needed
  window.ToanDanhLazyLoad = ToanDanhLazyLoad;

})();
