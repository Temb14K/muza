<?php
session_start();
require_once("dbconn.php");
$x = $_SESSION['x'];
$y = $_SESSION['y'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];

    $stmt = $conn->prepare("INSERT INTO switches (name, x, y) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $x, $y);

    if ($stmt->execute()) {
        $_SESSION['article'] = '<article style="border:solid 2px darkgreen;padding:20px;display:inline-flex;width:80%;background-color: #00800033 ">Коммутатор добавлен</article>';
        header("Location: ../index.php");
        exit;
    } else {
        echo "Ошибка при добавлении записи: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>