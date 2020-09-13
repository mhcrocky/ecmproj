@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('backend/dropzone/dist/min/dropzone.min.css') }}" type="text/css">
@endsection

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
				@if(isset($product))
				<li class="nav-item"> 
					<a class="nav-link" href="#images" data-toggle="tab">Images </a>
				</li>
				<li class="nav-item"> 
					<a class="nav-link" href="#attributes" data-toggle="tab">Attributes </a>
				</li>
				@endif
			</ul>
		</div>
	</div>
	<div class="col-md-9">
		<div class="tab-content">
			<div class="tab-pane active" id="general">
				<div class="tile">
					<form action="{{ isset($product) ? route('admin.products.update') : route('admin.products.store') }}" method="POST">
						@csrf
						<h3 class="tile-title"> Product Information </h3>
						<hr>
						<div class="tile-body">
							<div class="form-group">
								<label for="name" class="control-label">Name</label>
								<input 
								type="text" 
								name="name" 
								placeholder="Enter product name"
								value="{{ old('name', isset($product) ? $product->name : '' ) }}" 
								class="form-control @error('name') is-invalid @enderror" >

								<input type="hidden" name="id" value="{{ isset($product) ? $product->id : '' }}">
								<div class="invalid-feedback active">
									<i class="fa fa-exclamation-circle fa-fw"></i> 
									@error('name') <span>{{ $message }}</span> @enderror
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="sku" class="control-label">SKU</label>
										<input 
										type="text" 
										name="sku" 
										placeholder="Enter product sku" 
										value="{{ old('sku', isset($product) ? $product->sku : '') }}"
										class="form-control @error('sku') is-invalid @enderror">

										<div class="invalid-feedback active">
											<i class="fa fa-exclamation-circle fa-fw"></i>
											@error('sku') <span> {{ $message }} </span> @enderror
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="brand" class="control-label">Brand</label>
										<select name="brand_id" id="brand_id" class="form-control @error('brand_id') is-invalid @enderror ">
											<option value="0">Select a brand </option>
											@foreach($brands as $brand)
											<option value="{{ $brand->id }}" {{ old('brand_id', isset($product) ? $product->brand_id : '') == $brand->id ? 'selected' : ''  }} > {{ $brand->name }}</option>
											@endforeach
										</select>

										<div class="invalid-feedback active">
											<i class="fa fa-exclamation-circle fa-fw"></i>
											@error('brand_id') <span> {{ $message }} <span> @enderror
											</div>
										</div>
									</div>
								</div> <!-- \End .row-->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="categories" class="control-label">Categories</label>	
											<select name="categories[]" id="categories" class="form-control" multiple="">
												@foreach($categories as $category)
												<option value="{{ $category->id }}" 
													{{ old('categories[]', 
													isset($product) ? 
													(in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'selected' : '') 
													: '') 
												}}>{{ $category->name }}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div> <!-- \end row -->

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="price" class="control-label">Price</label>
											<input 
											type="text"  
											name="price" 
											value="{{ old('price', isset($product) ? $product->price : '') }}"
											placeholder="Enter Price" 
											class="form-control @error('price') is-invalid @enderror" >

											<div class="invalid-feedback active">
												<i class="fa fa-exclamation-circle fa-fw"></i>
												@error('price') <span> {{ $message }} </span> @enderror
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="special_price" class="control-label">Special Price</label>
											<input type="text" 
											name="special_price" 
											placeholder="Enter Special Price" 
											value="{{old('special_price', isset($product) ? $product->special_price : '' )}}" 
											class="form-control @error('special_price') is-invalid @enderror">
										</div>
									</div>
								</div> <!-- \end row -->

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="quantity" class="control-label">Quantity</label>
											<input type="text" 
											name="quantity"
											placeholder="Enter product quntity"
											value="{{ old('quantity', isset($product) ? $product->quantity : '') }}" 
											class="form-control @error('quantity') is-invalid @enderror">

											<div class="invalid-feedback active">
												<i class="fa fa-exclamation-circle fa-fw"></i>
												@error('quantity')  <span> {{ $message }} </span> @enderror
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="weight" class="control-label">Weight</label>
											<input type="text" 
											name="weight"
											placeholder="Enter product weight" 
											value="{{ old('weight', isset($product) ? $product->weight : '') }}"
											class="form-control @error('weight') is-invalid @enderror">

											<div class="invalid-feedback active">
												<i class="fa fa-exclamation-circle fa-fw"></i>
												@error('weight') <span> {{ $message }} </span> @enderror
											</div>
										</div>
									</div>
								</div> <!-- \end row -->
								<div class="form-group">
									<label for="description" class="control-label">Description</label>
									<textarea name="description" id="description" rows="8" class="form-control"> {{ old('description', isset($product) ? $product->description : '') }} </textarea>
								</div>

								<div class="form-group">
									<div class="form-check">
										<label for="" class="form-check-label">
											<input 
											type="checkbox" 
											name="status"
											class="form-check-input"
											{{ isset($product) ? ($product->status == 1 ? 'checked' : '') : ''}}
											>Status
										</label>
									</div>
								</div>
								<div class="form-group">
									<div class="form-check">
										<label for="featured" class="form-check-label">
											<input 
											type="checkbox" 
											name="featured"
											class="form-check-input"
											{{ isset($product) ? ($product->featured == 1 ? 'checked' : '') : ''}}
											>Featured
										</label>
									</div>
								</div>
							</div> <!-- \end .tile-body -->
							<div class="tile-footer">
								<div class="row d-print-none mt-2">
									<div class="col-12 text-right">
										<button class="btn btn-success" type="submit">
											<i class="fa fa-fw fa-lg fa-check-circle"></i>
											{{ isset($product) ? 'Update Product' : 'Save Product' }}
										</button>
										<a href="{{ route('admin.products.index') }}" class="btn btn-danger">
											<i class="fa fa-fw fa-lg fa-arrow-left"></i> Go Back
										</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- Image Tab -->
				<div class="tab-pane" id="images">
					<div class="tile">
						<h3 class="tile-title">Upload Image</h3>
						<hr>
						<div class="tile-body">
							<div class="row">
								<div class="col-md-12">
									<form action="" class="dropzone" id="dropzone" style="border: 2px dashed rgba(0,0,0,0.3)">
										<input type="hidden" name="product_id" value="{{ isset($product) ? $product->id : ''}}">
										{{ csrf_field() }}
									</form>
								</div>
							</div>

							<div class="row d-print-none mt-2">
								<div class="col-12 text-right">
									<button class="btn btn-success" type="button" id="uploadButton">
										<i class="fa fa-fw fa-lg fa-upload"></i>Upload Images
									</button>
								</div>
							</div>

							@if(isset($product) && $product->images)
							<hr>
							<div class="row">
								@foreach($product->images as $image)
								<div class="col-md-3">
									<div class="card">
										<div class="card-body">
											<img src="{{ asset('storage/'.$image->full) }}" alt="image" id="brandLogo" class="img-fluid">
											<a href="{{ route('admin.products.images.delete', $image->id) }}" class="card-link float-right text-danger">
												<i class="fa fa-fw fa-lg fa-trash"></i>
											</a>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							@endif
						</div>
					</div>
				</div>
				<!-- Attribute Tab -->
				<div class="tab-pane" id="attributes">
				@if(isset($product))
					<product-attributes :productid="{{ isset($product) ? $product->id : '' }}"></product-attributes>
				@endif
				</div>
			</div>
		</div>
	</div>

	@endsection
	@push('scripts')
	<script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('backend/dropzone/dist/min/dropzone.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('backend/js/plugins/bootstrap-notify.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('backend/js/app.js') }}"></script>
	

	<script>
		Dropzone.autoDiscover = false;

		$(document).ready(function(){
			$('#categories').select2();

		let myDropzone = new Dropzone('#dropzone', {
			paramName: "image",
			addRemoveLinks: false,
			maxFilesize: 4,
			parallelUploads: 2,
			uploadMultiple: false,
			url: "{{ route('admin.products.images.upload')}}",
			autoProcessQueue: false,
		});


		myDropzone.on('queuecomplete', function(file){
			window.location.reload();
			showNotification('Completed', 'All product images uploaded', 'success', 'fa-check');
		});


		$('#uploadButton').click(function(){
			if(myDropzone.files.length === 0){
				showNotification('Error', 'Please select files to upload.', 'danger', 'fa-close');
			}else{
				myDropzone.processQueue();
			}
		});


		function showNotification(title, message, type, icon){

			$.notify({
				title: title + ' : ',
				message: message,
				icon: 'fa ' + icon
			},{
				type: type,
				allow_dismiss: true,
				placement: {
					from: "top",
					align: "right"
				}
			});
		}

	});
		
</script>
@endpush