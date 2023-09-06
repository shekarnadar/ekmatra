<x-guest-layout>
	
	<nav class="breadcrumb-nav mb-10">
		<div class="container">
			<ul class="breadcrumb">
					<li><a href="{{url('/')}}">Home</a></li>
					<li>Cart Products</li>
			</ul>
		 </div>
	</nav>
    <meta http-equiv="Cache-Control" content="no-store, private, max-age=0">
<style>
    .minus
    {
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    right: 4.5rem;
    padding: 5px;
    width: 2.4rem;
    height: 2.4rem;
    border-radius: 50%;
    background-color: #eee;
    color: #666;
    font-size: 1.4rem;
    border: none;
    }
    .plus
    {
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    right: 1.5rem;
    padding: 5px;
    width: 2.4rem;
    height: 2.4rem;
    border-radius: 50%;
    background-color: #eee;
    color: #666;
    font-size: 1.4rem;
    border: none;
    }
    </style>
<script src="{{url('backend/plugins/notify/js/notifIt.js')}}"></script>

<script src="{{url('backend/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">
	function notifyMsg(msg,type) {
		notif({
			msg: msg,
			type: type
		});
	}
</script>

@if(session('order_placed'))
<script>
        $(document).ready(function() {
            notifyMsg('We have received your order. We will get back to you within 24 hours with the mockups.', 'success');
            updateCartCount();
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
        });
    </script>
@endif

@php
$user_id=@auth()->user()->id;
@endphp

    <!-- Start of PageContent -->
    <div class="page-content">
    <form id="checkout-form" action="{{ route('checkout') }}" method="POST" >
        @csrf
                <div class="container">
                <h3 class="wishlist-title">My Cart Products</h3>
          
                    <div class="row gutter-lg mb-10">
                        <div class="col-lg-8 pr-lg-4 mb-6">
    @if(count($cartItems) > 0)
                        <table class="shop-table cart-table">
    <thead>
        <tr>
            <th class="product-name"><span>Product</span></th>
            <th></th>
            <th class="product-price"><span>Price</span></th>
            <th class="product-quantity"><span>Quantity</span></th>
            <th class="product-subtotal"><span>Amount</span></th>
        </tr>
    </thead>
    <tbody>
   
        @php
        $totalSubtotal = 0;
        @endphp
        
        @foreach ($cartItems as $cartItem)
       
        <tr>
            <td class="product-thumbnail">
                <div class="p-relative">
                    <a href="">
                        <figure>
                            <img src="{{ $cartItem->image }}" alt="{{ $cartItem->product->name }}" width="300" height="338">
                        </figure>
                    </a>
                    <buttaon type="submit" class="btn btn-close" data-cart_id="{{ $cartItem->id }}" data-client_id="{{ auth()->user()->id }}"><i class="fas fa-times"></i></button>
                </div>
            </td>
            <td class="product-name">
                <a href="">{{ $cartItem->product->name }}</a>
            </td>
            <td class="product-price"><span class="amount">Rs. {{ $cartItem->product->price }}</span></td>
               
                    <td class="product-quantity">
                    <div class="input-group">
                        <input class="quantity form-control" type="number" min="{{ $cartItem->product->maq }}" max="100000" value="{{ $cartItem->quantity }}" readonly>
                        <a class="quantity-plus w-icon-plus plus"  data-client_id="{{ auth()->user()->id }}" data-cart_id="{{ $cartItem->id }}" data-qty="{{ $cartItem->quantity }}" data-price="{{ $cartItem->price }}"></a>
                        <a class="quantity-minus w-icon-minus minus"  data-client_id="{{ auth()->user()->id }}" data-cart_id="{{ $cartItem->id }}" data-qty="{{ $cartItem->quantity }}" data-price="{{ $cartItem->price }}"></a>
                    </div>
                    </td>
                    <td class="product-subtotal">
                    <span class="amounts" data-cart_id="{{ $cartItem->id }}">Rs. {{ $subtotal = (float) $cartItem->product->price * $cartItem->quantity }}</span> 
                    </td>
                 
        </tr>
        @php
        $totalSubtotal += $subtotal;
        @endphp
       
       
        @endforeach
        @else
        <p>No products found in the cart.</p>
        @endif
    </tbody>
</table>

                     <div class="cart-action mb-6">
                                <a href="{{url('shop/product')}}" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>

                                <button type="submit" class="btn btn-rounded btn-default btn-clear clear" name="clear_cart" value="Clear Cart" onclick="clearAllCartItems({{$user_id}})">Clear Cart</button> 
                            </div>
                     
                            
                        </div>
                        @if(count($cartItems) > 0)
                        <div class="col-lg-4 sticky-sidebar-wrapper">
                            <div class="sticky-sidebar">
                                <div class="cart-summary mb-4">
                                    <h3 class="cart-title text-uppercase">Cart Totals</h3>
                                    <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                        <label class="ls-25">Total</label>
                                        <span>Rs. {{ $totalSubtotal }}</span>
                                    </div>

                                    <hr class="divider">

                                   
                                    <a href="#" class="btn btn-block btn-dark btn-icon-right btn-rounded btn-checkout"
                                            onclick="event.preventDefault(); document.getElementById('checkout-form').submit();">
                                            Proceed to checkout <i class="w-icon-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        @else

                        @endif
                    </div>
                </div>
        </form>
            </div>
            <!-- End of PageContent -->
											
	</div>
	</center>
