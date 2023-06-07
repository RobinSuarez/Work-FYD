
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow">
        <div class="card-header">
            FILTERS
        </div>
        <div class="card-body">
            <form method="GET" action="<?php echo e(route('contracts.index')); ?>" >
                <?php echo csrf_field(); ?>
                <div class="form d-inline mb-3">
                    <?php $__env->startComponent('components.text', [
                        'name' => 'no',
                        'placeholder' => 'Enter the No',
                        'col'   => 'col-lg-4 col-md-6 col-sm-12 px-0',
                        'label_class' => ''
                    ]); ?><?php echo $__env->renderComponent(); ?>
                    <button type="submit" class="btn btn-secondary form-btn mt-3"><i class="far fa-search" style="font-weight: 900"></i> Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow mt-3 mb-3">
        <div class="card-header">
            <a href="<?php echo e(route('contracts.index')); ?>">Contracts</a>
        </div>
        <div class ="card-body">
            <table class="table table-striped">
                <thead class="table-light-blue">
                    <tr>
                        <td>NO.</td>
                        <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('id', 'ID'));?></td>
                        <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('date', 'DATE'));?></td>
                        <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('no', 'NO'));?></td>
                        <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('status', 'STATUS'));?></td>
                        <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('remarks', 'REMARKS'));?></td>
                        <td>ACTIONS</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><a href="<?php echo e(route('contracts.show', ['contract' => $contract->id])); ?>"><?php echo e(sprintf('%08d', $contract->id)); ?></a></td>
                            <td><?php echo e($contract->date); ?></td>
                            <td><?php echo e($contract->no); ?></td>
                            <td><?php echo e($contract->status); ?></td>
                            <td><?php echo e($contract->remarks); ?></td>
                            
                            <td>
                                <div class="form d-inline">
                                    <a href="<?php echo e(route('contracts.edit', ['contract' => $contract->id])); ?>" class="btn btn-secondary action-btn">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                </div>
                                <form method="POST" class="form d-inline "
                                    action="<?php echo e(route('contracts.destroy', ['contract' => $contract->id])); ?> " class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" value="Delete!" class="btn btn-danger action-btn" onclick="return confirm('Are you sure you want to delete? This action is final')">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </tbody>
            </table>
    
            <div class="form d-inline">
                <a href="<?php echo e(route('contracts.create')); ?>"
                    class="btn btn-secondary mb-3 create-btn">
                    <i class="fa-regular fa-plus"></i> New Record
                </a>
            </div>
             <?php echo $contracts->appends(\Request::except('page'))->render(); ?> 
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_sales_tr_contract/index.blade.php ENDPATH**/ ?>