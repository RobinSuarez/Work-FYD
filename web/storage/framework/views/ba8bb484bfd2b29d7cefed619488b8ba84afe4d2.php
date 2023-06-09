<?php if(!isset($show) || $show): ?>
<div class="modal fade" tabindex="-1" id="alert">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                ALERT
            </div>
            <div class="modal-body">
                <div class="mt-2 mb-2 mr-3 ml-3">
                    <div class="alert alert-<?php echo e($type ?? 'success'); ?>" role="alert">
                        <?php echo e($slot); ?>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?><?php /**PATH C:\FYD\web\resources\views/components/alerts.blade.php ENDPATH**/ ?>