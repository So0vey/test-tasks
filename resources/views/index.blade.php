<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <div class="container text-center mt-2 mb-2">
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" href="{{route('welcome')}}">Первая страница</a>
                </div>
                <div class="col">
                    <a class="btn btn-secondary" href="{{route('ss')}}">Вторая страница</a>
                </div>
                <div class="col">
                    <a class="btn btn-danger" href="{{route('sss')}}">Насрать всем в почту</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="container text-center">
            @yield('content')
        </div>
        <div class="w-100" style="background: #0a0a0a">
            <div class="container pt-2 pb-2" style="color: white">
                In lacus dui, cursus ac arcu at, facilisis blandit sem. Etiam in dolor at odio accumsan posuere imperdiet vitae turpis. Maecenas id libero nec tellus eleifend gravida eu luctus arcu. Nullam pellentesque porta risus. Vestibulum nec turpis pellentesque, facilisis lectus sed, sagittis risus. Maecenas at arcu sed augue ultrices vulputate ut ut urna. Ut non urna sit amet metus porttitor vehicula. Donec consectetur nisi sit amet dolor tempor, nec auctor orci maximus. Sed aliquam facilisis eros in imperdiet. Nam vitae mauris ac risus iaculis sagittis. Curabitur sit amet dignissim ex.
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    </body>
</html>
