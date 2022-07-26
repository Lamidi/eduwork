<?php $__env->startSection('header','DASBOARD'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?php echo e($total_karyawan); ?></h3>
                    <p>TOTAL PRESENSI</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                </div>
                <a href="<?php echo e(url('masuk')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<script src="<?php echo e(asset('assets/plugins/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/dist/js/adminlte.min.js?v=3.2.0')); ?>"></script>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\eduwork\absensi\resources\views/home.blade.php ENDPATH**/ ?>