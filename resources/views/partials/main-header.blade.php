<!-- =============== Main Header start ================-->
<div class="main-header">
    <div class="logo">
        <a href="{{ url('/') }}"><img src="https://ui-avatars.com/api/?name=MyWiggle&color=E50916&background=000000" alt=""></a>
    </div>
    <div class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
    </div>
    
    <div style="margin: auto"></div>
    <div class="header-part-right">
        <!-- Full screen toggle -->
        <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
        
        <!-- User avatar dropdown -->
        <div class="dropdown">
            <div class="user col align-self-end">
                <img src="{{ Auth::user()->profile_photo_url }}" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <div class="dropdown-header">
                        <i class="i-Lock-User mr-1"></i> {{ Auth::user()->username }}
                    </div>
                    <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
                    <a class="dropdown-item" href="{{ route('auth.logout') }}">Logout</a>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- =============== Horizontal bar End ================-->
