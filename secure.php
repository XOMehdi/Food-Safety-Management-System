<?php
session_start();
if (!isset($_SESSION['chef_id']) || !isset($_SESSION['password'])) {
    header("Location: login.html");
    exit();
}
