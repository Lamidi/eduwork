<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?php echo e(asset('assets/dist/img/AdminLTELogo.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Presensi Karyawan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo e(asset('assets/dist/img/user2-160x160.jpg')); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo e(auth()->user()->name); ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="<?php echo e(url('home')); ?>" class="nav-link <?php echo e(request()->is('home')?'active':''); ?>">
                        <i class="nav-icon fas fa-house"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
                <li class="nav-item menu-open">
                    <a href="<?php echo e(url('rekap_karyawan')); ?>" class="nav-link <?php echo e(request()->is('rekap_karyawan')?'active':''); ?>">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                            Data Karyawan
                        </p>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside><?php /**PATH C:\xampp\htdocs\eduwork\absensi\resources\views/Template/sidebar.blade.php ENDPATH**/ ?>