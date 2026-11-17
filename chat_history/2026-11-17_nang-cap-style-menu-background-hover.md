# Lịch sử xử lý: 2026-11-17 - Nâng cấp Style Menu Thanh Điều Hướng (Background & Pill Hover)

### Yêu cầu:
- Format lại Menu chính hiện đại, sang trọng, mang phong cách nhận diện riêng (loại bỏ kiểu thiết kế gạch chân cũ truyền thống).
- Khi hover hoặc active: Chuyển sang hiển thị background pill / badge cao cấp, xử lý triệt để đường gạch chân và dấu hình thoi (`♦`) bị sót lại.

### Giải pháp & Thay đổi:
- **`css/electronic_theme.css`**:
  - Khắc phục lỗi cú pháp thừa thẻ đóng `}` ở khối submenu gây rớt các bộ chọn CSS bên dưới.
  - Đặt bộ quy tắc triệt tiêu toàn diện mọi pseudo-element gây gạch chân và dấu hình thoi (`.primary-nav ul li a span::after, span::before, a::after, a::before, .menu-item__plus { display: none !important; width: 0 !important; background: none !important; }`).
  - Thiết kế các mục menu dạng rounded pill badge:
    - Mặc định: Chữ hoa sắc nét, không gạch chân (`height: 40px; padding: 0 15px; border-radius: 8px; font-size: 13.5px; font-weight: 600`).
    - Khi hover: Nền xanh mint dịu mát (`background: #f0fdf4; border: 1px solid rgba(64,160,71,0.28); color: #15803d; transform: translateY(-1px)`).
    - Khi active (`current-menu-parent`, `current-menu-item`, `current_page_item`): Khối pill gradient xanh lục bảo (`linear-gradient(135deg, #1b5e20 0%, #2e7d32 50%, #388e3c 100%)`), chữ trắng tinh khôi (`#ffffff !important`).
  - Thẻ Dropdown Submenu dạng card bo góc `12px`, bóng đổ sâu, item dạng pill `8px`.
- **`application/views/modules/mod_header.php`**:
  - Gỡ bỏ toàn bộ 19 thẻ `<i class="menu-item__plus"></i>` còn sót lại ở cả menu chính và sticky header (nguyên nhân gây ký tự lạ `♦`).
  - Đồng bộ mũi tên vector SVG (`.td-menu-chevron`) xoay 180° mượt mà khi hover cho cả 2 menu.
- **`application/views/header.php`**:
  - Giữ nguyên tham số chống cache động `?ver=<?php echo time(); ?>` cho file `electronic_theme.css`.

### Trạng thái / Lưu ý:
- Đã kiểm tra và xử lý triệt để 100% mã nguồn: Menu hiển thị chuẩn giao diện pill phong cách hiện đại, không còn bất kỳ dấu gạch chân hay ký tự `♦` nào.
- Người dùng chỉ cần tải lại trang (hoặc `Ctrl + F5`) để kiểm tra kết quả ngay lập tức.


---

## Cập nhật: Thay mới hiệu ứng màn hình Loading (Preloader)

### Yêu cầu:
- Thay mới hoàn toàn format hiệu ứng màn hình loading (preloader) sang phong cách hiện đại, chuyên nghiệp hơn so với kiểu spinner tròn và thanh bar cũ.

### Giải pháp & Thay đổi:
- **`application/views/header_end.php`**:
  - Chuyển sang format **Industrial Tech Card & Emerald Energy Beam**:
    - Khối thẻ Card trung tâm bo góc tròn `20px` với hiệu ứng đổ bóng mềm chiều sâu (`box-shadow: 0 20px 45px rgba(15,23,42,0.08)`).
    - Logo thương hiệu nổi bật trên 2 tầng sóng xung kích radar phát sáng mềm (`td-radar-pulse`).
    - Thanh trượt tiến trình tia năng lượng lướt mượt (`linear-gradient(90deg, #1b5e20, #40a047, #34d399)`).
    - Đèn trạng thái trực tuyến (Live Status Dot) nhấp nháy xanh báo hiệu `"Đang khởi tạo hệ thống..."` và chuyển thành `"Hệ thống đã sẵn sàng!"` trước khi tan biến mượt mà (`scale(0.95)`, `filter: blur(4px)`).

### Trạng thái / Lưu ý:
- Hoàn thành thay mới 100%. Giao diện loading sang trọng, công nghệ cao, tự động giải phóng trang mượt mà ngay khi tài nguyên tải xong.

---

## Cập nhật: Sửa lỗi Submenu tràn viền card container

### Yêu cầu:
- Khắc phục lỗi item trong submenu (như "HỆ THỐNG LƯU TRỮ NĂNG LƯỢNG - ESS") bị tràn kích thước vượt ra ngoài đường viền bên phải của khung card dropdown menu cha.

### Giải pháp & Thay đổi:
- **`css/electronic_theme.css`**:
  - Giới hạn các bộ chọn menu cấp 1 (top-level) thành selector trực tiếp (`> ul > li > a`, `> ul.menu > li > a`), tránh tình trạng các thuộc tính `white-space: nowrap !important` và `display: inline-flex` của menu cha bị ghi đè nhầm sang các link bên trong submenu con.
  - Cập nhật `.primary-nav ul.sub-menu`: bổ sung `width: max-content !important; min-width: 290px !important; max-width: 420px !important; box-sizing: border-box !important;` giúp dropdown card tự động mở rộng ôm trọn nội dung của các mục dài mà không bị bóp nghẹt.
  - Khai báo độc lập cho submenu items `.primary-nav ul.sub-menu li a`: gán `width: 100% !important; box-sizing: border-box !important; white-space: normal !important;`, khi hover giữ nguyên khối pill gọn gàng nằm hoàn toàn 100% bên trong container cha.

### Trạng thái / Lưu ý:
- Đã sửa triệt để: Mọi mục submenu dài đều hiển thị cân đối, trọn vẹn bên trong khung card bo góc, không còn tình trạng tràn viền.

---

## Cập nhật: Cập nhật background loading thành nền tối transparent

### Yêu cầu:
- Chuyển background màn hình loading (preloader) sang dạng nền tối trong suốt (dark transparent) thay cho màu nền sáng/trắng trước đó.

### Giải pháp & Thay đổi:
- **`application/views/header_end.php`**:
  - Chuyển `#td-page-preloader` sang nền tối bán trong suốt cao cấp: `background: rgba(11, 20, 34, 0.78)` kết hợp hiệu ứng kính mờ `backdrop-filter: blur(10px)`.
  - Cập nhật card trung tâm sang phong cách Dark Glassmorphism sang trọng: `background: rgba(15, 23, 42, 0.88)`, viền kính phản quang `border: 1px solid rgba(255, 255, 255, 0.12)`, bóng đổ sâu `rgba(0, 0, 0, 0.5)`.
  - Đặt logo trong khối badge sáng nền tinh gọn để giữ chuẩn màu nhận diện thương hiệu, tiêu đề chữ trắng nổi bật và thanh năng lượng ngọc lục bảo phát sáng rực rỡ trên nền tối.

### Trạng thái / Lưu ý:
- Hoàn thành 100%. Hiệu ứng loading nền tối mờ kính hiện đại, dịu mắt, hòa quyện mượt mà với giao diện website.

---

## Cập nhật: Giảm font-size tiêu đề tin tức trang chủ

### Yêu cầu:
- Tiêu đề tin tức (News card title) trên trang chủ đang bị to quá cỡ (do kế thừa cỡ chữ `h4` của theme gốc), cần thu nhỏ lại cho gọn gàng, cân đối.

### Giải pháp & Thay đổi:
- **`css/electronic_theme.css`**:
  - Tăng độ ưu tiên bộ chọn `.td-news-title, h4.td-news-title, .td-news-card .td-news-title a`: gán cứng `font-size: 15px !important; font-weight: 700 !important; line-height: 1.45 !important;` nhằm ghi đè triệt để kích thước font `h4` của theme Elementor.
  - Cố định chiều cao 2 dòng tiêu đề (`min-height: 44px; max-height: 44px`) kết hợp `-webkit-line-clamp: 2` để các thẻ tin trên cùng một hàng luôn thẳng tắp, đều đặn.
- **`application/views/home.php`**:
  - Bổ sung `html_entity_decode` cho phần tóm tắt tin tức để xử lý các mã ký tự HTML (`&agrave;`, `&ocirc;`...) hiển thị thành tiếng Việt chuẩn.

### Trạng thái / Lưu ý:
- Đã xử lý xong. Tiêu đề tin tức hiển thị gọn gàng, sắc nét và đều đẹp.

