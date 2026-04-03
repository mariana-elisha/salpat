# Three-Panel System - Salpat Camp

## Overview

The system now has three role-based panels:

| Panel | Role | Access |
|-------|------|--------|
| **Admin** | admin | Full dashboard, all bookings, rooms, user stats |
| **Receptionist** | receptionist | Check-ins/outs, manage bookings, confirm/cancel |
| **User** | user | My bookings, book rooms |

## Login Credentials

After running `verify-and-fix.bat` or `php artisan db:seed --class=UserSeeder`:

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@salpatcamp.com | password |
| Receptionist | receptionist@salpatcamp.com | password |
| User | user@salpatcamp.com | password |

## URLs

- **Login:** http://127.0.0.1:8000/login
- **Register:** http://127.0.0.1:8000/register (creates **user** role)
- **Admin Dashboard:** http://127.0.0.1:8000/admin/dashboard
- **Receptionist Dashboard:** http://127.0.0.1:8000/receptionist/dashboard
- **User Dashboard (My Bookings):** http://127.0.0.1:8000/user/dashboard

## Behavior

- **Admin & Receptionist:** Can see all bookings and change status (pending → confirmed → completed/cancelled)
- **User:** Sees only their own bookings; can book rooms when logged in
- **Guests:** Can browse rooms and make bookings (no login required); Reservations page shows all bookings

## First Time Setup

If you haven't seeded users yet:

```bash
php artisan db:seed --class=UserSeeder
```

Or run the full reset:

```bash
php artisan migrate:fresh --seed
```

(Ensure `UserSeeder` is called in `DatabaseSeeder`)
