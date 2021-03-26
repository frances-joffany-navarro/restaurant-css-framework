<!DOCTYPE html>
<html lang="en">
    <?php include 'templates/header.php'?>
    <main class="container-fluid d-grid gap-3">
        <header>
            <!--Navigation-->
            <?php include 'templates/navigation2.php'?>
        </header>
        <!--Breadcrumb navigation-->
        <nav class="bg-light d-sm-none" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#boodles">Boodle</a></li>
                <li class="breadcrumb-item"><a href="#appetizers">Appetizers</a></li>
                <li class="breadcrumb-item"><a href="#desserts">Desserts</a></li>
                <li class="breadcrumb-item"><a href="#drinks">Drinks</a></li>
            </ol>
        </nav>
        <!--Title-->
        <section>
            <h1 class="text-center">Menu</h1>
            <p></p>
        </section>
        <!--Menu List-->
        <section class="row">
            <section class="col-12 col-md-6 img-fluid" id="menu1">
                <!--Boodles-->
                <section class="card mb-3" id="boodles">
                    <header class="card-header">
                        <h2>Boodle Fight Platters</h2>
                    </header>
                    <main class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <section class="position-relative">
                                    <h3>Family Platter</h3>
                                    <p>3-4 persons</p>
                                    <a class="btn btn-primary mb-3" data-bs-toggle="collapse" href="#proteinSection" role="button" aria-expanded="false" aria-controls="proteinSection">
                                        Choose 3 Protein
                                    </a>
                                    <span
                                        class="badge bg-primary rounded-pill position-absolute top-0 end-0">Price</span>
                                </section>
                            </li>
                            <li class="list-group-item">
                                <section class="position-relative">
                                    <h3>Fiesta Platter</h3>
                                    <p>8-10 persons</p>
                                    <a class="btn btn-primary mb-3" data-bs-toggle="collapse" href="#proteinSection" role="button" aria-expanded="false" aria-controls="proteinSection">
                                        Choose 4 Protein
                                    </a>
                                    <span class="badge bg-primary rounded-pill position-absolute top-0 end-0">
                                        Price
                                    </span>
                                </section>
                            </li>
                        </ul>                
                    </main>
                    <footer class="card-footer">
                        <p>
                            Served with Rice, Grilled eggplant, Steamed okra, Salted egg, Fermented shrimp sauce, Soy sauce, Tomato and onion salad, slice of seasonal fruits
                        </p>
                    </footer>
                </section>
                <!--Protein Section-->
                <section class="collapse mb-3" id="proteinSection">
                    <main class="card card-body">
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item">
                                <section>
                                    <h3><i class="fas fa-bacon fa-md"></i> Pork</h3>
                                    <p>Adobo</p>
                                    <p>Pork BBQ</p>
                                    <p>Lechon Kawali</p>
                                    <p>Chrispy Pata</p>
                                </section>
                            </li>
                            <li class="list-group-item">
                                <section>
                                    <h3><i class="fas fa-drumstick-bite fa-md"></i> Chicken</h3>
                                    <p>Fried Chicken</p>
                                    <p>Chicken BBQ</p>
                                </section>
                            </li>
                            <li class="list-group-item">
                                <section>
                                    <h3><i class="fas fa-fish fa-md"></i> Seafoods</h3>
                                    <p>Calamares</p>
                                    <p>Grilled Squid</p>
                                    <p>Mussels</p>
                                    <p>Shrimp</p>
                                    <p>Fried Boneless Milk Fish</p>
                                    <p>Tilapia</p>
                                </section>
                            </li>
                        </ul>
                    </main>
                </section>
            </section>
            <section class="col-12 col-md-6" id="menu2">
                <section class="row">
                    <section class="col-12 col-md-12 mb-3">
                        <!--Appetizers-->
                        <section class="card" id="appetizers">
                            <header class="card-header">
                                <h2>Appetizers</h2>
                            </header>
                            <main class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <section class="position-relative">
                                            <h3>Lumpia</h3>
                                            <p>It is composed of ground pork/beef along with minced garlic, onions, carrots, and
                                                seasonings such as soy sauce, salt and ground black pepper.</p>
                                            <span
                                                class="badge bg-primary rounded-pill position-absolute top-0 end-0">Price</span>
                                        </section>
                                    </li>
                                    <li class="list-group-item">
                                        <section class="position-relative">
                                            <h3>Kropek</h3>
                                            <p>Fried prawn flavored crackers made from starch or tapioca flour, and other
                                                seasonings.</p>
                                            <span
                                                class="badge bg-primary rounded-pill position-absolute top-0 end-0">Price</span>
                                        </section>
                                    </li>
                                </ul>
                            </main>
                        </section>
                    </section>
                    <section class="col-12 col-md-12 mb-3">
                        <!--Desserts-->
                        <section class="card" id="desserts">
                            <header class="card-header">
                                <h2>Desserts</h2>
                            </header>
                            <main class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <section class="position-relative">
                                            <h3>Halo-Halo</h3>
                                            <p>It is composed of that are all mixed together, along with leche flan, shaved ice
                                                and evaporated milk.</p>
                                            <span
                                                class="badge bg-primary rounded-pill position-absolute top-0 end-0">Price</span>
                                        </section>
                                    </li>
                                    <li class="list-group-item">
                                        <section class="position-relative">
                                            <h3>Bananacue</h3>
                                            <p>Fried banana coated with brown sugar.</p>
                                            <span
                                                class="badge bg-primary rounded-pill position-absolute top-0 end-0">Price</span>
                                        </section>
                                    </li>
                                    <li class="list-group-item">
                                        <section class="position-relative">
                                            <h3>Cassava Cake</h3>
                                            <p>Classic Filipino dessert made from grated cassava (manioc).</p>
                                            <span
                                                class="badge bg-primary rounded-pill position-absolute top-0 end-0">Price</span>
                                        </section>
                                    </li>
                                    <li class="list-group-item">
                                        <section class="position-relative">
                                            <h3>Biko</h3>
                                            <p>Filipino rice cake made from sticky rice (locally known as malagkit), coconut
                                                milk, and brown sugar.</p>
                                            <span
                                                class="badge bg-primary rounded-pill position-absolute top-0 end-0">Price</span>
                                        </section>
                                    </li>
                                </ul>
                            </main>
                        </section>
                    </section>
                    <section class="col-12 col-md-12 mb-3">
                        <!--Drinks-->
                        <section class="card" id="drinks">
                            <header class="card-header">
                                <h2>Drinks</h2>
                            </header>
                            <main class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <section class="position-relative">
                                            <h3>Soft Drinks</h3>
                                            <p>Coca-cola, Sprite, Fanta, Lipton Ice tea</p>
                                            <span
                                                class="badge bg-primary rounded-pill position-absolute top-0 end-0">Price</span>
                                        </section>
                                    </li>
                                    <li class="list-group-item">
                                        <section class="position-relative">
                                            <h3>Beer</h3>
                                            <p>San Miguel, San Miguel Light, Red Horse</p>
                                            <span
                                                class="badge bg-primary rounded-pill position-absolute top-0 end-0">Price</span>
                                        </section>
                                    </li>
                                </ul>
                            </main>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </main>
    <?php include 'templates/footer.php'?>

</html>