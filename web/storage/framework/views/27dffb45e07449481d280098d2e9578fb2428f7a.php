
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('soas.index')); ?>">Statement of Account</a> | Show
        </div>
        <div class="card-body">
            <div class="row mb-4">
                    <?php $__env->startComponent('components.text', [
                        'name'      => 'id',
                        'value'     => $soa->id,
                        'disabled'  => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.datefield', [
                        'name'  => 'date',
                        'value' => old('date') ?? $soa->date,
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name' => 'no',
                        'value' => old('no') ?? $soa->no,
                        'placeholder' => 'Enter the NO',
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name'      => 'client_id',
                        'label'     => 'CLIENT',
                        'elements'  => $clients,
                        'value'     => old('client_id') ?? $soa->client_id,
                        'disabled'  => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.textarea', [
                        'name'          => 'remarks',
                        'value' => old('remarks') ?? $soa->remarks,
                        'placeholder'   => 'Enter the REMARKS',
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name' => 'status_id',
                        'label' => 'STATUS',
                        'elements'  => $statuses,
                        'value' => old('status_id') ?? $soa->status_id,
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>
                
            </div>

            <a href="<?php echo e(route('soas.edit', ['soa' => $soa->id])); ?>" class="btn btn-secondary"><i class="fa-solid fa-pencil"></i></a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            SOA Application
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="table-light-blue">
                    <tr>
                        <td>NO.</td>
                        <td>ID</td>
                        <td>AR LR CUST ID</td>
                        <td>CLIENT</td>
                        <td>PROPOSAL</td>
                        <td>CONTRACT</td>
                        <td>DUE DATE</td>
                        <td>SERVICE</td>
                        <td>AMOUNT</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $soa_apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soa_app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e(sprintf('%08d', $soa_app->id)); ?></td>
                        <td><?php echo e(sprintf('%08d', $soa_app->ar_lr_cust_id)); ?></td>
                        <td><?php echo e($soa_app->client_name); ?></td>
                        <td><?php echo e($soa_app->proposal_no); ?></td>
                        <td><?php echo e($soa_app->contract_no); ?></td>
                        <td><?php echo e($soa_app->due_date); ?></td>
                        <td><?php echo e($soa_app->service_name); ?></td>
                        <td><?php echo e(number_format($soa_app->amount, 2)); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_ar_tr_soa/show.blade.php ENDPATH**/ ?>