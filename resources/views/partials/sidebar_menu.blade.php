{{--
    Per evidenziare l'elemento dellla side_bar selezionato
    Abbiamo usato str_starts_with anzichè un semplice "==" in modo che il nav-item rimanesse selezionato anche durante le CRUD quando l'url potrebbe cambiare leggermente
 --}}

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg_green_light collapse position-sticky pt-3">
    <ul class="nav flex-column">
        <li class="nav-item">
            {{-- VEDI IN ALTO --}}
            <a class="text-white nav-link {{ str_starts_with(Route::currentRouteName(), 'dashboard') ? 'bg_gold' : '' }}" aria-current="page" href="{{ route('dashboard') }}">
                <i class="me-2 fa-solid fa-gauge-high bg_white"></i>
                {{ __('Dashboard') }}
            </a>
        </li>
        <!-- nav-item -->
        <li class="nav-item">
            {{-- VEDI IN ALTO --}}
            <a class="text-white nav-link {{ str_starts_with(Route::currentRouteName(), 'doctor') ? 'bg_gold' : '' }}" aria-current="page" href="{{ route('doctor.show', $doctor) }}">
                <i class="me-2 fa-solid fa-user bg_white"></i>
                {{ __('MY Profile') }}
            </a>
        </li>
        <!-- nav-item -->
        <li class="nav-item">
            {{-- VEDI IN ALTO --}}
            <a class="text-white nav-link {{ str_starts_with(Route::currentRouteName(), 'review.') ? 'bg_gold' : '' }}" href="{{ route('review.index') }}">
                <i class="me-2 fa-solid fa-book-open-reader bg_white"></i>
                {{ __('Reviews') }}
            </a>
        </li>
        <!-- nav-item -->
        <li class="nav-item">
            {{-- VEDI IN ALTO --}}
            <a class="text-white nav-link {{ str_starts_with(Route::currentRouteName(), 'message') ? 'bg_gold' : '' }}" href="{{ route('message.index') }}">
                <i class="me-2 fa-solid fa-message bg_white"></i>
                {{ __('Messages') }}
            </a>
        </li>
        <!-- nav-item -->
        <li class="nav-item">
            {{-- VEDI IN ALTO --}}
            <a class="text-white nav-link {{ str_starts_with(Route::currentRouteName(), 'statistic') ? 'bg_gold' : '' }}" href="{{ route('statistic.index') }}">
                <i class="me-2 fa-solid fa-chart-simple bg_white"></i>
                {{ __('Statistics') }}
            </a>
        </li>
        <!-- nav-item -->
    </ul>
</nav>

<style lang="scss">
    .bg_green_light {
        background-color: #11BF59;
    }

    .bg_white {
        color: white;
    }

    .bg_gold {
        background-color: #e6c200;
    }

</style>
