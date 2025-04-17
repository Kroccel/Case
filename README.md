Case представляет собой веб-приложение, решающее задачу разделения чека в ресторане по позициям и по количеству на основе тестовых данных.
Для тестирования можно использовать приложение XAMPP, позволяющее развернуть локальный сервер, необходимо:
1) В папке xampp выбрать папку htdocs и внутри неё создать папку receipt.loc, в ней пустую папку logs и рядом добавить папку www с файлами из данного репозитория;
2) В папке xampp выбрать папку apache-conf-extra- httpd-vhosts.conf;
3) Добавить следующие строки в файл: <VirtualHost *:80>
    ServerAdmin webmaster@receipt.loc
   
    DocumentRoot "C:/xampp/htdocs/receipt.loc/www"
   
    ServerName receipt.loc
   
	ServerAlias www.receipt.loc

    ErrorLog "C:/xampp/htdocs/receipt.loc/logs/error.log"
   
    CustomLog "C:/xampp/htdocs/receipt.loc/logs/access.log" combined
   
	<Directory "C:/xampp/htdocs/receipt.loc/www">

	AllowOverride All

	Order allow,deny

	Allow from all

	</Directory>
 
</VirtualHost>

4) Зайти в папку System32-drivers-etc-hosts;
5) Открываем hosts при помощи любого текстового редактора и добавляем туда строчку: 127.0.0.1 receipt.loc
6) При запуске XAMPP Control Panel устанавлиаем apache и mysql;
7) В строке Apache жмем "Admin".
Папка mobile содержит текстовые файлы с кодом FlutterFlow.
