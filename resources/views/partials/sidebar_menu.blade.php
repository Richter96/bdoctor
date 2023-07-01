<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light collapse position-sticky pt-3">
    <ul class="nav flex-column">
        <li class="nav-item">
            MY Profile
            {{--  <a class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-dark' : '' }}" aria-current="page" href="{{ route('admin.dashboard') }}">
                <i class="fa-solid fa-gauge me-1"></i>
                {{ __('Dashboard') }}
            </a> --}}
        </li>
        <!-- nav-item -->
        <li class="nav-item">
            Reviews
            {{-- <a class="nav-link {{ Route::currentRouteName() == 'admin.projects.index' ? 'bg-dark' : '' }}" href="{{ route('admin.projects.index') }}">
                <i class="fa-solid fa-thumbtack me-1"></i>
                {{ __('Projects') }}
            </a> --}}
        </li>
        <!-- nav-item -->
        <li class="nav-item">
            Messages
            {{-- <a class="nav-link {{ Route::currentRouteName() == 'admin.types.index' ? 'bg-dark' : '' }}" href="{{ route('admin.types.index') }}">
                <i class="fa-solid fa-bookmark me-1"></i>
                {{ __('Type') }}
            </a> --}}
        </li>
        <!-- nav-item -->
        <li class="nav-item">
            Statistics
            {{-- <a class="nav-link {{ Route::currentRouteName() == 'admin.technologies.index' ? 'bg-dark' : '' }}" href="{{ route('admin.technologies.index') }}">
                <i class="fa-solid fa-bookmark me-1"></i>
                {{ __('Technologies') }}
            </a> --}}
        </li>
        <!-- nav-item -->
    </ul>
</nav>
