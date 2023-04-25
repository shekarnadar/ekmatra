<x-login-layout>

	<div class="my-auto page page-h">
		<div class="main-signin-wrapper">
			<div class="main-card-signin d-md-flex wd-100p">
				<div class="wd-md-50p login d-none d-md-block page-signin-style p-5 text-white">
						<div class="my-auto authentication-pages">
							<div>
								<img src="{{url('logo.png')}}" class=" m-0 mb-4" alt="logo">
								<p>India’s Leading platform for Unique and Innovative Corporate Gifts and Rewards. Trusted by 4000+ Organisations.</p>
							</div>
						</div>
				</div>
				<div class="p-5 wd-md-50p">
						<div class="main-signin-header">
							<h2>Welcome back!</h2>
							<h4>Please sign in to continue</h4>
							<x-auth-session-status class="mb-4" :status="session('status')" />
							<form method="POST" action="{{ url('vendor/login') }}">
								@csrf
								<div class="form-group">
									<label>Email</label>
									<x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
									<x-input-error :messages="$errors->get('email')" class="mt-2" />
								</div>
								<div class="form-group">
									<label>Password</label> 
									   <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" class="form-control"/>

										<x-input-error :messages="$errors->get('password')" class="mt-2" />
								</div>
								 <x-primary-button class="btn btn-main-primary btn-block">{{ __('Sign In') }}</x-primary-button>
							</form>
						</div>
						<div class="main-signin-footer mt-3 mg-t-5">
							<p><a href="#">Forgot password?</a></p>
						</div>
				 </div>
				</div>
		</div>
	</div>
</x-login-layout>
 
