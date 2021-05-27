<?php
include "../../Commun/conn.php" ;
$DELETE_ID = $_GET['id'];
$sql = "DELETE FROM customers WHERE id='$DELETE_ID'";
if (mysqli_query($conn, $sql)) {
    header('location:clients.php');
}
?>