# HƯỚNG DẪN & TÀI LIỆU NÂNG CẤP SOURCE CODE TƯƠNG THÍCH PHP 8.3
*(Dành cho các dự án PHP Legacy & Framework CodeIgniter 2.x / 3.x)*

> **Mục tiêu:** Hướng dẫn toàn diện quy trình nâng cấp mã nguồn website PHP/CodeIgniter tương thích hoàn toàn với **PHP 8.2 & PHP 8.3**, loại bỏ các cảnh báo (Warnings/Notices), ngăn ngừa lỗi nghiêm trọng (Fatal Errors), và khắc phục triệt để các nguy cơ bảo mật từ lỗ hổng **PHP2Shell (CVE-2024-4577)**.  
> **Chiến lược:** Patch-in-place (vá trực tiếp, bảo toàn toàn bộ logic nghiệp vụ và cấu trúc mã nguồn hiện tại).

---

## 1. TỔNG QUAN BỐI CẢNH & NGUY CƠ BẢO MẬT
* **Lỗ hổng PHP2Shell (CVE-2024-4577):** Là lỗ hổng bảo mật Remote Code Execution cực kỳ nghiêm trọng trên Windows/XAMPP và máy chủ sử dụng PHP-CGI (do cơ chế "Best-Fit Mapping" khi xử lý chuỗi ký tự unicode). 
* Tất cả các phiên bản PHP cũ (PHP 5.x, PHP 7.x, PHP 8.0, 8.1, 8.2 cũ) đều có nguy cơ bị tấn công thực thi mã độc từ xa.
* Việc nâng cấp môi trường máy chủ lên **PHP 8.3 (tối thiểu 8.3.8 trở lên)** kết hợp vá source code là giải pháp triệt để và an toàn nhất cho toàn bộ hệ thống.

---

## 2. DANH MỤC CÁC VẤN ĐỀ PHP 8.3 & GIẢI PHÁP VÁ MÃ NGUỒN

### 2.1. Tầng tương thích Polyfill (`php83_compat.php`)
Tạo một file tương thích độc lập `php83_compat.php` đặt tại thư mục gốc dự án để bù đắp các hàm/cơ chế đã bị PHP 7/8 loại bỏ:

1. **Thiết lập múi giờ mặc định (`date.timezone`):**
   * *Hiện tượng:* Trên hosting cPanel/PHP-FPM, nếu chưa khai báo `date.timezone` trong `php.ini`, các hàm thời gian hoặc `phpinfo()` sẽ kích hoạt `PHP Warning: It is not safe to rely on the system's timezone settings...`.
   * *Giải pháp:* Thiết lập tự động múi giờ ngay ở đầu file polyfill:
     ```php
     if ( ! ini_get('date.timezone')) {
         date_default_timezone_set('Asia/Ho_Chi_Minh');
         ini_set('date.timezone', 'Asia/Ho_Chi_Minh');
     }
     ```
2. **Chế độ báo lỗi MySQLi (`MYSQLI_REPORT_OFF`):**
   * *Hiện tượng:* Từ PHP 8.1+, MySQLi mặc định ném ngoại lệ `mysqli_sql_exception` thay vì trả về `FALSE` khi truy vấn lỗi. Điều này làm sập website trên các framework cũ.
   * *Giải pháp:* Gọi `mysqli_report(MYSQLI_REPORT_OFF);` ngay khi khởi tạo polyfill.
3. **Khai báo thuộc tính động cho lớp Model kế thừa:**
   * *Hiện tượng:* Các dự án CodeIgniter cũ thường sử dụng lớp `Model` (kế thừa từ `CI_Model`) hoặc gán thuộc tính động vào Controller/Model. Trên PHP 8.2+, điều này phát sinh lỗi Deprecated.
   * *Giải pháp:* Khai báo thuộc tính `#[\AllowDynamicProperties]` cho `class Model extends CI_Model`.
4. **Polyfill hàm `each()`:**
   * *Hiện tượng:* Hàm `each()` đã bị xóa bỏ hoàn toàn từ PHP 8.0.
   * *Giải pháp:* Tái hiện bằng `current()`, `key()`, `next()`.
5. **Polyfill nhóm hàm Regex POSIX cũ:**
   * *Hiện tượng:* `ereg()`, `eregi()`, `ereg_replace()`, `eregi_replace()`, `split()`, `spliti()` đã bị xóa bỏ trong PHP 7.0+.
   * *Giải pháp:* Chuyển hướng an toàn sang PCRE (`preg_match`, `preg_replace`, `preg_split`).
