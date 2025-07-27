<?php
session_start();
require_once("dbconn.php");

$login = $_POST['login'];
$password = $_POST['password'];


if (empty($login) || empty($password)) {
    $_SESSION['article'] = "<article class='err-article'>Пожалуйста, заполните все поля</article>";
    header('Location: ../auth.php');
} else {
            $stmt = $conn->prepare("SELECT * FROM `users` WHERE `username` = ? OR `email` = ?");
            $stmt->bind_param("ss", $login, $login);
            $stmt->execute();
            $checkUser = $stmt->get_result();
            if ($checkUser->num_rows == 0) {
            $_SESSION['article'] = "<article class='err-article'>Неверный логин или пароль</article>";
            header('Location: ../auth.php');
            } else {
                $user = $checkUser->fetch_assoc();

                if (password_verify($password, $user["password"])&& $user["isAdmin"] == "1"){
                    $_SESSION['user'] = [
                    "id" => $user["id"],
                    "name" => $user["name"],
                    "username"=> $user["username"],
                    "email"=> $user["email"],
                    "telnum"=> $user["telnum"],
                    "password"=> $user["password"],
                    "isAdmin"=> $user["isAdmin"],
                    ];
                    if ($user["isAdmin"] == "1") {
                        $_SESSION['isAuthorized'] = true;
                        header('Location: ../index.php');
                    }
                }
                 else {
                    $_SESSION['article'] = "<article class='err-article'>Неверный логин или пароль</article>";
                    header('Location: ../auth.php');
                    exit();                  
                }
            }
        }
?>      
