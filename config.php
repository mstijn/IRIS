<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 1/6/2015
 * Time: 2:43 PM
 */
// Start sessions
session_start();

// Error
error_reporting(E_ALL ^ E_NOTICE);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";

$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Starting headers
header('Content-Type: text/html; charset=utf-8');
?>