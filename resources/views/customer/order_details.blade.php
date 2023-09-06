<x-guest-layout>
	
	<nav class="breadcrumb-nav mb-10">
		<div class="container">
			<ul class="breadcrumb">
					<li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('myaccount')}}">My Account</a>
                    <li><a href="{{url('myorders')}}">My Orders</a>
					<li>Order Details</li>

			</ul>
		 </div>
	</nav>
    <meta http-equiv="Cache-Control" content="no-store, private, max-age=0">

    <!-- Start of PageContent -->
    <div class="page-content">
        
                <div class="container">
                <h3 class="wishlist-title">Order Details - Order ID: {{ $order->id }}</h3>
          
                    <div class="row gutter-lg mb-10">
                        <div class="col-lg-12 pr-lg-4 mb-6">
                        <table class="shop-table cart-table">
            <thead>
            <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
   
            @foreach($order->orderItems as $orderItem)
                <tr>
                <td><img src="{{ asset('product/'.$orderItem->product->image) }}" alt="Product Image" style="max-width: 100px;"></td>
                    <td>{{ $orderItem->product->name }}</td>
                    <td>{{ $orderItem->quantity }}</td>
                    <td>Rs. {{ $orderItem->price }}</td>
                    <td>Rs. {{ $orderItem->quantity * $orderItem->price }}.00</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-right"><strong>Total:</strong></td>
                <td><strong>Rs. {{ $order->total_amount }}</strong></td>
            </tr>

    </tbody>
</table>

                </div>
            </div>
            <!-- End of PageContent -->
											
	</div>
	</center>
</div>


</x-guest-layout>