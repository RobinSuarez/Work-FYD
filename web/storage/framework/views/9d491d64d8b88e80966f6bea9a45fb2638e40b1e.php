<?php if(($disabled ?? null) === null): ?>
    <div class="<?php echo e($col ?? 'col-lg-4 col-md-6 col-sm-12 mb-3'); ?>">
        <label for="<?php echo e($name); ?>" class="form-label  <?php echo e($label_class ?? ''); ?>"><?php echo e($label ?? strtoupper(str_replace('_', ' ', $name))); ?></label>
        <input type="password" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>" class="form-control <?php echo e($name); ?>" value="<?php echo e($value ?? old($name)); ?>" >
    </div>
<?php else: ?>
    <div class="<?php echo e($col ?? 'col-lg-4 col-md-6 col-sm-12 mb-3'); ?>">
        <label for="<?php echo e($label ?? $name); ?>" class="form-label  <?php echo e($label_class ?? ''); ?>"><?php echo e(strtoupper(str_replace('_', ' ', $name))); ?></label>
        <input type="password" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>" class="form-control <?php echo e($name); ?>" value="<?php echo e($value ?? old($name)); ?>"  readonly>
    </div>
<?php endif; ?><?php /**PATH C:\FYD\web\resources\views/components/password.blade.php ENDPATH**/ ?>