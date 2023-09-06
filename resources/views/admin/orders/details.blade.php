@section('breadcumb','Orders Details')
@section('pageTitle','Orders Details')
@include('layouts.datatable-css')
@php
$url = getAuthGaurd();
@endphp

<style>
	.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 24px;
  top:-12px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 12px;
  width: 12px;
  left: 4px;
  bottom: 2px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

</style>

<x-app-layout>
	<div class="row row-sm">
		<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0 mt-2 mb-2">Orders Details</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
									
								</div>
								
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="orders-list" class="table key-buttons text-md-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->orderItems as $orderItem)
                                        <tr>
                                            <td><img src="{{ url('/product/'.$orderItem->product->image) }}" alt="Product Image" width="50"></td>
                                            <td>{{ $orderItem->product->name }}</td>
                                            <td>{{ $orderItem->quantity }}</td>
                                            <td>{{ $orderItem->price }}</td>
                                            <!-- ... other columns ... -->
                                        </tr>
                                    @endforeach

                                    </tbody>
                                    </table>
								</div>
							</div>
						</div>
					</div>
	</div>
</x-app-layout>
