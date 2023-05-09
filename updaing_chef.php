<?php
include_once('connection.php');

if (isset($_POST['update'])) {
    $chef_id = $_POST['update'];
    $query = $conn->prepare("SELECT * FROM chef_id WHERE chef_id = ?");

    $query->execute([$chef_id]);
    $row = $query->fetch(PDO::FETCH_OBJ);

    $chef_fname = $_POST['chef_fname'];
    $chef_lname = $_POST['chef_lname'];
    $chef_age = $_POST['chef_age'];
    $chef_gender = $_POST['chef_gender'];
    $password = $_POST['password'];


    $query = $conn->prepare("UPDATE chef_id SET chef_fname = ?, chef_lname = ?, chef_age = ?, chef_gender = ?, password = ?");
    $query->execute([$chef_fname, $chef_lname, $chef_age, $chef_gender, $password]);

    header("Location: personal_info.php");
}
