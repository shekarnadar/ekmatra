@if(count($product) > 0)
<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

	<div class="product-wrapper row cols-lg-4 cols-md-3 cols-2 product_page">
			@foreach($product as $prod_val)
				<div class="product-wrap">
					<div class="product text-center">
						<figure class="product-media">
							<a href="{{url('product-detail/'.$prod_val['slug'])}}">
								<img src='{{url("product/".$prod_val['image'])}}' alt="Product" width="195" height="135"/>
							</a>
							
							<div class="product-action-vertical">
								  <a class="mt-2 multipproductcheckbox">
								 <input type="checkbox" class="multipleProduct" name="multipleProduct" data-product-id="{{@$prod_val['id']}}" value="{{@$prod_val['id'] ? $prod_val['id'] : @$prod_val['getProduct']['id']}}" data-price="{{@$prod_val['price'] ? @$prod_val['price'] : @$prod_val['getProduct']['price']}}"/>
								</a>
								<a href="{{url('product-detail/'.@$prod_val['slug'])}}" class="btn-product-icon  w-icon-search mt-2"
                                                title="Quickview"></a>

								@auth
								 <a href="#" class="btn-product-icon btn-wishlist w-icon-heart wishlist" data-id="{{@$prod_val['id']}}" data-price="{{@$prod_val['price'] ? @$prod_val['price'] : @$prod_val['getProduct']['price']}}"
                                                title="Add to wishlist"></a>
								@else  
                                <a href="{{url('login')}}" class="btn-product-icon btn-wishlist w-icon-heart  sign-in"></a>
								@endif

							</div>
							<div>
							<div class="product-action-verticals">
								
							@auth
								<a href="#" class="btn-product-icon btn-cart cart"
									data-name="{{ @$prod_val['name'] }}"
									data-image="{{url("product/".@$prod_val['image'])}}"
									data-client_id="{{ @$clientId = auth()->user()->id }}"
									data-moq="{{ @$prod_val['maq'] }}"
									data-id="{{ @$prod_val['id'] }}"
									data-price="{{ @$prod_val['price'] ? @$prod_val['price'] : @$prod_val['getProduct']['price'] }}"
									title="Add to Cart" id='btn-pro'>
									<!-- The '+' icon for adding to cart -->
									<i class="w-icon-plus"></i>
									<!-- The 'tick' icon for item added to cart (initially hidden) -->
									<i class="w-icon-check" style="display:none;"></i>
								</a>


							</div>
							@else 
							<div class="product-action-verticalss">

                                 
								<a href="{{url('login')}}" class="btn-product-icon btn-cart w-icon-plus  sign-in" id='btn-pro'></a>
                                
                               
                               
                               
						    </div>
							@endif
						</figure>
						<div class="product-details">
							
							<h4 class="product-name">
								<a href="{{url('product-detail/'.$prod_val['slug'])}}">{{$prod_val['name'] ? $prod_val['name'] : $prod_val['getProduct']['name']}}</a>
							</h4>
						    
								<div class="product-price">
									<ins class="new-price">MRP : {{@$prod_val['mrp'] ? @$prod_val['mrp'] : @$prod_val['getProduct']['mrp']}}</ins>
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
<script>
	
    // Function to check if a cart entry exists for a product and client
    function checkCartEntry(productId, clientId, successCallback, errorCallback) {
        $.ajax({
            type: 'POST',
            url: "{{ route('cart.check_entry') }}", // Replace with the route to check cart entries
            data: {
                product_id: productId,
                client_id: clientId,
                _token: "{{ csrf_token() }}"
            },
            success: successCallback,
            error: errorCallback
        });
    }

    // Function to add an item to the cart
    function addToCart(productId, clientId, productPrice, productName, productImage, moq) {
    $.ajax({
        type: 'POST',
        url: "{{ route('cart.add') }}",
        data: {
            product_id: productId,
            client_id: clientId,
            quantity: moq,
            name: productName,
            price: productPrice,
            image: productImage,
            _token: "{{ csrf_token() }}"
        },
        success: function (response) {
            // Handle the response if needed
            console.log(response.message);
            // Update the cart display if necessary
            // ...

            // Assuming the product information is displayed as a list item in the cart container
          
            $('.cart-dropdown').addClass('show');
            $('.cart-toggle').click();
            // Hide the '+' icon and show the 'tick' icon
            $(`.btn-cart[data-id="${productId}"][data-client_id="${clientId}"] .w-icon-plus`).hide();
            $(`.btn-cart[data-id="${productId}"][data-client_id="${clientId}"] .w-icon-check`).show();

            // Recalculate the subtotal and update it
            updateSubtotal();
        },
        error: function (error) {
            // Handle the error if needed
        }
    });
}

