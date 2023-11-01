<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.layouts.includes.init.head')
</head>

<body>

@include('frontend.layouts.includes.header')

@yield('wrapper')

@include('frontend.layouts.includes.overall.footer')

@include('frontend.layouts.includes.parsers.preloader')

@include('frontend.layouts.includes.init.scripts')

</body>

</html>
