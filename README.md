# 🎬 Movie Review Web Application

## 🚀 Features

* View movie ratings (1–5 stars)
* Create, read, and manage reviews (CRUD)
* Add / remove favorite movies
* User authentication (Login system)
* Dynamic content from MySQL database
* Responsive UI using Bootstrap
---

## 🛠 Tech Stack
Frontend
* HTML5
* CSS3
* Bootstrap
* JavaScript
  
Backend
* PHP (Core PHP)
  
Database
* MySQL
* phpMyAdmin

---

## 📁 Project Structure
```text
project-movie/
│── css/                 # Bootstrap & custom styles
│── js/                  # JavaScript files
│── img/                 # Movie images
│── uploads/             # Uploaded files
│── database/            # SQL schema
│
│── add_review.php       # Add new review
│── add_favorite.php     # Add to favorites
│── delete_favorite.php  # Remove from favorites
│── login.php            # User login
│── db_connection.php    # Database connection
│── index.php            # Main page
│── reviews.php          # Review display page
```
---

## ⚙️ Installation & Setup
1.Clone the repository
```text
 git clone https://github.com/your-username/project-movie.git
  ```
2.Move project to htdocs (XAMPP)

3.Import database
* Open phpMyAdmin
* Create database (e.g. project)
* Import SQL file from /database
  
4.Configure database connection
```text
 $conn = new mysqli("localhost", "root", "", "project");
 ```  
5.Run project
```text
 (http://localhost/project-movie)
 ``` 
---
## 🧠 System Overview
This system follows a basic Client–Server architecture:
* Frontend handles UI rendering using Bootstrap
* Backend (PHP) processes requests and communicates with database
* MySQL stores user data, reviews, ratings, and favorites

---

## 🔄 Core Functionalities
Operations
* Create: Add review
* Read: Display reviews
* Delete: Remove favorite
  
Authentication
* User login system with session handling
  
Database Integration
* Structured tables for users, reviews, and ratings


---



## 👨‍💻 Developer

* Siwat Kamkong (Computer Engineering)
* Interested in Web Development & IoT Systems

## 📄 License
This project is built for learning and portfolio purposes, demonstrating full-stack web development using PHP and MySQL.
