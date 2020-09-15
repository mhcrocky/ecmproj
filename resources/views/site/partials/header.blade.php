<header class="section-header">
	<section class="header-main">
		<div class="row align-items-center">
			<div class="col-lg-3">
				<div class="brand-warp">
					<a href="{{ url('/') }} ">
						<img src="{{ asset('frontend/images/logo-dark.png') }}" alt="logo">
					</a>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6">
				<form action="#" class="search-wrap">
					<div class="input-group">
						
						<input type="text" class="form-control" placeholder="serach">
						<div class="input-group-appeand">
							<button class="btn btn-primary" type="sumbit">
								<i class="fa fa-serach"></i>
							</button>
						</div>

					</div>
				</form>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="widgets-wrap d-flex justify-content-end">
					<div class="widget-header">
						<a href="#" class="icontext">
							<div class="icon-wrap icon-xs bg2 round text-secondary">
								<i class="fa fa-shopping-cart"></i>
							</div>
							<div class="text-wrap">
								<small>3 items</small>
							</div>
						</a>
					</div>

					@guest
					<div class="widget-header">
						<a href="{{ route('login') }} " class="ml-3 icontext">
							<div class="icon-wrap icon-xs bg-primary round text-white">
								<i class="fa fa-user"></i>
								<div class="text-wrap"><span>Login</span></div>
							</div>
						</a>
					</div>
					<div class="widget-header">
						<a href="{{ route('login') }} " class="ml-3 icontext">
							<div class="icon-wrap icon-xs bg-primary round text-white">
								<i class="fa fa-user"></i>
								<div class="text-wrap"><span>Register</span></div>
							</div>
						</a>
					</div>
					@else

					<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown">
							<a href="#" id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								{{ Auth::user()->full_name }}
							</a>

							<div class="dropdown-menu dropdown-menu-right">
								<a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									
									{{ __('Logout')}}
								</a>

								<form action="{{ route('logout') }}" method="POST" style="display: none" id="logout-form">
									@csrf
								</form>
							</div>
						</li>
					</ul>

					@endguest
				</div>
			</div>

		</div>
	</section>
	@include(site.partials.nav)
</header>