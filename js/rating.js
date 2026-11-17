var reviews = {
    loadReviews: function(mode, page) {
        jQuery.ajax({
            type: "POST",
            url: "/lreview/index",
            data: {
                'id': jQuery("input[name='productIdForRv']").val(),
                'page': page
            },
            success: function(result) {
                clearResult = /(^\<\!\-\-)([A-Za-z0-9\s\_\-\:]*)(\>$)/gm;
                result = result.replace(clearResult, "").trim();
                if (typeof result == 'undefined') {
                    html = "<li><center>Hiện chưa có nhận xét nào. <br/>Hãy là người nhận xét đầu tiên</center></li>";
                    jQuery('.list-detail').append(html);
                } else {
                    data = JSON.parse(result);
                    // console.log(data);
                    if (mode == 1) {
                        reviews.renderReviews(data, page);
                    } else if (mode == 2) {
                        reviews.renderReviewsInProductView(data);
                    }
                }
            }
        });
    },
    sentReview: function() {
        var phoneFormat = /((09|03|07|08|05)+([0-9]{8})\b)/g;
        var hotenFormat = /^[^!@#$%^&*()_+=\-\[\]\:\'\"\;\.\?\<\>\|\\0-9]+$/g;
        var isOk = true;

        jQuery('.review #nickname-error').remove();
        jQuery('.review #phone-error').remove();
        jQuery('.review #detail-error').remove();

        var detail = jQuery('#detail').val().trim();
        //Stop XSS
        detail = detail.replace(/<br>/gi, "\n");
        detail = detail.replace(/<p.*>/gi, "\n");
        detail = detail.replace(/<a.*href="(.*?)".*>(.*?)<\/a>/gi, " $2 (Link->$1) ");
        detail = detail.replace(/<[^>]+>/g, '');

        var nickname = jQuery('.review #nickname').val().trim();
        var phone = jQuery('.review #phone').val().trim();

        if (nickname == '') {
            isOk = false;
            jQuery('.review #nickname').addClass('error-note');
            jQuery('.review #nickname').after(
                '<label id="nickname-error" class="error" for="nickname">Quý khách vui lòng điền họ tên</label>'
            );
        } else if (hotenFormat.test(nickname) == false || nickname.length > 40) {
            isOk = false;
            jQuery('.review #nickname').addClass('error-note');
            jQuery('.review #nickname').after(
                '<label id="nickname-error" class="error" for="nickname">Quý khách vui lòng kiểm tra lại thông tin</label>'
            );
        } else {
            jQuery('.review #nickname').removeClass('error-note');
            jQuery('.review #nickname-error').remove();
        }

        if (phone == '') {
            isOk = false;
            jQuery('.review #phone').addClass('error-note');
            jQuery('.review #phone').after(
                '<label id="phone-error" class="error" for="phone">Quý khách vui lòng điền số điện thoại</label>'
            );
        } else if (phoneFormat.test(phone) == false) {
            isOk = false;
            jQuery('.review #phone').addClass('error-note');
            jQuery('.review #phone').after(
                '<label id="phone-error" class="error" for="phone">Quý khách vui lòng kiểm tra lại thông tin</label>'
            );
        } else {
            jQuery('.review #phone').removeClass('error-note');
            jQuery('.review #phone-error').remove();
        }

        if (detail == '') {
            isOk = false;
            jQuery('.review #detail').addClass('error-note');
            jQuery('.review #detail').after(
                '<label id="detail-error" class="error" for="detail">Quý khách vui lòng điền nội dung đánh giá</label>'
            );
        } else if (detail.length > 1500) {
            isOk = false;
            jQuery('.review #detail').addClass('error-note');
            jQuery('.review #detail').after(
                '<label id="detail-error" class="error" for="detail">Nội dung đánh giá không nên quá 1500 chữ</label>'
            );
        } else {
            jQuery('.review #detail').removeClass('error-note');
            jQuery('.review #detail-error').remove();
        }


        if (isOk) {
            var formData = new FormData(jQuery('#formReview')[0]);
            formData.set('detail', detail);

            jQuery.ajax({
                type: "POST",
                url: "/lreview/index/post",
                data: formData,
                contentType: false,
                processData: false,
                success: function(result) {
                    clearResult = /(^\<\!\-\-)([A-Za-z0-9\s\_\-\:]*)(\>$)/gm;
                    result = result.replace(clearResult, "").trim();
                    data = JSON.parse(result);

                    if (data.Message) {
                        alert(data.Message);
                        location.reload();
                        // jQuery('.formReview').hide();
                        // jQuery('.guiDanhGia').text('Gửi đánh giá của bạn');
                        // jQuery('#formReview').trigger("reset");
                    }
                }
            });
        }

        return false;
    },
    rating: function() {
        jQuery(document).on({
            mouseover: function(event) {
                jQuery(this).find('.fa').addClass('star-over');
                jQuery(this).prevAll().find('.fa').addClass('star-over');
            },
            mouseleave: function(event) {
                jQuery(this).find('.fa').removeClass('star-over');
                jQuery(this).prevAll().find('.fa').removeClass('star-over');
            }
        }, '.rate');

        jQuery(document).on('click', '.rate', function() {
            if (!jQuery(this).find('.star').hasClass('rate-active')) {
                jQuery(this).siblings().find('.star').addClass('fa-star-o').removeClass(
                    'fa-star rate-active');
                jQuery(this).find('.star').addClass('rate-active fa-star').removeClass('fa-star-o');
                jQuery(this).prevAll().find('.star').addClass('fa-star').removeClass('fa-star-o');
            } else {
                jQuery('.review').show();
                console.log('Đã chọn');
            }
        });
    },
    showInputRating: function() {
        jQuery(document).on('click', '.guiDanhGia', function() {
            if (!jQuery('.formReview').hasClass('active')) {
                jQuery('.formReview').addClass('active');
                jQuery('.formReview').show();
                jQuery('.guiDanhGia').text('Đóng');
            } else {
                jQuery('.formReview').removeClass('active');
                jQuery('.formReview').hide();
                jQuery('.guiDanhGia').text('Gửi đánh giá của bạn');
            }

        })
    },
    smemberCheck: function(data) {
        var _data = data.trim().toLowerCase();
        var _smember = false;
        var _arr = ["snew", "smem", "svip", "svips"];

        jQuery.each(_arr, function(index, item) {
            var _check = _data.indexOf(item);
            if (_check !== -1) {
                _smember = true;
                return false;
            }
        });

        return _smember;
    },
    renderReviews: function(data, page) {
        var html = "";
        if (typeof data['reviews'] === 'undefined' || data['reviews'] === null) {
            if (page == 0) {
                html = "<li><center>Hiện chưa có nhận xét nào. <br/>Hãy là người nhận xét đầu tiên</center></li>";
            }
            jQuery('.loadMore').html('');
            jQuery('.list-detail').append(html);
        } else {
            var count = ~~jQuery("input[name='dataLoad']").val() + data['reviews'].length;
            var all = ~~jQuery("input[name='countAll']").val();
            jQuery("input[name='dataLoad']").val(count);

            data['reviews'].forEach(function(item, index) {
                var id = item['id'];
                var nickname = item['nickname'];
                var smember = item['smember'];
                var content = item['content'];
                var date = item['date'];
                var images = item['images'];
                var value = ~~item['value'];

                // Phần HTML Rating

                var html_rating = "<span>";
                for (var i = 1; i <= 5; i++) {
                    if (i <= value) {
                        html_rating += `<i class="fa fa-star checked"></i>`;
                    } else {
                        html_rating += `<i class="fa fa-star"></i>`;
                    }
                }
                html_rating += "</span>";

                // Phần HTML Images
                var _html_images = "";
                if (images !== null) {
                    images = images.split(" | ");
                    images.forEach(function(image) {
                        if (image != "") {
                            _html_images += `
                        <a href="https://cdn.cellphones.com.vn/media` + image + `" data-toggle="lightbox" data-gallery="gallery-op">
                            <img class="lazyload" data-src="https://cdn.cellphones.com.vn/media` + image + `">
                        </a>
                    `;
                        }
                    });
                }

                jQuery('.imgReviews').append(_html_images);
                var html_images = `<div class="review-images">` + _html_images + `</div>`;

                // Phần Smember
                var _html_smember = "";

                if (reviews.smemberCheck(smember)) {
                    _html_smember = `<label class="smemberRv"><i class="fa fa-check-circle" aria-hidden="true"></i> Đã mua tại CellphoneS</label>`;
                }

                // Phần HTML Reviewer

                html += `
            <li id="review-` + id + `">
                <div class="reviewer"><span>` + nickname + `</span> | ` + _html_smember + ` | Ngày ` + date + `</div>
                <div class="review-content">
                    <p>` + html_rating + `<i>` + content + `</i></p>
                    ` + html_images + `
                </div>
            </li>
            <hr/>
        `;
            });

            jQuery('.list-detail').append(html);

            if (count >= all) {
                jQuery('.loadMore').html('');
            } else {
                jQuery('.loadMore').html('<a href="javascript:reviews.loadReviews(1,' + (page + 1) + ')">Xem thêm</a>');
            }

            jQuery('img.lazyload').lazyload();

            jQuery(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                jQuery(this).ekkoLightbox();
            });

        }
    },
    renderReviewsInProductView: function(data) {
        var html = "";
        if (typeof data['reviews'] == 'undefined' || data['reviews'] === null) {
            jQuery('.loadAll').remove();
            html = "<li><center>Hiện chưa có nhận xét nào. <br/>Hãy là người nhận xét đầu tiên</center></li>";
            jQuery('.list-detail').append(html);
        } else {
            jQuery.each(data['reviews'], function(index, item) {
                var id = item['id'];
                var nickname = item['nickname'];
                var smember = item['smember'];
                var content = item['content'];
                var date = item['date'];
                var value = ~~item['value'];

                // Phần HTML Rating

                var html_rating = "<span>";
                for (var i = 1; i <= 5; i++) {
                    if (i <= value) {
                        html_rating += `<i class="fa fa-star checked"></i>`;
                    } else {
                        html_rating += `<i class="fa fa-star"></i>`;
                    }
                }
                html_rating += "</span>";

                // Phần Smember
                var _html_smember = "";

                if (reviews.smemberCheck(smember)) {
                    _html_smember = `<label class="smemberRv"><i class="fa fa-check-circle" aria-hidden="true"></i> Đã mua tại CellphoneS</label>`;
                }

                // Phần HTML Reviewer

                html += `
            <li id="review-` + id + `">
            <div class="reviewer"><span>` + nickname + `</span> | ` + _html_smember + ` | Ngày ` + date + `</div>
                <div class="review-content">
                    <p>` + html_rating + `<i>` + content + `</i></p>
                </div>
            </li>
            <hr/>
        `;

                if (index > 1) {
                    return false;
                }
            });

            jQuery('.list-detail').append(html);
        }

        if (data['images'] !== "") {
            var _html_images = "";
            jQuery.each(data['images'], function(index, item) {
                // Phần HTML Images
                item = item.split(" | ");
                item.forEach(function(image) {
                    if (image != "") {
                        _html_images += `
                            <img src="https://cdn.cellphones.com.vn/media` + image + `">
                        `;
                    }
                });

                if (index > 2) {
                    return false;
                }
            });
            jQuery('.imgReviews').append(_html_images);
        }
    }
}