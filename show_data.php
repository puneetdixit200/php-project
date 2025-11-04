<?php
// show_data.php - read registrations.txt and display in a styled table

$file = __DIR__ . DIRECTORY_SEPARATOR . "registrations.txt";

echo "<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<title>All Registrations</title>
<style>
body { background-color: #000; color: #fff; font-family: Arial, sans-serif; padding: 30px; }
.container { max-width: 900px; margin: auto; }
table { width: 100%; border-collapse: collapse; margin-top: 20px; }
th, td { border: 1px solid #444; padding: 10px; text-align: left; }
th { background: #222; }
tr:nth-child(even) { background: #0b0b0b; }
a { color: #60a5fa; text-decoration: none; }
</style>
</head>
<body>
<div class='container'>
<h2 style='text-align:center;'>All Registered Users</h2>
<a href='index.html'>⬅ Back to Registration Form</a>
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