@extends('admin.layouts.master')

@section('title',config('admin.panel')." - "."اطلاعات پایه")

@section('page-title', 'اطلاعات پایه')

@section('wrapper')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                @include('admin.layouts.includes.sections.base.info-table')
            </div> <!-- container -->
        </div> <!-- content -->

        @include('admin.layouts.includes.overall.footer')
    </div>
@endsection
