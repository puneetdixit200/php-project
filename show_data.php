<?php
// show_data.php - read registrations.txt and display in a styled table

$file = __DIR__ . DIRECTORY_SEPARATOR . "registrations.txt";

echo "<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>All Registrations</title>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body { 
    font-family: 'Inter', 'Segoe UI', -apple-system, sans-serif;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
    padding: 40px 20px;
    position: relative;
    overflow-x: hidden;
}

body::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
    background-size: 50px 50px;
    animation: moveGrid 20s linear infinite;
    pointer-events: none;
}

@keyframes moveGrid {
    0% { transform: translate(0, 0); }
    100% { transform: translate(50px, 50px); }
}

.container { 
    max-width: 1200px;
    margin: auto;
    background: rgba(255, 255, 255, 0.95);
    padding: 40px;
    border-radius: 24px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    position: relative;
    z-index: 1;
    animation: slideUp 0.5s ease-out;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

h2 {
    text-align: center;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 30px;
    font-size: 32px;
    font-weight: 700;
    letter-spacing: -0.5px;
}

.back-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #667eea;
    text-decoration: none;
    font-weight: 600;
    font-size: 15px;
    padding: 10px 20px;
    border: 2px solid #667eea;
    border-radius: 12px;
    transition: all 0.3s ease;
    margin-bottom: 25px;
}

.back-link:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-color: transparent;
    transform: translateX(-3px);
}

table { 
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    margin-top: 20px;
    overflow: hidden;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

th, td { 
    padding: 16px;
    text-align: left;
    border-bottom: 1px solid #e5e7eb;
}

th { 
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 13px;
    letter-spacing: 0.5px;
}

th:first-child {
    border-top-left-radius: 12px;
}

th:last-child {
    border-top-right-radius: 12px;
}

tr {
    background: white;
    transition: all 0.2s ease;
}

tr:hover {
    background: #f9fafb;
    transform: scale(1.01);
    box-shadow: 0 2px 8px rgba(102, 126, 234, 0.15);
}

tr:last-child td {
    border-bottom: none;
}

tr:last-child td:first-child {
    border-bottom-left-radius: 12px;
}

tr:last-child td:last-child {
    border-bottom-right-radius: 12px;
}

td {
    color: #374151;
    font-size: 14px;
}

p {
    text-align: center;
    color: #6b7280;
    font-size: 16px;
    padding: 40px 20px;
    background: white;
    border-radius: 12px;
    margin-top: 20px;
}

@media (max-width: 768px) {
    .container {
        padding: 25px 20px;
    }
    
    table {
        font-size: 13px;
    }
    
    th, td {
        padding: 12px 8px;
    }
    
    h2 {
        font-size: 24px;
    }
}
</style>
</head>
<body>
<div class='container'>
<h2>📋 All Registered Users</h2>
<a href='index.html' class='back-link'>← Back to Registration Form</a>
";

if (file_exists($file)) {
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if (count($lines) > 0) {
        echo "<table><tr><th>Full Name</th><th>Email</th><th>Phone</th><th>Gender</th><th>Age</th></tr>";
        foreach ($lines as $line) {
            // Parse saved line
            if (preg_match('/Full Name: (.*?) \| Email: (.*?) \| Phone: (.*?) \| Gender: (.*?) \| Age: (.*)/', $line, $matches)) {
                $full = htmlspecialchars($matches[1], ENT_QUOTES);
                $email = htmlspecialchars($matches[2], ENT_QUOTES);
                $phone = htmlspecialchars($matches[3], ENT_QUOTES);
                $gender = htmlspecialchars($matches[4], ENT_QUOTES);
                $age = htmlspecialchars($matches[5], ENT_QUOTES);
                echo "<tr><td>$full</td><td>$email</td><td>$phone</td><td>$gender</td><td>$age</td></tr>";
            }
        }
        echo "</table>";
    } else {
        echo "<p>No registrations yet.</p>";
    }
} else {
    echo "<p>No registrations file found.</p>";
}

echo "</div></body></html>";
?>