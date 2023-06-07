
<?php $__env->startSection('content'); ?>\
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo e(route('proposals.edit', ['proposal' => $proposal_id])); ?>">Proposal Service</a> | Create
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('proposal-services.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row mb-4">
                    <?php $__env->startComponent('components.text', [
                        'name'          => 'id',
                        'disabled'      => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'proposal_id',
                        'value'         => $proposal_id,
                        'disabled'      => 1,
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name'          => 'service_id',
                        'label'         => 'SERVICE',
                        'elements'      => $services,
                        'value'         => old('service_id'),
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'qty',
                        'value'         => old('qty') ?? 1,
                        'placeholder'   => 'Enter the Qty',
                        'type'          => 'number'
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.select', [
                        'name'          => 'uom_id',
                        'label'         => 'UOM',
                        'elements'      => $uoms,
                        'value'         => old('uom_id'),
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'price',
                        'value'         => old('price') ?? 0,
                        'placeholder'   => 'Enter the Price',
                        'disabled'      => 1,
                        'type'          => 'number'
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'total',
                        'value'         => old('total') ?? 0,
                        'placeholder'   => 'Enter the Total',
                        'disabled'      => 1,
                        'type'          => 'number'
                    ]); ?><?php echo $__env->renderComponent(); ?>

                    <div class="col-lg-4 col-md-6 col-sm-12 mt-3">
                        <?php $__env->startComponent('components.checkbox', [
                            'name' => 'with_vat',
                            'value' => old('with_vat') ?? 1
                        ]); ?><?php echo $__env->renderComponent(); ?>
                    </div>

                    <?php $__env->startComponent('components.text', [
                        'name'          => 'seq',
                        'value'         => old('seq') ?? 0,
                        'placeholder'   => 'Enter the Seq',
                        'type'          => 'number'
                    ]); ?><?php echo $__env->renderComponent(); ?>
                    
                </div>
                
                <button type="submit" class="btn btn-secondary">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_sales_tr_proposal_services/create.blade.php ENDPATH**/ ?>