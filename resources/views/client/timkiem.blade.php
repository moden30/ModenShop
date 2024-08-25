@extends('client.layout.master')
@section('conten')

    <!-- Breadcurb Area -->
    <div class="breadcurb-area">
        <div class="container">
            <ul class="breadcrumb">
                <li class="home"><a href="#">Home</a></li>
                <li>Laptop</li>
            </ul>
        </div>
    </div><!-- End Breadcurb Area -->
    <!-- Shop Product Area -->
    <div class="shop-product-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <!-- Shop Product View -->
                    <div class="shop-product-view">
                        <div class="product-tab-area">
                            <!-- Tab Bar -->
                            <div class="tab-bar">
                                <div class="tab-bar-inner">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li><a class="active" href="#shop-product" data-bs-toggle="tab"><i
                                                    class="fa fa-th-large"></i></a></li>
                                        <li><a href="#shop-list" data-bs-toggle="tab"><i class="fa fa-th-list"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="toolbar">
                                    <div class="sorter">
                                        <div class="sort-by">
                                            <label>Sort By</label>
                                            <select>
                                                <option value="position">Position</option>
                                                <option value="name">Name</option>
                                                <option value="price">Price</option>
                                            </select>
                                            <a href="#"><i class="fa fa-long-arrow-up"></i></a>
                                        </div>
                                    </div>
                                    <div class="pager-list">
                                        <div class="limiter">
                                            <label>Show</label>
                                            <select>
                                                <option value="9">12</option>
                                                <option value="12">15</option>
                                                <option value="24">18</option>
                                                <option value="36">36</option>
                                            </select>
                                            per page
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Tab Bar -->
                            <!-- Tab Content -->
                            <div class="tab-content">
                                <!-- Shop Product-->
                                <h5 class="pull-left">Tìm thấy {{ count($tk) }} sản phẩm</h5>
                                <div class="tab-pane active" id="shop-product">
                                    <!-- Tab Single Product-->
                                        <div class="tab-single-product">
                                            @foreach($tk as $san_pham)
                                                <div class="singel-product single-product-col">
                                                    <div class="label-pro-sale">hot</div>
                                                    <!-- Hình Ảnh Sản Phẩm -->
                                                    <div class="single-product-img">
                                                        <a href="#"><img src="{{ asset('storage/' . $san_pham->anh) }}"
                                                                         alt="product"></a>
                                                    </div>
                                                    <!-- Nội Dung Sản Phẩm -->
                                                    <div class="single-product-content">
                                                        <h2 class="product-name"><a title="Proin lectus ipsum"
                                                                                    title="{{ $san_pham->ten_san_pham }}">{{ $san_pham->ten_san_pham }}</a>
                                                        </h2>
                                                        <div class="ratings">
                                                            <div class="rating-box">
                                                                <div class="rating">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-price">
                                                            <p>
                                                                <span>{{ number_format($san_pham->gia_sp, 0, ',', '.') }}vnđ</span>
                                                                {{ number_format($san_pham->gia_sp, 0, ',', '.') }}vnđ
                                                            </p>
                                                        </div>
                                                        <!-- Các Hành Động Của Sản Phẩm -->
                                                        <div class="product-actions">
                                                            <button class="button btn-cart" title="Add to Cart"
                                                                    type="button">
                                                                <i class="fa fa-shopping-cart">&nbsp;</i><span>Add to Cart</span>
                                                            </button>
                                                            <div class="add-to-link">
                                                                <ul class="">
                                                                    <li class="quic-view">
                                                                        <button type="button"
                                                                                data-bs-target="#productModal"
                                                                                data-bs-toggle="modal">
                                                                            <i class="fa fa-search"></i>Quick view
                                                                        </button>
                                                                    </li>
                                                                    <li class="wishlist"><a href="#"><i
                                                                                class="fa fa-heart"></i></a></li>
                                                                    <li class="refresh"><a href="#"><i
                                                                                class="fa fa-refresh"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div><!-- Kết thúc Các Hành Động Của Sản Phẩm -->
                                                    </div><!-- Kết thúc Nội Dung Sản Phẩm -->
                                                </div><!-- Kết thúc Sản Phẩm -->
                                            @endforeach
                                        </div><!-- End Tab Single Product -->


                                </div><!-- End Shop Product-->
{{--                                <!-- Shop List -->--}}
{{--                                <div class="tab-pane" id="shop-list">--}}
{{--                                    <!-- Single Shop -->--}}
{{--                                    @foreach($san_phams as $san_pham)--}}
{{--                                        <div class="single-shop single-product">--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-lg-4 col-md-4 col-sm-5">--}}
{{--                                                    <div class="single-product-img">--}}
{{--                                                        <a href="#"><img src="{{ asset('storage/' . $san_pham->anh) }}"--}}
{{--                                                                         alt="product"></a>--}}
{{--                                                        <div class="add-to-link">--}}
{{--                                                            <ul class="">--}}
{{--                                                                <li class="quic-view">--}}
{{--                                                                    <button data-bs-toggle="modal"--}}
{{--                                                                            data-bs-target="#productModal"--}}
{{--                                                                            type="button"><i--}}
{{--                                                                            class="fa fa-search"></i>Quick view--}}
{{--                                                                    </button>--}}
{{--                                                                </li>--}}
{{--                                                                <li class="wishlist"><a href="#"><i--}}
{{--                                                                            class="fa fa-heart"></i></a>--}}
{{--                                                                </li>--}}
{{--                                                                <li class="refresh"><a href="#"><i--}}
{{--                                                                            class="fa fa-refresh"></i></a></li>--}}
{{--                                                            </ul>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-lg-8 col-md-8 col-sm-7">--}}
{{--                                                    <div class="single-product-content">--}}
{{--                                                        <h2 class="product-name"><a href="product-details.html"--}}
{{--                                                                                    title="{{ $san_pham->ten_san_pham }}">{{ $san_pham->ten_san_pham }}</a>--}}
{{--                                                        </h2>--}}
{{--                                                        <div class="ratings">--}}
{{--                                                            <div class="rating-box">--}}
{{--                                                                <div class="rating">--}}
{{--                                                                    <i class="fa fa-star"></i>--}}
{{--                                                                    <i class="fa fa-star"></i>--}}
{{--                                                                    <i class="fa fa-star"></i>--}}
{{--                                                                    <i class="fa fa-star"></i>--}}
{{--                                                                    <i class="fa fa-star"></i>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="product-price">--}}
{{--                                                            <p><span>{{ number_format($san_pham->gia_sp, 0, ',', '.') }}vnđ</span>--}}
{{--                                                                {{ number_format($san_pham->gia_sp, 0, ',', '.') }}vnđ--}}
{{--                                                            </p>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="single-shop-details">--}}
{{--                                                            <p>{{ $san_pham->mota_sp }}</p>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- Single Product Actions -->--}}
{{--                                                        <div class="product-actions">--}}
{{--                                                            <button type="button" title="Add to Cart"--}}
{{--                                                                    class="button btn-cart"><i--}}
{{--                                                                    class="fa fa-shopping-cart">&nbsp;</i><span>Add to Cart</span>--}}
{{--                                                            </button>--}}
{{--                                                        </div><!-- End Single Product Actions -->--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div><!-- End Single Shop -->--}}
{{--                                    @endforeach--}}
{{--                                </div><!-- End Shop List -->--}}
{{--                            </div><!-- End Tab Content -->--}}



                            <!-- Tab Bar -->
                            <div class="tab-bar tab-bar-bottom">
                                <div class="toolbar">
                                    <div class="sorter">
                                        <div class="sort-by">
                                            <label>Sort By</label>
                                            <select>
                                                <option value="position">Position</option>
                                                <option value="name">Name</option>
                                                <option value="price">Price</option>
                                            </select>
                                            <a href="#"><i class="fa fa-long-arrow-up"></i></a>
                                        </div>
                                    </div>
                                    <div class="pages">
                                        <strong>Page:</strong>
                                        <ol>
                                            <li class="current">1</li>
                                            <li><a href="#">2</a></li>
                                            <li><a title="Next" href="#"><i class="fa fa-arrow-right"></i></a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div><!-- End Tab Bar -->
                        </div><!-- End Shop Product Tab Area -->
                    </div><!-- End Shop Product View -->
                </div>
            </div>
        </div>
    </div><!-- End Shop Product Area -->
    <!-- Brand Area -->
@endsection
