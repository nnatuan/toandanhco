	</main>
	<footer id="footer" class="footer-container">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12 col-sm-12">
                  <div class="float-left">
                     © 2020 - CMS Admin</a> 
                  </div>
                  <div class="float-right">
                     
                  </div>
               </div>
            </div>
         </div>
      </footer>

	  <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
      <script src="<?php echo base_url(); ?>js/jquery.ui.js"></script>
      <script src="<?php echo base_url(); ?>js/popper.min.js"></script>
      <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
      <script src="<?php echo base_url(); ?>js/jquery.slimscroll.js"></script>
      <script src="<?php echo base_url(); ?>js/pace.min.js"></script>
      <script src="<?php echo base_url(); ?>js/blockui.min.js"></script>
      <script src="<?php echo base_url(); ?>js/uniform.min.js"></script>

      <script src="<?php echo base_url(); ?>js/select2.min.js"></script>
      <script src="<?php echo base_url(); ?>js/select2.js"></script>



      <script src="<?php echo base_url(); ?>js/vendor.js"></script>
	  <script src="<?php echo base_url(); ?>js/datatables.min.js"></script>
	  <script src="<?php echo base_url(); ?>js/datatable_basic.js"></script>
	  <script src="<?php echo base_url(); ?>js/datepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>js/datepicker.en.js"></script>
		<script src="<?php echo base_url(); ?>js/js.js"></script>
		<script src="<?php echo base_url()?>uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
		<?php if(isset($nid_product)) { ?>
		<script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
			$('#file_upload').uploadify({
				'formData'      : {'nid_product' : '<?php echo $nid_product?>'},
				'swf'      : '<?php echo base_url()?>uploadify/uploadify.swf',
				'uploader' : '<?php echo base_url()?>index.php/do_product_img/insert_img/',
				'onQueueComplete' : function() {
            		setInterval('window.location.reload()', 1500);
       			 }
			});
		});
		</script>
		<?php } ?>
		<?php 
		$fr_img	= Fstr_replace(Fget_admin_folder(),'',base_url());
	?>

	<link rel="stylesheet" type="text/css" href="<?php echo $fr_img; ?>rgn_editor/editor_custom.css" />
	<script src="<?php echo $fr_img; ?>rgn_editor/source_editor/ckeditor.js"></script>
	<script src="<?php echo base_url()?>js/simpleUpload.js" type="text/javascript"></script>
	<script>

	var roxyFileman = '<?php echo $fr_img?>/fileman/index.html'; 
	$(function(){
	   CKEDITOR.replace( 'editor1',{filebrowserBrowseUrl:roxyFileman,toolbar : 'Full',
	height : '400px',
									filebrowserImageBrowseUrl:roxyFileman+'?type=image',
									removeDialogTabs: 'link:upload;image:upload'});
		CKEDITOR.replace( 'editor2',{filebrowserBrowseUrl:roxyFileman,toolbar : 'Full',
	height : '400px',
									filebrowserImageBrowseUrl:roxyFileman+'?type=image',
									removeDialogTabs: 'link:upload;image:upload'}); 
		CKEDITOR.replace( 'editor3',{filebrowserBrowseUrl:roxyFileman,toolbar : 'Full',
	height : '400px',
									filebrowserImageBrowseUrl:roxyFileman+'?type=image',
									removeDialogTabs: 'link:upload;image:upload'}); 
		CKEDITOR.replace( 'editor4',{filebrowserBrowseUrl:roxyFileman,toolbar : 'Full',
	height : '400px',
									filebrowserImageBrowseUrl:roxyFileman+'?type=image',
									removeDialogTabs: 'link:upload;image:upload'}); 
	});

	</script>
	<script>CKEDITOR.dtd.$removeEmpty['span'] = false;</script>
	<script>CKEDITOR.dtd.$removeEmpty['i'] = false;</script>
	<?php /*
	<script src="https://templateclub.co.in/projects/vego/demo/html/assets/editors/ckeditor/ckeditor.js"></script>
<script src="https://templateclub.co.in/projects/vego/demo/html/assets/js/plugins/editors/ckeditor.js"></script>*/ ?>
      <script>        
         //----------------------------------
         // Theme Settings
         //----------------------------------
         $(".theme-icon").on("click", ".theme-topbar", function() {
             $(".theme-topbar").removeClass("current"), $(this).addClass("current")
         })
         
         $(".theme-topbar").on("click", function(){
             var stylesheet = $(this).attr('theme').toLowerCase();
             $('#theme-topbar').attr('href','assets/css'+'/topbar/'+stylesheet+'.css');
         });
         
         
         //----------------------------------
         // Rightbar Settings
         //----------------------------------
         function open_settings() {
             $(window).resize(function() {
                 if(($(window).width() < 500)){
                     document.getElementById("settings").style.width = "100%";
                 }
                 else if($(window).width() > 500) {
                     document.getElementById("settings").style.width = "250px";
                 }
             }).resize();
             document.getElementById("chats").style.width = "0";
         }
         function close_settings() {
             document.getElementById("chats").style.width = "0";
             document.getElementById("settings").style.width = "0";
         }
         
         
         //----------------------------------
         // Chat Window
         //----------------------------------
         function open_chats() {
             $(window).resize(function() {
                 if(($(window).width() < 500)){
                     document.getElementById("chats").style.width = "100%";
                 }
                 else if($(window).width() > 500) {
                     document.getElementById("chats").style.width = "340px";
                 }
             }).resize();
             document.getElementById("settings").style.width = "0";
         }
         function close_chats() {
             document.getElementById("chats").style.width = "0";
             document.getElementById("settings").style.width = "0";
         }
         
         $('.rightbar-wrapper').slimscroll({
             height: $(window).outerHeight() - 70,
             width: "100%",
         }).mouseover(function() {
             $(this).next('.slimScrollBar');
         });
         
         $('.chat-wrapper').slimscroll({
             height: $(window).outerHeight() - 115,
             width: "100%"
         }).mouseover(function() {
             $(this).next('.slimScrollBar');
         });
         
         $(".friend").on("click",function () {
             $(".rightbar-wrapper").css({ 'display': "none" });
             $("#conversation").fadeIn('slow');
         });
         
         $("#back").on("click",function () {
             $("#conversation").css({ 'display': "none" });
             $(".rightbar-wrapper").fadeIn('slow');
         });
         
         
         //----------------------------------
         // Lighbox
         //----------------------------------
         $(document).on('click', '[data-toggle="lightbox"]', function(event) {
             event.preventDefault();
             $(this).ekkoLightbox();
         });
         
         //----------------------------------
         // Card close
         //----------------------------------
         $('.card-close').on('click',function() {
             $(this).closest('.card').fadeOut();
         });
         
         
         //----------------------------------
         // Card collapse
         //----------------------------------
         $('.card-collapsed').find('[data-action=collapse]').children('i').addClass('rotate-180');
         $('.card [data-action=collapse]').on("click",function (e) {
             e.preventDefault();
             $(this).parents('.card').toggleClass('card-collapsed');
             $(this).toggleClass('rotate-180');
             containerHeight();
         });
         
         
         //----------------------------------
         // Card reload
         //----------------------------------
         $('.card [data-action=reload]').on("click",function (e) {
             e.preventDefault();
             var block = $(this).parent().parent().parent().parent().parent();
             $(block).block({
                 message: '<i class="icon-spinner2 spinner icon-2x"></i><h4>Loading</h4><h6>Please wait</h6>',
                 overlayCSS: {
                     backgroundColor: '#fff',
                     opacity: 0.9,
                     cursor: 'wait',
                     'box-shadow': '0 0 0 1px #ddd'
                 },
                 css: {
                     border: 0,
                     padding: 0,
                     backgroundColor: 'none'
                 }
             });
             window.setTimeout(function () {
                $(block).unblock();
             }, 2000);
         });
         
         
         //----------------------------------
         // Tooltips & Popovers
         //----------------------------------
         $('[data-popup="tooltip"]').tooltip();
         $('[data-popup="popover"]').popover();
         $("[data-toggle='tooltip']").tooltip();
         
         
         //----------------------------------
         // Uniform JS
         //----------------------------------
         $(".styled, .multiselect-container input").uniform({
             radioClass: 'choice'
         });
         // Default file input style
         $(".file-styled").uniform({
             fileButtonHtml: 'Browse'
         });
         
         
         //----------------------------------
         // Material UI Forms
         //----------------------------------
         document.addEventListener("change", function(event) {
           let element = event.target;
           if (element && element.matches(".form-element-field")) {
             element.classList[element.value ? "add" : "remove"]("-hasvalue");
           }
         });
         
         
         //----------------------------------
         // Select2
         //----------------------------------
         $('.select').select2({
             minimumResultsForSearch: Infinity
         });
         $('.select-search').select2();
         
         
         //----------------------------------
         // 8. Header elements
         //----------------------------------
         $('.card-header, .header-content, .card-body, .card-footer').has('> .elements').append('<a class="elements-toggle"><i class="ico-menu-5"></i></a>');
         $('.elements-toggle').on('click', function() {
             $(this).parent().children('.elements').toggleClass('visible');
         });
         
         if (Array.prototype.forEach) {
             var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
             elems.forEach(function(html) {
               var switchery = new Switchery(html);
             });
             } else {
             var elems = document.querySelectorAll('.switchery');
             for (var i = 0; i < elems.length; i++) {
               var switchery = new Switchery(elems[i]);
             }
         }
      </script>
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-141924810-1"></script>
      <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());
         
         gtag('config', 'UA-141924810-1');
      </script>