6. **Polyfill `utf8_encode()` và `utf8_decode()`:**
   * *Hiện tượng:* Đã bị Deprecated từ PHP 8.2 và xóa bỏ trong PHP 9.0.
   * *Giải pháp:* Bổ sung polyfill thay thế bằng `mb_convert_encoding()` hoặc `iconv()`.
7. **Polyfill `magic_quotes` & MySQL cũ:**
   * `get_magic_quotes_gpc()`, `get_magic_quotes_runtime()`, `set_magic_quotes_runtime()` trả về `FALSE` để tránh lỗi Fatal khi thư viện cũ (như phpThumb, PHPMailer cũ) gọi tới.
   * Polyfill `mysql_escape_string()` bọc bằng `addcslashes()`.

---

### 2.2. Đấu nối Polyfill và Cấu hình Error Reporting
Chèn nạp `php83_compat.php` và thiết lập ẩn cảnh báo Deprecated / Warning trên các điểm khởi chạy chính (entry points):

1. **Frontend (`index.php`):**
   * Chèn ở dòng đầu tiên:
     ```php
     require_once dirname(__FILE__) . '/php83_compat.php';
     ```
   * Cấu hình lại `error_reporting`:
     ```php
     error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED & ~E_NOTICE & ~E_WARNING);
     ```
     *(Tránh để Warning/Deprecated in ra màn hình làm vỡ giao diện HTML hoặc hỏng dữ liệu trả về của API/Ajax).*
2. **Backend / Admin (`[admin_dir]/index.php`):**
   * Chèn ở dòng đầu:
     ```php
     require_once dirname(__DIR__) . '/php83_compat.php';
     ```
   * Đảm bảo loại bỏ các lệnh debug blocking (như `phpinfo(); exit;`) nếu có.
   * Thiết lập `error_reporting` tương tự Frontend.
3. **Bộ xử lý ảnh thumbnail (`phpThumb.php` / thư viện xử lý ảnh):**
   * Chèn nạp `php83_compat.php` ở đầu file.
   * Đổi `ini_set('magic_quotes_runtime', '0');` thành `@ini_set('magic_quotes_runtime', '0');` hoặc xóa bỏ.
   * Thiết lập `ini_set('display_errors', '0');` để không làm ô nhiễm dữ liệu nhị phân (binary output) của hình ảnh.

---

### 2.3. Khai báo thuộc tính động `#[\AllowDynamicProperties]`
Trên PHP 8.2+, việc gán thuộc tính động (dynamic properties) mà chưa khai báo trong class sẽ sinh lỗi:
`Deprecated: Creation of dynamic property ... is deprecated`.  
CodeIgniter tải model, library, database và gán trực tiếp vào Controller/Model qua cơ chế `$this->$name = ...`.

* **Các file cần bổ sung attribute `#[\AllowDynamicProperties]` trước định nghĩa class:**
  * `system/core/Controller.php` (hoặc thư viện Controller của admin)
  * `system/core/Model.php` (hoặc thư viện Model của admin)
  * `system/core/Loader.php`
  * `system/database/DB_driver.php`
  * `system/database/DB_active_rec.php`
  * `system/database/drivers/mysqli/mysqli_driver.php`
  * Bất kỳ class trung gian nào (ví dụ: `Base5`, `external`, các Controller/Model tùy biến).

---

### 2.4. Sửa lỗi Fatal cú pháp mảng/chuỗi ngoặc nhọn `{}` thành `[]`
Trên PHP 8.0+, cú pháp truy cập ký tự chuỗi bằng ngoặc nhọn `$str{idx}` bị cấm hoàn toàn và gây ra **Fatal Compile Error** (`Array and string offset access syntax with curly braces is no longer supported`).

* **Quy tắc sửa đổi:** Đổi toàn bộ sang cú pháp ngoặc vuông chuẩn:
  * `$string{$i}` $\rightarrow$ `$string[$i]`
  * `$data{0}` $\rightarrow$ `$data[0]`
  * `$rgb{0}` $\rightarrow$ `$rgb[0]`
  * `$pal{...}` $\rightarrow$ `$pal[...]`
* **Vị trí thường gặp nhất:**
  * Các file thư viện xử lý hình ảnh cũ: `phpthumb.class.php`, `phpthumb.functions.php`, `phpthumb.bmp.php`, `phpthumb.gif.php`.

---

