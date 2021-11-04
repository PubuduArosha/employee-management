# Employee Management System
----------------------------------------
![loging](https://user-images.githubusercontent.com/41939687/140296188-215f3c22-d782-4bc3-858b-b805c21462b2.PNG)

![Dashboard](https://user-images.githubusercontent.com/41939687/140296364-f456596e-12e2-442b-b387-40d64391e60d.PNG)

![Dep](https://user-images.githubusercontent.com/41939687/140296796-ea90f8dc-3601-4912-a079-648a642fd3a8.PNG)

![DP up](https://user-images.githubusercontent.com/41939687/140296945-47618508-deda-490a-a9a9-262b15603afd.PNG)

![emp add](https://user-images.githubusercontent.com/41939687/140297426-f565a986-5856-4569-a570-db5d7115955e.PNG)

![e list](https://user-images.githubusercontent.com/41939687/140299049-ca475257-60f6-4b05-8e10-588650e5a3f9.PNG)

## Entity–relationship model

<img width="3344" alt="ER Diagram (Community)" src="https://user-images.githubusercontent.com/41939687/140287679-cbf2b80a-cb16-40fa-b780-8705b2219008.png">

## Setup Local Environment

Clone the repository <github repo link>


```sh
git clone https://github.com/pubuduarosha/employee-management.git
```

Change the project directory.

```sh
cd {your project folder}
```

Install dependencies using the following command.

```sh
composer install
```

Create env file using the following command.

```sh
copy .env.example .env
```
Generate App Key using the following command. 

```sh
php artisan key:generate
```

## Create a database.

Fill in all the required credentials env and setup the database.

Create database tables and add dummy data using the following command.

```sh
php artisan migrate --seed
```

## Development server

You can run the project using two ways.

Using artisan serve php artisan serve hint: if you want to the artisan serve with different port, you can use php artisan serve --port=8001 command

```sh
php artisan serve --port=8001
```

Virtual host this article may be helpfull for create virtual-host : https://medium.com/@ajtech.mubasheer/configure-a-virtual-host-for-laravel-project-in-xampp-for-windows-10-d3f0068e7e1b

## Login details

```sh
Email : admin@gmail.com
Password : 123456
```
