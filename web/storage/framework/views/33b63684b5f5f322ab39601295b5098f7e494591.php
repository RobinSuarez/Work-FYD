<div class="modal fade" tabindex="-1" id="errors">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                ERRORS
            </div>
            <div class="modal-body">
                <div class="mt-2 mb-2 mr-3 ml-3">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo e($error); ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\FYD\web\resources\views/components/errors.blade.php ENDPATH**/ ?>