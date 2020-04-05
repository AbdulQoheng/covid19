
<h1 style="text-align:center;">Get City and Country Using PHP</h1>
<?php 
//get user ip address
$ip_address = $_SERVER['REMOTE_ADDR'];
//get user ip address details with geoplugin.net
$geopluginURL = 'http://www.geoplugin.net/php.gp?id='.$ip_address;
$addrDetailsArr = unserialize(file_get_contents($geopluginURL));
//get city name by return array
$city = $addrDetailsArr['geoplugin_city'];
//get country name by return array
$country = $addrDetailsArr['geoplugin_countryName'];
echo '<strong>IP Address</strong>: '.$ip_address.'<br>';
echo '<strong>Continent</strong>: '.$addrDetailsArr['geoplugin_continentName'].'<br>';
echo '<strong>Country Code </strong>: '.$addrDetailsArr['geoplugin_countryCode'].'<br>';
echo '<strong>Country</strong>: '.$country.'<br>';
echo '<strong>Timezone</strong>: '.$addrDetailsArr['geoplugin_timezone'].'<br>';
echo '<strong>Currency</strong>: '.$addrDetailsArr['geoplugin_currencyCode'].'<br>';
echo '<strong>Lalitude</strong>: '.$addrDetailsArr['geoplugin_latitude'].'<br>';
echo '<strong>Longitude</strong>: '.$addrDetailsArr['geoplugin_longitude'].'<br>';
