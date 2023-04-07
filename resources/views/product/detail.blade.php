<x-guest-layout>
	 
			<!-- End of Breadcrumb -->
 <nav class="breadcrumb-nav">
				<div class="container">
					<ul class="breadcrumb bb-no">
						<li><a href="{{url('/')}}">Home</a></li>
						<li>Product</li>
					</ul>
				</div>
			</nav>
			<!-- Start of Page Content -->
			<div class="page-content">
				<div class="container">
					<div class="row gutter-lg">
						<div class="main-content">
							<div class="product product-single row">
								<div class="col-md-6 mb-6">
									<div class="product-gallery product-gallery-sticky">
										<div class="swiper-container product-single-swiper swiper-theme nav-inner" data-swiper-options="{
											'navigation': {
												'nextEl': '.swiper-button-next',
												'prevEl': '.swiper-button-prev'
											}
										}">
											<div class="swiper-wrapper row cols-1 gutter-no">
												<div class="swiper-slide">
													<figure class="product-image">
														<img src="{{url('product/'.$product['image'])}}"
															data-zoom-image="{{url('product/'.$product['image'])}}"
															alt="Electronics Black Wrist Watch" width="800" height="900">
													</figure>
												</div>
												
												
											
												
												<div class="swiper-slide">
													<figure class="product-image">
														<img src="assets/images/products/default/6-800x900.jpg"
															data-zoom-image="assets/images/products/default/6-800x900.jpg"
															alt="Electronics Black Wrist Watch" width="800" height="900">
													</figure>
												</div>
											</div>
											
											
										</div>
										
									</div>
								</div>
								<div class="col-md-6 mb-4 mb-md-6">
									<div class="product-details" data-sticky-options="{'minWidth': 767}">
										<h1 class="product-title">{{$product['name']}}</h1>
										<div class="product-bm-wrapper">
											<div class="product-meta">
												<div class="product-categories">
													Category:
													<span class="product-category"><a href="#">{{$product['category']['name']}}</a></span>
												</div>
												<div class="product-sku">
													SubCategory: <span>{{$product['subCategory']['name']}}</span>
												</div>
												<div class="product-sku mt-2">
													Brand: <span>{{$product['getBrands']['name']}}</span>
												</div>
											</div>
										</div>

										<hr class="product-divider">

										<div class="product-price"><ins class="new-price">₹ {{$product['price']}}</ins></div>

										


										<hr class="product-divider">

									
										

								

										<div class="fix-bottom product-sticky-content sticky-content">
											<div class="product-form container">
												<div class="product-qty-form">
													<div class="input-group mt-3">
														<input class="quantity form-control" type="number" min="1"
															max="10000000" value="1">
														<button class="quantity-plus w-icon-plus"></button>
														<button class="quantity-minus w-icon-minus"></button>
													</div>
												</div>
												<a href="javascript:void(0)"
													class="addwishlist btn btn-dark btn-rounded" data-id="{{$product['id']}}">Add To Wishlist</a>
												
											</div>
										</div>

										<div class="social-links-wrapper">
											
											<div class="product-link-wrapper d-flex">
												@auth
												<a href="javascript:void(0)"
													class="btn btn-dark btn-rounded inquiry" data-id="{{$product['id']}}">Inquiry</a>
												@else
												<a href="{{url('login')}}"
													class="btn btn-dark btn-rounded sign-in" data-id="{{$product['id']}}">Inquiry</a>
												@endauth
												
											</div>
											
										</div>
										
											
									</div>
								</div>
							</div>
						
							<div class="tab tab-nav-boxed tab-nav-underline product-tabs">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a href="#product-tab-description" class="nav-link active">Description</a>
									</li>
								
									
									
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="product-tab-description">
										<div class="row mb-4">
											<div class="col-md-6 mb-5">
												<h4 class="title tab-pane-title font-weight-bold mb-2">Detail</h4>
												<p class="mb-4">{{$product['description']}}</p>
												
											</div>
											
										</div>
										
									</div>
								
								
								
								</div>
							</div>
							
							
						</div>
						<!-- End of Main Content -->
						<aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
							<div class="sidebar-overlay"></div>
							<a class="sidebar-close" href="#"><i class="close-icon"></i></a>
							<a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
							<div class="sidebar-content scrollable">
								<div class="sticky-sidebar">
									<div class="widget widget-icon-box mb-6">
										<div class="icon-box icon-box-side">
											<span class="icon-box-icon text-dark">
												<i class="w-icon-truck"></i>
											</span>
											<div class="icon-box-content">
												<h4 class="icon-box-title">Free Shipping & Returns</h4>
												<p>For all orders over $99</p>
											</div>
										</div>
										<div class="icon-box icon-box-side">
											<span class="icon-box-icon text-dark">
												<i class="w-icon-bag"></i>
											</span>
											<div class="icon-box-content">
												<h4 class="icon-box-title">Secure Payment</h4>
												<p>We ensure secure payment</p>
											</div>
										</div>
										<div class="icon-box icon-box-side">
											<span class="icon-box-icon text-dark">
												<i class="w-icon-money"></i>
											</span>
											<div class="icon-box-content">
												<h4 class="icon-box-title">Money Back Guarantee</h4>
												<p>Any back within 30 days</p>
											</div>
										</div>
									</div>
									<!-- End of Widget Icon Box -->

									<div class="widget widget-banner mb-9">
										<div class="banner banner-fixed br-sm">
											<figure>
												<img src="{{url('front/images/shop/banner3.jpg')}}" alt="Banner" width="266"
													height="220" style="background-color: #1D2D44;" />
											</figure>
											<div class="banner-content">
												<div class="banner-price-info font-weight-bolder text-white lh-1 ls-25">
													40<sup class="font-weight-bold">%</sup><sub
														class="font-weight-bold text-uppercase ls-25">Off</sub>
												</div>
												<h4
													class="banner-subtitle text-white font-weight-bolder text-uppercase mb-0">
													Ultimate Sale</h4>
											</div>
										</div>
									</div>
									<!-- End of Widget Banner -->

									
								</div>
							</div>
						</aside>
						<!-- End of Sidebar -->
					</div>
				</div>
			</div>

</x-guest-layout>
<script type="text/javascript">
	$('#inquirymsg').hide();
	$(document).on('click', "a.inquiry", function() {
	let product_id = $(this).attr('data-id');
	let quantity = $('.quantity').val();
	$.ajax({
       		type: "Post",
          url: '{{ url("customerInquiry") }}',
          data: {
            "quantity": quantity,
            "product_id" : product_id,
            "_token": "{{ csrf_token() }}",
        	},
          success: function(response) {
          	if(response.success){
          		$('#inquirymsg').show();
          		notifyMsg(response.message,'success');

          	}else{
          		notifyMsg(response.message,'error');

          	}
          },
          error: function(response) {
          	let error = response.responseJSON;
          	console.log(error);
            if(!error){
            		error = JSON.parse(response.responseText);
            }
            $.each( error.errors, function( key, value ) {
  								$("#"+key+"_error").text(value);
						});
				}
	});
});
</script>
