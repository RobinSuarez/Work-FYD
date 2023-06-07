
<?php $__env->startSection('content'); ?>\
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('contracts.index')); ?>">Contract</a> | Create
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('contracts.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row mb-4">
                    <?php $__env->startComponent('components.text', [
                        'name' => 'id',
                        'disabled' => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.datefield', [
                        'name'  => 'date',
                        'value' => old('date') ?? $def_date,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name' => 'no',
                        'value' => old('no'),
                        'placeholder' => 'Enter the NO'
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.textarea', [
                        'name'          => 'remarks',
                        'value'         => old('remarks'),
                        'placeholder'   => 'Enter the REMARKS'
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name' => 'status_id',
                        'label' => 'STATUS',
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_sales_tr_contract/create.blade.php ENDPATH**/ ?>