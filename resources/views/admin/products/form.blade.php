@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
<div class="app-title">
	<h1><i class="fa fa-shopping-bag"></i> {{ $pageTitle }} </h1>
</div>
@include('admin.partials.flash')

<div class="row user">
	<div class="col-md-3">
		<div class="tile p-0">
			<ul class="nav nav-tabs user-tabs flex-column">
				<li class="nav-item"> 
					<a class="nav-link active" href="#general" data-toggle="tab">General</a>
				</li>
				<li class="nav-item"> 
					<a class="nav-link" href="#test" data-toggle="tab">Test </a>
				</li>
			</ul>
		</div>
	</div>
	<div class="col-md-9">
		<div class="tab-content">
			<div class="tab-pane active" id="general">
				<div class="tile">
					<form action="{{ route('admin.products.create') }}" method="POST">
						@csrf
						<h3 class="tile-title"> Product Information </h3>
						<hr>
						<div class="tile-body">
							<div class="form-group">
								<label for="name" class="control-label">Name</label>
								<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter product name">

								@error('name')
								<div class="invalid-feedback">
									<strong> {{ $message }} </strong>
								</div>
								@enderror

								<div class="invalid-feedback active">
									<i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="sku" class="control-label">SKU</label>
										<input type="text" name="sku" placeholder="Enter product sku" class="form-control @error('sku') is-invalid @enderror" value="{{ old('sku') }}">

										<div class="invalid-feedback active">
											<i class="fa fa-exclamation-circle fa-fw"></i>
											@error('sku')
											<span> {{ $message }} </span>
											@enderror
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="brand" class="control-label">Brand</label>
										<select name="brand_id" id="brand_id" class="form-control">
											<option value="0">Select a brand </option>
											@foreach($brands as $brand)
											<option value="{{$brand->id}}"> {{ $brand->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>
						
					</form>
				</div>
			</div>
			<!-- Second Tab -->
			<div class="tab-pane" id="test">
				<div class="tile">
					<h3> Fro testing </h3>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection