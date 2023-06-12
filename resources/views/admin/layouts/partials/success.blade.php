@if(\Illuminate\Support\Facades\Session::has('success'))
    <div id="successAlert" class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="closeAlert()">
            <span aria-hidden="true">&times;</span>
        </button>

        {{ \Illuminate\Support\Facades\Session::get('success') }}
    </div>
@endif
