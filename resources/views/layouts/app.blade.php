<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Leave Manage - @yield('title')</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/toastify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body>
    @if (!Route::is('login') && !Route::is('register'))
        @include('layouts.partials.navbar')
    @endif

    @if (!Route::is('login') && !Route::is('register'))
        <div class="container-fluid">
            <div class="main_row row">
                @include('layouts.partials.sidebar')
                <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    {{-- <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">@yield('title')</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group mr-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                                <span data-feather="calendar"></span>
                                This week
                            </button>
                        </div>
                    </div> --}}
                    @yield('content')
                </main>
            </div>
        </div>
    @else
        @yield('content')
    @endif

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/toastify.js') }}"></script>
    @if (Session::has('success'))
        <span id="msg" data-msg="{{ Session::get('success') }}"></span>
        <script>
            let msg = document.getElementById('msg').dataset.msg;
            Toastify({
                gravity: "bottom",
                position: "center",
                text: msg,
                className: "mb-5",
                style: {
                    background: "green"
                },
                // duration: 3000

            }).showToast();
        </script>
    @endif
    @if (Session::has('error'))
        <span id="msg" data-msg="{{ Session::get('error') }}"></span>
        <script>
            let msg = document.getElementById('msg').dataset.msg;
            Toastify({
                gravity: "bottom",
                position: "center",
                text: msg,
                className: "mb-5",
                style: {
                    background: "red",
                },
                // duration: 3000

            }).showToast();
        </script>
    @endif
</body>

</html>
