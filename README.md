# Car Showroom Web & Payment System

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
#### git clone [(https://github.com/MohamedAbdAlghfar/CAR_SHOWROOM_WEB.git)]https://github.com/MohamedAbdAlghfar/CAR_SHOWROOM_WEB.git
#### cd car-management

### 2. Install Dependencies
#### composer install
#### npm install
#### npm run build

### 3. Create Environment File
#### cp .env.example .env
#### php artisan key:generate

Update `.env`:

Database:
#### DB_DATABASE=Car_ShowRoom
#### DB_USERNAME=root
#### DB_PASSWORD=

Paymob:
#### PAYMOB_API_KEY=ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0o5LmV5SmpiR0Z6Y3lJNklrMWxjbU5vWVc1MElpd2ljSEp2Wm1sc1pWOXdheUk2TVRFd05UWTVOU3dpYm1GdFpTSTZJbWx1YVhScFlXd2lmUS5qZE0ta2dQc1N0Nk0za3U0M0VCaWJVU0UwVzU3SjBGUC1iVGdfMHpBWENqbWZTbjhYTTNhUElVREk4VGQ2bG96ZFA3ZHBzTE1FanZQTGFfVFgyU3R2Zw==
#### PAYMOB_INTEGRATION_ID=5398443
#### PAYMOB_IFRAME_ID=979419
#### PAYMOB_HMAC=A96CF6AB9A030A8287AE2DDCAABC2F0B

### 4. Run Migrations
#### php artisan migrate

### 5. Start Development Server
#### php artisan serve
#### Visit:
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
