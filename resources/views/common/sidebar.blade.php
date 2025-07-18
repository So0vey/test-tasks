<div class="col-md-3 col-lg-2 d-md-block collapse text-white bg-dark" style="height: 100vh">
    <div class="position-sticky pt-3">
        <h4 class="text-center">Содержимое</h4>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a class="nav-link @yield('mainPageState')" href="{{route('mainPage')}}">Главная</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @yield('warehousesPageState')" href="{{route('warehousesPage')}}">Список складов</a>
            </li>
        </ul>
    </div>
</div>
