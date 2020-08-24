@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
<div class="app-title">
	<div>
		<h1><i class="fa fa-cogs"></i> {{ $pageTitle }}</h1>
	</div>
</div>
@include('admin.partials.flash')
<div class="row user">
	<div class="col-md-3">
		<div class="tile p-0">
			<ul class="nav flex-column nav-tabs user-tabs">
				<li class="nav-item">
					<a href="#general"data-toggle="tab" class="nav-link active">General</a>
				</li>
				<li class="nav-item">
					<a href="#values" data-toggle="tab" class="nav-link">Attribute Values</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="col-md-9">
		<div class="tab-content">
			<div class="tab-pane active" id="general">
				<div class="tile">
					<form action="{{ route('admin.attributes.update') }}" role="form" method="POST">
						@csrf
						<h3 class="tile-title"> Attribute Information</h3>
						<hr>
						<div class="tile-body">
							<div class="form-group">
								<label for="code" class="control-label">Code</label>
								<input type="text"  class="form-control @error('code') is-invalid @enderror" placeholder="Enter attribute code" id="code" name="code" value="{{ old('code', $attribute->code) }}">
								<input type="hidden" name="id" value="{{ $attribute->id }}">
								
								@error('code')
								<div class="invalid-feedback">
									<strong> {{ $message }} </strong>
								</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="name" class="control-label">Name</label>
								<input type="text"  class="form-control @error('name') is-invalid @enderror" placeholder="Enter attribute name" id="name" name="name" value="{{ old('name', $attribute->name) }}">
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
									<option value="{{ $key }}" {{ $attribute->frontend_type == $key ? 'selected' : null }}> {{ $type }}</option>
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
										<input type="checkbox" class="form-check-input" name="is_filterable" {{ $attribute->is_filterable ==1 ? 'checked' : null }}>
										Filterable
									</label>
								</div>
							</div>
							<div class="form-group">
								<div class="form-check">
									<label for="is_required" class="form-check-label">
										<input type="checkbox" class="form-check-input" name="is_required" {{ $attribute->is_required == 1 ? 'checked' : null }}>
										Required
									</label>
								</div>
							</div>
							<div class="tile-footer">
								<div class="row d-print-none mt-2">
									<div class="col-12 text-right">
										<button class="btn btn-success"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Attribute</button>
										<a href="{{route('admin.attributes.index') }}" class="btn btn-danger"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="tab-pane" id="values">
			<attribute-values :attributeid="{{ $attribute->id }}"> </attribute-values>
		</div>
	</div>
</div>
</div>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ asset('backend/js/app.js') }}"></script>
@endpush

