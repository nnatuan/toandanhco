# Lịch sử nâng cấp tương thích PHP 8.3

### Yêu cầu
- Nâng cấp toàn bộ mã nguồn website tương thích với PHP 8.2 & PHP 8.3 theo tài liệu `PHP_8.3_UPGRADE_NOTES.md`.

### Giải pháp & Thay đổi
- **Polyfill & Điểm vào:**
  - `php83_compat.php`: Bổ sung polyfill `utf8_encode`, `utf8_decode`.
  - `index.php`: Nạp `php83_compat.php` ở đầu file, cấu hình `error_reporting` triệt tiêu Warning/Notice/Deprecated cho PHP 8.3.
  - `admin/index.php`: Nạp `php83_compat.php` ở đầu file, cấu hình `error_reporting` tương tự Frontend.
- **Khai báo thuộc tính động `#[\AllowDynamicProperties]`:**
  - Bổ sung attribute trước các class core ở cả 2 thư mục `system/` và `admin/system/`:
    - `system/core/Controller.php` & `admin/system/core/Controller.php` (`CI_Controller`)
    - `system/core/Model.php` & `admin/system/core/Model.php` (`CI_Model`)
    - `system/core/Loader.php` & `admin/system/core/Loader.php` (`CI_Loader`)
    - `system/database/DB_driver.php` & `admin/system/database/DB_driver.php` (`CI_DB_driver`)
    - `system/database/DB_query_builder.php` & `admin/system/database/DB_query_builder.php` (`CI_DB_query_builder`)
    - `system/database/drivers/mysqli/mysqli_driver.php` & `admin/system/database/drivers/mysqli/mysqli_driver.php` (`CI_DB_mysqli_driver`)
- **Nâng cấp Model & Constructor PHP 4:**
  - `application/models/product_model.php`: Chuyển kế thừa sang `CI_Model`, constructor `__construct()`.
  - `application/models/news_model.php`: Chuyển kế thừa sang `CI_Model`, constructor `__construct()`.
  - `application/models/home_model.php`: Chuyển kế thừa sang `CI_Model`, constructor `__construct()`.
  - `application/models/search_model.php`: Chuyển kế thừa sang `CI_Model`, constructor `__construct()`.
- **Cấu hình Database:** Xác nhận cả 2 cấu hình (`application` và `admin/application`) đã dùng driver chuẩn `mysqli`, tự động đặt `db_debug = FALSE` khi chạy trên môi trường Production để tránh lỗi 500 ném ra trang `page-not-found`.
- **Khắc phục lỗi điều hướng `page-not-found.html` & Timezone Warning:**
  - `php83_compat.php`: Bổ sung cấu hình múi giờ mặc định `Asia/Ho_Chi_Minh` để triệt tiêu toàn bộ cảnh báo `date.timezone` trên PHP 8.x.
  - `application/helpers/ap_db_helper.php`: Thêm cơ chế fail-safe cho `dbset_cookie` và `dbget_cookie` khi khách mới truy cập (xử lý an toàn session rỗng, IPv6, bỏ mệnh đề `where` thừa trước `insert`).
  - `application/helpers/ap_module_helper.php`: Bọc `Bget_guest_online()` trong try-catch và fail-safe chống trùng session id khi khách mới vào.
  - `application/controllers/news.php` & `product_detail.php`: Kiểm tra dữ liệu an toàn trước khi truy cập key trên mảng, tránh Fatal Error PHP 8.3 khi link chứa slug không tồn tại.

### Trạng thái / Lưu ý
- Đã hoàn tất sửa lỗi tương thích và xử lý triệt để nguyên nhân điều hướng về `page-not-found.html` cho người dùng mới.
- Cần upload lại các file: `php83_compat.php`, `index.php`, `application/config/database.php`, `application/helpers/ap_db_helper.php`, `application/helpers/ap_module_helper.php`, `application/controllers/news.php`, `application/controllers/product_detail.php`.
