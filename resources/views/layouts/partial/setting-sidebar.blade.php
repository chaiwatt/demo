<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="#" class="d-block">{{Auth::user()->name}} {{Auth::user()->lastname}}</a>
        </div>
    </div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('setting')}}" class="nav-link {{ request()->is('setting') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        แดชบอร์ด
                    </p>
                </a>
            </li>
            <li class="nav-item nav-item {{ request()->is('setting/general*') ? 'menu-open' : '' }}">
                <a href="" class="nav-link {{ request()->is('setting/general*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-sitemap"></i>
                    <p>
                        ทั่วไป
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview"
                    style="{{ request()->is('setting/general/role*') ? '' : 'display: none;' }}">
                    <li class="nav-item">
                        <a href="{{route('setting.general.role')}}"
                            class="nav-link {{ request()->is('setting/general/role*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>บทบาท</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>