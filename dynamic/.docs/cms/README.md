# HotspotBnB Document Library CMS

## Introduction

 - This is the Content Management System (CMS) for the HotspotBnB Docs Library.
 - This CMS is a GUI for viewing, creating & editing the docs library. 


## Getting Started

1. Install the dependancies:

 - `apt install git`
 - `apt install latexmk`
 - `apt install texlive-latex-base texlive-fonts-recommended`
 - `pip install -U sphinx`
 - `pip install phinxcontrib-hieroglyph`
 - `apt install latexmk`


2. Creat a folder called `docs-cms` in `/var/www/html`

 - `mkdir /var/www/html/docs-cms`

3. Go into the directory:

 - `cd /var/www/html/docs-cms`

4. Clone the Document Library into the `docs-cms` folder you just created:
   
 - `git clone https://github.com/unclehowell/gh-docs.hotspotbnb.com.git`


5. Set the correct permissions with this command: 
 
 - `chown -Rf www-data.www-data /var/www/html/docs-cms`


6. Copy the CMS from the library to the `docs-cms` folder:

 - `cp * gh-docs.hotspotbnb.com/docs/_source-files/_docs-cms/* ./`
 

7. Change the `index-sample.php` to `index.php` 

 - `mv index-sample.php index.php`


8. Change the default login password from `.` to whatever you want: 

 - `nano index.php'
 - `CTL+W` (find) 
 - `md5` (enter md5)
 - `ENTER` (hit enter to search)
 -  replace `.` with your prefered password
 
9. Visit the URL: 'http://localhost/docs-cms'


## Public Server

Change the default URL from `.` to your public server:

 - `nano index.php' 
 - `CTL+W` (find)
 - `md5` (enter md5)
 - `ENTER` (hit enter to search) 
 -  replace `.` with your prefered password
 -  `CTL+X` & `Y` * `ENTER` (save)

Change the Security from `http` to https:

 - `nano index.php'
 - `CTL+W` (find)
 - `md5` (enter https)
 - `ENTER` (hit enter to search)
 -  replace `http` with `https`
 -  `CTL+X` & `Y` * `ENTER` (save) 
