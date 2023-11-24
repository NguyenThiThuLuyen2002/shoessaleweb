<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="./index.html"><img src="template/client/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="active"><a href="./index.html">Trang chủ</a></li>
                        <li><a href="#">Danh mục</a>
                            <ul class="dropdown">
                                <li><a href="">Sandal</a></li>
                                <li><a href="">Sneaker</a></li>
                                <li><a href="">High Heels</a></li>
                                                      
                            </ul>
                        </li>
                        <li><a href="">Blog</a></li>
                        <li><a href="">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option">
                    {{-- <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
                    <a href="#"><img src="{{ asset('template/client/img/icon/login.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('template/client/img/icon/cart.png') }}" alt=""> <span>0</span></a> 
                    <div class="price">$0.00</div> --}}
                    <a href="{{ route('form_login') }}" class="primary-btn">ĐĂNG NHẬP</a>
                  
                  
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>