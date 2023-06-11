<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>کد شخص</label>
                        <input type="text" class="form-control" name="personalCode" value="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>نام شخص</label>
                        <input type="text" class="form-control" name="fullName" value="">
                    </div>
                </div>
                <div class="col-md-3">

                    <div class="form-group">
                        <label>جنسیت</label>
                        <select class="form-control" name="gender">
                            <option value>انتخاب نمایید...</option>
                            <option
                                value="4" >
                                مرد
                            </option>
                            <option
                                value="3" >
                                زن
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>نوع شخص</label>
                        <select class="form-control" name="typePerson">
                            <option value>انتخاب نمایید...</option>
                            <option  value="50">دانش آموز</option>
                            <option  value="51">  معلم</option>
                            <option  value="201">کارشناس نهاد</option>
                            <option  value="200">  کارشناس آزمایشگاه</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>شماره ملی</label>
                        <input type="text" class="form-control" name="nationalCode" value="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>شماره همراه</label>
                        <input type="text" class="form-control" name="mobile" value="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>تکمیل اطلاعات</label>
                        <select class="form-control" name="notCompleteInformation">
                            <option value>انتخاب نمایید...</option>
                            <option  value="1">کسانی که کد شخص ندارند</option>
                            <option  value="2">کسانی که کد شخص دارند</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>وضعیت شخص </label>
                        <select class="form-control" name="isActive">
                            <option value> انتخاب نمایید...</option>
                            <option  value="فعال">فعال</option>
                            <option  value="غیر فعال">غیر فعال</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group float-left">
                        <button class="btn btn-primary">جستجو</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
