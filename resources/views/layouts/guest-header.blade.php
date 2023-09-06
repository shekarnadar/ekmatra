<style>
	#cart-products-container {
    max-height: 100%; /* Adjust the height as per your requirement */
    overflow-y: auto;
}
</style>
@php
$user_id=@auth()->user()->id;
@endphp
<header class="header header-border">
			<div class="header-top">
				<div class="container">
					<div class="header-left">
						<p class="welcome-msg">Welcome to Ekmatra Stores!</p>
					</div>
					<div class="header-right">
					   
						<!-- End of DropDown Menu -->

					  
						<span class="divider d-lg-show"></span>
							<a href="{{url('vendor/login')}}" class="d-lg-show">Sell on Ekmatra</a>
						@auth
								<a href="{{url('myaccount')}}" class="d-lg-show">My Account</a>
							
							@else
								<a href="{{url('login')}}" class="d-lg-show login sign-in"><i class="w-icon-account"></i>Sign In</a>

								<span class="delimiter d-lg-show">/</span>
									<a href="{{url('login')}}" class="ml-0 d-lg-show login register">Register</a>
							@endauth
					</div>
				</div>
			</div>
			<!-- End of Header Top -->

			<div class="header-middle">
				<div class="container">
					<div class="header-left mr-md-4">
						<a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
						</a>
						<a href="{{url('/')}}" class="logo ml-lg-0">
							<img src="{{url('front//images/demos/demo12/logo.png')}}" alt="logo" width="120" height="45" />
						</a>
						<form method="get" action="{{url('search')}}"
									class="input-wrapper header-search hs-expanded hs-round d-none d-md-flex">
									<div class="select-box bg-white">
											<select id="category"  onchange="location = this.value;" id="select_cat_id">
													<option value="">All Categories</option>
													 @foreach($category as $value)
														<option value="{{url('shop/'.$value['slug'])}}">{{$value['name']}}</option>
													@endforeach
											</select>
									</div>
									<input type="text" class="form-control bg-white pt-0 pb-0" name="q" id="search"
											placeholder="Search in..." required />
									<button class="btn btn-search" type="submit">
											<i class="w-icon-search"></i>
									</button>
							</form>
					</div>
					<div class="header-right ml-4">
						<div class="header-call d-xs-show d-lg-flex align-items-center">
							<a href="tel:#" class="w-icon-call"></a>
							<div class="call-info d-lg-show">
								<h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
									<a href="https://portotheme.com/cdn-cgi/l/email-protection#daf9" class="text-capitalize">Live Chat</a></h4>
								<a href="tel:#" class="phone-number font-weight-bolder ls-50">{{$contact}}</a>
							</div>
						</div>


                       
						
						
							<div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
									<div class="cart-overlay"></div>

									@auth

				                        <a href="{{url('wishlist')}}" class=" label-down link">
											<i class="w-icon-heart">
												<span class="cart-count text-white count" id="wishlistcount">{{\Session::get('wishlistCount')}}</span>
											</i>
												<span class="wishlist-lable d-lg-show">Wishlist</span>
											

										</a>
										@else
										<a href="{{url('login')}}" class="  login sign-in wishlistAuth">
											<i class="w-icon-heart"></i>
										</a>
									@endauth
									<!-- End of Dropdown Box -->
							</div>
						

							<div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
							@auth
							        <a href="#" class="cart-toggle label-down link">
										<i class="w-icon-cart">
											<span class="cart-count text-white" id="cart-counts">{{\Session::get('CartCount')}}</span>
										</i>
										<span class="cart-label">Cart</span>
									</a>

									@else
										<a href="{{url('login')}}" class="  login sign-in cartAuth">
											<i class="w-icon-cart"></i>
										</a>
							@endauth
								<div class="dropdown-box">
									<div class="cart-header">
										<span>Shopping Cart</span>
										<a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
									</div>

									<div class="products" id="cart-products-container">
										<!-- Cart items will be dynamically added here -->
									</div>
									
									<div class="cart-total">
										<label>Total:</label>
										<span class="price" id="cart-subtotal">Rs. 0.00</span>
									</div>
									<div class="cart-action">
										<a href="{{url('cart-product')}}" class="btn btn-dark btn-outline btn-rounded">Proceed</a>
										<a href="#" class="btn btn-primary btn-rounded clear" onclick="clearAllCartItems({{$user_id}})">Clear</a>

									</div>
									
								</div>
							
							</div>
					  
					</div>
				</div>
			</div>
			<!-- End of Header Middle -->


			<div class="header-bottom sticky-content fix-top sticky-header">
				<div class="container">
					<div class="inner-wrap">
						<div class="header-left">
							 <div class="dropdown category-dropdown has-border" data-visible="true">
								<a href="#" class="category-toggle" role="button" data-toggle="dropdown"
									aria-haspopup="true" aria-expanded="true" data-display="static"
									title="Browse Categories">
									<i class="w-icon-category"></i>
									<span>Browse Categories</span>
								</a>

								<div class="dropdown-box">
									<ul class="menu vertical-menu category-menu">
										@foreach($category as $cat)
										<li>
											<a href="{{url('shop/'.$cat['slug'])}}">
												<i><img src="{{url('category/'.$cat['image'])}}" alt="Categroy" width="15" height="15" /></i>{{$cat['name']}}
											</a>
										@if(count($cat['subCategory']) > 0)
											<ul class="subcatmenu">
												@foreach($cat['subCategory'] as $subcat)
												<li>
															<a href="{{url('shop/'.$cat['slug'].'/'.$subcat['slug'])}}">{{$subcat['name']}}</a>
									
												</li>
												@endforeach
												
											
											</ul>
										@endif
										</li>
										@endforeach
										
									   
										
										
									   
									</ul>
								</div>
							</div>
							<nav class="main-nav">
								<ul class="menu active-underline">
									
									<li class="shopby">
										<a href="javascript:void(0)">Shop By</a>

										<!-- Start of Megamenu -->
										<ul class="megamenu">
											<li>
												<h4 class="menu-title">Occasions</h4>
												<ul>
													@foreach($occasions as $value)
													<li><a href="{{url('shop-by/occasions/'.$value['slug'])}}">{{$value['name']}}</a></li>
													@endforeach
											   </ul>
											</li>
											<li>
												<h4 class="menu-title">Price</h4>
												<ul>
													<li><a href="{{url('shop-by/price/1-99')}}">Under 100</a></li>
													<li><a href="{{url('shop-by/price/100-499')}}">100 t0 500</a></li>
													<li><a href="{{url('shop-by/price/500-999')}}">500 to 1000</a></li>
													<li><a href="{{url('shop-by/price/1000-4999')}}">1000 to 5000</a></li>
													<li><a href="{{url('shop-by/price/0-5000')}}">5000 above</a></li>
													
												</ul>
											</li>
											<li>
											    <h4 class="menu-title">Brand</h4>
											    <ul id="brand-list">
											        @php $count = 0 @endphp 
											        @foreach($allFeature as $feature)
											            <li class="brand-item @if($count >= 5) hidden-brand @endif"><a href="{{url('shop-by/brand/'.$feature['name'])}}">{{$feature['name']}}</a></li>
											            @php $count++ @endphp
											        @endforeach
											        @if(count($allFeature) > 5)
											        <li><a href="#" id="view-more-link"> + View More</a></li>
											    @endif
											    </ul>
											    
											</li>
										   
										</ul>
										<!-- End of Megamenu -->
									</li>
									@if(@auth()->user()->role_id=='4')
									<li class="advanced">
										<a href="{{url('shop/advanced')}}">Advance</a>
									</li>
									@endif

									<li class="whatwedo">
                                        <a href="blog.html">What We Do</a>
                                        <ul>
                                            <li><a href="{{url('what-we-do/brandstore')}}">Brand Store</a></li>
                                            <li><a href="{{url('what-we-do/DriveMojo')}}">DriveMojo</a></li>
                                            
                                        </ul>
                                    </li>
								
									
									 <li class="aboutus">
										<a href="{{url('about-us')}}">About Us</a>
									</li>
									 <li class="wearehiring">
										<a href="{{url('we-are-hiring')}}">We are hiring</a>
									</li>
								   
								   
								</ul>
							</nav>
						</div>
						<div class="header-right">
						   @auth
							<a class="d-lg-show mr-2 btn btn-dark btn-outline p15" style="padding:15px" href="{{url('submitanenquiry')}}">Request for Quotations</a >
							@else
								<a class="d-lg-show mr-2 btn btn-dark btn-outline sign-in requestforquotation p15" style="padding:15px" href="{{url('login')}}">Request for Quotations</a>
							@endauth
							<a href="{{url('contact-us')}}" class="d-lg-show mr-2 btn btn-dark btn-outline p15" style="padding:15px" >Contact Us</a>
						</div>
					</div>
				</div>
			</div>
		</header>
		<script>
    document.addEventListener("DOMContentLoaded", function () {
        var brandList = document.getElementById("brand-list");
        var brandItems = brandList.getElementsByClassName("brand-item");
        var viewMoreLink = document.getElementById("view-more-link"); 
        for (var i = 5; i < brandItems.length; i++) {
            brandItems[i].style.display = "none";
        } 
        viewMoreLink.addEventListener("click", function (event) {
            event.preventDefault();         
            for (var i = 5; i < brandItems.length; i++) {
                brandItems[i].style.display = brandItems[i].style.display === "none" ? "list-item" : "none";
            }          
            if (brandItems[5].style.display === "none") {
                viewMoreLink.innerText = "+ View More";
            } else {
               // viewMoreLink.innerText = "- View Less";
            }
        });
    });
