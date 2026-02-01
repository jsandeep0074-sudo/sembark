# Project Setup Guide

## Prerequisites

Before setting up the project, ensure you have the following installed:

1. **Node.js and NPM**
   - Download and install Node.js from [nodejs.org](https://nodejs.org/)
   - NPM (Node Package Manager) is included with Node.js
   - Verify installation:
     ```
     node --version
     npm --version
     ```

2. **LAMP or XAMPP Stack**
   - **Option A**: Install LAMP (Linux, Apache, MySQL, PHP) stack
   - **Option B**: Install XAMPP from [apachefriends.org](https://www.apachefriends.org/)
   - Ensure MySQL/MariaDB and Apache are running

## Setup Instructions

1. **Clone the Repository**


2. **Database Setup**
- Open phpMyAdmin or MySQL command line
- Create a new database (e.g., `sembark_db`)
- Import the database file `laravel.sql` from the project root directory into your database

3. **Install Dependencies and Start Development Server**
- npm install
- npm run dev


4. **Access the Application**
- Start your Apache server (if using XAMPP/LAMP)
- Navigate to: `http://localhost/SITENAME`
- Replace `SITENAME` with your actual project folder name
