# ***EDP-BMS***

**DISCLAIMER**
--
All data in this application is not real data, this is dummy data for development.
For the real data, I don't have access to it.

## Application Environment
```
Language & Framework
- PHP 7.4.1
- Codeigniter 3.1.11
-----------------------------------------
Library & Templates
- dompdf/dompdf
- chriskacerguis/codeigniter-restserver
- AdminLTE 3
-----------------------------------------
Database
- MySQL Ver 9.1 Distrib 10.4.11-MariaDB
- PHPMyAdmin 5.0.1
```

## Installation
```
Download this file or clone it
git clone https://github.com/akunbeben/edp-bms.git

Extract or clone into 
\www\.. 
or 
\htdocs\..

Install Dependencies
run composer command "composer install"

Importing database
create new database named "kunjungan"
then import the database from file "..\edp-bms\kunjungan.sql"

Configuration
Set the database config inside the file "..\edp-bms\application\config\database.php"
Make sure base_url matches the folder name or you can setup from this file "..\edp-bms\application\config\config.php"
```

## Authentication
```
user 1 : 
    username: admin
    password: admin
user 2 : 
    username: akunbeben
    password: 1234
```

## Endpoints 
these are simple endpoints for monitoring complaints data, integrated with the internal application of **Indomaret BMS**

- GET: http://localhost/edp-bms/api/complaint
- GET: http://localhost/edp-bms/api/follow-up