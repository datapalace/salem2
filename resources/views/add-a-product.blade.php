@extends('layout.app')
@section('title', 'Dashboard')
@section('content')

<!-- CONTENT WRAPPER -->
<div class="ec-content-wrapper">
	<div class="content">
		<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
			<div>
				<h1>Add Product</h1>
				<p class="breadcrumbs"><span><a href="index.html">Home</a></span>
					<span><i class="mdi mdi-chevron-right"></i></span>Product
				</p>
			</div>
			<div>
				<a href="product-list.html" class="btn btn-primary"> View All
				</a>
			</div>
		</div>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item" role="presentation">
				<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Add Product</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Add Customized Product</button>
			</li>

		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
				<div class="row">
					<div class="col-12">
						<div class="card card-default">
							<div class="card-header card-header-border-bottom">
								<h2>Add Product</h2>
							</div>

							<div class="card-body">
								<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="row ec-vendor-uploads">


										<div class="col-lg-4">
											<div class="ec-vendor-img-upload">
												<div class="ec-vendor-main-img">
													<div class="avatar-upload">
														<div class="avatar-edit">
															<input type='file' name="product_image" id="imageUpload" class="ec-image-upload"
																accept=".png, .jpg, .jpeg" />
															<label for="imageUpload"><img
																	src="assets/img/icons/edit.svg"
																	class="svg_img header_svg" alt="edit" /></label>
														</div>
														<div class="avatar-preview ec-preview">
															<div class="imagePreview ec-div-preview">
																<img class="ec-image-preview"
																	src="assets/img/products/vender-upload-preview.jpg"
																	alt="edit" />
															</div>
														</div>
													</div>
													<div class="thumb-upload-set colo-md-12">
														<div class="thumb-upload">
															<div class="thumb-edit">
																<input type='file' name="product_galleries[]" id="thumbUpload01"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg" />
																<label for="imageUpload"><img
																		src="assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
																	<img class="image-thumb-preview ec-image-preview"
																		src="assets/img/products/vender-upload-thumb-preview.jpg"
																		alt="edit" />
																</div>
															</div>
														</div>
														<div class="thumb-upload">
															<div class="thumb-edit">
																<input type='file' name="product_galleries[]" id="thumbUpload02"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg" />
																<label for="imageUpload"><img
																		src="assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
																	<img class="image-thumb-preview ec-image-preview"
																		src="assets/img/products/vender-upload-thumb-preview.jpg"
																		alt="edit" />
																</div>
															</div>
														</div>
														<div class="thumb-upload">
															<div class="thumb-edit">
																<input type='file' name="product_galleries[]" id="thumbUpload03"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg" />
																<label for="imageUpload"><img
																		src="assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
																	<img class="image-thumb-preview ec-image-preview"
																		src="assets/img/products/vender-upload-thumb-preview.jpg"
																		alt="edit" />
																</div>
															</div>
														</div>
														<div class="thumb-upload">
															<div class="thumb-edit">
																<input type='file' name="product_galleries[]" id="thumbUpload04"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg" />
																<label for="imageUpload"><img
																		src="assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
																	<img class="image-thumb-preview ec-image-preview"
																		src="assets/img/products/vender-upload-thumb-preview.jpg"
																		alt="edit" />
																</div>
															</div>
														</div>
														<div class="thumb-upload">
															<div class="thumb-edit">
																<input type='file' name="product_galleries[]" id="thumbUpload05"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg" />
																<label for="imageUpload"><img
																		src="assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
																	<img class="image-thumb-preview ec-image-preview"
																		src="assets/img/products/vender-upload-thumb-preview.jpg"
																		alt="edit" />
																</div>
															</div>
														</div>
														<div class="thumb-upload">
															<div class="thumb-edit">
																<input type='file' name="product_galleries[]" id="thumbUpload06"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg" />
																<label for="imageUpload"><img
																		src="assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
																	<img class="image-thumb-preview ec-image-preview"
																		src="assets/img/products/vender-upload-thumb-preview.jpg"
																		alt="edit" />
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-8">
											<div class="ec-vendor-upload-detail">
												<div class="row g-3">
													<div class="col-md-6">
														<label for="inputEmail4" class="form-label">Product name</label>
														<input type="text" name="product_name" class="form-control slug-title" id="inputEmail4">
													</div>
													<div class="col-md-6">
														<label class="form-label">Select Categories</label>
														<select name="product_categories" id="Categories" class="form-select">
															<optgroup label="Fashion">
																<option value="t-shirt">T-shirt</option>
																<option value="dress">Dress</option>
															</optgroup>
															<optgroup label="Furniture">
																<option value="table">Table</option>
																<option value="sofa">Sofa</option>
															</optgroup>
															<optgroup label="Electronic">
																<option value="phone">I Phone</option>
																<option value="laptop">Laptop</option>
															</optgroup>
														</select>
													</div>
													<div class="col-md-12">
														<label for="slug" class="col-12 col-form-label">Slug</label>
														<div class="col-12">
															<input id="slug" name="slug" class="form-control here set-slug" type="text">
														</div>
													</div>
													<div class="col-md-12">
														<label class="form-label">Short Description</label>
														<textarea class="form-control" name="short_description" rows="2"></textarea>
													</div>
													<div class="col-md-4 mb-25">
														<label class="form-label">Colors</label>
														<input type="color" name="product_colors[]" class="form-control form-control-color"
															id="exampleColorInput1" value="#ff6191"
															title="Choose your color">
														<input type="color" name="product_colors[]" class="form-control form-control-color"
															id="exampleColorInput2" value="#33317d"
															title="Choose your color">
														<input type="color" name="product_colors[]" class="form-control form-control-color"
															id="exampleColorInput3" value="#56d4b7"
															title="Choose your color">
														<input type="color" name="product_colors[]" class="form-control form-control-color"
															id="exampleColorInput4" value="#009688"
															title="Choose your color">
													</div>
													<div class="col-md-8 mb-25">
														<label class="form-label">Size</label>
														<div class="form-checkbox-box">
															<div class="form-check form-check-inline">
																<input type="checkbox" name="product_sizes[]" value="Small">
																<label>S</label>
															</div>
															<div class="form-check form-check-inline">
																<input type="checkbox" name="product_sizes[]" value="Meddium">
																<label>M</label>
															</div>
															<div class="form-check form-check-inline">
																<input type="checkbox" name="product_sizes[]" value="Large">
																<label>L</label>
															</div>
															<div class="form-check form-check-inline">
																<input type="checkbox" name="product_sizes[]" value="Extra Large">
																<label>XL</label>
															</div>
															<div class="form-check form-check-inline">
																<input type="checkbox" name="product_sizes[]" value="Extra Extra large">
																<label>XXL</label>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<label class="form-label">Price <span>( In USD
																)</span></label>
														<input type="number" name="price" class="form-control" id="price1">
													</div>
													<div class="col-md-6">
														<label class="form-label">Quantity</label>
														<input type="number" name="quantity" class="form-control" id="quantity1">
													</div>
													<div class="col-md-12">
														<label class="form-label">Full Description</label>
														<textarea class="form-control" name="description" rows="4"></textarea>
													</div>
													<div class="col-md-12">
														<label class="form-label">Product Tags <span>( Type and
																make comma to separate tags )</span></label>
														<input type="text" class="form-control" id="group_tag"
															name="product_tags" value="" placeholder=""
															data-role="tagsinput" />
													</div>
													<div class="col-md-12">
														<button type="submit" class="btn btn-primary">Submit</button>
													</div>
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
			<div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				<div class="row">
					<div class="col-12">
						<div class="card card-default">
							<div class="card-header card-header-border-bottom">
								<h2>Add Product</h2>
							</div>

							<div class="card-body">
								<form action="{{ route('customize.store') }}" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="row ec-vendor-uploads">


										<div class="col-lg-4">
											<div class="ec-vendor-img-upload">
												<div class="ec-vendor-main-img">

													<div class="thumb-upload-set colo-md-12">
														<div class="thumb-upload">
															<div class="thumb-edit">
																<input type='file' name="product_galleries[]" id="thumbUpload01"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg" />
																<label for="imageUpload"><img
																		src="assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
																	<img class="image-thumb-preview ec-image-preview"
																		src="assets/img/products/vender-upload-thumb-preview.jpg"
																		alt="edit" />
																</div>
															</div>
														</div>
														<div class="thumb-upload">
															<div class="thumb-edit">
																<input type='file' name="product_galleries[]" id="thumbUpload02"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg" />
																<label for="imageUpload"><img
																		src="assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
																	<img class="image-thumb-preview ec-image-preview"
																		src="assets/img/products/vender-upload-thumb-preview.jpg"
																		alt="edit" />
																</div>
															</div>
														</div>
														<div class="thumb-upload">
															<div class="thumb-edit">
																<input type='file' name="product_galleries[]" id="thumbUpload03"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg" />
																<label for="imageUpload"><img
																		src="assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
																	<img class="image-thumb-preview ec-image-preview"
																		src="assets/img/products/vender-upload-thumb-preview.jpg"
																		alt="edit" />
																</div>
															</div>
														</div>
														<div class="thumb-upload">
															<div class="thumb-edit">
																<input type='file' name="product_galleries[]" id="thumbUpload04"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg" />
																<label for="imageUpload"><img
																		src="assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
																	<img class="image-thumb-preview ec-image-preview"
																		src="assets/img/products/vender-upload-thumb-preview.jpg"
																		alt="edit" />
																</div>
															</div>
														</div>
														<div class="thumb-upload">
															<div class="thumb-edit">
																<input type='file' name="product_galleries[]" id="thumbUpload05"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg" />
																<label for="imageUpload"><img
																		src="assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
																	<img class="image-thumb-preview ec-image-preview"
																		src="assets/img/products/vender-upload-thumb-preview.jpg"
																		alt="edit" />
																</div>
															</div>
														</div>
														<div class="thumb-upload">
															<div class="thumb-edit">
																<input type='file' name="product_galleries[]" id="thumbUpload06"
																	class="ec-image-upload"
																	accept=".png, .jpg, .jpeg" />
																<label for="imageUpload"><img
																		src="assets/img/icons/edit.svg"
																		class="svg_img header_svg" alt="edit" /></label>
															</div>
															<div class="thumb-preview ec-preview">
																<div class="image-thumb-preview">
																	<img class="image-thumb-preview ec-image-preview"
																		src="assets/img/products/vender-upload-thumb-preview.jpg"
																		alt="edit" />
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-8">
											<div class="ec-vendor-upload-detail">
												<div class="row g-3">
													<div class="col-md-6">
														<label for="inputEmail4" class="form-label">Product name</label>
														<input type="text" name="product_name" class="form-control slug-title" id="inputEmail4">
													</div>
													<div class="col-md-6">
														<label class="form-label">Select Categories</label>
														<select name="product_categories" id="Categories" class="form-select">

															<option value="Trousers">Trousers</option>
															<option value="Headwear">Headwear</option>
															<option value="Accessory">Accessory</option>
															<option value="Waistcoat">Waistcoat</option>



														</select>
													</div>
													<!-- <div class="col-md-12">
														<label for="slug" class="col-12 col-form-label">Slug</label>
														<div class="col-12">
															<input id="slug" name="slug" class="form-control here set-slug" type="text">
														</div>
													</div> -->
													<div class="col-md-12">
														<label class="form-label">Short Description</label>
														<textarea class="form-control" name="description" rows="3"></textarea>
													</div>
													<div class="col-md-4 mb-25">
														<label class="form-label ">Colors</label>
														<select name="product_colors" id="" class="form-select form-control">
															<option value="">Select Colour Available</option>
															<option value="Red">Red</option>
															<option value="Blue">Blue</option>
															<option value="Green">Green</option>
														</select>
													</div>
													<div class="col-md-8 mb-25">
														<label class="form-label">Size</label>
														<div class="form-checkbox-box">
															<div class="form-check form-check-inline">
																<input type="checkbox" name="product_sizes[]" value="Small">
																<label>S</label>
															</div>
															<div class="form-check form-check-inline">
																<input type="checkbox" name="product_sizes[]" value="Meddium">
																<label>M</label>
															</div>
															<div class="form-check form-check-inline">
																<input type="checkbox" name="product_sizes[]" value="Large">
																<label>L</label>
															</div>
															<div class="form-check form-check-inline">
																<input type="checkbox" name="product_sizes[]" value="Extra Large">
																<label>XL</label>
															</div>
															<div class="form-check form-check-inline">
																<input type="checkbox" name="product_sizes[]" value="Extra Extra large">
																<label>XXL</label>
															</div>
														</div>
													</div>
													<div class="col-md-12">
														<label class="form-label">Price <span>( In USD
																)</span></label>
														<input type="number" name="price" class="form-control" id="price1">
													</div>



													<div class="col-md-12">
														<button type="submit" class="btn btn-primary">Submit</button>
													</div>
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
			<div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">...</div>
			<div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">..ddd.</div>
		</div>


	</div> <!-- End Content -->
</div> <!-- End Content Wrapper -->


@endsection