<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('scoreboard') }}">
            <img src="https://e7.pngegg.com/pngimages/569/664/png-clipart-green-and-white-game-application-character-space-invaders-arcade-game-video-game-pac-man-space-invaders-game-angle-thumbnail.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
            {{ config('app.name', 'Laravel') }}
        </a>

        <!-- Hamburger Menu for Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('scoreboard') ? 'active' : '' }}" href="{{ route('scoreboard') }}">{{ __('Scoreboard') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('tasks') ? 'active' : '' }}" href="{{ route('tasks') }}">{{ __('Tasks') }}</a>
                </li>
            </ul>

            <!-- Right-aligned Links (e.g., Login/Logout) -->
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('Menu') }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">{{ __('Log Out') }}</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
</nav>