<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo base_url() ?>Enroll/send" method="post">
        <select name="matkul" id="matkul">
            <?php foreach($matkul as $a){ ?>
                <option value="<?php echo $a->id_mata_kuliah ?>"><?php echo $a->nama_mata_kuliah?>/<?php echo $a->tahun ?></option>
            <?php } ?>
        </select>

        <button type="submit" name="submit">tes</button>
        <br><br><br>
        <table>
            <tr>
                <th><input type="checkbox"></th>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Angkatan</th>
                <th>Jurusan</th>
            </tr>
            <?php 
            $i = 1;
            foreach($mahasiswa as $b){ ?>
            <tr>
                <td><input type="checkbox" value="<?php echo $b->nim ?>" name="mahasiswa[]"></td>
                <td><?php echo $i?></td>
                <td><?php echo $b->nim?></td>
                <td><?php echo $b->nama_mhs?></td>
                <td><?php echo $b->angkatan?></td>
                <td><?php echo $b->nama_jurusan?></td>
            </tr>
            <?php $i++;} ?>
        </table>
    </form>
</body>
</html>