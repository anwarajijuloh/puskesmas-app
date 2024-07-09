<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('patient.dashboard') }}">
                <i class="mdi mdi-view-dashboard menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">Apps</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('patient.queue') }}">
                <i class="menu-icon mdi mdi-human-queue"></i>
                <span class="menu-title">Queue</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('patient.appointment') }}">
                <i class="menu-icon mdi mdi-application-edit-outline"></i>
                <span class="menu-title">Appointment</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('patient.healthrecord') }}">
                <i class="menu-icon mdi mdi-account-heart"></i>
                <span class="menu-title">Health Record</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('patient.message') }}">
                <i class="menu-icon mdi mdi-message-bulleted"></i>
                <span class="menu-title">Message</span>
            </a>
        </li>
        <li class="nav-item nav-category">Account</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('patient.profile') }}">
                <i class="menu-icon mdi mdi-account-circle"></i>
                <span class="menu-title">Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('patient.setting') }}">
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
