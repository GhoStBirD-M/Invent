<li class="sidebar-item {{ Route::currentRouteName() === 'dashboard.index' ? 'active' : '' }} ">
    <a href="{{ route('dashboard.index') }}" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
    </a>


</li>

<li class="sidebar-item  has-sub {{ in_array(Route::currentRouteName(), ['user.profile']) ? 'active' : '' }}">
    <a href="#" class='sidebar-link'>
        <i class="bi bi-person"></i>
        <span>Profile</span>
    </a>
    <ul class="submenu ">

        <li class="submenu-item {{ Route::currentRouteName() === 'user.profile' ? 'active' : '' }} ">
            <a href="{{ route('user.profile') }}" class="submenu-link">Edit Profile</a>
        </li>
    </ul>
</li>