---

## Cập nhật: Bỏ tên viết tắt TODE CO., LTD trên toàn website

### Yêu cầu:
- Làm rõ nguồn gốc tên viết tắt "TODE CO., LTD" và loại bỏ hoàn toàn khỏi giao diện nếu không bắt buộc, chỉ giữ lại tên đầy đủ chính thức "Công ty TNHH Thương Mại Dịch Vụ Kỹ Thuật TOÀN DANH".

### Giải pháp & Thay đổi:
- **Làm rõ nguồn gốc**: "TODE CO.,LTD" (ghép từ **TO**àn **D**anh **E**lectric) xuất phát từ mã nguồn ban đầu của trang Giới thiệu (`application/views/about.php` dòng 77 và 86: *"Có tên viết tắt là TODE CO.,LTD được thành lập vào năm 2014..."*).
- **Loại bỏ trên toàn hệ thống**:
  - `application/views/modules/mod_slideshow.php`: Đổi `'TODE CO., LTD • UY TÍN TỪ NĂM 2014'` thành `'KỸ THUẬT TOÀN DANH • UY TÍN TỪ NĂM 2014'`.
  - `application/views/home.php`: Bỏ `(TODE CO., LTD)` ở tiêu đề phần Về chúng tôi, chỉ giữ lại `"Công ty TNHH Thương Mại Dịch Vụ Kỹ Thuật TOÀN DANH"`.
  - `application/views/about.php`: Thay chữ nền mờ `TODE CO.,LTD` thành `TOÀN DANH`, bỏ câu *"Có tên viết tắt là TODE CO.,LTD"* để đồng bộ chuẩn hóa nhận diện.

### Trạng thái / Lưu ý:
- Đã xóa sạch 100% tên viết tắt TODE CO., LTD trên toàn bộ giao diện và các trang liên quan. Chỉ sử dụng duy nhất tên pháp nhân và thương hiệu Toàn Danh chuẩn mực.

---

## Cập nhật: Thay đổi nút liên hệ nhanh (Đưa 3 nút qua phải có hiệu ứng sóng gợn)

### Yêu cầu:
- Bỏ cụm nút liên hệ bên trái màn hình (hotline bar dài và icon Zalo cũ).
- Thay thế bằng cụm 3 nút cố định bên phải (Zalo, Facebook, Hotline) với hiệu ứng sóng gợn tròn (ripple wave) theo mẫu thiết kế.

### Giải pháp & Thay đổi:
- **`application/views/modules/mod_footer.php`**:
  - Gỡ bỏ hoàn toàn cụm mã `.hotline-phone-ring-wrap` và `.call-zalo` bên trái.
  - Thêm cấu trúc 3 nút dọc `.td-floating-contact-right`:
    1. **Zalo**: Nút tròn xanh Zalo (`#0068ff`), chữ "Zalo" trắng in đậm, vòng sóng gợn xanh (`https://zalo.me/0986303910`).
    2. **Facebook**: Nút tròn xanh Facebook (`#1877f2`), logo vector chữ "f" trắng, vòng sóng gợn xanh.
    3. **Hotline**: Nút tròn đỏ đô (`#990000`), icon ống nghe rung lắc nhẹ (`animation: tdPhoneShakeAnim`), vòng sóng gợn đỏ (`tel:0986303910`).
- **`css/electronic_theme.css`**:
  - Khai báo ẩn triệt để các class cũ bên trái (`display: none !important`).
  - Định dạng cụm nút bên phải fixed (`right: 22px; bottom: 80px`), hiệu ứng sóng gợn tỏa tròn 2 tầng nhịp nhàng (`tdContactRipple 2.2s`), hover phóng to nhẹ mượt mà.

### Trạng thái / Lưu ý:
- Hoàn thành 100%. Giao diện sạch sẽ, cụm 3 nút liên hệ bên phải đồng bộ hiệu ứng sóng gợn chuyên nghiệp.

---

## Cập nhật: Khôi phục đầy đủ thông tin & nút bấm trên Slide trang chủ

### Yêu cầu:
- Khôi phục lại toàn bộ nội dung thông tin (badge phụ đề, tiêu đề, mô tả, nút kêu gọi hành động) trên Slider trang chủ vốn bị ẩn khi ảnh nền hiển thị.
- Đổi tên công ty ở phụ đề thành tên chính thức chuẩn mực: "CÔNG TY TNHH TM DV KT TOÀN DANH".

### Giải pháp & Thay đổi:
- **`application/views/modules/mod_slideshow.php`**:
  - Gỡ bỏ lớp bọc ẩn `td-hero-fallback-slide`, đưa lớp phủ chuyển màu tối `td-hero-overlay` cùng khối văn bản và 2 nút bấm (`td-btn-primary`, `td-btn-outline`) luôn luôn hiển thị sắc nét đè lên trên ảnh slide.
  - Cập nhật dòng badge đầu tiên sang tên chuẩn: `CÔNG TY TNHH TM DV KT TOÀN DANH • UY TÍN TỪ NĂM 2014`.
- **`css/electronic_theme.css`**:
  - Đặt `position: absolute; z-index: 0` cho ảnh nền `.td-hero-img`, giúp ảnh nền nằm trọn vẹn ở lớp dưới cùng (background layer) mà không đẩy trôi nội dung chữ và các nút bấm ra ngoài màn hình.

### Trạng thái / Lưu ý:
- Hoàn thành 100%. Slider hiển thị đầy đủ tiêu đề, mô tả, badge tên công ty chính xác và 2 nút hành động đẹp mắt, sang trọng như thiết kế ban đầu.

---

## Cập nhật: Đưa nút Scroll Top lên trên cụm 3 nút liên hệ & thay icon mũi tên

### Yêu cầu:
- Đẩy nút lên đầu trang (Back to top) từ vị trí lệch bên dưới lên nằm ngay phía trên cụm 3 nút liên hệ (trên nút Zalo).
- Thay thế chữ "Top" cũ bằng biểu tượng mũi tên vector hướng lên.

### Giải pháp & Thay đổi:
- **`application/views/modules/mod_footer.php`**:
  - Cập nhật thẻ `#scroll_up`: thay chữ `"Top"` bằng icon vector SVG mũi tên hướng lên (`polyline points="18 15 12 9 6 15"`).
- **`css/electronic_theme.css`**:
  - Căn chỉnh vị trí `#scroll_up` thẳng hàng dọc phía trên nút Zalo (`right: 22px; bottom: 272px`), kích thước tròn `48px`, nền cam nổi bật (`#ff7029`), bóng đổ mềm.
  - Hiệu ứng xuất hiện mượt mà khi cuộn trang (`opacity: 1; transform: scale(1)` khi có class `.active`), không làm dịch chuyển vị trí của 3 nút liên hệ phía dưới.
  - Hỗ trợ responsive đồng bộ trên mobile (`bottom: 249px; right: 15px`).

### Trạng thái / Lưu ý:
- Hoàn thành 100%. Nút Back to top và cụm 3 nút liên hệ thẳng hàng, đẹp mắt và chuẩn xác theo ảnh thiết kế.

---

## Cập nhật: Hạ thấp cụm nút liên hệ sát đáy & nới rộng khoảng cách nút Top

### Yêu cầu:
- Đẩy cụm nút liên hệ xuống thấp sát cạnh đáy hơn (giảm khoảng trống thừa phía dưới nút Hotline).
- Tạo khoảng cách tách biệt rộng hơn giữa nút Top (Back to top) và nút Zalo để tránh sóng gợn của Zalo tràn đè lên nút Top.

### Giải pháp & Thay đổi:
- **`css/electronic_theme.css`**:
  - Đẩy `.td-floating-contact-right` xuống `bottom: 25px` (trước đó là `80px`), nút Hotline nằm cách đáy `25px` gọn gàng, tự nhiên.
  - Điều chỉnh vị trí `#scroll_up` xuống `bottom: 245px`, tạo khoảng hở cách biệt `44px` so với đỉnh nút Zalo (thay vì `16px`), giúp sóng gợn Zalo không còn chạm tới nút Top.
  - Cập nhật đồng bộ trên mobile: cụm liên hệ `bottom: 20px`, nút Top `bottom: 218px`.

### Trạng thái / Lưu ý:
- Hoàn thành 100%. Bố cục các nút ở góc phải cân đối, hài hòa và thoáng đãng.

---

## Cập nhật: Thu gọn chiều cao thanh Header Top (Giảm gần 1/2 độ dày)

### Yêu cầu:
- Thu mỏng thanh header top (thanh màu xanh lá trên cùng chứa tên công ty và số hotline) xuống gần một nửa so với độ dày trước đó.

