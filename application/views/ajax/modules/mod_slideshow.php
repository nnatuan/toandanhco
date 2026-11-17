<div id="tr-banner-home-main" class="active">
               <div class="wrapper">
                  <div class="tr-wrapper-mid-banner2 full left">
					<?php $m1 = get_module_byid(10); 
					$m2 = get_module_byid(11);
					$m3 = get_module_byid(12);
					$m4 = get_module_byid(13);
					$m5 = get_module_byid(14);
					$m6 = get_module_byid(15);
					?>
                     <div class="tr-3banner-left left" style="background-image: linear-gradient(to right, #fff , #f5f5f5);">
                        <a target="_blank" style="" class="full left tr-3banner-link" href="#" onclick="ga('send', 'event', 'MainBanner', 'click','Main-B1',1.00, {'nonInteraction': 1});" title="MUA HANG GIA KHO 50%++">
                        <img class="lazyload" src="https://image.yes24.vn/Upload/image/ImgBlank.png" data-src="<?php echo base_url().'upload/images_module/'.$m1['cimage']; ?>" alt="MUA HANG GIA KHO 50%++" width="392" height="194" />
                        </a>
                        <a target="_blank" style="" class="full left tr-3banner-link" href="#" onclick="ga('send', 'event', 'MainBanner', 'click','Main-B2',1.00, {'nonInteraction': 1});" title="Whoo ch&#237;nh h&#227;ng khuyến m&#227;i hấp dẫn">
                        <img class="lazyload" src="https://image.yes24.vn/Upload/image/ImgBlank.png" data-src="<?php echo base_url().'upload/images_module/'.$m2['cimage']; ?>" alt="Whoo ch&#237;nh h&#227;ng khuyến m&#227;i hấp dẫn" width="392" height="194" />
                        </a>
                        <a target="_blank" style="" class="full left tr-3banner-link" href="#" onclick="ga('send', 'event', 'MainBanner', 'click','Main-B3',1.00, {'nonInteraction': 1});" title="Mini game Lật &#212;: Nhanh tay lẹ mắt - Yes24 Việt Nam">
                        <img class="lazyload" src="https://image.yes24.vn/Upload/image/ImgBlank.png" data-src="<?php echo base_url().'upload/images_module/'.$m3['cimage']; ?>" alt="Mini game Lật &#212;: Nhanh tay lẹ mắt - Yes24 Việt Nam" width="392" height="194" />
                        </a>
                     </div>
                     <div class="tr-2banner-middle left">
                        <div class="slider-mainB-home" style="display:block; background-image: linear-gradient(to right, #fff , #f5f5f5);">
							<?php 
							 $obj_data= get_banner_list();
							 foreach($obj_data as $data){
							 ?>
                           <a target="_blank" class="full left tr-2banner-link" href="#" onclick="ga('send', 'event', 'MainBanner', 'click','Main-A1',1.00, {'nonInteraction': 1});" title="Đi chợ tại gia, chẳng sợ Corona - Yes24 Việt Nam">
                           <img class="lazyOwl" src="https://image.yes24.vn/Upload/image/ImgBlank.png" data-src="<?php echo base_url().'upload/banner/'.$data['cimage'] ?>" alt="Đi chợ tại gia, chẳng sợ Corona - Yes24 Việt Nam" width="429" height="504" />
                           </a>
							 <?php } ?>
                        </div>
                        <a target="_blank" class="full left tr-2banner-link2" href="<?php echo base_url()."chuong-trinh-khuyen-mai"?>" onclick="ga('send', 'event', 'MainBanner', 'click','Main-C1',1.00, {'nonInteraction': 1});" title="">
                        <img class="lazyload" src="https://image.yes24.vn/Upload/image/ImgBlank.png" data-src="https://www.yes24.vn/Upload/Event/2019/Index_20190529_18.jpg" alt="" width="429" height="92" />
                        </a>
                     </div>
                     <div class="tr-3banner-right left" style="background-image: linear-gradient(to right, #fff , #f5f5f5);">
                        <a target="_blank" class="full left tr-3banner-link" href="#" onclick="ga('send', 'event', 'MainBanner', 'click','Main-B4',1.00, {'nonInteraction': 1});" title="thời trang cho b&#233; khuyến m&#227;i lớn - 3 ng&#224;y sale v&#224;ng chỉ từ 47k">
                        <img class="lazyload" src="https://image.yes24.vn/Upload/image/ImgBlank.png" data-src="<?php echo base_url().'upload/images_module/'.$m4['cimage']; ?>" alt="thời trang cho b&#233; khuyến m&#227;i lớn - 3 ng&#224;y sale v&#224;ng chỉ từ 47k" width="392" height="194" />
                        </a>
                        <a target="_blank" class="full left tr-3banner-link" href="#" onclick="ga('send', 'event', 'MainBanner', 'click','Main-B5',1.00, {'nonInteraction': 1});" title="Emspo Khuyến m&#227;i">
                        <img class="lazyload" src="https://image.yes24.vn/Upload/image/ImgBlank.png" data-src="<?php echo base_url().'upload/images_module/'.$m5['cimage']; ?>" alt="Emspo Khuyến m&#227;i" width="392" height="194" />
                        </a>
                        <a target="_blank" class="full left tr-3banner-link" href="#" onclick="ga('send', 'event', 'MainBanner', 'click','Main-B6',1.00, {'nonInteraction': 1});" title="Bộ nồi Luminarc Giảm gi&#225; 50%">
                        <img class="lazyload" src="https://image.yes24.vn/Upload/image/ImgBlank.png" data-src="<?php echo base_url().'upload/images_module/'.$m6['cimage']; ?>" alt="Bộ nồi Luminarc Giảm gi&#225; 50%" width="392" height="194" />
                        </a>
                     </div>
                  </div>
               </div>
            </div>