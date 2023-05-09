<?php
include_once('connection.php');

if (isset($_POST['update'])) {
    $ingredient_id = $_POST['update'];
    $query = $conn->prepare("SELECT * FROM ingredient WHERE ingredient_id = ?");

    $query->execute([$ingredient_id]);
    $row = $query->fetch(PDO::FETCH_OBJ);

    $ingredient_name = $_POST['ingredient_name'];
    $ingredient_cost = $_POST['ingredient_cost'];
    $purchase_date = $_POST['purchase_date'];
    $expire_date = $_POST['expire_date'];

    $query = $conn->prepare("UPDATE ingredient SET ingredient_name = ?, ingredient_cost = ?, purchase_date = ?, expire_date = ?");
    $query->execute([$ingredient_name, $ingredient_cost, $purchase_date, $expire_date]);

    header("Location: home.php");
}