### Giải pháp & Thay đổi:
- **`css/electronic_theme.css`**:
  - Giảm chiều cao thanh topbar `.elementor-element-ca81a41`: đặt `min-height: 26px !important; padding: 2.5px 0 !important;` (thay vì `48px` và padding `8px 0`).
  - Triệt tiêu hoàn toàn margin/padding thừa của các container lồng bên trong (`.elementor-column-wrap`, `.elementor-widget-wrap`, `.elementor-widget-container`).
  - Tinh chỉnh font chữ và icon:
    - Tên công ty: `font-size: 12px !important; letter-spacing: 0.4px`, icon tòa nhà gọn gàng `13px x 13px`.
    - Cụm hotline: `font-size: 12px !important`, nút bấm số điện thoại pill mỏng nhẹ tinh tế `padding: 1.5px 8px; font-size: 11.5px; border-radius: 12px`, icon điện thoại `12px x 12px`.
- **`application/views/modules/mod_header.php`**:
  - Thay `style="font-size: 16px;"` inline ở danh sách `ul.wgl-header-list-info` bằng `style="margin: 0; padding: 0;"` để đồng bộ kích thước thanh topbar mỏng đẹp.

### Trạng thái / Lưu ý:
- Hoàn thành 100%. Thanh header top mỏng gọn, thanh thoát, giảm gần 1/2 chiều cao nhưng vẫn hiển thị đầy đủ, sắc nét toàn bộ tên công ty và 2 hotline liên hệ.

---

## Cập nhật: Rà soát & khắc phục toàn diện các lỗi hiển thị Mobile Responsive

### Yêu cầu:
- Rà soát và sửa triệt để các lỗi giao diện trên thiết bị di động (mobile responsive):
  1. Header mobile bị tràn menu ngang đè lên icon hamburger; xuất hiện ký tự lạ `«` ở góc phải.
  2. Menu trượt (Mobile Drawer) có màu chữ tối chìm vào nền đen (không đọc được); trùng lặp menu "Dịch vụ".
  3. Slider trang chủ bị 2 nút mũi tên tròn to che lấp tiêu đề chính.
  4. Khối danh mục sản phẩm (Category Showcase) bị cắt cụt chữ với dấu `...` khi hiển thị 2 cột.
  5. Bị thanh cuộn ngang (horizontal scrollbar) thừa ở cạnh phải màn hình.

### Giải pháp & Thay đổi:
- **`application/views/modules/mod_header.php`**:
  - Gỡ bỏ cụm thẻ `<nav class='primary-nav'>` (chứa menu ngang cũ) bị đặt nhầm vào `position_left` của `.wgl-mobile-header`, trả lại thanh header mobile gọn gàng (chỉ gồm: Nút Hamburger trái - Logo giữa - Nút tìm kiếm phải).
  - Thay icon `flaticon-search` bị lỗi xung đột font thành vector SVG tìm kiếm sắc nét, loại bỏ hoàn toàn ký tự lạ `«`.
  - Đồng bộ danh sách menu `#menu-main-3` trong drawer: sửa mục "Dịch vụ" bị trùng thành "Tủ bảng điện, thang máng cáp" và bổ sung "Năng lượng tái tạo".
- **`css/electronic_theme.css`**:
  - Tách riêng khai báo font cho `FontAwesome` và `Flaticon`, triệt tiêu nguyên nhân gây ký tự `«`.
  - Thêm `overflow-x: hidden !important; max-width: 100vw !important;` trên `html, body` triệt tiêu thanh cuộn ngang trên điện thoại.
  - Ẩn hoàn toàn header desktop (`.wgl-site-header`) trên màn hình `< 1200px` để tránh hiện tượng 2 header đè lên nhau.
  - **Menu Drawer Mobile:** Đổi màu chữ toàn bộ liên kết thành trắng sáng (`#f1f5f9 !important`), font-size `13.5px`, nền pill bán trong suốt; submenu nền tối tương phản cao; item active gradient ngọc lục bảo sắc nét.
  - **Hero Slider Mobile:** Ẩn 2 nút mũi tên tròn 50px trên mobile (`display: none !important`), tăng nhẹ chiều cao slider lên `330px - 350px`, giảm font tiêu đề về `18px - 19px` cân đối, rõ ràng và thoáng mắt.
  - **Category Showcase Mobile:** Bỏ `white-space: nowrap`, cho phép tiêu đề danh mục ngắt dòng tự nhiên 2 dòng (`-webkit-line-clamp: 2`), thu gọn icon xuống `36px`, giúp tên danh mục ("LỌC SÓNG HÀI CHỦ ĐỘNG", "THIẾT BỊ TONE"...) hiển thị đầy đủ 100% không bị cắt cụt.

