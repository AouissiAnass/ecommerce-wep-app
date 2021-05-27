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
    <title>Create New Product</title>
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
            <h1>Create a new Product</h1>
            <form class="article_col" method="POST" enctype="multipart/form-data">
                <input type="text" name="Product_name" placeholder="Product name" />
                <input type="text" name="Product_price" placeholder="Product price" />
                <input type="file" name="Product_picture">
                <textarea name="Product_description" placeholder="Writ the product description"></textarea>
                <select class="form-control" id="Key_category" name="Product_category">
                    <?php
                    include "../../Commun/conn.php";
                    $sql = "SELECT id , name FROM categories";
                    $result = mysqli_query($conn, $sql);
                    while ($row = $result->fetch_assoc()) {
                        echo '<option>' . $row["name"] . '</option>';
                    }
                    ?>
                </select>
                <br>
                <div class="button_container"><button type="submit" value="post" name="submit">Save</button></div>
            </form>
        </div>
        <?php
        include "../../Commun/conn.php";
        $name = $_POST["Product_name"];
        $price = $_POST["Product_price"];
        $filename = $_FILES["Product_picture"]["name"];
        $tempname = $_FILES["Product_picture"]["tmp_name"];
        $folder = "C:/xampp/htdocs/FIL ROUGE/ADMIN PANEL/images/".$filename;
        $description = $_POST["Product_description"];
        $category = $_POST["Product_category"];
        if(isset($_POST["submit"]))
        {
        $sql = "INSERT INTO product(name,price,picture,description,category_id) VALUES ('$name','$price','$filename','$description','$category')";
        if (mysqli_query($conn, $sql)) {
            header('location:adminpanel.php') ;
        }
        if (move_uploaded_file($tempname, $folder)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }
        $conn->close();
        }
        ?>
    </div>
</body>

</html>