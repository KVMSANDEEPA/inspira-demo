<?php
header("Content-Type: application/json");

// Load students from students.txt
$students = [];
$lines = file("students.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($lines as $line) {
    list($index, $password) = explode(",", trim($line));
    $students[trim($index)] = trim($password);
}

// Get input
$input = json_decode(file_get_contents("php://input"), true);
$index = $input['indexNumber'] ?? '';
$password = $input['password'] ?? '';

// Validate
if (isset($students[$index]) && $students[$index] === $password) {
    $photo_path = "photos/{$index}.jpg";
    echo json_encode([
        "success" => true,
        "image" => file_exists($photo_path) ? $photo_path : null
    ]);
} else {
    echo json_encode(["success" => false]);
}
