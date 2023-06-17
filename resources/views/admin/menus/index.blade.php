@extends('admin.layouts.master')

@section('title',config('admin.panel')." - "."مدیریت منو")

@section('page-title', 'منو')

@section('wrapper')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                @include('admin.layouts.includes.sections.menus.menus-table')
            </div> <!-- container -->
        </div> <!-- content -->

        @include('admin.layouts.includes.overall.footer')
    </div>
@endsection



