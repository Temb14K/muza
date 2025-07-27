<?php
session_start();
require_once("./actions/dbconn.php");
if (!isset($_SESSION['isAuthorized']) || $_SESSION['isAuthorized'] != true || $_SESSION['user']['isAdmin'] != 1) {
header('Location: ./auth.php');
exit();
}

$sql = "SELECT id, name, x, y, status FROM switches";

$dropdown_result = $conn->query($sql);
$edit_result = $conn->query($sql);
$table_result = $conn->query($sql);

$sql_devices = "SELECT id, ip, x, y, angle, status, switch_id FROM devices";
$devices_result = $conn->query($sql_devices);


if (isset($_POST['edit_device'])) {
  $id = $_POST['id'];
  $ip = $_POST['ip'];
  $switch_id = ($_POST['switch_id'] === "") ? NULL : $_POST['switch_id'];

  $stmt = $conn->prepare("UPDATE devices SET ip = ?, switch_id = ? WHERE id = ?");
  $stmt->bind_param("sii", $ip, $switch_id, $id);

  if ($stmt->execute()) {
      $_SESSION['article'] = '<article style="border:solid 2px darkgreen;padding:20px;display:inline-flex;width:80%;background-color: #00800033">Устройство обновлено</article>';
      header("Location: index.php");
      exit;
  } else {
      echo "Ошибка при обновлении записи: " . $stmt->error;
  }

  $stmt->close();
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];

    $stmt = $conn->prepare("UPDATE switches SET name = ? WHERE id = ?");
    $stmt->bind_param("si", $name, $id);

    if ($stmt->execute()) {
        $_SESSION['article'] = '<article style="border:solid 2px darkgreen;padding:20px;display:inline-flex;width:80%;background-color: #00800033 ">Коммутатор обновлен</article>';
        header("Location: index.php");
        exit;
    } else {
        echo "Ошибка при обновлении записи: " . $stmt->error;
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Net Monitoring AP</title>
  <link rel="stylesheet" crossorigin href="/assets/main-g3sUvViC.css">
</head>
<body>
    <header class="header">
        <div class="header__inner container">
          <div class="header__inner__top">
            <span class="header__logo logo">
              Net Monitoring AP
            </span>
            <? if (@$_SESSION['isAuthorized'] == true) {
            echo '<a href="./actions/quit.php" class="header__profile-link menu-link">выйти</a>';
            } else {
              echo '<a href="auth.php" class="header__profile-link menu-link">войти</a>';
            }?>
          </div>
        </div>
    </header>
    <?if (@$_SESSION['article']) {
      echo $_SESSION['article'];
      unset($_SESSION['article']);
    } ?>
    <h2>Управление устройствами</h2>

    <table border="2">
      <tr>
        <th>ID</th>
        <th>IP</th>
        <th>Координаты (X, Y)</th>
        <th>Угол</th>
        <th>Статус</th>
        <th>Switch ID</th>
        <th>Действия</th>
      </tr>

    <?php
    if ($devices_result->num_rows > 0) {
        while ($row = $devices_result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["ip"] . "</td>
                    <td>" . $row["x"] . ", " . $row["y"] . "</td>
                    <td>" . $row["angle"] . "</td>
                    <td>" . $row["status"] . "</td>
                    <td>" . $row["switch_id"] . "</td>
                    <td>
                        <a href='?edit_device_id=" . $row["id"] . "'>Редактировать</a> |
                        <a href='./actions/deletedevice.php?id=" . $row["id"] . "'>Удалить</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Нет данных</td></tr>";
    }
    ?>
    </table>

    <?php
    if (isset($_GET['edit_device_id'])) {
        $edit_device_id = $_GET['edit_device_id'];

        $stmt = $conn->prepare("SELECT id, ip, switch_id FROM devices WHERE id = ?");
        $stmt->bind_param("i", $edit_device_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $device = $result->fetch_assoc();

        if ($device) {
            ?>
            <h3>Редактировать устройство</h3>
            <form method="POST" action="index.php">
                <input type="hidden" name="id" value="<?php echo $device['id']; ?>">
                <input type="text" name="ip" value="<?php echo $device['ip']; ?>" required placeholder="IP">
                <select name="switch_id">
                    <option value=""<?php echo ($device['switch_id'] === NULL) ? "selected" : ""; ?>>null</option>
                    <?php
                    if ($edit_result->num_rows > 0) {
                        while ($switch = $edit_result->fetch_assoc()) {
                            $selected = ($switch['id'] == $device['switch_id']) ? "selected" : "";
                            echo "<option value='" . $switch['id'] . "' $selected>" . $switch['id'] . "</option>";
                        }
                    }
                    ?>
                </select>
                <button type="submit" name="edit_device">Сохранить изменения</button>
            </form>
            <?php
        } else {
            echo "<p>Запись не найдена!</p>";
        }

        $stmt->close();
    }
    ?>
    <h3>Добавить устройство</h3>
    <div id="coordinates">
        X: <span id="x_coord">0</span>, Y: <span id="y_coord">0</span>, Угол: <span id="angle">0</span>
        <span>
          <form id="senddata" action="./actions/sendcoords.php" method="post">
            <input type="text" name="ip" placeholder="IP">
            <select name="switch_id">
            <option value="">Выберите ID</option>
              <?php
              if ($dropdown_result->num_rows > 0) {
              while ($row = $dropdown_result->fetch_assoc()) {
                echo "<option value='" . $row["id"] . "'>" . $row["id"] . "</option>";
                }
              }
                ?>
            </select>
            <button type="sumbit">Отправить</button>
          </form>
          
        </span>
        
    </div>

    <h2>Управление коммутаторами</h2>
    <table border="2">
      <tr>
        <th>ID</th>
        <th>Имя</th>
        <th>Координаты (X, Y)</th>
        <th>Статус</th>
        <th>Действия</th>
      </tr>

    <?php
    if ($table_result->num_rows > 0) {
      while($row = $table_result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["x"] . ", " . $row["y"] . "</td>
                <td>" . $row["status"] . "</td>
                <td>
                    <a href='?edit_id=" . $row["id"] . "'>Редактировать</a> |
                    <a href='./actions/deleteswitch.php?id=" . $row["id"] . "'>Удалить</a>
                </td>
              </tr>";
    }
    } else {
        echo "<tr><td colspan='4'>Нет данных</td></tr>";
    }
    ?>
    </table>
    <?php
    if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];

    $stmt = $conn->prepare("SELECT id, name FROM switches WHERE id = ?");
    $stmt->bind_param("i", $edit_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $switch = $result->fetch_assoc();

    if ($switch) {
        ?>
        <form method="POST" action="index.php">
            <input type="hidden" name="id" value="<?php echo $switch['id']; ?>">
            <input type="text" name="name" value="<?php echo $switch['name']; ?>" required>
            <button type="submit" name="edit">Сохранить изменения</button>
        </form>
        <?php
    } else {
        echo "<p>Запись не найдена!</p>";
    }

    $stmt->close();
    }
    ?>
    <h3>Добавить коммутатор</h3>
    <div id="coordinates">
        X: <span id="x_coord_switch">0</span>, Y: <span id="y_coord_switch">0</span>
        <span>
          <form id="senddata" action="./actions/addswitch.php" method="post">
          <input type="text" name="name" placeholder="Имя коммутатора" required>
          <button type="sumbit">Отправить</button>
          </form>
          
        </span>
    </div>
    <div id="map-container" style="position: relative;">
    <?php
$devices_result->data_seek(0); // сброс указателя
while ($device = $devices_result->fetch_assoc()) {
    $x = (int)$device['x'];
    $y = (int)$device['y'];
    $angle = (int)$device['angle'];
    $status = (int)$device['status'];
    $coneTop = $y - 40;
    // Отрисовка cone.svg
    
    echo "<img src='./assets/cone.svg' 
        style='position: absolute; left: {$x}px; top: {$coneTop}px; transform: rotate({$angle}deg); transform-origin: left center; height: 80px;' 
        alt='cone'>";

    // Отрисовка маркера
    $marker = $status == 1 ? 'success-marker.svg' : 'fail-marker.svg';
    echo "<img src='./images/{$marker}' 
        style='position: absolute; left: {$x}px; top: {$y}px; transform: translate(-50%, -50%); width: 50px; height: 50px;' 
        alt='marker'>";
}

// Свитчи
$table_result->data_seek(0); // сброс указателя
while ($switch = $table_result->fetch_assoc()) {
    $x = (int)$switch['x'];
    $y = (int)$switch['y'];
    $status = (int)$switch['status'];

    $marker = $status == 1 ? 'success-marker.svg' : 'fail-marker.svg';
    echo "<img src='./images/{$marker}' 
        style='position: absolute; left: {$x}px; top: {$y}px; transform: translate(-50%, -50%); width: 50px; height: 50px;' 
        alt='switch marker'>";
}
?>
    <img id="map" src="./images/map.png?nocache=<?php echo time(); ?>" alt="">
    </div>
    <form action="./actions/check_devices.php">
      <button id="refreshMap">Обновить карту</button>
    </form>
</body>
<script src="assets/map.js?v=1.0"></script>

</html>