
<?php $__env->startSection('content'); ?>

<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">View</div>
                  <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <span type="text"><?php echo e($subject->name); ?> </span>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                            <div class="col-md-6">
                                <span type="text" ><?php echo e($subject->status); ?> </span>
                            </div>
                        </div>                        
                  </div>
                  <div class="card">
                  <div class="card-header">Class List</div>
                  <div class="card-body">
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
                                        <?php if(auth()->user()->type != 'Student'): ?>
                                            <a href="<?php echo e(route('subjects.kick', [$subject->id, $student->id])); ?>" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                                                Kick
                                            </a>
                                        <?php endif; ?> 
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                  </div>

                  <div class="card-header">Available Students</div>
                  <div class="card-body">
                    <table id="students-table" class="datatable table table-bordered table-striped table-custom">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                
                        <tbody class="tbody-custom">
                            <?php $__currentLoopData = $availableStudents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td> <?php echo e($student->name); ?> </td>
                                    <td>        
                                        <?php if(auth()->user()->type != 'Student'): ?>
                                            <a href="<?php echo e(route('subjects.enrollStudent', [$subject->id, $student->id])); ?>" data-toggle="tab" aria-expanded="false" class="nav-link nav-link-state ">
                                                Enroll
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
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\arturo-app\resources\views/subjects/view.blade.php ENDPATH**/ ?>