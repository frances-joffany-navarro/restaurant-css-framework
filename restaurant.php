<!DOCTYPE html>
<html lang="en">
<?php include 'templates/header.php'?>
    <main class="container-fluid d-grid gap-3">
        <header>
            <!--Navigation-->
            <?php include 'templates/navigation2.php'?>  
        </header>
        <section>
            <h1 class="text-center">About us</h1>
        </section>
        <section class="card d-grid gap-3">
            <section class="row">
                <!--Maps-->
                <section class="col-md-7 order-md-5">
                    <iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=Cantersteen%2010,%201000%20Bruxelles&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </section>        
                <!--Addresses-->
                <section class="col-md-5">
                    <ul class="list-group list-group-flush d-grid gap-3">
                        <li class="list-group-item d-grid gap-3 lh-1">
                            <h2>Kamainsyan Restaurant Bruxelles</h2>
                            <p class="text-muted">Cantersteen 10, 1000 Bruxelles</p>
                            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseSchedule1" role="button" aria-expanded="false" aria-controls="collapseSchedule">See Schedule</a>
                            <!--Schedule using Collapse-->
                            <section class="collapse" id="collapseSchedule1">
                                <section class="card card-body text-center">
                                    <table class="table table-striped">                                
                                        <tbody>
                                            <tr>
                                                <th>Weekdays</th>
                                                <td>12:00 - 20:30</td>
                                            </tr>
                                            <tr>
                                                <th>Weekends</th>
                                                <td>12:00 - 21:00</td>
                                            </tr>
                                            <tr >                                        
                                                <th>Holidays</th>
                                                <td>Open</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </section>
                        </li>
                        <li class="list-group-item d-grid gap-3 lh-1">
                            <h2>Kamainsyan Restaurant Liège</h2>
                            <p class="text-muted">Rue de Mulhouse 36, 4020 Liège</p>
                            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseSchedule2" role="button" aria-expanded="false" aria-controls="collapseSchedule">See Schedule</a>
                            <!--Schedule using Collapse-->
                            <section class="collapse" id="collapseSchedule2">
                                <section class="card card-body text-center">
                                    <table class="table table-striped">                                
                                        <tbody>
                                            <tr>
                                                <th>Weekdays</th>
                                                <td>12:00 - 20:30</td>
                                            </tr>
                                            <tr>
                                                <th>Weekends</th>
                                                <td>12:00 - 21:00</td>
                                            </tr>
                                            <tr >                                        
                                                <th>Holidays</th>
                                                <td>Open</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </section>
                        </li>
                        <li class="list-group-item d-grid gap-3 lh-1">
                            <h2>Kamainsyan Restaurant Ghent</h2>
                            <p class="text-muted">Koningin Astridlaan 185, 9000 Ghent</p>
                            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseSchedule3" role="button" aria-expanded="false" aria-controls="collapseSchedule">See Schedule</a>
                            <!--Schedule using Collapse-->
                            <section class="collapse" id="collapseSchedule3">
                                <section class="card card-body text-center">
                                    <table class="table table-striped">                                
                                        <tbody>
                                            <tr>
                                                <th>Weekdays</th>
                                                <td>12:00 - 20:30</td>
                                            </tr>
                                            <tr>
                                                <th>Weekends</th>
                                                <td>12:00 - 21:00</td>
                                            </tr>
                                            <tr >                                        
                                                <th>Holidays</th>
                                                <td>Open</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </section>
                        </li>
                    </ul>   
                </section>
            </section>            
        </section>
    </main>
    <?php include 'templates/footer.php'?>
</html>