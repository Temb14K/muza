<?php
session_start();
$_SESSION['isAuthorized'] = false;
session_destroy();
header('Location: ../index.php');