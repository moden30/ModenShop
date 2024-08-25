@extends('client.layout.master')
@section('conten')

    <!-- Main Slider Area -->
    <div class="main-slider-area">
        <!-- Main Slider -->
        <div class="main-slider">
            <div class="slider">
                <div id="mainSlider" class="nivoSlider slider-image">
                    @foreach($banners as $bn)
                        <a href="#"><img src="{{ asset('storage/' . $bn->anh_san_pham) }}" alt="main slider"></a>
                    @endforeach
                </div>
            </div>
        </div><!-- End Main Slider -->
    </div><!-- End Main Slider Area -->
    <!-- Top Banner Area -->
    <div class="top-banner-area">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4 col-sm-6">
                    <!-- Single Banner -->
                    <div class=<img src="assets/images/banner/banner1.webp" alt="banner">
                        <a href="#"><img src="assets/images/banner/anh1.jpg" alt="banner"></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <!-- Single Banner -->
                    <div class=<img src="assets/images/banner/banner1.webp" alt="banner">
                        <a href="#"><img src="assets/images/banner/anh2.jpg" alt="banner"></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <!-- Single Banner -->
                    <div class=<img src="assets/images/banner/banner1.webp" alt="banner">
                        <a href="#"><img src="assets/images/banner/anh3.jpg" alt="banner"></a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Top Banner Area -->}
    <!-- Product Area -->
    <div class="product-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <!-- Product Left Sidebar Area -->
                    <div class="product-left-siderbar">

                        <!-- Timer product -->
                        <div class="timer-product">
                            <div class="timer-product-title">
                                <h2>Flash Sale</h2>
                            </div>
                            <!-- Timer product Carousel-->
                            <div id="timer-product-carousel" class="owl-carousel custom-carousel">
                                <!-- Single Product -->
                                <div class="singel-product single-product-col">
                                    <!-- Single Product Image -->
                                    <div laptop>
                                        <a href="#"><img src="assets/images/products/anhsp11.jpg" alt="product"></a>
                                    </div>
                                    <!-- Countdown -->
                                    <div class="counterdown">
                                        <div class="counter">
                                            <div class="timer">
                                                <div data-countdown="2022/03/04"></div>
                                            </div>
                                        </div>
                                    </div><!-- End Countdown -->
                                    <!-- Single Product Content -->
                                    <div class="single-product-content">
                                        <h2 class="product-name"><a title="Proin lectus ipsum"
                                                                    href="product-details.html">Voan chùm đuôi váy công
                                                chúa Lolita</a></h2>
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
                                            <p><span>111.000vnđ</span>99.000vnđ</p>
                                        </div>
                                        <!-- Single Product Actions -->
                                        <div class="product-actions">
                                            <button class="button btn-cart" title="Add to Cart" type="button"><i
                                                    class="fa fa-shopping-cart">&nbsp;</i><span>Thêm vào giỏ hàng</span>
                                            </button>
                                            <div class="add-to-link">
                                                <ul class="">
                                                    <li class="quic-view">
                                                        <button type="button" data-bs-target="#productModal"
                                                                data-bs-toggle="modal"><i class="fa fa-search"></i>Tìm
                                                            kiếm
                                                        </button>
                                                    </li>
                                                    <li class="wishlist"><a href="#"><i class="fa fa-heart"></i></a>
                                                    </li>
                                                    <li class="refresh"><a href="#"><i class="fa fa-refresh"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- End Single Product Actions -->
                                    </div><!-- End Single Product Content -->
                                </div><!-- End Single Product -->
                                <!-- Single Product -->
                                <div class="singel-product single-product-col">
                                    <!-- Single Product Image -->
                                    <div laptop>
                                        <a href="#"><img src="assets/images/products/anhsp1.jpg" alt="product"></a>
                                    </div>
                                    <!-- Countdown -->
                                    <div class="counterdown">
                                        <div class="counter">
                                            <div class="timer">
                                                <div data-countdown="2022/03/04"></div>
                                            </div>
                                        </div>
                                    </div><!-- End Countdown -->
                                    <!-- Single Product Content -->
                                    <div class="single-product-content">
                                        <h2 class="product-name"><a title="Proin lectus ipsum"
                                                                    href="product-details.html">Proin lectus ipsum</a>
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
                                            <p><span>$346.00</span>$249.00</p>
                                        </div>
                                        <!-- Single Product Actions -->
                                        <div class="product-actions">
                                            <button class="button btn-cart" title="Add to Cart" type="button"><i
                                                    class="fa fa-shopping-cart">&nbsp;</i><span>Add to Cart</span>
                                            </button>
                                            <div class="add-to-link">
                                                <ul class="">
                                                    <li class="quic-view">
                                                        <button type="button" data-bs-target="#productModal"
                                                                data-bs-toggle="modal"><i class="fa fa-search"></i>Quick
                                                            view
                                                        </button>
                                                    </li>
                                                    <li class="wishlist"><a href="#"><i class="fa fa-heart"></i></a>
                                                    </li>
                                                    <li class="refresh"><a href="#"><i class="fa fa-refresh"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- End Single Product Actions -->
                                    </div><!-- End Single Product Content -->
                                </div><!-- End Single Product -->
                                <!-- Single Product -->
                                <div class="singel-product single-product-col">
                                    <!-- Single Product Image -->
                                    <div laptop>
                                        <a href="#"><img src="assets/images/products/s4.webp" alt="product"></a>
                                    </div>
                                    <!-- Countdown -->
                                    <div class="counterdown">
                                        <div class="counter">
                                            <div class="timer">
                                                <div data-countdown="2022/03/04"></div>
                                            </div>
                                        </div>
                                    </div><!-- End Countdown -->
                                    <!-- Single Product Content -->
                                    <div class="single-product-content">
                                        <h2 class="product-name"><a title="Proin lectus ipsum"
                                                                    href="product-details.html">Proin lectus ipsum</a>
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
                                            <p><span>$255.00</span>$120.00</p>
                                        </div>
                                        <!-- Single Product Actions -->
                                        <div class="product-actions">
                                            <button class="button btn-cart" title="Add to Cart" type="button"><i
                                                    class="fa fa-shopping-cart">&nbsp;</i><span>Add to Cart</span>
                                            </button>
                                            <div class="add-to-link">
                                                <ul class="">
                                                    <li class="quic-view">
                                                        <button type="button" data-bs-target="#productModal"
                                                                data-bs-toggle="modal"><i class="fa fa-search"></i>Quick
                                                            view
                                                        </button>
                                                    </li>
                                                    <li class="wishlist"><a href="#"><i class="fa fa-heart"></i></a>
                                                    </li>
                                                    <li class="refresh"><a href="#"><i class="fa fa-refresh"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- End Single Product Actions -->
                                    </div><!-- End Single Product Content -->
                                </div><!-- End Single Product -->
                                <!-- Single Product -->
                                <div class="singel-product single-product-col">
                                    <!-- Single Product Image -->
                                    <div laptop>
                                        <a href="#"><img src="assets/images/products/s10.webp" alt="product"></a>
                                    </div>
                                    <!-- Countdown -->
                                    <div class="counterdown">
                                        <div class="counter">
                                            <div class="timer">
                                                <div data-countdown="2022/03/04"></div>
                                            </div>
                                        </div>
                                    </div><!-- End Countdown -->
                                    <!-- Single Product Content -->
                                    <div class="single-product-content">
                                        <h2 class="product-name"><a title="Proin lectus ipsum"
                                                                    href="product-details.html">Proin lectus ipsum</a>
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
                                            <p><span>$300.00</span>$220.00</p>
                                        </div>
                                        <!-- Single Product Actions -->
                                        <div class="product-actions">
                                            <button class="button btn-cart" title="Add to Cart" type="button"><i
                                                    class="fa fa-shopping-cart">&nbsp;</i><span>Add to Cart</span>
                                            </button>
                                            <div class="add-to-link">
                                                <ul class="">
                                                    <li class="quic-view">
                                                        <button type="button" data-bs-target="#productModal"
                                                                data-bs-toggle="modal"><i class="fa fa-search"></i>Quick
                                                            view
                                                        </button>
                                                    </li>
                                                    <li class="wishlist"><a href="#"><i class="fa fa-heart"></i></a>
                                                    </li>
                                                    <li class="refresh"><a href="#"><i class="fa fa-refresh"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- End Single Product Actions -->
                                    </div><!-- End Single Product Content -->
                                </div><!-- End Single Product -->
                            </div><!-- End Timer product Carousel-->
                        </div><!-- End Timer product -->

                        <!-- Product Single Banner -->
                        <div class="product-banner-single">
                            <!-- Single Banner -->
                            <div class=<img src="assets/images/banner/banner.jpg" alt="banner">
                                <a href="#"><img src="assets/images/banner/banner1.jpg" alt="banner"></a>
                            </div>
                        </div><!-- End Product Single Banner -->

                        <!-- Featured Product Area -->
                        <div class="featured-product-area">
                            <div class="featured-product-title">
                                <h2>Sản Phẩm Mới</h2>
                            </div>

                            <!-- Featured Products -->
                            <div class="featured-products">
                                @foreach($san_pham as $san_pham)
                                    <div class="featured-product-category">
                                        <div class="featured-product-img">
                                            <a href="#"><img src="{{ asset('storage/' . $san_pham->anh) }}"
                                                             width="100px" height="60px" alt="product"></a>
                                        </div>
                                        <div class="featured-product-content">
                                            <h2 class="product-name">
                                                <a href="{{ route('chitiet', $san_pham->id) }}"
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

                                                {{ number_format($san_pham->gia_sp, 0, ',', '.') }}vnđ
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div><!-- End Featured Products -->
                        </div><!-- End Featured Product Area -->

                    </div><!-- End Product Left Sidebar Area -->
                </div>
                <div class="col-lg-9">
                    <!-- Product View Area -->
                    <div class="product-view-area fix">
                        <!-- Single Product Category -->
                        <div class="single-product-category">
                            <!-- Product Category Title-->
                            <div class="head-title">
                                <p><a href="shop.html">Đầm dự tiệc</a></p>
                            </div>
                            <div class="product-view">
                                <!-- Product View Carousel -->
                                <div id="laptop-carousel" class="owl-carousel custom-carousel">
                                    @foreach($san_phams as $san_pham)
                                        <!-- Single Product -->
                                        <div class="singel-product single-product-col">
                                            <div class="label-pro-sale">hot</div>
                                            <!-- Single Product Image -->
                                            <div laptop>
                                                <a href="#"><img src="{{ asset('storage/' . $san_pham->anh) }}"></a>
                                            </div>
                                            <!-- Single Product Content -->
                                            <div class="single-product-content">
                                                <h2 class="product-name"><a title="{{ $san_pham->ten_san_pham }}"
                                                                            href="{{ route('chitiet', $san_pham->id) }}"">{{ $san_pham->ten_san_pham }}</a>
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
                                                <!-- Single Product Actions -->
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
                                                                <button type="button" data-bs-target="#productModal"
                                                                        data-bs-toggle="modal"><i
                                                                        class="fa fa-search"></i>Tìm kiếm
                                                                </button>
                                                            </li>
                                                            <li class="wishlist"><a href="#"><i class="fa fa-heart"></i></a>
                                                            </li>
                                                            <li class="refresh"><a href="#"><i
                                                                        class="fa fa-refresh"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div><!-- End Single Product Actions -->
                                            </div><!-- End Single Product Content -->
                                        </div><!-- End Single Product -->
                                    @endforeach
                                </div>
                            </div>


                            <!-- Product Banner-->
                            <div class="product-banner">
                                <div class="row">
                                    <div class="col-md-8 col-sm-8">

                                        <a href="#"><img src="assets/images/banner/banner2.jpg" width="1000px"
                                                         height="600px" alt="banner"></a>

                                    </div>
                                    <div class="col-md-4 col-sm-4">

                                        <a href="#"><img src="assets/images/banner/anh55.jpg" height="600px"
                                                         alt="banner"></a>
                                    </div>
                                </div>
                            </div><!-- End Product Banner-->

                        </div><!-- End Single Product Category -->

                        <!-- Single Product Category -->
                        <div class="single-product-category">
                            <!-- Product Category Title-->
                            <div class="head-title">
                                <p><a href="shop.html">Đầm Body Nữ</a></p>
                            </div>
                            <!-- Product View -->
                            <div class="product-view">
                                <!-- Product View Carousel -->
                                <div id="tablet-carousel" class="owl-carousel custom-carousel">
                                    @foreach($san_phams as $san_pham)
                                        <!-- Single Product -->
                                        <div class="singel-product single-product-col">
                                            <div class="label-pro-sale">hot</div>
                                            <!-- Single Product Image -->
                                            <div laptop>
                                                <a href="#"><img src="{{ asset('storage/' . $san_pham->anh) }}"
                                                                 alt="product"></a>
                                            </div>
                                            <!-- Single Product Content -->
                                            <div class="single-product-content">
                                                <h2 class="product-name"><a title="{{ $san_pham->ten_san_pham }}"
                                                                            href="{{ route('chitiet', $san_pham->id) }}">{{ $san_pham->ten_san_pham }}</a>
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
                                                        {{ number_format($san_pham->gia_sp, 0, ',', '.') }}vnđ</p>
                                                </div>
                                                <!-- Single Product Actions -->
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
                                                                <button type="button" data-bs-target="#productModal"
                                                                        data-bs-toggle="modal"><i
                                                                        class="fa fa-search"></i>Tìm
                                                                    kiếm
                                                                </button>
                                                            </li>
                                                            <li class="wishlist"><a href="#"><i class="fa fa-heart"></i></a>
                                                            </li>
                                                            <li class="refresh"><a href="#"><i
                                                                        class="fa fa-refresh"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div><!-- End Single Product Actions -->
                                            </div><!-- End Single Product Actions -->
                                        </div>
                                    @endforeach<!-- End Single Product -->
                                </div><!-- End Product View Carousel -->
                            </div><!-- End Product View-->
                            <!-- Product Banner-->
                            <div class="product-banner">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class=<img src="assets/images/banner/banner1.webp" alt="banner">
                                            <a href="#"><img src="assets/images/banner/anh1.jpg" width="1000px"
                                                             alt="banner"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <div class=<img src="assets/images/banner/banner1.webp" alt="banner">
                                            <a href="#"><img src="assets/images/banner/banner4.jpg" alt="banner"></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Product Banner-->
                        </div><!-- End Single Product Category -->
                    </div><!-- End Product View Area -->
                </div>
            </div>
        </div>
    </div><!-- End Product Area -->
    <!-- Services Group -->
    <div class="services-group">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- Our Services -->
                    <div class="our-services">
                        <div class="head-title">
                            <p>Các Ưu Đãi</p>
                        </div>
                        <!-- Our Services Content -->
                        @php
                            $icons = ['fa-truck', 'fa-gift', 'fa-tag', 'fa-percent', 'fa-shopping-cart']; // Danh sách các icon
                        @endphp

                        <div class="our-services-content">
                            <!-- Single Services -->
                            @foreach($khuyen_mai as $dm)
                                <div class="single-services">
                                    <div class="single-services-icon">
                                        <i class="fa {{ $icons[array_rand($icons)] }}"></i>
                                    </div>
                                    <div class="single-services-content">
                                        <h2>{{ $dm->ten_khuyen_mai }}</h2>
                                        <p>{{ $dm->loai_khuyen_mai }}</p>
                                    </div>
                                </div><!-- End Single Services -->
                            @endforeach
                        </div>
                        <!-- End Our Services Content -->
                    </div><!-- End Our Services -->
                </div>
                <div class="col-lg-4">
                    <!-- Client Testmonials Area -->
                    <div class="client-testimonals-area">
                        <div class="head-title">
                            <p>Đánh Giá Của Khách Hàng</p>
                        </div>
                        <div id="client-carousel" class="owl-carousel custom-carousel-2">
                            <!-- Client Testmonials -->
                            <div class="client-testimonals">
                                <!-- Single Client Testmonials -->
                                <div class="single-client-testimonals">
                                    <div class="client-testimonals-img">
                                        <img src="assets/images/blog/client.webp" alt="client">
                                    </div>
                                    <div class="client-testimonals-content">
                                        <a href="#">Fusce ornare bibendum suscipit. Phasellus eget sem non erat
                                            consequat mattis at ut sapien. Fusce rhoncus egestas purus...</a>
                                        <div class="post-by">
                                            <span class="testimonial-author">Lacuada</span>
                                            <span class="testimonial-date">January 19, 2016</span>
                                        </div>
                                    </div>
                                </div><!-- End Single Client Testmonials -->
                                <!-- Single Client Testmonials -->
                                <div class="single-client-testimonals">
                                    <div class="client-testimonals-img">
                                        <img src="assets/images/blog/client.webp" alt="client">
                                    </div>
                                    <div class="client-testimonals-content">
                                        <a href="#">Fusce ornare bibendum suscipit. Phasellus eget sem non erat
                                            consequat mattis at ut sapien. Fusce rhoncus egestas purus...</a>
                                        <div class="post-by">
                                            <span class="testimonial-author">Lacuada</span>
                                            <span class="testimonial-date">January 19, 2016</span>
                                        </div>
                                    </div>
                                </div><!-- End Single Client Testmonials -->
                            </div><!-- End Client Testmonials -->
                            <!-- Client Testmonials -->
                            <div class="client-testimonals">
                                <!-- Single Client Testmonials -->
                                <div class="single-client-testimonals">
                                    <div class="client-testimonals-img">
                                        <img src="assets/images/blog/client.webp" alt="client">
                                    </div>
                                    <div class="client-testimonals-content">
                                        <a href="#">Fusce ornare bibendum suscipit. Phasellus eget sem non erat
                                            consequat mattis at ut sapien. Fusce rhoncus egestas purus...</a>
                                        <div class="post-by">
                                            <span class="testimonial-author">Lacuada</span>
                                            <span class="testimonial-date">January 19, 2016</span>
                                        </div>
                                    </div>
                                </div><!-- End Single Client Testmonials -->
                                <!-- Single Client Testmonials -->
                                <div class="single-client-testimonals">
                                    <div class="client-testimonals-img">
                                        <img src="assets/images/blog/client.webp" alt="client">
                                    </div>
                                    <div class="client-testimonals-content">
                                        <a href="#">Fusce ornare bibendum suscipit. Phasellus eget sem non erat
                                            consequat mattis at ut sapien. Fusce rhoncus egestas purus...</a>
                                        <div class="post-by">
                                            <span class="testimonial-author">Lacuada</span>
                                            <span class="testimonial-date">January 19, 2016</span>
                                        </div>
                                    </div>
                                </div><!-- End Single Client Testmonials -->
                            </div><!-- End Client Testmonials -->
                        </div>
                    </div><!-- End Client Testmonials Area -->
                </div>
                <div class="col-lg-4">
                    <!-- Blog Post Area -->
                    <div class="blog-post-area">
                        <div class="head-title">
                            <p>Về Chúng Tôi</p>
                        </div>
                        <div id="blog-post-carousel" class="owl-carousel custom-carousel-2">
                            <!-- Single Blog Post -->
                            <div class="single-blog-post">
                                <div class="blog-post-img">
                                    <a href="#"><img src="assets/images/blog/blog1.webp" alt="blog"></a>
                                </div>
                                <!-- Single Blog Post Content -->
                                <div class="single-blog-post-content">
                                    <h2><a href="#">Donec tristique eget enim eu elementum. Vivamus orci libero</a></h2>
                                    <div class="date-time">
                                        <div class="time-blog">
                                            <i class="fa fa-calendar-o">&nbsp;</i> 01 Jan 1970 <span>/</span>
                                        </div>
                                        <div class="time-comment">
                                            <span><i class="fa fa-comments-o"></i>0 comments </span>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer elementum dui
                                        quis tortor luctus, eu ultricies nibh facilisis. Donec porttitor sed leo
                                        nec...</p>
                                    <a href="#" class="readmore">Read more</a>
                                </div><!-- End Single Blog Post Content -->
                            </div><!-- End Single Blog Post -->
                            <!-- Single Blog Post -->
                            <div class="single-blog-post">
                                <div class="blog-post-img">
                                    <a href="#"><img src="assets/images/blog/blog2.webp" alt="blog"></a>
                                </div>
                                <!-- Single Blog Post Content -->
                                <div class="single-blog-post-content">
                                    <h2><a href="#">Donec tristique eget enim eu elementum. Vivamus orci libero</a></h2>
                                    <div class="date-time">
                                        <div class="time-blog">
                                            <i class="fa fa-calendar-o">&nbsp;</i> 01 Jan 1970 <span>/</span>
                                        </div>
                                        <div class="time-comment">
                                            <span><i class="fa fa-comments-o"></i>0 comments </span>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer elementum dui
                                        quis tortor luctus, eu ultricies nibh facilisis. Donec porttitor sed leo
                                        nec...</p>
                                    <a href="#" class="readmore">Read more</a>
                                </div><!-- End Single Blog Post Content -->
                            </div><!-- End Single Blog Post -->
                            <!-- Single Blog Post -->
                            <div class="single-blog-post">
                                <div class="blog-post-img">
                                    <a href="#"><img src="assets/images/blog/blog3.webp" alt="blog"></a>
                                </div>
                                <!-- Single Blog Post Content -->
                                <div class="single-blog-post-content">
                                    <h2><a href="#">Donec tristique eget enim eu elementum. Vivamus orci libero</a></h2>
                                    <div class="date-time">
                                        <div class="time-blog">
                                            <i class="fa fa-calendar-o">&nbsp;</i> 01 Jan 1970 <span>/</span>
                                        </div>
                                        <div class="time-comment">
                                            <span><i class="fa fa-comments-o"></i>0 comments </span>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer elementum dui
                                        quis tortor luctus, eu ultricies nibh facilisis. Donec porttitor sed leo
                                        nec...</p>
                                    <a href="#" class="readmore">Read more</a>
                                </div><!-- End Single Blog Post Content -->
                            </div><!-- End Single Blog Post -->
                            <!-- Single Blog Post -->
                            <div class="single-blog-post">
                                <div class="blog-post-img">
                                    <a href="#"><img src="assets/images/blog/blog4.webp" alt="blog"></a>
                                </div>
                                <!-- Single Blog Post Content -->
                                <div class="single-blog-post-content">
                                    <h2><a href="#">Donec tristique eget enim eu elementum. Vivamus orci libero</a></h2>
                                    <div class="date-time">
                                        <div class="time-blog">
                                            <i class="fa fa-calendar-o">&nbsp;</i> 01 Jan 1970 <span>/</span>
                                        </div>
                                        <div class="time-comment">
                                            <span><i class="fa fa-comments-o"></i>0 comments </span>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer elementum dui
                                        quis tortor luctus, eu ultricies nibh facilisis. Donec porttitor sed leo
                                        nec...</p>
                                    <a href="#" class="readmore">Read more</a>
                                </div><!-- End Single Blog Post Content -->
                            </div><!-- End Single Blog Post -->
                        </div>
                    </div><!-- End Blog Post Area -->
                </div>
            </div>
        </div>
    </div><!-- End Services Group -->
    <!-- Brand Area -->

@endsection

