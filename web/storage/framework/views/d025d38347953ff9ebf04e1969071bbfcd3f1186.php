<?php if(($disabled ?? '0') === '0'): ?>
<div class="form-check">
    <input type="hidden" name="<?php echo e($name); ?>" value="0"/>
    <input class="form-check-input <?php echo e($name); ?> <?php echo e($label_class ?? ''); ?>" type="checkbox" value="1" id="<?php echo e($name); ?>" name="<?php echo e($name); ?>"  <?php echo e(($value??0) == 1 ? "checked":""); ?>>
    <label class="form-check-label <?php echo e($label_class ?? ''); ?>" for="<?php echo e($name); ?>">
        <?php echo e($label ?? strtoupper(str_replace('_', ' ', str_replace('_id', '',$name)))); ?>

    </label>
</div>
<?php else: ?>
<div class="form-check">
    <input type="hidden" name="<?php echo e($name); ?>" value="0"/>
    <input class="form-check-input <?php echo e($name); ?> <?php echo e($label_class ?? ''); ?>" type="checkbox" value="1" id="<?php echo e($name); ?>" name="<?php echo e($name); ?>"  <?php echo e(($value??0) == 1 ? "checked":""); ?> disabled>
    <label class="form-check-label <?php echo e($label_class ?? ''); ?>" for="<?php echo e($name); ?>">
        <?php echo e($label ?? strtoupper(str_replace('_', ' ', str_replace('_id', '',$name)))); ?>

    </label>
</div>
<?php endif; ?><?php /**PATH C:\FYD\web\resources\views/components/checkbox.blade.php ENDPATH**/ ?>