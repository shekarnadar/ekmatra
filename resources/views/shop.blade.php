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
									   <ul class="widget-body filter-items item-check price-item">
										<li data-maxprice="1000" data-minprice="1"><a href="#">Under 1000</a></li>
										<li data-maxprice="5000" data-minprice="10000"><a href="#">5000-10000</a></li>
										<li data-maxprice="20000" data-minprice="10000"><a href="#">10000-20000</a></li>
										<li data-maxprice="20000" minprice="0"><a href="#">20000 & up</a></li>
									</ul>
									</div>
								</div>
								<!-- End of Collapsible Widget -->


								<!-- Start of Collapsible Widget -->
								<div class="widget widget-collapsible">
									<h3 class="widget-title"><label>Brand</label></h3>
									<ul class="widget-body filter-items item-check mt-1 brand-item">
										@foreach($brand as $val)
										@if(@$val['feature_attributes'])
												<li data-id="{{$val['feature_attributes']['id']}}"><a href="javascript:void(0)">{{$val['feature_attributes']['name']}}</a></li>
										@endif
										@endforeach
									</ul>
								</div>
								<!-- End of Collapsible Widget -->
								<div class="widget widget-collapsible">
									<h3 class="widget-title"><label>Minimum qty</label></h3>
									<ul class="widget-body filter-items item-check qty-item">
										<li data-minqty="1" data-maxqty="50"><a href="#">Under 50</a></li>
										<li data-minqty="50" data-maxqty="100"><a href="#">50-100</a></li>
										<li data-minqty="100" data-maxqty="150"><a href="#">100-150</a></li>
										<li data-maxqty="150" data-minqty="0" data-maxqty="100"><a href="#">150 & up</a></li>
									</ul>
								</div>

								<!-- Start of Collapsible Widget -->
								<div class="widget widget-collapsible">
									<h3 class="widget-title"><label>Warranty</label></h3>
									<ul class="widget-body filter-items item-check warranty-item">
										<li data-value="1"><a href="#">1 year</a></li>
										<li data-value="2"><a href="#">2 years</a></li>
										<li data-value="3"><a href="#">3 years</a></li>
										<li data-value="4"><a href="#">4 years</a></li>
										<li data-value="5"><a href="#">5 years</a></li>
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
									<select name="limit_product" id="limit_product" class="form-control">
										<option value="10" selected="selected">Show 10</option>
										<option value="20">Show 20</option>
										<option value="30">Show 30</option>
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
	var brand_array = [];
  var page_count = 1;
  var warranty = '';
  var max_price = '';
  var min_price = '';
  var min_qty = '';
  var max_qty = '';
  var page_limit = '';

	$('.brand-item li').click(function(e){
		event.preventDefault();
      
		var id = $(this).attr('data-id');
		page_count = 1;
	
		var getClass = this.className;
		if(getClass == 'active'){
			removeBrand(id);
		}else{
				brand_array.push(id);		
		}
		getData(page_count);
  });

	$('#limit_product').change(function(e){
			var id = $(this).val();
			page_limit = id;
			page_count = 1;
			getData(page_count);
	});
  $('.price-item li').click(function(e){
  		
  		page_count = 1;
  		min_price = $(this).attr('data-minprice');
  		max_price = $(this).attr('data-maxprice');
  		var getClass = this.className;
  		if(getClass == 'active'){
  			min_price = '';
  			max_price = '';
  			$('.price-item ul li').removeClass('active');
  		}else{
  			
  			$('.price-item li').removeClass('active');
				$(this).parent('.price-item li').addClass('active');
  		}
  		
			getData(page_count);
  });

  function removeBrand(id){
  	brand_array.splice($.inArray(id, brand_array), 1);
  	return brand_array;
  }
	
	$('.filter-clean').click(function(){
		brand_array = [];
  	page_count = 1;
   	warranty = '';
  	max_price = '';
  	min_price = '';
  	min_qty = '';
    max_qty = '';
    page_limit = $('#page_limit').val();
    getData(page_count);
	});

	$('.qty-item li').click(function(){
		page_count = 1;

		var id = $(this).attr('data-value');
	
		min_qty = $(this).attr('data-minqty');
		max_qty = $(this).attr('data-maxqty');
		var getClass = this.className;

		if(getClass == 'active'){
			$('.qty-item li').removeClass('active');
			$(this).parent('.qty-item li').removeClass('active');
			min_qty = '';
    	max_qty = '';
		}else{
			$('.qty-item li').removeClass('active');
			$(this).parent('.qty-item li').addClass('active');
		}
		
			getData(page_count);
	});

	$('.warranty-item li').click(function(){
		page_count = 1;

		var id = $(this).attr('data-value');
	  var getClass = this.className;

		if(getClass == 'active'){
			warranty = '';
			$('.warranty-item ul li').removeClass('active');
			$(this).parent('.warranty-item ul li').removeClass('active');
		}else{
			
			warranty = id;
			$('.warranty-item li').removeClass('active');
			$(this).parent('.warranty-item li').addClass('active');	
			
		}
		getData(page_count);
		

	});

	$(document).on('click', '.pagination a',function(event){
			event.preventDefault();
			$('.page-item li').removeClass('active');
			$(this).parent('.page-item li').addClass('active');
			var page = $(this).attr('data-value');
			page_count = page;
			getData(page_count);
			event.preventDefault();
	});

	function getData(page){
		$.ajax(
		{
				url: '{{url("filter-result")}}',
				type: "Post",
				async: false,
				cache: false,
				data :{
					'page' : page,
					'cat_id' : "{{$cat_id}}" ,
					"_token": "{{ csrf_token() }}",
					"brand_array" : brand_array,
					"warranty" : warranty,
					"max_price" : max_price,
					"min_price" : min_price,
					"min_qty" : min_qty,
					"max_qty" : max_qty,
					"page_limit" : page_limit,
				},
				datatype: "html"
		}).done(function(data){
				$("#tag_container").html(data);
				 setTimeout(function () {
                $('html, body').animate({
                    scrollTop: $("#tag_container").offset().top - 500
                }, 777);
            }, 100);


		}).fail(function(jqXHR, ajaxOptions, thrownError){
				alert('No response from server');
		});
		 return false;
	}
</script>
