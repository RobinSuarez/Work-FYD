
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('proposal-services.edit', ['id' => $proposal_services_term->proposal_services_id])); ?>">Proposal Service Term</a> | Show
        </div>
        <div class="card-body">
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
                ]); ?><?php echo $__env->renderComponent(); ?>

                <?php $__env->startComponent('components.text', [
                    'name'          => 'amount',
                    'value'         => old('amount') ?? $proposal_services_term->amount,
                    'placeholder'   => 'Enter the Amount',
                    'type'          => 'number'
                ]); ?><?php echo $__env->renderComponent(); ?>
            </div>
            <?php if($disabled == "0"): ?>
            <a href="<?php echo e(route('proposal-services-terms.edit', ['id' => $proposal_services_term->id])); ?>" class="btn btn-secondary action-btn"><i class="fa-solid fa-pencil"></i></a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_sales_tr_proposal_services_term/show.blade.php ENDPATH**/ ?>