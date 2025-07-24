# Robot-Control-Website
Web interface for managing and running robot movements  

# Project Idea
A smart robot control system that stores, manages, and runs movements using an interactive modern web interface.  

# Features
- Easy robot control via simple interface.
- Modern and responsive UI design.
- Load and run saved poses instantly.
- Secure single-pose management for execution.
- Lightweight and fast PHP backend with MySQL.  

# Project Files

1. `index.php` -> Main landing page with control panel interface

2. `save_pose.php` -> Saves new robot poses into the database

3. `load_pose.php` -> Loads saved poses into the control panel

4. `get_run_pose.php` -> Sends the current active pose for robot execution

5. `db.php` -> Manages database connection to MySQL (XAMPP)

6. `style.css` -> Contains modern design and styling rules for the web UI

7. `robot-arm-db.sql` -> SQL script to create and initialize database with required tables  

# How to Use

1. **Download & Install XAMPP**  
     Used to run the PHP server and MySQL database locally

2. **Place the project folder** in:  
   `C:\xampp\htdocs\robot-control-web`

3. **Open XAMPP Control Panel**, start **Apache** and **MySQL**

4. **Create the database & tables** using phpMyAdmin or SQL script

5. **Run the project**  
     Open your browser and visit:  
     `http://localhost/robot-control-web`

# Project Demo  

https://github.com/user-attachments/assets/408f21d2-3cef-4f0b-bc44-cd3a115e7dd3  

<hr>

Developed by **Abdulaziz AL-Thomali**

