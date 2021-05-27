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
            $category_edit_id = $_GET['id'];
            $sql = "SELECT * FROM categories WHERE id = '$category_edit_id' ";
            $result = mysqli_query($conn, $sql);
            while ($row = $result->fetch_assoc()) {
                $name = $row["name"];       
            echo "<form class='article_col' method='POST' enctype='multipart/form-data'><input type='text' name='Category_name' placeholder='$name' /><br><div class='button_container'><button type='submit' value='post' name='submit'>Save</button></div></form>" ;
            }
            ?>

            <?php
            include "../../Commun/conn.php";
            $Edit_ID = $_GET['id'];
            if (isset($_POST['submit'])) {
                if (isset($_POST['Category_name']))
                {
                $Edit_name = $_POST['Category_name'];
                $sql = "UPDATE categories SET name='$Edit_name' WHERE id = '$Edit_ID'";
                mysqli_query($conn, $sql);
                header('location:categories.php');
                }
            }
            ?>
        </div>
    </div>
</body>

</html>