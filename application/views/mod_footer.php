<div class="footer">
            <script src="/app/services/moduleServices.js"></script>
            <script src="/app/controllers/moduleController.js"></script>
            <footer id="footer">
               <div class="container">
                  <!-- introduce-box -->
                  <div id="introduce-box" class="row">
                     <div class="col-md-5">
                        <div id="address-box">
                          
                           <?php $data = get_module_byid(4);
								if(isset($data['cnote']))
									echo $data['cnote'];
							?>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="row">
                           <div class="col-sm-12 col-xs-12">
                              <?php $data = get_module_byid(2);
								if(isset($data['cnote']))
									echo $data['cnote'];
							?>
                           </div>
                          
                        </div>
                     </div>
                     <div class="col-md-4" id="fb-plug">
						<div id="fb-root"></div>
						<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0"></script>
                        <div class="fb-page" data-href="https://www.facebook.com/ANSANCosmetic" data-tabs="timeline" data-width="" data-height="130" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/ANSANCosmetic" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ANSANCosmetic">Ansan Cosmetics</a></blockquote></div>
                     </div>
                  </div>
                  <!-- /#introduce-box -->
				  
				  
				  
                 
                  <!-- /#trademark-box -->
                 <br><br><br><br><br>
               </div>
            </footer>
         </div>
      </div>
      <div style="display: none;" id="loading-mask">
         <div id="loading_mask_loader" class="loader">
            <img alt="Loading..." src="/Images/ajax-loader-main.gif" />
            <div>
               Please wait...
            </div>
         </div>
      </div>
      <a href="#" class="scroll_top" title="Scroll to Top" style="display: none;">Scroll</a>