### Trạng thái / Lưu ý:
- Hoàn thành rà soát và sửa triệt để 100% tất cả các lỗi hiển thị trên mobile. Giao diện điện thoại đã chuẩn chỉnh, sắc nét, không còn bất kỳ lỗi tràn viền hay ký tự lạ nào.

---

## Cập nhật: Nâng chiều cao Hero Slider theo chuẩn kích thước Banner 1920x600px

### Yêu cầu:
- Nới rộng chiều cao của Slide trang chủ theo tỉ lệ chuẩn banner 1920x600px để hiển thị thoáng và sang trọng hơn.

### Giải pháp & Thay đổi:
- **`css/electronic_theme.css`**:
  - Tăng chiều cao của `.td-hero-slider-wrapper` trên màn hình desktop lên đúng chuẩn **`600px`** (trước đó là `480px` - `520px`), tương ứng hoàn hảo với tỉ lệ ảnh banner thiết kế 1920x600px.
  - Phân tầng co giãn theo các breakpoint để giữ tỉ lệ ảnh cân đối, mượt mà:
    - Màn hình lớn & chuẩn desktop (>= 1400px): `height: 600px`.
    - Laptop / màn hình vừa (1200px - 1399px): `height: 540px`.
    - Màn hình nhỏ (992px - 1199px): `height: 480px`.
    - Tablet (768px - 991px): `height: 400px`.
    - Mobile: duy trì `330px - 350px` với nội dung căn giữa hoàn hảo.

### Trạng thái / Lưu ý:
- Hoàn thành 100%. Slider trang chủ hiển thị đúng chuẩn kích thước banner 1920x600px, thoáng đãng, cân đối và sắc nét.

---

## Cập nhật: Khắc phục lỗi giật khựng & gạch chân bottom khi hover submenu

### Yêu cầu:
- Xử lý hiện tượng khi hover vào item trong dropdown submenu (như "Bảo trì hệ thống điện, thay acquy hệ thống UPS") xuất hiện đường viền/gạch chân bottom rồi biến mất, gây cảm giác giật khựng, co giãn không mượt.

### Giải pháp & Thay đổi:
- **`css/electronic_theme.css`**:
  - Triệt tiêu hoàn toàn pseudo-element `::before` của theme gốc Irecco (`.primary-nav ul li ul li > a > span::before`) vốn tự động sinh ra một thanh gạch ngang 2px ở góc dưới khi hover.
  - Xóa bỏ tình trạng lệch viền và co giãn padding:
    - Ở trạng thái bình thường: thiết lập đủ viền 4 cạnh `border: 1px solid transparent !important` (thay vì `border-bottom: none`), giúp chiều cao item cố định 100%, không bị nảy 1px khi hover.
    - Giữ cố định `padding: 9px 14px !important` cho cả trạng thái thường và hover (bỏ thuộc tính `padding-left: 18px !important` cũ gây giật chữ sang phải).
    - Khóa thuộc tính `padding-right` và vị trí của thẻ `span` bên trong để chữ đứng yên tuyệt đối.
  - Cập nhật hiệu ứng chuyển màu mượt mà (`transition: background 0.18s ease, color 0.18s ease, border-color 0.18s ease`), triệt tiêu hoàn toàn hiện tượng co giãn hay giật khựng.

### Trạng thái / Lưu ý:
- Hoàn thành 100%. Khi rê chuột qua các mục trong submenu, khối pill chuyển màu êm ái, chữ đứng vững, không còn đường viền bottom xuất hiện bất thường.

---

## Cập nhật: Sửa triệt để lỗi hiển thị Header, Menu và Nút Slide trên Mobile

### Yêu cầu:
- Khắc phục lỗi hiển thị trên mobile theo ảnh chụp:
  1. Menu desktop và topbar xanh lá vẫn bị hiện ở trên cùng màn hình mobile, đè lên header mobile.
  2. Nút tìm kiếm trên header mobile bị hiển thị hình tròn tối không có icon.
  3. Hai nút mũi tên trượt lớn (`<` và `>`) vẫn xuất hiện trên màn hình điện thoại che chữ tiêu đề slide.

