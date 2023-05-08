<?php
include_once('connection.php');

if (isset($_POST['ingredient_id'])) {
    $ingredient_id = $_POST['ingredient_id'];
    $query = $conn->prepare("DELETE FROM ingredient WHERE ingredient_id = ?");
    $query->execute([$ingredient_id]);

    header('Location: home.php');
    exit();
}
