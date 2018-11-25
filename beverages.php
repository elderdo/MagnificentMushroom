<?php include_once 'shoppingCart.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Beverages</title>
        <link rel="icon" href="favicon.ico" type="image/ico" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="styles.css" rel="stylesheet" type="text/css">

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
                <?php $page = "beverages"; include_once('displayShoppingCart.php'); ?>
                <aside id="sidebar" class="column-left">

                    <header>
                        <h1><a href="index.php"><img src="assets/Logo.jpg"   style="width:200px;height:125px;"></a></h1>

                    </header>

                    <nav id="mainnav">
                        <ul>
                            <li><a href="index.php">HOME</a></li>
                            <li><a href="about_us.html">About Us</a></li>
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
                            <li><a href="shopping_cart.php">Place Your Order Here</a></li>
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

                    <?php
                    // For the given id generate an HTML form
                    // that sends the 'add' acttion along with the id 
                    function generateAction($id) {
                        $div  = "<div class=\"product-tile-footer\">";
                        $div .= "  <div class=\"cart-action\">";
                        $div .= "    <form method = \"post\" action=\"beverages.php?action=add&id=$id\">";
                        $div .= "      <input type=\"hidden\" class=\"product-quantity\" name=\"quantity\" value=\"1\" size=\"2\"/>";
                        $div .= "      <input type =\"submit\" value=\"Add to Cart\" class=\"btnAddAction\" />";
                        $div .= "    </form>";
                        $div .= "  </div>";
                        $div .= "</div>";
                        return $div;
                    }

                    // create a div and table for the specified beverage category
                    function beverageByCategory($db_handle,$category) {
                        $query = "SELECT id, name, price, category, image";
                        $query .= " FROM tblproduct ";
                        $query .= " WHERE category = '" . $category . "' ";
                        $query .= " ORDER BY display_sequence;";
                        $product_array = $db_handle->runQuery($query);
                        

                        if (!empty($product_array)) {
                            $cnt = 0;
                            foreach ($product_array as $key => $value) {
                                if ($cnt == 0) {
                                    // it is the first time through the while loop
                                    // so start a div and table for the "category" of 
                                    // beverage
                                    echo "<br><br><br>";
                                    echo "<div style=\"text-align: center;\">";
                                    echo "<table align=\"center\" class=\"menuT\">";
                                    echo "<td height=\"49\" colspan=\"3\" bgcolor=\"white\">";
                                    echo $product_array[$key]["category"] . " - $" . $product_array[$key]["price"] . " (per bottle)</td>";
                                    // use $inRow to keep track if a <tr> has been started
                                    $inRow = FALSE;
                                } // end if ($cnt == 0)
                                if (!$inRow) {
                                    // start a row
                                    echo "<tr>";
                                    $inRow = TRUE;
                                } // end if (!$inRow)
                                // create a column with the image of the beverage and its name
                                echo "<td align=\"center\"> ";
                                echo "<img src=\"" 
                                    . $product_array[$key]["image"] . "\" id=\"menuTd\">" . $product_array[$key]["name"];
                                echo generateAction($product_array[$key]["id"]);
                                echo "</td>";
                                $cnt++;
                                // each row will have at most 3 columns
                                // Use $cnt modulus 3 to get a zero on every 3rd execution
                                if (($cnt % 3) == 0) {
                                    // end the row since 3 columns have been created
                                    echo "</tr>";
                                    $inRow = FALSE;
                                }
                            } // end while
                            // did the previous while loop create at least one column? 
                            if ($cnt > 0) {
                                // Was a row started that was not completed?
                                if ($inRow) {
                                    echo "</tr>";
                                    $inRow = FALSE;
                                }
                                // complete the table for this "category" of beverage
                                echo "</table>";
                                // comlete the div for this "category" of beverage
                                echo "</div>";
                            } // end if ($cnt > 1)
                        } else {
                            echo "<div><h3>Select failed</h3></div>";
                        } // if (!empty..........
                    } // end beverageByCategory
                    
                    
                    // Define an array with the three Beverage Categories
                    $arr = array("Kombucha", "Organic Coffee", "Organic Beer");
                    foreach ($arr as $category) {
                        beverageByCategory($db_handle,$category);
                    }
                    ?>
                    <br>
                    <div class="btn-group-wrap">
                        <div class="btn-group">	
                            <button align="center"><a href="menu.html" class="button"><b>Return to Main Menu</a></button>
                        </div>
                    </div>

                    <footer class="clear">
                        <br><br><br><br><a href="#toppage"><img src="assets/Red_Pepper.jpg" width="124" height="60" class="centerfooter"><a/>
                    </footer>

                </main>

                <div class="clear"></div>

            </main>


        </body>
</html>