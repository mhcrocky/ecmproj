@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
<div class="app-title">
	<div>
		<h1><i class="fa fa-tags"></i> {{ $pageTitle }} </h1>
	</div>
</div>
@include('admin.partials.flash')
<div class="row">
	<div class="col-md-8 mx-auto">
		<div class="tile">
			<h3 class="tile-title">{{$subTitle}}</h3>
			<form action="{{ route('admin.categories.update') }}" method="POST" role="form" enctype="multipart/form-data">
				@csrf
				<div class="title-body">
					<div class="form-group">
						<label for="name" class="control-label">Name</label>
						<input type="text" name="name" class="form-control @error('name') is-invalid @enderror }}" value="{{ old('name', $targetCategory->name) }}">
						<input type="hidden" name="id", value="{{ $targetCategory->id }}">
						@error('name') 
						<div class="invalid-feedback">
							<strong> {{ $message }} </strong>
						</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="description" class="control-label"> Description</label>
						<textarea name="description" id="description" cols="30" rows="4" class="form-control">{{ old('description', $targetCategory->description)}}</textarea>
					</div>
					<div class="form-group">
						<label for="parent">Parent Category <span class="m-l-5 text-danger"> *</span></label>
						<select name="parent_id" id="parent" class="form-control custom-select mt-15 @error('parent_id') is-invalid @enderror">
							<option value="0">Select a parent category</option>
							@foreach($categories as $key => $category)
							@if($targetCategory->parent_id == $category->id)
							<option value="{{ $key }}" selected=""> {{ $category }}</option>
							@else
							<option value="{{ $key }}"> {{ $category }}</option>
							@endif
							@endforeach
						</select>
						@error('parent_id')
						<div class="invalid-feedback">
							<strong> {{ $message }}</strong>
						</div>
						@enderror
					</div>
					<div class="form-group">
						<div class="form-check">
							<label for="featured" class="form-check-label">
								<input type="checkbox" class="form-check-input" name="featured" {{ $targetCategory->featured == 1 ? 'checked' : '' }} >
								Featured Category
							</label>
						</div>
					</div>
					<div class="form-group">
						<div class="form-check">
							<label for="menu" class="form-check-label">
								<input type="checkbox" class="form-check-input" name="menu" {{ $targetCategory->menu == 1 ? 'checked' : '' }}>
								Show in Menu
							</label>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								@if($targetCategory->image != null)
								<figure class="mt-2" style="width: 80px; height: auto;">
									<img  class="img-fluid" src="{{ asset('/storage/'.$targetCategory->image) }}" alt="{{ $targetCategory->name }}">
								</figure>
								@endif
							</div>
							<div class="col-md-10">
								<label for="" class="control-label">Category Image</label>
								<input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
								@error('image')
								<div class="invalid-feedback">
									<strong> {{ $message }} </strong>
								</div>
								@enderror
							</div>
						</div>
					</div>
					<div class="tile-footer">
						<button class="btn btn-primary" type="submit">
							<i class="fa fa-fw fa-lg fa-check-circle"></i>Update Category
						</button>
						&nbsp;&nbsp;&nbsp;
						<a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
							<i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
						</a>
						
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection