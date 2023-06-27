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

            <h4 class="header-title m-t-0 m-b-30">لیست اطلاعات پایه (ادمین)</h4>

            <div class="btn-toolbar" role="toolbar" aria-label="actions">
                <a href="{{ route('adm.base.new') }}" class="btn btn-success">اضافه کردن اطلاعات جدید</a>
                <a href="{{ route('adm.base.reset') }}" class="btn btn-warning" onclick="showLoader(this)">برگرداندن اطلاعات پایه به حالت اولیه</a>
            </div>
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>نوع</th>
                    <th>مقدار</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @php($menuCounter = 0)
                @forelse($bases as $base)
                    <tr>
                        <td>{{ ++$menuCounter }}</td>
                        <td>{{ $base->bas_type }}</td>
                        <td>{{ $base->bas_value }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="actions">
                                <a href="{{ route('adm.base.edit', $base->id) }}" class="btn btn-info btn-success">ویرایش</a>
                                <form method="POST" action="{{ route('adm.base.delete', $base->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger">حذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
            @if ($bases->hasPages())
                @include('admin.layouts.partials.pagination', ['paginatorVariable' => $bases])
            @endif
        </div>
    </div><!-- end col -->
</div>
