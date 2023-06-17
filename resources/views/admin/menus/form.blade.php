@extends('admin.layouts.master')

@php
$titleBar = null;
if(!empty($menu)){
    $titleBar = 'ویرایش منو';
}else{
    $titleBar = 'ایجاد منوی جدید';
}
@endphp

@section('title',config('admin.panel')." - ".$titleBar)

@section('page-title', 'منو')

@section('styles')
    <!-- form Uploads -->
    <link href="/assets/plugins/fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css" />
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
                            <h4 class="header-title m-t-0 m-b-30">
                                @if(!empty($menu))
                                    ویرایش منو
                                @else
                                    ایجاد منوی جدید
                                @endif
                            </h4>

                            <div class="row">
                                @include('admin.layouts.partials.alerts')

                                <form method="POST" action="{{ !empty($menu) ? route('adm.menus.update', $menu->id) : route('adm.menus.store') }}">
                                    @csrf
                                    {{ !empty($menu) ? @method_field('PATCH') : '' }}

                                    <div class="col-lg-12">
                                        @include('admin.layouts.includes.sections.menus.menu-form')
                                    </div><!-- end col -->
                                </form>
                            </div><!-- end row -->
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->
            </div> <!-- container -->

        </div> <!-- content -->
    </div>
@endsection
