
<div class="form-group">
    <label class="col-md-2 control-label">نام کاربری</label>
    <div class="col-md-10">
        <input type="text" name="usr_name" class="form-control @error('usr_name') is-invalid @enderror" placeholder="نام کاربری را وارد کنید" value="{{ old('usr_name') }}">
        @error('usr_name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<br>

<div class="form-group">
    <label class="col-md-2 control-label">وضعیت کاربر</label>
    <div class="col-md-10">
        <select name="usr_is_active" class="form-control">
            <option value="1">فعال</option>
            <option value="0">غیرفعال</option>
        </select>
        @error('usr_is_active')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<br>

<div class="form-group">
    <label class="col-md-2 control-label">نوع اکانت</label>
    <div class="col-md-10">
        <select name="usr_is_admin" class="form-control">
            @foreach($mtypes as $type)
                <option value="{{ $type->id }}">{{ $type->bas_value }}</option>
            @endforeach
        </select>
        @error('usr_is_admin')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<br>

<div class="form-group">
    <label class="col-md-2 control-label">نوع حساب کاربر</label>
    <div class="col-md-10">
        <select name="member_type" class="form-control">
            @forelse(\App\Models\BaseInfo::where('bas_type', 'memberType')->get() as $type)
                <option value="{{ $type->id }}">{{ $type->bas_value }}</option>
            @empty
                <option value="" selected>تعیین نشده</option>
            @endforelse
        </select>
        @error('member_type')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<br>

<div class="form-group">
    <label class="col-md-2 control-label">وضعیت تایید ایمیل کاربر</label>
    <div class="col-md-10">
        <select name="usr_email_verified_at" class="form-control">
            <option value="verified">مورد تایید</option>
            <option value="notverified">عدم تایید</option>
            <option value="linksent">ارسال لینک فعال سازی</option>
        </select>
        @error('usr_email_verified_at')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<br>

<div class="form-group">
    <label class="col-md-2 control-label"></label>
    <div class="col-sm-10">
        <button id="button" class="btn btn-primary" onclick="showLoader(this)">
            ثبت و ادامه
        </button>
    </div>
</div>

