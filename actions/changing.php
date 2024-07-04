<?php
session_start();
require_once("dbconn.php");

$newPassword = $_POST["new-password"];
$passwordConf = $_POST["conf-password"];
function checkData($conn, $newPassword, $passwordConf) {

    $specialSigns = '!@#$%^&*()_-"+=/?.<>;\':[]{}`\\~';
    $cifers = '1234567890';


    if (empty($newPassword) || empty($passwordConf)) {
        $_SESSION['article'] = "<article class='err-article'>Пожалуйста, заполните все поля</article>";
        header('Location: ../change.php');
        return false;
    } else {
        if ($newPassword != $passwordConf) {
            $_SESSION['article'] = "<article class='err-article'>Пароли не совпадают</article>";
            header('Location: ../change.php');
            return false;
        } else {
            if (strlen($newPassword) < 6 || !(preg_match('/[' . preg_quote($specialSigns, '/') . ']/', $newPassword)) || !(preg_match('/[' . preg_quote($cifers, '/') . ']/', $newPassword))) {
            $_SESSION['article'] = "<article class='err-article'>Пароль должен содержать хотя бы 6 символов, включать в себя цифры и хотя бы один специальный знак</article>";
            header('Location: ../change.php');
            return false;
            } else {
                return true;
            }
        }
    }
}

if (checkData($conn, $newPassword, $passwordConf) == true) {
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE `users` SET `password` = ? WHERE `email` = ? ");
    $stmt->bind_param("ss", $hashedPassword, $_SESSION['user']['email']);
    if ($stmt->execute()) {
        session_destroy();
        session_start();
        $_SESSION['article'] = '<article style="border:solid 2px darkgreen;padding:20px;display:inline-flex;width:80%;background-color: #00800033 ">Пароль успешно изменен</article>';
        header('Location: ../auth.php');
    } else {
        echo "Ошибка при смене пароля: " . $stmt->error;
        session_destroy();
    }
}