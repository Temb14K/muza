<?php
session_start();
require_once("dbconn.php");

$title = $_POST['request-title'];
$text = $_POST['request-text'];

if (empty($title) || empty($text)) {
    $_SESSION['article'] = "<article class='err-article'>Заявка не отправлена: все поля должны быть заполнены</article>";
    header('Location: ../profile.php');
} else{
    if (strlen($text) > 500 || strlen($title) > 50) {
    $_SESSION['article'] = "<article class='err-article'>Заявка не отправлена: имя заявки должно быть не более 50 символов, а текст заявки - не более 500 символов</article>";
    header('Location: ../profile.php');
    } else {
    $stmt = $conn->prepare("INSERT INTO `requests` (`title`, `text`, `user`) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $text, $_SESSION['user']['id']);
    $stmt->execute();
    $_SESSION['article'] = "<article class='corr-article'>Заявка успешно отправлена, ожидайте ответ на электронной почте</article>";
    header('Location: ../profile.php');
    }
}