    <div class="form-group">
        <label class="col-md-2 control-label">کشور محل سکونت</label>
        <div class="col-md-10">
            <select class="form-control @error('mbr_cnt_id') is-invalid @enderror" name="mbr_cnt_id">
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ old('mbr_cnt_id', optional(auth()->user()->member)->country_id) == $country->id ? 'selected' : '' }}>
                        {{ $country->cnt_name }}
                    </option>
                @endforeach
            </select>
            @error('mbr_cnt_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">استان محل سکونت</label>
        <div class="col-md-10">
            <select class="form-control @error('mbr_prv_id') is-invalid @enderror" name="mbr_prv_id">
                @foreach($provinces as $province)
                    <option value="{{ $province->id }}" {{ old('mbr_prv_id', optional(auth()->user()->member)->mbr_prv_id) == $province->id ? 'selected' : '' }}>
                        {{ $province->prv_name }}
                    </option>
                @endforeach
            </select>
            @error('mbr_prv_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">شهر محل سکونت</label>
        <div class="col-md-10">
            <select class="form-control @error('mbr_cit_id') is-invalid @enderror" name="mbr_cit_id">
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ old('mbr_cit_id', optional(auth()->user()->member)->mbr_cit_id) == $city->id ? 'selected' : '' }}>
                        {{ $city->cit_name }}
                    </option>
                @endforeach
            </select>
            @error('mbr_cit_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">جنسیت</label>
        <div class="col-sm-10">
            <select class="form-control @error('mbr_gender_id') is-invalid @enderror" name="mbr_gender_id">
                @foreach($genders as $gender)
                    <option @if($gender->id == 2) disabled="disabled" @endif value="{{ $gender->id }}" {{ old('mbr_gender_id', optional(auth()->user()->member)->mbr_gender_id) == $gender->id ? 'selected' : '' }}>
                        {{ $gender->bas_value }}
                    </option>
                @endforeach
            </select>
            @error('mbr_gender_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">کد ملی</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('mbr_national_code') is-invalid @enderror" name="mbr_national_code" placeholder="کد ملی خود را وارد کنید" value="{{ old('mbr_national_code', optional(auth()->user()->member)->mbr_national_code) }}">
            @error('mbr_national_code')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">تاریخ تولد</label>
        <div class="col-sm-10">
            <input type="date" id="date" name="mbr_birthday" class="form-control datepicker @error('mbr_birthday') is-invalid @enderror" value="{{ old('mbr_birthday') ? old('mbr_birthday') : \Carbon\Carbon::parse(auth()->user()->member->mbr_birthday)->format('Y-m-d') }}" autofocus>
            @error('mbr_birthday')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">تلفن</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('mbr_phone') is-invalid @enderror" name="mbr_phone" placeholder="تلفن خود را وارد کنید" value="{{ old('mbr_phone', optional(auth()->user()->member)->mbr_phone) }}">
            @error('mbr_phone')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">شماره موبایل</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('mbr_mobile') is-invalid @enderror" name="mbr_mobile" placeholder="شماره موبایل خود را وارد کنید" value="{{ old('mbr_mobile', optional(auth()->user()->member)->mbr_mobile) }}">
            @error('mbr_mobile')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">ایمیل ثانویه</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('mbr_secondary_email') is-invalid @enderror" name="mbr_secondary_email" placeholder="ایمیل ثانویه خود را وارد کنید" value="{{ old('mbr_secondary_email', optional(auth()->user()->member)->mbr_secondary_email) }}">
            @error('mbr_secondary_email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <button id="button" class="btn btn-primary btn-block" onclick="showLoader(this)">
                بروزرسانی
            </button>
        </div>
    </div>


