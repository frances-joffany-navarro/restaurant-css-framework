<?php
$user = $password = '';
$errors = array('username' => '', 'password' => '');
$validity = array('username' => '', 'password' => '');

if(isset($_POST['submit'])){
    //check username
    if(empty($_POST['username'])){
        $errors['username'] = "Please enter your username.";
        $validity['username'] = "is-invalid";
    }else {
        $user = filter_var($_POST['username'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "restaurant_dbase";

        try{
            include("config/db_connect.php");
            //write query
            $stmt = $conn -> prepare("SELECT username, password FROM user WHERE username = '$user'");
            //execute query
            $stmt -> execute();
            //set the resulting array to associative
            $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
            //fetch the result
            $user_credentials = $stmt->fetch();

            if(!empty($user_credentials)){
                $validity['username'] = "is-valid";
            }else{
                $errors['username'] = "Username does not exist.";
                $validity['username'] = "is-invalid";
            }            
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
    
    if(empty($_POST['password'])){
        $errors['password'] = "You forgot to enter your password.";
        $validity['password'] = "is-invalid";
    }else {
        $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        if(empty($user_credentials)){
            $errors['password'] = "Password does not exist.";
            $validity['password'] = "is-invalid";
        }else{
            if(!($password === $user_credentials['password'])){
                $errors['password'] = "Password is incorrect. Please try again.";
                $validity['password'] = "is-invalid";
            }else{
                $validity['password'] = "is-valid";
            }
        }
    }

    if(array_filter($errors)){
        //echo "There is an error on the form";
        //print_r(array_filter($errors));
    }else{
        header('Location: landing_page.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'templates/header.php'?>
    <main class="container-fluid d-grid gap-3 position-absolute top-50 start-50 translate-middle" >
        <section class="text-center">
            <img class="img-fluid" src="images/kamayan_logo_black_shadow.png" alt="Kamayan Logo" style="max-width: 300px;">
        </section>    
        <section class="row p-2 shadow-lg rounded" id="login_section">
            <section class="mb-3">
                <h1 class="text-center">Log in</h1>
            </section>
            <section >
                <form action="login.php" method="POST" >
                    <!--Username Field-->
                    <section class="form-floating mb-3 col-12">
                        <input type="text" class="form-control <?php echo $validity['username'] ?>" name="username" value="<?php echo htmlspecialchars($user); ?>">
                        <label for="username" class="form-label" aria-describedby="invalidCheck1Feedback">Username</label>
                        <div class="invalid-feedback" id="invalidCheck1Feedback"><?php echo $errors['username']; ?></div>
                    </section>

                    <!--Password Field-->
                    <section class="form-floating mb-3 col-12">
                        <input type="password" class="form-control <?php echo $validity['password'] ?>" name="password">
                        <label for="password" class="form-label" aria-describedby="invalidCheck2Feedback">Password</label>
                        <div class="invalid-feedback" id="invalidCheck2Feedback"><?php echo $errors['password']; ?></div>
                    </section>

                    <!--Button-->
                    <section class="d-grid gap-4 mb-3 col-3 mx-auto">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt fa-2x"></i></button>
                    </section>
                </form>
            </section>
        </section>
        <section class="text-center "> 
            <a href="index.php" class="link-primary"><i class="far fa-arrow-alt-circle-left"></i> Go back to main page</a>
        </section>
    </main>
    <?php include 'templates/footer.php'?>
</html>