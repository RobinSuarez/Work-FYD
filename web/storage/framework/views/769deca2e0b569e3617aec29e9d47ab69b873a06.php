<?php if(($disabled ?? null) === null): ?>
    <div class="<?php echo e($col ?? 'col-lg-4 col-md-6 col-sm-12 mb-3'); ?>">
        <label for="<?php echo e($name); ?>" class="form-label d-flex <?php echo e($label_class ?? ''); ?>"><?php echo e($label ?? strtoupper(str_replace('_', ' ', $name))); ?></label>
        <input type="date" class="form-control" id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" value="<?php echo e($value ?? old($name)); ?>">
    </div>
<?php else: ?>
    <div class="<?php echo e($col ?? 'col-lg-4 col-md-6 col-sm-12 mb-3'); ?>">
        <label for="<?php echo e($name); ?>" class="form-label d-flex <?php echo e($label_class ?? ''); ?>" ><?php echo e($label ?? strtoupper(str_replace('_', ' ', $name))); ?></label>
        <input type="date" class="form-control" style="background-color: #e9ecef;" id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" value="<?php echo e($value ?? old($name)); ?>" readonly>
    </div>
<?php endif; ?><?php /**PATH C:\FYD\web\resources\views/components/datefield.blade.php ENDPATH**/ ?>