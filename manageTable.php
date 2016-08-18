<?php
require_once 'php-functions.php';
session_start();

$groceries = isset($_SESSION['groceries']) ? $_SESSION['groceries'] : [];

echo json_encode($groceries);

