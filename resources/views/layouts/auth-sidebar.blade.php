@php
$url = getAuthGaurd();
@endphp
<aside class="main-sidebar app-sidebar sidebar-scroll">
			<div class="main-sidebar-header">
				<a class="desktop-logo logo-light active" href="index.html" class="text-center mx-auto"><img src="{{url('backend/img/brand/logo.png')}}" class="main-logo"></a>
				<a class="desktop-logo icon-logo active"href="index.html"><img src="{{url('backend/img/brand/favicon.png')}}" class="logo-icon"></a>
				<a class="desktop-logo logo-dark active" href="index.html"><img src="{{url('backend/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-dark active" href="index.html"><img src="{{url('backend/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
			</div><!-- /logo -->
			<div class="main-sidebar-loggedin">
				<div class="app-sidebar__user">
					<div class="dropdown user-pro-body text-center">
						<div class="user-pic">
							<img src="{{url('backend/img/faces/6.jpg')}}" alt="user-img" class="rounded-circle mCS_img_loaded">
						</div>
						<div class="user-info">
							<h6 class=" mb-0 text-dark"> {{ Auth::guard(getAuthGaurd())->user()->name }}</h6>
							<span class="text-muted app-sidebar__user-name text-sm">{{ucfirst(getAuthGaurd())}}</span>
						</div>
					</div>
				</div>
			</div><!-- /user -->
			<div class="sidebar-navs">
				<ul class="nav  nav-pills-circle">
					
				   
				  
					<li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout">
						<a class="nav-link text-center m-2" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<i class="fe fe-power"></i>
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</li>
				</ul>
			</div>
			<div class="main-sidebar-body">
				<ul class="side-menu ">
					<li class="slide">
						<a class="side-menu__item" href='{{url("$url/dashboard")}}'><i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">Dashboard</span></a>
					</li>
					@if($url == 'admin')
					<li class="slide">
						<a class="side-menu__item {{ request()->is($url.'/vendors',$url.'/vendor/add',$url.'/vendor/edit/*')? 'active' : '' }}" href='{{url("$url/vendors")}}'><i class="side-menu__icon fe fe-database"></i><span class="side-menu__label">vendors</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item  {{ request()->is($url.'/features',$url.'/feature/add',$url.'/feature/edit/*')? 'active' : '' }}" href='{{url("$url/features")}}'><i class="side-menu__icon fe fe-database"></i><span class="side-menu__label">Features</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item {{ request()->is($url.'/categories',$url.'/category/add',$url.'/category/edit/*',$url.'/category/*')? 'active' : '' }}" href='{{url("$url/categories")}}'><i class="side-menu__icon fe fe-database"></i><span class="side-menu__label">Category</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item {{ request()->is($url.'/deals',$url.'/deals/add',$url.'/deals/edit/*')? 'active' : '' }}" href='{{url("$url/deals")}}'><i class="side-menu__icon fe fe-database"></i><span class="side-menu__label">Deals</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item {{ request()->is($url.'/inquiry')? 'active' : '' }}" href='{{url("$url/inquiry")}}'><i class="side-menu__icon fe fe-database"></i><span class="side-menu__label">Inquiry</span></a>
					</li>
					@endif
					<li class="slide">
						<a class="side-menu__item {{ request()->is($url.'/products',$url.'/product/add',$url.'/product/edit/*')? 'active' : '' }}" href='{{url("$url/products")}}'><i class="side-menu__icon fe fe-database"></i><span class="side-menu__label">Product</span></a>
					</li>
					
					
				  
				</ul>
			</div>
		</aside>