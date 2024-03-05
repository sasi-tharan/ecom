<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/users') }}">View Users</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#roles-permissions" aria-expanded="false"
                aria-controls="roles-permissions">
                <i class="mdi mdi-account-key menu-icon"></i>
                <span class="menu-title">Roles & Permissions</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="roles-permissions">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/permissions') }}">
                            <i class="mdi mdi-shield-lock menu-icon"></i>
                            Manage Permissions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/roles') }}">
                            <i class="mdi mdi-account-key menu-icon"></i>
                            Manage Roles
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#department-groups" aria-expanded="false"
                aria-controls="department-groups">
                <i class="mdi mdi-view-list menu-icon"></i>
                <span class="menu-title">Department & Groups</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="department-groups">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/departments') }}">Manage Departments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/groups') }}">Manage Group</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/subgroups') }}">Manage Sub Group</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.products.index') }}">
                <i class="mdi mdi-cart menu-icon"></i>
                <span class="menu-title">Products</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.sliders.index') }}">
                <i class="mdi mdi-view-carousel menu-icon"></i>
                <span class="menu-title">Home Slider</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.banners.index') }}">
                <i class="mdi mdi-image menu-icon"></i>
                <span class="menu-title">Banner</span>
            </a>
        </li>

    </ul>
</nav>
