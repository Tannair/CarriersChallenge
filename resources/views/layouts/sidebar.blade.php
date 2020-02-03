@section('body_class', 'sidebar-mini')
<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4  sidebar-light-orange">
    <!-- Brand Logo -->
    <a href="{{route('funcionarios')}}" class="brand-link">
        <img src="{{ asset(config('adminlte.logo_img', 'vendor/adminlte/dist/img/AdminLTELogo.png')) }}" alt="Laravel Starter" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Carriers Challenge </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('funcionarios')}}" class="nav-link active">
                        <i class="nav-icon far fa-address-card"></i>
                        <p>
                            Funcionários
                        </p>
                    </a>
                </li>

              {{--  <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>SAIR</p>
                    </a>
                </li>--}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
