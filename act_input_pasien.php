<?php
    include "koneksi.php";
    
  $id_pasien = $_POST['idpasien'];
  $nama_pasien = $_POST['nama_pasien'];
  $usia = $_POST['usia'];
  $jk = $_POST['jk'];
  $tgllahir = $_POST['tgllahir'];
  $telepon = $_POST['telepon'];
  $id;        

      //get user ip address
    $ip_address = $_SERVER['REMOTE_ADDR'];
    //get user ip address details with geoplugin.net
    $geopluginURL = 'http://www.geoplugin.net/php.gp?id='.$ip_address;
    $addrDetailsArr = unserialize(file_get_contents($geopluginURL));
    //get city name by return array
    $city = $addrDetailsArr['geoplugin_city'];
    //get country name by return array
    $country = $addrDetailsArr['geoplugin_countryName'];

        
        $sql1 = "SELECT idpasien FROM pasien WHERE idpasien   = $id_pasien";
        $c = $koneksi->query($sql1);
    
    if($a = mysqli_fetch_array($c)){
        echo "<script>alert('ID Pasien $idpasien telah di gunakan'); history.back() </script>";
    }else{

        $sql3 = "SELECT MAX(id) FROM markers";
        $h_1 = $koneksi->query($sql3);

        if(mysqli_num_rows($h_1)==1){
            $d_1 = $h_1->fetch_array();
            $id = $d_1['MAX(id)'] + 1;

            $Continent = $addrDetailsArr['geoplugin_continentName'];
            $CountryCode = $addrDetailsArr['geoplugin_countryCode'];
            $Country = $country;
            $Timezone = $addrDetailsArr['geoplugin_timezone'];
            $Currency = $addrDetailsArr['geoplugin_currencyCode'];
            $Latitude = $addrDetailsArr['geoplugin_latitude'];
            $Longitude = $addrDetailsArr['geoplugin_longitude'];
            $statuscode;

            if($Latitude != 0){
                $statuscode = "OK";
            }else{
                $statuscode = "-";
            }

            
            $sql4 = "INSERT INTO markers (id, statusCode, name, address, lat, lng, type) VALUES ('" . $id . "','" . $statuscode . "','" . $Country . "','" . $ip_address . "','" . $Latitude . "','" . $Longitude . "','www')";
            
            $a = $koneksi->query($sql4);
            if($a == true){
                $sql2 = "INSERT INTO pasien (idpasien, id, nmpasien, usia, jk, tgllahir, telepon) VALUES ('" .$id_pasien."','".$id."','".$nama_pasien."','".$usia."','".$jk."','".$tgllahir."','".$telepon."')";
                
                $b = $koneksi->query($sql2);
        
                if ($b == true) {
                    // header("location:");
                    echo "sukses lur";
                } else {
                    echo "Error !";
                }

            }else{
                
            }

        }else{

        }

    }

  
?>