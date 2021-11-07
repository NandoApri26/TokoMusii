<html lang="en">
<head>
    <!-- yield masukin data, include input data -->
    <title>@yield('title')</title>
    <!-- punya blade -->
    @include('frontend.header')
</head>
<body>

    @include('frontend.navbar')
    @yield('content')
    @include('frontend.footer')
    
</body>
</html>