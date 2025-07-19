<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        @include('common.sidebar')
        <main class="col-md-9 col-lg-10 main-content">
            <div class="container mt-5">
                @yield('content')
            </div>
            <div class="container mt-5">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

            </div>
        </main>
    </div>

</div>

<!-- Scripts -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
@yield('scripts')
</body>
</html>
