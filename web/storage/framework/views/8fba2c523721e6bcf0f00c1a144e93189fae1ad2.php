
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('proposals.index')); ?>">Proposal</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('proposals.update', ['proposal'=> $proposal->id])); ?>" enctype="multipart/form-data" id="main-form">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="row mb-4">
                    <?php $__env->startComponent('components.text', [
                        'name' => 'id',
                        'value' => $proposal->id,
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.datefield', [
                        'name'  => 'date',
                        'value' => old('date') ?? $proposal->date,
                        'disabled' => $disabled
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name' => 'no',
                        'value' => old('no') ?? $proposal->no,
                        'placeholder' => 'Enter the NO',
                        'disabled' => $disabled
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name'      => 'client_id',
                        'label'     => 'CLIENT',
                        'elements'  => $clients,
                        'value'     => $proposal->client_id ?? old('client_id'), 
                        'disabled'  => isset($disabled) ? $disabled : null,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name' => 'salesman_id',
                        'label' => 'SALESMAN',
                        'elements'  => $salesmen,
                        'value'     => $proposal->salesman_id ?? old('salesman_id'), 
                        'disabled'  => isset($disabled) ? $disabled : null,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name' => 'company_id',
                        'label' => 'COMPANY',
                        'elements'  => $companies,
                        'value'     => $proposal->company_id ?? old('company_id'), 
                        'disabled'  => isset($disabled) ? $disabled : null,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name' => 'version_id',
                        'label' => 'VERSION',
                        'value' => old('version_id') ?? $proposal->version_id,
                        'placeholder'   => 'Enter the VERSION No.',
                        'disabled' => $disabled
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'      => 'amount',
                        'value'     => old('amount') ?? $proposal->amount,
                        'disabled'  => 1,
                        'type'      => 'number',
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name'      => 'tax_type_id',
                        'label'     => 'TAX TYPE',
                        'elements'  => $tax_types,
                        'value'     => $proposal->tax_type_id ?? old('tax_type_id') ,
                        'disabled'  => isset($disabled) ? $disabled : null,
                        
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.textarea', [
                        'name'          => 'remarks',
                        'value' => old('remarks') ?? $proposal->remarks,
                        'placeholder'   => 'Enter the REMARKS',
                        'disabled' => $disabled
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name'      => 'status_id',
                        'label'     => 'STATUS',
                        'elements'  => $statuses,
                        'value'     => old('status_id') ?? $proposal->status_id,
                        'disabled'  => 1
                    ]); ?><?php echo $__env->renderComponent(); ?>
                </div>




                <?php if($proposal->status_id == 1): ?>
                    <button type="submit" class="btn btn-success mt-4 btn-user form-btn" name="status" value="post" form="main-form">
                        <i class="fa-solid fa-check-to-slot"></i> Post
                    </button>

                    <button type="submit" class="btn btn-danger mt-4 btn-user form-btn" name="status" value="cancel" form="main-form">
                        <i class="fa-solid fa-xmark"></i> Cancel
                    </button>
                <?php elseif($proposal->status_id == 2): ?>
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
            Proposal Services
        </div>
        <div class="card-body">
            <?php if($disabled == "0"): ?>
            <div class="form d-inline">
                <a href="<?php echo e(route('proposal-services.create', ['id' => $proposal->id])); ?>"
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
                        <td>SERVICE</td>
                        <td>QTY</td>
                        <td>UOM</td>
                        <td>PRICE</td>
                        <td>TOTAL</td>
                        <td>W/ VAT</td>
                        <?php if($disabled == "0"): ?>
                            <td>ACTIONS</td>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $proposal_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal_service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><a href="<?php echo e(route('proposal-services.show', ['id' => $proposal_service->id])); ?>"><?php echo e(sprintf('%08d', $proposal_service->id)); ?></a></td>
                        <td><?php echo e($proposal_service->service); ?></td>
                        <td><?php echo e($proposal_service->qty); ?></td>
                        <td><?php echo e($proposal_service->uom); ?></td>
                        <td><?php echo e(number_format($proposal_service->price, 2)); ?></td>
                        <td><?php echo e(number_format($proposal_service->total, 2)); ?></td>
                        <td><input class="form-check-input" type="checkbox" value="1" <?php echo e(($proposal_service->with_vat??0) == 1 ? "checked":""); ?> disabled></td>
                        <?php if($disabled == "0"): ?>
                        <td>
                            <div class="form d-inline">
                                <a href="<?php echo e(route('proposal-services.edit', ['id' => $proposal_service->id])); ?>" class="btn btn-secondary action-btn">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </div>
                            <form method="POST" class="form d-inline " action="<?php echo e(route('proposal-services.destroy', ['id' => $proposal_service->id])); ?> " class="d-inline" id="<?php echo e($proposal_service->id); ?>" >
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" value="Delete!" class="btn btn-danger action-btn" onclick="return confirm('Are you sure you want to delete? This action is final')" form="<?php echo e($proposal_service->id); ?>">
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_sales_tr_proposal/edit.blade.php ENDPATH**/ ?>