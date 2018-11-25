<?php include_once 'shoppingCart.php'; ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Shopping Cart</title>
        <link rel="icon" href="favicon.ico" type="image/ico" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="styles.css" rel="stylesheet" type="text/css">
        <link href="cart.css" rel="stylesheet" type="text/css">
        <script src="store.js"></script>

        <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
    </script>
    <![endif]-->
    </head>

    <!--
    Justin Cernekee
    Index Page
    09/16/18
    < -->
    <a name="toppage">

        <body>

            <main id="body" class="width">
                <aside id="sidebar" class="column-left">

                    <header>
                        <h1><a href="index.php"><img src="assets/Logo.jpg" style="width:200px;height:125px;"></a></h1>



                    </header>

                    <nav id="mainnav">
                        <ul>


                            <li><a href="index.php">HOME</a></li>
                            <li><a href="about_us.html">About Us</a></li>
                            <li class="dropdown">
                                <button class="dropdown-btn">Menu &#9660;
                                    <i class="fa fa-caret-down"></i>
                                </button>
                                <div class="dropdown-container">
                                    <a href="menu.html">Menu Page</a>
                                    <a href="starters_salads_and_sides.php">Starters, Salads, Sides</a>
                                    <a href="burgers_and_wraps.php">Burgers, Wraps</a>
                                    <a href="tacos_and_burritos.php">Tacos, Burritos</a>
                                    <a href="entree_bowls.php">Entree Bowls</a>
                                    <a href="kids_menu.php">Kids Menu</a>
                                    <a href="desserts.php">Desserts</a>
                                    <a href="beverages.php">Beverages</a>

                                </div>
                            </li>
                            <li><a href="NutritionalPage.html">Nutritional Page</a></li>
                            <li><a href="gallery_and_social_media.html">Gallery/Social Media</a></li>
                            <li><a href="Events.html">Events/Specials</a></li>
                            <li><a href="reservations.html">Reservations</a></li>
                            <li><a href="Careers.html">Career Opportunities</a></li>
                            <li><a href="contact_us.html">Contact Us</a></li>
                            <li><a href="shopping_cart.html">Place Your Order Here</a></li>
                        </ul>
                    </nav>



                </aside>
                <script>
                    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
                    var dropdown = document.getElementsByClassName("dropdown-btn");
                    var i;

                    for (i = 0; i < dropdown.length; i++) {
                        dropdown[i].addEventListener("click", function () {
                            this.classList.toggle("active");
                            var dropdownContent = this.nextElementSibling;
                            if (dropdownContent.style.display === "block") {
                                dropdownContent.style.display = "none";
                            } else {
                                dropdownContent.style.display = "block";
                            }
                        });
                    }
                </script>
                <main id="content" class="column-right">

                    <h1>
                        <center>The Magnificent Mushroom</center>
                    </h1>
                    <br>


                    <br><br><br>
                    <h3>Please Place Your Order:</h3>



                    <section class="container content-section">
                        <?php $page = "shopping_cart";
                        require_once("displayShoppingCart.php"); ?>
                    </section>

                    <section class="checkout-section">
                        <?php require_once("checkout.php"); ?>
                    </section>


                    <footer class="clear">
                        <br><br><br><br><a href="#toppage"><img src="assets/Red_Pepper.jpg" width="124" height="60" class="centerfooter"><a />
                    </footer>

                </main>

                <div class="clear"></div>

            </main>


        </body>

</html>
