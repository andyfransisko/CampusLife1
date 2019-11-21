<!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/js/main.js"></script>


    <script src="<?php echo base_url() ?>assets/dashboard/js/lib/data-table/datatables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/js/lib/data-table/jszip.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/js/lib/data-table/vfs_fonts.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/js/lib/data-table/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();


          $('#semester').change(function(e){

            e.preventDefault();
            var id_semester = $(this).val();

            $.ajax({
                url:"<?php echo base_url('Dashboard/Enroll/getEnrollByAjax') ?>",
                dataType: "JSON",
                data:{id_semester:id_semester},
                type: "POST",
                success: function(data){
                    var tableContent = '';
                    if(data.status){
                    
                        var count = data.count / 4;
                        var i;

                        for(i=0; i<data.count;i++){  
                        $('#test').val(count);

                            /* 
                            tableContent=tableContent+
                                    '<tr>'+
                                    '<td>'+(i+1)+'</td>'+
                                    '<td>'+data.nama_mata_kuliah+'</td>'+
                                    '<td>'+data.jumlah_mahasiswa+'</td>'+
                                    '<td><button type="button" class="btn btn-outline-warning"><a href ="<?php //echo base_url().'Enroll/enroll/' ?>'+data.id_semester+'/'+data.id_mata_kuliah'">Enrollment</a></button></td>'+
                                    '</tr>';
                        }
*/
                        // $('#enroll-body').empty();
                        // $('#enroll-body').append(tableContent);

                    }else{
                        // tableContent='<tr><td colspan="4">NO DATA AVAILABLE</td></tr>';
                        // $('#enroll-body').empty();
                        // $('#enroll-body').append(tableContent);
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });

            });
      } );
  </script>