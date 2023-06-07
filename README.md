# chainiki
Тестовое задание про сайт с чайниками

В качестве сервера использую сборку XAMPP от 2021 года
Для корректной работы роутинга нужно создать файл .htaccess в корне каталога и заполнить его след.образом:
--- .htaccess ---
RewriteEngine On
RewriteBase /chainiki/
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ /chainiki/index.php?route=$1 [L]
---
