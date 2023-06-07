
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('ors.edit', ['or' => $or_pay_cash->or_id])); ?>">OR Pay Cash</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <?php $__env->startComponent('components.text', [
                        'name'          => 'id',
                        'disabled'      => 1,
                        'value'         => $or_pay_cash->id,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'or_id',
                        'value'         => $or_pay_cash->or_id,
                        'disabled'      => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'amount',
                        'value'         => old('amount') ?? $or_pay_cash->amount,
                        'placeholder'   => 'Enter the amount',
                        'type'          => 'number',
                        'disabled'      => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name' => 'ref_no',
                        'value' => old('ref_no') ?? $or_pay_cash->ref_no,
                        'placeholder' => 'Enter the Ref No',
                        'disabled'      => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.datefield', [
                        'name'          => 'ref_date',
                        'value'         => old('ref_date') ?? $or_pay_cash->ref_date,
                        'disabled'      => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.textarea', [
                        'name'          => 'remarks',
                        'value'         => old('remarks') ?? $or_pay_cash->remarks,
                        'placeholder'   => 'Enter the REMARKS',
                        'disabled'      => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

            </div>
            <?php if($disabled == "0"): ?>
            <a href="<?php echo e(route('or-pay-cashes.edit', ['id' => $or_pay_cash->id])); ?>" class="btn btn-secondary action-btn">
                <i class="fa-solid fa-pencil"></i>
            </a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_ar_tr_or_pay_cash/show.blade.php ENDPATH**/ ?>