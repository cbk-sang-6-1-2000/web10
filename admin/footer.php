<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="https://hotrolaptrinh.github.io/js/tech/main.js"></script>
<div class="section_footer" style="margin-top: 20px">
    	<div class="container">
    		<div class="mail_section">
    			<div class="row">
    				<div class="col-sm-6 col-lg-2">
    					<div><a href="#"><img src="../../style/images/logo1.jpg" style="width: 50px"></a></div>
    				</div>
    				<div class="col-sm-6 col-lg-2">
    					<div class="footer-logo"><img src="../../style/images/phone-icon.png"><span class="map_text">(+84) 818940765</span></div>
    				</div>
    				<div class="col-sm-6 col-lg-3">
    					<div class="footer-logo"><img src="../../style/images/email-icon.png"><span class="map_text">caubekho00@gmail.com</span></div>
    				</div>
    				<div class="col-sm-6 col-lg-3">
    					<div class="social_icon">
    						<ul>
    							<li><a href="#"><img src="../../style/images/fb-icon.png"></a></li>
    							<li><a href="#"><img src="../../style/images/twitter-icon.png"></a></li>
    							<li><a href="#"><img src="../../style/images/in-icon.png"></a></li>
    							<li><a href="#"><img src="../../style/images/google-icon.png"></a></li>
    						</ul>
    					</div>
    				</div>
    				<div class="col-sm-2"></div>
    			</div>
    	    </div> 
    	    <div class="footer_section_2">
		        <div class="row">
    		        <div class="col-sm-4 col-lg-2">
    		        	<h2 class="shop_text">Địa Chỉ</h2>
    		        	<div class="image-icon"><img src="../../style/images/map-icon.png"><span class="pet_text">Vinh - Nghệ An</span></div>
    		        </div>
    		        <div class="col-sm-4 col-md-6 col-lg-3">
    				    <h2 class="shop_text">Công Ty</h2>
    				    <div class="delivery_text">
    				    	<ul>
    				    		<li>vinhunivercity</li>
    				    	</ul>
    				    </div>
    		        </div>
    			<div class="col-sm-6 col-lg-3">
    				<h2 class="adderess_text">Sản Phẩm</h2>
    				<div class="delivery_text">
    				    	<ul>
    				    		<li>Ql Gym</li>
    				    	</ul>
    				    </div>
    			</div>
    			<div class="col-sm-6 col-lg-2">
    				<h2 class="adderess_text">Liên hệ</h2>
    				<div class="form-group">
                        <input type="text" class="enter_email" placeholder="Enter Your email" name="Name">
                    </div>
    			</div>
    			</div>
    	        </div> 
	        </div>
    	</div>
    </div>


      <!-- Javascript files-->
      <script src="../../style/js/jquery.min.js"></script>
      <script src="../../style/js/popper.min.js"></script>
      <script src="../../style/js/bootstrap.bundle.min.js"></script>
      <script src="../../style/js/jquery-3.0.0.min.js"></script>
      <script src="../../style/js/plugin.js"></script>
      <!-- sidebar -->
      <script src="../../style/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="../../style/js/custom.js"></script>
      <!-- javascript --> 
      <script src="../../style/js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         })});
         
         
$('#myCarousel').carousel({
            interval: false
        });

        //scroll slides on swipe for touch enabled devices

        $("#myCarousel").on("touchstart", function(event){

            var yClick = event.originalEvent.touches[0].pageY;
            $(this).one("touchmove", function(event){

                var yMove = event.originalEvent.touches[0].pageY;
                if( Math.floor(yClick - yMove) > 1 ){
                    $(".carousel").carousel('next');
                }
                else if( Math.floor(yClick - yMove) < -1 ){
                    $(".carousel").carousel('prev');
                }
            });
            $(".carousel").on("touchend", function(){
                $(this).off("touchmove");
            });
        });
      </script> 