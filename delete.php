<?php
include_once('connection.php');

if (isset($_POST['delete_chef'])) {
    $chef_id = $_POST['delete_chef'];
    $query = $conn->prepare("DELETE FROM chef WHERE chef_id = ?");
    $query->execute([$chef_id]);

    header('Location: signup.html');
    exit();
}

if (isset($_POST['delete_ingredient'])) {
    $ingredient_id = $_POST['delete_ingredient'];
    $query = $conn->prepare("DELETE FROM ingredient WHERE ingredient_id = ?");
    $query->execute([$ingredient_id]);

    header('Location: home.php');
    exit();
}
