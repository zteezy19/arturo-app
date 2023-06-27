
<?php $__env->startSection('content'); ?>

<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">View</div>
                  <div class="card-body">
  
                      <form action="<?php echo e(route('students.update', $student->id)); ?>" method="POST">
                          <?php echo csrf_field(); ?>
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                              <div class="col-md-6">
                                  <input type="text" id="name" class="form-control" name="name" value='<?php echo e($student->name); ?> 'required autofocus>
                                  <?php if($errors->has('name')): ?>
                                      <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                                  <?php endif; ?>
                              </div>
                          </div>
  
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Update
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\arturo-app\resources\views/students/view.blade.php ENDPATH**/ ?>