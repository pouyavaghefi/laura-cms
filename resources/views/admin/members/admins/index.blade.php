@extends('admin.layouts.master')

@section('title',config('admin.panel')." - "."داشبورد")

@section('page-title', 'کاربران مدیر')

@section('wrapper')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                @include('admin.layouts.includes.samples.members-search')
                @include('admin.layouts.includes.sections.members.admin-members-table')
            </div> <!-- container -->
        </div> <!-- content -->

        @include('admin.layouts.includes.overall.footer')

    </div>
@endsection
