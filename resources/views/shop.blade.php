<x-guest-layout>
	   
			<div class="container pb-2">
				@include('category')
				<!-- End Of Category Wrapper -->

				<nav class="breadcrumb-nav">
				<div class="container">
					<ul class="breadcrumb bb-no">
						<li><a href="{{url('/')}}">Home</a></li>
						<li>{{$cat_name}}</li>
					</ul>
				</div>
			</nav>

				<div class="container">
				<div class="shop-content row gutter-lg">
					<!-- Start of Sidebar, Shop Sidebar -->
					<aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
						<!-- Start of Sidebar Overlay -->
						<div class="sidebar-overlay"></div>
						<a class="sidebar-close" href="#"><i class="close-icon"></i></a>

						<!-- Start of Sidebar Content -->
						<div class="sidebar-content scrollable">
							<!-- Start of Sticky Sidebar -->
							<div class="sticky-sidebar">
								<div class="filter-actions">
									<label>Filter :</label>
									<a href="#" class="btn btn-dark btn-link filter-clean">Clean All</a>
								</div>
								<!-- Start of Collapsible widget -->
								<div class="widget widget-collapsible">
									<h3 class="widget-title"><label>All Categories</label></h3>
									<ul class="widget-body filter-items search-ul">
										@foreach($subCategory as $val)
											<li><a href="{{url('shop/'.$cat_name.'/'.$val['name'])}}">{{$val['name']}}</a></li>
										@endforeach
									</ul>
								</div>
								<!-- End of Collapsible Widget -->

								<!-- Start of Collapsible Widget -->
								<div class="widget widget-collapsible">
									<h3 class="widget-title"><label>Price</label></h3>
									<div class="widget-body">
									   
										<form class="price-range">
											<input type="number" name="min_price" class="min_price text-center"
												placeholder="$min"><span class="delimiter">-</span><input
												type="number" name="max_price" class="max_price text-center"
												placeholder="$max"><a href="#"
												class="btn btn-primary btn-rounded">Go</a>
										</form>
									</div>
								</div>
								<!-- End of Collapsible Widget -->


								<!-- Start of Collapsible Widget -->
								<div class="widget widget-collapsible">
									<h3 class="widget-title"><label>Brand</label></h3>
									<ul class="widget-body filter-items item-check mt-1">
										@foreach($brand as $val)
											<li><a href="#">{{$val['name']}}</a></li>
										@endforeach
									</ul>
								</div>
								<!-- End of Collapsible Widget -->
								<div class="widget widget-collapsible">
									<h3 class="widget-title"><label>Minimum qty</label></h3>
									<ul class="widget-body filter-items item-check">
										<li><a href="#">No minimum qty</a></li>
										<li><a href="#">Under 50</a></li>
										<li><a href="#">50-100</a></li>
										<li><a href="#">100-150</a></li>
										<li><a href="#">150 & up</a></li>
									</ul>
								</div>

								<!-- Start of Collapsible Widget -->
								<div class="widget widget-collapsible">
									<h3 class="widget-title"><label>Warranty</label></h3>
									<ul class="widget-body filter-items item-check">
										<li><a href="#">1 year</a></li>
										<li><a href="#">2 years</a></li>
										<li><a href="#">3 years</a></li>
									</ul>
								</div>
								<!-- End of Collapsible Widget -->
							</div>
							<!-- End of Sidebar Content -->
						</div>
						<!-- End of Sidebar Content -->
					</aside>
					<!-- End of Shop Sidebar -->

					<!-- Start of Main Content -->
					<div class="main-content">
						<nav class="toolbox sticky-toolbox sticky-content fix-top">
							<div class="toolbox-left">
								<a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle 
									btn-icon-left d-block d-lg-none"><i
										class="w-icon-category"></i><span>Filters</span></a>
								<div class="toolbox-item toolbox-sort select-box text-dark">
									<label>Sort By :</label>
									<select name="orderby" class="form-control">
										<option value="default" selected="selected">Default sorting</option>
										<option value="popularity">Sort by popularity</option>
										<option value="rating">Sort by average rating</option>
										<option value="date">Sort by latest</option>
										<option value="price-low">Sort by pric: low to high</option>
										<option value="price-high">Sort by price: high to low</option>
									</select>
								</div>
							</div>
							<div class="toolbox-right">
								<div class="toolbox-item toolbox-show select-box mr-0">
									<select name="count" class="form-control">
										<option value="9">Show 9</option>
										<option value="12" selected="selected">Show 12</option>
										<option value="24">Show 24</option>
										<option value="36">Show 36</option>
									</select>
								</div>
								
							</div>
						</nav>
						<div class="product-wrapper row cols-lg-4 cols-md-3 cols-2">
							@foreach($product as $prod_val)
								<div class="product-wrap">
									<div class="product product-image-gap product-simple">
										<figure class="product-media">
											<a href="{{url('product')}}">
												<img src='{{url("product/".$prod_val['image'])}}' alt="Product" width="195" height="135" />
												 <img src='{{url("product/".$prod_val['image'])}}' alt="Product" width="195" height="135" />
											</a>
										   
											<div class="product-action">
												<a href="{{url('product-detail/'.$prod_val['id'])}}" class="btn-product" title="Quick View">Quick View</a>
											</div>
										</figure>
										<div class="product-details">
											
											<h4 class="product-name">
												<a href="{{url('product-detail/'.$prod_val['id'])}}">{{$prod_val['name']}}</a>
											</h4>
										   
											<div class="product-pa-wrapper">
												<div class="product-price">
													<ins class="new-price">Price : {{$prod_val['price']}}</ins>
												</div>
												<div class="product-price">
													<ins class="new-price">Min Qty : {{$prod_val['maq']}}</ins>
												</div>
												<div class="product-action">
													@auth
													<a href="javascript:void(0)" class="btn-cart btn-product btn btn-link btn-underline wishlist
													" data-id="{{$prod_val['id']}}" >Add To Wishlist</a>
													@else
													 <a href="{{url('login')}}" class="btn-cart btn-product btn btn-link btn-underline  sign-in">Add to Wishlist</a>
													@endauth

												</div>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						   
						</div>

						<div class="toolbox toolbox-pagination justify-content-between">
							<p class="showing-info mb-2 mb-sm-0">
								Showing<span>1-12 of 60</span>Products
							</p>
							<ul class="pagination">
								<li class="prev disabled">
									<a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
										<i class="w-icon-long-arrow-left"></i>Prev
									</a>
								</li>
								<li class="page-item active">
									<a class="page-link" href="#">1</a>
								</li>
								<li class="page-item">
									<a class="page-link" href="#">2</a>
								</li>
								<li class="next">
									<a href="#" aria-label="Next">
										Next<i class="w-icon-long-arrow-right"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

		</div>

	   </div>
 
	</div>

</x-guest-layout>

