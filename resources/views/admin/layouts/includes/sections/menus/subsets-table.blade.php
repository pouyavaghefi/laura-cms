<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            @include('admin.layouts.partials.alerts')

            <h4 class="header-title m-t-0 m-b-30">زیرمنوهای های منوی
                <a href="/admin/menus/{{ $menu->id }}/edit">{{ $menu->men_name }}</a>
            </h4>

            <a href="{{ route('adm.menus.subsets.create', $menu->id) }}" class="btn btn-primary">ایجاد زیرمجموعه</a>
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>نام</th>
                        <th>فعال</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php($menuCounter = 0)
                    @forelse($menu->menuLinks as $link)
                        <tr>
                            <td>{{ ++$menuCounter }}</td>
                            <td>
                                <a href="{{ $link->mel_link }}" target="_blank">
                                {{ $link->linkName() }}
                                </a>
                            </td>
                            <td>
                                @if($link->linkStatus($link->mel_status))
                                    <span class="circle-checkmark" title="برای تغییر وضعیت فعال بودن کلیک کنید" onclick="changeActivation({{$link->id}})">✓</span>
                                @else
                                    <span class="cross-sign" title="برای تغییر وضعیت فعال بودن کلیک کنید" onclick="changeActivation({{$link->id}})">x</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="actions">
                                    <a href="{{ route('adm.menus.subsets.edit', ['menuId' => $menu->id , 'linkId' => $link->id]) }}" class="btn btn-secondary btn-success">ویرایش</a>
                                    <form method="POST" action="{{ route('adm.menus.subsets.delete', ['menuId' => $menu->id, 'linkId' => $link->id]) }}">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger">حذف</button>
                                    </form>
                                    @if(empty($link->mel_parent_id))
                                        <a onclick="editPriority({{ $link->id }},{{ $countParents }})" class="btn btn-info btn-success">
                                            ثبت اولویت
                                            @if(!empty($link->mel_priority))
                                            ({{ $link->mel_priority }})
                                            @endif
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        @php($colspan = 12)
                        <tr>
                            <td colspan="{{ $colspan }}" style="text-align: center">هیچ زیرمنویی هنوز تعریف نشده</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div><!-- end col -->
</div>
