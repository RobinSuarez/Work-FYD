
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('tax-types.index')); ?>">Tax Types</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-4">
                
                <?php $__env->startComponent('components.text', [
                    'name' => 'id',
                    'value' => $tax_type->id,
                    'disabled' => 1,
                ]); ?><?php echo $__env->renderComponent(); ?>
    
                <?php $__env->startComponent('components.text', [
                    'name' => 'code',
                    'value' => $tax_type->code,
                    'placeholder' => 'Enter your code',
                    'disabled' => 1,
                ]); ?><?php echo $__env->renderComponent(); ?>
    
                <?php $__env->startComponent('components.text', [
                    'name' => 'name',
                    'value' => $tax_type->name,
                    'placeholder' => 'Enter your name',
                    'disabled' => 1,
                ]); ?><?php echo $__env->renderComponent(); ?>
    
                <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                    <?php $__env->startComponent('components.checkbox', [
                        'name' => 'is_active',
                        'value' => $tax_type->is_active,
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>
                </div>
                
            </div>
            <a href="<?php echo e(route('tax-types.edit', ['tax_type' => $tax_type->id])); ?>" class="btn btn-secondary"><i class="fa-solid fa-pencil"></i></a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_crm_mf_tax_type/show.blade.php ENDPATH**/ ?>