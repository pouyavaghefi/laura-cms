@extends('admin.layouts.master')

@section('title',config('admin.panel')." - "."مدیریت چند رسانه ایی")

@section('page-title','چند رسانه ایی')

@section('wrapper')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="{{ route('adm.media.upload') }}" class="btn btn-primary">آپلود فایل</a>
                    </div>
                    <div class="col-sm-12">
                        <div class="card-box">
                            @include('admin.layouts.partials.alerts')

                            <table id="tech-companies-1" class="table  table-striped">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>نام</th>
                                    <th>فایل</th>
                                    <th>حجم</th>
                                    <th>پسوند</th>
                                    <th>پیوندها</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $menuCounter = 0;
                                        $previousGroupImages = null;
                                    @endphp

                                    @forelse($medias as $media)
                                        @php
                                            $showGroupImages = ($media->med_group_images !== $previousGroupImages);
                                            $previousGroupImages = $media->med_group_images;
                                        @endphp

                                        @if(!$showGroupImages)
                                            @php
                                                continue;
                                            @endphp
                                        @endif
                                        <tr>
                                            <th>{{ ++$menuCounter }}</th>
                                            <td>{{ pathinfo($media->med_name, PATHINFO_FILENAME) }}</td>
                                            <td>
                                                @if ((($media->med_mime_type == "image/png") || ($media->med_mime_type == "image/jpeg") || ($media->med_mime_type == "image/jpg")))
                                                    <a href="{{ asset('storage/' . str_replace('public/', '', $media->med_path)) }}" target="_blank">
                                                        <img src="{{ asset('storage/' . str_replace('public/', '', $media->med_path)) }}" alt="Thumbnail" style="width: 100px; height: auto;">
                                                    </a>
                                                @endif
                                            </td>
                                            <td>{{ $media->med_size }} {{ getFileSizeFormat($media->med_size) }}</td>
                                            <td>{{ $media->med_mime_type }}</td>
                                            <td>
                                                @if($showGroupImages)
                                                    @foreach(\App\Models\MediaLibrary::where('med_group_images', $media->med_group_images)->get() as $image)
                                                        <button class="btn btn-primary copy-btn" data-path="{{ $image->med_path }}">
                                                            کپی
                                                            {{ $image->med_dimension }}
                                                        </button>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ route('adm.media.delete', $media->id) }}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="btn btn-danger">حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        @php($colspan = 12)
                                        <tr>
                                            <td colspan="{{ $colspan }}" style="text-align: center">هیچ فایلی در دیتابیس یافت نشد</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @if ($medias->hasPages())
                                @include('admin.layouts.partials.pagination', ['paginatorVariable' => $medias])
                            @endif
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->

        @include('admin.layouts.includes.overall.footer')

    </div>
@endsection

@section('scripts')
    <script>
        const copyButtons = document.querySelectorAll('.copy-btn');
        const appUrl = "{{ env('APP_URL') }}";

        copyButtons.forEach(button => {
            button.addEventListener('click', () => {
                const path = button.getAttribute('data-path');
                const fullPath = appUrl + "/storage/" + path;
                var updatedPath = fullPath.replace(/\/public\//, '/');

                const tempInput = document.createElement('input');
                tempInput.setAttribute('value', updatedPath);
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand('copy');
                document.body.removeChild(tempInput);

                alert('کپی شد');
            });
        });
    </script>

@endsection

