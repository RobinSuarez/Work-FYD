
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('soas.edit', ['soa' => $soa_id])); ?>">SOA APP</a> | Searcher
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('soa-apps.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="soa_id" class="form-control" value="<?php echo e($soa_id); ?>" > 
                <table class="table table-striped">
                    <thead class="table-light-blue">
                        <tr>
                            <td>NO.</td>
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
                    <tbody id="tb_submit">
                    </tbody>
                </table>
                
                <button type="submit" class="btn btn-secondary">
                    Submit
                </button>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header">
            Searcher List
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="table-light-blue">
                    <tr>
                        <td>NO.</td>
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
                <tbody id="tb_search">
                    <?php $__empty_1 = true; $__currentLoopData = $soa_apps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soa_app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?> </td>
                        <td><?php echo e(sprintf('%08d', $soa_app->ar_lr_cust_id)); ?> <input type="hidden" name="ar_lr_cust_id[]" class="form-control" value="<?php echo e($soa_app->ar_lr_cust_id); ?>" > </td>
                        <td><?php echo e($soa_app->client_name); ?></td>
                        <td><?php echo e($soa_app->proposal_no); ?></td>
                        <td><?php echo e($soa_app->contract_no); ?></td>
                        <td><?php echo e($soa_app->due_date); ?></td>
                        <td><?php echo e($soa_app->service_name); ?></td>
                        <td><?php echo e(number_format($soa_app->amount, 2)); ?></td>
                        <?php if($disabled == "0"): ?>
                            <td class="td_add"><a href="#" class="btn btn-success add action-btn"><i class="fa-solid fa-plus"></i></a></td>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).on('click', '.add', function() {
        var tr = $(this).parent().parent().clone();
        var remove_btn = "<td class='td_remove'><a href='#' class='btn btn-danger remove action-btn'><i class='fa fa-minus' aria-hidden='true'></i></a></td>";
        $(tr).find(".td_add").after(remove_btn).remove().end().appendTo('#tb_submit');
        $(this).parent().parent().remove();
    });

    $(document).on('click', '.remove', function() {
            var tr = $(this).parent().parent().clone();
            var add_btn = "<td class='td_add'><a href='#' class='btn btn-success add action-btn'><i class='fa-solid fa-plus'></i></a></td>";
            $(tr).find(".td_remove").after(add_btn).remove().end().appendTo('#tb_search');
            $(this).parent().parent().remove();
    });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_ar_tr_soa_app/searcher.blade.php ENDPATH**/ ?>