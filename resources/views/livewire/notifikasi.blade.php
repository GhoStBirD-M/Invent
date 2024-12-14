<div>
    <li class="nav-item dropdown me-3">
        <a class="nav-link active dropdown-toggle text-gray-600" href="#"
            data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
            <i class="bi bi-bell bi-sub fs-4"></i>
            <span class="badge badge-notification bg-danger">{{count($this->notifikasi())}}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end notification-dropdown"
            aria-labelledby="dropdownMenuButton">
            <li class="dropdown-header">
                <h6>Notifications</h6>
            </li>
            @foreach ($this->notifikasi() as $item)
            <li class="dropdown-item notification-item">
                <a class="d-flex align-items-center" href="#">
                    <div class="notification-icon bg-primary">
                        <i class="bi bi-cart-check"></i>
                    </div>
                    <div class="notification-text ms-4">
                        <p class="notification-title font-bold">{{ $item->nama }} Telah Di Tambahkan</p>
                        <p class="notification-subtitle font-thin text-sm">{{ $item->created_at }}</p>
                    </div>
                </a>
            </li>
                @endforeach
            <li>
                <p class="text-center py-2 mb-0" wire:click='update'>Read all</p>
            </li>
        </ul>
    </li>
</div>
