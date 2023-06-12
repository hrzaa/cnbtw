<!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <img src="/vendor/img/logo1.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ms-auto py-0 pe-4">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('culinary*')) ? 'active' : '' }}" href="{{ route('culinary') }}">@lang('lang.nav kuliner') </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('event*')) ? 'active' : '' }}" href="{{ route('event') }}">@lang('lang.nav events')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('gallery')) ? 'active' : '' }}" href="{{ route('gallery') }}">@lang('lang.nav gallery')</a>
                </li>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <div class="dropdown-menu m-0">
                        @foreach (config('app.available_locales') as $locale)
                            <a href="{{ request()->url() }}?language={{ $locale }}"
                            class="dropdown-item @if (app()->getLocale() == $locale) active @endif">
                                {{ strtoupper($locale) }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </ul>
            @guest

                <a class="btn btn-primary py-2 px-4" href="{{ route('login') }}">{{ __('Login') }}</a>
            @else
            <img alt="image" src="{{ url('assets/img/avatar/avatar-1.png') }}" style="max-height: 40px" class="rounded-circle mr-1">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> {{ Auth::user()->name }}</a>
                <div class="dropdown-menu m-0">
                    <a href="{{ route('admin-dashboard') }}" class="dropdown-item">Dashboard</a>
                    <a href="" class="dropdown-item">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            @endguest
        </div>
    </nav>
</div>
<!-- Navbar & Hero End -->
