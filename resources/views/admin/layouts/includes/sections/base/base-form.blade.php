<div class="form-group">
    <label class="col-md-2 control-label">نوع اطلاعات</label>
    <div class="col-md-10">
        <input type="text" name="bas_type" class="form-control @error('bas_type') is-invalid @enderror" placeholder="نوع اطلاعات را وارد کنید" value="{{ old('bas_type' ,!empty($base) ? $base->bas_type : '') }}">
        @error('bas_type')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<br style="margin-top:10px !important">

<div class="form-group">
    <label class="col-md-2 control-label">مقدار اطلاعات</label>
    <div class="col-md-10">
        <input type="text" name="bas_value" class="form-control @error('bas_value') is-invalid @enderror" placeholder="مقدار اطلاعات را وارد کنید" value="{{ old('bas_value' ,!empty($base) ? $base->bas_value : '') }}">
        @error('bas_value')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<br>

<div class="form-group">
    <label class="col-md-2 control-label">والد - پدر</label>
    <div class="col-md-10">
        <select name="bas_parent_id" class="form-control">
            <option value="" @if(empty($base)) selected @endif>ندارد</option>
            @foreach(\App\Models\BaseInfo::all() as $parent_base)
                <option value="{{ $parent_base->id }}" @if(!empty($base)) {{ $parent_base->id == $base->bas_parent_id ? 'selected' : '' }} @endif>{{ $parent_base->bas_value }}</option>
            @endforeach
        </select>
        @error('bas_parent_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<br>

<div class="form-group">
    <label class="col-md-2 control-label">والد - پدربزرگ</label>
    <div class="col-md-10">
        <select name="bas_grand_parent_id" class="form-control">
            <option value="" @if(empty($base)) selected @endif>ندارد</option>
            @foreach(\App\Models\BaseInfo::all() as $grand_base)
                <option value="{{ $grand_base->id }}" @if(!empty($base)) {{ $grand_base->id == $base->bas_grand_parent_id ? 'selected' : '' }} @endif>{{ $grand_base->bas_value }}</option>
            @endforeach
        </select>
        @error('bas_grand_parent_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<br>

<div class="form-group">
    <label class="col-md-2 control-label">مقدار اضافی</label>
    <div class="col-md-10">
        <input type="text" name="bas_extra_value" class="form-control @error('bas_extra_value') is-invalid @enderror" placeholder="مقدار اضافی را وارد کنید" value="{{ old('bas_extra_value' ,!empty($base) ? $base->bas_extra_value : '') }}">
        @error('bas_extra_value')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

<br>

<div class="form-group">
    <label class="col-md-2 control-label"></label>
    <div class="col-sm-10">
        <button id="button" class="btn btn-primary" onclick="showLoader(this)">
            @if(!empty($base))
                ویرایش
            @else
                ایجاد
            @endif
        </button>
    </div>
</div>

