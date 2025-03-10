@extends('admin.layouts.master')

@section('title',config('admin.panel')." - "."مدیریت منو")

@section('page-title', 'منو')

@section('wrapper')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                @include('admin.layouts.includes.sections.menus.subsets-table')
            </div> <!-- container -->
        </div> <!-- content -->

        @include('admin.layouts.includes.overall.footer')
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function changeActivation(subsetId) {
            var confirmation = confirm("آیا از انجام این کار اطمینان دارید؟");
            if (confirmation) {
                $.ajax({
                    url: '/admin/menus/change-subset-status',
                    type: 'GET',
                    data: {subsetId: subsetId},
                    success: function (response) {
                        if (response.success) {
                            // Reload the page
                            location.reload();
                        } else {
                            // Handle the error case if needed
                            console.error(response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle the error response here
                        console.error(error);
                    }
                });
            }
        }
        function editPriority(linkId,countParents) {
            let numParents = countParents;
            let newName = prompt('اولویت این زیر منو را وارد کنید (از بین ' + numParents + ' والد)');
            if (newName) {
                // Send an AJAX request to update the exam name
                $.ajax({
                    url: "{{ route('adm.menus.change.subset.priority', ['id' => ':id']) }}".replace(':id', linkId),
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: linkId,
                        name: newName
                    },
                    success: function(response) {
                        alert(response.message);
                        // Reload the current page to reflect the changes
                        location.reload();
                    },
                    error: function(xhr) {
                        alert(xhr.responseText);
                    }
                });
            }
        }
    </script>
@endsection
