<?php
session_start();
if (!isset($_SESSION['chef_id']) || !isset($_SESSION['chef_password'])) {
    header("Location: login.html");
    exit();
}
