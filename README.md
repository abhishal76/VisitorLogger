# VisitorLogger
Visitor LogBook is designed to keep track of visitors and vendors entering your facility.

## Table of contents
* [General info](#general-info)
* [Screenshots](#screenshots)
* [Technologies](#technologies)
* [Setup](#setup)
* [Features](#features)
* [Status](#status)
* [Contact](#contact)

## General Info
The system will allow the person sitting on the Helpdesk/reception to keep track of visitors entering the facility. The details of the visitors will be logged using HTML form and the input fields will be such as name, Contact details, whom to meet, apartment number, the purpose of meeting, date and time.

## Project Screeshots

**Login Page**
![Login Screen](/login.jpg)

**User Page**
![User Screen](/user.jpg)

**Add Details Page**
![Add Details Screen](/add.jpg)

**Update Details Page**
![Update Details Screen](/update.jpg)

**Admin Page**
![Admin Screen](/admin.jpg)

## Technologies
* HTML/CSS
* JavaScript/jquery - version 3.2.1
* PHP - version 7.2.30
* Bootstrap - version 3.3.7
* MariaDB - version 10.4.11-MariaDB
* Apache - version 2.4.43
* phpMyAdmin - version 4.9.5
* XAMPP 

## Link
 https://visitorlogger.000webhostapp.com/index.php
 
## Setup

* Install XAMPP from here: https://www.apachefriends.org/index.html
* Access phpMyAdmin and import the database file. 
* Place the GuestLogger folder in the "HTDocs" folder located under the "XAMMP" folder on your harddrive. The file path for the webserver is "C:\xampp\htdocs\", if you have windows and  "nfs://192.168.64.2/opt/lampp/htdocs/", if you have macOS. 
* You can also follow this step-by-step guide to run php project using XAMMP : https://timetoprogram.com/run-php-project-xampp/

## Features
**List of features ready and TODOs for future development:**

* Register and login
* Add a record
* Edit a record
* Delete a record
* Search a record based on the name or apartment number
* Scroll through the list of records (pagination)

**To-do list:**

* User Profile Page including user details & profile picture (Admin as well as for regular user).
* User can create a ticket for any issue and submit that to the admin.

## Status
Project is: _in progress_. However, the above mentioned features have been incorporated except for the one's meantioned in the to do list that'll be added soon. 


