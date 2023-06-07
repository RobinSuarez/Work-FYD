
<?php $__env->startSection('head'); ?>
    <?php $__env->startComponent('components.select2-head'); ?>
    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('ors.index')); ?>">OR</a> | Create
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('ors.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row mb-4">
                    <?php $__env->startComponent('components.text', [
                        'name'      => 'id',
                        'disabled'  => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'no',
                        'value'         => old('no'),
                        'placeholder'   => 'Enter the NO'
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.datefield', [
                        'name'      => 'date',
                        'value'     => old('date') ?? $def_date,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name'      => 'client_id',
                        'label'     => 'CLIENTS',
                        'elements'  => $clients,
                        'value'     => old('client_id')
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'total_cash_amount',
                        'value'         => old('total_cash_amount') ?? number_format(0, 2),
                        'placeholder'   => 'Enter the total_cash_amount',
                        'type'          => 'number',
                        'disabled'      => 1
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'total_check_amount',
                        'value'         => old('total_check_amount')?? number_format(0, 2),
                        'placeholder'   => 'Enter the total_check_amount',
                        'type'          => 'number',
                        'disabled'      => 1
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'total_pay_amount',
                        'value'         => old('total_pay_amount')?? number_format(0, 2),
                        'placeholder'   => 'Enter the total_check_amount',
                        'type'          => 'number',
                        'disabled'      => 1
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'total_applied',
                        'value'         => old('total_applied')?? number_format(0, 2),
                        'placeholder'   => 'Enter the total_applied',
                        'type'          => 'number',
                        'disabled'      => 1
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'total_excess',
                        'value'         => old('total_excess')?? number_format(0, 2),
                        'placeholder'   => 'Enter the total_excess',
                        'type'          => 'number',
                        'disabled'      => 1
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.textarea', [
                        'name'          => 'remarks',
                        'value'         => old('remarks'),
                        'placeholder'   => 'Enter the REMARKS'
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name'      => 'status_id',
                        'label'     => 'STATUS',
                        'elements'  => $statuses,
                        'value'     => old('status_id'),
                        'disabled'  => 1
                    ]); ?><?php echo $__env->renderComponent(); ?>
                </div>
                
                <button type="submit" class="btn btn-secondary mt-4 btn-user form-btn" name="status" value="save">
                    <i class="fa-solid fa-floppy-disk"></i> Save
                </button>
    
                
            </form>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_ar_tr_or/create.blade.php ENDPATH**/ ?>