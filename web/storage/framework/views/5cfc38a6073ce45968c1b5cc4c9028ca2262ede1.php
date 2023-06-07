
<?php $__env->startSection('content'); ?>\
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('proposal-services.edit', ['id' => $proposal_service_id])); ?>">Proposal Service Term</a> | Create
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('proposal-services-terms.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row mb-4">
                    <?php $__env->startComponent('components.text', [
                        'name'          => 'id',
                        'disabled'      => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'proposal_services_id',
                        'value'         => $proposal_service_id,
                        'disabled'      => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.datefield', [
                        'name'          => 'due_date',
                        'value'         => old('due_date') ?? $def_date
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'amount',
                        'value'         => old('amount') ?? 0,
                        'placeholder'   => 'Enter the Amount',
                        'type'          => 'number'
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_sales_tr_proposal_services_term/create.blade.php ENDPATH**/ ?>