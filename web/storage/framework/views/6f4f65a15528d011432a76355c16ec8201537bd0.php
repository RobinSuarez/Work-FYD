
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow">
        <div class="card-header">
            FILTERS
        </div>
        <div class="card-body">
            <form method="GET" action="<?php echo e(route('ar-lr-cust.aging-report')); ?>" >
                <?php echo csrf_field(); ?>
                <div class="form d-inline mb-3">
                    <?php $__env->startComponent('components.datefield', [
                        'name'        => 'asof_date',
                        'value'       => old('asof_date') ?? $def_date,
                        'col'         => 'col-lg-4 col-md-6 col-sm-12 px-0',
                        'label_class' => ''
                    ]); ?><?php echo $__env->renderComponent(); ?>
                    <button type="submit" class="btn btn-sm btn-secondary form-btn mt-3"><i class="far fa-search" style="font-weight: 900"></i> Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mt-3 mb-3">
        <div class="card-header">
            
            AR AGING REPORT
        </div>
        <div class ="card-body">
            <table class="table table-sm table-striped">
                <thead class="table-light-blue">
                    <tr>
                        <td>NO.</td>
                        <td>CLIENT</td>
                        <td>T. ID</td>
                        <td>T. NO</td>
                        <td>T. DATE</td>
                        <td>T. CODE</td>
                        <td>REMARKS</td>
                        <td>TODAY</td>
                        <td>AMOUNT 01-30</td>
                        <td>AMOUNT 31-60</td>
                        <td>AMOUNT 61-90</td>
                        <td>AMOUNT 91-120</td>
                        <td>AMOUNT GE 121</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($d->client_name); ?></td>
                            <td><?php echo e(sprintf('%08d', $d->trans_id)); ?></td>
                            <td><?php echo e($d->trans_no); ?></td>
                            <td><?php echo e($d->trans_date); ?></td>
                            <td><?php echo e($d->trans_code); ?></td>
                            <td><?php echo e($d->remarks); ?></td>
                            <td><?php echo e(number_format($d->today, 2)); ?></td>
                            <td><?php echo e(number_format($d->amount_01_30, 2)); ?></td>
                            <td><?php echo e(number_format($d->amount_31_60, 2)); ?></td>
                            <td><?php echo e(number_format($d->amount_61_90, 2)); ?></td>
                            <td><?php echo e(number_format($d->amount_91_120, 2)); ?></td>
                            <td><?php echo e(number_format($d->amount_ge_121, 2)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_ar_lr_cust/ar_aging_report.blade.php ENDPATH**/ ?>