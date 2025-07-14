# ERP System

## 📦 Backend (`./backend`)

### Description

A simple Enterprise Resource Planning (ERP) system built with **Laravel 12**, providing a robust **role-based access control** (RBAC) structure for managing:

* Users, Roles, Clients, and Orders  
* Authentication system with Super Admin / Admin / User roles  
* PDF generation for order reports  
* Responsive UI built with **Tailwind CSS**

### Features

- **Authentication** (Login / Logout)
- **Role-Based Access Control**  
  - **Super Admin**: full CRUD for Users, Roles, Clients, and Orders  
  - **Admin**: full CRUD for Clients and Orders  
  - **User**: read-only access for Clients and Orders
- **User & Role Management** (Super Admin only)
- **Client Management**: full CRUD (name, address, contract dates)
- **Order Management**: full CRUD, linked to clients
- **PDF Export**: download individual or all orders
- **Session Management**: auto logout after inactivity

### Requirements

| Tool                | Version                                   |
| ------------------- | ----------------------------------------- |
| **PHP**             |  ≥ 8.2                                    |
| **Composer**        | latest                                    |
| **MySQL**           | any                                       |
| **Node + NPM**      | (only if you compile Laravel Vite assets) |
| **Git**             | any                                       |

### Setup & Run

```bash
# 1 Clone the repository
$ git clone <your-repository-url>
$ cd <your-project-folder-name>

# 2 Install PHP dependencies
$ composer install

# 3 Environment setup
$ cp .env.example .env
$ php artisan key:generate
# → edit DB_*, SESSION_LIFETIME etc.

# 4 Setup database
# Ensure DB exists: CREATE DATABASE your_db_name;
$ php artisan migrate:fresh --seed

# 5 (Optional) Install Node.js dependencies
$ npm install

# 6 (Optional) Compile assets
$ npm run build

# 7 Clear cache (good practice)
$ php artisan optimize:clear

# 8 Start Vite Dev Server (for hot reload)
$ npm run dev

# 9 Serve the app
$ php artisan serve   # http://127.0.0.1:8000


### Seeded via UserSeeder.php

Super Admin:
  Username: superadmin
  Password: supersuper

Admin:
  Username: admin
  Password: adminadmin

User:
  Username: user
  Password: useruser

### API Overview

# Authentication
POST   /login                → public         → Authenticate and obtain token
POST   /logout               → authenticated  → Logout current user

# Dashboard
GET    /dashboard            → authenticated  → View dashboard

# Users (Super Admin only)
GET    /users                → Super Admin    → List all users
POST   /users                → Super Admin    → Create a new user
PUT    /users/{id_user}      → Super Admin    → Update a user's details
DELETE /users/{id_user}      → Super Admin    → Delete a user

# Roles (Super Admin only)
GET    /roles                → Super Admin    → List all roles
POST   /roles                → Super Admin    → Create a new role

# Clients
GET    /clients              → All            → List all clients
POST   /clients              → Admin+         → Create a new client

# Orders
GET    /orders               → All            → List all orders
POST   /orders               → Admin+         → Create a new order

# PDF Export
GET    /orders/pdf/all       → All            → Download PDF for all orders
GET    /orders/pdf/{id}      → All            → Download PDF for a specific order
