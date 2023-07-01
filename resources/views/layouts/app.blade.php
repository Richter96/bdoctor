<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('partials.head')

<body>
    <div id="app">
        @include('partials.navbar')

        <main class="">
            @yield('content')
        </main>
    </div>
</body>

</html>
