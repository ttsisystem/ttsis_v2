<?php
session_start();
error_reporting(0);
include('includes/conn.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{ 

$id = $_GET['id']; // get id through query string
  if(isset($_POST['btn_delete'])) { 
$sql = "DELETE FROM tbltourpackages WHERE PackageId=:id";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_STR);
$stmt -> execute();
  header('Location: managedestination.php');
}
}
?>