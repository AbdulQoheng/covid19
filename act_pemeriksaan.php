<?php
    include "koneksi.php";
    $idpasien = $_GET['id_pasien'];
    $i=0;
    $tgl = date('l, d-m-Y');

    $query_1="SELECT * FROM gejala";
    $h_1 = $koneksi->query($query_1);
    

    while ($c = mysqli_fetch_array($h_1)){
        $idgejala = $c['idgejala'];
        $data = $_POST[$c['kode']];
        
        $sql4 = "INSERT INTO ngetest (idpasien, idgejala, waktu, jawab, keterangan) VALUES ('" . $idpasien . "','" . $idgejala . "','" . $tgl . "','" . $data . "','www')";
        
        $a = $koneksi->query($sql4);

    }
    header("location:hasilpemeriksaan.php?id_pasien=$idpasien");

?>