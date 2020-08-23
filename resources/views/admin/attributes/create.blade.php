@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
<div class="app-title">
	<div>
		<h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
	</div>
</div>

@include('admin.partials.flash')
<div class="row user">
	<div class="col-md-3">
		<div class="title p-0">
			<ul class="nav flex-column nav-tabs user-tabs">
				<li class="nav-item">
					<a href="#general" class="nav-link active" data-toggle="tab">General</a>
				</li>
			</ul>
		</div>
	</div>

	<div class="col-md-9">
		<div class="tab-content">
			<div class="tab-pane active" id="general">
				<div class="tile">
					<form action="{{ route('admin.attributes.store') }}" method="POST">
						@csrf
						<h3 class="tile-title">Attribute Information</h3>
						<hr>
						<div class="title-body">
							<div class="form-group">
								<label for="code" class="control-label">Code</label>
								<input type="text"  class="form-control @error('code') is-invalid @enderror" placeholder="Enter attribute code" id="code" name="code" value="{{ old('code') }}">

								@error('code')
								<div class="invalid-feedback">
									<strong> {{ $message }} </strong>
								</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="name" class="control-label">Name</label>
								<input type="text"  class="form-control @error('name') is-invalid @enderror" placeholder="Enter attribute name" id="name" name="name" value="{{ old('name') }}">
								@error('name')
								<div class="invalid-feedback">
									<strong>{{ $message }}</strong>
								</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="frontend_type" class="control-label">Frontend Type</label>
								@php $types = ['select' => 'Select Box', 'radio' => 'Radio Button', 'text' => 'Text Field', 'text_area' => 'Text Area']; @endphp
								<select name="frontend_type" id="frontend_type" class="form-control @error('frontend_type') is-invalid @enderror">
									<option value="0">Select a type </option>
									@foreach($types as $key => $type)
									<option value="{{ $key }}"> {{ $type }}</option>
									@endforeach
								</select>
								@error('frontend_type')
								<div class="invalid-feedback">
									<strong> {{ $message }} </strong>
								</div>
								@enderror
							</div>
							<div class="form-group">
								<div class="form-check">
									<label for="is_filterable" class="form-check-label">
										<input type="checkbox" class="form-check-input" name="is_filterable">
										Filterable
									</label>
								</div>
							</div>
							<div class="form-group">
								<div class="form-check">
									<label for="is_required" class="form-check-label">
										<input type="checkbox" class="form-check-input" name="is_required">
										Required
									</label>
								</div>
							</div>
							<div class="tile-footer">
								<div class="row d-print-none mt-2">
									<div class="col-12 text-right">
										<button class="btn btn-success"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Attribute</button>
										<a href="{{route('admin.attributes.index') }}" class="btn btn-danger"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection