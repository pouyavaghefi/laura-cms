@extends('admin.layouts.master')

@section('title',config('admin.panel')." - "."ارور لاگ")

@section('page-title', 'ارور لاگ')

@section('wrapper')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                @include('admin.layouts.includes.sections.error.log-table')
            </div> <!-- container -->
        </div> <!-- content -->

        @include('admin.layouts.includes.overall.footer')
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function removeStar(id, csrfToken) {
            var confirmation = confirm("آیا از انجام این کار اطمینان دارید؟");
            if (confirmation) {
                $.ajax({
                    url: '/admin/error/remove_star',
                    type: 'POST',
                    data: {id: id},
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function (response) {
                        if (response.success) {
                            // Reload the page
                            location.reload();
                        } else {
                            // Handle the error case if needed
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle the error response here
                    }
                });
            }
        }
    </script>
@endsection
