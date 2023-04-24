<x-guest-layout>
	<div class="page-header">
		<div class="container">
			<h1 class="page-title mb-0">Wishlist</h1>
		</div>
	</div>
	<nav class="breadcrumb-nav mb-10">
		<div class="container">
			<ul class="breadcrumb">
					<li><a href="demo1.html">Home</a></li>
					<li>Wishlist</li>
			</ul>
		 </div>
	</nav>
	<div class="page-content">
								<div class="container">
										<h3 class="wishlist-title">My wishlist</h3>
										@if(count($wishlist) > 0)
										<table class="shop-table cart-table">
												<thead>
														<tr>
																<th ><span>Product</span></th>
																<th class="product-price"><span>Count</span></th>
																<th class="wishlist-action">Actions</th>
														</tr>
												</thead>
												<tbody>
														@foreach($wishlist as $value)
														<tr class="removetr{{$value['id']}}">
																
																<td>
																				{{$value['name']}}
																</td>
																 <td>
																				{{$value['product_wish_list_count']}}
																</td>
																
																
																<td class="wishlist-action">
																		<div class="d-lg-flex">
																				<a href="{{url('wishlist/view/'.$value['id'])}}"
																						class="btn  btn-outline btn-default btn-rounded btn-sm mb-2 mb-lg-0">
																						View Wishlist</a>
																						@if($value['product_wish_list_count'] > 0)
																								<a href="{{url('wishlist-download/'.$value['id'])}}" class="btn btn-dark btn-rounded btn-sm ml-lg-2 btn-cart">DownLoad</a>
																						@endif
																						<a href="javascript:void(0)" class="btn btn-dark btn-rounded btn-sm ml-lg-2 btn-cart removecart" data-id="{{$value['id']}}">Remove</a>
																		</div>
																</td>
														</tr>
														@endforeach
												 
													 
												</tbody>
										</table>
										@else
												<p>Nothing is here</p>
										@endif
									 
								</div>
						</div>
</x-guest-layout>
<script type="text/javascript">
	

	$(".cart-table").on("click", ".removecart", function() {
   	var id = $(this).attr('data-id');
   	 var whichtr = $(this).closest("tr");

       
   	if (confirm('Are you sure want to remove?')) {
			$.ajax({
	    		type: "post",
	        url: '{{ url("removewishlist") }}',
	        data: {
	        		"id": id,
	            "_token": "{{ csrf_token() }}",
	        },
	        success: function(response) {
    						whichtr.remove();  
	        },
	    });
	  }else{
	 		return false;
		}
});
</script>