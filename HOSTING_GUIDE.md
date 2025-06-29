# 🚀 DEI Signage Website - Shared Hosting Deployment Guide

A complete step-by-step guide to deploy your Laravel DEI Signage website on shared hosting providers (cPanel, Hostgator, GoDaddy, Bluehost, etc.)

## 📋 Pre-Deployment Checklist

Before starting, ensure you have:
- [ ] Laravel project files ready
- [ ] Database export/backup
- [ ] Shared hosting account with cPanel access
- [ ] Domain name configured
- [ ] FTP credentials or File Manager access
- [ ] Email account for contact forms

---

## 🔧 Hosting Requirements Verification

### Minimum System Requirements
- **PHP Version**: 8.1 or higher
- **Memory Limit**: 256MB or higher
- **Max Execution Time**: 60 seconds or higher
- **File Upload Size**: 64MB or higher

### Required PHP Extensions
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- BCMath PHP Extension
- Fileinfo PHP Extension

### Check and Configure PHP in cPanel
1. **Login to cPanel**
2. **Navigate to "PHP Selector" or "MultiPHP Manager"**
3. **Select PHP 8.1 or higher**
4. **Click "Extensions" and enable all required extensions**
5. **Set PHP Configuration:**
   ```
   memory_limit = 256M
   max_execution_time = 60
   upload_max_filesize = 64M
   post_max_size = 64M
   ```

---

## 📁 Prepare Project Files

### 1. Optimize Laravel for Production

On your local machine, run these commands:

```bash
# Navigate to your project
cd dei-signage-website

# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimize for production
php artisan config:cache
php artisan route:cache

# Install production dependencies only
composer install --optimize-autoloader --no-dev

# Generate optimized autoload files
composer dump-autoload --optimize
```

### 2. Create Production Environment File

Create a new `.env` file for production:

```env
APP_NAME="DEI Signage & Branding"
APP_ENV=production
APP_KEY=base64:your-generated-app-key-here
APP_DEBUG=false
APP_URL=https://yourdomain.com

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=cpanel_username_dei_signage
DB_USERNAME=cpanel_username_dei_user
DB_PASSWORD=your_strong_database_password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=public
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MAIL_MAILER=smtp
MAIL_HOST=mail.yourdomain.com
MAIL_PORT=587
MAIL_USERNAME=noreply@yourdomain.com
MAIL_PASSWORD=your_email_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@yourdomain.com
MAIL_FROM_NAME="DEI Signage & Branding"

FILAMENT_DOMAIN=yourdomain.com
```

### 3. Create Folder Structure for Upload

```
hosting-files/
├── public_html/              # All files from Laravel's public folder
│   ├── index.php            # Modified to point to correct paths
│   ├── .htaccess           # Laravel's htaccess file
│   └── assets/             # CSS, JS, images
├── laravel-core/           # All Laravel files except public folder
│   ├── app/
│   ├── bootstrap/
│   ├── config/
│   ├── database/
│   ├── resources/
│   ├── routes/
│   ├── storage/
│   ├── vendor/
│   ├── .env               # Production environment file
│   ├── artisan
│   ├── composer.json
│   └── composer.lock
```

---

## 🗄️ Database Setup

### 1. Create Database in cPanel

1. **Login to cPanel**
2. **Find "MySQL Databases" section**
3. **Create New Database:**
   - Database Name: `dei_signage` (will become `cpanel_username_dei_signage`)
4. **Create Database User:**
   - Username: `dei_user`
   - Password: Generate strong password
5. **Add User to Database:**
   - Select user and database
   - Grant **ALL PRIVILEGES**
6. **Note the full database credentials:**
   ```
   Database: cpanel_username_dei_signage
   Username: cpanel_username_dei_user
   Password: your_generated_password
   Host: localhost
   ```

### 2. Import Database Structure

**Option A: Using phpMyAdmin**
1. **Open phpMyAdmin from cPanel**
2. **Select your database**
3. **Go to "Import" tab**
4. **Upload your SQL file or paste SQL commands**

**Option B: Create Tables Manually**
If you need to run migrations manually, create an SQL file with all your table structures:

