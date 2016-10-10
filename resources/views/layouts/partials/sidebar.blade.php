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
            <li class="header">{!! trans('common.sidebar.admin') !!}</li>
            <li class="treeview {!! Request::segment(2) == 'users' ? 'active' : null !!}">
                <a href="#"><i class="fa fa-user"></i><span>{!! trans('usermanagement.title') !!}</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{!! route('admin.users.index') !!}"><i class='fa fa-user'></i> <span>{!! trans('usermanagement.all_users') !!}</span></a></li>
                    <li><a href="{!! route('admin.users.create') !!}"><i class='fa fa-user-plus'></i> <span>{!! trans('usermanagement.create_user') !!}</span></a>
                    </li><li><a href="{!! route('admin.users.deleted') !!}"><i class='fa fa-trash'></i> <span>{!! trans('usermanagement.deleted_users') !!}</span></a></li>
                </ul>
            </li>
            <li class="header">{!! trans('common.sidebar.navigation') !!}</li>
            <li {!! Request::is('home') ? ' class="active"' : null !!}><a href="{!! url('home') !!}"><i class='fa fa-home'></i> <span>{!! trans('adminlte_lang::message.home') !!}</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
