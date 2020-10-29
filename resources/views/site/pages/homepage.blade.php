@extends('site.app')
@section('title', 'Homepage')

@section('content')

<!--========= Banner-section start =========-->
<section class="section-intro padding-y-sm">
	<div class="container">

		<div class="intro-banner-wrap">
			<img src="https://via.placeholder.com/1200x300" class="img-fluid rounded">
		</div>

	</div> <!-- container //-->
</section>
<!--========== Banner-section end//==========-->


<!--========== Feature-section start==========-->
<section class="section-content padding-y-sm">
	<div class="container">
		<article class="card card-body">

			<div class="row">
				<div class="col-md-4">	
					<figure class="item-feature">
						<span class="text-primary"><i class="fa fa-2x fa-truck"></i></span>
						<figcaption class="pt-3">
							<h5 class="title">Fast delivery</h5>
							<p>Dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore </p>
						</figcaption>
					</figure> <!-- iconbox // -->
				</div><!-- col // -->
				<div class="col-md-4">
					<figure class="item-feature">
						<span class="text-primary"><i class="fa fa-2x fa-landmark"></i></span>	
						<figcaption class="pt-3">
							<h5 class="title">Creative Strategy</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							</p>
						</figcaption>
					</figure> <!-- iconbox // -->
				</div><!-- col // -->
				<div class="col-md-4">
					<figure class="item-feature">
						<span class="text-primary"><i class="fa fa-2x fa-lock"></i></span>
						<figcaption class="pt-3">
							<h5 class="title">High secured </h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							</p>
						</figcaption>
					</figure> <!-- iconbox // -->
				</div> <!-- col // -->
			</div>
		</article>

	</div> <!-- container .//  -->
</section>
<!--========== Feature-section end// ==========-->




<!--========== Popular-products-section start ==========-->
<section class="section-content">
	<div class="container">

		<header class="section-heading">
			<h3 class="section-title">Popular products</h3>
		</header><!-- sect-heading -->


		<div class="row">
			<div class="col-md-3">
				<div href="#" class="card card-product-grid">
					<a href="#" class="img-wrap"> <img src="https://via.placeholder.com/370x300"> </a>
					<figcaption class="info-wrap">
						<a href="#" class="title">Just another product name</a>

						<div class="rating-wrap">
							<ul class="rating-stars">
								<li style="width:80%" class="stars-active"> 
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
								</li>
								<li>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 
								</li>
							</ul>
							<span class="label-rating text-muted"> 34 reviws</span>
						</div>
						<div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
					</figcaption>
				</div>
			</div> <!-- col.// -->
			<div class="col-md-3">
				<div href="#" class="card card-product-grid">
					<a href="#" class="img-wrap"> <img src="https://via.placeholder.com/370x300"> </a>
					<figcaption class="info-wrap">
						<a href="#" class="title">Some item name here</a>

						<div class="rating-wrap">
							<ul class="rating-stars">
								<li style="width:80%" class="stars-active"> 
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
								</li>
								<li>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 
								</li>
							</ul>
							<span class="label-rating text-muted"> 34 reviws</span>
						</div>
						<div class="price mt-1">$280.00</div> <!-- price-wrap.// -->
					</figcaption>
				</div>
			</div> <!-- col.// -->
			<div class="col-md-3">
				<div href="#" class="card card-product-grid">
					<a href="#" class="img-wrap"> <img src="https://via.placeholder.com/370x300"> </a>
					<figcaption class="info-wrap">
						<a href="#" class="title">Great product name here</a>

						<div class="rating-wrap">
							<ul class="rating-stars">
								<li style="width:80%" class="stars-active"> 
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
								</li>
								<li>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 
								</li>
							</ul>
							<span class="label-rating text-muted"> 34 reviws</span>
						</div>
						<div class="price mt-1">$56.00</div> <!-- price-wrap.// -->
					</figcaption>
				</div>
			</div> <!-- col.// -->
			<div class="col-md-3">
				<div href="#" class="card card-product-grid">
					<a href="#" class="img-wrap"> <img src="https://via.placeholder.com/370x300"> </a>
					<figcaption class="info-wrap">
						<a href="#" class="title">Just another product name</a>

						<div class="rating-wrap">
							<ul class="rating-stars">
								<li style="width:80%" class="stars-active"> 
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
								</li>
								<li>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 
								</li>
							</ul>
							<span class="label-rating text-muted"> 34 reviws</span>
						</div>
						<div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
					</figcaption>
				</div>
			</div> <!-- col.// -->
		</div> <!-- row.// -->

	</div> <!-- container .//  -->
