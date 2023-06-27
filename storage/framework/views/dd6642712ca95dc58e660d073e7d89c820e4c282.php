
  
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php echo e(__('students')); ?></div>
  
                <div class="card-body">
                    <?php if(auth()->user()->type == 'Admin'): ?>
                        <a href="<?php echo e(route('students.create')); ?>" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                            Create Student
                        </a>
                    <?php endif; ?>
                        <a href="<?php echo e(route('students.search')); ?>" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                            Search Student
                        </a>
                <table id="students-table" class="datatable table table-bordered table-striped table-custom">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
            
                    <tbody class="tbody-custom">
                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td> <?php echo e($student->name); ?> </td>
                                <td>        
                                    <?php if(auth()->user()->type == 'Admin'): ?>
                                        <a href="<?php echo e(route('students.view', $student)); ?>" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\arturo-app\resources\views/students/index.blade.php ENDPATH**/ ?>