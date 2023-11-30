@extends('client.layouts.app')
@section('title', 'Trang chủ')
@section('content')

<!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel">
        <div class="hero__items set-bg" data-setbg="{{ asset('template/client/img/hero/hero-1.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h6>Bộ sưu tập mới nhất</h6>
                            <h2>BST Thu Đông 2023</h2>
                            <p>Bộ sưu tập giày sandal lấy cảm hứng từ hoa hướng dương là hành trình kỳ diệu giữa thế giới thời trang và thiên nhiên. Mỗi đôi sandal đều là một tác phẩm nghệ thuật, kết hợp với họa tiết hoa lãng mạn, tạo nên sự tinh tế và quyến rũ </p>
                            <a href="#" class="primary-btn">Mua ngay</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero__items set-bg" data-setbg="{{ asset('template/client/img/hero/hero-2.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h6>Bộ sưu tập mới nhất</h6>
                            <h2>BST Thu Đông 2023</h2>
                            <p>Bộ sưu tập giày sandal lấy cảm hứng từ hoa hướng dương là hành trình kỳ diệu giữa thế giới thời trang và thiên nhiên. Mỗi đôi sandal đều là một tác phẩm nghệ thuật, kết hợp với họa tiết hoa lãng mạn, tạo nên sự tinh tế và quyến rũ </p>
                            <a href="#" class="primary-btn">Mua ngay</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Banner Section Begin -->
<section class="banner spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 offset-lg-4">
                <div class="banner__item">
                    <div class="banner__item__pic">
                        <img src="{{ asset('template/client/img/banner/banner-1.jpg') }}" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2>Sandal</h2>
                        <a href="#">Mua ngay</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="banner__item banner__item--middle">
                    <div class="banner__item__pic">
                        <img src="{{ asset('template/client/img/banner/banner-2.jpg') }}" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2>High Heels</h2>
                        <a href="#">Mua ngay</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="banner__item banner__item--last">
                    <div class="banner__item__pic">
                        <img src="{{ asset('template/client/img/banner/banner-3.jpg') }}" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2>Boots</h2>
                        <a href="#"> Mua ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Product Section Begin -->

<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li class="active" data-filter=".best-sellers">Best Sellers</li>
                    <li data-filter=".new-arrivals">New Arrivals</li>
                    <li data-filter=".hot-sales">Hot Sales</li>
                </ul>
            </div>
        </div>
        <div class="row product__filter">
            @foreach ($products as $product)
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix best-sellers">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="/upload/products/{{ $product->avt }}">
                        <span class="label">New</span>
                        <ul class="product__hover">
                            <li><a href="#"><img src="{{ asset('template/client/img/icon/heart.png') }}" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>{{ $product->name_product }}</h6>
                        <a href="/product-detail/{{ $product->id }}">View detail</a>
                        <h5>{{ number_format($product->price, 0, '.', '.') }} VND</h5>
                    </div>
                </div>
            </div>
            @endforeach
           
        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Categories Section Begin -->
<section class="categories spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="categories__text">
                    <h2>Clothings Hot <br /> <span>Shoe Collection</span> <br /> Accessories</h2>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="categories__hot__deal">
                    <img src="{{ asset('template/client/img/product-sale.png') }}" alt="">
                    <div class="hot__deal__sticker">
                        <span>Sale Of</span>
                        <h5>$29.99</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1">
                <div class="categories__deal__countdown">
                    <span>Deal Of The Week</span>
                    <h2>Multi-pocket Chest Bag Black</h2>
                    <div class="categories__deal__countdown__timer" id="countdown">
                        <div class="cd-item">
                            <span>3</span>
                            <p>Days</p>
                        </div>
                        <div class="cd-item">
                            <span>1</span>
                            <p>Hours</p>
                        </div>
                        <div class="cd-item">
                            <span>50</span>
                            <p>Minutes</p>
                        </div>
                        <div class="cd-item">
                            <span>18</span>
                            <p>Seconds</p>
                        </div>
                    </div>
                    <a href="#" class="primary-btn">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

@endsection