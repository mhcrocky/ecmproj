@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
<div class="app-title">
	<div>
		<h1><i class="fa fa-briefcase"></i> {{ $pageTitle }} </h1>
	</div>
</div>
@include('admin.partials.flash')

<div class="row">
	<div class="col-md-8 mx-auto">
		<div class="tile">
			<h3 class="tile-title">{{ $subTitle }}</h3>
			
			<form action="{{ route('admin.brands.update') }}" method="post" role="form" enctype="multipart/form-data">
				@csrf
				<div class="tile-body">
					<div class="from-group">
						<label for="name" class="control-label">Brand Name</label>
						<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name', $brand->name)}}">
						<input type="hidden" name="id" value="{{$brand->id}}">

						@error('name')
						<div class="invalid-feedback">
							<strong>{{ $message }} </strong>
						</div>
						@enderror
					</div>

					<div class="form-group">
						<div class="row">
							@if($brand->logo != null)
							<div class="col-md-2 mt-2">
								<figure class="mt-2" style="width: 80px; min-width: auto;">
									<img src="{{ asset('storage/'.$brand->logo) }}" alt="{{ $brand->name }}" class="img-fluid">
								</figure>
							</div>
							@endif
							<div class="col-md-{{$brand->logo ? 10 : 12}} mt-2">
								<label for="logo" class="control-label">Brand Logo</label>
								<input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo">

								@error('logo')
								<div class="invalid-feedback">
									<strong>{{$message }}</strong>
								</div>
								@enderror
							</div>
						</div>
					</div>

					<div class="tile-footer">
						<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Brand</button>
						&nbsp;&nbsp;&nbsp;
						<a href="{{route('admin.brands.index') }}" class="btn btn-secondary">
							<i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
						</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection