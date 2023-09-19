from pyrogram import Client
from pyrogram.types import Message

api_id = 2758691
api_hash = '908bf71227fe513da2057c44cca530cc'
app = Client('MrZiro', api_id, api_hash)


@app.on_message()
def Bot(app: Client, message: Message):
    chat = message.chat
    user = message.from_user
    user_id = user.id
    text = message.text
    if text == 'Hi':
        app.send_message(user_id, 'Hello World')
    if text == 'Hi':
        app.send_message(user_id, 'Hello World')
