@extends('layout.app')
@section('title', 'Add a new product')
@section('content')
<!-- CONTENT WRAPPER -->
<div class="ec-content-wrapper">
	<div class="content">
		<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
			<div>
				<h1>Product</h1>
				<p class="breadcrumbs"><span><a href="index.html">Home</a></span>
					<span><i class="mdi mdi-chevron-right"></i></span>Product
				</p>
			</div>
			<div>
				<a href="product-list.html" class="btn btn-primary"> Add Porduct</a>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card card-default">
					<div class="card-body">
						<div class="table-responsive">
							<table id="responsive-data-table" class="table"
								style="width:100%">
								<thead>
									<tr>
										<th>Product</th>
										<th>Name</th>
										<th>Price</th>
										<th>Stock</th>
										<th>Action</th>


									</tr>
								</thead>

								<tbody>

									@foreach($products as $product)
									<tr>
										<td><img class="tbl-thumb" style="height:30px; width:30px; obeject-fit: cover; boder-radius: 50%" src="{{ $product->product_image ? 'storage/' . $product->product_image : 'assets/img/products/p6.jpg' }}" alt="Product Image" /></td>
										<td>{{ $product->product_name }}</td>
										<td>{{ $product->price }}</td>
										<td>{{ $product->quantity }}</td>

										<td>
											<div class="btn-group mb-1">
												<button type="button"
													class="btn btn-outline-success">Info</button>
												<button type="button"
													class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
													data-bs-toggle="dropdown" aria-haspopup="true"
													aria-expanded="false" data-display="static">
													<span class="sr-only">Info</span>
												</button>

												<div class="dropdown-menu">
													<a class="dropdown-item" href="/product/{{ $product->id }}">Edit</a>
													<a class="dropdown-item" href="/product/delete/{{ $product->id }}">Delete</a>
												</div>
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
		</div>
	</div> <!-- End Content -->
</div> <!-- End Content Wrapper -->


@endsection