<x-guest-layout>
	
	<nav class="breadcrumb-nav mb-10">
		<div class="container">
			<ul class="breadcrumb">
					<li><a href="{{url('/')}}">Home</a></li>
					<li>Wishlist</li>
			</ul>
		 </div>
	</nav>
	<div class="page-content">
								<div class="container">
										<h3 class="wishlist-title">My wishlist</h3>
										<div class="row cols-sm-3 cart-table">
                               
																@foreach($wishlist as $value)
                                <div class="store-wrap mb-4">
                                    <div class="store store-grid store-wcfm">
                                        <div class="store-header">
                                            <figure class="store-banner">
                                                <img src="{{url('front/background.PNG')}}" alt="Vendor" width="200" height="100" style="background-color: #40475E">
                                            </figure>
                                        </div>
                                        <!-- End of Store Header -->
                                        <div class="store-content">
                                            <h4 class="store-title">
                                                <a href="vendor-dokan-store.html">{{$value['name']}}</a>
                                            </h4>
                                           
                                            <ul class="seller-info-list list-style-none">
                                                <li class="store-email">
                                                    <a href="email:#">
                                                       
                                                        <span>Count :{{$value['product_wish_list_count']}} </span>
                                                    </a>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                        <!-- End of Store Content -->
                                       
                                        <div class="store-footer">
                                        	 @if($value['product_wish_list_count'] > 0)
                                            <a href="{{url('wishlist-download/'.$value['id'])}}"><figure class="seller-brand">
                                                <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-download">
                                                    <i class="w-icon-download"></i>
                                                </span>
                                                
                                            </div>

                                            </figure></a>
                                            @endif
                                            <a href="#" class="btn btn-inquiry btn-rounded btn-icon-left">View Vishlist</a>
                                            <a href="#" class="btn btn-rounded btn-visit removecart" data-id="{{$value['id']}}">Remove</a>
                                        </div>
                                        <!-- End of Store Footer -->
                                    </div>
                                    <!-- End of Store -->
                                </div>
                                @endforeach

                                
                            </div>
									
									 <p class="show" style="display:none">Nothing is here</p>
								</div>
						</div>
</x-guest-layout>
<script type="text/javascript">
	

	$(".cart-table").on("click", ".removecart", function() {
   	var id = $(this).attr('data-id');
   	var whichtr = $(this).closest("div");
 		var rowCount = $(".cart-table div").length;
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
	        	   	if(rowCount == 1){
	        	   		$(".show").show();
	        	   		$(".cart-table").hide();
	        	   	}  
	        },
	    });
	  }else{
	 		return false;
		}
});
</script>