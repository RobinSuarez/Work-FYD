
<?php $__env->startSection('head'); ?>
    <?php $__env->startComponent('components.select2-head'); ?>
    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('ors.index')); ?>">OR</a> | Edit
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('ors.update', ['or'=> $or->id])); ?>" enctype="multipart/form-data" id="main-form">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="row mb-4">
                    <?php $__env->startComponent('components.text', [
                        'name' => 'id',
                        'value' => $or->id,
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name' => 'no',
                        'value' => old('no') ?? $or->no,
                        'placeholder' => 'Enter the NO',
                        'disabled' => $disabled
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.datefield', [
                        'name'  => 'date',
                        'value' => old('date') ?? $or->date,
                        'disabled' => $disabled
                    ]); ?><?php echo $__env->renderComponent(); ?>
                    
                    <?php $__env->startComponent('components.select', [
                        'name'      => 'client_id',
                        'label'     => 'CLIENT',
                        'elements'  => $clients,
                        'value'     => old('client_id') ?? $or->client_id,
                        'disabled' => $disabled
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'total_cash_amount',
                        'value'         => number_format($or->total_cash_amount, 2),
                        'placeholder'   => 'Enter the total_cash_amount',
                        'disabled'      => 1
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'total_check_amount',
                        'value'         => number_format($or->total_check_amount, 2),
                        'placeholder'   => 'Enter the total_check_amount',
                        'disabled'      => 1
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'total_pay_amount',
                        'value'         => number_format($or->total_pay_amount, 2),
                        'placeholder'   => 'Enter the total_check_amount',
                        'disabled'      => 1
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'total_applied',
                        'value'         => number_format($or->total_applied, 2),
                        'placeholder'   => 'Enter the total_applied',
                        'disabled'      => 1
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'total_excess',
                        'value'         => number_format($or->total_excess, 2),
                        'placeholder'   => 'Enter the total_excess',
                        'disabled'      => 1
                    ]); ?><?php echo $__env->renderComponent(); ?>


                    <?php $__env->startComponent('components.textarea', [
                        'name'          => 'remarks',
                        'value'         => old('remarks') ?? $or->remarks,
                        'placeholder'   => 'Enter the REMARKS',
                        'disabled'      => $disabled
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name'      => 'status_id',
                        'label'     => 'STATUS',
                        'elements'  => $statuses,
                        'value'     => old('status_id') ?? $or->status_id,
                        'disabled'  => 1
                    ]); ?><?php echo $__env->renderComponent(); ?>
                </div>

                <?php if($or->status_id == 1): ?>
                    

                    <button type="submit" class="btn btn-success mt-4 btn-user form-btn" name="status" value="post" form="main-form">
                        <i class="fa-solid fa-check-to-slot"></i> Post
                    </button>

                    <button type="submit" class="btn btn-danger mt-4 btn-user form-btn" name="status" value="cancel" form="main-form">
                        <i class="fa-solid fa-xmark"></i> Cancel
                    </button>
                <?php elseif($or->status_id == 2): ?>
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

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    OR Pay Cash
                </div>
                <div class="card-body">
                    <?php if($disabled == "0"): ?>
                    <div class="form d-inline">
                        <a href="<?php echo e(route('or-pay-cashes.create', ['id' => $or->id])); ?>"
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
                                <td>AMOUNT</td>
                                <td>REF NO</td>
                                <td>REF DATE</td>
                                <?php if($disabled == "0"): ?>
                                    <td>ACTIONS</td>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $or_pay_cashes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $or_pay_cash): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><a href="<?php echo e(route('or-pay-cashes.show', ['id' => $or_pay_cash->id])); ?>"><?php echo e(sprintf('%08d', $or_pay_cash->id)); ?></a></td>
                                <td><?php echo e(number_format($or_pay_cash->amount, 2)); ?></td>
                                <td><?php echo e($or_pay_cash->ref_no); ?></td>
                                <td><?php echo e($or_pay_cash->ref_date); ?></td>
                                <?php if($disabled == "0"): ?>
                                <td>
                                    <div class="form d-inline">
                                        <a href="<?php echo e(route('or-pay-cashes.edit', ['id' => $or_pay_cash->id])); ?>" class="btn btn-secondary action-btn">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                    </div>
                                    <form method="POST" class="form d-inline " action="<?php echo e(route('or-pay-cashes.destroy', ['id' => $or_pay_cash->id])); ?> " class="d-inline" id="<?php echo e($or_pay_cash->id); ?>" >
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" value="Delete!" class="btn btn-danger action-btn" onclick="return confirm('Are you sure you want to delete? This action is final')" form="<?php echo e($or_pay_cash->id); ?>">
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

        <div class="col-lg-6 col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    OR Pay Check
                </div>
                <div class="card-body">
                    <?php if($disabled == "0"): ?>
                    <div class="form d-inline">
                        <a href="<?php echo e(route('or-pay-checks.create', ['id' => $or->id])); ?>"
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
                                <td>CHECK NO</td>
                                <td>CHECK DATE</td>
                                <td>BANK</td>
                                <td>AMOUNT</td>
                                <?php if($disabled == "0"): ?>
                                    <td>ACTIONS</td>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $or_pay_checks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $or_pay_check): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><a href="<?php echo e(route('or-pay-checks.show', ['id' => $or_pay_check->id])); ?>"><?php echo e(sprintf('%08d', $or_pay_check->id)); ?></a></td>
                                <td><?php echo e($or_pay_check->check_no); ?></td>
                                <td><?php echo e($or_pay_check->check_date); ?></td>
                                <td><?php echo e($or_pay_check->bank); ?></td>
                                <td><?php echo e(number_format($or_pay_check->amount, 2)); ?></td>
                                <?php if($disabled == "0"): ?>
                                <td>
                                    <div class="form d-inline">
                                        <a href="<?php echo e(route('or-pay-checks.edit', ['id' => $or_pay_check->id])); ?>" class="btn btn-secondary action-btn">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                    </div>
                                    <form method="POST" class="form d-inline " action="<?php echo e(route('or-pay-checks.destroy', ['id' => $or_pay_check->id])); ?> " class="d-inline" id="<?php echo e($or_pay_check->id); ?>" >
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" value="Delete!" class="btn btn-danger action-btn" onclick="return confirm('Are you sure you want to delete? This action is final')" form="<?php echo e($or_pay_check->id); ?>">
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
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            OR App
        </div>
        <div class="card-body">
            <?php if($disabled == "0"): ?>
            <div class="form d-inline">
                <a href="<?php echo e(route('or-apps.searcher', ['id' => $or->id])); ?>"
                    class="btn btn-secondary mb-3 create-btn">
                    <i class="fa-solid fa-magnifying-glass"></i> Searcher
                </a>
            </div>
            <?php endif; ?>
            <table class="table table-striped">
                <thead class="table-light-blue">
                    <tr>
                        <td>NO.</td>
                        <td>TRANS ID</td>
                        <td>TRANS NO</td>
                        <td>TRANS DATE</td>
                        <td>TRANS REMARKS</td>
                        <td>AMOUNT</td>
                        <td>BALANCE</td>
                        <td>APPLIED</td>
                        <td>AFTER APPLIED</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $or_apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $or_app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($or_app->trans_id); ?></td>
                        <td><?php echo e($or_app->trans_no); ?></td>
                        <td><?php echo e($or_app->trans_date); ?></td>
                        <td><?php echo e($or_app->trans_remarks); ?></td>
                        <td><?php echo e(number_format($or_app->amount, 2)); ?></td>
                        <td><?php echo e(number_format($or_app->balance, 2)); ?></td>
                        <td><?php echo e(number_format($or_app->amount_applied, 2)); ?></td>
                        <td><?php echo e(number_format($or_app->amount_after_applied, 2)); ?></td>
                        
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_ar_tr_or/edit.blade.php ENDPATH**/ ?>