# _PHP Project Hair Salon_

#### _Hair Salon, March, 2017_

#### By _**Zach Beecher**_

## Description

_A simple web form for an owner of a hair salon to add stylists and clients as they please, this is a one to many example, where stylists see many clients, and clients see 1 stylist. MySQL and PHP, with other technologies used, too._

## Setup/Installation Requirements

* _Hello friend, please download project files from github (link below)_
* _Run Composer Install in terminal while you are inside the directory root folder hairsalonWeek3_
* _Unzip the database files, and enjoy!_

## Github link
* https://github.com/ziggity/hairsalonfinalweek3

## Specs
* _Spec 1: The owner(user) can save stylists to database.
input: Joe Smith - enter.
output: Database now includes Joe Smith with unique ID._
* _Spec 2: The owner can add clients for each stylist, as each stylist likes to work independently. Also who see that stylist are affiliated with IDs of the clients (one to many).
input:Mary Jo - sees Stylist Joe Smith. Joe who also sees Jon Jackson, too.
output: Database shows Mary Jo is affiliated with Joe Smith with unique ID, and so is Jon jackson_
* _Spec 3: Stylist names and IDs are easily gathered from database.
input: get name: Joe Smith
output:"Joe Smith, ID 503"_
* _Spec 4: You can change stylists names on database as you please.
input: change Stylist name Joey Dirt to "Joe D."
output:Joey dirt is now equal to "Joe D."_
* _Spec 5:All stylist can be deleted if user so chooses with a click of a button.
input: delete all stylists.
output: stylist database is now empty_
* _Spec 6:All clients can be deleted if user so chooses with a click of a button.
input:delete all clients.
output:client database is now empty_
* _Spec 7:You can change clients names on database as you please.
input:change client name Max Larson to "Max Overload".
output: client name Max Larson is now equal to Max overload._
* _Spec 8:User can gather IDs of clients or stylists if they choose.
input: get stylist / client id of Joe Smith.
output: Joe Smith is id of 503._

## MySQL commands I used for this project are below:
* First launch MAMP then enter this command in your terminal:
* /Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot
* SHOW DATABASES;
* CREATE DATABASE hair_salon;
* USE hair_salon;
* CREATE TABLE stylists (id SERIAL PRIMARY KEY, name varchar (255));
* CREATE TABLE clients (id SERIAL PRIMARY KEY, name varchar (255));
* CREATE DATABASE hair_salon_test;
* USE hair_salon_test;
* CREATE TABLE stylists (id SERIAL PRIMARY KEY, name varchar (255));
* CREATE TABLE clients (id SERIAL PRIMARY KEY, name varchar (255));

## PHPUnit testing commands for your easy reference
* On a mac you can just enter export PATH=$PATH:./vendor/bin in the terminal so after that all you need to do is type phpunit tests in the terminal to start a test.

## Known Bugs

_No known bugs, yet_

## Support and contact details

_no support at this time_

## Technologies Used
* _Bootstrap_
* _JQuery_
* _Silex_
* _Twig_
* _PHPUnit_

### License

*This awesome github repo is licensed under the MIT license*

Copyright (c) 2017 **_Zach Beecher_**
