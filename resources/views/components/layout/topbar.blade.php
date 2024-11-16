<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <div class="logo">
                    <span class="logo-sm">
                        <img src="{{ url('/images/logo_white.png') }}" alt="" height="25">
                    </span>
                    <span class="logo-lg">
                        Eilinger Stiftung
                    </span>
                </div>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="bi bi-list"></i>
            </button>

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block mt-4">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ strtoupper(app()->getLocale()) }}
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                    @foreach (config('app.languages') as $langLocale => $langName)
                        <a class="dropdown-item"
                            href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }}
                            ({{ $langName }})</a>
                    @endforeach
                </ul>
            </div>

            <livewire:message-notification />

            <div class="d-inline-block">
                <button type="button" class="btn header-item waves-effect">
                    <a class="nav-link" href="{{ route('index', app()->getLocale()) }}" role="button"
                        aria-expanded="false">Home</a>
                </button>
            </div>

            <div class="d-inline-block">
                <button type="button" class="btn header-item waves-effect">
                    <a class="nav-link" href="{{ route('logout', app()->getLocale()) }}">Logout</a>
                </button>
            </div>

            <div class="d-inline-block">
                <button type="button" class="btn header-item waves-effect">
                    <a class="nav-link" href="#" role="button" aria-expanded="false">
                        {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                    </a>
                </button>

            </div>

        </div>
    </div>
</header>
