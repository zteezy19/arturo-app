
  
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php echo e(__('Search Results')); ?></div>
  
                <div class="card-body">
                    <a href="<?php echo e(route('subjects.search')); ?>" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                        Search Again
                    </a>
                    <?php if(count($subjects) != 0): ?>
                        <table id="subjects-table" class="datatable table table-bordered table-striped table-custom">
                            <thead>
                                <tr>
                                    <th>Name</th>
            
                                </tr>
                            </thead>
                    
                            <tbody class="tbody-custom">
                                <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td> <?php echo e($student->name); ?> </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        No subjects Found
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\arturo-app\resources\views/subjects/searchResult.blade.php ENDPATH**/ ?>