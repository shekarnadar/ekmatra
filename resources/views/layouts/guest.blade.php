<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	
	@include('layouts.guest-script')
	<body>
			<div class="page-wrapper">
				<h1 class="d-none">Ekmatra</h1>
				<!-- Start of Header -->
					@include('layouts.guest-header')
				 <main class="main">
						{{ $slot }}
				</main>
					@include('layouts.guest-footer')
			</div>
			<div class="sticky-footer sticky-content fix-bottom">
				<a href="{{url('/')}}" class="sticky-link active">
					<i class="w-icon-home"></i>
					<p>Home</p>
				</a>
			 	@auth
				<a href="{{url('myaccount')}}" class="sticky-link">
					<i class="w-icon-account"></i>
					<p>Account</p>
				</a>
				@else
				<a href="{{url('login')}}" class="sticky-link login sign-in ">
					<i class="w-icon-account"></i>
					<p>Account</p>
				</a>

				@endauth

			<div class="cart-dropdown dir-up">
				@auth
				<a href="{{url('wishlist')}}" class="sticky-link">
					<i class="w-icon-cart"></i>
					<p>Wishlist</p>
				</a>
				@endauth
			
			<!-- End of Dropdown Box -->
			</div>
			<div class="header-search hs-toggle dir-up">
			<a href="#" class="search-toggle sticky-link">
				<i class="w-icon-search"></i>
				<p>Search</p>
			</a>
			<form action="{{url('search')}}" class="input-wrapper" methd="get">
				<input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
					required />
				<button class="btn btn-search bg-white" type="submit">
					<i class="w-icon-search"></i>
				</button>
			</form>
			</div>
	</div>
	<!-- End of Sticky Footer -->

	<!-- Start of Scroll Top -->
	<a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i class="w-icon-angle-up"></i> <svg
			version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
			<circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35"
				r="34" style="stroke-dasharray: 16.4198, 400;"></circle>
		</svg> </a>
	<!-- End of Scroll Top -->

	<!-- Start of Mobile Menu -->
	<div class="mobile-menu-wrapper">
		<div class="mobile-menu-overlay"></div>
		<!-- End of .mobile-menu-overlay -->

		<a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
		<!-- End of .mobile-menu-close -->

		<div class="mobile-menu-container scrollable">
			<form action="{{url('search')}}" method="get" class="input-wrapper">
				<input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
					required />
				<button class="btn btn-search" type="submit">
					<i class="w-icon-search"></i>
				</button>
			</form>
			<!-- End of Search Form -->
			<div class="tab">
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a href="#main-menu" class="nav-link active">Main Menu</a>
					</li>
					<li class="nav-item">
						<a href="#categories" class="nav-link">Categories</a>
					</li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane active" id="main-menu">
					<ul class="mobile-menu">
						<li><a href="{{url('/')}}">Home</a></li>
						<li>
							@auth
							<a href="{{url('submitanenquiry')}}">Request for Quotations</a>
							@else
							<a href="{{url('login')}}" class="sign-in requestforquotation">Request for Quotations</a>
							@endauth
						</li>
						
						
					</ul>
				</div>
				<div class="tab-pane" id="categories">
					<ul class="mobile-menu">
						@foreach($category as $value)
						
						
						<li>
							<a href="{{url('shop/'.$value['slug'])}}">
								<i><img src="{{url('category/'.$value['image'])}}" alt="Categroy" width="15" height="15" /></i>{{$value['name']}}
							</a>
							@if(count($value['subCategory']) > 0)
							<ul>
								@foreach($value['subCategory'] as $subcat)
								<li>
									<a href="{{url('shop/'.$value['slug'].'/'.$subcat['slug'])}}">{{$subcat['name']}}</a>
									
								</li>
								@endforeach
								
							</ul>
							@endif
						</li>
						
						@endforeach
						
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- End of Mobile Menu -->

	<!-- Start of Newsletter popup -->

	<div class="newsletter-popup mfp-hide newsletterdiv">
		<div class="newsletter-content">
			<h6 class="text-uppercase font-weight-bold ls-25">Save to</h6>
			<div class="d-flex addDiv mt-2 mb-2">

				<span data-v-80b17294="" class="cg-wishlist__cta__toggle quantity-plus w-icon-plus addlist"></span>

				<span data-v-80b17294="" class="cg-wishlist__cta__title ml-2" style=""> Add new list </span>
			</div>
			<div class="d-flex pl-3 addListDiv" style="display:none !important;">
				<input data-v-80b17294="" type="text" class="form-control" id="name">
				<button data-v-80b17294="" type="button" class="btn btn-dark btn-rounded saveWishlist"> ADD LIST </button>
			</div>
			
			

			<input type="hidden" name="product_id" id="product_id">
			<p class="text-light ls-10"></p>
			
			<div class="form-checkbox d-flex align-items-center">
					<ul class="widget-body filter-items item-check mt-1">
						
					</ul>
				
			</div>
		</div>
	</div>

	<!-- End of Newsletter popup -->

	<!-- Start of Quick View -->
	<div class="product product-single product-popup">
		<div class="row gutter-lg">
			<div class="col-md-6 mb-4 mb-md-0">
				<div class="product-gallery product-gallery-sticky">
					<div class="swiper-container product-single-swiper swiper-theme nav-inner">
						<div class="swiper-wrapper row cols-1 gutter-no">
							<div class="swiper-slide">
								<figure class="product-image">
									<img src="{{url('front/images/products/popup/1-440x494.jpg')}}"
										data-zoom-image="{{url('front/images/products/popup/1-800x900.jpg')}}"
										alt="Water Boil Black Utensil" width="800" height="900">
								</figure>
							</div>
							<div class="swiper-slide">
								<figure class="product-image">
									<img src="{{url('front/images/products/popup/2-440x494.jpg')}}"
										data-zoom-image="{{url('front/images/products/popup/2-800x900.jpg')}}"
										alt="Water Boil Black Utensil" width="800" height="900">
								</figure>
							</div>
							<div class="swiper-slide">
								<figure class="product-image">
									<img src="{{url('front/images/products/popup/3-440x494.jpg')}}"
										data-zoom-image="{{url('front/images/products/popup/3-800x900.jpg')}}"
										alt="Water Boil Black Utensil" width="800" height="900">
								</figure>
							</div>
							<div class="swiper-slide">
								<figure class="product-image">
									<img src="{{url('front/images/products/popup/4-440x494.jpg')}}"
										data-zoom-image="{{url('front/images/products/popup/4-800x900.jpg')}}"
										alt="Water Boil Black Utensil" width="800" height="900">
								</figure>
							</div>
						</div>
						<button class="swiper-button-next"></button>
						<button class="swiper-button-prev"></button>
					</div>
					<div class="product-thumbs-wrap swiper-container" data-swiper-options="{
						'navigation': {
							'nextEl': '.swiper-button-next',
							'prevEl': '.swiper-button-prev'
						}
					}">
						<div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
							<div class="product-thumb swiper-slide">
								<img src="{{url('front/images/products/popup/1-103x116.jpg')}}" alt="Product Thumb" width="103"
									height="116">
							</div>
							<div class="product-thumb swiper-slide">
								<img src="{{url('front/images/products/popup/2-103x116.jpg')}}" alt="Product Thumb" width="103"
									height="116">
							</div>
							<div class="product-thumb swiper-slide">
								<img src="{{url('front/images/products/popup/3-103x116.jpg')}}" alt="Product Thumb" width="103"
									height="116">
							</div>
							<div class="product-thumb swiper-slide">
								<img src="{{url('front/images/products/popup/4-103x116.jpg')}}" alt="Product Thumb" width="103"
									height="116">
							</div>
						</div>
						<button class="swiper-button-next"></button>
						<button class="swiper-button-prev"></button>
					</div>
				</div>
			</div>
			<div class="col-md-6 overflow-hidden p-relative">
				<div class="product-details scrollable pl-0">
					<h2 class="product-title">Electronics Black Wrist Watch</h2>
					<div class="product-bm-wrapper">
						<figure class="brand">
							<img src="{{url('front/images/products/brand/brand-1.jpg')}}" alt="Brand" width="102" height="48" />
						</figure>
						<div class="product-meta">
							<div class="product-categories">
								Category:
								<span class="product-category"><a href="#">Electronics</a></span>
							</div>
							<div class="product-sku">
								SKU: <span>MS46891340</span>
							</div>
						</div>
					</div>

					<hr class="product-divider">

					<div class="product-price">$40.00</div>

					<div class="ratings-container">
						<div class="ratings-full">
							<span class="ratings" style="width: 80%;"></span>
							<span class="tooltiptext tooltip-top"></span>
						</div>
						<a href="#" class="rating-reviews">(3 Reviews)</a>
					</div>

					<div class="product-short-desc">
						<ul class="list-type-check list-style-none">
							<li>Ultrices eros in cursus turpis massa cursus mattis.</li>
							<li>Volutpat ac tincidunt vitae semper quis lectus.</li>
							<li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
						</ul>
					</div>

					<hr class="product-divider">

					<div class="product-form product-variation-form product-color-swatch">
						<label>Color:</label>
						<div class="d-flex align-items-center product-variations">
							<a href="#" class="color" style="background-color: #ffcc01"></a>
							<a href="#" class="color" style="background-color: #ca6d00;"></a>
							<a href="#" class="color" style="background-color: #1c93cb;"></a>
							<a href="#" class="color" style="background-color: #ccc;"></a>
							<a href="#" class="color" style="background-color: #333;"></a>
						</div>
					</div>
					<div class="product-form product-variation-form product-size-swatch">
						<label class="mb-1">Size:</label>
						<div class="flex-wrap d-flex align-items-center product-variations">
							<a href="#" class="size">Small</a>
							<a href="#" class="size">Medium</a>
							<a href="#" class="size">Large</a>
							<a href="#" class="size">Extra Large</a>
						</div>
						<a href="#" class="product-variation-clean">Clean All</a>
					</div>

					<div class="product-variation-price">
						<span></span>
					</div>

					<div class="product-form">
						<div class="product-qty-form">
							<div class="input-group">
								<input class="quantity form-control" type="number" min="1" max="10000000">
								<button class="quantity-plus w-icon-plus"></button>
								<button class="quantity-minus w-icon-minus"></button>
							</div>
						</div>
						<button class="btn btn-primary btn-cart">
							<i class="w-icon-cart"></i>
							<span>Add to Cart5</span>
						</button>
					</div>

					<div class="social-links-wrapper">
						<div class="social-links">
							<div class="social-icons social-no-color border-thin">
								<a href="#" class="social-icon social-facebook w-icon-facebook"></a>
								<a href="#" class="social-icon social-twitter w-icon-twitter"></a>
								<a href="#" class="social-icon social-pinterest fab fa-pinterest-p"></a>
								<a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
								<a href="#" class="social-icon social-youtube fab fa-linkedin-in"></a>
							</div>
						</div>
						<span class="divider d-xs-show"></span>
						<div class="product-link-wrapper d-flex">
							<a href="#" class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
							<a href="#"
								class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- End of Quick view -->
	<!-- Plugin JS File -->
	<script src="{{url('front/vendor/sticky/sticky.js')}}"></script>
	<script src="{{url('front/vendor/jquery.plugin/jquery.plugin.min.js')}}"></script>
	<script src="{{url('front/vendor/swiper/swiper-bundle.min.js')}}"></script>
	<script src="{{url('front/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
	<script src="{{url('front/vendor/skrollr/skrollr.min.js')}}"></script>
	<script src="{{url('front/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{url('front/vendor/zoom/jquery.zoom.js')}}"></script>
	<script src="{{url('front/vendor/jquery.countdown/jquery.countdown.min.js')}}"></script>
	<script src="{{url('backend/plugins/notify/js/notifIt.js')}}"></script>



	<!-- Main JS -->
	<script src="{{url('front/js/main.min.js')}}"></script>
	
	</body>
	<script type="text/javascript">
			var requestforquotation = '';
			var redirectPage = '';
		  $('.requestforquotation').click(function(){
		  	window.requestforquotation = 1;
		  	window.redirectPage = "{{url('submitanenquiry')}}"
		  });
		   $('.wishlistAuth').click(function(){
		   	window.redirectPage = "{{url('wishlist')}}"
		  	window.requestforquotation = 1;
		  });
			function notifyMsg(msg,type) {
				notif({
					msg: msg,
					type: type
				});
			}
				function wishList(id){
    			var id = id;
    		
	    		$.ajax({
	       		type: "get",
	          url: '{{ url("userWishlist/") }}'+'/'+id,
	          
	          success: function(response) {
	          		 $(".form-checkbox ul").html(response);
	          		 $("#product_id").val(id);
	          },
	          error: function(response) {
	          	let error = response.responseJSON;
	          
	          }
	        });
	        Wolmart.popup({
						items:{
							src:'.newsletter-popup'
							},
							type:'inline',
							mainClass:'mfp-newsletter mfp-fadein-popup',
							callbacks:{
								beforeClose:function(){
									$(".form-checkbox").html();
									("#hide-newsletter-popup")[0].checked
								}
							}
						});
       }
			$(document).on('click', "a.addwishlist", function() {
    		var id = $(this).attr('data-id');
    		wishList(id);
       });
				
  
			
			$(document).on('click', "a.wishlist", function() {
    		var id = $(this).attr('data-id');
    		wishList(id);
       });

		

			$(document).on('click','span.addlist',function(){
				$('.addListDiv').show();
			})

			$(document).on('click','.saveWishlist',function(){
				var name  = $("#name").val();
				var product_id = $("#product_id").val();
				 $.ajax({
       		type: "Post",
          url: '{{ url("wishlist/store") }}',
          data: {
            "name": name,
            "product_id" : product_id,
            "_token": "{{ csrf_token() }}",
        	},
          success: function(response) {
          	$("#name").val('');
          	notifyMsg('Prodct has been sent in wishlist','success');
          	$('.cart-count').text(response.count);
          	$(".form-checkbox ul").append(response.html);
          },
          error: function(response) {
          	let error = response.responseJSON;
            if(!error){
            		error = JSON.parse(response.responseText);
            }
            $.each( error.errors, function( key, value ) {
  								$("#"+key+"_error").text(value);
						});
          },
       });
			})

		$(document).on('change','#wishlist',function(){
			let msg = '';
			let status = '';
			 if ($(this).is(':checked')) {
			 	 msg = "Prodct has been sent in wishlist";
			 	 status = 'success';
			 }else{
			 	 msg = "Prodct has been removed from wishlist";
			 	 status = 'error';
			 }
			$.ajax({
       		type: "post",
          url: '{{ url("wishlist-assignProduct") }}',
          data: {
            "wishlist_id": $(this).val(),
            "product_id" : $("#product_id").val(),
            "_token": "{{ csrf_token() }}",
        	},
          success: function(response) {
          	notifyMsg(msg,status);
          	$('.cart-count').text(response);
          },
          
       });
		});
    function signin(){
			 let formValue = new FormData(document.getElementById('loginForm'));
			 $.ajax({
       		type: "post",
          url: '{{ url("login") }}',
          data: formValue,
          cache: false,
          contentType: false,
          processData: false,
          success: function(response) {
          		 if (response.success) {
          		 		notifyMsg('Logged in successfully','success');
          		 		redirectionPage();
          		 }
          },
          error: function(response) {
          	let error = response.responseJSON;
          	$(".sign-in").addClass('active');
            if(!error){
            		error = JSON.parse(response.responseText);
            }
            $("#email1_error").text(error.errors.email);
           
          },
       });
		}

		 function signup(){
			 let formValue = new FormData(document.getElementById('registerForm'));
			 $.ajax({
       		type: "post",
          url: '{{ url("register") }}',
          data: formValue,
          cache: false,
          contentType: false,
          processData: false,
          success: function(response) {
          		 if (response.success) {
          		 	notifyMsg('Congrats! you have been registered successfully.','success');
          		 	redirectionPage();
          		 }
          },
          error: function(response) {
          	let error = response.responseJSON;
          		$(".sign-up").addClass('active');
            if(!error){
            		error = JSON.parse(response.responseText);
            }
            $.each( error.errors, function( key, value ) {
  								$("#"+key+"_error").text(value);
						});
          },
       });
		}
		function redirectionPage(){
				setTimeout(function(){
					if(window.requestforquotation == 1){
						window.requestforquotation = 0;
						window.location.href = window.redirectPage;
					}else{
						location.reload();
					}
        },2000);
		}
	</script>
</html>
