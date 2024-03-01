 <!-- partial:partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">
         <li class="nav-item">
             <a class="nav-link" href="">
                 <i class="mdi mdi-home menu-icon"></i>
                 <span class="menu-title">Dashboard</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                 aria-controls="ui-basic">
                 <i class="mdi mdi-account-multiple menu-icon"></i>
                 <span class="menu-title">users</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="ui-basic">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="{{ url('admin/users') }}">View Users</a></li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-bs-toggle="collapse" href="#roles-permissions" aria-expanded="false"
                 aria-controls="roles-permissions">
                 <i class="mdi mdi-lock menu-icon"></i>
                 <span class="menu-title">Roles & Permissions</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="roles-permissions">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{ url('admin/permissions') }}">Manage Permissions</a>
                     </li>
                 </ul>
             </div>
             <div class="collapse" id="roles-permissions">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{ url('admin/roles') }}">Manage Roles</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="{{ url('admin/settings') }}">
                 <i class="mdi mdi-settings menu-icon"></i>
                 <span class="menu-title">Website Setting</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="{{ url('admin/sliders') }}">
                 <i class="mdi mdi-settings menu-icon"></i>
                 <span class="menu-title">Sliders</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="{{ url('admin/banners') }}">
                 <i class="mdi mdi-settings menu-icon"></i>
                 <span class="menu-title">Banners</span>
             </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#roles-permissions" aria-expanded="false"
                aria-controls="roles-permissions">
                <i class="mdi mdi-lock menu-icon"></i>
                <span class="menu-title">Department & Groups</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="roles-permissions">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/departments') }}">Manage Departments</a>
                    </li>
                </ul>
            </div>
            <div class="collapse" id="roles-permissions">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/groups') }}">Manage Group</a>
                    </li>
                </ul>
            </div>
            <div class="collapse" id="roles-permissions">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin/subgroups') }}">Manage Sub Group</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/products') }}">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Products</span>
            </a>
        </li>
     </ul>
 </nav>
