<form method="POST" action="{{ route('adm.profile.details.update.avatar') }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="card-box">
        <h4 class="header-title m-t-0 m-b-30">عکس پروفایل</h4>

        <input type="file" name="avatar" class="dropify" data-default-file="" />
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <button class="btn btn-primary btn-block" onclick="showLoader(this)">
                آپلود
            </button>
            @if(\Storage::exists("adm/avatars/".auth()->user()->usr_name.".jpg"))
                <a href="{{ route('adm.profile.details.delete.avatar') }}" class="btn btn-danger btn-block">
                    حذف عکس فعلی
                </a>
            @endif
        </div>
    </div>
</form>
