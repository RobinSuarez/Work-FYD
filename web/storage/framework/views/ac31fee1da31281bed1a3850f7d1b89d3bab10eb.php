
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('users.index')); ?>" class="text-black text-decoration-none">USERS</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-3">
                
                <?php $__env->startComponent('components.text', [
                    'name' => 'id',
                    'value' => $user->id,
                    'disabled' => 1,
                ]); ?><?php echo $__env->renderComponent(); ?>
    
                <?php $__env->startComponent('components.text', [
                    'name' => 'code',
                    'value' => $user->code,
                    'placeholder' => 'Enter your code',
                    'disabled' => 1,
                ]); ?><?php echo $__env->renderComponent(); ?>
    
                <?php $__env->startComponent('components.text', [
                    'name' => 'name',
                    'value' => $user->name,
                    'placeholder' => 'Enter your name',
                    'disabled' => 1,
                ]); ?><?php echo $__env->renderComponent(); ?>

                <?php $__env->startComponent('components.email', [
                    'name' => 'email',
                    'value' => $user->email,
                    'placeholder' => 'Enter your email',
                    'disabled' => 1,
                ]); ?><?php echo $__env->renderComponent(); ?>
    
                <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
                    <?php $__env->startComponent('components.checkbox', [
                        'name' => 'is_active',
                        'value' => $user->is_active,
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>
                </div>
                
            </div>
            <a href="<?php echo e(route('users.edit', ['user' => $user->id])); ?>" class="btn btn-sm btn-secondary"><i class="fa-solid fa-pencil"></i></a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_sys_mf_user/show.blade.php ENDPATH**/ ?>