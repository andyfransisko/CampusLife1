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
        JURUSAN
    </center>
</div>

<table>
    <tr>
        <th>ID Jurusan</th>
        <th>Nama Jurusan</th>
        <th>Keterangan Jurusan</th>
    </tr>
    <?php
        foreach($jurusan as $list){
    ?>
    <tr>
        <td><?php echo $list->id_jurusan ?></td>
        <td><?php echo $list->nama_jurusan ?></td>
        <td><?php echo $list->keterangan_jurusan ?></td>
    </tr>
    <?php
        }
    ?>
</table>

<?php

$html=ob_get_clean();

$pdf->loadHtml($html);

$pdf->setPaper('A4','potrait');

$pdf->render();

$pdf->stream('listAdmin.pdf', Array('Attachment'=>0));
?>