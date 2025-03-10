@extends('admin.layouts.master')

@section('title',config('admin.panel')." - "."داشبورد")

@section('wrapper')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">فعال</a></li>
                                    <li><a href="#">متن اول</a></li>
                                    <li><a href="#">متن دوم</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">متن پاورقی</a></li>
                                </ul>
                            </div>

                            <h4 class="header-title m-t-0 m-b-30">درآمد کل</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1">
                                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                                           data-bgColor="#F9B9B9" value="58"
                                           data-skin="tron" data-angleOffset="180" data-readOnly=true
                                           data-thickness=".15"/>
                                </div>

                                <div class="widget-detail-1">
                                    <h2 class="p-t-10 m-b-0"> 256 </h2>
                                    <p class="text-muted">درآمد روزانه</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-6">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">فعال</a></li>
                                    <li><a href="#">متن اول</a></li>
                                    <li><a href="#">متن دوم</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">متن پاورقی</a></li>
                                </ul>
                            </div>

                            <h4 class="header-title m-t-0 m-b-30">آنالیز فروش</h4>

                            <div class="widget-box-2">
                                <div class="widget-detail-2">
                                    <span class="badge badge-success pull-left m-t-20">32% <i class="zmdi zmdi-trending-up"></i> </span>
                                    <h2 class="m-b-0"> 8451 </h2>
                                    <p class="text-muted m-b-25">درآمد امروز</p>
                                </div>
                                <div class="progress progress-bar-success-alt progress-sm m-b-0">
                                    <div class="progress-bar progress-bar-success" role="progressbar"
                                         aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                         style="width: 77%;">
                                        <span class="sr-only">77% مجموع</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-6">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">فعال</a></li>
                                    <li><a href="#">متن اول</a></li>
                                    <li><a href="#">متن دوم</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">متن پاورقی</a></li>
                                </ul>
                            </div>

                            <h4 class="header-title m-t-0 m-b-30">آمار</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1">
                                    <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#ffbd4a"
                                           data-bgColor="#FFE6BA" value="80"
                                           data-skin="tron" data-angleOffset="180" data-readOnly=true
                                           data-thickness=".15"/>
                                </div>
                                <div class="widget-detail-1">
                                    <h2 class="p-t-10 m-b-0"> 4569 </h2>
                                    <p class="text-muted">آمار امروز</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-6">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">فعال</a></li>
                                    <li><a href="#">متن اول</a></li>
                                    <li><a href="#">متن دوم</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">متن پاورقی</a></li>
                                </ul>
                            </div>

                            <h4 class="header-title m-t-0 m-b-30">فروش روزانه</h4>

                            <div class="widget-box-2">
                                <div class="widget-detail-2">
                                    <span class="badge badge-pink pull-left m-t-20">32% <i class="zmdi zmdi-trending-up"></i> </span>
                                    <h2 class="m-b-0"> 158 </h2>
                                    <p class="text-muted m-b-25">فروش امروز</p>
                                </div>
                                <div class="progress progress-bar-pink-alt progress-sm m-b-0">
                                    <div class="progress-bar progress-bar-pink" role="progressbar"
                                         aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                         style="width: 77%;">
                                        <span class="sr-only">77% مجموع</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">فعال</a></li>
                                    <li><a href="#">متن اول</a></li>
                                    <li><a href="#">متن دوم</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">متن پاورقی</a></li>
                                </ul>
                            </div>

                            <h4 class="header-title m-t-0">فروش روزانه</h4>

                            <div class="widget-chart text-center">
                                <div id="morris-donut-example"style="height: 245px;"></div>
                                <ul class="list-inline chart-detail-list m-b-0">
                                    <li>
                                        <h5 style="color: #ff8acc;"><i class="fa fa-circle m-r-5"></i>سری الف</h5>
                                    </li>
                                    <li>
                                        <h5 style="color: #5b69bc;"><i class="fa fa-circle m-r-5"></i>سری ب</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-lg-4">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">فعال</a></li>
                                    <li><a href="#">متن اول</a></li>
                                    <li><a href="#">متن دوم</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">متن پاورقی</a></li>
                                </ul>
                            </div>
                            <h4 class="header-title m-t-0">آمارها</h4>
                            <div id="morris-bar-example" style="height: 280px;"></div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-lg-4">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">فعال</a></li>
                                    <li><a href="#">متن اول</a></li>
                                    <li><a href="#">متن دوم</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">متن پاورقی</a></li>
                                </ul>
                            </div>
                            <h4 class="header-title m-t-0">مجموع درآمد</h4>
                            <div id="morris-line-example" style="height: 280px;"></div>
                        </div>
                    </div><!-- end col -->

                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card-box widget-user">
                            <div>
                                <img src="assets/images/users/avatar-1.jpg" class="img-responsive img-circle" alt="user">
                                <div class="wid-u-info">
                                    <h4 class="m-t-0 m-b-5 font-600">علی یدالهی</h4>
                                    <p class="text-muted m-b-5 font-13">ali.yadollahi7074@gmail.com</p>
                                    <small class="text-warning"><b>مدیر کل</b></small>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-6">
                        <div class="card-box widget-user">
                            <div>
                                <img src="assets/images/users/avatar-2.jpg" class="img-responsive img-circle" alt="user">
                                <div class="wid-u-info">
                                    <h4 class="m-t-0 m-b-5 font-600"> فرهاد پور هاشم</h4>
                                    <p class="text-muted m-b-5 font-13">faarhad@email.com</p>
                                    <small class="text-custom"><b>مدیر داخلی</b></small>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-6">
                        <div class="card-box widget-user">
                            <div>
                                <img src="assets/images/users/avatar-3.jpg" class="img-responsive img-circle" alt="user">
                                <div class="wid-u-info">
                                    <h4 class="m-t-0 m-b-5 font-600">خانم حسن زاده</h4>
                                    <p class="text-muted m-b-5 font-13">m.hasanzadeh@email.com</p>
                                    <small class="text-success"><b>مدیر مالی</b></small>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-6">
                        <div class="card-box widget-user">
                            <div>
                                <img src="assets/images/users/avatar-10.jpg" class="img-responsive img-circle" alt="user">
                                <div class="wid-u-info">
                                    <h4 class="m-t-0 m-b-5 font-600">آقای زارع</h4>
                                    <p class="text-muted m-b-5 font-13">zarepor@email.com</p>
                                    <small class="text-info"><b>بازاریاب</b></small>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-lg-4">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">فعال</a></li>
                                    <li><a href="#">متن اول</a></li>
                                    <li><a href="#">متن دوم</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">متن پاورقی</a></li>
                                </ul>
                            </div>

                            <h4 class="header-title m-t-0 m-b-30">جعبه دریافتی</h4>

                            <div class="inbox-widget nicescroll" style="height: 315px;">
                                <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="assets/images/users/avatar-1.jpg" class="img-circle" alt=""></div>
                                        <p class="inbox-item-author">کاربر اول</p>
                                        <p class="inbox-item-text">سلام دوست من این یک متن تستی است</p>
                                        <p class="inbox-item-date">13:40 ب:ظ</p>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="assets/images/users/avatar-2.jpg" class="img-circle" alt=""></div>
                                        <p class="inbox-item-author">کاربر دوم</p>
                                        <p class="inbox-item-text">سلام دوست من این یک متن تستی است</p>
                                        <p class="inbox-item-date">13:34 ب:ظ</p>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="assets/images/users/avatar-3.jpg" class="img-circle" alt=""></div>
                                        <p class="inbox-item-author">کاربر سوم</p>
                                        <p class="inbox-item-text">سلام دوست من این یک متن تستی است</p>
                                        <p class="inbox-item-date">13:17 ق::ظ</p>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="assets/images/users/avatar-4.jpg" class="img-circle" alt=""></div>
                                        <p class="inbox-item-author">کاربر چهارم</p>
                                        <p class="inbox-item-text">سلام دوست من این یک متن تستی است</p>
                                        <p class="inbox-item-date">12:20 ب:ظ</p>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="inbox-item">
                                        <div class="inbox-item-img"><img src="assets/images/users/avatar-5.jpg" class="img-circle" alt=""></div>
                                        <p class="inbox-item-author">کاربر پنجم</p>
                                        <p class="inbox-item-text">سلام دوست من این یک متن تستی است</p>
                                        <p class="inbox-item-date">10:15 ق:ظ</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-lg-8">
                        <div class="card-box">
                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">فعال</a></li>
                                    <li><a href="#">متن اول</a></li>
                                    <li><a href="#">متن دوم</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">متن پاورقی</a></li>
                                </ul>
                            </div>

                            <h4 class="header-title m-t-0 m-b-30">آخرین پروژه های اجرا شده</h4>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام پروژه</th>
                                        <th>تاریخ شروع</th>
                                        <th>سررسید</th>
                                        <th>وضعیت</th>
                                        <th>نوع</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>آقای ادمین</td>
                                        <td>01/01/2016</td>
                                        <td>26/04/2016</td>
                                        <td><span class="label label-danger">به اتمام رسید</span></td>
                                        <td>قالب HTML</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>املاک نیاوران</td>
                                        <td>01/01/2016</td>
                                        <td>26/04/2016</td>
                                        <td><span class="label label-success">در حال برسی</span></td>
                                        <td>قالب وردپرس</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>اپ شرط بندی</td>
                                        <td>01/05/2016</td>
                                        <td>10/05/2016</td>
                                        <td><span class="label label-pink">اجرا شده</span></td>
                                        <td>اندروید</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>اپ شرط بندی</td>
                                        <td>01/01/2016</td>
                                        <td>31/05/2016</td>
                                        <td><span class="label label-purple">تست نهایی</span>
                                        </td>
                                        <td>آی او اس</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>چت روم ایرانی</td>
                                        <td>01/01/2016</td>
                                        <td>31/05/2016</td>
                                        <td><span class="label label-warning">به زودی</span></td>
                                        <td>لاراول</td>
                                    </tr>

                                    <tr>
                                        <td>6</td>
                                        <td>حساب یار</td>
                                        <td>01/01/2016</td>
                                        <td>31/05/2016</td>
                                        <td><span class="label label-primary">به زودی</span></td>
                                        <td>برنامه ویندوزی</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- end col -->

                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->

        @include('admin.layouts.includes.overall.footer')

    </div>
@endsection
