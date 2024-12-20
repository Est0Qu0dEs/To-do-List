# To-do-List

## Prerequisites

- **Open Server**: Download and install Open Server.
- **PHP**: Version 7.4 (included in Open Server).
- **MySQL**: Installed and running (included in Open Server).
- **Browser**: Any modern browser (e.g., Chrome, Firefox).
- **Text Editor**: Visual Studio Code, Sublime Text, or Notepad++.
- **Git** _(optional)_: If using version control.

---

## Download the Project

1. **Clone the repository from GitHub**:
   ```bash
   git clone https://github.com/Est0Qu0dEs/To-do-List.git
   ```
2. Alternatively, download the project as a ZIP file and extract it.

---

## Place the Project in Open Server's Directory

1. Copy the project folder into Open Server’s root directory:
   ```
   E:\OSPanel\domains\to-do-list
   ```

---

## Set Up the Database

1. Start Open Server and go to MySQL.
2. Open **phpMyAdmin** at [http://localhost/phpmyadmin/](http://localhost/phpmyadmin/).
3. **Create a new database**:
   - Name the database: `To-do List`.
4. **Import the SQL dump file**:
   - Navigate to the `database` folder in the project.
   - Import the file `To-do_List.sql` to create the necessary tables (`tasks`).

---

## Configure Database Connection

1. Open the file `config/connect.php` in a text editor.
2. Update the database connection details if needed:
   ```php
   $dsn = 'mysql:host=localhost;dbname=To-do List;charset=utf8';
   $username = 'root';
   $password = ''; // Leave empty if no password is set
   ```

---

## Start Open Server

1. Launch Open Server and click **Start**.
2. Open your browser and navigate to:
   ```
   http://to-do-list/
   ```

---

## You’re Ready to Go!

Visit the site to start managing your to-do tasks. If you encounter any issues, double-check your setup and ensure all prerequisites are correctly configured.
