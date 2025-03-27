<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['name'])) {
  header("Location: login.php");
  exit;
}

$user_id = $_SESSION['id'];

$id = $_GET['id'];

$sql = "DELETE FROM memories WHERE id = $id";
$result = $mysqli->query($sql);

if ($result) {
  header("Location: index.php");
  exit;
} else {
  echo "Error: " . $mysqli->error;
}