</section>
<!--========== Popular-products-section end// ==========-->




<!--========== New-arrived-section start ==========-->
<section class="section-content">
	<div class="container">

		<header class="section-heading">
			<h3 class="section-title">New arrived</h3>
		</header><!-- sect-heading -->

		<div class="row">
			<div class="col-md-3">
				<div href="#" class="card card-product-grid">
					<a href="#" class="img-wrap"> <img src="https://via.placeholder.com/370x300"> </a>
					<figcaption class="info-wrap">
						<a href="#" class="title">Just another product name</a>

						<div class="rating-wrap">
							<ul class="rating-stars">
								<li style="width:80%" class="stars-active"> 
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
								</li>
								<li>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 
								</li>
							</ul>
							<span class="label-rating text-muted"> 34 reviws</span>
						</div>
						<div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
					</figcaption>
				</div>
			</div> <!-- col.// -->
			<div class="col-md-3">
				<div href="#" class="card card-product-grid">
					<a href="#" class="img-wrap"> <img src="https://via.placeholder.com/370x300"> </a>
					<figcaption class="info-wrap">
						<a href="#" class="title">Some item name here</a>

						<div class="rating-wrap">
							<ul class="rating-stars">
								<li style="width:80%" class="stars-active"> 
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
								</li>
								<li>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 
								</li>
							</ul>
							<span class="label-rating text-muted"> 34 reviws</span>
						</div>
						<div class="price mt-1">$280.00</div> <!-- price-wrap.// -->
					</figcaption>
				</div>
			</div> <!-- col.// -->
			<div class="col-md-3">
				<div href="#" class="card card-product-grid">
					<a href="#" class="img-wrap"> <img src="https://via.placeholder.com/370x300"> </a>
					<figcaption class="info-wrap">
						<a href="#" class="title">Great product name here</a>

						<div class="rating-wrap">
							<ul class="rating-stars">
								<li style="width:80%" class="stars-active"> 
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
								</li>
								<li>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 
								</li>
							</ul>
							<span class="label-rating text-muted"> 34 reviws</span>
						</div>
						<div class="price mt-1">$56.00</div> <!-- price-wrap.// -->
					</figcaption>
				</div>
			</div> <!-- col.// -->
			
			<div class="col-md-3">
				<div href="#" class="card card-product-grid">
					<a href="#" class="img-wrap"> <img src="https://via.placeholder.com/370x300"> </a>
					<figcaption class="info-wrap">
						<a href="#" class="title">Great product name here</a>

						<div class="rating-wrap">
							<ul class="rating-stars">
								<li style="width:80%" class="stars-active"> 
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
								</li>
								<li>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 
								</li>
							</ul>
							<span class="label-rating text-muted"> 34 reviws</span>
						</div>
						<div class="price mt-1">$56.00</div> <!-- price-wrap.// -->
					</figcaption>
				</div>
			</div> <!-- col.// -->
		</div> <!-- row.// -->

	</div> <!-- container .//  -->
</section>
<!--========== New-arrived-section end// ==========-->



