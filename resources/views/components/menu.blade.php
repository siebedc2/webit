<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="px-0 navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="/">Veilinghuis</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Register</a>
                        </li>
                        @endguest
                        @auth
                        @if(Auth::user()->role = "user")
                        <li class="nav-item">
                            <a class="nav-link" href="/userdashboard">Dashboard</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="/admindashboard">Dashboard</a>
                        </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display:none;">{{ csrf_field() }}</form>
                        </li>
                        @endauth
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>