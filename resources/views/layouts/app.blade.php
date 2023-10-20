<!doctype html>
<html lang="en">
<head>

    @include('layouts.head')

</head>

<body>

<div id="app">

{{--    @include('layouts.header')--}}

    @yield('content')

    @include('layouts.footer')

</div>

@include('layouts.scripts')


</body>
</html>
