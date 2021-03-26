<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "restaurant_dbase";

    try{
        include("config/db_connect.php");
        //write query
        $stmt = $conn -> prepare("SELECT * FROM emails");
        //execute query
        $stmt -> execute();
        //set the resulting array to associative
        $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        //fetch the result
        $display = $stmt->fetchAll();
        
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    //display
    
?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'templates/header.php'?>
    <main class="container-fluid d-grid gap-3">
        <!--Header-->
        <header class="bg-light p-5 rounded mt-5" id="home_header">
            <!--Navigation-->
                <?php include 'templates/navigation.php'?>
            <!--Logo here-->
            <img class="img-fluid mx-auto mt-sm-3 mt-md-3 mt-lg-3 d-block" src="images/kamayan_logo_white_shadow.png" alt="kamayan_logo">
        </header>
        <section class="row">
            <!--Events Panel-->
            <section class="col-sm mb-3">
                <section class="card text-center h-100">
                    <header class="card-header"><h5>Upcoming Events</h5></header>
                    <main class="card-body">
                        <!--Events-->
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item mb-1">
                                <section>
                                    <h5 class="card-title">Valentines Day</h5>
                                    <p class="card-text text-muted">February 14, 2021</p>
                                </section>
                            </li>
                            <li class="list-group-item mb-1">
                                <section>
                                    <h5 class="card-title">Good Friday</h5>
                                    <p class="card-text text-muted">April 02, 2021</p>
                                </section>
                            </li>
                            <li class="list-group-item mb-1">
                                <section>
                                    <h5 class="card-title">Easter Sunday</h5>
                                    <p class="card-text text-muted">April 04, 2021</p>
                                </section>
                            </li>
                            <li class="list-group-item mb-1">
                                <section>
                                    <h5 class="card-title">Labor Day</h5>
                                    <p class="card-text text-muted">May 01, 2021</p>
                                </section>
                            </li>
                        </ul>
                    </main>
                </section>
            </section>
            <!--Promos Panel-->
            <section class="col-sm mb-3">
                <section class="card text-center h-100 col-sm ">
                    <header class="card-header"><h5>Promos</h5></header>
                    <main class="card-body">
                        <!--Promos-->
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item mb-1">
                                <section>
                                    <h5 class="card-title">Valentines Special - Couples Eating Contest</h5>
                                    <p class="card-text text-muted">Date of the Promo: February 14, 2021</p>
                                    <a href="#" class="btn btn-primary">Details</a>
                                </section>
                            </li>
                            <li class="list-group-item mb-1">
                                <section>
                                    <h5 class="card-title">Sunday Fiesta - Drink all you can</h5>
                                    <p class="card-text text-muted">Date of the Promo: Every Sunday</p>
                                    <a href="#" class="btn btn-primary">Details</a>
                                </section>
                            </li>
                        </ul>
                    </main>
                </section>
            </section>
        </section>
    </main>
    <?php include 'templates/footer.php'?>
</html>