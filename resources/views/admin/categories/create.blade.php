@extends('admin.app')
@section('title') {{ $pageTitle}} @endsection
@section('content')
<div class="app-title">
	<div>
		<h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
	</div>
</div>
@include('admin.partials.flash')
<div class="row">
	<div class="col-md-8 mx-auto">
		<div class="tile">
			<h3 class="tile-title">{{ $subTitle }} </h3>
			<form action="{{ route('admin.categories.store') }}" method="POST" role="form" enctype="multipart/form-data">
				@csrf
				<div class="tile-body">
					<div class="form-group">
						<label class="control-label" for="name"> Name <span class="m-l-5 text-danger"> *</span></label>
						<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}"/>
						@error('name') {{ $message }} @enderror
					</div>
					<div class="form-group">
						<label class="control-label" for="description">Description</label>
						<textarea name="description" id="description" cols="30" rows="4" class="form-control">{{ old('description') }} </textarea>
					</div>
					<div class="form-group">
						<label for="parent" class="control-label"> Parent Category <span class="m-l-5 text-danger"> *</span></label>
						<select name="parent_id" id="parent" class="form-control custom-select mt-15 @error('parent_id') is-invalid @enderror">
							<option value="0">Select a parent category</option>
							@foreach($categories as $key => $category)
							<option value="{{$key }}"> {{ $category }}</option>
							@endforeach
						</select>
						@error('parent_id') {{ $message }} @enderror
					</div>
					<div class="form-group">
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" id="featured" name="featured" class="form-check-input">Featrued Category
							</label>
						</div>
					</div>
					<div class="form-group">
						<div class="form-check">
							<label for="" class="form-check-label">
								<input type="checkbox" class="form-check-input" name="menu">Show in Menu
							</label>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label">Category Image</label>
						<input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
						@error('image') {{ $message }} @enderror
					</div>
					<div class="tile-footer">
						<button class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Category</button>
						&nbsp;&nbsp;&nbsp;
						<a href="{{ route('admin.categories.index') }}" class="btn btn-secondary"> <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection