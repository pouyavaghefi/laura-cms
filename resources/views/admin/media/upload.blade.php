@extends('admin.layouts.master')

@section('title',config('admin.panel')." - "."داشبورد")

@section('wrapper')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">آپلود فایل</h4>

                            @include('admin.layouts.partials.alerts')

                            <form method="POST" action="{{ route('adm.media.upload.submit') }}" enctype="multipart/form-data">
                                @csrf

                                @include('admin.layouts.includes.sections.media.form-boxes')

                                <input type="file" name="file" class="dropify" data-height="300" />

                                <br>

                                <button class="btn btn-primary btn-block" onclick="showLoader(this)">ثبت</button>
                            </form>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->

        @include('admin.layouts.includes.overall.footer')

    </div>
@endsection