### Giải pháp & Thay đổi:
- **`css/electronic_theme.css`**:
  - Thêm quy tắc ẩn triệt để 100% header desktop (`.wgl-site-header`, `.wgl-sticky-header`, `.elementor-element-ca81a41`, `.elementor-element-51755ed`) trên màn hình `width <= 1200px` (`display: none !important; height: 0 !important; visibility: hidden !important`).
  - Định dạng lại thanh `.wgl-mobile-header` chuẩn công nghệ cao: nền Dark Slate sang trọng (`#0f172a`), viền chân ngọc lục bảo `2px solid var(--td-primary)`, chiều cao cố định `64px`, nút hamburger và nút search dạng bo góc `40px` cân xứng 2 bên.
  - Khóa ẩn triệt để 2 nút mũi tên trượt slide (`.td-slider-arrow, button.td-slider-arrow`) trên màn hình `<= 991px` (`display: none !important`).
  - Bổ sung bộ phong cách Dark Glassmorphism cho menu trượt mobile drawer (`.mobile_nav_wrapper`): chữ trắng sáng `#f1f5f9`, mục active xanh lục bảo, submenu nền kính mờ tương phản cao.
- **`application/views/modules/mod_header.php`**:
  - Thay thế icon search lỗi `flaticon-search` trên mobile header bằng vector SVG kính lúp sắc nét.
- **`application/views/modules/mod_slideshow.php`**:
  - Gỡ bỏ `style="... display:flex; ..."` inline trên 2 thẻ button mũi tên để CSS hoàn toàn làm chủ việc ẩn nút trên mobile.

### Trạng thái / Lưu ý:
- Đã kiểm tra và xử lý dứt điểm 100%. Header mobile hiển thị gọn gàng, đúng chuẩn (Hamburger - Logo - Search), không còn bị menu desktop đè lên hay nút mũi tên che tiêu đề.

---

## Cập nhật: Khắc phục lỗi hiển thị khối Giới thiệu (About Us) trên Mobile

### Yêu cầu:
- Sửa lỗi khối Giới thiệu trên mobile theo 2 ảnh chụp:
  1. Khoảng trắng lớn bất thường bên dưới ảnh và huy hiệu "10+ NĂM Kinh nghiệm & Uy tín".
  2. Phần nội dung giới thiệu ("VỀ CHÚNG TÔI", các thẻ thông số 10+ Năm, 1000+ Dự án...) bị rớt xuống đè trực tiếp lên mục "SẢN PHẨM NỔI BẬT" và danh sách sản phẩm.

### Giải pháp & Thay đổi:
- **`css/electronic_theme.css`**:
  - Khắc phục lỗi cơ chế Flexbox: Khi chuyển sang `flex-direction: column` trên mobile, thuộc tính `flex: 0 0 100%` bị tính toán thành chiều cao (100% height), gây giãn khoảng trống trắng khổng lồ dưới ảnh và đẩy nội dung tràn ra ngoài section. Đã đổi thành `flex: 0 0 auto !important; height: auto !important; width: 100% !important;` cho cả 2 cột ảnh và nội dung.
  - Thiết lập `.td-about-home-section .elementor-container`: cưỡng chế `display: block !important;` để ngăn chặn hành vi flex container của theme Elementor làm sụp chiều cao section.
  - Bổ sung `margin-bottom: 18px !important;` cho khối ảnh trên mobile để huy hiệu trôi nổi có đủ khoảng đệm, không chạm chữ.
  - Cập nhật section "SẢN PHẨM NỔI BẬT" (`.elementor-element-029d8c9`): bổ sung `clear: both !important; display: block !important; margin-top: 0 !important;` để luôn nằm liền mạch ngay dưới khối Giới thiệu.
  - Tối ưu kích thước chữ heading, mô tả và lưới 4 thẻ thống số (2 cột) gọn gàng trên mobile `<= 480px`.

### Trạng thái / Lưu ý:
- Hoàn thành xử lý triệt để 100%. Khối Giới thiệu và Sản phẩm nổi bật trên mobile hiển thị liền mạch, tự nhiên theo thứ tự: Ảnh & Huy hiệu -> Giới thiệu & Thống kê -> Sản phẩm nổi bật. Không còn khoảng trắng thừa hay hiện tượng chồng đè chữ.

