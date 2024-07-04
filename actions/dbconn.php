<?php

$server = "localhost";
$serverUsername = "root";
$serverPassword = "";
$dbname = "muzadb";

$conn = mysqli_connect($server, $serverUsername, $serverPassword, $dbname);

if(!$conn){
    die("CONNECTION FAILED!!!". mysqli_connect_error());
} else {
    "Success";
}