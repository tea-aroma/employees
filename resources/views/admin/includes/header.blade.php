<header class="header header--style-default">

    <div class="header__column">
        <svg width="15px" height="11px" class="header__icon">
            <use xlink:href="{{ asset('assets/icons/sprite.svg') }}#user-location-fill"></use>
        </svg>

        <h1 class="header__heading">Employees</h1>
    </div>

    <ul class="menu menu--style-default menu--type-default">

        <li class="menu__item {{ \Illuminate\Support\Facades\Route::currentRouteName() !== 'admin.home.index' ?: 'active' }}">
            <a href="{{ route('admin.home.index') }}" class="menu__link">List schedules</a>
        </li>

        <li class="menu__item {{ \Illuminate\Support\Facades\Route::currentRouteName() !== 'admin.home.schedule' ?: 'active' }}">
            <a href="{{ route('admin.home.schedule') }}" class="menu__link">Schedule</a>
        </li>

    </ul>

</header>