### 2.5. Sửa lỗi cú pháp số bát phân (Octal Literal) & hàm Regex cũ
1. **Số bát phân không hợp lệ (`Parse error: Invalid numeric literal`):**
   * Trong PHP 7+, các số như `08`, `09` trong switch-case hoặc gán giá trị sẽ gây lỗi parse vì không phải số bát phân hợp lệ.
   * Đổi các `case 01:` .. `case 09:` thành `case 1:` .. `case 9:`.
2. **Hàm `ereg()` & `split()`:**
   * Thay thế `ereg("^[0-9]", $str)` $\rightarrow$ `preg_match("/^[0-9]/", $str)`.
   * Thay thế `split('[.]', $filename)` $\rightarrow$ `explode('.', $filename)`.

---

### 2.6. Chuyển đổi vòng lặp `while(list() = each())` sang `foreach`
Hàm `each()` đã bị gỡ bỏ trong PHP 8.0. Các đoạn mã gửi mail, duyệt cấu hình kiểu cũ:
```php
// Cũ (PHP 5/7):
while (list($key, $val) = each($array)) { ... }

// Chuẩn mới (PHP 8.3):
foreach ($array as $key => $val) { ... }
```
* **Vị trí thường gặp:** Các helper/library gửi mail, xử lý file (`mail_helper`, `smtp_helper`, v.v.).

---

### 2.7. Nâng cấp Constructor kiểu PHP 4 sang `__construct()`
Trên PHP 8.0+, constructor trùng tên với tên class (`function TenClass()`) bị loại bỏ hoàn toàn và chỉ được xem như phương thức thông thường, dẫn đến việc khởi tạo model không hoạt động.

* **Quy tắc nâng cấp Model & Class:**
  1. Đổi `class TenModel extends Model` $\rightarrow$ `class TenModel extends CI_Model`.
  2. Bổ sung constructor chuẩn PHP:
     ```php
     public function __construct() {
         parent::__construct();
     }
     ```
  3. Nếu có phương thức cũ trùng tên class:
     ```php
     // Cũ:
     function TenModel() {
         parent::Model();
         // logic...
     }

     // Mới:
     public function __construct() {
         parent::__construct();
         // logic...
     }
     ```

---

### 2.8. Cấu hình Database Driver
* Đảm bảo cấu hình database trong `application/config/database.php` (cả Frontend và Admin) sử dụng driver chuẩn **`mysqli`**:
  ```php
  $db['default']['dbdriver'] = 'mysqli';
  ```
  *(Tuyệt đối không dùng driver `mysql` vì extension này đã bị xóa hoàn toàn từ PHP 7.0).*

---

### 2.9. Cấu hình `db_debug` & Ngăn chặn sập website do lỗi Database trên Production
* **Hiện tượng:** Mặc định CodeIgniter bật `$db['default']['db_debug'] = TRUE;`. Khi chuyển lên hosting/server thực tế, bất kỳ truy vấn nào gặp lỗi nhỏ (như vi phạm MySQL Strict Mode, câu lệnh INSERT thông tin cookie/lượt truy cập phụ) sẽ khiến framework dừng thực thi và ném ra trang lỗi HTTP 500. Hosting (Apache/cPanel/Nginx) lập tức điều hướng khách hàng về `page-not-found.html` hoặc trang lỗi 500.
* **Quy tắc cấu hình bắt buộc:** Tự động bật/tắt `db_debug` theo môi trường:
  ```php
  $is_local = isset($_SERVER['HTTP_HOST']) && (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false || strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false);
  if ($is_local) {
      $db['default']['db_debug'] = TRUE;
  } else {
      $db['default']['db_debug'] = FALSE; // Tắt trên Production để website luôn hoạt động ổn định
  }
  ```

---

### 2.10. Kiểm tra an toàn khi truy xuất phần tử mảng (Array Offset on null/false)
* **Hiện tượng:** Trên PHP 5.x và 7.x, nếu truy vấn DB trả về rỗng (`NULL` hoặc `FALSE`), việc truy cập phần tử `$row['col_name']` chỉ sinh ra thông báo Notice. Nhưng từ **PHP 8.0+**, hành vi này trở thành **Fatal Error** (`Cannot access offset of type string on null / bool`), làm sập hoàn toàn Controller và trả về HTTP 500.
* **Quy tắc xử lý:**
  1. Luôn kiểm tra tính hợp lệ của mảng trước khi dùng:
     ```php
     $obj_detail = get_product_byid($this->m_nid);
     if (empty($obj_detail) || ! is_array($obj_detail)) {
         redirect(base_url()); // hoặc show_404();
         return;
     }
     ```
  2. Sử dụng toán tử `isset()` an toàn cho các trường dữ liệu:
     ```php
     $data['title'] = isset($obj_detail['cproducts']) ? $obj_detail['cproducts'] : '';
     ```

