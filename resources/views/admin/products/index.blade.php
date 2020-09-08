@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
<div class="app-title">
	<h1><i class="fa fa-shopping-bag"></i> {{ $pageTitle }} </h1>
	<a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add Product </a>
</div>
@include('admin.partials.flash')
<div class="row">
	<div class="col-md-12">
		<div class="tile">
			<div class="title-body">
				<table class="table table-hover table-bordered" id="sampleTable">
					<thead>
						<tr>
							<th> # </th>
							<th> SKU </th>
							<th> Name </th>
							<th class="text-center"> Brand </th>
							<th class="text-center"> Categories </th>
							<th class="text-center"> Price </th>
							<th class="text-center"> Status </th>
							<th style="width: 100px; min-width: 100px;" class="text-center text-danger">
								<i class="fa fa-bolt"></i>
							</th>

						</tr>
					</thead>
					<tbody>
						@foreach($products as $product)
						<tr>
							<td> {{ $loop->iteration }} </td>
							<td> {{ $product->sku }} </td>
							<td> {{ $product->name }}</td>
							<td> {{ $product->brand->name }}</td>
							<td> 
								@foreach($product->categories as $category)
								<span class="badge badge-info">{{ $category->name }} </span>
								@endforeach
							</td>
							<td> {{ $product->price }}</td>
							<td class="text-center"> 
								<span class="badge badge-{{ $product->status == 1 ? 'success' : 'danger' }}">
									{{ $product->status == 1 ? 'Active' : 'Not Active' }}
								</span>
							</td>
							<td class="text-center"> 
								<div class="btn-group">
									<a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> 
									<a href="{{ route('admin.products.delete', $product->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
								</div>


							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript">$('#sampleTable').dataTable();</script>
@endpush