@extends('frontend.layouts.master')

@section('wrapper')
    @include('frontend.layouts.includes.gadgets.hero')

    <main id="main" data-aos="fade" data-aos-delay="1500">
        <!-- ======= Gallery Section ======= -->
        @include('frontend.layouts.includes.gadgets.gallery')
    </main><!-- End #main -->
@endsection
