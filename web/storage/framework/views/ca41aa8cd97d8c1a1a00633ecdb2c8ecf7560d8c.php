
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('banks.index')); ?>" class="text-black text-decoration-none">BANKS</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('banks.update', ['bank'=> $bank->id])); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="row mb-3">
                    <?php $__env->startComponent('components.text', [
                        'name' => 'id',
                        'value' => $bank->id,
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>
                    <?php $__env->startComponent('components.text', [
                        'name' => 'code',
                        'value' => old('code') ?? $bank->code,
                        'placeholder' => 'Enter your code'
                    ]); ?><?php echo $__env->renderComponent(); ?>
                    <?php $__env->startComponent('components.text', [
                        'name' => 'name',
                        'value' => old('name') ?? $bank->name,
                        'placeholder' => 'Enter your name'
                    ]); ?><?php echo $__env->renderComponent(); ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 mt-1">
                        <?php $__env->startComponent('components.checkbox', [
                            'name' => 'is_active',
                            'value' => old('is_active') ?? $bank->is_active,
                        ]); ?><?php echo $__env->renderComponent(); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-secondary">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_crm_mf_bank/edit.blade.php ENDPATH**/ ?>