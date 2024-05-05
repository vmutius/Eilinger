
<header id="header" class="fixed-top ">
    <nav class="navbar navbar-top fixed-top navbar-expand">
    <div class="container">
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                @livewire('message-notification')

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach (config('app.languages') as $langLocale => $langName)
                            <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                        @endforeach
                    </ul>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('index', app()->getLocale()) }}">Home</a></li>
                        <li><a class="nav-link" href="{{ route('logout', app()->getLocale()) }}">Logout</a></li>
                    </ul>
                </li>


            </ul>
        </div>
    </div>
</nav>
</header>
