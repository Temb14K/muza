<?php
session_start();
require_once("dbconn.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM switches WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['article'] = '<article style="border:solid 2px darkgreen;padding:20px;display:inline-flex;width:80%;background-color: #00800033 ">Коммутатор удален</article>';
        header("Location: ../index.php");
        exit;
    } else {
        echo "Ошибка при удалении записи: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>