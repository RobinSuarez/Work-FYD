<?php if(($disabled ?? null) === null): ?>
<div class="<?php echo e($col ?? 'col-lg-4 col-md-6 col-sm-12 mb-3'); ?>">
    <label for="<?php echo e($name); ?>" class="form-label <?php echo e($label_class ?? ''); ?>" id="<?php echo e($name); ?>_label"><?php echo e($label ?? strtoupper(str_replace('_', ' ', str_replace('_id', '',$name)))); ?></label>
    <select class="form-select <?php echo e($name); ?>"  name="<?php echo e($name); ?>" id="<?php echo e($name); ?>" style="width: 100%">
        <option value="<?php echo e(null); ?>"><?php echo e('Select the ' . strtoupper(str_replace('_', ' ', str_replace('_id', '', $label ?? $name)))); ?></option>
    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($element->id); ?>" <?php echo e((($value ?? old($name)) == $element->id ? "selected":"")); ?>><?php echo e($element->name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<?php else: ?>
<div class="<?php echo e($col ?? 'col-lg-4 col-md-6 col-sm-12 mb-3'); ?>">
    <label for="<?php echo e($name); ?>" class="form-label <?php echo e($label_class ?? ''); ?>" id="<?php echo e($name); ?>_label"><?php echo e($label ?? strtoupper(str_replace('_', ' ', str_replace('_id', '',$name)))); ?></label>
    <select class="form-select <?php echo e($name); ?>"  name="<?php echo e($name); ?>" id="<?php echo e($name); ?>" style="width: 100%" disabled >
        <option value="<?php echo e(null); ?>"><?php echo e('Select the ' . strtoupper(str_replace('_', ' ', str_replace('_id', '', $label ?? $name)))); ?></option>
    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($element->id); ?>" <?php echo e((($value ?? old($name)) == $element->id ? "selected":"")); ?>><?php echo e($element->name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <input type="hidden" id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" value=<?php echo e($value); ?>>
</div>
<?php endif; ?>
<?php /**PATH C:\FYD\web\resources\views/components/select.blade.php ENDPATH**/ ?>