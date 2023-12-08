
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
  <div class="form-check">
    <input type="radio" class="form-check-input" id="bgColorYes" name="bgColor" value="has-bg" x-model="selectedOption">
    <label class="form-check-label" for="bgColorYes">رنگ پس زمینه دارد</label>
  </div>
  <div class="form-check">
    <input type="radio" class="form-check-input" id="bgColorNo" name="bgColor" value="no-bg" x-model="selectedOption">
    <label class="form-check-label" for="bgColorNo">رنگ پس زمینه ندارد</label>
  </div>
</div>

    <br>

    <div class="form-group" x-show="selectedOption === 'has-bg'">
  <label class="col-md-2 control-label">رنگ پس زمینه</label>
  <div class="col-md-10">
    <input type="color" name="men_bg_color" class="form-control" placeholder="رنگ منو را وارد کنید" x-model="menBgColor">
    <span x-show="selectedOption === 'has-bg' && menBgColor === ''" class="text-danger">Please enter a color</span>
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

