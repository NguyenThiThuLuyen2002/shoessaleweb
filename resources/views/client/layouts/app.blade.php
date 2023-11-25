<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('template/client/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/client/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/client/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/client/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/client/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/client/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/client/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/client/css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Header Section Begin -->
    @include('client.layouts.header')
    <!-- Header Section End -->

    @yield('content')

    <!-- Footer Section Begin -->
    @include('client.layouts.footer')
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->
    @include('client.layouts.javascript')
</body>

</html>