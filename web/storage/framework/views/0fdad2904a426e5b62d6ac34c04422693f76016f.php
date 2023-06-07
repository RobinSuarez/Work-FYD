
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('statuses.index')); ?>">Status</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-4">
                
                <?php $__env->startComponent('components.text', [
                    'name' => 'id',
                    'value' => $status->id,
                    'disabled' => 1,
                ]); ?><?php echo $__env->renderComponent(); ?>
    
                <?php $__env->startComponent('components.text', [
                    'name' => 'code',
                    'value' => $status->code,
                    'placeholder' => 'Enter your code',
                    'disabled' => 1,
                ]); ?><?php echo $__env->renderComponent(); ?>
    
                <?php $__env->startComponent('components.text', [
                    'name' => 'name',
                    'value' => $status->name,
                    'placeholder' => 'Enter your name',
                    'disabled' => 1,
                ]); ?><?php echo $__env->renderComponent(); ?>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                    <?php $__env->startComponent('components.checkbox', [
                        'name' => 'is_for_posting',
                        'value' => old('is_for_posting') ?? $status->is_for_posting,
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                    <?php $__env->startComponent('components.checkbox', [
                        'name' => 'is_cancelled',
                        'value' => old('is_cancelled') ?? $status->is_cancelled,
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                    <?php $__env->startComponent('components.checkbox', [
                        'name' => 'is_posted',
                        'value' => old('is_posted') ?? $status->is_posted,
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                    <?php $__env->startComponent('components.checkbox', [
                        'name' => 'is_active',
                        'value' => $status->is_active,
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>
                </div>
                
            </div>
            <a href="<?php echo e(route('statuses.edit', ['status' => $status->id])); ?>" class="btn btn-secondary"><i class="fa-solid fa-pencil"></i></a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_crm_mf_status/show.blade.php ENDPATH**/ ?>