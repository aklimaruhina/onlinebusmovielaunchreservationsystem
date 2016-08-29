<?php
define("DBHOST", "sql6.freemysqlhosting.net");
define("DBUSER", "sql6133422");
define("DBPASS", "RGLN2qKXDJ");
define("DBNAME", "sql6133422");
$con = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

if (!$con) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    exit;
}
//725423gii@87