</div>


<script>
$(document).ready(function () {
    $('.quantity-minus').on('click', function (event) {
        event.preventDefault();
        var input = $(this).siblings('.quantity');
        var newQuantity = parseInt(input.val());
        var minMAQ = parseInt(input.attr('min')); // Assuming you have the minimum allowed quantity as an attribute
        
        if (newQuantity > minMAQ) {
            input.val(newQuantity); // Subtract 1 from the current quantity
        } else {
            alert("Product quantity cannot be less than the minimum MOQ.");
        }
    });
});

   $(document).ready(function() {
    $('.btn-close').on('click', function() {
      const cart_id = $(this).data('cart_id');
      const client_id = $(this).data('client_id');
      removeCartItem(cart_id);
    });

    function removeCartItem(cart_id,client_id) {
      $.ajax({
        method: 'DELETE',
        url: `/delete/${cart_id}`,
        data: {
            cart_id:cart_id,
            client_id:client_id,
          _token: '{{ csrf_token() }}',
        },
        success: function(data) {
          // Handle the success response if needed
          // For example, you can remove the cart entry from the UI
          $(`.p-relative[data-cart_id="${cart_id}"]`).remove();
          console.log('Cart item removed successfully.');
          location.reload();
        },
        error: function(xhr) {
          console.error('Failed to remove cart item:', xhr.responseText);
        }
      });
    }
  });

 $(document).ready(function() {
    fetchCartQuantities();
    $('.quantity-plus').on('click', function() {
      const client_id = $(this).data('client_id');
      const cart_id = $(this).data('cart_id');
      const price = $(this).data('price');
      const input = $(this).closest('.input-group').find('.quantity');
      let quantity = parseInt(input.val());
      input.val(quantity);
      updateCartItemQuantity(client_id, cart_id, quantity,price);
    });

    $('.quantity-minus').on('click', function() {
      const client_id = $(this).data('client_id');
      const cart_id = $(this).data('cart_id');
      const price = $(this).data('price');
      const input = $(this).closest('.input-group').find('.quantity');
      let quantity = parseInt(input.val());
      quantity = Math.max(1, quantity); // Ensure quantity is not less than 1
      input.val(quantity);
      updateCartItemQuantity(client_id, cart_id, quantity,price);
    });

    function updateCartItemQuantity(client_id, cart_id, quantity, price) {
  $.ajax({
    method: 'PUT',
    url: `/cart/${cart_id}`,
    data: {
      quantity: quantity,
      client_id: client_id,
      price: price,
      _token: '{{ csrf_token() }}',
    },
    success: function(data) {
      // Update the subtotal in the UI
      const subtotal = quantity * price;
      $(`.amounts[data-cart_id="${cart_id}"]`).text('Rs. ' + subtotal.toFixed(2));

      console.log('Quantity updated successfully.');
      
      // Recalculate and update the total amount
      updateTotal();
      
      // Call the function to update the subtotal of individual cart item
      //updateSubtotal(quantity, client_id, price);
    },
    error: function(xhr) {
      console.error('Failed to update quantity:', xhr.responseText);
    }
  });
}

function updateTotal() {
  // Calculate the new total based on the updated quantities
  let total = 0;
  $('.amounts').each(function() {
    const subtotalText = $(this).text();
    const subtotalValue = parseFloat(subtotalText.replace('Rs. ', ''));
    total += subtotalValue;
  });

  // Update the total amount on the page
  $('.cart-subtotal span').text('Rs. ' + total.toFixed(2));
}


    function fetchCartQuantities() {
      $.ajax({
        method: 'GET',
        url: '/fetch_cart', // Ensure this URL is correct for your application
        success: function(data) {
          // Update the quantity input values based on the data received from the server
          $('.quantity').each(function(index, element) {
            const cart_id = $(element).siblings('.quantity-plus').data('cart_id');
            const cartItem = data.find(item => item.id === cart_id);
            if (cartItem) {
              $(element).val(cartItem.quantity);
            }
          });
          console.log('Cart quantities fetched successfully.');
        },
        error: function(xhr) {
          console.error('Failed to fetch cart quantities:', xhr.responseText);
        }
      });
    }


  });

  
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
			location.reload();

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

function updateSubtotal(cart_id, quantity) {
  console.log('Cart ID:', cart_id);
  console.log('Quantity:', quantity);
   const price = parseFloat($(`.quantity-plus[data-cart_id="${cart_id}"]`).data('price'));
   console.log('Price:', price);
  const subtotal = quantity * price;
  console.log('Subtotal:', subtotal);
  $(`.amounts[data-cart_id="${cart_id}"]`).text('Rs. ' + subtotal.toFixed(2));
}


</script>
</x-guest-layout>