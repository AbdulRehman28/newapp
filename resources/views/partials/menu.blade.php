<div class="side-bar-main">
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
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

                    @endcan
                    @can('product_management_access')
                    <li class="nav-item treeview {{ request()->is("admin/products") || request()->is("admin/products/*") ? "active" : "" }}">
                    <a href="#" class="nav-link nav-dropdown-toggle">
                        <i class="fa-fw fas fa-shopping-cart">

                        </i>
                        <span>Product Management</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('category_access')
                            <li class="{{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.categories.index") }}">
                                <i class="fa-fw fas fa-folder"></i>
                                    <span>Category</span>
                                </a>
                            </li>
                        @endcan
                        @can('sub_category_access')
                            <li class="{{ request()->is("admin/sub-categories") || request()->is("admin/sub-categories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.sub-categories.index") }}">
                                <i class="fa-fw fas fa-folder"></i>
                                    <span>Sub Category</span>
                                </a>
                            </li>
                        @endcan
                        @can('product_access')
                            <li class="{{ request()->is("admin/products") || request()->is("admin/products/*") ? "active" : "" }}">
                                <a href="{{ route("admin.products.index") }}">
                                <i class="fa-fw fas fa-folder"></i>
                                    <span>Products</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
                    @can('user_access')
                                    <li class="nav-item">
                                        <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                            <i class="fa-fw nav-icon fas fa-user">

                                            </i>
                                            <p>
                                                {{ trans('cruds.user.title') }}
                                            </p>
                                        </a>
                                    </li>
                    @endcan
                    @can('newspaper_access')
                                    <li class="nav-item">
                                        <a href="{{ route("admin.newspaper.index") }}" class="nav-link {{ request()->is("admin/newspaper") || request()->is("admin/newspaper/*") ? "active" : "" }}">
                                            <i class="fa-fw nav-icon fas fa-user">
                                            </i>
                                            <p>
                                                News Paper
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                    @can('newspaperdetails_access')
                                    <li class="nav-item">
                                        <a href="{{ route("admin.newspaper-details.index") }}" class="nav-link {{ request()->is("admin/newspaper-details") || request()->is("admin/newspaper-details/*") ? "active" : "" }}">
                                            <i class="fa-fw nav-icon fas fa-user">
                                            </i>
                                            <p>
                                                News Paper Details
                                            </p>
                                        </a>
                                    </li>
                    @endcan
                    @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                        @can('profile_password_edit')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                    <i class="fa-fw fas fa-key nav-icon">
                                    </i>
                                    <p>
                                        {{ trans('global.change_password') }}
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
