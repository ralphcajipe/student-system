# student-system

A student management system as a web app that can Create, Read, Update, and Delete (CRUD) information.

![image coming soon](/public/images/student-system.jpg)

| Create | Read | Update and Delete |
|--------------|--------------|--------------|
| ![Create](/public/images/create.jpg) | ![Read](/public/images/read.jpg) | ![Update and Delete](/public/images/update-delete.jpg) |

## Usage

### Database Setup
This app uses MySQL. To use something different, open up config/Database.php and change the default driver.

To use MySQL, make sure you install it, setup a database and then add your db credentials(database, username and password) to the .env.example file and rename it to .env

### Migrations
To create all the nessesary tables and columns, run the following
```
php artisan migrate
```

### Seeding the Database
To add the dummy listings with a single user, run the following
```
php artisan db:seed
```

### File Uploading
When uploading listing files, they go to "storage/app/public". Create a symlink with the following command to make them publicly accessible.
```
php artisan storage:link
```

### Running the App
Upload the files to your document root, Valet folder or run 
```
php artisan serve
```