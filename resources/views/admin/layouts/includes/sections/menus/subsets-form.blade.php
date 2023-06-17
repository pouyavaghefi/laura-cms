    <div class="form-group">
        <label class="col-md-2 control-label">نام لینک</label>
        <div class="col-md-10">
            <input type="text" name="mel_label" class="form-control @error('mel_label') is-invalid @enderror" placeholder="نام لینک را وارد کنید" value="{{ old('mel_label',!empty($link) ? $link->mel_label : '') }}">
            @error('mel_label')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <br>

    <div class="form-group">
        <label class="col-md-2 control-label">یوارال لینک</label>
        <div class="col-md-10">
            <input type="text" name="mel_url" class="form-control @error('mel_url') is-invalid @enderror" placeholder="یوارال لینک را وارد کنید" value="{{ old('mel_url',!empty($link) ? $link->mel_url : '') }}">
            @error('mel_url')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <br>

    @if(count($menu->menuLinks) >= 1)
        <div class="form-group">
            <label class="col-md-2 control-label">لینک والد</label>
            <div class="col-md-10">
                <select name="mel_parent_id" class="form-control">
                    <option value="" @if(empty($link)) selected @endif>ندارد</option>
                    @foreach($menu->menuLinks as $mLink)
                        <option value="{{ $mLink->id }}"
                        @if(!empty($link)) {{ $link->mel_parent_id == $mLink->id ? 'selected' : '' }} @endif>
                            {{ $mLink->linkName() }}
                        </option>
                    @endforeach
                </select>
                @error('mel_parent_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    @endif


    <div class="form-group">
        <label class="col-md-2 control-label">رنگ لینک</label>
        <div class="col-md-10">
            <input type="text" name="mel_color" class="form-control @error('mel_color') is-invalid @enderror" placeholder="رنگ لینک را وارد کنید" value="{{ old('mel_color',!empty($link) ? $link->mel_color : '') }}">
            @error('mel_color')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <br>

    <div class="form-group">
        <label class="col-md-2 control-label">رنگ لینک (hover)</label>
        <div class="col-md-10">
            <input type="text" name="mel_hover_color" class="form-control @error('mel_hover_color') is-invalid @enderror" placeholder="رنگ لینک را وقتی هاور میشود وارد کنید" value="{{ old('mel_hover_color',!empty($link) ? $link->mel_hover_color : '') }}">
            @error('mel_hover_color')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <br>

    <div class="form-group">
        <label class="col-md-2 control-label">آیکون لینک</label>
        <div class="col-md-10">
            <input type="text" name="mel_icon" class="form-control @error('mel_icon') is-invalid @enderror" placeholder="ایکون لینک را وارد کنید" value="{{ old('mel_icon',!empty($link) ? $link->mel_icon : '') }}">
            @error('mel_icon')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <br>

    <div class="form-group">
        <label class="col-md-2 control-label">فقط آیکون را نشان بده</label>
        <div class="col-md-10">
            <input name="mel_show_icon_only" id="showIcon" type="checkbox" @if(!empty($link)) @if(!empty($link->mel_show_icon_only)) checked @endif @endif>
            @error('mel_show_icon_only')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <br>

    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-sm-10">
            <button id="button" class="btn btn-primary" onclick="showLoader(this)">
                @if(!empty($link))
                    ویرایش
                @else
                    ایجاد
                @endif
            </button>
        </div>
    </div>

