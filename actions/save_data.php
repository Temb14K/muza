<?php
session_start();

header('Content-Type: application/json');

$response = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $x = isset($_POST['x']) ? (int)$_POST['x'] : 0;
    $y = isset($_POST['y']) ? (int)$_POST['y'] : 0;
    $angle_num = isset($_POST['angle']) ? (float)$_POST['angle'] : 0;

    // Сохраняем координаты в сессию
    $_SESSION['x'] = $x;
    $_SESSION['y'] = $y;
    $_SESSION['angle_num'] = $angle_num;

    // Формируем ответ
    $response = ['x' => $x, 'y' => $y, 'angle_num' => $angle_num];
} else {
    // Если запрос не POST, возвращаем ошибку
    $response = ['error' => 'Invalid request method'];
}

?>