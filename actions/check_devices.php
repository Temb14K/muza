<?php
session_start();
set_time_limit(0);
require_once("dbconn.php");

if ($_SESSION['isAuthorized'] != true || $_SESSION['user']['isAdmin'] != 1) {
    header('Location: ../auth.php');
    exit();
}

// Функция проверки доступности устройства по IP через HTTP
function sendHttpRequest($ip) {
    $ch = curl_init($ip);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return ($httpCode === 200);
}

$switchStatus = []; // Для отслеживания статуса коммутаторов

$deviceQuery = "SELECT id, ip, switch_id FROM devices";
$deviceResult = mysqli_query($conn, $deviceQuery);

if (!$deviceResult || mysqli_num_rows($deviceResult) === 0) {
    $_SESSION['article'] = "<article class='err-article'>Нет устройств для мониторинга.</article>";
    header('Location: ../index.php');
    exit();
}

while ($device = mysqli_fetch_assoc($deviceResult)) {
    $id = $device['id'];
    $ip = $device['ip'];
    $switch_id = $device['switch_id'];

    $status = sendHttpRequest($ip) ? 1 : 0;

    $stmt = $conn->prepare("UPDATE devices SET status = ? WHERE id = ?");
    $stmt->bind_param("ii", $status, $id);
    $stmt->execute();

    if (!is_null($switch_id)) {
        if (!isset($switchStatus[$switch_id])) {
            $switchStatus[$switch_id] = [];
        }
        $switchStatus[$switch_id][] = $status;
    }
}

// Обновляем статусы коммутаторов
foreach ($switchStatus as $switch_id => $statuses) {
    // Если хотя бы одно устройство активно — статус 1, иначе — 0
    $switchStatusValue = in_array(1, $statuses) ? 1 : 0;

    $stmt = $conn->prepare("UPDATE switches SET status = ? WHERE id = ?");
    $stmt->bind_param("ii", $switchStatusValue, $switch_id);
    $stmt->execute();
}

mysqli_close($conn);
chmod("message.py", 0755);
shell_exec("C:\\Users\\artem\\AppData\\Local\\Programs\\Python\\Python313\\python.exe message.py > nul 2>&1");

// Сообщение и редирект
$_SESSION['article'] = '<article style="border:solid 2px darkgreen;padding:20px;display:inline-flex;width:80%;background-color: #00800033">Мониторинг завершён. Статусы обновлены.</article>';
header('Location: ../index.php');
exit();
?>
