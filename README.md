You should have Xampp installed on your machine.

Folow These steps to run this project

# Step 1:
open Xampp server by running "Xampp Control Panel" in your machine.
Then start Apache and Mysql
Note Apache must be running on port 80, if it is not running on port 80 then google yourself to run it so.

# Step 2:
on Chrome, goto 
http://localhost/phpmyadmin
and click import.
then import the 'User.sql' file present in database/user.sql

# Step 3:
in phpmyadmin create a database named as 'miconnect', the name is should be case sensitive
import the 'Schema.sql' file present in database/schema.sql

# Step 4:
make a new folder named 'MiConnect' inside C:\xampp\htdocs
remember the name 'MiConnect' is case sensitive
copy all this project's content inside this newly created folder.
On chrome goto http://localhost/MiConnect/, if the above steps are performed correctly you should see the 'index.php' page on your browser. 



That's great now follow the steps given below to configure project with the database.



# Step 5:
open "actions/middleware/app.php" file and copy paste this

    // global url
    $root = 'http://localhost/MiConnect/';

Note: if this $root varible is already declared as given here you are good to go,


# Step 6:
open "include/js/home.js" file and copy this at top of the file

    // Global Routes
    const root = 'http://localhost/MiConnect/';

Note: if this $root varible is already declared as given here you are good to go,



# Step 7:
open "config/Database.php" file and copy paste this,

    private $host = 'localhost';
    private $db_name = 'miconnect';
    private $username = 'miconnect';
    private $password = '123456';

Note: if the above varibale are declared as given here then you are good to go,

Extra information about these variable are as follows:

    private $host = <Your domain name>;
    private $db_name = <Database name>;
    private $username = <Database user name>;
    private $password = <Database user password>;



All done, 
goto http://localhost/MiConnect/ to run this project
sign up as new user and then signin with the credentials you have signed up.






