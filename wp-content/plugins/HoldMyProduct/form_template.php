<?php
global $product;
?>

<button type="button" id="hmp_reserve_product" data-productid="<?php echo esc_attr($product->get_id()); ?>">Reserve</button>

<!-- <div id="container">
    <h3>WooCommerce Reservation</h3>
    <div class="form_woo">
        <p>Our product is available for reservation:</p>
        <div class="checkbox_group">
            <input type="checkbox" id="rez_check" name="reserve">
            <label for="rez_check">I want to reserve this product.</label>
        </div>
        <p class="policy">Check our <a href="#">terms of policy</a></p>
    </div>
    <div class="button_container">
        <button type="button" id="hmp_reserve_product" data-productid="<?php echo esc_attr($product->get_id()); ?>">Reserve</button>
    </div>
</div> -->

