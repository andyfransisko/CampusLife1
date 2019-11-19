<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <select name="tahun" id="">
            <option value="">Choose Academic Year</option>
            <?php 
            foreach($tahun as $a) {
                if($a->jenis_semester == 1){
                    $jenis_semester = "Ganjil";
                }
                else if($a->jenis_semester == 2){
                    $jenis_semester = "Genap";
                }
                else{
                    $jenis_semester = "Akselerasi";
                }
            ?>
            <option value="<?php echo $a->id_semester ?>"><?php echo $a->tahun." - ".$jenis_semester ?></option>
            <?php } ?>
        </select>
        <!--nanti ini modal-->
        <button><a href="<?php echo base_url() ?>"> Add New Academic Year </a></button>
        

        <table>
            <tr>
                <th>No.</th>
                <th>Course Name</th>
                <th>Numbers of Students Enrolled</th>
            </tr>
                <?php 
                $i = 1;
                foreach($matkul as $a) {?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $a->nama_mata_kuliah ?></td>
                    <td><?php echo $a->jumlah_mahasiswa ?></td>
                    <td>
                        <button><a href="<?php echo base_url()."Enroll/enroll/" .$a->id_semester."/".$a->id_mata_kuliah ?>">Check Enrollment</a></button>
                    </td>
                </tr>
                <?php  $i++;} ?>
        </table>
    
    </form>
</body>
</html>