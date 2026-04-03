# Database Setup Instructions

## Option 1: Create MySQL Database (Recommended for XAMPP)

Since you're using XAMPP with MySQL, follow these steps:

### Step 1: Create the Database
1. Open phpMyAdmin: http://localhost/phpmyadmin
2. Click on "New" in the left sidebar
3. Enter database name: `sallpat_lodge`
4. Choose collation: `utf8mb4_unicode_ci`
5. Click "Create"

### Step 2: Verify .env Configuration
Your `.env` file should have:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sallpat_lodge
DB_USERNAME=root
DB_PASSWORD=
```

### Step 3: Run Migrations
```bash
C:\xampp\php\php.exe artisan migrate
```

---

## Option 2: Use SQLite (Easier, No Setup Required)

If you prefer SQLite (no database server needed):

### Step 1: Update .env File
Change these lines in your `.env`:
```
DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=sallpat_lodge
# DB_USERNAME=root
# DB_PASSWORD=
```

### Step 2: Create SQLite Database File
The file should already exist at `database/database.sqlite`. If not, create it:
```bash
# In PowerShell
New-Item -Path database\database.sqlite -ItemType File
```

### Step 3: Run Migrations
```bash
C:\xampp\php\php.exe artisan migrate
```

---

## Common Errors and Solutions

### Error: "SQLSTATE[HY000] [1049] Unknown database 'sallpat_lodge'"
**Solution**: Create the database first (see Option 1, Step 1)

### Error: "SQLSTATE[HY000] [2002] No connection could be made"
**Solution**: 
- Make sure XAMPP MySQL is running
- Check if MySQL service is started in XAMPP Control Panel

### Error: "Access denied for user 'root'@'localhost'"
**Solution**: 
- Check your MySQL password in `.env`
- If you set a password for root, update `DB_PASSWORD` in `.env`

### Error: "could not find driver"
**Solution**: 
- Make sure PHP MySQL extension is enabled
- Check `php.ini` and uncomment: `extension=pdo_mysql`