</script>
<script>
function clearAllCartItems(clientId) {
    $.ajax({
        type: 'POST',
        url: "{{ route('cart.clear') }}",
        data: {
            client_id: clientId,
            _token: "{{ csrf_token() }}"
        },
        success: function (response) {
            // Handle the response if needed
            console.log('Client ID:', response.client_id);
        console.log(response.message);
            // Update the cart display if necessary
            // ...
			fetchCartItemsAndUpdateDropdown();
			updateCartCount();
			calculateSubtotal();
            // Remove all cart items from the cart dropdown
            $('.products .cart-product').remove();
            // Hide the cart dropdown
            $('.cart-dropdown').removeClass('show');
        },
        error: function (error) {
            // Handle the error if needed
            console.error('An error occurred during the AJAX request:', error);
        }
    });
}

// Call the function when the "Clear" button is clicked
$('.clear').on('click', function (event) {
    event.preventDefault();
    const clientId = $(this).data('clientId');
    console.log('Client ID:', clientId);
    clearAllCartItems(clientId);
});


function calculateSubtotal(cartItems) {
    let subtotal = 0;

    // Loop through the cart items and add the price of each product multiplied by its quantity to the subtotal
    cartItems.forEach(function (item) {
        subtotal += item.product.price * item.quantity;
    });

    return subtotal;
}
	// Function to fetch cart items from the server and update the cart dropdown
