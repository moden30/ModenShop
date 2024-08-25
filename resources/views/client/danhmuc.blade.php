@extends('client.layout.master')

@section('conten')
    <div class="breadcurb-area">
        <div class="container">
            <ul class="breadcrumb">
                <li class="home"><a href="#">Home/Danh Mục</a></li>
            </ul>
        </div>
    </div><!-- End Breadcurb Area -->

    <!-- Shop Product Area -->
    <div class="shop-product-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <!-- Left Sidebar-->
                    <div class="left-sidebar">
                        <div class="left-sidebar-title">
                            <h2>Thao Tác</h2>
                        </div>
                        <!-- Shop Layout -->
                        <div class="shop-layout">
                            <div class="layout-title">
                                <h2>Danh Mục</h2>
                            </div>
                            <div class="layout-list">
                                <ul>
                                    @foreach($danh_mucs as $dm)
                                        <li>
                                            <a href="{{ route('products.index', ['danh_muc_id' => $dm->id]) }}">{{ $dm->ten_danh_muc }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div><!-- End Shop Layout Area -->
                        <!-- Price Filter -->
                        <div class="price-filter-area shop-layout">
                            <div class="price-filter">
                                <div class="layout-title">
                                    <h2>Price</h2>
                                </div>
                                <div id="slider-range"></div>
                                <p>
                                    <input type="text" id="amount" readonly
                                           style="border:0; color:#f6931f; font-weight:bold;">
                                </p>
                                <button class="btn btn-default">Filter</button>
                            </div>
                        </div><!-- End Price Filter Area -->
                        <!-- Shop Layout -->
                        <div class="shop-layout">
                            <div class="layout-title">
                                <h2>Manufacturer</h2>
                            </div>
                            <div class="layout-list">
                                <ul>
                                    <li><a href="#">Adidas</a></li>
                                    <li><a href="#">Chanel</a></li>
                                    <li><a href="#">Dolce</a></li>
                                    <li><a href="#">Gabbana</a></li>
                                    <li><a href="#">Nike</a></li>
                                    <li><a href="#">Vogue</a></li>
                                </ul>
                            </div>
                        </div><!-- End Shop Layout Area -->
                        <!-- Shop Layout -->
                        <div class="shop-layout">
                            <div class="layout-title">
                                <h2>Color</h2>
                            </div>
                            <div class="layout-list">
                                <ul>
                                    <li><a href="#">Black</a></li>
                                    <li><a href="#">Blue</a></li>
                                    <li><a href="#">Brown</a></li>
                                    <li><a href="#">Pink</a></li>
                                    <li><a href="#">Red</a></li>
                                    <li><a href="#">While</a></li>
                                    <li><a href="#">Yellow</a></li>
                                </ul>
                            </div>
                        </div><!-- End Shop Layout -->
                        <!-- Shop Layout Banner -->
                        <div class="shop-layout-banner single-banner">
                            <a href="#">
                                <img alt="banner" src="assets/images/banner/banner1.webp">
                            </a>
                        </div><!-- End Shop Layout Banner -->
                        <!-- Popular Tag Area -->
                        <div class="popular-tag-area">
                            <div class="tag-title">
                                <h2>Popular Tags</h2>
                            </div>
                            <!-- Shop Layout -->
                            <div class="shop-layout">
                                <div class="popular-tag">
                                    <div class="tag-list">
                                        <ul>
                                            <li><a href="#">Clothing</a></li>
                                            <li><a href="#">accessories</a></li>
                                            <li><a href="#">fashion</a></li>
                                            <li><a href="#">footwear</a></li>
                                            <li><a href="#">good</a></li>
                                            <li><a href="#">kid</a></li>
                                            <li><a href="#">Men</a></li>
                                            <li><a href="#">Women</a></li>
                                        </ul>
                                    </div>
                                    <div class="tag-action">
                                        <ul>
                                            <li><a href="#">View all tags</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- End Shop Layout -->
                        </div><!-- End Popular Tag Area -->
                    </div><!-- End Left Sidebar -->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!-- Shop Product View -->
                    <div class="shop-product-view">
                        <!-- Shop Category Image -->
                        <div class="shop-category-image">
                            <img src="assets/images/banner/banner2.jpg" alt="banner">
                        </div>
                        <!-- Shop Product Tab Area -->
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
                            <div class="tab-content">
                                <!-- Shop Product-->
                                <div class="tab-pane active" id="shop-product">
                                    <!-- Tab Single Product-->
                                    @php
                                        // Chia sản phẩm thành các nhóm 4 sản phẩm
                                        $chunkedSanPhams = $san_phams->chunk(4);
                                    @endphp

                                    @foreach($chunkedSanPhams as $san_phamsGroup)
                                        <div class="tab-single-product">
                                            @foreach($san_phamsGroup as $san_pham)
                                                <div class="singel-product single-product-col">
                                                    <div class="label-pro-sale">hot</div>
                                                    <!-- Hình Ảnh Sản Phẩm -->
                                                    <div class="single-product-img">
                                                        <a href="#"><img src="{{ asset('storage/' . $san_pham->anh) }}"
                                                                         alt="product"></a>
                                                    </div>
                                                    <!-- Nội Dung Sản Phẩm -->
                                                    <div class="single-product-content">
                                                        <h2 class="product-name"><a href="{{ route('chitiet', $san_pham->id) }}"
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
                                                            <form action="{{ route('themgiohang') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="qty" value="1">
                                                                <input type="hidden" name="id" value="{{ $san_pham->id }}">
                                                                <button class="button btn-cart" title="Add to Cart" type="submit">
                                                                    <i class="fa fa-shopping-cart">&nbsp;</i><span>Thêm vào giỏ hàng</span>
                                                                </button>
                                                            </form>
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
                                    @endforeach


                                </div><!-- End Shop Product-->
                                <!-- Shop List -->
                                <div class="tab-pane" id="shop-list">
                                    <!-- Single Shop -->
                                    @foreach($san_phams as $san_pham)
                                        <div class="single-shop single-product">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-5">
                                                    <div class="single-product-img">
                                                        <a href="#"><img src="{{ asset('storage/' . $san_pham->anh) }}"
                                                                         alt="product"></a>
                                                        <div class="add-to-link">
                                                            <ul class="">
                                                                <li class="quic-view">
                                                                    <button data-bs-toggle="modal"
                                                                            data-bs-target="#productModal"
                                                                            type="button"><i
                                                                            class="fa fa-search"></i>Quick view
                                                                    </button>
                                                                </li>
                                                                <li class="wishlist"><a href="#"><i
                                                                            class="fa fa-heart"></i></a>
                                                                </li>
                                                                <li class="refresh"><a href="#"><i
                                                                            class="fa fa-refresh"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-7">
                                                    <div class="single-product-content">
                                                        <h2 class="product-name"><a href="{{ route('chitiet', $san_pham->id) }}"
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
                                                            <p><span>{{ number_format($san_pham->gia_sp, 0, ',', '.') }}vnđ</span>
                                                                {{ number_format($san_pham->gia_sp, 0, ',', '.') }}vnđ
                                                            </p>
                                                        </div>
                                                        <div class="single-shop-details">
                                                            <p>{{ $san_pham->mota_sp }}</p>
                                                        </div>
                                                        <!-- Single Product Actions -->
                                                        <div class="product-actions">
                                                            <button type="button" title="Thêm vào giỏ hàng"
                                                                    class="button btn-cart"><i
                                                                    class="fa fa-shopping-cart">&nbsp;</i><span>Thêm vào giỏ hàng</span>
                                                            </button>
                                                        </div><!-- End Single Product Actions -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- End Single Shop -->
                                    @endforeach
                                </div><!-- End Shop List -->
                            </div><!-- End Tab Content -->
                        </div><!-- End Shop Product View -->
                    </div>
                </div>
            </div>
        </div><!-- End Shop Product Area -->
@endsection
