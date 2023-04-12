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
						<div id="tag_container">
							@include('presult')
						</div>
						
					</div>
				</div>
			</div>

		</div>

	   </div>
 
	</div>

</x-guest-layout>
<script type="text/javascript">
	$(window).on('hashchange', function() {
		if (window.location.hash) {
			var page = window.location.hash.replace('#', '');
			if (page == Number.NaN || page <= 0) {
				return false;
			}else{
				getData(page);
			}
		}
		});
	$(document).on('click', '.pagination a',function(event){
			event.preventDefault();
			$('li').removeClass('active');
			$(this).parent('li').addClass('active');
			var myurl = $(this).attr('href');
			var page=$(this).attr('href').split('page=')[1];
			getData(page);
	});
	function getData(page){
		$.ajax(
		{
				url: '?page=' + page,
				type: "get",
				datatype: "html"
		}).done(function(data){
				$("#tag_container").empty().html(data);
				location.hash = page;
		}).fail(function(jqXHR, ajaxOptions, thrownError){
				alert('No response from server');
		});
	}
</script>
