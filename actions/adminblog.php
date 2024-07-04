<?php
session_start();
require_once("dbconn.php");

$oldTitle = $_POST['old-title'];
$newTitle = $_POST['title'];
$paragraph = $_POST['paragraph'];
$path = 'uploads/' . time() . $_FILES['new']['name'];



if (empty($oldTitle) || empty($newTitle) || empty($paragraph)) {
    header('Location: ../blog.php');
} else {
    if (empty($_FILES['new']['name'])) {
        $stmt = $conn->prepare("UPDATE `news` SET `title` = ?, `paragraph` = ?, `user` = ? WHERE `title` = ? ");
        $stmt->bind_param("ssss", $newTitle, $paragraph, $_SESSION['user']['id'], $oldTitle);
        $stmt->execute();
        header('Location: ../blog.php');
        } else {
            if (!move_uploaded_file($_FILES['new']['tmp_name'], '../' . $path)) {
                echo 'Ошибка при загрузке фото';
            } else {
                $stmt = $conn->prepare("UPDATE `news` SET `title` = ?, `paragraph` = ?, `image` = ?, `user` = ? WHERE `title` = ? ");
                $stmt->bind_param("sssss", $newTitle, $paragraph, $path, $_SESSION['user']['id'], $oldTitle);
                $stmt->execute();
                header('Location: ../blog.php');
                }
    }
}

