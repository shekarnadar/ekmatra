<x-guest-layout>
	
	<nav class="breadcrumb-nav mb-10">
		<div class="container">
			<ul class="breadcrumb">
					<li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('myaccount')}}">My Account</a>
					<li>My Orders</li>
			</ul>
		 </div>
	</nav>
    <meta http-equiv="Cache-Control" content="no-store, private, max-age=0">

    <!-- Start of PageContent -->
    <div class="page-content">
        
                <div class="container">
                <h3 class="wishlist-title">My Orders</h3>
          
                    <div class="row gutter-lg mb-10">
                        <div class="col-lg-8 pr-lg-4 mb-6">
    @if(count($orders) > 0)
                        <table class="shop-table cart-table">
            <thead>
                <tr>
                <th>Order ID</th>
                <th>Total Amount</th>
                <th>Order Time</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>
   
            @foreach($orders as $order)
       
            <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->total_amount }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <a href="{{ route('orderdetails', $order->id) }}" class="btn btn-info">View Details</a>
                    </td>
            </tr>
        @endforeach
        @else
        <p>Orders Not Found</p>
        @endif
    </tbody>
</table>

                </div>
            </div>
            <!-- End of PageContent -->
											
	</div>
	</center>
</div>


</x-guest-layout>