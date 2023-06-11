@php
    $ste_name = $siteInfo->ste_name;

    // Split the string into an array of words
    $ste_words = explode(' ', $ste_name);

    // Store each word in separate variables
    list($word1, $word2) = $ste_words;

    // Check if the array contains exactly two words
    if (count($ste_words) === 2) {
        $show_spans = true;
    } else {
        $show_spans = false;
    }
@endphp
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="{{ $siteInfo->ste_url }}" target="_blank" class="logo">
            @if($show_spans == true)
                <span>{{ $word1 }}<span>&nbsp;{{ $word2 }}</span></span>
            @else
                <span>{{ $ste_name }}</span>
            @endif
            <i class="zmdi zmdi-layers"></i>
        </a>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">

            <!-- Page title -->
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <button class="button-menu-mobile open-left">
                        <i class="zmdi zmdi-menu"></i>
                    </button>
                </li>
                <li>
                    <h4 class="page-title">@yield('page-title')</h4>
                </li>
            </ul>

            <!-- Right(Notification and Searchbox -->
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <!-- Notification -->
                    <div class="notification-box">
                        <ul class="list-inline m-b-0">
                            <li>
                                <a href="javascript:void(0);" class="right-bar-toggle">
                                    <i class="zmdi zmdi-notifications-none"></i>
                                </a>
                                <div class="noti-dot">
                                    <span class="dot"></span>
                                    <span class="pulse"></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- End Notification bar -->
                </li>
                <li class="hidden-xs">
                    <form role="search" class="app-search">
                        <input type="text" placeholder="به دنبال چه می گردی ؟؟؟"
                               class="form-control">
                        <a href=""><i class="fa fa-search"></i></a>
                    </form>
                </li>
            </ul>

        </div><!-- end container -->
    </div><!-- end navbar -->
</div>
