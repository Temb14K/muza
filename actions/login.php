<?php
session_start();
require_once("dbconn.php");

$login = $_POST['login'];
$password = $_POST['password'];


if (empty($login) || empty($password)) {
    $_SESSION['article'] = "<article class='err-article'>Пожалуйста, заполните все поля</article>";
    header('Location: ../auth.php');
} else {
        if ($_POST['g-recaptcha-response'] != true) {
            $_SESSION['article'] = "<article class='err-article'>Пожалуйста, докажите, что вы не робот</article>";
            header('Location: ../auth.php');
        } else {
            $recaptcha = $_POST['g-recaptcha-response'];
            $seсretKey = "6LclIQMqAAAAABPrXlBohuuR_6hOBTP3x7TSBpjP";
            $url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response".$recaptcha;
            $response = file_get_contents($url);
            $responseKey = json_decode($response, true);
            $stmt = $conn->prepare("SELECT * FROM `users` WHERE `username` = ? OR `email` = ?");
            $stmt->bind_param("ss", $login, $login);
            $stmt->execute();
            $checkUser = $stmt->get_result();
            if ($checkUser->num_rows == 0) {
            $_SESSION['article'] = "<article class='err-article'>Неверный логин или пароль</article>";
            header('Location: ../auth.php');
            } else {
                $user = $checkUser->fetch_assoc();

                if (password_verify($password, $user["password"])) {
                    $_SESSION['user'] = [
                    "id" => $user["id"],
                    "name" => $user["name"],
                    "username"=> $user["username"],
                    "email"=> $user["email"],
                    "telnum"=> $user["telnum"],
                    "password"=> $user["password"],
                    "permission"=> $user["permission"],
                    "reg_timestamp"=> $user["reg_timestamp"],
                    ];

                    $_SESSION['isAuthorized'] = true;
                    header('Location: ../index.php');

                    } else {
                    $_SESSION['article'] = "<article class='err-article'>Неверный логин или пароль</article>";
                    header('Location: ../auth.php');
                    }
                }
            }
        }

