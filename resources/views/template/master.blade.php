<html lang="en">
<head>
    <!-- yield masukin data, include input data -->
    <title>@yield('title')</title>
    <!-- punya blade -->
    @include('template.header')
</head>
<body class="hold-transition sidebar-mini layout-fixed">

    @include('template.navbar')
    @include('template.sidebar')
    @yield('content')
    @include('template.footer')
    
</body>
</html>