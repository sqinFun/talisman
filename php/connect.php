<?php
$host = "localhost";
$db = "talisman";
$user = "root";
$pass = "";

$dsn = "mysql:host=$host;dbname=$db";
$pdo = new PDO($dsn, $user, $pass);