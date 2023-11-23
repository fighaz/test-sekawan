<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">##</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (session('level') == 'admin')
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('admin') }}">Dashboard</a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('kendaraan') }}">Kendaraan</a>
                </li>
                @if (session('level') == 'user')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('user') }}">Peminjaman</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/peminjaman') }}">Peminjaman</a>
                    </li>
                @endif

            </ul>
            <ul class="navbar-nav ms-auto mb-2">
                @if (!empty(session('id')))
                    <li class="nav-text ">
                        <p>Welcome,{{ session('username') }}</p>
                    </li>
                    <li class="nav-item">
                        <a href="/logout" class="nav-link "><i class="bi bi-box-arrow-in-left"></i>Logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/" class="nav-link "><i class="bi bi-box-arrow-in-right"></i>Login</a>
                    </li>
            </ul>
            @endif
            {{-- <span class="navbar-text">
                <a href="">Login</a>
            </span> --}}
        </div>
    </div>
</nav>
