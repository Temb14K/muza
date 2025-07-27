from telethon import TelegramClient
import mysql.connector
import asyncio

# Параметры подключения к Telegram
API_ID = '26374446'
API_HASH = '04e492ad72be5c025cc3318c57890bf9'
USERNAME = 'temb14_1'

# Параметры подключения к базе данных
DB_CONFIG = {
    'user': 'root',
    'password': '',
    'host': 'localhost',
    'database': 'netmonitoring'
}

async def main():
    db = mysql.connector.connect(**DB_CONFIG)
    cursor = db.cursor(dictionary=True)
    cursor.execute("SELECT ip, x, y, switch_id FROM devices WHERE status = 0")
    devices = cursor.fetchall()
    
    cursor.execute("SELECT name, x, y FROM switches WHERE status = 0")
    switches = cursor.fetchall()

    if not devices and not switches:
        print("No inactive devices or switches found. Exiting...")
        return
    
    # Формируем сообщение
    message = ""
    if devices:
        message += "Следующие устройства не отвечают: "
        message += "; ".join([f"ip: {d['ip']}, x: {d['x']}, y: {d['y']}, switch_id: {d['switch_id']}" for d in devices]) + ";\n"
    if switches:
        message += "Следующие коммутаторы неисправны: "
        message += "; ".join([f"name: {s['name']}, x: {s['x']}, y: {s['y']}" for s in switches]) + ";"
    
    # Подключение к Telegram
    client = TelegramClient('netmonitoring', API_ID, API_HASH)
    await client.start()
    
    # Отправка сообщения
    try:
        await client.send_message(USERNAME, message.strip())
        print("Message sent successfully!")
    except Exception as e:
        print(f"Failed to send message: {e}")
    finally:
        await client.disconnect()
        cursor.close()
        db.close()

asyncio.run(main())