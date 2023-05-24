<?php

include_once('connection.php');
session_start();

if (isset($_POST['logged_in'])) {
    $chef_id = $_POST['chef_id'];
    $password = $_POST['password'];

    $query = $conn->prepare("SELECT * FROM chef WHERE chef_id = ?");
    $query->execute([$chef_id]);

    $row = $query->fetch(PDO::FETCH_OBJ);

    if ($chef_id == $row->chef_id && $password == $row->password) {
        $_SESSION['chef_id'] = $chef_id;
        $_SESSION['password'] = $password;

        header('Location: home.php');
        exit();
    } else {
        header('Location: login.html');
        echo 'Invalid username or password';
    }
}

if (isset($_POST['signed_up'])) {
    $chef_id = $_POST['chef_id'];
    $chef_fname = $_POST['chef_fname'];
    $chef_lname = $_POST['chef_lname'];
    $chef_age = $_POST['chef_age'];
    $chef_gender = $_POST['chef_gender'];
    $password = $_POST['password'];

    $query = $conn->prepare("INSERT INTO chef VALUES (?, ?, ?, ?, ?, ?)");
    $query->execute([$chef_id, $chef_fname, $chef_lname, $chef_age, $chef_gender, $password]);

    $_SESSION['chef_id'] = $chef_id;
    $_SESSION['password'] = $password;

    header('Location: home.php');
}
