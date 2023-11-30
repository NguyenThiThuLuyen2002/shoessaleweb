<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="/"><img src="template/client/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="active"><a href="/">Trang chủ</a></li>
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
                    @if (session('name'))
                    @php
                        $user = \App\Models\User::where('name', session('name'))->first();
                    @endphp
                    <div class="nav-item dropdown">
                        <a href="#" style="height: 100%;color: #e53637;" class="nav-link dropdown-toggle"
                            onclick="toggleDropdown()" data-bs-toggle="dropdown">  
                            <img src="{{ $user->avt }}" alt="" class="rounded-circle"
                            style=" width: 35px;height: 35px;">
                            <!--return acc_name-->                        
                            {{ $user->name }} 
                        </a>
                        <!--dropdownlist-->
                        <div id="userDropdown" class="dropdown-menu">
                            <a href="" class="dropdown-item"> Thông
                                tin cá nhân</a>
                                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-right-from-bracket"></i> Đăng xuất
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                                    @csrf
                                </form>
                        </div>
                    </div>
                @else
                    <a style="margin-left: 20px;color: inherit;" href="{{ route('login') }}">Đăng nhập</a>
                @endif
    
                </div>
            </div>
        </div>   
    </div>
</header>
<script src="template/client/js/header-ddl.js"></script>