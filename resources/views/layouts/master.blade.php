<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

      @include('layouts.main-css')
</head>

<body>
    @include('layouts.nav')

@yield('content')

@include('layouts.footer')
    <!-- link that opens popup -->
    @include('layouts.main-script')
</body>

</html>


