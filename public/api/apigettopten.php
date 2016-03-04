<?php
$wert=1000;
$liste=array();
for ( $i=1; $i<=10; $i++) {
	$host = sprintf("server%x", $i*1377);
	$wert = rand($wert*0.8,$wert); 
	$liste = array_merge($liste, array( $i => array( 'server' => $host , 'value' => $wert/10) ));
	
};
print json_encode($liste);
?>