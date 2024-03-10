Ansızın bir gece yarısı ortaya çıkan bu muhteşem ötesi kötü kodlanmış panel Edebiyat öğrencileri tarafından beğenildi. Faili meçhul kişi SQL dosyanızı silerse üzülmeyin, yedeği her zaman vardır.

![calf-6923603_1280](https://github.com/Hime-Dev/anguspanel/assets/57987392/b4669b67-81e7-40bd-b983-0bf76d83a3cd)

.htaccess config:
#Kodları Aktif Etmek İçin Kullanılır
RewriteEngine On

#PHP uzantısını kaldırma kodlar
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME}\.php -f
RewriteRule ^(.*)$ $1.php

RewriteRule ^([0-9a-zA-Z-_]+)$ page.php?page=$1 [NC,NE]
RewriteRule ^bolum/(.*)/(.*)$ pages/bolum/role.php?role=$1&id=$2 [NC,NE]
RewriteRule ^bolum-durumu/(.*)$ page.php?page=bolum-durumu&id=$1 [NC,NE]
RewriteRule ^bildirim/(.*)$ page.php?page=bildirim&id=$1 [NC,NE]
RewriteRule ^uye/(.*)$ page.php?page=uye&id=$1 [NC,NE]
RewriteRule ^admin/([0-9a-zA-Z-_]+)$ admin/page.php?page=$1 [NC,NE]
RewriteRule ^giris-yap/([0-9a-zA-Z-_]+)$ page.php?page=$1 [NC,NE]

#klasör izinleri engelleme
#Options -indexes

