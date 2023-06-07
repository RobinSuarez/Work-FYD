
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('proposals.index')); ?>">Proposal</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-4">
                    <?php $__env->startComponent('components.text', [
                        'name' => 'id',
                        'value' => $proposal->id,
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.datefield', [
                        'name'  => 'date',
                        'value' => old('date') ?? $proposal->date,
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name' => 'no',
                        'value' => old('no') ?? $proposal->no,
                        'placeholder' => 'Enter the NO',
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name'      => 'client_id',
                        'label'     => 'CLIENT',
                        'elements'  => $clients,
                        'value'     => $proposal->company_id ?? old('company_id'), 
                        'disabled'  => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    
                    <?php $__env->startComponent('components.select', [
                        'name' => 'salesman_id',
                        'label' => 'SALESMAN',
                        'elements'  => $salesmen,
                        'value'     => $proposal->salesman_id ?? old('salesman_id'), 
                        'disabled'  => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name'      => 'company_id',
                        'label'     => 'COMPANY',
                        'elements'  => $companies,
                        'value'     => $proposal->company_id ?? old('company_id'), 
                        'disabled'  => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name' => 'version_id',
                        'label' => 'VERSION',
                        'value' => old('version_id') ?? $proposal->version_id,
                        'placeholder'   => 'Enter the VERSION No.',
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name' => 'amount',
                        'value' => number_format($proposal->amount, 2),
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name' => 'tax_type_id',
                        'label' => 'TAX TYPE',
                        'elements'  => $tax_types,
                        'value' => old('tax_type_id') ?? $proposal->tax_type_id,
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.textarea', [
                        'name'          => 'remarks',
                        'value' => old('remarks') ?? $proposal->remarks,
                        'placeholder'   => 'Enter the REMARKS',
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name' => 'status_id',
                        'label' => 'STATUS',
                        'elements'  => $statuses,
                        'value' => old('status_id') ?? $proposal->status_id,
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>
                
            </div>

            <a href="<?php echo e(route('proposals.edit', ['proposal' => $proposal->id])); ?>" class="btn btn-secondary"><i class="fa-solid fa-pencil"></i></a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            Proposal Services
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="table-light-blue">
                    <tr>
                        <td>NO.</td>
                        <td>ID</td>
                        <td>SERVICE</td>
                        <td>QTY</td>
                        <td>PRICE</td>
                        <td>TOTAL</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $proposal_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal_service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><a href="<?php echo e(route('proposal-services.show', ['id' => $proposal_service->id])); ?>"><?php echo e(sprintf('%08d', $proposal_service->id)); ?></a></td>
                        <td><?php echo e($proposal_service->service); ?></td>
                        <td><?php echo e($proposal_service->qty); ?></td>
                        <td><?php echo e($proposal_service->price); ?></td>
                        <td><?php echo e($proposal_service->total); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_sales_tr_proposal/show.blade.php ENDPATH**/ ?>