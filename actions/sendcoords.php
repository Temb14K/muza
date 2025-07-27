<?php
session_start();
require_once("dbconn.php");


$ip = $_POST['ip'];
$switch_id = !empty($_POST['switch_id']) ? $_POST['switch_id'] : NULL;
$x = $_SESSION['x'];
$y = $_SESSION['y'];
$angle = $_SESSION['angle_num'];

if (empty($ip)) {
    $_SESSION['article'] = "<article class='err-article'>Пожалуйста, заполните все поля</article>";
    header('Location: ../index.php');
} else {
    $stmt = $conn->prepare("INSERT INTO devices (ip, x, y, angle, switch_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $ip, $x, $y, $angle, $switch_id);
    if ($stmt->execute()) {
        $_SESSION['article'] = '<article style="border:solid 2px darkgreen;padding:20px;display:inline-flex;width:80%;background-color: #00800033 ">Данные отправлены</article>';
        header('Location: ../index.php');
    } else {
        echo "Ошибка при отправке: " . $stmt->error;
    }
        }
?>      