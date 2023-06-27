
  
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php echo e(__('Educators')); ?></div>
  
                <div class="card-body">

                <table id="subjects-table" class="datatable table table-bordered table-striped table-custom">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
            
                    <tbody class="tbody-custom">
                        <?php $__currentLoopData = $educators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $educator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td> <?php echo e($educator->name); ?> </td>
                                <td>        
                                    <?php if(auth()->user()->type == 'Admin'): ?>
                                        <a href="<?php echo e(route('educators.view', $educator)); ?>" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                                            Edit
                                        </a>
                                    <?php endif; ?> 
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\arturo-app\resources\views/educators/index.blade.php ENDPATH**/ ?>