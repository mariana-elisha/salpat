# Migration Troubleshooting Guide

## Common Error Messages and Solutions

### 1. "php is not recognized as an internal or external command"
**Problem**: PHP is not in your system PATH.

**Solution**: Use the full path to PHP:
```bash
C:\xampp\php\php.exe artisan migrate
```

Or add PHP to your PATH:
1. Right-click "This PC" → Properties
2. Advanced System Settings → Environment Variables
3. Edit "Path" → Add: `C:\xampp\php`
4. Restart your terminal

---

### 2. "SQLSTATE[HY000] [1049] Unknown database 'sallpat_lodge'"
**Problem**: MySQL database doesn't exist.

**Solution**: Create the database:
1. Open http://localhost/phpmyadmin
2. Click "New" → Enter name: `sallpat_lodge`
3. Click "Create"
4. Run migration again

---

### 3. "SQLSTATE[HY000] [2002] No connection could be made"
**Problem**: MySQL service is not running.

**Solution**: 
1. Open XAMPP Control Panel
2. Start MySQL service (click "Start")
3. Wait for it to turn green
4. Run migration again

---

### 4. "Access denied for user 'root'@'localhost'"
**Problem**: Wrong MySQL password.

**Solution**: 
1. Check if MySQL root has a password
2. Update `.env` file:
   ```
   DB_PASSWORD=your_password_here
   ```
   (Leave empty if no password: `DB_PASSWORD=`)

---

### 5. "could not find driver"
**Problem**: PHP MySQL extension not enabled.

**Solution**:
1. Open `C:\xampp\php\php.ini`
2. Find and uncomment (remove the `;`):
   ```ini
   extension=pdo_mysql
   extension=mysqli
   ```
3. Restart Apache/MySQL in XAMPP

---

### 6. "Migration table not found" or "Base table or view already exists"
**Problem**: Database state is inconsistent.

**Solution**: Reset migrations (⚠️ This will delete all data):
```bash
C:\xampp\php\php.exe artisan migrate:fresh
```

Or rollback and re-run:
```bash
C:\xampp\php\php.exe artisan migrate:rollback
C:\xampp\php\php.exe artisan migrate
```

---

## Quick Diagnostic Commands

Check migration status:
```bash
C:\xampp\php\php.exe artisan migrate:status
```

Test database connection:
```bash
C:\xampp\php\php.exe artisan tinker
# Then type: DB::connection()->getPdo();
# Press Ctrl+C to exit
```

Check PHP extensions:
```bash
C:\xampp\php\php.exe -m | findstr mysql
```

---

## Alternative: Switch to SQLite

If MySQL is causing issues, switch to SQLite (easier setup):

1. Edit `.env` file:
   ```
   DB_CONNECTION=sqlite
   # Comment out MySQL settings:
   # DB_HOST=127.0.0.1
   # DB_PORT=3306
   # DB_DATABASE=sallpat_lodge
   # DB_USERNAME=root
   # DB_PASSWORD=
   ```

2. Ensure `database/database.sqlite` exists (it should already exist)

3. Run migrations:
   ```bash
   C:\xampp\php\php.exe artisan migrate
   ```

---

## Still Having Issues?

Please share:
1. The exact error message you're seeing
2. Whether MySQL is running in XAMPP
3. Whether the database `sallpat_lodge` exists in phpMyAdmin
