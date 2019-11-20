<script>

$('#semester').change(function(e){
    e.preventDefault();
    
    var id_semester = $(this).val();

    $.ajax({
        url:"<?php echo base_url('Dashboard/Enroll/ajaxEnroll') ?>",
        type:'POST',
        datatype: 'JSON',
        data: {id_semester:id_semester},
        success: function(response){
            
        }
    });



});





</script>