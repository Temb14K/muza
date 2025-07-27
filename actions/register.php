<?php
session_start();
require_once("dbconn.php");


$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$telnum = $_POST['num'];
$password = $_POST['password'];
$passwordConf = $_POST['password_conf'];






function checkTelnum($telnum) {
    if (strlen($telnum) < 9 || strlen($telnum) > 13) {
        return false;
    } else {
        if (!preg_match('/^[+0-9]+$/', $telnum)) {
            return false;
        } else {
            if (!preg_match('/^(\\+7|8)/', $telnum)) {
                return false;
            } else {
                return true;
            }
        } 
    }
}

function formatTelnum($telnum) {
    if (substr($telnum, 0, 2) == '+7') {
        $telnum = '8' . substr($telnum, 2);
        return $telnum;
    } else {
        return $telnum;
    }
}
function checkData($conn, $name, $username, $email, $telnum, $password, $passwordConf) {

    $specialSigns = '!@#$%^&*()_-"+=/?.<>;\':[]{}`\\~';
    $cifers = '1234567890';


    if (empty($name) || empty($username) || empty($email) || empty($telnum) || empty($password) || empty($passwordConf)) {
        $_SESSION['article'] = "<article class='err-article'>Пожалуйста, заполните все поля</article>";
        header('Location: ../reg.php');
        return false;
    } else {
        if ($password != $passwordConf) {
            $_SESSION['article'] = "<article class='err-article'>Пароли не совпадают</article>";
            header('Location: ../reg.php');
            return false;
        } else {
            if ($conn -> query("SELECT * FROM users WHERE username='$username'") -> num_rows > 0) {
                $_SESSION['article'] = "<article class='err-article'>Имя пользователя занято</article>";
                header('Location: ../reg.php');
                return false;
            } else {
                if ($conn -> query("SELECT * FROM users WHERE email ='$email'") -> num_rows > 0) {
                    $_SESSION['article'] = "<article class='err-article'>Электронная почта уже используется</article>";
                    header('Location: ../reg.php');
                    return false;
                } else {
                    if (strlen($password) < 6 || !(preg_match('/[' . preg_quote($specialSigns, '/') . ']/', $password)) || !(preg_match('/[' . preg_quote($cifers, '/') . ']/', $password))) {
                        $_SESSION['article'] = "<article class='err-article'>Пароль должен содержать хотя бы 6 символов, включать в себя цифры и хотя бы один специальный знак</article>";
                        header('Location: ../reg.php');
                        return false;
                    } else {
                        if (checkTelnum($telnum) == false) {
                            $_SESSION['article'] = "<article class='err-article'>Введен неверный формат телефонного номера</article>";
                            header('Location: ../reg.php');
                            return false;
                        } else {
                            $telnum = formatTelnum($telnum);
                            if ($conn -> query("SELECT * FROM users WHERE telnum ='$telnum'") -> num_rows > 0) {
                                $_SESSION['article'] = "<article class='err-article'>Номер телефона уже используется</article>";
                                header('Location: ../reg.php');
                                return false;
                            } else {
                                if (strlen($name) > 180 || strlen($username) > 180 || strlen($email) > 180  || strlen($password) > 180 || strlen($passwordConf) > 180) {
                                    $_SESSION['article'] = "<article class='err-article'>Превышен допустимый лимит символов</article>";
                                    header('Location: ../reg.php');
                                    return false;
                                } else {
                                    return true;
                                }     
                            }
                        }
                    }
                }
            }
        }
    }
}


if (checkData($conn, $name, $username, $email, $telnum, $password, $passwordConf) == true) {
    $telnum = formatTelnum($telnum);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (name, username, email, telnum, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $username, $email, $telnum, $hashedPassword);
    if ($stmt->execute()) {
        $_SESSION['article'] = '<article style="border:solid 2px darkgreen;padding:20px;display:inline-flex;width:80%;background-color: #00800033 ">Вы успешно зарегистрированы</article>';
        header('Location: ../reg.php');
    } else {
        echo "Ошибка при регистрации: " . $stmt->error;
    }
}