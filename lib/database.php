<?php
phpinfo();die();
$con = mysqli_connect('programmingexample.com', 'examp_sraban732', '725423boss', 'examp_shohozticket');

if (!$con) {
    echo "Error: Unable to connect to MySQL file error ." . PHP_EOL;
    exit;
}
//725423gii@87