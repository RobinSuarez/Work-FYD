
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('contracts.index')); ?>">Contract</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('contracts.update', ['contract'=> $contract->id])); ?>" enctype="multipart/form-data" id="main-form">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="row mb-4">
                    <?php $__env->startComponent('components.text', [
                        'name' => 'id',
                        'value' => $contract->id,
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.datefield', [
                        'name'  => 'date',
                        'value' => old('date') ?? $contract->date,
                        'disabled' => $disabled
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name' => 'no',
                        'value' => old('no') ?? $contract->no,
                        'placeholder' => 'Enter the NO',
                        'disabled' => $disabled
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.textarea', [
                        'name'          => 'remarks',
                        'value' => old('remarks') ?? $contract->remarks,
                        'placeholder'   => 'Enter the REMARKS',
                        'disabled' => $disabled
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name'      => 'status_id',
                        'label'     => 'STATUS',
                        'elements'  => $statuses,
                        'value'     => old('status_id') ?? $contract->status_id,
                        'disabled'  => 1
                    ]); ?><?php echo $__env->renderComponent(); ?>
                </div>

                <?php if($contract->status_id == 1): ?>
                    <button type="submit" class="btn btn-success mt-4 btn-user form-btn" name="status" value="post" form="main-form">
                        <i class="fa-solid fa-check-to-slot"></i> Post
                    </button>

                    <button type="submit" class="btn btn-danger mt-4 btn-user form-btn" name="status" value="cancel" form="main-form">
                        <i class="fa-solid fa-xmark"></i> Cancel
                    </button>
                <?php elseif($contract->status_id == 2): ?>
                    <button type="submit" class="btn btn-secondary mt-4 btn-user form-btn" name="status" value="save" form="main-form">
                        <i class="fa-solid fa-pen-to-square"></i> Change
                    </button>

                <?php else: ?>
                    <button type="submit" class="btn btn-secondary mt-4 btn-user form-btn" name="status" value="save" form="main-form">
                        <i class="fa-solid fa-pen-to-square"></i> Change
                    </button>

                <?php endif; ?>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            Contract Proposals
        </div>
        <div class="card-body">
            <?php if($disabled == "0"): ?>
            <div class="form d-inline">
                <a href="<?php echo e(route('contract-proposals.create', ['id' => $contract->id])); ?>"
                    class="btn btn-secondary mb-3 create-btn">
                    <i class="fa-regular fa-plus"></i> New Record
                </a>
            </div>
            <?php endif; ?>
            <table class="table table-striped">
                <thead class="table-light-blue">
                    <tr>
                        <td>NO.</td>
                        <td>ID</td>
                        <td>PROPOSAL</td>
                        <td>SEQ</td>
                        <?php if($disabled == "0"): ?>
                            <td>ACTIONS</td>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $contract_proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract_proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><a href="<?php echo e(route('contract-proposals.show', ['id' => $contract_proposal->id])); ?>"><?php echo e(sprintf('%08d', $contract_proposal->id)); ?></a></td>
                        <td><?php echo e($contract_proposal->proposal); ?></td>
                        <td><?php echo e($contract_proposal->seq); ?></td>
                        <?php if($disabled == "0"): ?>
                        <td>
                            <div class="form d-inline">
                                <a href="<?php echo e(route('contract-proposals.edit', ['id' => $contract_proposal->id])); ?>" class="btn btn-secondary action-btn">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </div>
                            <form method="POST" class="form d-inline " action="<?php echo e(route('contract-proposals.destroy', ['id' => $contract_proposal->id])); ?> " class="d-inline" id="<?php echo e($contract_proposal->id); ?>" >
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" value="Delete!" class="btn btn-danger action-btn" onclick="return confirm('Are you sure you want to delete? This action is final')" form="<?php echo e($contract_proposal->id); ?>">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_sales_tr_contract/edit.blade.php ENDPATH**/ ?>