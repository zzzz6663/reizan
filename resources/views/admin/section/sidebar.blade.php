<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/manager/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">
                    {{auth()->user()->name.' '.auth()->user()->family}}
                    <br>{{__('arr.'.auth()->user()->level)}}
        </span>
    </a>
    <a href="{{route('logout')}}" class="btn btn-danger"> خروج</a>

    <!-- Sidebar -->

    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">

                 </div>

            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                  @canany([ 'is_admin' ])
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{route('cats.index')}}" class="nav-link {{(Route::currentRouteName()=='cats.index')?'active':''}} ">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>
                                دسته بندی ها
                            </p>
                        </a>

                    </li>
                    @endcanany


                    @can('is_admin')
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{route('products.index')}}" class="nav-link {{(Route::currentRouteName()=='products.index')?'active':''}} ">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>
                                محصولات
                            </p>
                        </a>
                    </li>
                    @endcan

                    @can('is_admin')
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{route('admin.staff')}}" class="nav-link {{(Route::currentRouteName()=='admin.staff')?'active':''}} ">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>
                                کابران
                            </p>
                        </a>
                    </li>
                    @endcan


                    @can('is_admin')
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{route('admin.customer')}}" class="nav-link {{(Route::currentRouteName()=='admin.customer')?'active':''}} ">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>
                                نمایندگی ها
                            </p>
                        </a>
                    </li>
                    @endcan


{{--                    <li class="nav-item has-treeview menu-open">--}}
{{--                        <a href="{{route('setting.index')}}" class="nav-link {{(Route::currentRouteName()=='setting.index')?'active':''}} ">--}}
{{--                            <i class="nav-icon fa fa-cogs"></i>--}}
{{--                            <p>--}}
{{--                                تنظیمات--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                     @can('is_admin')
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{route('slider.index')}}" class="nav-link {{(Route::currentRouteName()=='slider.index')?'active':''}} ">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>
                                اسلایدر
                            </p>
                        </a>
                    </li>
                    @endcan
                    @can('is_admin')
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{route('part.index')}}" class="nav-link {{(Route::currentRouteName()=='part.index')?'active':''}} ">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>
                                قطعات
                            </p>
                        </a>
                    </li>
                    @endcan
                    @can('is_admin')
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{route('service.index')}}" class="nav-link {{(Route::currentRouteName()=='service.index')?'active':''}} ">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>
                                خدمات
                            </p>
                        </a>
                    </li>
                    @endcan
                    @can('is_admin')
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{route('customers.index')}}" class="nav-link {{(Route::currentRouteName()=='customers.index')?'active':''}} ">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>
                                مشتری های  ما
                            </p>
                        </a>
                    </li>
                    @endcan
                    @can('is_admin')
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{route('version.index')}}" class="nav-link {{(Route::currentRouteName()=='version.index')?'active':''}} ">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>
                               ورژن ها
                            </p>
                        </a>
                    </li>
                    @endcan
                    @can('is_admin')
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{route('color.index')}}" class="nav-link {{(Route::currentRouteName()=='color.index')?'active':''}} ">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>
                                رنگ ها
                            </p>
                        </a>
                    </li>
                    @endcan
                    @canany([ 'is_admin' ,'is_operator'])
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{route('barcode.index')}}" class="nav-link {{(Route::currentRouteName()=='barcode.index')?'active':''}} ">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>
                                بارکد
                            </p>
                        </a>
                    </li>
                    @endcanany

                    @canany([ 'is_admin' ,'is_accountant'])
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{route('admin.accountant.all')}}" class="nav-link {{(Route::currentRouteName()=='admin.accountant.all')?'active':''}} ">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>
                                حسابداری
                            </p>
                        </a>
                    </li>
                    @endcanany
                    @canany([ 'is_admin' ,'is_service'])
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{route('repair.index')}}" class="nav-link {{(Route::currentRouteName()=='repair.index')?'active':''}} ">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>
                                ثبت خرابی
                            </p>
                        </a>
                    </li>

                    @endcanany
                    @canany(['is_admin',  'is_service'])
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{route('repair.list')}}" class="nav-link {{(Route::currentRouteName()=='repair.list')?'active':''}} ">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>
                                  لیست خرابی
                            </p>
                        </a>
                    </li>

                    @endcanany
                    @can('is_admin')
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{route('poll.index')}}" class="nav-link {{(Route::currentRouteName()=='poll.index')?'active':''}} ">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>
                              نظر سنجی
                            </p>
                        </a>
                    </li>
                    @endcan
                    @can('is_admin')
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{route('admin.form')}}" class="nav-link {{(Route::currentRouteName()=='admin.form')?'active':''}} ">
                            <i class="nav-icon fa fa-cogs"></i>
                            <p>
                                گزارشات
                            </p>
                        </a>
                    </li>
                    @endcan

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>


