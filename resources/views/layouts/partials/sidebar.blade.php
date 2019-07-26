<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <li class="{{ Request::is('usuarios*') ? 'active' : '' }} nav-item">
            <a href="{!! route('users.index') !!}" class="nav-link">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span >Usuarios</span>
            </a>
        </li>

        <li class="{{ Request::is('ediciones*') ? 'active' : '' }} nav-item">
            <a href="{!! route('editions.index') !!}" class="nav-link">
                <i class="mdi mdi-receipt menu-icon"></i>
                <span class="menu-title">Ediciones</span>
            </a>
        </li>

    </ul>
</nav>