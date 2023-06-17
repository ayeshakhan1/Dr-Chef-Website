# Dr-Chef-Website
BSCS Final Year Project using Laravel 9 and Bootstrap 5.2 (Session 2019 - 2023)

Setup Guide:

Import Database
1.	Install `Xammp` Control Panel.
2.	Start Apache and MySQL services.
3.	Click on `Admin` in MySQL from Xampp Control Panel.
4.	Localhost PhpMyAdmin will open in browser. 
5.	From side menu of the PhpMyAdmin, click on new.
6.	Type database name `dr_chef`  and click on create button.
7.	Database will be created.
8.	After creating database, click on Import tab from top navbar of PhpMyAdmin.
9.	Choose the sql file `dr_chef.sql` that is attached in the project folder.
10.	After selecting dr_chef.sql file, click on import button.
11.	Database will be imported.

Run Website
1.	Open the folder dr_chef
2.	To open it in VS Code, in the top address bar, type `cmd` and press enter
3.	Commad prompt will appear
4.	Type `code .` in it and press ENTER
5.	Application will be open in VS code
6.	To open terminal in VS code press CTRL+SHIFT+`

 `NOTE: If creating new user account then skip step 7 and 8. If user is already registered then perform step 7 and 8 to add user daily calorie need in database, the command needs to be run daily for existing users.`

7.	In terminal run this command `php artisan schedule:run` (If yesterday date is not available in the `user_calories` table in database, this command will return fail).
8.	To make this command run you have to change the last date to yesterday date in the `user_calories` table in database, then again run the above command in the terminal.
9.	After that run the command `php artisan serve` in terminal.
10.	The following link will appear `http://127.0.0.1:8000/`, click this link to visit website.


Credentials:
1.	Admin

    Email: muhammadsohaib@gmail.com
    
    Password: admin

2.	Chef

    Email: muhammadsohaibkhan@gmail.com
    
    Password: muhammadsohaib

3.	Dietitian

    Email: muhammadshams@gmail.com
    
    Password: muhammadshams

4.	User

    Email: ayeshakhan@gmail.com
    
    Password: ayeshakhan
