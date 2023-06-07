    <div class="form-group">
        <label class="col-md-2 control-label">نام (فارسی)</label>
        <div class="col-md-10">
            <input type="text" name="mbr_fname" class="form-control @error('mbr_fname') is-invalid @enderror" placeholder="نام خود را به فارسی وارد کنید" value="{{ old('mbr_fname', optional(auth()->user()->member)->mbr_fname) }}">
            @error('mbr_fname')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">نام خانوادگی (فارسی)</label>
        <div class="col-md-10">
            <input type="text" name="mbr_lname" class="form-control @error('mbr_lname') is-invalid @enderror" placeholder="نام خانوادگی خود را به فارسی وارد کنید" value="{{ old('mbr_lname', optional(auth()->user()->member)->mbr_lname) }}">
            @error('mbr_lname')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">نام (انگلیسی)</label>
        <div class="col-md-10">
            <input type="text" name="mbr_en_fname" class="form-control @error('mbr_en_fname') is-invalid @enderror" placeholder="نام خود را به انگلیسی وارد کنید" value="{{ old('mbr_en_fname', optional(auth()->user()->member)->mbr_en_fname) }}">
            @error('mbr_en_fname')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">نام خانوادگی (انگلیسی)</label>
        <div class="col-md-10">
            <input type="text" name="mbr_en_lname" class="form-control @error('mbr_en_lname') is-invalid @enderror" placeholder="نام خانوادگی خود را به انگلیسی وارد کنید" value="{{ old('mbr_en_lname', optional(auth()->user()->member)->mbr_en_lname) }}">
            @error('mbr_en_lname')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">نام مستعار (فارسی)</label>
        <div class="col-md-10">
            <input type="text" name="mbr_nick_name" class="form-control @error('mbr_nick_name') is-invalid @enderror" placeholder="نام مستعار خود را به فارسی وارد کنید" value="{{ old('mbr_nick_name', optional(auth()->user()->member)->mbr_nick_name) }}">
            @error('mbr_nick_name')
            <div class="hover-tooltip">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">نام پدر (فارسی)</label>
        <div class="col-md-10">
            <input type="text" name="mbr_father_name" class="form-control @error('mbr_father_name') is-invalid @enderror" placeholder="نام پدر خود را به فارسی وارد کنید" value="{{ old('mbr_father_name', optional(auth()->user()->member)->mbr_father_name) }}">
            @error('mbr_father_name')
            <div class="hover-tooltip">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">کد پستی</label>
        <div class="col-md-10">
            <input type="text" name="mbr_postal_code" class="form-control @error('mbr_postal_code') is-invalid @enderror" placeholder="کد پستی خود را به فارسی وارد کنید" value="{{ old('mbr_postal_code', optional(auth()->user()->member)->mbr_postal_code) }}">
            @error('mbr_postal_code')
            <div class="hover-tooltip">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">آدرس</label>
        <div class="col-md-10">
            <textarea class="form-control @error('mbr_address') is-invalid @enderror" name="mbr_address" rows="5">{{ old('mbr_address', optional(auth()->user()->member)->mbr_address) }}</textarea>
            @error('mbr_address')
            <div class="hover-tooltip">{{ $message }}</div>
            @enderror
        </div>
    </div>

