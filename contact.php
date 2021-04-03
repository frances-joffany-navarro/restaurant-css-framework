<?php
$firstname = $lastname = $email = $subject = $message = $success = '';
$errors = array('firstname' => '', 'lastname' => '', 'email' => '', 'subject' => '', 'message' => '');
$validity = array('firstname' => '', 'lastname' => '', 'email' => '', 'subject' => '', 'message' => '');
if(isset($_POST['submit'])){
    //check firstname
    if(empty($_POST['firstname'])){
        $errors['firstname'] = "The first name field is required.";
        $validity['firstname'] = "is-invalid";
    }else {
        $firstname = filter_var($_POST['firstname'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        if(!preg_match('/^[a-zA-Z\s]+$/',$firstname)){
            $errors['firstname'] = "First name must be letters and spaces only.";
            $validity['firstname'] = "is-invalid";
        }else{
            $validity['firstname'] = "is-valid";
        }
    }

    //check lastname
    if(empty($_POST['lastname'])){
        $errors['lastname'] =  "The last name field is required.";
        $validity['lastname'] = "is-invalid";
    }else {
        $lastname = filter_var($_POST['lastname'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        if(!preg_match('/^[a-zA-Z\s]+$/',$lastname)){
            $errors['lastname'] = "Last name must be letters and spaces only.";
            $validity['lastname'] = "is-invalid";
        }else{
            $validity['lastname'] = "is-valid";
        }
    }

    //check email
    if(empty($_POST['email'])){
        $errors['email'] = "The email field is required.";
        $validity['email'] = "is-invalid";
    }else {
        $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "Please enter a valid email address.";
            $validity['email'] = "is-invalid";
        }else{
            $validity['email'] = "is-valid";
        }
    }

    //check subject
    if(empty($_POST['subject'])){        
        $errors['subject'] = "The subject field is required.";
        $validity['subject'] = "is-invalid";
    }else {
        $subject = filter_var($_POST['subject'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $validity['subject'] = "is-valid";
    }

    //check message
    if(empty($_POST['message'])){
        $errors['message'] = "The message field is required.";
        $validity['message'] = "is-invalid";
    }else {
        $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_BACKTICK);
        $validity['message'] = "is-valid";
    }

    if(array_filter($errors)){
        //echo "There is an error on the form";
        //print_r(array_filter($errors));
    }else{
        
            include("config/db_connect.php");

            //prepare sql and bind parameters
            $stmt = $conn->prepare("INSERT INTO emails (firstname, lastname, email, subject, message) VALUES (?, ?, ?, ?, ?)");
            $stmt->bindParam(1, $fname);
            $stmt->bindParam(2, $lname);
            $stmt->bindParam(3, $eml);
            $stmt->bindParam(4, $sbjt);
            $stmt->bindParam(5, $msg);

            //insert row
            $fname = $firstname;
            $lname = $lastname;
            $eml = $email;
            $sbjt = $subject;
            $msg = $message;
            $stmt->execute();

            //display
            $success = "Your email sent successfully";
            header('Location: contact.php');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'templates/header.php'?>
    <main class="container-fluid d-grid gap-3">
        <header>
            <!--Navigation-->
            <?php include 'templates/navigation2.php'?>  
        </header>
        <section>
            <h1 class="text-center">Contact</h1>
        </section> 
        <section id="contact_section">
            <div class="text-success"> <?php echo $success; ?></div>
            <form action="contact.php" method="post" class="row">
                <!--First Name Field-->
                <section class="mb-3 col-sm col-md">
                    <label for="firstname" class="form-label" aria-describedby="invalidCheck1Feedback">First Name</label>
                    <input type="text" class="form-control <?php echo $validity['firstname'] ?>" name="firstname" value="<?php echo htmlspecialchars($firstname); ?>">
                    <div class="invalid-feedback" id="invalidCheck1Feedback"><?php echo $errors['firstname']; ?></div>
                </section>
                <!--Last Name Field-->
                <section class="mb-3 col-sm col-md">
                    <label for="lastname" class="form-label" aria-describedby="invalidCheck2Feedback">Last Name</label>
                    <input type="text" class="form-control <?php echo $validity['lastname'] ?>" name="lastname" value="<?php echo htmlspecialchars($lastname); ?>">
                    <div class="invalid-feedback" id="invalidCheck2Feedback"><?php echo $errors['lastname']; ?></div>
                </section>
                <!--Email Field-->
                <section class="mb-3">
                    <label for="email" class="form-label" aria-describedby="invalidCheck3Feedback">Email</label>
                    <input type="email" class="form-control <?php echo $validity['email'] ?>" name="email" value="<?php echo htmlspecialchars($email); ?>">
                    <div class="invalid-feedback" id="invalidCheck3Feedback"><?php echo $errors['email']; ?></div>
                </section>
                <!--Subject Field-->
                <section class="mb-3">
                    <label for="subject" class="form-label" aria-describedby="invalidCheck4Feedback">Subject</label>
                    <select name="subject" class="form-select <?php echo $validity['subject'] ?>" name="subject">
                        <option value="" disabled <?php if($subject == ""){echo "selected";} ?>>Please select</option>
                        <option value="reservation" <?php if($subject == "reservation"){echo "selected";} ?>>Reservation</option>
                        <option value="complains" <?php if($subject == "complains"){echo "selected";} ?>>Complains</option>
                        <option value="reviews" <?php if($subject == "reviews"){echo "selected";} ?>>Reviews</option>
                    </select>
                    <div class="invalid-feedback" id="invalidCheck4Feedback"><?php echo $errors['subject']; ?></div>
                </section>
                <!--Message Field-->
                <section class="mb-3">
                    <label for="message" class="form-label" aria-describedby="invalidCheck5Feedback">Message</label>
                    <textarea name="message" id="messageTextArea" placeholder="Enter your message here" class="form-control <?php echo $validity['message'] ?>"><?php echo htmlspecialchars($message); ?></textarea>
                    <div class="invalid-feedback" id="invalidCheck5Feedback"><?php echo $errors['message']; ?></div>
                </section>
                <!--Button-->
                <section class="d-grid gap-2 col-6 mx-auto mb-3">
                    <button type="submit" name="submit" class="btn btn-primary"><i class="far fa-paper-plane fa-lg"></i> Send</button>
                </section>            
            </form>
        </section> 
    </main>
    <?php include 'templates/footer.php'?>
</html>