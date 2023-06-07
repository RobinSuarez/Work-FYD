
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('contracts.index')); ?>">Contract</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-4">
                    <?php $__env->startComponent('components.text', [
                        'name'      => 'id',
                        'value'     => $contract->id,
                        'disabled'  => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.datefield', [
                        'name'  => 'date',
                        'value' => old('date') ?? $contract->date,
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name' => 'no',
                        'value' => old('no') ?? $contract->no,
                        'placeholder' => 'Enter the NO',
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.textarea', [
                        'name'          => 'remarks',
                        'value' => old('remarks') ?? $contract->remarks,
                        'placeholder'   => 'Enter the REMARKS',
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name' => 'status_id',
                        'label' => 'STATUS',
                        'elements'  => $statuses,
                        'value' => old('status_id') ?? $contract->status_id,
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>
                
            </div>

            <a href="<?php echo e(route('contracts.edit', ['contract' => $contract->id])); ?>" class="btn btn-secondary"><i class="fa-solid fa-pencil"></i></a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            Contract Proposals
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="table-light-blue">
                    <tr>
                        <td>NO.</td>
                        <td>ID</td>
                        <td>PROPOSAL</td>
                        <td>SEQ</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $contract_proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract_proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><a href="<?php echo e(route('contract-proposals.show', ['id' => $contract_proposal->id])); ?>"><?php echo e(sprintf('%08d', $contract_proposal->id)); ?></a></td>
                        <td><?php echo e($contract_proposal->proposal); ?></td>
                        <td><?php echo e($contract_proposal->seq); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_sales_tr_contract/show.blade.php ENDPATH**/ ?>