```sql
-- Run your migration commands here
-- You can generate this by running migrations locally and exporting the structure
```

### 3. Import Sample Data

Run your seeders by creating an SQL file:

```bash
# On local machine, generate seeder SQL
php artisan db:seed --class=DatabaseSeeder
# Then export the data and import to hosting database
```

---

## 📤 File Upload Process

### Method 1: Using cPanel File Manager (Recommended for beginners)

1. **Login to cPanel**
2. **Open File Manager**
3. **Navigate to your domain's root directory**

4. **Upload Laravel Core Files:**
   - Create folder: `laravel-core`
   - Upload all Laravel files EXCEPT the public folder to `laravel-core`
   - Extract if uploaded as zip

5. **Upload Public Files:**
   - Navigate to `public_html` folder
   - Upload all contents from Laravel's `public` folder
   - Extract if uploaded as zip

### Method 2: Using FTP Client (FileZilla, WinSCP, etc.)

1. **Connect to your hosting via FTP:**
   ```
   Host: ftp.yourdomain.com (or provided by host)
   Username: your_cpanel_username
   Password: your_cpanel_password
   Port: 21
   ```

2. **Upload folder structure as planned above**

### Method 3: Using Git (if supported)

```bash
# Clone your repository to hosting
git clone https://github.com/your-repo/dei-signage.git laravel-core
cd laravel-core

# Install dependencies
composer install --no-dev --optimize-autoloader
```

---

## ⚙️ Critical Configuration Changes

### 1. Update `public_html/index.php`

Replace the content of `public_html/index.php` with:

```php
<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
*/

if (file_exists($maintenance = __DIR__.'/../laravel-core/storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
*/

require __DIR__.'/../laravel-core/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
*/

$app = require_once __DIR__.'/../laravel-core/bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
```

### 2. Update `.htaccess` in `public_html`

Create/update `.htaccess` file in `public_html`:

```apache
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>

# Security Headers
<IfModule mod_headers.c>
    Header always set X-Content-Type-Options nosniff
    Header always set X-Frame-Options DENY
    Header always set X-XSS-Protection "1; mode=block"
</IfModule>

# Hide sensitive files
<Files ".env">
    Order allow,deny
    Deny from all
</Files>

<Files "composer.json">
    Order allow,deny
    Deny from all
</Files>

<Files "composer.lock">
    Order allow,deny
    Deny from all
</Files>
```

### 3. Create Storage Symlink

Since you can't run `php artisan storage:link`, create it manually:

1. **In cPanel File Manager:**
   - Navigate to `public_html`
   - Create a new folder called `storage`
   - Or create a symbolic link pointing to `../laravel-core/storage/app/public`

2. **Alternative: Copy storage folder:**
   - Copy contents of `laravel-core/storage/app/public` to `public_html/storage`

---

## 📧 Email Configuration

### 1. Create Email Account

1. **In cPanel, go to "Email Accounts"**
2. **Create new email:** `noreply@yourdomain.com`
3. **Set strong password**
4. **Note the email settings provided**

### 2. Configure Email in `.env`

Update your `.env` file with hosting email settings:

```env
MAIL_MAILER=smtp
MAIL_HOST=mail.yourdomain.com
MAIL_PORT=587
MAIL_USERNAME=noreply@yourdomain.com
MAIL_PASSWORD=your_email_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@yourdomain.com
MAIL_FROM_NAME="DEI Signage & Branding"
```

---

## 🔐 Security Configuration

### 1. Set Proper File Permissions

Via cPanel File Manager or FTP:

```
Folders: 755
Files: 644
storage/ folder: 755 (recursive)
bootstrap/cache/ folder: 755 (recursive)
```

### 2. Secure Sensitive Files

Ensure these files are NOT in `public_html`:
- `.env`
- `composer.json`
- `composer.lock`
- All Laravel core files

### 3. Update Security Headers

Add to your `.htaccess` file:

```apache
# Security Headers
<IfModule mod_headers.c>
    Header always set X-Content-Type-Options nosniff
    Header always set X-Frame-Options SAMEORIGIN
    Header always set X-XSS-Protection "1; mode=block"
    Header always set Referrer-Policy "strict-origin-when-cross-origin"
    Header always set Permissions-Policy "geolocation=(), microphone=(), camera=()"
</IfModule>
```

