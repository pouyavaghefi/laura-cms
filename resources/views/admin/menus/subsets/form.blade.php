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
                                @if(!empty($link))
                                    ویرایش منو
                                @else
                                    ایجاد منوی جدید
                                @endif
                            </h4>

                            <div class="row">
                                @include('admin.layouts.partials.alerts')

                                <form method="POST" action="{{ !empty($link) ? route('adm.menus.subsets.update', ['linkId' => $link->id, 'menuId' => $menu->id]) : route('adm.menus.subsets.store', ['menuId' => $menu->id]) }}">
                                    @csrf
                                    {{ !empty($link) ? @method_field('PATCH') : '' }}

                                    <div class="col-lg-12">
                                        @include('admin.layouts.includes.sections.menus.subsets-form')
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

@section('scripts')
    <script>
        $(document).ready(function() {
            // Make sure Dropify is initialized on the input field
            $('.dropify').dropify();

            // Fetch the image URL and update the data-default-file attribute
            $.ajax({
                url: '{{ route('adm.profile.details.show.avatar') }}',
                type: 'GET',
                success: function(data) {
                    $('.dropify').attr('data-default-file', data);
                    $('.dropify').dropify(); // Reinitialize Dropify with the new image URL
                },
                error: function() {
                    console.log('Error occurred while fetching the image URL.');
                }
            });
        });
    </script>

    <script>
        function generatePassword() {
            const symbols = '!@#$%^&*()_-+=<>?';
            const uppercaseLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            const lowercaseLetters = 'abcdefghijklmnopqrstuvwxyz';
            const words = ['apple', 'banana', 'cherry', 'date', 'elderberry'];

            let password = '';

            // Generate random password with minimum length of 8 characters
            while (password.length < 8) {
                password += getRandomElement(uppercaseLetters);
                password += getRandomElement(lowercaseLetters);
                password += getRandomElement(words);
                password += getRandomElement(symbols);
            }

            // Display the generated password in the input field
            document.getElementById('generated_password').value = password;
        }

        function getRandomElement(array) {
            const randomIndex = Math.floor(Math.random() * array.length);
            return array[randomIndex];
        }
    </script>

    {{--    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}
    {{--    <script>--}}
    {{--        $(document).ready(function() {--}}
    {{--            $("#date").datepicker({--}}
    {{--                dateFormat: "yy/mm/dd",--}}
    {{--                isRTL: true,--}}
    {{--                changeMonth: true,--}}
    {{--                changeYear: true,--}}
    {{--                yearRange: "c-100:c+100"--}}
    {{--            });--}}
    {{--        });--}}
    {{--    </script>--}}
@endsection
