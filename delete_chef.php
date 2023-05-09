<?php
include_once('connection.php');

if (isset($_POST['chef_id'])) {
    $chef_id = $_POST['chef_id'];
    $query = $conn->prepare("DELETE FROM chef WHERE chef_id = ?");
    $query->execute([$chef_id]);

    header('Location: personal_info.php');
    exit();
}
