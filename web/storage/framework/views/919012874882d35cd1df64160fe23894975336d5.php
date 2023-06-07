<?php if(($disabled ?? null) === null): ?>
    <div class="<?php echo e($col ?? 'col-lg-4 col-md-6 col-sm-12 mb-3'); ?>">
        <label for="<?php echo e($name); ?>" class="form-label <?php echo e($label_class ?? ''); ?>"><?php echo e($label ?? strtoupper(str_replace('_', ' ', $name))); ?></label>
        <input type="<?php echo e($type ?? 'text'); ?>" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>" class="form-control <?php echo e($name); ?>" value="<?php echo e($value ?? old($name)); ?>" placeholder="<?php echo e($placeholder ?? null); ?>" >
    </div>
<?php else: ?>
    <div class="<?php echo e($col ?? 'col-lg-4 col-md-6 col-sm-12 mb-3'); ?>">
        <label for="<?php echo e($label ?? $name); ?>" class="form-label <?php echo e($label_class ?? ''); ?>"><?php echo e($label ?? strtoupper(str_replace('_', ' ', $name))); ?></label>
        <input type="<?php echo e($type ?? 'text'); ?>" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>" style="background-color: #e9ecef;" class="form-control <?php echo e($name); ?>" value="<?php echo e($value ?? old($name)); ?>" placeholder="<?php echo e($placeholder ?? null); ?>" readonly>
    </div>
<?php endif; ?><?php /**PATH C:\FYD\web\resources\views/components/text.blade.php ENDPATH**/ ?>