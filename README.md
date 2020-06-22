# P5_leveque_alexis

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/529021251de24078b132c6b1ae89c71d)](https://app.codacy.com/manual/Alexisleveque-OC/P5_leveque_alexis?utm_source=github.com&utm_medium=referral&utm_content=Alexisleveque-OC/P5_leveque_alexis&utm_campaign=Badge_Grade_Dashboard)

This is  README.md file of my repository fot Project 5 of the application developer PHP/Symfony.

## Story of Project

- Include all UML diagrams.
- Create all issues. 
- Develope applications.
- Write README.
- Presentation of project to a mentor.

## Context

See the project context just here >>> https://openclassrooms.com/fr/paths/59/projects/7/assignment

## How to install ?

### Step 1 :
You need to install composer in your workplace. For this, let's go here https://getcomposer.org/download/. 
Download and install it on your computer.

### Step 2 :
Create a directory in your localserver (Exemple for Wamp : C:/wamp64/www). And clone project with this link https://github.com/Alexisleveque-OC/P5_leveque_alexis.git .

### Step 3 :
Create Database MySql with your SGBD (You can choose the name you want). Import file Creation_db.sql for create all tables.
If you want a dataset, you can import Dataset.sql . This files was in project root.

### Step 4 :
Create a virtualhost, for this :
- Go to your localhost
- In tool tabs, click on "Create a Virtual Host"
- set fields with your information (ex : "blog.local" and "absolute path"/your_directory(create in the beginning)/p5_01_projet/public )

### Step 5 :
In your terminal, go to your directory of project and submit :
- "composer init" (for init composer)
- "composer require --dev symfony var-dumper"
- "composer update"
- "composer dump-autoload"

### Step 6 : 
Configure file "config.php" (in directory App) whit your information and rename this one "config.local.php".

#### Note 
- If you want manage this blog, you must subscribe and in your SGBD change your user_type_id to 2.
-- 'UPDATE user SET user_type_id = 2 WHERE user_name = "your_name"'
- If you want test mail, you must install maildev( or other mail interceptor) ang go to your localhost:1080 , send mail with contact form and that work !!!