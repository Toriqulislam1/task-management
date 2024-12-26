# Task Management System

A simple Task Management application built with Laravel and Vue.js for managing user tasks. Users can create, update, delete, and view their tasks. This application also provides functionality for task filtering based on their status.

## Table of Contents
1. [Installation](#installation)
2. [Environment Configuration](#environment-configuration)
3. [Features](#features)
4. [Folder Structure](#folder-structure)
5. [Usage](#usage)
6. [Testing](#testing)
7. [License](#license)

## Installation

To get started, you need to have Composer and Node.js installed on your machine.

### Clone the repository

```bash
flow this step run project
git clone https://github.com/Toriqulislam1/task-management.git
cd task-management
composer install
cp .env.example .env
php artisan key:generate

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_management
DB_USERNAME=root
DB_PASSWORD=

php artisan migrate

npm install
npm run dev
php artisan serve
http://localhost:8000

