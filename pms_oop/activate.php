<?php

require_once 'Validation.php';
require_once 'Database.php';


$validation = new Validation();


$database = new Database('localhost', 'root', '', 'database');
$database->connect();


$sanitizedInput = $validation->sanitizeInput($_POST['input']);
if ($validation->validateEmail($sanitizedInput)) {
    
    $query = "INSERT INTO table_name (email) VALUES (:email)";
    $params = [':email' => $sanitizedInput];
    $database->query($query, $params);
} else {
    
    echo "Invalid email!";
}