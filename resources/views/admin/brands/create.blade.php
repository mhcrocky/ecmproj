@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection

@section('content')
<div class="app-title">
	<div>
		<h1><i class="fa fa-briefcase"></i> {{ $pageTitle }}</h1>
	</div>
</div>
@include('admin.partials.flash')
<div class="row">
	<div class="col-md-8 mx-auto">
		<div class="tile">
			<h3 class="tile-title">{{ $subTitle }}</h3>
			<form action="{{ route('admin.brands.store') }}" method="POST" role="form" enctype="multipart/form-data">
				@csrf
				<div class="title-body">
					<div class="form-group">
						<label for="name" class="control-label">Brand Name <span class="m-l-l5 text-danger">*</span></label>
						<input type="text" class="form-control @error('name') is-invalid @enderror" name="name">

						@error('name')
						<div class="invalid-feedback">
							<strong> {{ $message }} </strong>
						</div>
						@enderror
					</div>

					<div class="from-group">
						<label for="logo" class="control-label">Brand Logo</label>
						<input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo">

						@error('logo')
						<div class="invalid-feedback">
							<strong>{{ $message }} </strong>
						</div>
						@enderror
					</div>
				</div>
				<div class="tile-footer">
					<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Brand</button>
					&nbsp;&nbsp;&nbsp;
					<a href="{{ route('admin.brands.index') }}" class="btn btn-secondary"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection