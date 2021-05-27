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
    <link rel="stylesheet" href="../css/adminpanel.css" />
    <title>Admin Panel</title>
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
        <div class="col">
            <a href="CREATE_CATEGORY.php"><button type="button" class="btn btn-success main-add-button">
                    Add Category
                </button>
            </a>
            <table id="myTable" class="table my-table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="tablebody">
                    <?php
                    $conn = new mysqli('localhost', 'root', '', 'fil_rouge');
                    $sql = "SELECT * FROM categories ";
                    $result = mysqli_query($conn, $sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo '<td><a class="btn btn-primary blue-btn" href ="UPDATE_CATEGORY.php?id=' . $row["id"] . '" role = "button">UPDATE</a><a class="btn btn-primary" href ="DELETE_CATEGORY.php?id=' . $row["id"] . '" role = "button">DELETE</a></td>';
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>