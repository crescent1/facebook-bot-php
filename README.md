# BELAJAR BOT FACEBOOK

- Belajar untuk menggunakan bot facebook pada messanger

## INSTAL DEPENDENCY

````````````````````````
compser install
````````````````````````

## File .env

Beberapa yang perlu di setting di file .env:
- Setting Database
- Setting Facebook token
- Setting Facebook uri

## Jalankan Migrasi

```````````````````````
php artisan migrate
```````````````````````

## PERSISTENT MENU

- Setting / buat persistent menu :

`````````````````````````
php artisan botfb:setpm
`````````````````````````

- Delete persistent menu :

`````````````````````````
php artisan botfb:delpm
`````````````````````````
