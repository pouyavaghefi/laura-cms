@php
    $currentRoute = \Route::currentRouteName();
@endphp

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!-- User -->
        <div class="user-box">
            <div class="user-img">
                <img src="assets/images/users/avatar-1.jpg" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
                <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
            </div>
            <h5><a href="#">علی یدالهی</a> </h5>
            <ul class="list-inline">
                <li>
                    <a href="{{ route('adm.account') }}">
                        <i class="zmdi zmdi-settings"></i>
                    </a>
                </li>

                <li>
                    <a href="{{ route('adm.logout') }}" class="text-custom">
                        <i class="zmdi zmdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End User -->

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">ناوبری شما</li>

                <li>
                    <a href="{{ route('adm.dashboard') }}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i> <span> داشبورد </span> </a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{ $currentRoute == 'adm.settings.info.index' ? 'active' : '' }}"><i class="zmdi zmdi-invert-colors"></i> <span> تنظیمات </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="{{ $currentRoute == 'adm.settings.info.index' ? 'active' : '' }}"><a href="{{ route('adm.settings.info.index') }}">سایت های متصل</a></li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>
