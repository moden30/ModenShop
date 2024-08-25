@extends('client.layout.master')
@section('conten')
    <!-- Breadcurb Area -->
    <div class="breadcurb-area">
        <div class="container">
            <ul class="breadcrumb">
                <li class="home"><a href="#">Trang chủ</a></li>
                <li class=""><a href="#">Sản phẩm</a></li>
                <li>Chi tiết sản phẩm</li>
            </ul>
        </div>
    </div><!-- End Breadcurb Area -->
    <!-- Single Product details Area -->
    <div class="single-product-detaisl-area">
        <!-- Single Product View Area -->
        <div class="single-product-view-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <!-- Single Product View -->
                        <div class="single-procuct-view">
                            <!-- Simple Lence Gallery Container -->
                            <div class="simpleLens-gallery-container" id="p-view">
                                <div class="simpleLens-container tab-content">
                                    <div class="tab-pane active" id="p-view-1">
                                        <div class="simpleLens-big-image-container">
                                            <a class="simpleLens-lens-image"
                                               data-lens-image="assets/images/products/single-product/large/1.webp">
                                                <img src="{{ Storage::url($sanpham->anh) }}"
                                                     class="simpleLens-big-image" alt="productd">
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Simple Lence Gallery Container -->
                        </div><!-- End Single Product View -->
                    </div>
                    <div class="col-lg-7">
                        <!-- Single Product Content View -->
                        <div class="single-product-content-view">
                            <div class="product-info">
                                <h1>{{ $sanpham->ten_san_pham }}</h1>
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
                                <p class="rating-links">
                                    <a href="#">1 Review(s)</a>
                                    <span class="separator">|</span>
                                    <a href="#" class="add-to-review">Add Your Review</a>
                                </p>
                                <p class="availability in-stock">Availability: <span>In stock</span></p>
                                <div class="quick-desc">
                                    {{--                                    {{ $sanpham->mota_sp }}--}}
                                </div>
                                <div class="price-box">
                                    <p class="price">
                                        <span class="price-special">{{ number_format($sanpham->gia_sp, 0, ',', '.') }}vnđ</span>
                                        <span class="text-dark text-lowercase">
                                            <del>
                                                {{ number_format($sanpham->gia_sp, 0, ',', '.') }}vnđ
                                             </del>
                                        </span>
                                    </p>
                                </div>
                            </div><!-- End product-info -->
                            <!-- Add to Box -->
                            <div class="add-to-box add-to-box2">
                                <div class="actions-inner">
                                    <ul class="add-to-links">
                                        <li><a class="link-wishlist" title="Add to Wishlist" href="#"><i
                                                    class="fa fa-star"></i></a></li>
                                        <li><a class="link-compare" title="Add to Compare" href="#"><i
                                                    class="fa fa-retweet"></i></a></li>
                                        <li class="email-friend" title="Email to a Friend"><a href="#"><i
                                                    class="fa fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-select product-color">
                                    <h2>Color <sup>*</sup></h2>
                                    <select>
                                        <option>--Please Select--</option>
                                        <option>Green +$2.00</option>
                                        <option>Blue +$1.00</option>
                                        <option>White +$3.00</option>
                                    </select>
                                </div>
                                <div class="product-select product-size">
                                    <h2>Size <sup>*</sup></h2>
                                    <select>
                                        <option>--Please Select--</option>
                                        <option>XL +$3.00</option>
                                        <option>L +$2.00</option>
                                        <option>M +$1.00</option>
                                    </select>
                                </div>
                                <div class="price-box">
                                    <p class="price"><span class="special-price"><span
                                                class="amount">{{ number_format($sanpham->gia_sp, 0, ',', '.') }}vnđ</span></span>
                                    </p>
                                </div>
                                <div class="quick-add-to-cart">
                                    <form method="post" action="{{ route('themgiohang') }}" class="cart">
                                        @csrf
                                        <div class="qty-button">
                                            <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                            <input type="hidden" name="id" value="{{ $sanpham->id }}">

                                            <div class="box-icon button-plus">
                                                <input type="button" class="qty-increase"
                                                       onclick="adjustQuantity(1)"
                                                       value="+">
                                            </div>
                                            <div class="box-icon button-minus">
                                                <input type="button" class="qty-decrease"
                                                       onclick="adjustQuantity(-1)"
                                                       value="-">
                                            </div>
                                        </div>
                                        <div class="product-actions">
                                            <button class="button btn-cart" title="Add to Cart" type="submit"><i
                                                    class="fa fa-shopping-cart">&nbsp;</i><span>Thêm vào giỏ hàng</span>
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div><!-- End Add to Box -->
                            <!-- Social Shiring -->
                            <div class="social-sharing">
                                <a href="#"><img src="assets/images/icon/social.webp" alt="social"></a>
                            </div><!-- End Social Shiring -->
                        </div><!-- End Single Product Content View -->
                    </div>
                </div>
            </div>
        </div><!-- End Single Product View Area -->
        <!-- Single Description Tab -->
        <div class="single-product-description">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-description-tab custom-tab">
                            <!-- tab bar -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li><a class="active" href="#product-des" data-bs-toggle="tab">Mô tả sản phẩm</a>
                                </li>
                                <li><a href="#product-rev" data-bs-toggle="tab">Bình Luận</a></li>
                                <li><a href="#product-tag" data-bs-toggle="tab">Product Tags</a></li>
                            </ul>
                            <!-- Tab Content -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="product-des">
                                    <p>{{ strip_tags($sanpham->mota_sp) }}</p>
                                </div>
{{--                                <div class="tab-pane" id="product-rev">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-lg-12">--}}
{{--                                            <div class="product-rev-right">--}}
{{--                                                <div class="porduct-rev-right-form">--}}
{{--                                                    <form action="#" class="form-horizontal product-form">--}}
{{--                                                        <div class="form-goroup">--}}
{{--                                                            <label>Nickname <sup>*</sup></label>--}}
{{--                                                            <input type="text" class="form-control" required="required">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="form-goroup">--}}
{{--                                                            <label>Summary of Your Review <sup>*</sup></label>--}}
{{--                                                            <input type="text" class="form-control" required="required">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="form-goroup">--}}
{{--                                                            <label>Review <sup>*</sup></label>--}}
{{--                                                            <textarea class="form-control" rows="5"--}}
{{--                                                                      required="required"></textarea>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="form-goroup form-group-button">--}}
{{--                                                            <button class="btn custom-button" value="submit">Submit--}}
{{--                                                                Review--}}
{{--                                                            </button>--}}
{{--                                                        </div>--}}
{{--                                                    </form>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="tab-pane" id="product-rev">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- Danh sách bình luận -->
                                            <div class="product-rev-list">
                                                <h3>Tất cả bình luận</h3>
                                                @if ($reviews->isEmpty())
                                                    <p>Chưa có bình luận nào.</p>
                                                @else
                                                    @foreach ($reviews as $review)
                                                        <div class="review-item">
                                                            <div class="review-header">
                                                                <img src="{{ asset('storage/' . $review->khachHang->anh) }}" alt="User Avatar" class="review-avatar">
                                                                <div class="review-info">
                                                                    <strong class="review-nickname">{{ $review->khachHang->ten_khach_hang }}</strong>
                                                                    <span class="review-date">{{ $review->ngay_binh_luan }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="review-body">
                                                                <p class="review-summary">{{ $review->summary }}</p>
                                                                <p class="review-content">{{ $review->noi_dung }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>

                                            <!-- Form bình luận -->
                                            <div class="product-rev-form">
                                                <h3>Thêm bình luận</h3>
                                                <form action="{{ route('reviews.store') }}" method="POST" class="form-horizontal product-form">
                                                    @csrf
                                                    <input type="hidden" name="san_pham_id" value="{{ $sanpham->id }}">
                                                    <div class="form-group">
                                                        <label for="review">Nội dung</label>
                                                        <textarea id="review" name="review" class="form-control" rows="4" required></textarea>
                                                    </div>
                                                    <div class="form-group form-group-button">
                                                        <button class="btn custom-button" type="submit">Gửi bình luận</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>









                                <div class="tab-pane" id="product-tag">
                                    <h2>Other people marked this product with these tags:</h2>
                                    <p class="product-action">
                                        <a href="https://bootexperts.com/">Laptop </a> <span>(1)</span>
                                    </p>
                                    <form action="#" class="product-form">
                                        <label>Add Your Tags:</label>
                                        <input type="text" class="form-control" required="required">
                                        <button class="btn custom-button" value="submit">Add Tags</button>
                                    </form>
                                    <p>Use spaces to separate tags. Use single quotes (') for phrases.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Single Description Tab -->
        <!-- Product Area -->
        <div class="product-area ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Product View Area -->
                        <div class="product-view-area fix">
                            <!-- Single Product Category Related Products -->
                            <div class="single-product-category related-products">
                                <!-- Product Category Title-->
                                <div class="head-title">
                                    <p>Sản Phẩm Liên Quan</p>
                                </div>
                                <!-- Product View -->
                                <div class="product-view">
                                    <!-- Product View Carousel -->
                                    <div id="related-products-carousel" class="owl-carousel custom-carousel">
                                        <!-- Single Product -->
                                        @foreach($listsp as $listsp)
                                            <div class="singel-product single-product-col">
                                                <div class="label-pro-sale">hot</div>
                                                <!-- Single Product Image -->
                                                <div class="single-product-img">
                                                    <a href="#"><img src="{{ asset('storage/' . $listsp->anh) }}"
                                                                     alt="product"></a>
                                                </div>
                                                <!-- Single Product Content -->
                                                <div class="single-product-content">
                                                    <h2 class="product-name"><a title="Proin lectus ipsum"
                                                                                href="{{ route('chitiet', $listsp->id) }}">{{ $listsp->ten_san_pham }}</a>
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
                                                            <span>{{ number_format($listsp->gia_sp, 0, ',', '.') }}vnđ</span>{{ number_format($listsp->gia_sp, 0, ',', '.') }}
                                                            vnđ</p>
                                                    </div>
                                                    <div class="product-actions">
                                                        <form action="{{ route('themgiohang') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="qty" value="1">
                                                            <input type="hidden" name="id" value="{{ $listsp->id }}">
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
                                                    </div>
                                                </div><!-- End Single Product Content -->
                                            </div><!-- End Single Product -->
                                        @endforeach
                                    </div><!-- End Product View Carousel -->
                                </div><!-- End Product View-->
                            </div><!-- End Single Product Category -->
                        </div><!-- End Product View Area -->
                    </div>
                </div>
            </div>
        </div><!-- End Product Area -->
    </div><!-- End Single Product details Area -->
    <!-- Brand Area -->
<style>
    .custom-text-style {
        text-transform: none; /* Đảm bảo chữ không in hoa */
    }
</style>

    <script>
        function adjustQuantity(amount) {
            var qty_el = document.getElementById('qty');
            var qty = parseInt(qty_el.value);

            if (!isNaN(qty)) {
                qty += amount;

                // Đảm bảo số lượng không nhỏ hơn 1
                if (qty < 1) qty = 1;

                qty_el.value = qty;
            }
        }

        // Đảm bảo giá trị không âm khi người dùng nhập
        document.getElementById('qty').addEventListener('input', function() {
            var qty = parseInt(this.value);

            if (isNaN(qty) || qty < 1) {
                this.value = 1; // Đặt lại giá trị nếu không phải số hoặc số âm
                alert('Số lượng phải lớn hơn hoặc bằng 1');
            }
        });
    </script>
    <style>/* Style for review list */
        /* Style for review list */
        .product-rev-list {
            margin-bottom: 30px;
        }

        /* Style for review form */
        .product-rev-form {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            margin-top: 30px;
        }

        .product-rev-form h3 {
            margin-bottom: 15px;
        }

        .product-form .form-group {
            margin-bottom: 10px;
        }

        .product-form .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .product-form .form-group input,
        .product-form .form-group textarea {
            width: 100%;
            border-radius: 4px;
            border: 1px solid #ccc;
            padding: 8px;
        }

        .product-form .form-group textarea {
            resize: vertical;
        }

        .product-form .form-group-button {
            text-align: right;
            margin-top: 10px;
        }

        .custom-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 16px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 4px;
        }

        .custom-button:hover {
            background-color: #0056b3;
        }

        .review-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        .review-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .review-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .review-info {
            flex: 1;
        }

        .review-nickname {
            font-weight: bold;
        }

        .review-date {
            color: #888;
            font-size: 0.9em;
        }

        .review-body {
            margin-top: 5px;
        }

        .review-summary {
            font-weight: bold;
        }

        .review-content {
            margin-top: 5px;
        }

    </style>

@endsection
