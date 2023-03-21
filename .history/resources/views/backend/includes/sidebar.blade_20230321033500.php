<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                @lang('menus.backend.sidebar.general')
            </li>
            @if($logged_in_user->role_user === "akreditasi_admin")
            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('admin/master'))
                }}" href="{{ route('admin.master') }}">
                    <i class="nav-icon fas fa-database"></i>
                    BAB/STANDAR/EP
                </a>
            </li>
            @if($logged_in_user->role_user === "akreditasi_admin")
            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('admin/nilai'))
                }}" href="{{ route('admin.nilai') }}">
                    <i class=" nav-icon fas fa-percentage"></i>
                    NILAI AKREDITASI
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('admin/upload'))
                }}" href="{{ route('admin.upload') }}">
                    <i class="nav-icon fas fa-upload"></i>
                    UPLOAD FILE
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Route::is('admin/dashboard'))
                }}" href="{{ route('admin.dashboard') }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    NILAI DOKUMEN
                </a>
            </li>  
        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->