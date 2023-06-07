<?php if(($disabled ?? '0') === '0'): ?>
    <div class="<?php echo e($col ?? 'col-lg-4 col-md-6 col-sm-12'); ?>">
        <label for=<?php echo e($name); ?> class="form-label <?php echo e($label_class ?? 'mt-3'); ?>"><?php echo e($label ?? strtoupper(str_replace('_', ' ', $name))); ?></label>
        <textarea class="form-control <?php echo e($name); ?>" rows="1" id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" placeholder="<?php echo e($placeholder ?? null); ?>"><?php echo e($value ?? old($name)); ?></textarea>
    </div>
<?php else: ?>
    <div class="<?php echo e($col ?? 'col-lg-4 col-md-6 col-sm-12'); ?>">
        <label for=<?php echo e($name); ?> class="form-label <?php echo e($label_class ?? 'mt-3'); ?>"><?php echo e($label ?? strtoupper(str_replace('_', ' ', $name))); ?></label>
        <textarea class="form-control <?php echo e($name); ?>" rows="1" style="background-color: #e9ecef;" id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" placeholder="<?php echo e($placeholder ?? null); ?>" readonly><?php echo e($value ?? old($name)); ?></textarea>
    </div>
<?php endif; ?><?php /**PATH C:\FYD\web\resources\views/components/textarea.blade.php ENDPATH**/ ?>