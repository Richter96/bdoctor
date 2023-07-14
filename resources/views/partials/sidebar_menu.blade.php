{{-- 
    Per evidenziare l'elemento dellla side_bar selezionato
    Abbiamo usato str_starts_with anzichè un semplice "==" in modo che il nav-item rimanesse selezionato anche durante le CRUD quando l'url potrebbe cambiare leggermente
 --}}

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light collapse position-sticky pt-3">
    <ul class="nav flex-column">
        <li class="nav-item">
            {{-- VEDI IN ALTO --}}
            <a class="nav-link {{ str_starts_with(Route::currentRouteName(), 'dashboard') ? 'bg-dark' : '' }}" aria-current="page" href="{{ route('dashboard') }}">
                <i class="me-2 fa-solid fa-gauge-high"></i>
                {{ __('Dashboard') }}
            </a>
        </li>
        <!-- nav-item -->
        <li class="nav-item">
            {{-- VEDI IN ALTO --}}
            <a class="nav-link {{ str_starts_with(Route::currentRouteName(), 'doctor') ? 'bg-dark' : '' }}" aria-current="page" href="{{ route('doctor.show', $doctor) }}">
                <i class="me-2 fa-solid fa-user"></i>
                {{ __('MY Profile') }}
            </a>
        </li>
        <!-- nav-item -->
        <li class="nav-item">
            {{-- VEDI IN ALTO --}}
            <a class="nav-link {{ str_starts_with(Route::currentRouteName(), 'review.') ? 'bg-dark' : '' }}" href="{{ route('review.index') }}">
                <i class="me-2 fa-solid fa-book-open-reader"></i>
                {{ __('Reviews') }}
            </a>
        </li>
        <!-- nav-item -->
        <li class="nav-item">
            {{-- VEDI IN ALTO --}}
            <a class="nav-link {{ str_starts_with(Route::currentRouteName(), 'message') ? 'bg-dark' : '' }}" href="{{ route('message.index') }}">
                <i class="me-2 fa-solid fa-message"></i>
                {{ __('Messages') }}
            </a>
        </li>
        <!-- nav-item -->
        <li class="nav-item">
            {{-- VEDI IN ALTO --}}
            <a class="nav-link {{ str_starts_with(Route::currentRouteName(), 'statistic') ? 'bg-dark' : '' }}" href="{{ route('statistic.index') }}">
                <i class="me-2 fa-solid fa-chart-simple"></i>
                {{ __('Statistics') }}
            </a>
        </li>
        <!-- nav-item -->
    </ul>
</nav>
