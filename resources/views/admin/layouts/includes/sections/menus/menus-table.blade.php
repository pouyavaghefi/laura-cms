<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            @include('admin.layouts.partials.alerts')

            <h4 class="header-title m-t-0 m-b-30">منو های ایجاد شده</h4>

            <a href="{{ route('adm.menus.create') }}" class="btn btn-primary">ایجاد منو</a>
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>توضیح</th>
                    <th>تعداد لینک ها</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @php($menuCounter = 0)
                @forelse($menus as $menu)
                    <tr>
                        <td>{{ ++$menuCounter }}</td>
                        <td>
                            {{ $menu->men_name }}
                        </td>
                        <td>
                            {{ $menu->men_description }}
                        </td>
                        <td>
                            {{ count($menu->menuLinks) }}
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="actions">
                                <a href="{{ route('adm.menus.edit', $menu->id) }}" class="btn btn-success">ویرایش</a>
                                <form method="POST" action="{{ route('adm.menus.delete', $menu->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger">حذف</button>
                                </form>
                                <a href="{{ route('adm.menus.subsets', $menu->id) }}" class="btn btn-warning">مشاهده زیر منو ها</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    @php($colspan = 12)
                    <tr>
                        <td colspan="{{ $colspan }}" style="text-align: center">هیچ منویی ساخته نشده است</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            @if ($menus->hasPages())
                @include('admin.layouts.partials.pagination', ['paginatorVariable' => $menus])
            @endif
        </div>
    </div><!-- end col -->
</div>
