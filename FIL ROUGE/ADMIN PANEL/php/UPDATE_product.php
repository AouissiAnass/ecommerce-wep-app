<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital@1&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/CREATE_PRODUCT.css" />
    <title>Edit Product</title>
</head>

<body>
    <div class="row header1">
        <div class="col AdminPanel">My AdminPanel</div>
        <div class="col User">I'm ADMIN</div>
    </div>
    <div class="row">
        <div class="col-2 mynav">
            <div class="navbar-nav">
            <a class="nav-item nav-link link" href="./adminpanel.php">products</a>
                <a class="nav-item nav-link link" href="./categories.php">categories</a>
                <a class="nav-item nav-link link" href="./clients.php">clients</a>
            </div>
        </div>
        <div class="col-10 ">
            <h1>Edit Product</h1>
            <?php
            include "../../Commun/conn.php";
            $Product_edit_id = $_GET['id'];
            $sql = "SELECT * FROM product WHERE id = '$Product_edit_id' ";
            $result = mysqli_query($conn, $sql);
            while ($row = $result->fetch_assoc()) {
                $name = $row["name"];
                $price = $row["price"];
                $description = $row["description"];
                echo "<form class='article_col' method='POST' enctype='multipart/form-data'><input type='text' name='Product_name' placeholder='$name' /><input type='text' name='Product_price' placeholder='$price' /><input type='file' name='Product_picture'><textarea name='Product_description' placeholder='$description'></textarea>";
                echo "<select class='form-control' id='Key_category' name='Product_category'>" ;
                include '../../Commun/conn.php';
                $sql1 = 'SELECT id , name FROM categories'; 
                $result1 = mysqli_query($conn, $sql1);
                while ($row = $result1->fetch_assoc()) {echo '<option>' . $row["name"] . '</option>';}
                echo "</select><br><div class='button_container'><button type='submit' value='post' name='submit'>Save</button></div></form>";
            }
            ?>

            <?php
            include "../../Commun/conn.php";
            $Edit_ID = $_GET['id'];
            if (isset($_POST['submit'])) {
                if (isset($_POST['Product_name']))
                {
                $Edit_name = $_POST['Product_name'];
                $sql = "UPDATE product SET name='$Edit_name' WHERE id = '$Edit_ID'";
                mysqli_query($conn, $sql);
                }
                if (isset($_POST['Product_price']))
                {
                $Edit_price = $_POST['Product_price'];
                $sql = "UPDATE product SET price='$Edit_price' WHERE id = '$Edit_ID'";
                mysqli_query($conn, $sql);
                }
                if (isset($_POST['Product_description']))
                {
                $Edit_description = $_POST['Product_description'];
                $sql = "UPDATE product SET description='$Edit_description' WHERE id = '$Edit_ID'";
                mysqli_query($conn, $sql);
                }
                if (isset($_POST['Product_category']))
                {
                $Edit_category = $_POST['Product_category'];
                $sql = "UPDATE product SET category_id='$Edit_category' WHERE id = '$Edit_ID'";
                mysqli_query($conn, $sql);
                }
                header('location:adminpanel.php');
            }
            ?>
        </div>
    </div>
</body>

</html>