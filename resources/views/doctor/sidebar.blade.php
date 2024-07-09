<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link"
                href="{{ route('doctor.dashboard') }}">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">Apps</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('doctor.attendance') }}">
                <i class="menu-icon mdi mdi-fingerprint"></i>
                <span class="menu-title">Attendance</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('doctor.appointment') }}">
                <i class="menu-icon mdi mdi-application-edit-outline"></i>
                <span class="menu-title">My Appointment</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('doctor.healthrecord') }}">
                <i class="menu-icon mdi mdi-clipboard-text-clock"></i>
                <span class="menu-title">History Diagnosis</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('doctor.message') }}">
                <i class="menu-icon mdi mdi-message-bulleted"></i>
                <span class="menu-title">My Message</span>
            </a>
        </li>
        <li class="nav-item nav-category">Account</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('doctor.profile') }}">
                <i class="menu-icon mdi mdi-account-circle"></i>
                <span class="menu-title">Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('doctor.setting') }}">
                <i class="menu-icon mdi mdi-cog"></i>
                <span class="menu-title">Setting</span>
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
