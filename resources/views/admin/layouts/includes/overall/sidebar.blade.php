@php
    $currentRoute = \Route::currentRouteName();
@endphp

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!-- User -->
        <div class="user-box">
            <div class="user-img">
                <img src="{{ route('adm.profile.details.show.avatar') }}" alt="user-img" title="تصویر حساب کاربری شما" class="img-circle img-thumbnail img-responsive">
                <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
            </div>
            <h5><a href="#">{{ auth()->user()->usr_name }}</a> </h5>
            <ul class="list-inline">
                <li>
                    <a href="{{ route('adm.profile.details') }}" class="{{ $currentRoute == 'adm.profile.details' ? 'text-custom' : '' }}"
                     title="مشاهده اطلاعات حساب کاربری">
                        <i class="zmdi zmdi-settings"></i>
                    </a>
                </li>

                <li>
                    <a href="{{ route('adm.logout') }}" title="خروج از حساب کاربری">
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
                    <a href="{{ route('adm.dashboard') }}" class="waves-effect {{ $currentRoute == 'adm.dashboard' ? 'active' : '' }}"><i class="zmdi zmdi-view-dashboard"></i> <span> داشبورد </span> </a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{ in_array($currentRoute, ['adm.menus.index', 'adm.menus.create']) ? 'active' : '' }}"><i class="zmdi zmdi-invert-colors"></i> <span> منو </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="{{ $currentRoute == 'adm.menus.index' ? 'active' : '' }}"><a href="{{ route('adm.menus.index') }}">منو ها</a></li>
                        <li class="{{ $currentRoute == 'adm.menus.create' ? 'active' : '' }}"><a href="{{ route('adm.menus.create') }}">ایجاد منو</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{ in_array($currentRoute, ['adm.members.index', 'adm.members.admins.index', 'adm.members.add.view']) ? 'active' : '' }}"><i class="zmdi zmdi-invert-colors"></i> <span> کاربران </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="{{ $currentRoute == 'adm.members.index' ? 'active' : '' }}"><a href="{{ route('adm.members.index') }}">کاربران سامانه</a></li>
                        <li class="{{ $currentRoute == 'adm.members.admins.index' ? 'active' : '' }}"><a href="{{ route('adm.members.admins.index') }}">کاربران ادمین</a></li>
                        <li class="{{ $currentRoute == 'adm.members.add' ? 'active' : '' }}"><a href="{{ route('adm.members.add') }}">اضافه کردن کاربر</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{ in_array($currentRoute, ['adm.media.library', 'adm.media.upload']) ? 'active' : '' }}"><i class="zmdi zmdi-invert-colors"></i> <span> چند رسانه ایی </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="{{ $currentRoute == 'adm.media.upload' ? 'active' : '' }}"><a href="{{ route('adm.media.upload') }}">آپلود</a></li>
                        <li class="{{ $currentRoute == 'adm.media.library' ? 'active' : '' }}"><a href="{{ route('adm.media.library') }}">کتابخانه</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{ in_array($currentRoute, ['adm.error.log', 'adm.base.info']) ? 'active' : '' }}"><i class="zmdi zmdi-invert-colors"></i> <span> برنامه نویس </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="{{ $currentRoute == 'adm.error.log' ? 'active' : '' }}"><a href="{{ route('adm.error.log') }}">ارور لاگ</a></li>
                        <li class="{{ $currentRoute == 'adm.base.info' ? 'active' : '' }}"><a href="{{ route('adm.base.info') }}">اطلاعات پایه</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{ in_array($currentRoute, ['adm.settings.info.index', 'adm.settings.auth.users', 'adm.settings.auth.admins']) ? 'active' : '' }}"><i class="zmdi zmdi-invert-colors"></i> <span> تنظیمات </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li class="{{ $currentRoute == 'adm.settings.info.index' ? 'active' : '' }}"><a href="{{ route('adm.settings.info.index') }}">سایت های متصل</a></li>
                    </ul>
                </li>

                @if (config('modules.modules.memegenerator.enabled'))
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect {{ in_array($currentRoute, ['adm.articles.create', 'adm.articles.index', 'adm.articles.edit']) ? 'active' : '' }}"><i class="zmdi zmdi-invert-colors"></i> <span> میم جنریتور </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li class="{{ $currentRoute == 'adm.memeg.create' ? 'active' : '' }}"><a href="{{ route('adm.memeg.create') }}">ایجاد میم</a></li>
                            <li class="{{ $currentRoute == 'adm.memeg.index' ? 'active' : '' }}"><a href="{{ route('adm.memeg.index') }}">همه میم ها</a></li>
                            <li class="{{ $currentRoute == 'adm.memeg.index' ? 'active' : '' }}"><a href="{{ route('adm.memeg.index') }}">تنظیمات</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            <div class="clearfix"></div>
        </div>

        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>
