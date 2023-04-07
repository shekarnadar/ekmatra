<x-guest-layout>
	 <nav class="breadcrumb-nav">
	  <div class="container">
	      <ul class="breadcrumb bb-no">
	          <li><a href="{{url('/')}}">Home</a></li>
	      </ul>
	  </div>
   </nav>
   <div class="page-content">
                <div class="container">
                    <!-- Start of Shop Content -->
                    <div class="shop-content row gutter-lg mb-10">
                        <!-- Start of Sidebar, Shop Sidebar -->
                      
                        <!-- End of Shop Sidebar -->

                        <!-- Start of Shop Main Content -->
                        <div class="main-content">
                            
                            <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">
                                @foreach($inquiry as $value)
                                <div class="product-wrap">
                                    <div class="product product-simple text-center">
                                        <figure class="product-media">
                                            <a href="{{url('product-detail/'.$value['product']['id'])}}">
                                                <img src="{{url('product/'.$value['product']['image'])}}" alt="Product" width="300"
                                                    height="338" />
                                            </a>
                                            
                                            <div class="product-action">
                                                <a href="{{url('product-detail/'.$value['product']['id'])}}" class="btn-product" title="Quick View">Quick
                                                    View</a>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <h4 class="product-name"><a href="{{url('product-detail/'.$value['product']['id'])}}">{{$value['product']['name']}}</a>
                                            </h4>
                                            <div class="product-pa-wrapper">
                                                <div class="product-price"> {{$value['product']['price']}}  Qty:{{$value['quantity']}}</div>
                                                
                                            </div>
                                            <div class="sold-by">
                                                Sold By:
                                                <a href="#">{{$value['product']['createdBy']['name']}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                                
                            </div>
                        </div>
                        <!-- End of Shop Main Content -->
                    </div>
                    <!-- End of Shop Content -->
                </div>
            </div>
</x-guest-layout>