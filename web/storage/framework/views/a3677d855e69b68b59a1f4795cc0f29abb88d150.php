
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('users.index')); ?>" class="text-black text-decoration-none">USERS</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('users.update', ['user'=> $user->id])); ?>" enctype="multipart/form-data" id="main-form">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="row mb-3">
                    <?php $__env->startComponent('components.text', [
                        'name' => 'id',
                        'value' => $user->id,
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>
                    
                    <?php $__env->startComponent('components.text', [
                        'name' => 'code',
                        'value' => old('code') ?? $user->code,
                        'placeholder' => 'Enter your code'
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name' => 'name',
                        'value' => old('name') ?? $user->name,
                        'placeholder' => 'Enter your name'
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.email', [
                        'name' => 'email',
                        'value' => old('email') ?? $user->email,
                        'placeholder' => 'Enter your email',
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
                        <?php $__env->startComponent('components.checkbox', [
                            'name' => 'is_active',
                            'value' => old('is_active') ?? $user->is_active,
                        ]); ?><?php echo $__env->renderComponent(); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary" form="main-form">
                    Submit
                </button>
            </form>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_sys_mf_user/edit.blade.php ENDPATH**/ ?>