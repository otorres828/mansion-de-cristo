# Mansion de cristo ✝️

_Sistema administrativo dedica a la inglesia Mansion de cristo, Venezuela,Bolivar, Ciudad Guayana, Proyecto Servicio comunitario_

## Construido con 🛠️

 * [PHP 8.0](https://www.php.net/downloads.php) 
 * [Laravel 9.5.1](https://laravel.com/docs/9.x)

## Comenzando 🚀

_Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas._  

### Pre-requisitos 📋

_Que cosas necesitas para instalar el software y como instalarlas_
  
  * [PHP 8.x.x](https://www.php.net/downloads.php) - lenguaje de programacion 
  * [Apache2](https://httpd.apache.org/download.cgi) -  HTTP servidor web 
_Es posible/recomendado instalar un paquete como "[XAMPP](https://www.apachefriends.org/es/index.html)" que ya incluye ambos elementos, Necesario PHP 8.^ y Apache 2.^_

* [Composer](https://getcomposer.org/) - Manejador de dependencias
 * [Laravel 9.x](https://laravel.com/docs/9.x) - Framework web utilizado  

* [Node.js](https://nodejs.org/es/) - Usado para generar algunas depencias con npm 

* [Postgresql](https://www.postgresql.org/download/) - Manejador/ driver  de bases de datos

### Instalación 🔧

_Una serie de ejemplos paso a paso que te dice lo que debes ejecutar para tener un entorno de desarrollo ejecutándose_

  Primeramente debemos asegurarnos de descomentar las extensiones de postgresql en nuestro php.ini (abrimos xampp, config apache> php.ini)
```
;extension=pdo_pgsql
;extension=pgsql
>>>
extension=pdo_pgsql
extension=pgsql
```
Se reinicia apache, y ya tenemos las herramientas preparadas para instalar 

1. Clonamos el repositorio en la carpeta "C:\xampp\htdocs"
2. Preparamos el archivo .env con nuestras credenciales, codigos smtp, etc 
3. Creamos la base de datos en nuestro gestor de BDD (Pgadmin4)
4. Ejecutamos los siguientes comandos 
	```bash
	composer install
	npm install
	PHP artisan storage:link
	php artisan migrate:fresh --seed
	npm run dev 
	```
_Recomendamos crear un dominio local para el proyecto [Tutorial:Como crear un dominio local](https://www.youtube.com/watch?v=HzygRlPmYQc)_

 ## Wiki 📖

Puedes encontrar mucho más de cómo utilizar este proyecto en nuestra [Wiki](https://github.com/tu/proyecto/wiki)

## Autores ✒️

* **Oliver English** - *Programador Fullstack - Modulo Blog - [otorres828](https://github.com/otorres828)*

* **Jesus Alfonzo** - *Programador Fullstack - Modulo Secretaria - [Alfonzzoj](https://github.com/Alfonzzoj)*

## Objetivo del proyecto 📄
Este es un proyecto realizado sin fines de lucro para la iglesia [Mansion de cristo](https://www.google.com/maps/place/Iglesia+Mansi%C3%B3n+De+Cristo/@8.3454583,-62.685719,15z/data=!4m5!3m4!1s0x0:0x951f32172a86a986!8m2!3d8.3455609!4d-62.6856768) ubicada en Venezuela,Bolivar, Ciudad Guayana por los alumnos Jesus Alfonzo y Oliver torres, Estudiantes de 7mo semestre de ingenieria informatica en la Universidad Catolica Andres Bello "Guayana", como parte de su servicio comunitario.    
