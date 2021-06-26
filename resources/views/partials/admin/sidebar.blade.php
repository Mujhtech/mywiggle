<!-- begin app-nabar -->
<aside class="app-navbar">
    <!-- begin sidebar-nav -->
    <div class="sidebar-nav scrollbar scroll_light">
        <ul class="metismenu " id="sidebarNav">
            <li class="{{  Route::is('admin.index') ? 'active' : ''  }}">
                <a href="{{ route('admin.index') }}" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Dashboard</span>
                </a> 
            </li>
            <li class="nav-static-title">Ads</li>
            <li class="{{  Route::is('admin.ads') || Route::is('admin.c.ad') ? 'active' : ''  }}">
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Manage Ads</span>
                </a>
                <ul aria-expanded="false">
                    <li class="{{  Route::is('admin.c.ad') ? 'active' : ''  }}"> <a href='{{ route("admin.c.ad") }}'>Create Ad</a> </li>
                    <li class="{{  Route::is('admin.ads') ? 'active' : ''  }}"> <a href='{{ route("admin.ads") }}'>All Ads</a> </li>
                </ul>
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
            <li class="{{  Route::is('admin.categories') || Route::is('admin.c.category') ? 'active' : ''  }}">
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Manage Category</span>
                </a>
                <ul aria-expanded="false">
                    <li class="{{  Route::is('admin.c.category') ? 'active' : ''  }}"> <a href='{{ route("admin.c.category") }}'>Create new category</a> </li>
                    <li class="{{  Route::is('admin.categories') ? 'active' : ''  }}"> <a href='{{ route("admin.categories") }}'>All Categories</a> </li>
                </ul>
            </li>
            <li class="nav-static-title">Treads</li>
            <li class="{{  Route::is('admin.treads') || Route::is('admin.unp.treads') || Route::is('admin.p.treads') || Route::is('admin.c.tread') ? 'active' : ''  }}">
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Manage Treads</span>
                </a>
                <ul aria-expanded="false">
                    <li class="{{  Route::is('admin.c.tread') ? 'active' : ''  }}"> <a href='{{ route("admin.c.tread") }}'>Create Tread</a> </li>
                    <li class="{{  Route::is('admin.treads') ? 'active' : ''  }}"> <a href='{{ route("admin.treads") }}'>All Treads</a> </li>
                    <li class="{{  Route::is('admin.p.treads') ? 'active' : ''  }}"> <a href='{{ route("admin.p.treads") }}'>Publish Treads</a> </li>
                    <li class="{{  Route::is('admin.unp.treads') ? 'active' : ''  }}"> <a href='{{ route("admin.unp.treads") }}'>Unpublish Treads</a> </li>
                </ul>
            </li>
            <li class="nav-static-title">Pages</li>
            <li class="{{  Route::is('admin.pages') || Route::is('admin.c.page') ? 'active' : ''  }}">
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Manage Pages</span>
                </a>
                <ul aria-expanded="false">
                    <li class="{{  Route::is('admin.c.page') ? 'active' : ''  }}"> <a href='{{ route("admin.c.page") }}'>Create Page</a> </li>
                    <li class="{{  Route::is('admin.pages') ? 'active' : ''  }}"> <a href='{{ route("admin.pages") }}'>All Pages</a> </li>
                </ul>
            </li>
            <li class="nav-static-title">History</li>
            <li class="{{  Route::is('admin.payments') || Route::is('admin.t.history') || Route::is('admin.l.history') || Route::is('admin.earnings') ? 'active' : ''  }}">
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Manage History</span>
                </a>
                <ul aria-expanded="false">
                    <li class="{{  Route::is('admin.payments') ? 'active' : ''  }}"> <a href='{{ route("admin.payments") }}'>Payment</a> </li>
                    <li class="{{  Route::is('admin.earnings') ? 'active' : ''  }}"> <a href='{{ route("admin.earnings") }}'>Earning</a> </li>
                    <li class="{{  Route::is('admin.l.history') ? 'active' : ''  }}"> <a href='{{ route("admin.l.history") }}'>Login History</a> </li>
                    <li class="{{  Route::is('admin.t.history') ? 'active' : ''  }}"> <a href='{{ route("admin.t.history") }}'>Tread History</a> </li>
                </ul>
            </li>
            <li class="{{  Route::is('admin.setting') ? 'active' : ''  }}">
                <a href='{{ route("admin.setting") }}' aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Settings</span>
                </a> 
            </li>
            <li class="{{  Route::is('user.profile') ? 'active' : ''  }}">
                <a href='{{ route("user.profile") }}' aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Profile</span>
                </a> 
            </li>
            <li class="{{  Route::is('auth.logout') ? 'active' : ''  }}">
                <a href='{{ route("auth.logout") }}' aria-expanded="false">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Logout</span>
                </a> 
            </li>
        </ul>
    </div>
    <!-- end sidebar-nav -->
</aside>
<!-- end app-navbar -->