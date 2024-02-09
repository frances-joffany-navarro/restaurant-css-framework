<?php
//how many images to show per page?
$limit = 3;
$currentPage = 1;
$offset = 0;

include("config/db_connect.php");
//write query
$stmt = $conn->prepare("SELECT * FROM gallery");
//execute query
$stmt->execute();
// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//fetch the result
$images = $stmt->fetchAll();
$total_images = $stmt->rowCount();

$conn = null;

//compute total pages based on total images
$total_pages = ceil($total_images / $limit);
//get offset
if (isset($_GET['page'])) {
  $currentPage = htmlspecialchars($_GET['page']);
} else {
  $currentPage = 1;
}

$offset = ($currentPage - 1) * $limit;

try {
  include "config/db_connect.php";
  //write query
  $stmt = $conn->prepare("SELECT * FROM gallery ORDER BY timestamp DESC LIMIT $offset, $limit");
  //execute query
  $stmt->execute();
  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  //fetch the result
  $images = $stmt->fetchAll();
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'templates/header.php' ?>
<main class="container-fluid d-grid gap-3">
  <header>
    <!--Navigation-->
    <?php include 'templates/navigation2.php' ?>
  </header>
  <section class="text-center">
    <h1>Gallery</h1>
  </section>
  <section class="d-grid gap-3" id="page1">
    <?php foreach ($images as $image) { ?>
      <img class="img-fluid border border-5 bg-secondary" width="500px" src="<?php echo $image['image_directory'] ?>" alt="<?php echo $image['image_name'] ?>">
    <?php } ?>
  </section>
  <nav aria-label="image navigation">
    <ul class="pagination justify-content-center">
      <li class="page-item">
        <a class="page-link" href="image.php?page=<?php if ($currentPage - 1 < 0) {
                                                    echo 1;
                                                  } else {
                                                    echo $currentPage - 1;
                                                  } ?>" aria-label="Previous">
          <span aria-hidden="true">&laquo</span>
        </a>
      </li>
      <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
        <li class="page-item <?php if ($currentPage == $i) {
                                echo 'active';
                              } else {
                                echo '';
                              } ?>"><a class="page-link" href="image.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php } ?>
        <li class="page-item">
          <a class="page-link" href="image.php?page=<?php if ($currentPage + 1 > $total_pages) {
                                                      echo $total_pages;
                                                    } else {
                                                      echo $currentPage + 1;
                                                    } ?>" aria-label="Next">
            <span aria-hidden="true">&raquo</span>
          </a>
        </li>
    </ul>
  </nav>
</main>
<?php include 'templates/footer.php' ?>

</html>