# Code-Igniter-Photo-Gallery
A photo gallery made with CI and SQL Database with bootstrap layout design.

# What is it?

It is a simple, but sofisticated photo gallery made using Code Igniter 3.0 framework, MySQL database, jQuery and Twitter bootstrap features also it has some icons from Font Awesome =)

# How to use it?

First of all you must have a http server with at least php 5.6 and MySQL Server 5 (maybe some other php features for example), for more information about it, please check out the Code Igniter documentation on https://www.codeigniter.com/user_guide/.

*The software was built and tested on Uwamp Server (portable WAMP sever). 

Here below are some steps to follow in order to use this application  

1 - Copy all files to your hosting server directory;

2 - On application/config dir open database.php file and set up your database configurations.

3 - Open your web browser and and access utils/migrate controller in order to install database tables and features of the gallery, if the server answers "migrated" everything is done;

4 - Open the root controller on your web browser if you see a blnk page with the title of this app it means that everything is working fine;

5 - Open /admin controller on your web browser to login as an admin so you can insert some albums in your photo gallery (make sure you have read and write permissions on your server). The default credentials are admin as login and 123456 as password (easy huh?), if you be redirected to home page (root controller) with a successful message go to next step;

6 - You will see that "Insert Album" button will appear so click on it and fill the album form with required informations;

7 - After create your album it will apper on your home page with 3 options: Upload Photos, edit Album and delete album. These options are only enabled if you are logged in. A default album image will be set up automatically, but you can change it by some other image after you upload photos in your album;

8 - On Upload Photos option, upload some photos to your album, to do that you must have a web browser with Ajax features enabled. Photos with special characters are not recommended. Only Png, jpg and gif images with max resolution 1920 and 1080 are supported, but you can change this option on photos controller;

9 - After you upload your photos you can browse them by your home page clicking on album title or default image.


# Some important information

This app is not fully completed (thats why it starts with 0. huh?), some album pagination controls are missing so you can only see the last 4 albums on home page, the thumbnails photos links on your album also doesn't have browsing controls, there are no users subscribing forms to insert new users or change your admin password and some errors may occur because some tests are not done yet, but don't worry I'm going to do this as soon as possible. You can try to help me implement these options if you want though. =) 


The complete developer documentation is comming soon! Feel free to explore the application until this =) 

Feel free to send pull requests for my app!
