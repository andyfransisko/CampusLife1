<?php

    require_once 'dompdf/autoload.inc.php';

    use Dompdf\Dompdf;

    $pdf = new Dompdf();

    ob_start();

?>

<!-- HTML -->

<!-- CSS -->
<style>

@import url("https://fonts.googleapis.com/css?family=Oswald&display=swap");

@page
{   
    font-family: 'Oswald', sans-serif;
    margin-top:3%;background-color: #E7E5E5;
}

table 
{
    border-collapse: collapse;
    width: 100%;
    margin-left:35px;
    margin-right:60px;
    margin-top:20px;
}

th, td 
{
    padding: 8px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

td
{
    color: #369BB6;
}

</style>

<!-- Body -->
<div  style="letter-spacing: 10px;font-size:30px;">
    <center>
        Campus Life
    </center>
</div>

<hr style = "margin-left:55px;margin-right:55px;color:#369BB6;">

<div style="font-size:20px;color:#369BB6;">
    <center>
        DOSEN
    </center>
</div>

<table>
    <tr>
        <th>NIDN</th>
        <th>Nama Dosen</th>
        <th>Jenis Kelamin</th>
        <th>Tipe Dosen</th>
        <th>Email</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Alamat Rumah</th>
        <th>No Telepon</th>
        <th>Agama</th>
    </tr>
    <?php
        foreach($dosen as $list){
    ?>
    <tr>
        <td><?php echo $list->nidn ?></td>
        <td><?php echo $list->nama_dosen ?></td>
        <td><?php echo ($list->jenis_kelamin == 1 ? "Laki - laki" : "Perempuan") ?></td>
        <td>
            <?php 
                if($list->tipe_dosen == 1)
                {
                     echo "Kepala Program Studi";
                }
                else if($list->tipe_dosen == 2)
                {
                    echo "Dosen Pembimbing Akademik";
                }
                else
                {
                    echo "Dosen Reguler";
                }
            ?>
        </td>
        <td><?php echo $list->email_dosen?></td>
        <td><?php echo $list->tmpt_lahir ?></td>
        <td><?php echo date('d-F-Y', strtotime($list->tgl_lahir))  ?></td>
        <td><?php echo $list->alamat_rumah ?></td>
        <td><?php echo $list->no_telp ?></td>
        <td>
            <?php 
                if($list->agama == 1)
                {
                    echo "Kristen";
                }
                else if($list->agama == 2)
                {
                    echo "Katolik";
                }
                else if($list->agama == 3)
                {
                    echo "Islam";
                }
                else if($list->agama == 4)
                {
                    echo "Buddha";
                }
                else if($list->agama == 5)
                {
                    echo "Hindu";
                }
                else
                {
                echo "Kong Hu Cu";
                }
            ?>
        </td>
    </tr>
    <?php
        }
    ?>
</table>

<?php

$html=ob_get_clean();

$pdf->loadHtml($html);

$pdf->setPaper('A4','landscape');

$pdf->render();

$pdf->stream('listAdmin.pdf', Array('Attachment'=>0));
?>