<!--========== Recommended-section start ==========-->
<section class="section-content padding-bottom-sm">
	<div class="container">

		<header class="section-heading">
			<a href="#" class="btn btn-outline-primary float-right">See all</a>
			<h3 class="section-title">Recommended</h3>
		</header><!-- sect-heading -->

		<div class="row">
			<div class="col-md-3">
				<div href="#" class="card card-product-grid">
					<a href="#" class="img-wrap"> <img src="https://via.placeholder.com/370x300"> </a>
					<figcaption class="info-wrap">
						<a href="#" class="title">Just another product name</a>
						<div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
					</figcaption>
				</div>
			</div> <!-- col.// -->
			<div class="col-md-3">
				<div href="#" class="card card-product-grid">
					<a href="#" class="img-wrap"> <img src="https://via.placeholder.com/370x300"> </a>
					<figcaption class="info-wrap">
						<a href="#" class="title">Some item name here</a>
						<div class="price mt-1">$280.00</div> <!-- price-wrap.// -->
					</figcaption>
				</div>
			</div> <!-- col.// -->
			<div class="col-md-3">
				<div href="#" class="card card-product-grid">
					<a href="#" class="img-wrap"> <img src="https://via.placeholder.com/370x300"> </a>
					<figcaption class="info-wrap">
						<a href="#" class="title">Products Name</a>
						<div class="price mt-1">$56.00</div> <!-- price-wrap.// -->
					</figcaption>
				</div>
			</div> <!-- col.// -->
			<div class="col-md-3">
				<div href="#" class="card card-product-grid">
					<a href="#" class="img-wrap"> <img src="https://via.placeholder.com/370x300"> </a>
					<figcaption class="info-wrap">
						<a href="#" class="title">Just another product name</a>
						<div class="price mt-1">$179.00</div> <!-- price-wrap.// -->
					</figcaption>
				</div>
			</div> <!-- col.// -->
		</div> <!-- row.// -->

	</div> <!-- container .//  -->
</section>
<!--========== Recommended-section end// ==========-->


<!--=========== Brands-section start ==========-->
<section class="section-name bg padding-y-sm">
	<div class="container">
		<header class="section-heading">
			<h3 class="section-title">Our Brands</h3>
		</header><!-- sect-heading -->

		<div class="row">
			<div class="col-md-2 col-6">
				<figure class="box item-logo">
					<a href="#"><img src="https://via.placeholder.com/130x65"></a>
					<figcaption class="border-top pt-2">36 Products</figcaption>
				</figure> <!-- item-logo.// -->
			</div> <!-- col.// -->
			<div class="col-md-2  col-6">
				<figure class="box item-logo">
					<a href="#"><img src="https://via.placeholder.com/130x65"></a>
					<figcaption class="border-top pt-2">980 Products</figcaption>
				</figure> <!-- item-logo.// -->
			</div> <!-- col.// -->
			<div class="col-md-2  col-6">
				<figure class="box item-logo">
					<a href="#"><img src="https://via.placeholder.com/130x65"></a>
					<figcaption class="border-top pt-2">25 Products</figcaption>
				</figure> <!-- item-logo.// -->
			</div> <!-- col.// -->
			<div class="col-md-2  col-6">
				<figure class="box item-logo">
					<a href="#"><img src="https://via.placeholder.com/130x65"></a>
					<figcaption class="border-top pt-2">72 Products</figcaption>
				</figure> <!-- item-logo.// -->
			</div> <!-- col.// -->
			<div class="col-md-2  col-6">
				<figure class="box item-logo">
					<a href="#"><img src="https://via.placeholder.com/130x65"></a>
					<figcaption class="border-top pt-2">41 Products</figcaption>
				</figure> <!-- item-logo.// -->
			</div> <!-- col.// -->
			<div class="col-md-2  col-6">
				<figure class="box item-logo">
					<a href="#"><img src="https://via.placeholder.com/130x65"></a>
					<figcaption class="border-top pt-2">12 Products</figcaption>
				</figure> <!-- item-logo.// -->
			</div> <!-- col.// -->
		</div> <!-- row.// -->
	</div><!-- container // -->
</section>
<!--========== Brands-section end// ==========-->


@stop