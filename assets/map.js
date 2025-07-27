document.addEventListener('DOMContentLoaded', () => {
  const mapContainer = document.getElementById('map-container');
  const map = document.getElementById('map');

  let cone = null;
  let clickCount = 0;
  let origin = { x: 0, y: 0 };

  mapContainer.addEventListener('click', (e) => {
    const rect = map.getBoundingClientRect();
    const x = Math.round(e.clientX - rect.left);
    const y = Math.round(e.clientY - rect.top);

    clickCount++;

    if (clickCount === 1) {
      cone = document.createElement('img');
      cone.src = 'assets/cone.svg';
      cone.id = 'cone';
      cone.style.position = 'absolute';
      cone.style.transformOrigin = 'left center';
      cone.style.pointerEvents = 'none';
      cone.style.width = 'auto';
      cone.style.height = '80px';
      cone.style.left = `${x}px`;
      cone.style.top = `${y - (cone.offsetHeight / 2)}px`;
      mapContainer.appendChild(cone);

      origin = { x, y };

      cone.onload = () => {
        cone.style.top = `${y - (cone.offsetHeight / 2)}px`;
      };

      updateCoordinatesDisplay(origin.x, origin.y, 0);

      document.addEventListener('mousemove', onMouseMove);
    } else if (clickCount === 2 && cone) {
      document.removeEventListener('mousemove', onMouseMove);

      // Извлекаем угол из transform
      const angleMatch = cone.style.transform.match(/rotate\(([^deg]*)deg\)/);
      const angleValue = angleMatch && angleMatch[1] ? parseFloat(angleMatch[1]) : 0; // Преобразуем в число, если есть, иначе 0

      // Отправляем данные на сервер через AJAX
      sendDataToPHP(origin.x, origin.y, angleValue);

      // Обновляем угол на странице
      updateCoordinatesDisplay(origin.x, origin.y, angleValue);
    } else if (clickCount === 3 && cone) {
      document.removeEventListener('mousemove', onMouseMove);
      cone.remove();
      cone = null;
      clickCount = 0;

      updateCoordinatesDisplay(0, 0, 0);
    }
  });

  function onMouseMove(e) {
    if (!cone) return;

    const rect = map.getBoundingClientRect();
    const mouseX = e.clientX - rect.left;
    const mouseY = e.clientY - rect.top;

    const dx = mouseX - origin.x;
    const dy = mouseY - origin.y;
    const angle = Math.atan2(dy, dx) * 180 / Math.PI;

    cone.style.transform = `rotate(${angle}deg)`;

    updateCoordinatesDisplay(origin.x, origin.y, angle);
  }

  function sendDataToPHP(x, y, angle) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "actions/save_data.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Отправляем данные x, y, angle через POST
    xhr.send("x=" + x + "&y=" + y + "&angle=" + angle);
}


  function updateCoordinatesDisplay(x, y, angle) {
    document.getElementById('x_coord').textContent = x.toFixed(0);
    document.getElementById('x_coord_switch').textContent = x.toFixed(0);
    document.getElementById('y_coord').textContent = y.toFixed(0);
    document.getElementById('y_coord_switch').textContent = y.toFixed(0);
    document.getElementById('angle').textContent = angle.toFixed(2); // Два знака после запятой
  }
});
