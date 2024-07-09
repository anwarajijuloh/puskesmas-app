<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link"
                href="{{ route('admin.dashboard') }}">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">Apps</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.doctor-request') }}">
                <i class="menu-icon mdi mdi-doctor"></i>
                <span class="menu-title">Doctor Request</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="docs/documentation.html">
                <i class="menu-icon mdi mdi-human-queue"></i>
                <span class="menu-title">Patient</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.appointment') }}">
                <i class="menu-icon mdi mdi-application-edit-outline"></i>
                <span class="menu-title">Appointment</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="docs/documentation.html">
                <i class="menu-icon mdi mdi-clipboard-text-clock"></i>
                <span class="menu-title">History Diagnosis</span>
            </a>
        </li>
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="nav-link" type="submit">
                    <i class="menu-icon mdi mdi-power"></i>
                    <span class="menu-title">Log Out</span>
                </button>
            </form>
        </li>
    </ul>
</nav>
