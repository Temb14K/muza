<?php

$server = "localhost";
$serverUsername = "root";
$serverPassword = "";
$dbname = "netmonitoring";

try {
    $conn = mysqli_connect($server, $serverUsername, $serverPassword, $dbname);
}
catch(Throwable) {
    die("CONNECTION FAILED!!!". mysqli_connect_error());
}