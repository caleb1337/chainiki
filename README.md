# chainiki
Тестовое задание про сайт с чайниками

В качестве сервера использую сборку XAMPP от 2021 года
Для корректной работы роутинга нужно создать файл .htaccess в корне каталога и заполнить его след.образом:
<br>--- .htaccess ---
<br>RewriteEngine On
<br>RewriteBase /chainiki/
<br>RewriteRule ^index\.php$ - [L]
<br>RewriteCond %{REQUEST_FILENAME} !-f
<br>RewriteCond %{REQUEST_FILENAME} !-d
<br>RewriteRule ^(.*)$ /chainiki/index.php?route=$1 [L]
---
