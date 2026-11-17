<?php
   $this->load->view('header');
   $this->load->view('header_end');	
   $this->load->view('modules/mod_header');
   ?> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
/* Reset & Base Content */
.content {
    padding: 40px 0;
    background-color: #f8f9fa; /* Nền xám nhạt cho toàn trang để nổi bật card trắng */
}
.mgb30 {
    margin-bottom: 30px !important;
}

/* Cấu trúc Card tin tức mới */
.news-card {
    background: #ffffff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.news-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
}

/* Phần bao bọc ảnh */
.news-img-wrap {
    display: block;
    position: relative;
    width: 100%;
    aspect-ratio: 16 / 9; /* Tự động chuẩn tỉ lệ vàng cho ảnh tin tức */
    overflow: hidden;
}

.news-img {
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    transition: transform 0.5s ease;
}

.news-card:hover .news-img {
    transform: scale(1.08); /* Zoom nhẹ hiện đại */
}

/* Ngày đăng định vị góc trên ảnh tinh tế hơn */
.post-date {
    position: absolute;
    left: 15px;
    bottom: 15px;
    padding: 4px 12px;
    background: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(4px); /* Hiệu ứng mờ kính hiện đại */
    color: #fff;
    font-size: 12px;
    border-radius: 4px;
    font-weight: 500;
}

/* Phần thân chứa text tách biệt */
.news-body {
    padding: 20px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

.blog_title {
    font-size: 18px;
    line-height: 1.5;
    font-weight: 600;
    margin: 0 0 15px 0;
}

.blog_title a {
    color: #2D3748;
    text-decoration: none;
    transition: color 0.2s ease;
    /* Giới hạn hiển thị tối đa 2 dòng, tự thêm dấu ... nếu tiêu đề quá dài */
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;  
    overflow: hidden;
    font-size: 18px;
    line-height: inherit;	
}

.blog_title a:hover {
    color: #ff7029;
}

/* Nút Xem thêm & Footer của Card */
.news-footer {
    margin-top: auto; /* Đẩy nút xuống luôn sát đáy card dù title ngắn hay dài */
    padding-top: 15px;
    border-top: 1px solid #edf2f7;
}

.btn-readmore {
    color: #ff7029;
    font-weight: 600;
    font-size: 14px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    transition: color 0.2s ease;
}

.btn-readmore .arrow {
    margin-left: 5px;
    transition: transform 0.2s ease;
}

.btn-readmore:hover {
    color: #e05613;
}

.btn-readmore:hover .arrow {
    transform: translateX(4px); /* Mũi tên dịch chuyển nhẹ khi hover */
}

/* Thanh phân trang chuyên nghiệp */
.pagination-wrapper {
    width: 100%;
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination a, .pagination strong {
    display: inline-block;
    min-width: 40px;
    height: 40px;
    line-height: 38px;
    padding: 0 10px;
    text-align: center;
    margin: 0 4px;
    border-radius: 6px;
    border: 1px solid #e2e8f0;
    color: #4a5568;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.2s ease;
}

.pagination a:hover {
    background-color: #ff7029;
    border-color: #ff7029;
    color: #fff;
}

.pagination strong.active {
    background-color: #ff7029;
    border-color: #ff7029;
    color: #fff;
}
</style>  
<div class="container content">
    <div class="row">
        <?php 
        $i = 1;
        $cat_link = base_url().'tin-tuc/';
        foreach($obj_news_list as $data) {
        ?>
        <div class="col-md-4 mgb30">
            <div class="news-card">
                <!-- Phần hình ảnh phía trên -->
                <a class="news-img-wrap" href="<?php echo base_url().'tin-tuc/'.$data['ccode']; ?>">
                    <div class="news-img" style="background-image: url('<?php echo base_url().'upload/image_article/'.$data['cimage_thumb'] ?>');"></div>
                    <div class="post-date">
                        <i class="fa fa-calendar-alt"></i> <!-- Bạn có thể thêm font-awesome nếu có -->
                        <?php 
                        if($data['cpost_date']!="") {
                            echo $data['cpost_date']; 
                        } else { 
                            $pieces = explode("-", $data['ddate02']); 
                            echo $pieces[2].'/'.$pieces[1].'/'.$pieces[0]; 
                        } 
                        ?>
                    </div>
                </a>
                
                <!-- Phần nội dung tách hẳn bên dưới -->
                <div class="news-body">
                    <h3 class="blog_title">
                        <a href="<?php echo base_url().'tin-tuc/'.$data['ccode']; ?>">
                            <?php echo $data['ctitle']; ?>
                        </a>
                    </h3>
                    <div class="news-footer">
                        <a class="btn-readmore" href="<?php echo base_url().'tin-tuc/'.$data['ccode']; ?>">
                            Xem thêm <span class="arrow">→</span>
                        </a>
                    </div>
                </div>
            </div> 
        </div>
        <?php $i++; } ?>
    </div>
    
    <!-- Phân trang hiện đại -->
    <?php if($total_page > 1){ ?>
    <div class="pagination-wrapper">
        <div class="pagination clearfix">
            <?php 
            for($i=1; $i<=$total_page; $i++){
                if($i != $cur_page){
                    echo '<a href="'.base_url().'/tin-tuc/trang-'.$i.'">'.$i.'</a>';
                } else {
                    echo '<strong class="active">'.$i.'</strong>';
                }
            } 
            ?>
        </div>
    </div>
    <?php } ?>
</div>	
<?php 
	$this->load->view('modules/mod_footer');
	$this->load->view('footer');
?>