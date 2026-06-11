<?php
declare(strict_types=1);

require_once __DIR__ . '/db.php';

function redirect_back(string $status, string $message): never
{
    $query = http_build_query([
        'status' => $status,
        'message' => $message,
    ]);

    header('Location: index.php?' . $query);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_back('error', 'Please submit the membership form from the website.');
}

if (!empty(trim((string) ($_POST['website'] ?? '')))) {
    redirect_back('success', 'Thanks. Your request was received.');
}

$fullName = trim((string) ($_POST['full_name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$phone = trim((string) ($_POST['phone'] ?? ''));
$department = trim((string) ($_POST['department'] ?? ''));
$artMedium = trim((string) ($_POST['art_medium'] ?? ''));
$experienceLevel = trim((string) ($_POST['experience_level'] ?? ''));
$portfolioUrl = trim((string) ($_POST['portfolio_url'] ?? ''));
$motivation = trim((string) ($_POST['motivation'] ?? ''));
$consent = (string) ($_POST['consent'] ?? '');

$allowedMediums = ['Sketching', 'Painting', 'Digital Art', 'Photography', 'Mixed Media', 'Other'];
$allowedExperienceLevels = ['Beginner', 'Intermediate', 'Advanced'];
$errors = [];

if ($fullName === '' || strlen($fullName) > 120) {
    $errors[] = 'Enter a valid full name.';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 180) {
    $errors[] = 'Enter a valid email address.';
}

if ($phone === '' || strlen($phone) > 30) {
    $errors[] = 'Enter a valid phone number.';
}

if ($department === '' || strlen($department) > 100) {
    $errors[] = 'Enter your department.';
}

if (!in_array($artMedium, $allowedMediums, true)) {
    $errors[] = 'Choose a primary medium.';
}

if (!in_array($experienceLevel, $allowedExperienceLevels, true)) {
    $errors[] = 'Choose your experience level.';
}

if ($portfolioUrl !== '' && !filter_var($portfolioUrl, FILTER_VALIDATE_URL)) {
    $errors[] = 'Enter a valid portfolio link or leave it blank.';
}

if ($motivation === '' || strlen($motivation) > 1000) {
    $errors[] = 'Tell us why you want to join.';
}

if ($consent !== '1') {
    $errors[] = 'Confirm that your information is accurate.';
}

if ($errors !== []) {
    redirect_back('error', implode(' ', $errors));
}

try {
    $statement = get_database_connection()->prepare(
        'INSERT INTO membership_applications (
            full_name,
            email,
            phone,
            department,
            art_medium,
            experience_level,
            portfolio_url,
            motivation,
            submitted_at
        ) VALUES (
            :full_name,
            :email,
            :phone,
            :department,
            :art_medium,
            :experience_level,
            :portfolio_url,
            :motivation,
            NOW()
        )'
    );

    $statement->execute([
        'full_name' => $fullName,
        'email' => $email,
        'phone' => $phone,
        'department' => $department,
        'art_medium' => $artMedium,
        'experience_level' => $experienceLevel,
        'portfolio_url' => $portfolioUrl !== '' ? $portfolioUrl : null,
        'motivation' => $motivation,
    ]);
} catch (Throwable $exception) {
    redirect_back('error', 'We could not save your application right now. Please try again after checking the database connection.');
}

redirect_back('success', sprintf('%s, your membership request has been submitted successfully.', $fullName));