<aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
        APP NAME
    </div>
    <nav class="sidebar-nav">
        <ul>
            <li class="nav-item @if (request()->routeIs('dashboard')) active @endif">
                <a href="/" >Dashboard</a>
            </li>
            <li class="nav-item @if (request()->routeIs('file-manager') || request()->routeIs('file.open')) active @endif">
                <a href="{{route('file-manager')}}" >File Manager</a>
            </li>

        </ul>
    </nav>
</aside>
