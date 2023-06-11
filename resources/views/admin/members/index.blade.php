@extends('admin.layouts.master')

@section('title',config('admin.panel')." - "."داشبورد")

@section('wrapper')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                @include('admin.layouts.includes.samples.members-search')
                @include('admin.layouts.includes.sections.members.members-table')
                <!-- end row -->
            </div> <!-- container -->
        </div> <!-- content -->

        @include('admin.layouts.includes.overall.footer')
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function changeActivation(userId, isActive, csrfToken) {
            var confirmation = confirm("آیا از انجام این کار اطمینان دارید؟");
            if (confirmation) {
                $.ajax({
                    url: '/admin/members/change-activation',
                    type: 'POST',
                    data: {userId: userId, isActive: isActive},
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
