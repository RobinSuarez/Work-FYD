$(document).ready(function(){
    var model_path = <?php echo json_encode($model_path, JSON_HEX_TAG); ?>;
    $('.<?php echo e($column); ?>').select2({
        placeholder: '<?php echo e($placeholder); ?>',
        theme: 'bootstrap-5',
        ajax: {
            type    : 'POST', 
            url: "<?php echo e(route('select2')); ?>",
            dataType: 'json',
            delay: 500,
            data: function(params){
                return{
                    _token: CSRF_TOKEN,
                    search: params.term,
                    model_path: model_path,

                };
            },
            processResults: function(response){
                return{
                    results: response
                };
            },
            cache:true
        }
    });
});<?php /**PATH C:\FYD\web\resources\views/components/select2.blade.php ENDPATH**/ ?>