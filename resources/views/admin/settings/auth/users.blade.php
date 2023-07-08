@extends('admin.layouts.master')

@section('title',config('admin.panel')." - "."ویرایش نحوه احراز هویت کاربران")

@section('styles')
    <!-- X-editable css -->
    <link type="text/css" href="/assets/plugins/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
@endsection

@section('wrapper')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            @include('admin.layouts.partials.alerts')
                            <h4 class="header-title m-t-0 m-b-30">نحوه احراز هویت کاربران</h4>

                            <div class="row">
                                <div class="col-lg-12">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ route('adm.settings.auth.users') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">رنگ پس زمینه</label>
                                            <div class="col-md-10">
                                                <input type="color" name="bg" class="form-control" value="{{ $authUserBg }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">تصویر لوگو</label>
                                            <div class="col-md-10">
                                                <input type="text" name="logo" class="form-control" value="{{ $authUserLogo }}">
                                            </div>
                                        </div>
                                        <div class="form-group m-b-0">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-info waves-effect waves-light" onclick="showLoader(this)">ثبت</button>
                                            </div>
                                        </div>
                                    </form>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->


            </div> <!-- container -->

        </div> <!-- content -->

    </div>
@endsection

@section('scripts')
    <!-- XEditable Plugin -->
    <script src="/assets/plugins/moment/moment.js"></script>
    <script type="text/javascript" src="/assets/plugins/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    <script type="text/javascript" src="/assets/pages/jquery.xeditable.js"></script>
@endsection
