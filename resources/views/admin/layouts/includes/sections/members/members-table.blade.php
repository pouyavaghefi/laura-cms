<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="header-title m-t-0 m-b-30">کاربران سامانه</h4>

            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>نام کاربری</th>
                    <th>ایمیل</th>
                    <th>فعال</th>
                    <th>اخرین ورود</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @php($menuCounter = 0)
                @forelse($members as $member)
                    <tr>
                        <td>{{ ++$menuCounter }}</td>
                        <td>
                            <a href="{{ route('adm.profile.others', ['uname'=>$member->user->usr_name]) }}">
                                {{ $member->user->usr_name }}
                            </a>
                        </td>
                        <td>
                            @if($member->user->usr_email_verified_at)
                                <span class="circle-checkmark-light" title=" تایید شده: {{ digits_persian(jdate($member->user->usr_email_verified_at)->ago()) }}">✓</span>
                            @endif

                            <a href="mailto:{{ $member->user->usr_email }}">
                                {{ $member->user->usr_email }}
                            </a>
                        </td>
                        <td>
                            <span class="circle-checkmark">✓</span>
                        </td>
                        <td>@if($member->user->usr_last_login_at) {{ digits_persian(jdate($member->user->usr_last_login_at)->ago()) }} @endif</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('adm.members.edit', $member->user->id) }}" class="btn btn-secondary btn-success">مشاهده اطلاعات</a>

                                @if(!$member->user->own($member->mbr_usr_id))
                                    <a class="btn btn-secondary btn-danger">حذف کاربر</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
            @if ($members->hasPages())
                @include('admin.layouts.partials.pagination', ['paginatorVariable' => $members])
            @endif
        </div>
    </div><!-- end col -->
</div>
