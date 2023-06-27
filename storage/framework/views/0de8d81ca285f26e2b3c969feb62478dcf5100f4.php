
  
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php echo e(__('Subjects')); ?></div>
  
                <div class="card-body">
                    <?php if(auth()->user()->type == 'Admin'): ?>
                        <a href="<?php echo e(route('subjects.create')); ?>" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                            Create Subject
                        </a>
                    <?php endif; ?>
                    <a href="<?php echo e(route('subjects.search')); ?>" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                        Search Subject
                    </a>
                <table id="subjects-table" class="datatable table table-bordered table-striped table-custom">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
            
                    <tbody class="tbody-custom">
                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td> <?php echo e($subject->name); ?> </td>
                                <td> <?php echo e($subject->status); ?>  </td>
                                <td>        
                                    <?php if(auth()->user()->type == 'Admin'): ?>
                                        <a href="<?php echo e(route('subjects.edit', $subject)); ?>" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                                            Edit
                                        </a>
                                        <a href="<?php echo e(route('subjects.view', $subject)); ?>" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                                            View
                                        </a>
                                    <?php endif; ?>
                                    <?php if(auth()->user()->type == 'Educator'): ?>
                                        <?php if(in_array($subject->id, $educatorSubjects)): ?>
                                            <a href="<?php echo e(route('subjects.view', $subject)); ?>" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                                                View
                                            </a>
                                            <a href="<?php echo e(route('subjects.unteach', $subject)); ?>" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                                                Unteach
                                            </a>
                                            
                                        <?php else: ?>
                                            <a href="<?php echo e(route('subjects.teach', $subject)); ?>" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                                                Teach
                                            </a>
                                        <?php endif; ?> 
                                    <?php endif; ?> 
                                    <?php if(auth()->user()->type == 'Student'): ?>
                                        <?php if(in_array($subject->id, $studentSubjects)): ?>
                                            <a href="<?php echo e(route('subjects.unenroll', $subject)); ?>" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                                                Withdraw
                                            </a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('subjects.enroll', $subject)); ?>" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                                                Enroll
                                            </a>
                                        <?php endif; ?> 
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\arturo-app\resources\views/subjects/index.blade.php ENDPATH**/ ?>