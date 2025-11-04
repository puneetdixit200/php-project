# Online Registration Web App

This web application provides an HTML/CSS/JavaScript (jQuery) registration form and PHP back-end to save and display registrations.

**Files included:**

- `index.html` — registration form with jQuery AJAX, client-side validation, and animated feedback messages.
- `save_data.php` — receives POST requests, sanitizes input (full name, email, phone, gender, age), validates Gmail and phone format, appends to `registrations.txt`, returns "success" or error message.
- `show_data.php` — reads `registrations.txt` and displays entries in a styled table.
- `registrations.txt` — data file (created empty, populated on first submission).

**Fields collected:**
- Full Name
- Email Address (Gmail only - must end with @gmail.com)
- Phone Number (exactly 10 digits)
- Gender (Male/Female/Other)
- Age

**Validation:**
- ✅ Email must be a Gmail address (@gmail.com)
- ✅ Phone number must be exactly 10 digits (no spaces or special characters)
- ✅ All fields are required
- ✅ Client-side and server-side validation

**How to run locally (Windows PowerShell):**

1. Open PowerShell and change into the project directory:

```powershell
cd "c:\Users\mrpun\OneDrive\Desktop\php p"
```

2. Start PHP's built-in server (requires PHP installed and on PATH):

```powershell
php -S localhost:8000
```

3. Open your browser and go to `http://localhost:8000/index.html`.

4. Fill out the form and click **Register**. You'll see a success message, and data is saved to `registrations.txt`.

5. Click **View All Registrations** to see the styled table of all submitted entries.

**Deploying to Replit:**

### Option 1: Import from GitHub (Recommended)
1. Go to https://replit.com
2. Click "Create Repl"
3. Select "Import from GitHub"
4. Paste: `https://github.com/puneetdixit200/php-project`
5. Click "Import from GitHub"
6. Click "Run" - Your app will be live instantly!

### Option 2: Manual Upload
1. Go to https://replit.com and create a new Repl
2. Choose "PHP Web Server" template
3. Upload all project files
4. Click "Run"

**Replit Configuration:**
- `.replit` - Automatically starts PHP server on port 8000
- `replit.nix` - Specifies PHP 8.3 and required extensions
- The app will be accessible via Replit's provided URL

**Important for Replit:**
- The server runs on `0.0.0.0:8000` (accessible externally)
- `registrations.txt` will persist in the Repl storage
- Your app gets a public URL like `https://php-project.username.repl.co`

**Notes:**
- The form posts via AJAX to `save_data.php`. Submissions are appended to `registrations.txt` in the same folder.
- For a production app, use a proper database and secure authentication. This is a demo/assignment project.

**Technologies used:**
- HTML5
- CSS3 (gradient backgrounds, glassmorphism effects)
- JavaScript (ES6+)
- jQuery 3.6.0 (AJAX, DOM manipulation, event handling)
- PHP (server-side processing, file I/O)

Enjoy! If you need help with deployment or enhancements, feel free to ask.
