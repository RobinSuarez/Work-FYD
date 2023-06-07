
<?php $__env->startSection('content'); ?>\
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('contracts.edit', ['contract' => $contract_id])); ?>">Contract Proposal</a> | Create
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('contract-proposals.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row mb-4">
                    <?php $__env->startComponent('components.text', [
                        'name'          => 'id',
                        'disabled'      => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'contract_id',
                        'value'         => $contract_id,
                        'disabled'      => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name'          => 'proposal_id',
                        'label'         => 'PROPOSAL',
                        'elements'      => $proposals,
                        'value'         => old('proposal_id'),
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'seq',
                        'placeholder'   => 'Enter the Seq'
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_sales_tr_contract_proposal/create.blade.php ENDPATH**/ ?>