<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('partials.head')

<body>
    <div id="app">
        @include('partials.navbar')

        <div class="container-fluid vh-100 mb-3">
            <div class="row h-100">

                @include('partials.sidebar_menu')

                <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
</body>

</html>
