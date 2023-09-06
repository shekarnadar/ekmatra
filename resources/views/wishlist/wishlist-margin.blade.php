	@foreach($result as $prod_val)
			<div class="product-wrap" id="product{{$prod_val['id']}}">
				<div class="product product-image-gap product-simple">
					<figure class="product-media">
						<a href="{{url('product')}}">
							<img src='{{url("product/".$prod_val['getProduct']['image'])}}' alt="Product" width="195" height="135" />
							 <img src='{{url("product/".$prod_val['getProduct']['image'])}}' alt="Product" width="195" height="135" />
						</a>
					   
						<div class="product-action">
							<a href="{{url('product-detail/'.$prod_val['getProduct']['slug'])}}" class="btn-product" title="Quick View">Quick View</a>
						</div>
					</figure>
					<div class="product-details">
						
						<h4 class="product-name">
							<a href="{{url('product-detail/'.$prod_val['id'])}}">{{$prod_val['getProduct']['name']}}</a>
						</h4>
					   
						<div class="product-pa-wrapper">
							<div class="product-price">
								<ins class="new-price">Price : {{$prod_val['getProduct']['price']}}</ins>
								<br/>
								@if(@auth()->user()->role_id=='4')
								<ins class="new-price" style="color:#c40000 !important;">Selling Price Rs. : {{$prod_val['margin_price']}}</ins>
								<br/>
								<ins class="new-price mt-2">Applied Margin : {{$prod_val['margin_value']}} {{($prod_val['margin_type'] == 'percent') ? '%' : 'Rs'}}</ins>
							   @endif
							</div>
							<div class="product-action">
								<a href="javascript:void(0)" class="btn-cart btn-product btn btn-link btn-underline remove
								" data-id="{{$prod_val['id']}}" >Remove</a>
							</div>
						</div>
					</div>						@if(@auth()->user()->role_id=='4')
					                                    <div class="row">
														    <div class="col-md-6 singlemargintype">
																<input type="hidden" name="wishlistid" id="wishlist_id" class="wishlist_id_{{$prod_val['id']}}" value="{{$prod_val['id']}}">
															<select class="form-control margintype_{{$prod_val['id']}}" name="margin_type" id="singlemargin_type">
																
																
																<option value="">Type</option>
																<option value="percent" {{$prod_val['margin_type']=='percent' ? 'selected' : ''}}>%</option>
																<option value="rs" {{$prod_val['margin_type']=='rs' ? 'selected' : ''}}>₹</option>
																
													        </select>
															</div>
															<div class="col-md-6 margintype">
													        <input type="text" class="form-control margin_{{$prod_val['id']}}" name="margin" id="singlemargin" placeholder="Value" value="{{$prod_val['margin_value']}}">
													
															</div>
															<button class="btn btn-dark singleapply" data-id="{{$prod_val['id']}}">Apply</button>
														</div>
												@endif

				</div>
			</div>
	@endforeach

	<script>
		$('.singleapply').click(function(){
		var wishlist_id=$(this).data('id');
		var margin_type = $(".margintype_"+wishlist_id).val();
		var margin = $(".margin_"+wishlist_id).val();
		if(margin_type == ''){
			 notifyMsg('Select Margin Type','error');
			 return false;
		}
		if(margin == ''){
			notifyMsg('Select Margin','error');
			return false;
		}
			$.ajax({
       		type: "post",
          url: '{{ url("wishlist/singlemargin") }}',
          data: {
			"wishlistid": "{{$wishlist['id']}}",
            "wishlist_id":wishlist_id,
            "margin_type": margin_type,
            "margin" : margin,
            "_token": "{{ csrf_token() }}",
        	},
          success: function(response) {
          	 notifyMsg('Margin Applied Successfully','success');
          	$(".wishlistDiv").html(response.html);
			 // location.reload();
          	
          },
          
       });
	});
	</script>