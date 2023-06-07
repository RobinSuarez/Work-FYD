
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('proposals.edit', ['proposal' => $proposal_service->proposal_id])); ?>">Proposal Service</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('proposal-services.update', ['id'=> $proposal_service->id])); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="row mb-4">
                    <?php $__env->startComponent('components.text', [
                        'name'          => 'id',
                        'value'         => $proposal_service->id,
                        'disabled'      => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'proposal_id',
                        'value'         => $proposal_service->proposal_id,
                        'disabled'      => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name'          => 'service_id',
                        'label'         => 'SERVICE',
                        'elements'      => $services,
                        'value'         => old('service_id') ?? $proposal_service->service_id,
                        'disabled'      => isset($disabled) ? $disabled : null,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'qty',
                        'value'         => old('qty') ?? $proposal_service->qty,
                        'placeholder'   => 'Enter the Qty',
                        'type'          => 'number',
                        'disabled'      => isset($disabled) ? $disabled : null,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name'          => 'uom_id',
                        'label'         => 'UOM',
                        'elements'      => $uoms,
                        'value'         => old('uom_id') ?? $proposal_service->uom_id,
                        'disabled'      => isset($disabled) ? $disabled : null,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'price',
                        'value'         => old('price') ?? $proposal_service->price,
                        'placeholder'   => 'Enter the Price',
                        'type'          => 'number',
                        'disabled'      => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'total',
                        'value'         => old('total') ?? $proposal_service->total,
                        'placeholder'   => 'Enter the Total',
                        'disabled'      => 1,
                        'type'          => 'number',
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                        <?php $__env->startComponent('components.checkbox', [
                            'name'      => 'with_vat',
                            'value'     => old('with_vat') ?? $proposal_service->with_vat,
                            'disabled'      => isset($disabled) ? $disabled : null,
                        ]); ?><?php echo $__env->renderComponent(); ?>
                    </div>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'seq',
                        'value'         => old('seq') ?? $proposal_service->seq,
                        'placeholder'   => 'Enter the Seq',
                        'type'          => 'number',
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

    <div class="card shadow mb-4">
        <div class="card-header">
            Proposal Services Terms
        </div>
        <div class="card-body">
            <?php if($disabled == "0"): ?>
            <div class="form d-inline">
                <a href="<?php echo e(route('proposal-services-terms.create', ['id' => $proposal_service->id])); ?>"
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
                        <td>DUE DATE</td>
                        <td>AMOUNT</td>
                        <?php if($disabled == "0"): ?>
                        <td>ACTIONS</td>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $proposal_service_terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal_service_term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><a href="<?php echo e(route('proposal-services-terms.show', ['id' => $proposal_service_term->id])); ?>"><?php echo e(sprintf('%08d', $proposal_service_term->id)); ?></a></td>
                        <td><?php echo e($proposal_service_term->due_date); ?></td>
                        <td><?php echo e($proposal_service_term->amount); ?></td>
                        <?php if($disabled == "0"): ?>
                        <td>
                            <div class="form d-inline">
                                <a href="<?php echo e(route('proposal-services-terms.edit', ['id' => $proposal_service_term->id])); ?>" class="btn btn-secondary action-btn">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </div>
                            <form method="POST" class="form d-inline " action="<?php echo e(route('proposal-services-terms.destroy', ['id' => $proposal_service_term->id])); ?> " class="d-inline" id="<?php echo e($proposal_service_term->id); ?>" >
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" value="Delete!" class="btn btn-danger action-btn" onclick="return confirm('Are you sure you want to delete? This action is final')" form="<?php echo e($proposal_service_term->id); ?>">
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_sales_tr_proposal_services/edit.blade.php ENDPATH**/ ?>