from pyrogram import Client
from pyrogram.types import (InlineKeyboardMarkup, InlineKeyboardButton)
#----------------------------
api_id = 2758691
api_hash = "908bf71227fe513da2057c44cca530cc"
admin = int(input("ID number admin\n-->"))
#----------------------------
app = Client(name="my_bot",
            api_id=api_id,
            api_hash=api_hash,
             )
@app.on_message(group=0)
def bot(client, message):
    wellcom_admin = f"<b><a href='tg://user?id={admin}'>ارباب خوش آمدید</a></b>"
    wellcom = f"**سلام به ربات پیام رسان من خوش آمدید**"
    send_text = f"پیامتون اومد لطفا صبور باشید تا جواب بدهم"
    a = message
    text = message.text
    chat_id = message.chat.id
    if text == "/start":
        if chat_id == admin:
            message.reply_text(wellcom_admin, parse_mode="HTML", quote=True)
        else:
            message.reply_text(wellcom, quote=True)
    elif chat_id != admin:
        b = message.chat.id
        b2 = message.text
        send_admin = f"آیدی عددی ارسال کننده: \n{b}\n <a href='tg://user?id={b}'>پروفایل و پیویش</a>"
        if a.sticker:
            app.send_sticker(admin, a.sticker.file_id ,reply_markup=InlineKeyboardMarkup(
                    [
                        [InlineKeyboardButton(
                            "پاسخ دادن", callback_data=f"{b}")]
                    ]))
            app.send_message(admin, send_admin, parse_mode="HTML")
        elif a.video:
            app.send_video(admin, a.video.file_id, reply_markup=InlineKeyboardMarkup(
                [
                    [InlineKeyboardButton(
                        "پاسخ دادن", callback_data=f"{b}")]
                ]))
            app.send_message(admin, send_admin, parse_mode="HTML")
        elif a.voice:
            app.send_voice(admin, a.voice.file_id, reply_markup=InlineKeyboardMarkup(
                [
                    [InlineKeyboardButton(
                        "پاسخ دادن", callback_data=f"{b}")]
                ]))
            app.send_message(admin, send_admin, parse_mode="HTML")
        elif a.animation:
            app.send_animation(admin, a.animation.file_id, reply_markup=InlineKeyboardMarkup(
                [
                    [InlineKeyboardButton(
                        "پاسخ دادن", callback_data=f"{b}")]
                ]))
            app.send_message(admin, send_admin, parse_mode="HTML")
        elif a.document:
            app.send_document(admin, a.document.file_id, reply_markup=InlineKeyboardMarkup(
                [
                    [InlineKeyboardButton(
                        "پاسخ دادن", callback_data=f"{b}")]
                ]))
            app.send_message(admin, send_admin, parse_mode="HTML")
        elif a.audio:
            app.send_audio(admin, a.audio.file_id, reply_markup=InlineKeyboardMarkup(
                [
                    [InlineKeyboardButton(
                        "پاسخ دادن", callback_data=f"{b}")]
                ]))
            app.send_message(admin, send_admin, parse_mode="HTML")
        elif a.photo:
            app.send_photo(admin, a.photo.file_id, reply_markup=InlineKeyboardMarkup(
                [
                    [InlineKeyboardButton(
                        "پاسخ دادن", callback_data=f"{b}")]
                ]))
            app.send_message(admin, send_admin, parse_mode="HTML")
        elif a.video_note:
            app.send_video_note(admin, a.video_note.file_id, reply_markup=InlineKeyboardMarkup(
                [
                    [InlineKeyboardButton(
                        "پاسخ دادن", callback_data=f"{b}")]
                ]))
            app.send_message(admin, send_admin, parse_mode="HTML")
        elif a.dice:
            app.send_dice(admin, a.dice.emoji, reply_markup=InlineKeyboardMarkup(
                [
                    [InlineKeyboardButton(
                        "پاسخ دادن", callback_data=f"{b}")]
                ]))
            app.send_message(admin, send_admin, parse_mode="HTML")
        else:
            app.send_message(
                admin, f"آیدی عددی ارسال کننده: \n{b}\n <a href='tg://user?id={b}'>پروفایل و پیویش</a>\n------------\n{b2}", parse_mode="HTML",reply_markup=InlineKeyboardMarkup(
                    [
                        [InlineKeyboardButton(
                            "پاسخ دادن", callback_data=f"{b}")]
                    ]))
        message.reply_text(send_text, quote=True)
#----------------------------
@app.on_callback_query(group=1)
def call_b(client, callback_query):
    if callback_query.data != "cancel":
        f = open("rep.txt", "w")
        f.write(callback_query.data)
        f.close()
        app.send_message(admin, "پیامتو بده" ,reply_markup=InlineKeyboardMarkup(
                    [
                        [InlineKeyboardButton(
                            "لغو", callback_data="cancel")]
                    ]))
#----------------------------
@app.on_callback_query(group=2)
def call_b2(client, callback_query):
    if callback_query.data == "cancel":
        c = open("rep.txt", "w")
        c.write(callback_query.data)
        c.close()
        app.send_message(admin, "لغو شد")
#----------------------------
@app.on_message(group=3)
def send_m(client, message):
    a = message
    if a.chat.id == admin:
        try:
            file = open("rep.txt", "r")
            for x in file:
                if a.sticker:
                    app.send_sticker(int(x), a.sticker.file_id )
                elif a.video:
                    app.send_video(int(x), a.video.file_id)
                elif a.voice:
                    app.send_voice(int(x), a.voice.file_id)
                elif a.animation:
                    app.send_animation(int(x), a.animation.file_id)
                elif a.document:
                    app.send_document(int(x), a.document.file_id)
                elif a.audio:
                    app.send_audio(int(x), a.audio.file_id)
                elif a.photo:
                    app.send_photo(int(x), a.photo.file_id)
                elif a.video_note:
                    app.send_video_note(int(x), a.video_note.file_id)
                elif a.dice:
                    app.send_dice(int(x), a.dice.emoji)
                else:
                    app.send_message(int(x), f"{message.text}")
                message.reply_text("ارسال شد", quote=True)
            file2 = open("rep.txt" , "w")
            file2.writ("")
            file2.close()
        except:
            pass
app.run()
