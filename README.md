# Car Management & Payment System

A full-featured **Laravel web application** for managing car listings, users, admins, and car purchases. This project includes **Paymob payment integration**, allowing users to securely buy cars online. It provides separate user and admin dashboards to manage cars, users, orders, and logs efficiently.

---

## Features

### User Features
- View cars by brand.
- Edit user profile.
- Purchase cars using **Paymob**.
- All user actions protected with authentication.

### Admin Features
- Admin dashboard.
- Create, edit, and delete users.
- Create, edit, and delete admins.
- Create, edit, and delete cars.
- View purchase orders.
- View car logs.

### Payment Integration
- Complete **Paymob** integration.
- Callback endpoint to verify and finalize payments.

---

## Technologies Used
- Laravel 10  
- PHP  
- MySQL  
- Blade Templates  
- Paymob Payment Gateway  
- Laravel Authentication  
- Git & GitHub  

---

## Installation

### 1. Clone Repository
git clone https://github.com/yourusername/car-management.git
cd car-management

### 2. Install Dependencies
composer install
npm install
npm run build

### 3. Create Environment File
cp .env.example .env
php artisan key:generate

Update `.env`:

Database:
DB_DATABASE=your_db
DB_USERNAME=your_user
DB_PASSWORD=your_password

Paymob:
PAYMOB_API_KEY=your_paymob_api_key
PAYMOB_INTEGRATION_ID=your_integration_id
PAYMOB_IFRAME_ID=your_iframe_id

### 4. Run Migrations
php artisan migrate

### 5. Start Development Server
php artisan serve
Visit:
http://localhost:8000


---

## Project Structure

- **Routes:** All defined inside `routes/web.php`
- **Controllers:**
  - `User/` → car viewing, profile editing, Paymob payments  
  - `Admin/` → car management, user/admin management, logs  
  - Payment handling in `PaymentController`
- **Views:** Located in `resources/views`
- **Payments:** Paymob checkout + callback integration

---

## Usage

1. Register or log in.
2. Users browse cars by brand and purchase using Paymob.
3. Admin manages users, admins, cars, and orders.
4. Payment status updates automatically through Paymob callback.

---

## Notes

- Ensure your Paymob credentials are correct in `.env`
- All routes are protected using Laravel `auth` middleware
- Admin and user routes are separated for proper role control

---

## Contributing

1. Fork the repository  
2. Create a feature branch  
3. Commit changes  
4. Push and open a Pull Request  

---

## License

This project is licensed under the **MIT License**.
