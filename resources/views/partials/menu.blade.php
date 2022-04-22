<div class="side-bar-main">
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
        <!-- Brand Logo -->
        <a href="{{route('home')}}" class="brand-link">
            {{-- <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span> --}}
            <img class="brand-text font-weight-light site-logo" src="{{asset('images/c-logo.png')}}" alt="not found">
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("admin.home") }}">
                            <i class="fas fa-fw fa-tachometer-alt nav-icon">
                            </i>
                            <p>
                                {{ trans('global.dashboard') }}
                            </p>
                        </a>
                    </li>
                    @can('user_management_access')
                        <li class="nav-item has-treeview {{ request()->is("admin/categories*") ? "menu-open" : "" }} {{ request()->is("admin/sub-categories*") ? "menu-open" : "" }} {{ request()->is("admin/products*") ? "menu-open" : "" }}">
                            <a class="nav-link nav-dropdown-toggle" href="#">
                                <i class="fa-fw nav-icon fas fa-users">
                                </i>
                                <p>
                                    Product Management
                                    <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('category_access')
                                    <li class="nav-item">
                                        <a href="{{ route("admin.categories.index") }}" class="nav-link {{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "active" : "" }}">
                                            <i class="fa-fw nav-icon fas fa-unlock-alt">
                                            </i>
                                            <p>
                                               Categories
                                            </p>
                                        </a>
                                     </li>
                                @endcan
                                @can('sub_category_access')
                                    <li class="nav-item">
                                        <a href="{{ route("admin.sub-categories.index") }}" class="nav-link {{ request()->is("admin/sub-categories") || request()->is("admin/sub-categories/*") ? "active" : "" }}">
                                            <i class="fa-fw nav-icon fas fa-briefcase">

                                            </i>
                                            <p>
                                                Sub Categories
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                                @can('product_access')
                                    <li class="nav-item">
                                        <a href="{{ route("admin.products.index") }}" class="nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "active" : "" }}">
                                            <i class="fa-fw nav-icon fas fa-user">

                                            </i>
                                            <p>
                                                Products
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    @can('pain_access')
                        <li class="nav-item">
                            <a href="{{ route("admin.pains.index") }}" class="nav-link {{ request()->is("admin/pains") || request()->is("admin/pains/*") ? "active" : "" }}">
                                <i class="fa fa-object-group nav-icon" ></i>
                                <p>
                                    {{-- {{ trans('cruds.pain.title') }} --}}
                                    Categories
                                </p>
                            </a>
                        </li>
                    @endcan
                    @can('pain_type_access')
                        <li class="nav-item">
                            <a href="{{ route("admin.pain-types.index") }}" class="nav-link {{ request()->is("admin/pain-types") || request()->is("admin/pain-types/*") ? "active" : "" }}">
                                <i class='fa fa-list nav-icon'></i>
                                <p>
                                    {{ trans('cruds.painType.title') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                    @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                        @can('profile_password_edit')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                    {{-- <i class="fa-fw fas fa-key nav-icon"></i> --}}
                                        <i class="fa fa-user nav-icon">
                                        </i>
                                    <p>
                                        {{-- {{ trans('global.change_password') }} --}}
                                        Profile
                                    </p>
                                </a>
                            </li>
                        @endcan
                    @endif
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                            <p>
                                <i class="fas fa-fw fa-sign-out-alt nav-icon">

                                </i>
                                <p>{{ trans('global.logout') }}</p>
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    </div>
