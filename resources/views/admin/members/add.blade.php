@extends('admin.layouts.master')

@section('title',config('admin.panel')." - "."اضافه کردن کاربر جدید")

@section('page-title', 'اضافه کردن کاربر جدید')

@section('wrapper')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">
                                اطلاعات اصلی کاربر
                            </h4>

                            <div class="row">
                                @include('admin.layouts.partials.alerts')

                                <form method="POST" action="{{ route('adm.members.add') }}">
                                    @csrf
                                    {{ !empty($menu) ? @method_field('PATCH') : '' }}

                                    <div class="col-lg-12">
                                        @include('admin.layouts.includes.sections.members.add-new-member-form')
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
@endsection
