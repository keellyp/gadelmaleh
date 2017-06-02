# GAD ELMALEH
A website that archive every contents of the french artist, Gad Elmaleh.

## Prerequisites
* Install [Node.js](https://nodejs.org/en/)
* Install Composer on root folder by using :
```
composer install
```

### Install
* Install composer dependencies with
```
composer install
```
* Update web/.htaccess RewriteBase line if needed
* Go into builder folder and install node-modules with
```
npm install
```
*You may need to install with sudo if you are a macOS user*
* Update web/helpers/config.php switch cases if needed


## Features
* Silex 2
* Twig
* Routes
* Use Models for SQL request
* Gulp
* Responsive website
* Handle error and 404 page


### Tasks
* You can discover every works, arranged by release date, of the artist.
* Learn more informations when you click on the work. If the artist won an awards, it tells you so.
* If you choose a date, it shows you what he published during this year.
* The footer is dynamic, it count the length of each table.
* The model use switch case to get easier if I would like to add an other table on my database.


## Author
[Kelly Phan](http://kellyphan.fr)


## Licence
This repository is under MIT Licence.
