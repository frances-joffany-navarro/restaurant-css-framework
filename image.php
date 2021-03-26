<!DOCTYPE html>
<html lang="en">
    <?php include 'templates/header.php'?>
    <main class="container-fluid d-grid gap-3">
        <header>
            <!--Navigation-->
            <?php include 'templates/navigation2.php'?>                    
        </header>         
        <section class="text-center"><h1>Gallery</h1></section>
        <section class="d-grid gap-3" id="page1">
            <img class="img-fluid border border-5 bg-secondary" src="images/restaurant1.jpg" alt="picture 1">
            <img class="img-fluid border border-5 bg-secondary" src="images/food2.jpg" alt="picture 2">
            <img class="img-fluid border border-5 bg-secondary" src="images/beer1.jpg" alt="picture 3">
        </section>
        <nav aria-label="image navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo</span>
                    </a>
                </li>
                <li class="page-item active" id="list1"><a class="page-link" href="image.html">1</a></li>
                <li class="page-item" id="list2"><a class="page-link" href="image_page2.html">2</a></li>
                <li class="page-item" id="list3"><a class="page-link" href="image_page3.html">3</a></li>
                <li class="page-item" id="list4"><a class="page-link" href="image_page4.html">4</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo</span>
                    </a>
                </li>
            </ul>
        </nav>
    </main>
    <?php include 'templates/footer.php'?>
</html>