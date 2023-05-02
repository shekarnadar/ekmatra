@if(count($product) > 0)
	<div class="product-wrapper row cols-lg-4 cols-md-3 cols-2">
			@foreach($product as $prod_val)
				<div class="product-wrap">
					<div class="product product-image-gap product-simple">
						<figure class="product-media">
							@if(@$prod_val['image'])
							<a href="{{url('product-detail/'.$prod_val['slug'])}}">
								<img src='{{url("product/".$prod_val['image'])}}' alt="Product" width="195" height="135" />
								 <img src='{{url("product/".$prod_val['image'])}}' alt="Product" width="195" height="135" />
							</a>
							@else
							<a href="{{url('product-detail/'.$prod_val['getProduct']['slug'])}}">
								<img src='{{url("product/".$prod_val['getProduct']['image'])}}' alt="Product" width="195" height="135" />
								 <img src='{{url("product/".$prod_val['getProduct']['image'])}}' alt="Product" width="195" height="135" />
							</a>
							@endif
						   @if(@$prod_val['slug'])
							<div class="product-action">
								<a href="{{url('product-detail/'.$prod_val['slug'])}}" class="btn-product" title="Quick View">Quick View</a>
							</div>
						@else
						<div class="product-action">
								<a href="{{url('product-detail/'.$prod_val['getProduct']['slug'])}}" class="btn-product" title="Quick View">Quick View</a>
							</div>
						@endif
						</figure>
						<div class="product-details">
							
							<h4 class="product-name">
								<a href="{{url('product-detail/'.$prod_val['slug'])}}">{{$prod_val['name'] ? $prod_val['name'] : $prod_val['getProduct']['name']}}</a>
							</h4>
						   
							<div class="product-pa-wrapper">
								<div class="product-price">
									<ins class="new-price">MRP : {{$prod_val['mrp'] ? $prod_val['mrp'] : $prod_val['getProduct']['mrp']}}</ins>
								</div>
								<div class="product-price">
									<ins class="new-price">Min Qty : {{$prod_val['maq'] ? $prod_val['maq'] :  $prod_val['getProduct']['maq']}}</ins>
								</div>
								<div class="product-action">
									@auth
									<a href="javascript:void(0)" class="btn-cart btn-product btn btn-link btn-underline wishlist
									" data-id="{{$prod_val['id'] ? $prod_val['id'] : $prod_val['getProduct']['id'] }}" >Add To Wishlist</a>
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
									Showing<span>{{ $product->firstItem()}}-{{ $product->lastItem()}} of {{$product->total()}}</span>Products
								</p>
								@if ($product->lastPage() > 1)
								<ul class="pagination">
									<li class="prev {{ ($product->currentPage() == 1) ? ' disabled' : '' }}">
										@if($product->currentPage() != 1)
										<a data-value="{{$product->currentPage()-1}}" href="javascript:void(0)" aria-label="Previous" tabindex="-1" aria-disabled="true">
											<i class="w-icon-long-arrow-left"></i>Prev
										</a>
										@else
										<a href="javascript:void(0)" aria-label="Previous" tabindex="-1" aria-disabled="true">
											<i class="w-icon-long-arrow-left"></i>Prev
										</a>
										@endif
									</li>
									  @for ($i = 1; $i <= $product->lastPage(); $i++)
									  	<li class="page-item {{ ($product->currentPage() == $i) ? ' active' : '' }} ">
												<a class="page-link" href="javascript:void(0)"  data-value="{{$i}}">{{$i}}</a>
										</li>
									  @endfor
									
								
									<li class="next {{ ($product->currentPage() == $product->lastPage()) ? ' disabled' : '' }}">
										@if ($product->currentPage() != $product->lastPage())
										<a href="javascript:void" aria-label="Next" data-value="{{$product->currentPage()+1}}">
											Next<i class="w-icon-long-arrow-right"></i>
										</a>
										@else
												<a href="javascript:void(0)" aria-label="Next">
											Next<i class="w-icon-long-arrow-right"></i>
										</a>
										@endif
									</li>
								</ul>
								@endif
	</div>
@else
	<div class="product-wrapper row">
		<p>Data Not Found...</p>
	</div>
@endif