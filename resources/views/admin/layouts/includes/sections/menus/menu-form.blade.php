
    <div class="form-group">
        <label class="col-md-2 control-label">نام منو</label>
        <div class="col-md-10">
            <input type="text" name="men_name" class="form-control @error('men_name') is-invalid @enderror" placeholder="نام منو را وارد کنید" value="{{ old('men_name' ,!empty($menu) ? $menu->men_name : '') }}">
            @error('men_name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <br style="margin-top:10px !important">

    <div class="form-group">
        <label class="col-md-2 control-label">توضیحات منو</label>
        <div class="col-md-10">
            <input type="text" name="men_description" class="form-control @error('men_description') is-invalid @enderror" placeholder="توضیحات منو را وارد کنید" value="{{ old('men_description' ,!empty($menu) ? $menu->men_description : '') }}">
            @error('men_description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <br>

    <div class="form-group">
        <label class="col-md-2 control-label">جایگاه منو</label>
        <div class="col-md-10">
            <select name="men_position" class="form-control">
                <option value="" @if(empty($menu)) selected @endif>تعیین نشده</option>
                @foreach(\App\Models\BaseInfo::where('bas_type', 'menuPosition')->get() as $position)
                    <option value="{{ $position->id }}" @if(!empty($menu)) {{ $position->id == $menu->men_position ? 'selected' : '' }} @endif>{{ $position->bas_value }}</option>
                @endforeach
            </select>
            @error('men_position')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <br>

    <div class="form-group">
        <label class="col-md-2 control-label">رنگ پس زمینه</label>
        <div class="col-md-10">
            <input type="color" name="men_bg_color" class="form-control @error('men_bg_color') is-invalid @enderror" placeholder="رنگ منو را وارد کنید" value="{{ old('men_bg_color' ,!empty($menu) ? $menu->men_bg_color : '') }}">
            @error('men_bg_color')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <br>

    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-sm-10">
            <button id="button" class="btn btn-primary" onclick="showLoader(this)">
                @if(!empty($menu))
                    ویرایش
                @else
                    ایجاد
                @endif
            </button>
        </div>
    </div>

