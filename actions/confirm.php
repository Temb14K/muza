<?php
session_start();
require_once("dbconn.php");

$code = $_POST["code"];

if (!isset($_SESSION['triesNumber'])) {
    $_SESSION['triesNumber'] = 3;
}


if ($_SESSION['triesNumber'] > 1) {
    if (empty($code)) {
        $_SESSION['article'] = "<article class='err-article'>Заполните указанное поле</article>";
        header('Location: ../confirmation.php');
    } else {
        if ($code != $_SESSION['code']) {
            $_SESSION['triesNumber'] -= 1;
            $_SESSION['article'] = "<article class='err-article'>Неверный код, осталось попыток: $_SESSION[triesNumber]</article>";
            header('Location: ../confirmation.php');
        } else {
            $_SESSION['isChangingStepTwo']  = true;
            $stmt = $conn->prepare("SELECT * FROM `users` WHERE `email` = ?");
            $stmt->bind_param("s", $_SESSION['emailConf']);
            $stmt->execute();
            $checkUser = $stmt->get_result();
            $user = $checkUser->fetch_assoc();
            $_SESSION['user'] = [
            "id" => $user["id"],
            "name" => $user["name"],
            "username"=> $user["username"],
            "email"=> $user["email"],
            "permission"=> $user["permission"],
            "reg_timestamp"=> $user["reg_timestamp"],
            ];
            unset($_SESSION['emailConf']);
            header('Location: ../change.php');
        }
    }
} else {
    session_destroy();
    header('Location: ../auth.php');
}

