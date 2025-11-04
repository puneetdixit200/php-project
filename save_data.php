<?php
// save_data.php
// Accept POST input, sanitize, append to registrations.txt.
// Returns "success" text for AJAX compatibility.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // basic sanitization
    $fullname = isset($_POST['fullname']) ? trim($_POST['fullname']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';
    $age = isset($_POST['age']) ? trim($_POST['age']) : '';

    // minimal validation
    if ($fullname === '' || $email === '' || $phone === '' || $gender === '' || $age === '') {
        echo "All fields are required";
        exit;
    }

    // Validate Gmail
    if (!preg_match('/@gmail\.com$/i', $email)) {
        echo "Email must be a Gmail address";
        exit;
    }

    // Validate Phone (exactly 10 digits)
    if (!preg_match('/^[0-9]{10}$/', $phone)) {
        echo "Phone number must be exactly 10 digits";
        exit;
    }

    // sanitize for storing (avoid newlines inside fields)
    $fullname_s = htmlspecialchars(preg_replace('/[\r\n]+/', ' ', $fullname), ENT_QUOTES);
    $email_s = htmlspecialchars(preg_replace('/[\r\n]+/', ' ', $email), ENT_QUOTES);
    $phone_s = htmlspecialchars(preg_replace('/[\r\n]+/', ' ', $phone), ENT_QUOTES);
    $gender_s = htmlspecialchars(preg_replace('/[\r\n]+/', ' ', $gender), ENT_QUOTES);
    $age_s = htmlspecialchars(preg_replace('/[\r\n]+/', ' ', $age), ENT_QUOTES);

    $data = "Full Name: $fullname_s | Email: $email_s | Phone: $phone_s | Gender: $gender_s | Age: $age_s\n";

    // Save to registrations.txt (create if missing)
    $filePath = __DIR__ . DIRECTORY_SEPARATOR . 'registrations.txt';
    $ok = false;
    try {
        $f = fopen($filePath, 'a');
        if ($f !== false) {
            fwrite($f, $data);
            fclose($f);
            $ok = true;
        }
    } catch (Exception $e) {
        $ok = false;
    }

    // Return simple text response for AJAX
    if ($ok) {
        echo "success";
    } else {
        echo "error";
    }
    exit;
} else {
    // If accessed directly via GET, redirect to form
    header('Location: index.html');
    exit;
}
?>