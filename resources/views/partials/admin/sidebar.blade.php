<!-- begin app-nabar -->
<aside class="app-navbar">
    <!-- begin sidebar-nav -->
    <div class="sidebar-nav scrollbar scroll_light">
        <ul class="metismenu " id="sidebarNav">
            <li class="{{  Route::is('admin.index') ? 'active' : ''  }}">
                <a href="{{ route('admin.index') }}" aria-expanded="false">
                    <i class="nav-icon ti ti-comment"></i>
                    <span class="nav-title">Dashboard</span>
                </a> 
            </li>
            <li class="nav-static-title">Users</li>
            <li class="{{  Route::is('admin.users') || Route::is('admin.unv.users') || Route::is('admin.b.users') || Route::is('admin.c.user') ? 'active' : ''  }}">
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Manage Users</span>
                </a>
                <ul aria-expanded="false">
                    <li class="{{  Route::is('admin.c.user') ? 'active' : ''  }}"> <a href='{{ route("admin.c.user") }}'>Create User</a> </li>
                    <li class="{{  Route::is('admin.users') ? 'active' : ''  }}"> <a href='{{ route("admin.users") }}'>Active Users</a> </li>
                    <li class="{{  Route::is('admin.unv.users') ? 'active' : ''  }}"> <a href='{{ route("admin.unv.users") }}'>Unverified Users</a> </li>
                    <li class="{{  Route::is('admin.b.users') ? 'active' : ''  }}"> <a href='{{ route("admin.b.users") }}'>Blocked Users</a> </li>
                </ul>
            </li>
            <li class="nav-static-title">Categories</li>
            <li class="{{  Route::is('admin.categories') ? 'active' : ''  }}">
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Manage Category</span>
                </a>
                <ul aria-expanded="false">
                    <li class="{{  Route::is('admin.categories') ? 'active' : ''  }}"> <a href='{{ route("admin.categories") }}'>All Categories</a> </li>
                </ul>
            </li>
            <li class="nav-static-title">Treads</li>
            <li class="{{  Route::is('admin.treads') ? 'active' : ''  }}">
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Manage Treads</span>
                </a>
                <ul aria-expanded="false">
                    <li class="{{  Route::is('admin.treads') ? 'active' : ''  }}"> <a href='{{ route("admin.treads") }}'>Create Tread</a> </li>
                    <li class="{{  Route::is('admin.treads') ? 'active' : ''  }}"> <a href='{{ route("admin.treads") }}'>All Treads</a> </li>
                    <li class="{{  Route::is('admin.treads') ? 'active' : ''  }}"> <a href='{{ route("admin.treads") }}'>Publish Treads</a> </li>
                    <li class="{{  Route::is('admin.treads') ? 'active' : ''  }}"> <a href='{{ route("admin.treads") }}'>Unpublish Treads</a> </li>
                </ul>
            </li>
            <li class="{{  Route::is('admin.setting') ? 'active' : ''  }}">
                <a href='{{ route("admin.setting") }}' aria-expanded="false">
                    <i class="nav-icon ti ti-comment"></i>
                    <span class="nav-title">Settings</span>
                </a> 
            </li>
            <li class="{{  Route::is('user.profile') ? 'active' : ''  }}">
                <a href='{{ route("user.profile") }}' aria-expanded="false">
                    <i class="nav-icon ti ti-comment"></i>
                    <span class="nav-title">Profile</span>
                </a> 
            </li>
        </ul>
    </div>
    <!-- end sidebar-nav -->
</aside>
<!-- end app-navbar -->