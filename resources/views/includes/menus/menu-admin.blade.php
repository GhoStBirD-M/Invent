<li class="sidebar-item {{ Route::currentRouteName() === 'dashboard.index' ? 'active' : '' }} ">
    <a href="{{ route('dashboard.index') }}" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
    </a>


</li>

<li
    class="sidebar-item  has-sub {{ in_array(Route::currentRouteName(), ['invent.barang', 'invent.kategori', 'invent.gudang', 'invent.pemasok']) ? 'active' : '' }}">
    <a href="#" class='sidebar-link'>
        <i class="bi bi-stack"></i>
        <span>Invent</span>
    </a>

    <ul class="submenu ">

        <li class="submenu-item {{ Route::currentRouteName() === 'invent.barang' ? 'active' : '' }} ">
            <a href="{{ route('invent.barang') }}" class="submenu-link">Barang</a>

        </li>

        <li class="submenu-item {{ Route::currentRouteName() === 'invent.kategori' ? 'active' : '' }}">
            <a href="{{ route('invent.kategori') }}" class="submenu-link">Kategori</a>

        </li>

        <li class="submenu-item {{ Route::currentRouteName() === 'invent.gudang' ? 'active' : '' }}">
            <a href="{{ route('invent.gudang') }}" class="submenu-link">Gudang</a>

        </li>

        <li class="submenu-item  {{ Route::currentRouteName() === 'invent.pemasok' ? 'active' : '' }}">
            <a href="{{ route('invent.pemasok') }}" class="submenu-link">Pemasok</a>

        </li>
    </ul>


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
