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
                            @include('admin.layouts.partials.alerts')
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
                                        <form method="POST" action="{{ route('adm.settings.info.update',['info'=>$info->id]) }}" class="form-horizontal" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')

                                            <div class="form-group">
                                                <label class="col-sm-5 control-label" for="name">نام</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="name" name="ste_name" placeholder="نام سایت را وارد کنید" value="{{ $info->ste_name }}">
                                                </div>
                                                @if ($loop->first)
                                                <div class="col-sm-offset-5 col-sm-7">
                                                    <small class="text-muted">مانند دی گستر</small>
                                                </div>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-5 control-label" for="url">URL</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="url" name="ste_url" placeholder="URL سایت را وارد کنید" value="{{ $info->ste_url }}">
                                                </div>
                                                @if ($loop->first)
                                                <div class="col-sm-offset-5 col-sm-7">
                                                    <small class="text-muted">مانند http://daygostar.com</small>
                                                </div>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-5 control-label" for="description">توضیحات</label>
                                                <div class="col-sm-7">
                                                    <textarea class="form-control" id="description" name="ste_description" placeholder="توضیحات سایت را وارد کنید">{{ $info->ste_description }}</textarea>
                                                </div>
                                                @if ($loop->first)
                                                <div class="col-sm-offset-5 col-sm-7">
                                                    <small class="text-muted">مانند ارایه دهنده سیستم مدیریت محتوای اختصاصی</small>
                                                </div>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-5 control-label" for="email">ایمیل</label>
                                                <div class="col-sm-7">
                                                    <input type="email" class="form-control" id="email" name="ste_email" placeholder="ایمیل سایت را وارد کنید" value="{{ $info->ste_email }}">
                                                </div>
                                                @if ($loop->first)
                                                <div class="col-sm-offset-5 col-sm-7">
                                                    <small class="text-muted">مانند info@daygostar.com</small>
                                                </div>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-5 control-label" for="phone">تلفن</label>
                                                <div class="col-sm-7">
                                                    <input type="tel" class="form-control" id="phone" name="ste_phone" placeholder="تلفن سایت را وارد کنید" value="{{ $info->ste_phone }}">
                                                </div>
                                                @if ($loop->first)
                                                <div class="col-sm-offset-5 col-sm-7">
                                                    <small class="text-muted">مانند 02188682383</small>
                                                </div>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-5 control-label" for="address">آدرس</label>
                                                <div class="col-sm-7">
                                                    <textarea class="form-control" id="address" name="ste_address" placeholder="آدرس سایت را وارد کنید">{{ $info->ste_address }}</textarea>
                                                </div>
                                                @if ($loop->first)
                                                <div class="col-sm-offset-5 col-sm-7">
                                                    <small class="text-muted">مانند سعادت اباد</small>
                                                </div>
                                                @endif
                                            </div>

                                            @php
                                                $logoPath = public_path('frontend/img/logo.png');
                                            @endphp
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label" for="logo">لوگو</label>
                                                <div class="col-sm-7">
                                                    <input type="file" class="form-control-file" id="logo" name="ste_logo">
                                                </div>
                                            </div>
                                            @if(\File::exists($imagePath))
                                                <a target="_blank" href="{{ $imagePath }}">مشاهده لوگوی کنونی</a>
                                            @endif

                                            @php
                                                $iconPath = public_path('frontend/img/icon.png');
                                            @endphp
                                            <div class="form-group">
                                                <label class="col-sm-5 control-label" for="icon">آیکن</label>
                                                <div class="col-sm-7">
                                                    <input type="file" class="form-control-file" id="icon" name="ste_favicon">
                                                </div>
                                            </div>
                                            @if(\File::exists($iconPath))
                                                <a target="_blank" href="{{ $iconPath }}">مشاهده آیکن کنونی</a>
                                            @endif

                                            <div class="form-group">
                                                <button class="btn btn-primary btn-lg btn-block">ثبت</button>
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
