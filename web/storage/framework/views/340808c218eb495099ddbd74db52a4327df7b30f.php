
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('contracts.edit', ['contract' => $contract_proposal->contract_id])); ?>">Contract Proposal</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <?php $__env->startComponent('components.text', [
                        'name'          => 'id',
                        'disabled'      => 1,
                        'value'         => $contract_proposal->id,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'contract_id',
                        'value'         => $contract_proposal->contract_id,
                        'disabled'      => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name'          => 'proposal_id',
                        'label'         => 'PROPOSAL',
                        'elements'      => $proposals,
                        'value'         => old('proposal_id') ?? $contract_proposal->proposal_id,
                        'disabled'      => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'seq',
                        'placeholder'   => 'Enter the Seq',
                        'value'         => old('seq') ?? $contract_proposal->seq,
                        'disabled'      => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

            </div>
            <?php if($disabled == "0"): ?>
            <a href="<?php echo e(route('contract-proposals.edit', ['id' => $contract_proposal->id])); ?>" class="btn btn-secondary action-btn">
                <i class="fa-solid fa-pencil"></i>
            </a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_sales_tr_contract_proposal/show.blade.php ENDPATH**/ ?>