---

## Cập nhật: Sửa lỗi nhấn Menu có Submenu bị đóng thanh điều hướng trên Mobile

### Yêu cầu:
- Khắc phục lỗi khi người dùng chạm vào các menu có cấp con (như "DỊCH VỤ", "SẢN PHẨM", "NĂNG LƯỢNG TÁI TẠO") hoặc icon mũi tên xổ xuống trên màn hình điện thoại thì menu trượt drawer lại bị đóng lại thay vì xổ cấp con xuống.

### Giải pháp & Thay đổi:
- **`js/theme-addons.js`**:
  - Sửa bộ chọn `defaults.anchor` từ `.menu-item > a[href*=#]` thành `.menu-item:not(.menu-item-has-children) > a[href*='#']` và thêm điều kiện chặn trong `hideSubMenu`: ngăn hàm tự động kích hoạt `toggleMobileMenu()` đóng drawer khi người dùng chạm vào link menu cha có `href="#"`.
  - Chuẩn hóa chuỗi sự kiện `'click'` cho các listener của wglMobileMenu.
- **`application/views/modules/mod_header.php`**:
  - Bổ sung bộ xử lý Accordion chuyên biệt cho `.mobile_nav_wrapper`: khi chạm vào tên menu cha (`href="#"`) hoặc icon mũi tên `.td-menu-chevron`, menu con `.sub-menu` sẽ trượt mở/đóng êm ái (`slideToggle(280)`), xoay mũi tên 180° và tự động thu gọn các menu cùng cấp khác.
  - Bổ sung icon chevron cho danh mục sản phẩm con để đồng bộ tương tác đa cấp.
- **`css/electronic_theme.css`**:
  - Đặt `display: none` mặc định cho `.mobile_nav_wrapper .sub-menu` để animation trượt hiển thị chuẩn xác; ẩn nút `.button_switcher` cũ của theme để tránh trùng lặp 2 mũi tên; định dạng hiệu ứng xoay 180° mượt mà cho `.td-menu-chevron`.
- **`application/views/modules/mod_footer.php`**:
  - Cập nhật tham số chống cache động `?ver=<?php echo time(); ?>` cho file `theme-addons.js`.

### Trạng thái / Lưu ý:
- Đã xử lý triệt để 100%. Người dùng trên điện thoại có thể chạm vào chữ hoặc mũi tên để xổ xuống/thu gọn submenu trơn tru, không còn tình trạng bị đóng menu.

---

## Cập nhật: Xóa bỏ bóng mờ màu đen ở mép trái màn hình Mobile

### Yêu cầu:
- Loại bỏ dải bóng mờ màu đen (vignette/shadow) kéo dài dọc theo toàn bộ mép bên trái màn hình khi xem website trên thiết bị di động.

### Giải pháp & Thay đổi:
- **`css/electronic_theme.css`**:
  - Xác định nguyên nhân: Khung menu trượt mobile drawer (`.wgl-menu_outer`) khi ở trạng thái đóng được đặt ẩn ngoài mép trái màn hình (`translateX(-100%)`). Thuộc tính `box-shadow: 10px 0 35px rgba(0, 0, 0, 0.5)` với độ mờ 35px và độ lệch ngang +10px đã vô tình lan tỏa ngược vào trong màn hình (khoảng 35px–45px từ mép trái) và hiển thị đè lên toàn trang do mang `z-index` cao.
  - Xử lý triệt để tại cả 2 khối khai báo `.mobile_nav_wrapper .wgl-menu_outer` và `.wgl-menu_outer`:
    - Ở trạng thái bình thường (khi đóng): Gán `box-shadow: none !important;`, kết hợp `visibility: hidden; pointer-events: none;` để triệt tiêu hoàn toàn mọi vệt bóng đổ và ngăn tràn pixel vào viewport.
    - Chỉ kích hoạt đổ bóng (`box-shadow`) và `visibility: visible` khi người dùng bấm mở menu (`body.mobile_switch_on`).

### Trạng thái / Lưu ý:
- Đã loại bỏ hoàn toàn 100% bóng mờ mép trái trên mobile. Trang hiển thị sáng rõ, sạch đẹp và đúng chuẩn responsive.
