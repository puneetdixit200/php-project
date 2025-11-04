# Online Registration Web App

This web application provides an HTML/CSS/JavaScript (jQuery) registration form and PHP back-end to save and display registrations.

**Files included:**

- `index.html` — registration form with jQuery AJAX, client-side validation, and animated feedback messages.
- `save_data.php` — receives POST requests, sanitizes input (full name, email, gender, age), appends to `registrations.txt`, returns "success" or "error" text.
- `show_data.php` — reads `registrations.txt` and displays entries in a styled table.
- `registrations.txt` — data file (created empty, populated on first submission).

**Fields collected:**
- Full Name
- Email Address
- Gender (Male/Female/Other)
- Age

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

1. Go to https://replit.com and create a new Repl.
2. Choose "Import from GitHub" (if you push this repo) or create a new Repl and upload these files.
3. Choose a Repl type that supports PHP (e.g., "PHP Web Server").
4. Upload `index.html`, `save_data.php`, `show_data.php`, and `registrations.txt` into the root of the Repl.
5. Click Run. Replit will serve the files; open the provided web URL.

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