function fetchCartItemsAndUpdateDropdown() {
    $.ajax({
        type: 'GET',
        url: "{{ route('getCartItems') }}", // Replace with the correct route to fetch cart items
        success: function (response) {
            const cartItems = response.cartItems;

            // Clear the cart dropdown content
            $('#cart-products-container').empty();

            // Loop through the cart items and add them to the cart dropdown
            cartItems.forEach(function (item) {
                const cartItem = `
                    <div class="product product-cart cart-product">
                        <div class="product-detail">
                            <a href="product-default.html" class="product-name">${item.product.name}</a>
                            <div class="price-box">
                                <span class="product-quantity">${item.quantity}</span>
                                <span class="product-price">Rs.${item.product.price}</span>
                            </div>
                        </div>
                        <figure class="product-media">
							<a href="product-default.html">
								<img src="${item.image}" alt="${item.product.name}" height="84" width="94">
							</a>
                        </figure>
                        <button class="btn btn-link btn-closed" data-product-id="${item.product.id}" data-cart-id="${item.id}" data-client-id="${item.client_id}">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
                $('#cart-products-container').append(cartItem);
            });

            const subtotal = calculateSubtotal(cartItems);

            // Update the subtotal display in the cart dropdown
            $('#cart-subtotal').text('Rs. ' + subtotal.toFixed(2));
        },
        error: function (error) {
            // Handle the error if needed
        }
    });
}

// Event handler for when the cart dropdown is opened
$('.cart-toggle').on('click', function () {
    fetchCartItemsAndUpdateDropdown();
});

$('#cart-products-container').on('click', '.btn-closed', function () {
    const cartId = $(this).data('cart-id');
    const clientId = $(this).data('client-id');
	const productId = $(this).data('product-id');
    removefromCart(cartId, clientId,productId);
});
function removefromCart(cartId, clientId,productId) {
    $.ajax({
        type: 'POST',
        url: "{{ route('cart.removefromcart') }}",
        data: {
            cart_id: cartId,
            client_id: clientId,
			product_id: productId,
            _token: "{{ csrf_token() }}"
        },
        success: function (response) {
            console.log(response.message);
            // Fetch updated cart items and update the cart dropdown
            fetchCartItemsAndUpdateDropdown();
			updateCartCount();
            // After removing the product, find the corresponding cart item and update the icons
            $(`.btn-cart[data-id="${productId}"][data-client_id="${clientId}"] .w-icon-check`).hide();
            $(`.btn-cart[data-id="${productId}"][data-client_id="${clientId}"] .w-icon-plus`).show();
        },
        error: function (error) {
            // Handle the error if needed
        }
    });
}
// Function to fetch cart items and update the cart count
function updateCartCount() {
    $.ajax({
        type: 'GET',
        url: "{{ route('getCartItems') }}",
        success: function (response) {
            const cartItems = response.cartItems;
            const cartCount = cartItems.length;
            $('#cart-counts').text(cartCount);
        },
        error: function (error) {
            // Handle the error if needed
        }
    });
}

// Call the updateCartCount function when the cart dropdown is opened and on page load
$(document).ready(function () {
    updateCartCount();
});

$('.cart-toggle').on('click', function () {
    updateCartCount();
});

</script>
	