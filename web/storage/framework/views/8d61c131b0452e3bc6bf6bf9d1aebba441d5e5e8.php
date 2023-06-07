
<?php $__env->startSection('content'); ?>\
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('ors.edit', ['or' => $or_id])); ?>">OR Pay Check</a> | Create
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('or-pay-checks.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row mb-4">
                    <?php $__env->startComponent('components.text', [
                        'name'          => 'id',
                        'disabled'      => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'or_id',
                        'value'         => $or_id,
                        'disabled'      => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name' => 'check_no',
                        'value' => old('check_no'),
                        'placeholder' => 'Enter the Check No'
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.datefield', [
                        'name'  => 'check_date',
                        'value' => old('check_date') ?? $def_date,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name'      => 'bank_id',
                        'label'     => 'BANK',
                        'elements'  => $banks,
                        'value'     => old('bank_id')
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'amount',
                        'value'         => old('amount'),
                        'placeholder'   => 'Enter the amount',
                        'type'          => 'number',
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    

                    <?php $__env->startComponent('components.textarea', [
                        'name'          => 'remarks',
                        'value'         => old('remarks'),
                        'placeholder'   => 'Enter the REMARKS',
                    ]); ?><?php echo $__env->renderComponent(); ?>


                </div>
                
                <button type="submit" class="btn btn-secondary">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_ar_tr_or_pay_check/create.blade.php ENDPATH**/ ?>