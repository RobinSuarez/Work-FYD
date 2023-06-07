
<?php $__env->startSection('head'); ?>
    <?php $__env->startComponent('components.select2-head'); ?>
    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('soas.index')); ?>">Statement of Account</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('soas.update', ['soa'=> $soa->id])); ?>" enctype="multipart/form-data" id="main-form">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="row mb-4">
                    <?php $__env->startComponent('components.text', [
                        'name' => 'id',
                        'value' => $soa->id,
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.datefield', [
                        'name'  => 'date',
                        'value' => old('date') ?? $soa->date,
                        'disabled' => $disabled
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name' => 'no',
                        'value' => old('no') ?? $soa->no,
                        'placeholder' => 'Enter the NO',
                        'disabled' => $disabled
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name'      => 'client_id',
                        'label'     => 'CLIENT',
                        'elements'  => $clients,
                        'value'     => old('client_id') ?? $soa->client_id,
                        'disabled' => $disabled
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.textarea', [
                        'name'          => 'remarks',
                        'value' => old('remarks') ?? $soa->remarks,
                        'placeholder'   => 'Enter the REMARKS',
                        'disabled' => $disabled
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name'      => 'status_id',
                        'label'     => 'STATUS',
                        'elements'  => $statuses,
                        'value'     => old('status_id') ?? $soa->status_id,
                        'disabled'  => 1
                    ]); ?><?php echo $__env->renderComponent(); ?>
                </div>

                <?php if($soa->status_id == 1): ?>
                    <button type="submit" class="btn btn-secondary mt-4 btn-user form-btn" name="status" value="save" form="main-form">
                        <i class="fa-solid fa-pen-to-square"></i> Save
                    </button>
                    
                    <button type="submit" class="btn btn-success mt-4 btn-user form-btn" name="status" value="post" form="main-form">
                        <i class="fa-solid fa-check-to-slot"></i> Post
                    </button>

                    <button type="submit" class="btn btn-danger mt-4 btn-user form-btn" name="status" value="cancel" form="main-form">
                        <i class="fa-solid fa-xmark"></i> Cancel
                    </button>
                <?php elseif($soa->status_id == 2): ?>
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
            SOA Application
        </div>
        <div class="card-body">
            <?php if($disabled == "0"): ?>
            <div class="form d-inline">
                <a href="<?php echo e(route('soa-apps.searcher', ['id' => $soa->id])); ?>"
                    class="btn btn-secondary mb-3 create-btn">
                    <i class="fa-solid fa-magnifying-glass"></i> Searcher
                </a>
            </div>
            <?php endif; ?>
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
                        <?php if($disabled == "0"): ?>
                            <td>ACTIONS</td>
                        <?php endif; ?>
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
                        <?php if($disabled == "0"): ?>
                        <td>
                            <form method="POST" class="form d-inline " action="<?php echo e(route('soa-apps.destroy', ['id' => $soa_app->id])); ?> " class="d-inline" id="<?php echo e($soa_app->id); ?>" >
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" value="Delete!" class="btn btn-danger action-btn" onclick="return confirm('Are you sure you want to delete? This action is final')" form="<?php echo e($soa_app->id); ?>">
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
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }});

        <?php $__env->startComponent('components.select2-js', [
            'column'        => 'client_id',
            'placeholder'   => 'Select the client',
            'model_path'    => 'App\Models\tb_crm_mf_client',
        ]); ?><?php echo $__env->renderComponent(); ?>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_ar_tr_soa/edit.blade.php ENDPATH**/ ?>