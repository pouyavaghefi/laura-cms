<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    @include('admin.layouts.init.meta')
    @include('admin.layouts.init.head')
    <title>{{ config('admin.auth') }}</title>
</head>
<body>

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class="text-center">
        <a href="" class="logo">
            <strong>{{ $siteInfo->ste_name }}</strong>
        </a>
        <h5 class="text-muted m-t-0 font-600">{{ $siteInfo->ste_description }}</h5>
    </div>
    <div class="m-t-40 card-box">
        <div class="text-center">
            <h4 class="text-uppercase font-bold m-b-0">ادمین</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal m-t-20" action="{{ route('adm.login.submit') }}" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control @error('username') is-invalid @enderror" type="text" required="" name="username" placeholder="نام کاربری">
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control @error('password') is-invalid @enderror" type="password" required="" name="password" placeholder="پسورد">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group text-center m-t-30">
                    <div class="col-xs-12">
                        <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">ورود</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- end card-box-->
</div>
<!-- end wrapper page -->

@include('admin.layouts.init.script')

</body>
</html>
