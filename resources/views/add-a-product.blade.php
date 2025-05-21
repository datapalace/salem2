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
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Add Product</h2>
                        </div>

                        <div class="card-body">
                            <div class="row ec-vendor-uploads">
                                <form class="row g-3" method="POST" action="{{ route('add-product') }}">
                                            @csrf
                                <div class="col-lg-4">
                                    <div class="ec-vendor-img-upload">
                                        <div class="ec-vendor-main-img">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' name="mainImage" id="imageUpload" class="ec-image-upload"
                                                        accept=".png, .jpg, .jpeg" />
                                                    <label for="imageUpload"><img src="assets/img/icons/edit.svg"
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
                                                        <input type='file' name="galleryImage[]" id="thumbUpload01" class="ec-image-upload"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img src="assets/img/icons/edit.svg"
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
                                                        <input type='file' name="galleryImage[]"  id="thumbUpload02" class="ec-image-upload"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img src="assets/img/icons/edit.svg"
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
                                                        <input type='file' name="galleryImage[]"  id="thumbUpload03" class="ec-image-upload"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img src="assets/img/icons/edit.svg"
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
                                                        <input type='file' name="galleryImage[]"  id="thumbUpload04" class="ec-image-upload"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img src="assets/img/icons/edit.svg"
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
                                                        <input type='file' name="galleryImage[]"  id="thumbUpload05" class="ec-image-upload"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img src="assets/img/icons/edit.svg"
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
                                                        <input type='file' name="galleryImage[]"  id="thumbUpload06" class="ec-image-upload"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img src="assets/img/icons/edit.svg"
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
                                        
                                            <div class="col-md-6">
                                                <label for="inputEmail4" class="form-label">Product name</label>
                                                <input type="text" class="form-control slug-title" id="inputEmail4"
                                                    name="product_name">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Select Categories</label>
                                                <select name="categories" id="Categories" class="form-select">
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
                                                    <input id="slug" name="slug"
                                                        class="form-control here set-slug" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">Sort Description</label>
                                                <textarea class="form-control" rows="2" name="sort_description"></textarea>
                                            </div>
                                            <div class="col-md-4 mb-25">
                                                <label class="form-label">Colors</label>
                                                <input type="color" class="form-control form-control-color"
                                                    id="exampleColorInput1" value="#ff6191" title="Choose your color"
                                                    name="color1">
                                                <input type="color" class="form-control form-control-color"
                                                    id="exampleColorInput2" value="#33317d" title="Choose your color"
                                                    name="color2">
                                                <input type="color" class="form-control form-control-color"
                                                    id="exampleColorInput3" value="#56d4b7" title="Choose your color"
                                                    name="color3">
                                                <input type="color" class="form-control form-control-color"
                                                    id="exampleColorInput4" value="#009688" title="Choose your color"
                                                    name="color4">
                                            </div>
                                            <div class="col-md-8 mb-25">
                                                <label class="form-label">Size</label>
                                                <div class="form-checkbox-box">
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="sizes[]" value="S"
                                                            id="size_s">
                                                        <label for="size_s">S</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="sizes[]" value="M"
                                                            id="size_m">
                                                        <label for="size_m">M</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="sizes[]" value="L"
                                                            id="size_l">
                                                        <label for="size_l">L</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="sizes[]" value="XL"
                                                            id="size_xl">
                                                        <label for="size_xl">XL</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="sizes[]" value="XXL"
                                                            id="size_xxl">
                                                        <label for="size_xxl">XXL</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Price <span>( In USD )</span></label>
                                                <input type="number" class="form-control" id="price1"
                                                    name="price">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Quantity</label>
                                                <input type="number" class="form-control" id="quantity1"
                                                    name="quantity">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">Ful Detail</label>
                                                <textarea class="form-control" rows="4" name="ful_detail"></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">Product Tags <span>( Type and make comma to
                                                        separate tags )</span></label>
                                                <input type="text" class="form-control" id="group_tag"
                                                    name="group_tag" value="" placeholder=""
                                                    data-role="tagsinput" />
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Content -->
    </div> <!-- End Content Wrapper -->
@endsection
