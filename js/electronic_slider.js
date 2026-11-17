/**
 * TOÀN DANH (TODE CO., LTD) - MODERN CORPORATE HERO SLIDER
 * Clean, standard, ultra-smooth transition slider with responsive touch swipe & dots navigation
 */

(function ($) {
  'use strict';

  var ModernSlider = function ($container, options) {
    this.$container = $container;
    this.$wrapper = $container.find('.td-hero-slider-wrapper');
    this.$slides = $container.find('.td-hero-slide');
    this.$dots = $container.find('.td-dot');
    this.$prevBtn = $container.find('.td-slider-arrow.td-prev-arrow');
    this.$nextBtn = $container.find('.td-slider-arrow.td-next-arrow');

    this.total = this.$slides.length;
    this.current = 0;
    this.isTransitioning = false;
    this.timer = null;
    this.duration = options && options.duration ? options.duration : 5000;
    this.touchStartX = 0;
    this.touchEndX = 0;

    if (this.total === 0) return;

    this.init();
  };

  ModernSlider.prototype = {
    init: function () {
      var self = this;

      // Set initial slide
      this.updateSlide(0, false);

      // Arrow clicks
      if (this.$prevBtn.length) {
        this.$prevBtn.on('click', function (e) {
          e.preventDefault();
          self.prev();
        });
      }

      if (this.$nextBtn.length) {
        this.$nextBtn.on('click', function (e) {
          e.preventDefault();
          self.next();
        });
      }

      // Dot click
      if (this.$dots.length) {
        this.$dots.on('click', function () {
          var index = parseInt($(this).data('slide-to'), 10);
          if (!isNaN(index) && index !== self.current) {
            self.goTo(index);
          }
        });
      }

      // Pause on hover
      this.$wrapper.on('mouseenter', function () {
        self.pause();
      }).on('mouseleave', function () {
        self.resume();
      });

      // Touch gestures for mobile
      this.$wrapper.on('touchstart', function (e) {
        if (e.originalEvent.touches && e.originalEvent.touches[0]) {
          self.touchStartX = e.originalEvent.touches[0].clientX;
        }
      });

      this.$wrapper.on('touchend', function (e) {
        if (e.originalEvent.changedTouches && e.originalEvent.changedTouches[0]) {
          self.touchEndX = e.originalEvent.changedTouches[0].clientX;
          self.handleSwipe();
        }
      });

      // Keyboard left / right
      $(document).on('keydown', function (e) {
        if (!self.isElementInViewport(self.$container[0])) return;
        if (e.keyCode === 37) {
          self.prev();
        } else if (e.keyCode === 39) {
          self.next();
        }
      });

      // Start auto play
      this.startTimer();
    },

    handleSwipe: function () {
      var diff = this.touchStartX - this.touchEndX;
      var threshold = 40;
      if (Math.abs(diff) > threshold) {
        if (diff > 0) {
          this.next();
        } else {
          this.prev();
        }
      }
    },

    goTo: function (index) {
      if (this.isTransitioning || index === this.current) return;
      this.updateSlide(index, true);
    },

    next: function () {
      if (this.isTransitioning) return;
      var nextIdx = (this.current + 1) % this.total;
      this.updateSlide(nextIdx, true);
    },

    prev: function () {
      if (this.isTransitioning) return;
      var prevIdx = (this.current - 1 + this.total) % this.total;
      this.updateSlide(prevIdx, true);
    },

    updateSlide: function (nextIndex, isAnimated) {
      var self = this;
      this.isTransitioning = true;

      var $currentSlide = this.$slides.eq(this.current);
      var $nextSlide = this.$slides.eq(nextIndex);

      if (isAnimated) {
        $currentSlide.removeClass('active').addClass('fade-out');
        $nextSlide.addClass('active');

        setTimeout(function () {
          $currentSlide.removeClass('fade-out');
          self.isTransitioning = false;
        }, 500);
      } else {
        this.$slides.removeClass('active fade-out');
        $nextSlide.addClass('active');
        this.isTransitioning = false;
      }

      this.current = nextIndex;

      // Update dots
      if (this.$dots.length) {
        this.$dots.removeClass('active').eq(this.current).addClass('active');
      }

      // Reset auto timer
      this.startTimer();
    },

    startTimer: function () {
      var self = this;
      this.pause();
      this.timer = setInterval(function () {
        self.next();
      }, this.duration);
    },

    pause: function () {
      if (this.timer) {
        clearInterval(this.timer);
        this.timer = null;
      }
    },

    resume: function () {
      if (!this.timer) {
        this.startTimer();
      }
    },

    isElementInViewport: function (el) {
      var rect = el.getBoundingClientRect();
      return (
        rect.top < (window.innerHeight || document.documentElement.clientHeight) &&
        rect.bottom > 0
      );
    }
  };

  // jQuery plugin hook
  $.fn.modernSlider = function (options) {
    return this.each(function () {
      if (!$.data(this, 'modernSlider')) {
        $.data(this, 'modernSlider', new ModernSlider($(this), options));
      }
    });
  };

  // Auto initialize on DOM ready
  $(document).ready(function () {
    $('.td-hero-slider-container').modernSlider({
      duration: 5000
    });
  });

})(jQuery);
