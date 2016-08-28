<?php
define("DBHOST", "www.db4free.net");
define("DBUSER", "ruhina05");
define("DBPASS", "0a4bfb");
define("DBNAME", "ttticketing");
$con = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

if (!$con) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    exit;
}