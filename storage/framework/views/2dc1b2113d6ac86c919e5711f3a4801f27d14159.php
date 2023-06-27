
  
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?></div>
  
                <div class="card-body">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
  
                    <?php if(auth()->user()->type == 'Admin'): ?>
                        
                        <a href="<?php echo e(route('educators.index')); ?>" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                            Educators
                        </a>
                        <a href="<?php echo e(route('students.index')); ?>" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                            Students
                        </a>
                        <a href="<?php echo e(route('subjects.index')); ?>" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                            Subjects
                        </a>
                    <?php endif; ?>

                    <?php if(auth()->user()->type == 'Educator'): ?>
                        <a href="<?php echo e(route('students.index')); ?>" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                            Students
                        </a>
                        <a href="<?php echo e(route('subjects.index')); ?>" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                            Subject
                        </a>
                    <?php endif; ?>

                    <?php if(auth()->user()->type == 'Student'): ?>
                        <a href="<?php echo e(route('subjects.index')); ?>" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                            Subjects
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\arturo-app\resources\views/dashboard.blade.php ENDPATH**/ ?>