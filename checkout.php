<div id="checkout" align="center">
    <div class="txt-heading">Checkout</div>

    <?php
    if (isset($_SESSION["cart_item"])) {
        $total_quantity = 0;
        $total_price = 0;
        ?>	
        <form id="paypal-form" action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="upload" value="1">
            <input type="hidden" name="business" value="magnificentmushroom@gmail.com">
            <?php
            foreach ($_SESSION["cart_item"] as $item) {
                $index++;
                ?>
                <input type="hidden" name="item_name_<?php echo $index; ?>" value="<?php echo $item["name"]; ?>">
                <input type="hidden" name="amount_<?php echo $index; ?>" value="<?php echo $item["price"]; ?>">
                <input type="hidden" name="quantity_<?php echo $index; ?>" value="<?php echo $item["quantity"]; ?>">
                <?php
            }
            ?>

            <input type="submit" value="PayPal">
        </form>		
        <?php
    }
    ?>
</div>