// Function to update the subtotal
function updateSubtotal() {
    let subtotal = 0;
    $('.product-subtotal').each(function () {
        const price = parseFloat($(this).prev('.product-price').text().replace('Rs.', ''));
        const quantity = parseInt($(this).siblings('.product-quantity').text());
        subtotal += price * quantity;
    });

    // Update the subtotal value in the cart
    $('.cart-total .price').text('$' + subtotal.toFixed(2));
}

    // Function to remove an item from the cart
    function removeFromCart(productId, clientId) {
        $.ajax({
            type: 'POST',
            url: "{{ route('cart.remove') }}", // Change to the route to remove items from the cart
            data: {
                product_id: productId,
                client_id: clientId,
                _token: "{{ csrf_token() }}"
            },
            success: function (response) {
                // Handle the response if needed
                console.log(response.message);
                // Update the cart display if necessary
                // ...
				
				$('.cart-dropdown').addClass('show');
				$('.cart-toggle').click();
                // Hide the 'tick' icon and show the '+' icon
                $(`.btn-cart[data-id="${productId}"][data-client_id="${clientId}"] .w-icon-check`).hide();
                $(`.btn-cart[data-id="${productId}"][data-client_id="${clientId}"] .w-icon-plus`).show();

				$(`.cart-product[data-product-id="${productId}"][data-client-id="${clientId}"]`).remove();
            // Recalculate the subtotal and update it
            updateSubtotal();

            // If the cart is empty, hide the cart dropdown
            if ($('.products .cart-product').length === 0) {
                $('.cart-dropdown').removeClass('show');
            }

            },
            error: function (error) {
                // Handle the error if needed
            }
        });
    }

    $(document).ready(function() {

        $('.cart').each(function() {
        const productId = $(this).data('id');
        const clientId = $(this).data('client_id');
        const isProductInCart = localStorage.getItem(`cart_${productId}_${clientId}`);

        if (isProductInCart === 'true') {
            // Product is in the cart, show the 'tick' icon
            $(`#btn-pro[data-id="${productId}"][data-client_id="${clientId}"] .w-icon-plus`).hide();
            $(`#btn-pro[data-id="${productId}"][data-client_id="${clientId}"] .w-icon-check`).show();
        }
    });
        let isSubmitting = false;
        $('.cart').on('click', function (e) {
            e.preventDefault();
            if (isSubmitting) {
            return;
        }

        isSubmitting = true;
            const productId = $(this).data('id');
            const clientId = $(this).data('client_id');
            const productPrice = parseFloat($(this).data('price'));
            const productName = $(this).data('name');
            const productImage = $(this).data('image');
			const moq = $(this).data('moq');
            checkCartEntry(
                productId,
                clientId,
                function (response) {
                    if (response.exists) {
                        // Entry exists, remove it from the cart
                        removeFromCart(productId, clientId);
                       // localStorage.setItem(`cart_${productId}_${clientId}`, 'false');
                    } else {
                        // Entry does not exist, add it to the cart
                        addToCart(productId, clientId, productPrice, productName, productImage,moq);
						//localStorage.setItem(`cart_${productId}_${clientId}`, 'true');

                    }
                    isSubmitting = false;
                },
                function (error) {
                    // Handle the error if needed
                    isSubmitting = false;
                }
            );
        });
    });
	

</script>
