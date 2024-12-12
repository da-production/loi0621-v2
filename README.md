
# CNAC / LOI0621 Guide 
<img align="center" src="logo.pnp" alt="CNAC LOGO" width="90px">
Guide for the core of application LOI0621 and how was made.
Created with Laravel 7 Framework  hosted in windows server using IIS `host:192.168.5.15` 

> this guide help you to make new modules and changes.

![Screenshot](loi0621.jpg)

## Routes File

     1. web.php
     2. employeur.php
     3. file.php
     4. subvention.php
     5. formation.php
     6. ajax.php
     7. administrateur.php

  

## Resources files

Divided to (6) folder

1- administrateur (manages the backend of the application)

2- employeur (space of employeur)

3- auth (for employeur auth and registration)

4- layouts (manages the templates of application)

5- components

  

## Storage files

1- download folder: to download statique files

2- upload folder: the files of employeurs uploaded

```

- structure : 'upload/[subvention|formation]/{code_employeur}/*.pdf'

```

  
  

## Database

Tables created using ***artisan*** migration

> **WARNING :**
> 
> don't make any changes

create new **migration** to create new fields

```

Driver:SQLSERVER

HOST:192.168.7.20

PORT:=1433

```

  

## Models

> no subfolder for model

    path : App/*.php

  

## Controllers

Devided into foor

 1. Controllers for Frontend

		Path: App/Http/Controllers/*.php

 2. Controllers to manages the backend of the application

		Path: App/Http/Controllers/Administrateur/*.php

 3. Controllers for Ajax requests

		Path: App/Http/Controllers/Ajax/*.php

 4. Controllers for manages employeur auth

		Path: App/Http/Controllers/Auth/*.php

  

## Request Controllers

Controllers to validate Request

	Path: App/Http/Requests

  

## Components Controllers

Controllers to manage the view Components

	Path: App/View/Components
