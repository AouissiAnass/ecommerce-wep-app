<?php
include "../../Commun/conn.php" ;
$DELETE_ID = $_GET['id'];
$sql = "DELETE FROM product WHERE id='$DELETE_ID'";
if (mysqli_query($conn, $sql)) {
    header('location:adminpanel.php');
}
?>