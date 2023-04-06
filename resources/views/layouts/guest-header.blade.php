<header class="header">
	<div class="header-top">
			<div class="container">
					<div class="header-left">
							<p class="welcome-msg">Welcome to Wolmart Store message or remove it!</p>
					</div>
					<div class="header-right">
							
							<!-- End of DropDown Menu -->
							
							<!-- End of Dropdown Menu -->
							<span class="divider d-lg-show"></span>
							<a href="{{url('vendor/login')}}" class="d-lg-show">Sell on Ekmatra</a>
							@auth
								<a href="{{url('dashboard')}}" class="d-lg-show">My Account</a>
							
							@else
								<a href="{{url('login')}}" class="d-lg-show login sign-in"><i class="w-icon-account"></i>Sign In</a>

								<span class="delimiter d-lg-show">/</span>
									<a href="{{url('login')}}" class="ml-0 d-lg-show login register">Register</a>
							@endauth
							
							
					</div>
			</div>
	</div>
	<!-- End of Header Top -->
	<div class="header-middle sticky-content fix-top sticky-header border-no">
			<div class="container">
					<div class="header-left mr-md-4">
							<a href="#" class="mobile-menu-toggle  w-icon-hamburger"></a>
							<a href="{{url('/')}}" class="logo">
									<img src="{{url('front//images/demos/demo12/logo.png')}}" alt="logo" width="144" height="45">
							</a>
							<form method="get" action="#"
									class="input-wrapper header-search hs-expanded hs-round d-none d-md-flex">
									<div class="select-box bg-white">
											<select id="category" name="category" onchange="location = this.value;">
													<option value="">All Categories</option>
													 @foreach($category as $value)
														<option value="{{url('shop/'.$value['name'])}}">{{$value['name']}}</option>
													@endforeach
											</select>
									</div>
									<input type="text" class="form-control bg-white pt-0 pb-0" name="search" id="search"
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
											<h4 class="chat font-size-md text-normal ls-normal text-white mb-0">
													<a href="#" class="text-capitalize text-primary font-weight-normal">Call
													</a>
													
											</h4>
											<a href="tel:#" class="phone-number font-weight-bolder ls-50">0(800)123-456</a>
									</div>
							</div>
							
							<div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
									<div class="cart-overlay"></div>
									@auth

									<a href="{{url('wishlist')}}" class="label-down link">
											<i class="w-icon-cart">
												<span class="cart-count text-white">{{\Session::get('wishlistCount')}}</span>
											</i>
											<span class="cart-label">Wishlist</span>
									</a>
									@else
									<a href="{{url('login')}}" class="label-down link login sign-in">
											<i class="w-icon-cart"></i>
											<span class="cart-label">Wishlist</span>
									</a>
									@endauth
									
									<!-- End of Dropdown Box -->
							</div>
					</div>
			</div>
	</div>
	<!-- End of Header Middle -->
</header>
