<?php
include "../../Commun/conn.php" ;
$DELETE_ID = $_GET['id'];
$sql = "DELETE FROM categories WHERE id='$DELETE_ID'";
if (mysqli_query($conn, $sql)) {
    header('location:categories.php');
}
?>