---

## 🧪 Testing Your Deployment

### 1. Test Website Frontend

1. **Visit your domain:** `https://yourdomain.com`
2. **Check all pages:**
   - Home page loads correctly
   - About, Services, Portfolio, Clients, Contact pages work
   - Images display properly
   - Navigation functions correctly

### 2. Test Admin Panel

1. **Visit admin:** `https://yourdomain.com/admin`
2. **Login with your admin credentials**
3. **Test admin functions:**
   - View/add/edit services
   - Manage portfolio items
   - Check contact form submissions

### 3. Test Contact Form

1. **Fill out contact form**
2. **Check if email is received**
3. **Verify form submission appears in admin**

### 4. Test File Uploads

1. **Upload images in admin panel**
2. **Verify images display on frontend**
3. **Check storage folder has correct permissions**

---

## 🐛 Common Issues & Solutions

### Issue 1: "500 Internal Server Error"

**Solutions:**
- Check `.htaccess` syntax
- Verify PHP version compatibility
- Check file permissions (folders: 755, files: 644)
- Review error logs in cPanel

### Issue 2: "Laravel App Key Not Set"

**Solution:**
Generate app key and add to `.env`:
```bash
# On local machine
php artisan key:generate --show
# Copy the generated key to your .env file
```

### Issue 3: Images Not Loading

**Solutions:**
- Verify storage symlink exists
- Check image paths in code
- Ensure storage folder permissions are correct

### Issue 4: Database Connection Error

**Solutions:**
- Verify database credentials in `.env`
- Ensure database user has proper privileges
- Check database host (usually 'localhost')

### Issue 5: Admin Panel Not Accessible

**Solutions:**
- Clear browser cache
- Check `.htaccess` rewrite rules
- Verify all Filament files were uploaded

### Issue 6: Contact Form Not Sending Emails

**Solutions:**
- Verify email account exists and credentials are correct
- Check spam folder
- Test email settings with hosting provider
- Review mail logs if available

---

## 📊 Performance Optimization

### 1. Enable OPCache (if available)

In cPanel PHP settings:
```
opcache.enable=1
opcache.memory_consumption=128
opcache.max_accelerated_files=4000
```

### 2. Configure Caching

Add to `.env`:
```env
CACHE_DRIVER=file
SESSION_DRIVER=file
```

### 3. Optimize Images

- Compress images before uploading
- Use WebP format when possible
- Set up proper image caching headers

---

## 🔄 Maintenance & Updates

### Regular Maintenance Tasks

1. **Backup Database Weekly:**
   - Use cPanel backup tools
   - Export database via phpMyAdmin

2. **Monitor Error Logs:**
   - Check cPanel error logs regularly
   - Monitor Laravel logs if accessible

3. **Update Dependencies:**
   - Keep composer dependencies updated
   - Test updates on staging first

### Security Updates

1. **Keep PHP Updated:**
   - Use latest stable PHP version
   - Monitor security announcements

2. **Monitor Application:**
   - Check for Laravel security updates
   - Update dependencies regularly

---

## 📞 Support Resources

### Hosting Provider Support
- Contact your hosting provider for server-specific issues
- Check their knowledge base for common problems

### Laravel Resources
- [Laravel Documentation](https://laravel.com/docs)
- [Filament Documentation](https://filamentphp.com/docs)

### DEI Signage Support
- **Email:** deependprints@gmail.com
- **Phone:** +263 777 372 623

---

## ✅ Post-Deployment Checklist

After successful deployment:

- [ ] Website loads correctly
- [ ] All pages are accessible
- [ ] Admin panel works
- [ ] Contact form sends emails
- [ ] Images upload and display
- [ ] Database is populated
- [ ] SSL certificate is active
- [ ] Google Analytics/SEO tools configured
- [ ] Backup system in place
- [ ] Error monitoring set up

---

**🎉 Congratulations! Your DEI Signage website is now live on shared hosting!**

Remember to keep regular backups and monitor your website for any issues. For any technical support, don't hesitate to contact the development team or your hosting provider.