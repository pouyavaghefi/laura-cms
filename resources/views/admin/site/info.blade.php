@extends('admin.layouts.master')

@section('title',config('admin.panel')." - "."ویرایش مشخصات سایت های متصل")

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
                            <div class="row">
                                @forelse($infos as $info)
                                    @php($menuCounter = 0)
                                    <div class="col-lg-6">
                                        <h4 class="m-b-30 m-t-0 header-title">
                                            <b>
                                                سایت شماره
                                                {{ ++$menuCounter }}
                                                @if($info->ste_main == 1)
                                                <span class="red-para">
                                                    (اصلی)
                                                </span>
                                                @endif
                                            </b>
                                        </h4>
                                        <form action="{{ route('adm.settings.info.index') }}" class="form-horizontal">
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label" for="name">نام</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="نام سایت را وارد کنید">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-5 control-label" for="description">توضیحات</label>
                                                <div class="col-sm-7">
                                                    <textarea class="form-control" id="description" name="description" placeholder="توضیحات سایت را وارد کنید"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-5 control-label" for="email">ایمیل</label>
                                                <div class="col-sm-7">
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="ایمیل سایت را وارد کنید">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-5 control-label" for="phone">تلفن</label>
                                                <div class="col-sm-7">
                                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="تلفن سایت را وارد کنید">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-5 control-label" for="address">آدرس</label>
                                                <div class="col-sm-7">
                                                    <textarea class="form-control" id="address" name="address" placeholder="آدرس سایت را وارد کنید"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-5 control-label" for="logo">لوگو</label>
                                                <div class="col-sm-7">
                                                    <input type="file" class="form-control-file" id="logo" name="logo">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-5 control-label" for="icon">آیکن</label>
                                                <div class="col-sm-7">
                                                    <input type="file" class="form-control-file" id="icon" name="icon">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <a href="#" class="btn btn-primary btn-lg btn-block">ثبت</a>
                                            </div>
                                        </form>
                                    </div><!-- end col -->
                                @empty
                                    <div class="col-lg-12">
                                        <p class="red-para">هنوز هیچ سایتی به دیتابیس اضافه نشده است</p>
                                    </div>
                                @endforelse
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
