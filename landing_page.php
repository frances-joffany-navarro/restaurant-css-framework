<?php
$success = '';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant_dbase";

try {
    include "config/db_connect.php";
    //write query
    $stmt = $conn->prepare("SELECT id, created_at, CONCAT(firstname,' ',lastname) as name, email, message FROM emails ORDER BY created_at DESC ");
    //execute query
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //fetch the result
    $messages = $stmt->fetchAll();

    //print_r($messages);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

if (isset($_GET['id'])) {
    $id_to_delete = htmlspecialchars($_GET['id']);
    try {
        include "config/db_connect.php";
        //write query
        $stmt = $conn->prepare("DELETE FROM emails WHERE id = :id_to_delete");
        $stmt->bindParam(':id_to_delete', $id_to_delete);
        $id_to_delete = $id_to_delete;

        //execute query
        $stmt->execute();

        //$success = "Record deleted successfully";
        header('Location: landing_page.php');
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}

?>

<!DOCTYPE html>
<html lang="en">
  <?php include 'templates/header.php'?>
  <main class="container-fluid">
    <header>
      <nav class="navbar navbar-expand-sm navbar-expand-mb navbar-expand-lg navbar-light bg-light mx-auto" aria-label="landing navigation">
        <div class="container-fluid">
          <a class="navbar-brand" href="landing_page.php">
          <img class="img-fluid" src="images/kamayan_logo_black_shadow.png" alt="Kamayan Logo" style="max-width: 200px;">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
            <span class="navbar-text me-3">
              Welcome User
            </span>
            <a class="btn btn-success" href="index.php" role="button">Log out</a>
          </div>
        </div>
      </nav>
    </header>
      <main class="d-flex align-items-start mt-3">
        <!-- Nav tabs -->
          <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button name="messages" class="nav-link active btn btn-success mb-1" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="true">Messages</button>
            <button name="guestbook" class="nav-link btn btn-success mb-1" id="v-pills-guestbook-tab" data-bs-toggle="pill" data-bs-target="#v-pills-guestbook" type="button" role="tab" aria-controls="v-pills-guestbook" aria-selected="false">Guest book</button>
            <button name="gallery" class="nav-link btn btn-success mb-1" id="v-pills-gallery-tab" data-bs-toggle="pill" data-bs-target="#v-pills-gallery" type="button" role="tab" aria-controls="v-pills-gallery" aria-selected="false">Gallery</button>
          </div>
        <!-- Tab panes -->
        <div class="tab-content" id="v-pills-tabContent">
          <!-- Messages Panel -->
          <div class="tab-pane fade show active shadow" style="max-height:400px; width:1100px; background-color: rgba(212, 211, 211, 0.5);" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
            <div class="table-responsive mh-100">
              <table class="table table-striped table-hover text-center table-bordered" >
                <thead class='table-light'>
                  <tr>
                    <th>Timestamp</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(array_filter($messages)){ foreach ($messages as $message){?>
                    <tr>
                    <td><?php echo htmlspecialchars($message['created_at']); ?></td>
                    <td><?php echo htmlspecialchars($message['name']); ?></td>
                    <td><?php echo htmlspecialchars($message['email']); ?></td>
                    <td><?php echo htmlspecialchars($message['message']); ?></td>
                    <td>
                      <a href="landing_page?id=<?php echo $message['id']; ?>" class="btn btn-danger" id="liveToastBtn"><i class='fas fa-trash-alt fa-lg'></i> Delete</a>
                    </td>
                    </tr>
                  <?php } }else{?>
                    <tr>
                    <td colspan="5"> No result</td>
                    </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- Guestbook Panel -->
          <div class="tab-pane fade" id="v-pills-guestbook" role="tabpanel" aria-labelledby="v-pills-guestbook-tab">Guestbook Panel</div>
          <!-- Gallery Panel -->
          <div class="tab-pane fade" id="v-pills-gallery" role="tabpanel" aria-labelledby="v-pills-gallery-tab">
            <!-- Upload form -->
            <form action="landing_page.php" method="post" enctype="multipart/form-data" class="row">
              <div class="col-12 fs-3">
                <label for="formFileLg" class="form-label">Upload an image</label>
              </div>
              <div class="col-auto">                
                <input class="form-control form-control-lg" id="formFileLg" type="file">
              </div>
              <div class="col-auto align-text-bottom">
                <button type="submit" name="submit" class="btn btn-success btn-lg"><i class="fas fa-upload"></i> Upload</button>   
              </div>          
            </form>
          </div>
          <p class="fw-bold text-success"><?php //echo $success ?></p>
        </div>
      </main>
  </main>
  <?php include 'templates/footer.php'?>
</html>