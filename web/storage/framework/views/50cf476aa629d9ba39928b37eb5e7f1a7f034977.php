
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('proposal-services.edit', ['id' => $proposal_services_term->proposal_services_id])); ?>">Proposal Service Term</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('proposal-services-terms.update', ['id'=> $proposal_services_term->id])); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="row mb-4"> 
                    <?php $__env->startComponent('components.text', [
                        'name'          => 'id',
                        'disabled'      => 1,
                        'value'         => $proposal_services_term->id,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'proposal_services_id',
                        'value'         => $proposal_services_term->proposal_services_id,
                        'disabled'      => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.datefield', [
                        'name'          => 'due_date', 
                        'value'         => old('due_date') ?? $proposal_services_term->due_date,
                        'disabled'  => isset($disabled) ? $disabled : null,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'amount',
                        'value'         => old('amount') ?? $proposal_services_term->amount,
                        'placeholder'   => 'Enter the Amount',
                        'type'          => 'number',
                        'disabled'  => isset($disabled) ? $disabled : null,
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_sales_tr_proposal_services_term/edit.blade.php ENDPATH**/ ?>