---

### 2.11. Cơ chế Fail-safe cho Cookie, Session & Bộ đếm khách Online
* **Hiện tượng ("Chủ web vào được, khách mới bị văng ra 404/500"):**
  * Chủ web (đã từng truy cập) đã có sẵn IP và Cookie trong DB nên không chạy lệnh INSERT.
  * Khách mới (truy cập lần đầu) sẽ kích hoạt hàm lưu cookie popup, lưu IP hoặc đếm khách online (`tguest_online`).
  * Khách dùng mạng 4G/5G/IPv6 có địa chỉ IP dài hơn 15 ký tự, hoặc session chưa sinh ID dẫn đến trường `session_id` là chuỗi rỗng `''`.
  * Trên MySQL 8 / MariaDB bật Strict Mode (`STRICT_TRANS_TABLES`), việc INSERT chuỗi rỗng vào cột NOT NULL hoặc IP quá dài sẽ gây lỗi SQL nghiêm trọng, làm sập trang chủ đối với khách mới.
* **Quy tắc viết code Fail-safe:**
  * Luôn gán giá trị mặc định cho session nếu rỗng:
    ```php
    if (empty($num_nid_session)) {
        $num_nid_session = session_id() ? session_id() : (isset($_SERVER['REMOTE_ADDR']) ? md5($_SERVER['REMOTE_ADDR']) : 'guest');
    }
    ```
  * Mọi tác vụ ghi database phụ trợ (cookie, đếm truy cập, log thống kê) **bắt buộc phải bọc trong `try ... catch (\Throwable $e)`** và tạm thời tắt `db_debug`:
    ```php
    $old_db_debug = $obj_helper->db->db_debug;
    $obj_helper->db->db_debug = FALSE;
    try {
        // Thực thi truy vấn INSERT / UPDATE phụ trợ
    } catch (\Throwable $e) {
        // Bỏ qua an toàn, tuyệt đối không để lỗi lưu vết phụ làm gián đoạn trải nghiệm người dùng
    }
    $obj_helper->db->db_debug = $old_db_debug;
    ```
  * Không để các mệnh đề `$this->db->where()` thừa thãi ngay trước lệnh `$this->db->insert()`.

---

## 3. CHECKLIST KIỂM TRA NHANH KHI ÁP DỤNG CHO DỰ ÁN MỚI

| STT | Hạng mục kiểm tra | Trạng thái đạt yêu cầu |
|:---:|:---|:---|
| 1 | File `php83_compat.php` | Đã copy vào thư mục gốc, có đủ polyfill (MySQLi report off, each, regex POSIX, utf8_encode/decode, **timezone set**) |
| 2 | Điểm vào `index.php` & `[admin]/index.php` | Đã nạp `php83_compat.php` và cấu hình `error_reporting` triệt tiêu Warning/Deprecated |
| 3 | Core Controllers & Models | Đã gắn `#[\AllowDynamicProperties]` (cả Frontend và Admin) |
| 4 | Cú pháp ngoặc nhọn `{}` | Đã chuyển sạch sang `[]` (đặc biệt trong thư mục `phpThumb` / upload ảnh) |
| 5 | Hàm `ereg` / `split` / `each` | Đã chuyển sang `preg_match` / `explode` / `foreach` |
| 6 | Constructor Model | Sử dụng `public function __construct()` và kế thừa `CI_Model` |
| 7 | Cấu hình Database Driver | Sử dụng driver `mysqli` (không dùng `mysql`) |
| 8 | Cấu hình `db_debug` | Tự động tắt `db_debug = FALSE` trên môi trường Production |
| 9 | Cơ chế Fail-safe Visitor/Cookie | Bọc `try..catch` cho các thao tác ghi DB phụ (cookie popup, đếm online, log) để không làm sập trang chủ khi khách mới truy cập |
| 10 | Truy xuất mảng dữ liệu | Đã kiểm tra `empty()` / `is_array()` trước khi truy xuất key, tránh Fatal Error trên PHP 8.x |
| 11 | Kiểm tra thực tế | Mở trình duyệt ẩn danh (Incognito) hoặc thiết bị mới truy cập Frontend & Backend Admin, kết quả HTTP 200, không bị điều hướng lỗi |
