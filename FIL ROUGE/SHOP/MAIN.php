<?php
$PAGE_NAME = "SHIRO STORE";
$CSS = "HOME";
include "HEADER.php";
?>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="./images to use/ars-games-of-the-year-2020-800x450.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./images to use/Best-PC-Graphics-2020.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./images to use/uplayplus_hero-696x392-1.jpg" alt="Third slide">
    </div>
  </div>
</div>
<h1 class="Latest-keys">Latest keys</h1>
<div class="row" >
  <?php
  include "../Commun/conn.php";
  $sql = "SELECT id , name , price , picture, description FROM product";
  $result = mysqli_query($conn, $sql);
  while ($row = $result->fetch_assoc()) {
    echo '<div class = "col" >';
    echo '<div class="card" ">';
    echo '<img class="card-img-top"' ;
    echo 'src="../ADMIN PANEL/images/'. $row["picture"].'"' ; 
    echo 'alt="Card image cap">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . $row["name"] . '</h5>';
    echo '<p1 class="card-text text desc">' . $row["description"] . '</p1><br>';
    echo '<p1 class="card-text price">' . $row["price"] . ' $ </p1><br>';
    echo '<a href ="Product.php?id=' . $row["id"] . '" class="btn btn-primary buy">Buy Now</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
  ?>
</div>
<?php
include "FOOTER.php";
?>