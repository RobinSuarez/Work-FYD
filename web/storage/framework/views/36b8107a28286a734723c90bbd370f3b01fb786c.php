

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header"><?php echo e($card_header ?? 'Dashboard'); ?></div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('users.update', ['user'=> $user->id])); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                
                <div class="row mb-4 ">
                    <div class="row col-lg-10 col-md-12 mr-0">
                        <?php $__env->startComponent('components.text', [
                            'name' => 'id',
                            'value' => $user->id,
                            'disabled' => 1,
                        ]); ?><?php echo $__env->renderComponent(); ?>
    
                        <?php $__env->startComponent('components.text', [
                            'name' => 'name',
                            'value' => $user->name
                        ]); ?><?php echo $__env->renderComponent(); ?>
                        
                        <?php $__env->startComponent('components.email', [
                            'name' => 'email',
                            'value' => $user->email
                        ]); ?><?php echo $__env->renderComponent(); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/User/edit.blade.php ENDPATH**/ ?>