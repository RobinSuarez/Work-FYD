
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow">
        <div class="card-header">
            FILTERS
        </div>
        <div class="card-body">
            <form method="GET" action="<?php echo e(route('users.index')); ?>" >
                <?php echo csrf_field(); ?>
                <div class="form d-inline mb-3">
                    <?php $__env->startComponent('components.text', [
                        'name' => 'name',
                        'placeholder' => 'Enter the Name',
                        'col'   => 'col-lg-4 col-md-6 col-sm-12 px-0',
                        'label_class' => ''
                    ]); ?><?php echo $__env->renderComponent(); ?>
                    <button type="submit" class="btn btn-sm btn-secondary form-btn mt-3"><i class="far fa-search" style="font-weight: 900"></i> Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow mt-3 mb-3">
        <div class="card-header">
            <a href="<?php echo e(route('users.index')); ?>" class="text-black text-decoration-none">USERS</a>
        </div>
        <div class ="card-body">
            <table class="table table-striped">
                <thead class="table-light-blue">
                    <tr>
                        <td>NO.</td>
                        <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('id', 'ID'));?></td>
                        <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('code', 'CODE'));?></td>
                        <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name', 'NAME'));?></td>
                        <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('email', 'EMAIL'));?></td>
                        <td><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('is_active', 'IS ACTIVE'));?></td>
                        <td>ACTIONS</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><a href="<?php echo e(route('users.show', ['user' => $user->id])); ?>"><?php echo e(sprintf('%08d', $user->id)); ?></a></td>
                            <td><?php echo e($user->code); ?></td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td><input class="form-check-input" type="checkbox" value="1" <?php echo e(($user->is_active??0) == 1 ? "checked":""); ?> disabled></td>
                            <td>
                                <div class="form d-inline">
                                    <a href="<?php echo e(route('users.edit', ['user' => $user->id])); ?>" class="btn btn-sm btn-secondary action-btn mb-1">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                </div>
                                
                                <form method="POST" class="form d-inline"
                                    action="<?php echo e(route('users.profile-reset-password', ['user' => $user->id])); ?> " 
                                    class="d-inline" id="reset-password">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <button type="submit" value="Reset Password!" form="reset-password" class="btn btn-sm btn-danger action-btn mb-1" onclick="return confirm('Are you sure you want to reset the password? This action is final')">
                                        <i class="fas fa-key"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </tbody>
            </table>
    
            <div class="form d-inline">
                <a href="<?php echo e(route('users.create')); ?>"
                    class="btn btn-sm btn-secondary mb-3 create-btn">
                    <i class="fa-regular fa-plus"></i> New Record
                </a>
            </div>
             <?php echo $users->appends(\Request::except('page'))->render(); ?> 
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\FYD\web\resources\views/tb_sys_mf_user/index.blade.php ENDPATH**/ ?>