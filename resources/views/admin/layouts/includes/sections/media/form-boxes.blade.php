<!-- Forms -->
<div class="row">
	<div class="col-sm-12">
		<div class="card-box">
			<div class="row">
				<div class="col-md-6">
                    <div class="form-group">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox1" type="checkbox" name="original_name">
                            <label for="checkbox1">
                                استفاده از نام فایل به جای انتخاب نام تصادفی
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox2" type="checkbox" name="resize_images">
                            <label for="checkbox2">
                                ریسایز کردن عکس
                            </label>
                        </div>
                    </div>
                </div><!-- end col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">انتخاب خانواده مرتبط</label>
                        <div class="col-sm-10">
                            <select name="med_group" class="form-control">
                                @foreach(\App\Models\BaseInfo::where('bas_type','mediaLibrary')->get() as $base)
                                    <option value="{{ $base->id }}">{{ $base->bas_value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div>
    </div><!-- end col -->
</div>
<!-- end row -->
