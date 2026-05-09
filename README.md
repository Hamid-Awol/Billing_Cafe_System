
# 🍽️ Arsi University Lounge Billing Management System

[![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=flat&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-10.6-4479A1?style=flat&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5-7952B3?style=flat&logo=bootstrap&logoColor=white)](https://getbootstrap.com/)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

> **A comprehensive web-based billing and order management solution developed for Arsi University Lounge, replacing the traditional paper-based system with a secure, efficient, and scalable digital platform.**

---
## 📖 Project Overview

Arsi University Lounge previously relied on a manual, paper-based billing process that was slow, error-prone, and difficult to audit. This project delivers a fully computerized **Lounge Billing Management System** that automates order taking, bill calculation, payment processing, receipt generation, and sales reporting.

### Problems Solved

| Manual System Challenges | Digital Solution Benefits |
|--------------------------|---------------------------|
| ❌ High calculation errors | ✅ Automated bill computation |
| ❌ Slow receipt writing | ✅ Instant digital receipts |
| ❌ Lost or damaged records | ✅ Persistent MySQL database |
| ❌ No real-time visibility | ✅ Live order & sales dashboards |
| ❌ Difficult auditing | ✅ Complete transaction history |
| ❌ No access control | ✅ Role-based authentication |

---

## ✨ Key Features

### 🔐 Authentication & Access Control
- Secure login system with **password hashing** (`password_hash()`)
- **Role-Based Access Control (RBAC)** for Admin, Cashier, and Waitress roles
- Session management with automatic timeout protection

### 📝 Order Management
- Customer self-ordering interface with digital menu display
- Cashier-assisted order taking with real-time cart management
- Order status tracking: `Waiting` → `Suspended` → `Completed`
- Waitress read-only dashboard for serving completed orders

### 💰 Billing & Payment
- Automatic total calculation with itemized bill generation
- **Payment receipt upload** system with server-side validation
- Manual payment verification workflow by cashier
- Printable receipt generation

### 📊 Reporting & Analytics
- Daily, weekly, and monthly sales reports
- Transaction history with date filtering
- Revenue summaries for administrative decision-making

### 🛠️ Administration Panel
- Menu item CRUD operations (Categories & Products)
- System settings configuration
- User account management

---

## 🏗️ System Architecture

We implemented a **Three-Tier Architecture** to ensure separation of concerns, maintainability, and scalability:

**Deployment Environment:**
- **Local Development:** XAMPP (Apache + PHP + MySQL)
- **Production Hosting:** InfinityFree Cloud Platform
- **Version Control:** Git & GitHub

---

## 👥 User Roles & Responsibilities

| Role | Capabilities | Restrictions |
|------|-------------|--------------|
| **Admin** | Full system access, user management, menu CRUD, view all reports | None |
| **Cashier** | Take orders, process payments, generate bills, view basic reports | Cannot manage users or menu items |
| **Waitress** | View order list with statuses, serve completed orders | Read-only access; cannot modify orders or statuses |
| **Customer** | Browse menu, place orders, upload payment receipts | No login required; cannot access dashboard |

> **Design Note:** The Waitress role is intentionally read-only. The Cashier controls the `Completed` status (financial closure), which triggers the Waitress to serve the order. This reflects the actual division of labor at Arsi University Lounge.

---

## 💻 Technology Stack

| Layer | Technology | Purpose |
|-------|------------|---------|
| **Frontend** | HTML5, CSS3, Bootstrap 5, JavaScript | Responsive user interface |
| **Backend** | PHP 8.1+ | Server-side logic & API endpoints |
| **Database** | MySQL 10.6 (MariaDB) | Persistent data storage |
| **Server** | Apache 2.4 | HTTP request handling |
| **Local Environment** | XAMPP | Development & testing |
| **Production Host** | InfinityFree | Cloud deployment |
| **Version Control** | Git & GitHub | Source code management |
| **IDE** | Visual Studio Code | Code editing & debugging |

---

## 🗄️ Database Schema

The database is designed with data integrity and historical accuracy as core principles. The schema includes **6 core tables** with carefully defined relationships:



