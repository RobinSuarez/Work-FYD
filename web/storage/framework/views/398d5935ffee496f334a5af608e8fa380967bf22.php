
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('ors.edit', ['or' => $or_pay_check->or_id])); ?>">OR Pay Check</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('or-pay-checks.update', ['id'=> $or_pay_check->id])); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="row mb-4"> 

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'id',
                        'disabled'      => 1,
                        'value'         => $or_pay_check->id,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'or_id',
                        'value'         => $or_pay_check->or_id,
                        'disabled'      => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name' => 'check_no',
                        'value' => old('check_no') ?? $or_pay_check->check_no,
                        'placeholder' => 'Enter the Check No',
                        'disabled'      => isset($disabled) ? $disabled : null,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.datefield', [
                        'name'  => 'check_date',
                        'value' => old('check_date') ?? $or_pay_check->check_date,
                        'disabled'      => isset($disabled) ? $disabled : null,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name'      => 'bank_id',
                        'label'     => 'BANK',
                        'elements'  => $banks,
                        'value'     => old('bank_id') ?? $or_pay_check->bank_id,
                        'disabled'      => isset($disabled) ? $disabled : null,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'amount',
                        'value'         => old('amount') ?? $or_pay_check->amount,
                        'placeholder'   => 'Enter the amount',
                        'disabled'      => isset($disabled) ? $disabled : null,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                   
                    <?php $__env->startComponent('components.textarea', [
                        'name'          => 'remarks',
                        'value'         => old('remarks') ?? $or_pay_check->remarks,
                        'placeholder'   => 'Enter the REMARKS',
                        'disabled'      => isset($disabled) ? $disabled : null,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                </div>
                <?php if($disabled == "0"): ?>
                <button type="submit" class="btn btn-secondary">
                    Submit
                </button>
                <?php endif; ?>

            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_ar_tr_or_pay_check/edit.blade.php ENDPATH**/ ?>