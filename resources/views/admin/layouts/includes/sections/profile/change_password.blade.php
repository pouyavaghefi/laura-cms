<form method="POST" action="{{ route('adm.profile.details.update.password') }}">
    @csrf
    @method('PATCH')

    <div class="card-box">
        <h4 class="header-title m-t-0 m-b-30">رمز عبور</h4>
        <h6 class="header-title red-para">رمز عبور بایستی شامل حروف بزرگ و کوچک انگلیسی و اعداد و نمادها باشد</h6><br>

        <div class="form-group">
                <input type="password" name="password_old" class="form-control @error('password_old') is-invalid @enderror" placeholder="رمز عبور فعلی خود را وارد کنید">
                @error('password_old')
                <span class="text-danger">{{ $message }}</span>
                @enderror
        </div>
        <div class="form-group">
                <input type="password" name="password_new" class="form-control @error('password_new') is-invalid @enderror" placeholder="رمز عبور جدید خود را وارد کنید">
                @error('password_new')
                <span class="text-danger">{{ $message }}</span>
                @enderror
        </div>
        <div class="form-group">
                <input type="password" name="password_new_confirmation" class="form-control @error('password_new_confirmation') is-invalid @enderror" placeholder="رمز عبور جدید خود را تایید کنید">
                @error('password_new_confirmation')
                <span class="text-danger">{{ $message }}</span>
                @enderror
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-info" onclick="generatePassword()">تولید رمز عبور قوی جدید</button>
            <input type="text" id="generated_password" name="generated_password" class="form-control" readonly>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <button id="button" class="btn btn-primary btn-block" onclick="showLoader(this)">
                بروزرسانی
            </button>
        </div>
    </div>
</form>
