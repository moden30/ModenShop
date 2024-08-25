<!doctype html>
<html class="no-js" lang="">

<!-- Mirrored from template.hasthemes.com/selphy/selphy/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jul 2024 06:16:49 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Home || Selphy</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo/favicon.webp')}}">

		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>

		<!-- CSS
		============================================ -->

		<!-- Icon Font CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css')}}">

		<!-- Plugins CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css')}}">
		<link rel="stylesheet" href="{{ asset('assets/css/nivo-slider.css')}}">
		<link rel="stylesheet" href="{{ asset('assets/css/jquery-ui-slider.css')}}">
		<link rel="stylesheet" href="{{ asset('assets/css/jquery.simpleLens.css')}}">
		<link rel="stylesheet" href="{{ asset('assets/css/jquery.simpleGallery.css')}}">
		<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}">

		<!-- Main Style CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
		<link rel="stylesheet" href="{{ asset('assets/css/responsive.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


</head>
    <body>

		<!-- Header Area -->
		<div class="header-area">

			<!-- Header Top -->
            <div class="header-top" > <!-- Màu xanh ngọc nhạt -->
                <div class="container">
                    <!-- Header Top Bar-->
                    <div class="header-top-bar">
                        <div class="row">
                            <div class="col-lg-5 col-md-6">
                                <!-- Header Top Left-->
                                <div class="header-top-left">
                                    <div class="call-header">
                                        <p><i class="fa fa-phone"></i>Call us toll free:<span> (+88) 01737803547</span></p>
                                    </div>
                                    <div class="header-login">
                                        <a href="my-account.html">Log in</a>
                                    </div>
                                </div><!-- End Header Top Left-->
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <!-- Header Top Right-->
                                <div class="header-top-right">
                                    <!-- Header Link Area -->
                                    <div class="header-link-area">
                                        <div class="header-link">
                                            <ul>
                                                <li><a class="english" href="#">English<i class="fa fa-angle-down"></i></a>
                                                    <ul>
                                                        <li><a href="#">English 1</a></li>
                                                        <li><a href="#">English 2</a></li>
                                                        <li><a href="#">English 3</a></li>
                                                        <li><a href="#">English 4</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="header-link">
                                            <ul>
                                                <li class=""><a class="usd" href="#">USD<i class="fa fa-angle-down"></i></a>
                                                    <ul>
                                                        <li><a href="#">EUR</a></li>
                                                        <li><a href="#">USD</a></li>
                                                    </ul>
                                                </li>
                                                @auth
                                                    <li><a class="account" href="#">{{ Auth::user()->name }}<i class="fa fa-angle-down"></i></a>
                                                        <ul>
                                                            <li><a href="my-account.html">My Account</a></li>
                                                            <li><a href="{{ route('myacc') }}">Tài Khoản</a></li>
                                                            <li><a href="{{ route('index') }}">Đơn Hàng</a></li>
                                                            <li><a href="{{ route('giohangs') }}">Giỏ Hàng</a></li>
                                                            <li><a href="{{ route('logout') }}">Đăng Xuất</a></li>
                                                        </ul>
                                                    </li>
                                                @else
                                                    <li><a class="account" href="{{ route('showLoginClient') }}">Đăng Nhập<i class="fa fa-angle-down"></i></a>
                                                    </li>
                                                @endauth
                                            </ul>
                                        </div>
                                    </div><!-- End Header Link Area -->
                                </div><!-- End Header Top Right-->
                            </div>
                        </div>
                    </div>
                    <!-- End Header Top Bar-->
                </div>
            </div>
            <!-- End Header Top -->

			<!-- Header Bottom -->
            <div class="header-bottom">
                <div class="container">
                    <!-- Header Bottom Inner -->
                    <div class="header-bottom-inner">
                        <div class="row justify-content-between align-items-center">
                            <!-- Header Logo -->
                            <div class="col-lg-3 col-md-4 col-sm-4 col-6 order-lg-1">
                                <div class="header-logo">
                                    <a href="index.html">
                                        <img src="{{ asset('assets/images/logo/Pasted-20240723-170502_preview_rev_1.png')}}" width="150" height="150" alt="logo">
                                    </a>
                                </div>
                            </div>

                            <!-- Header Actions Area -->
                            <div class="col-lg-2 col-md-3 col-sm-4 col-5 order-lg-3">
                                <div class="header-actions">
                                    <div class="header-cart">
                                        <a class="cart" href="{{ route('giohangs') }}">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span class="my-cart">Giỏ Hàng</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Header Search -->
                            <div class="col-lg-7 col-md-12 col-sm-12 order-lg-2 ">
                                <div class="header-search">
                                    <div class="all-categories">
                                        <select id="product-categori">
                                            <option value="All Categories">Danh Mục</option>
                                            @foreach($danh_mucs as $dm)
                                                <option value="{{ $dm->ten_danh_muc }}">{{ $dm->ten_danh_muc }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="search-form">
                                        <form role="timkiem" method="get" action="{{ route('timkiem') }}">
                                            <input type="text" class="input-text" name="key" id="search" placeholder="Nhập tên sản phẩm " value="{{ old('key') }}">
                                            <button type="submit"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Header Bottom Inner -->
                </div>
            </div>
            <!-- End Header Bottom -->

		</div>
		<!-- End Header Area -->

		<!-- Main Menu Area -->
		<div class="main-menu-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
                        <div class="category-menu d-none d-lg-block">
                            <div class="category-menu-title">
                                <h2>Danh mục</h2>
                            </div>
                            <div class="categorie-list">
                                <ul>
                                    @foreach($danh_mucs as $dm)
                                        <li><a href="#" data-danh-muc="{{ $dm->ten_danh_muc }}"><img src="{{ asset('storage/' . $dm->anh) }}" width="50px" height="50px" alt="icon">{{ $dm->ten_danh_muc }}</a></li>
                                    @endforeach

                                    <!-- Menu Accordion-->
                                    <li class="rx-child"><a href="#"><img src="{{ asset('assets/images/icon/m7.webp')}}" alt="icon">Desktop</a></li>
                                    <li class="rx-child"><a href="#">Shop All</a></li>
                                    <li class="rx-parent">
                                        <a class="rx-default"><img src="{{ asset('assets/images/icon/m8.webp')}}" alt="icon">More categories</a>
                                        <a class="rx-show"><img src="{{ asset('assets/images/icon/m9.webp')}}" alt="icon">Close menu</a>
                                    </li>
                                    <!-- End Menu Accordion-->
                                </ul>
                            </div>
                        </div>
					</div>
					<div class="col-lg-9">
						<!-- Manin Menu -->
						<div class="main-menu d-none d-lg-block">
							<nav>
								<ul>
									<li><a href="{{ route('client') }}" class="active">Trang chủ</a>
									</li>
									<li><a href="{{ route('shop') }}">Sản Phẩm</a></li>
									<li><a href="{{ route('giohangs') }}">Giỏ Hàng</a></li>
									<li><a href="{{ route('index') }}">Đơn hàng của tôi</a></li>
									<li><a href="{{ route('myacc') }}">Tài khoản</a></li>
									<li><a href="shop.html">Bài viết</a></li>
									<li><a href="#" class="">Pages</a>
										<!-- Sub Menu -->
										<ul class="sub-menu sub-menu-pages">
											<li><a href="blog.html">Blog</a></li>
											<li><a href="blog-details.html">Blog Details</a></li>
											<li><a href="{{ route('giohangs') }}">Giỏ Hàng</a></li>
											<li><a href="checkout.html">Checkout</a></li>
											<li><a href="contact.html">Contact</a></li>
											<li><a href="shop.html">Shop</a></li>
											<li><a href="shop-list.html">Shop List</a></li>
											<li><a href="product-details.html">Product Details</a></li>
											<li><a href="my-account.html">My Account</a></li>
											<li><a href="testmonial.html">Testmonial</a></li>
											<li><a href="wishlist.html">Wishlist</a></li>
										</ul>
									</li>
								</ul>
							</nav>
						</div><!-- End Manin Menu -->
						<!-- Start Mobile Menu -->
						<div class="mobile-menu d-block d-lg-none">
							<nav>
								<ul>
									<li class=""><a href="index.html">Home</a>
										<ul class="sub-menu">
											<li><a href="index-2.html">Home Page 2</a></li>
											<li><a href="index-3.html">Home Page 3</a></li>
											<li><a href="index-4.html">Home Page 4</a></li>
										</ul>
									</li>
									<li><a href="shop.html">Laptop</a>
										<ul class="">
											<li><a href="#">Dreeses</a>
												<ul>
													<li><a href="#">Cocktail</a></li>
													<li><a href="#">Day</a></li>
													<li><a href="#">Evening</a></li>
													<li><a href="#">Sports</a></li>
												</ul>
											</li>
											<li><a href="#">Shoes</a>
												<ul>
													<li><a href="#">Sports</a></li>
													<li><a href="#">Run</a></li>
													<li><a href="#">Sandals</a></li>
													<li><a href="#">Books</a></li>
												</ul>
											</li>
											<li><a href="#">Handbages</a>
												<ul>
													<li><a href="#">blazers</a></li>
													<li><a href="#">table</a></li>
													<li><a href="#">coats</a></li>
													<li><a href="#">Sports</a></li>
													<li><a href="#">kids</a></li>
												</ul>
											</li>
											<li><a href="#">Clothing</a>
												<ul>
													<li><a href="#">T-shits</a></li>
													<li><a href="#">Coats</a></li>
													<li><a href="#">Jacketes</a></li>
													<li><a href="#">Jeans</a></li>
												</ul>
											</li>
										</ul>
									</li>
									<li class=""><a href="shop.html">Mobile</a>
										<ul class="">
											<li><a href="#">Bages</a>
												<ul>
													<li><a href="#">Bootes Bages</a></li>
													<li><a href="#">Blazers</a></li>
													<li><a href="#">Mermaid</a></li>
												</ul>
											</li>
											<li><a href="#">Clothing</a>
												<ul>
													<li><a href="#">coats</a></li>
													<li><a href="#">T-shirt</a></li>
												</ul>
											</li>
											<li><a href="#">lingerie</a>
												<ul>
													<li><a href="#">brands</a></li>
													<li><a href="#">furniture</a></li>
												</ul>
											</li>
										</ul>
									</li>
									<li><a href="shop.html">Tablet</a>
										<ul class="">
											<li><a href="#">Footwear Man</a>
												<ul>
													<li><a href="#">Gold Rigng</a></li>
													<li><a href="#">paltinum Rings</a></li>
													<li><a href="#">Silver Ring</a></li>
													<li><a href="#">Tungsten Ring</a></li>
												</ul>
											</li>
											<li><a href="#">Footwear Womens</a>
												<ul>
													<li><a href="#">Brand Gold</a></li>
													<li><a href="#">paltinum Rings</a></li>
													<li><a href="#">Silver Ring</a></li>
													<li><a href="#">Tungsten Ring</a></li>
												</ul>
											</li>
											<li><a href="#">Band</a>
												<ul>
													<li><a href="#">Platinum Necklaces</a></li>
													<li><a href="#">Gold Ring</a></li>
													<li><a href="#">silver ring</a></li>
													<li><a href="#">sunglasses</a></li>
												</ul>
											</li>
										</ul>
									</li>
									<li><a href="shop.html">Headphone</a>
										<ul class="">
											<li><a href="#">Rings</a>
												<ul>
													<li><a href="#">Coats & jackets</a></li>
													<li><a href="#">blazers</a></li>
													<li><a href="#">raincoats</a></li>
												</ul>
											</li>
											<li><a href="#">Dresses</a>
												<ul>
													<li><a href="#">footwear</a></li>
													<li><a href="#">blazers</a></li>
													<li><a href="#">clog sandals</a></li>
													<li><a href="#">combat boots</a></li>
												</ul>
											</li>
											<li><a href="#">Accessories</a>
												<ul>
													<li><a href="#">bootees Bags</a></li>
													<li><a href="#">blazers</a></li>
													<li><a href="#">jackets</a></li>
													<li><a href="#">kids</a></li>
													<li><a href="#">shoes</a></li>
												</ul>
											</li>
											<li><a href="#">Top</a>
												<ul>
													<li><a href="#">briefs</a></li>
													<li><a href="#">camis</a></li>
													<li><a href="#">nigthwear</a></li>
													<li><a href="#">shapewer</a></li>
												</ul>
											</li>
										</ul>
									</li>
									<li><a href="shop.html">Camera & Photo</a></li>
									<li><a href="shop.html">Desktop</a></li>
									<li><a href="shop.html">Shop All</a></li>
									<li class=""><a href="#">Pages</a>
										<ul class="">
											<li><a href="blog.html">Blog</a></li>
											<li><a href="blog-details.html">Blog Details</a></li>
											<li><a href="{{ route('giohangs') }}">Giỏ Hàng</a></li>
											<li><a href="checkout.html">Checkout</a></li>
											<li><a href="contact.html">Contact</a></li>
											<li><a href="shop.html">Shop</a></li>
											<li><a href="shop-list.html">Shop List</a></li>
											<li><a href="product-details.html">Product Details</a></li>
											<li><a href="my-account.html">My Account</a></li>
											<li><a href="testmonial.html">Testmonial</a></li>
											<li><a href="wishlist.html">Wishlist</a></li>
										</ul>
									</li>
								</ul>
							</nav>
						</div><!-- End Mobile Menu -->
					</div>
				</div>
			</div>
		</div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Xử lý sự kiện thay đổi trên select
                document.getElementById('product-categori').addEventListener('change', function() {
                    var selectedCategory = this.value;
                    if (selectedCategory !== 'All Categories') {
                        // Thay đổi URL của trang hiện tại hoặc chuyển hướng
                        window.location.href = '/products?danh_muc=' + encodeURIComponent(selectedCategory);
                    }
                });

                // Xử lý sự kiện nhấp vào liên kết danh mục trong menu
                document.querySelectorAll('.categorie-list a[data-danh-muc]').forEach(function(link) {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        var danhMuc = this.getAttribute('data-danh-muc');
                        if (danhMuc) {
                            // Thay đổi URL của trang hiện tại hoặc chuyển hướng
                            window.location.href = '/products?danh_muc=' + encodeURIComponent(danhMuc);
                        }
                    });
                });
            });
        </script>

        <!-- End Main Menu Area -->
