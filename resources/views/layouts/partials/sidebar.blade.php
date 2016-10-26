<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        {{-- @if ($currentUser)
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{!! asset('/img/user2-160x160.jpg') !!}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{!! $currentUser->name !!}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {!! trans('adminlte_lang::message.online') !!}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{!! trans('adminlte_lang::message.search') !!}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form --> --}}

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            @permission('*')
                <li class="header text-uppercase">{!! trans('common.admin') !!}</li>
                @role('administrator')
                <li><a href="{!! route('admin.settings.index') !!}"><i class='fa fa-cogs'></i> <span>{!! trans('settings.site') !!}</span></a></li>
                @endrole
                @permission('manage-users')
                <li class="treeview {!! Request::segment(2) == 'users' ? 'active' : null !!}">
                    <a href="#"><i class="fa fa-users"></i><span>{!! trans('users.heading') !!}</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{!! route('admin.users.index') !!}"><i class='fa fa-user'></i> <span>{!! trans('users.all_users') !!}</span></a></li>
                        <li><a href="{!! route('admin.users.create') !!}"><i class='fa fa-user-plus'></i> <span>{!! trans('users.create_user') !!}</span></a>
                        </li><li><a href="{!! route('admin.users.deleted') !!}"><i class='fa fa-trash'></i> <span>{!! trans('users.deleted_users') !!}</span></a></li>
                    </ul>
                </li>
                @endpermission
                @permission('manage-roles')
                <li class="treeview {!! Request::segment(2) == 'roles' ? 'active' : null !!}">
                    <a href="#"><i class="fa fa-bullhorn"></i><span>{!! trans('roles.heading') !!}</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{!! route('admin.roles.index') !!}"><i class='fa fa-user'></i> <span>{!! trans('roles.all_roles') !!}</span></a></li>
                        <li><a href="{!! route('admin.roles.create') !!}"><i class='fa fa-user-plus'></i> <span>{!! trans('roles.create_role') !!}</span></a>
                    </ul>
                </li>
                @endpermission
            @endpermission
            <li class="header text-uppercase">{!! trans('common.navigation') !!}</li>
            <li {!! Request::is('home') ? ' class="active"' : null !!}><a href="{!! url('home') !!}"><i class='fa fa-home'></i> <span>{!! trans('message.home') !!}</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
