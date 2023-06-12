<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            @include('admin.layouts.partials.success')
            @if(session()->has('deletedCount'))
                <div class="alert alert-success">
                    تعداد
                    {{ session('deletedCount') }}
                    رکورد حذف گردید
                </div>
            @endif

            <h4 class="header-title m-t-0 m-b-30">لیست ارورها (ادمین)</h4>

            <div class="btn-toolbar" role="toolbar" aria-label="actions">
                <a href="{{ route('adm.error.delete.all') }}" class="btn btn-danger" onclick="showLoader(this)">حذف همه ارورها</a>
                <a href="{{ route('adm.error.delete.all.exceptStars') }}" class="btn btn-warning" onclick="showLoader(this)">حذف همه ارورها به جز ستاره دارها</a>
            </div>
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>ارور</th>
                    <th>صفحه</th>
                    <th>متد</th>
                    <th>توسط</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @php($menuCounter = 0)
                @forelse($errors as $error)
                    <tr>
                        <td>{{ ++$menuCounter }}</td>
                        <td>
                            @if($error->err_starred)
                                <span class="fa fa-star checked" onclick="removeStar({{ $error->id }}, '{{ csrf_token() }}')" title="حذف ستاره"></span>
                            @endif
                            <code class="text-bold">{{ $error->err_message }}</code>
                        </td>
                        <td>{{ $error->err_page }}</td>
                        <td>{{ $error->err_method }}</td>
                        <td>{{ $error->errMaker->usr_name }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="actions">
                                <a href="{{ route('adm.error.info', $error->id) }}" class="btn btn-info btn-success">مشاهده جزییات</a>
                                <form method="POST" action="{{ route('adm.error.delete', $error->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger">حذف</button>
                                </form>
                                <a href="{{ route('adm.error.makeStar', $error->id) }}" class="btn btn-info btn-warning">ستاره دار کردن</a>
                            </div>
                        </td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
            @if ($errors->hasPages())
                @include('admin.layouts.partials.pagination', ['paginatorVariable' => $errors])
            @endif
        </div>
    </div><!-- end col -->
</div>
