<?php

$username = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=localhost;dbname=fsms", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$sql = "SELECT ingredient_name FROM ingredient";
$result = $conn->query($sql);

while ($row = $result->fetch(PDO::FETCH_OBJ)) {
    echo '<button class="ingredient-available block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem" tabindex="-1">' . $row->ingredient_name . '</button>';
}
