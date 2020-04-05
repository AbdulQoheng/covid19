<?php
    $id_pasien = $_GET['id_pasien'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="act_pemeriksaan.php?id_pasien=<?php echo $id_pasien ?>" method='POST'>
    <h1>Form Pemeriksaan</h1><br>
        <table  height="50px" border="1">
            <tr>
                <td>NO</td>
                <td>KODE</td>
                <td>Pernyataan</td>
                <td>Keterangan</td>
                <td>Jawaban</td>
            </tr>
            <?php
                include "koneksi.php";
                $query_1="SELECT * FROM gejala";
                $h_1 = $koneksi->query($query_1);
                $i = 1;
                while ($c = mysqli_fetch_array($h_1)){
                ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $c['kode']?></td>
                    <td width="300px"><?php echo $c['nmgejala']?></td>
                    <td><?php echo $c['keterangan']?></td>
                    <td><input type="radio" id="yes" name="<?php echo $c['kode']?>" value="yes">Yes
                        <input type="radio" id="no" name="<?php echo $c['kode']?>" value="no">NO
                    </td>
                </tr>

                <?php

                }
            ?>
            <tr>
            <td><input type="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>