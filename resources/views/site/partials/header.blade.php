<!--========== Section-header start ==========-->
<header class="section-header">

	<nav class="navbar navbar-dark navbar-expand p-0 bg-primary">
		<div class="container">
			<ul class="navbar-nav d-none d-md-flex mr-auto">
				<li class="nav-item"><a class="nav-link" href="#">Home</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Delivery</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Payment</a></li>
			</ul>
			<ul class="navbar-nav">
				<li class="nav-item"><a href="#" class="nav-link"> Call: +99812345678 </a></li>
				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> English </a>
					<ul class="dropdown-menu dropdown-menu-right" style="max-width: 100px;">
						<li><a class="dropdown-item" href="#">Arabic</a></li>
						<li><a class="dropdown-item" href="#">Russian </a></li>
					</ul>
				</li>
			</ul> <!-- list-inline //  -->
		</div> <!-- navbar-collapse .// -->
		<!-- container //  -->
	</nav> <!-- header-top-light.// -->

	<section class="header-main border-bottom">
		<div class="container">
			<div class="row align-items-center">

				<div class="col-lg-2 col-6">
					<a href="{{ url('/') }}">
						<img class="brand-wrap" src="{{ asset('frontend/images/logo.png') }}" alt="logo">
					</a>  <!-- brand-wrap.// -->
				</div>
				<div class="col-lg-6 col-12 col-sm-12">
					<form action="#" class="search">
						<div class="input-group w-100">
							<input type="text" class="form-control" placeholder="Search">
							<div class="input-group-append">
								<button class="btn btn-primary" type="submit">
									<i class="fa fa-search"></i>
								</button>
							</div>
						</div>
					</form> <!-- search-wrap .end// -->
				</div> <!-- col.// -->
				<div class="col-lg-4 col-sm-6 col-12">
					<div class="widgets-wrap float-md-right">
						<div class="widget-header  mr-3">
							<a href="{{ route('checkout.cart') }}" class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></a>
							<span class="badge badge-pill badge-danger notify">{{ $cartCount }}</span>
						</div>
						<div class="widget-header icontext">
							<a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></a>
							<div class="text ml-2">
								<span class="text-muted">Welcome!</span>
								@guest
								<div> 
									<a href="{{ url('login') }}">Sign in</a> |  
									<a href="{{ url('register') }}"> Register</a>
								</div>
								@else
								<ul class="navbar-nav ml-auto">
									<li class="nav-item dropdown">
										<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
											{{ Auth::user()->full_name }} <span class="caret"></span>
										</a>
										<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
											<a class="dropdown-item" href="{{ route('logout') }}"
											onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
											{{ __('Logout') }}
										</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
										</form>
									</div>
								</li>
							</ul>
							@endguest
						</div>
					</div>
				</div> <!-- widgets-wrap.// -->
			</div> <!-- col.// -->
		</div> <!-- row.// -->
	</div> <!-- container.// -->
</section> <!-- header-main .// -->
</header>
<!--==========Section-header end//==========-->
