# Morchid El Moussafir Website

This is the website for Morchid El Moussafir, a transportation and logistics company specializing in services between France and Morocco.

## Backend Setup Instructions

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache, Nginx, etc.)

### Database Setup
1. Create a new database in MySQL
2. Import the `database.sql` file into your database to create the necessary tables and initial data
3. Update the database connection details in `config/database.php` with your MySQL credentials

### Admin Panel Access
- URL: `your-website.com/admin/login.php`
- Default credentials:
  - Username: `admin`
  - Password: `admin123`
  - **Important**: Change these credentials after your first login for security reasons

### File Structure
- `admin/` - Contains all admin panel files
- `assets/` - Contains CSS, JavaScript, images, and other static files
- `config/` - Contains configuration files
- `*.html` - Frontend HTML pages

### Customizing Content
1. Log in to the admin panel
2. Use the sidebar navigation to access different sections of the website
3. Edit content as needed and save changes
4. Upload new images as required

### Security Considerations
- Change the default admin password immediately after setup
- Keep your PHP and MySQL installations up to date
- Consider implementing HTTPS for secure connections
- Regularly backup your database

## Frontend Pages
- Home (`index.html`)
- Services (`service.html`)
- About Us (`about.html`)
- Contact (`contact.html`)
- Terms & Conditions (`terms.html`)
- Thank You (`thankyou.html`)

## Contact
For technical support, please contact your web developer. 