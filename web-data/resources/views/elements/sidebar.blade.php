<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light">duck-rack</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Dashboard</li>
                <li class="nav-item">
                    <a href="/admin/questions" class="nav-link @if(request()->is('admin/questions*')) active @endif">
                        <i class="nav-icon fa fa-circle text-info"></i>
                        <p>質問</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/users" class="nav-link @if(request()->is('admin/users*')) active @endif">
                        <i class="nav-icon fa fa-circle text-info"></i>
                        <p>ユーザー</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
