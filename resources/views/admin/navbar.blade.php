<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
        </div>
        <div>
            <a class="navbar-brand brand-logo" href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('assets') }}/images/pusk-logo.svg" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="index.html">
                <img src="{{ asset('assets') }}/images/mini-logo.svg" alt="logo" />
            </a>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
            <li class="nav-item fw-semibold d-none d-lg-block ms-0">
                <h1 class="welcome-text">Selamat datang, <span class="text-black fw-bold">{{ $user->name }}</span>
                </h1>
                <h3 class="welcome-sub-text">Kelola reques dokter dan pasien. </h3>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle"
                        src="{{ $user->doctor && $user->doctor->photo ? asset($user->doctor->photo) : asset('assets/images/blank-profile.jpg') }}"
                        alt="Profile image"> </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <img class="img-md rounded-circle"
                            src="{{ $user->doctor && $user->doctor->photo ? asset($user->doctor->photo) : asset('assets/images/blank-profile.jpg') }}"
                            alt="Profile image" width="50px">
                        <p class="mb-1 mt-3 fw-semibold">{{ $user->name }}</p>
                        <p class="fw-light text-muted mb-0">{{ $user->email }}</p>
                    </div>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="dropdown-item" type="submit"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign
                            Out</button>
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
