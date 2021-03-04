# BELAJAR FACEBOOK BOT (PHP-LARAVEL)

Belajar membuat facebook bot menggunakan metode webhook. Menggunakan bahasa pemrograman PHP dengan memanfaatkan framework Laravel(8.x). jika ingin melakukan test local bisa menggunakan ngrok.
- Download ngrok untuk test di Local [disini](https://ngrok.com/download)
- Lihat dokumentasi penggunaan ngrok [disini](https://ngrok.com/docs)
- Lihat dokumentasi penggunaan laravel [disini](https://laravel.com/docs/8.x)
- Lihat dokumentasi penggunaan facebook bot [disini](https://developers.facebook.com/docs/messenger-platform)

Untuk membuat App facebook dapat dilakukan [disini](https://developers.facebook.com/apps/).
- Add Fitur Messenger pada menu app, dan lakukan pengaturan sesuai dengan dokumentasi dari facebook
- Tambahkan 'Halaman Baru' pada bagian Token Akses untuk mengakses token, token ini digunakan untuk setting pada bagian webhook
- Tambahkan webhook url pada bagian Webhooks, contoh: https://youraddress/facebook-bot-php/public/api/webhook

## INSTAL DEPENDENCY

Install dependency yang diperlukan untuk menjalankan app.

`````````````````
composer install
`````````````````

atau 

`````````````````
composer update
`````````````````

## Insert Token

Input token facebook bot dengan menggunakan command:

````````````````````````````````````````````````
php artisan facebook:token {facebook bot token}
````````````````````````````````````````````````
Atau bisa juga inputkan token secara manual di file .env

## File .env

Copy file .env.example dan simpan dengan nama file .env
Beberapa yang perlu di setting di file .env:
- Setting Database
- Setting Facebook base_uri

## Jalankan Migrasi

Tambahkan database yang diperlukan untuk facebook bot

```````````````````````
php artisan migrate
```````````````````````

## PERSISTENT MENU

- Setting / buat persistent menu :

`````````````````````````
php artisan facebook:pmsetting
`````````````````````````

- Delete persistent menu :

`````````````````````````
php artisan facebook:pmdelete
`````````````````````````
