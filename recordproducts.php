
<div class="container">

    <div class="proBox">
        
        <p>Name: <?php echo $Artist; ?></p>
        <p>Price: <?php echo $Price; ?></p>
        <form target="_self" action="<?php echo $paypalURL; ?>" method="post">
            <!-- Identify your business so that you can collect the payments. -->
            <input type="hidden" name="business" value="<?php echo $paypalID; ?>">
            
            <!-- Specify a PayPal Shopping Cart Add to Cart button. -->
            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="add" value="1">
            
            <!-- Specify details about the item that buyers will purchase. -->
            <input type="hidden" name="item_name" value="<?php echo $row['Arist']; ?>">
            <input type="hidden" name="item_number" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="amount" value="<?php echo $row['Price']; ?>">
            <input type="hidden" name="currency_code" value="USD">
            
            <!-- Specify URLs -->
            <input type='hidden' name='cancel_return' value='https://frcrescioni.net/vinylspin/a9pager/record_list.php'>
            <input type='hidden' name='return' value='http://www.codexworld.com/success.php'>
            
            <!-- Display the payment button. -->
            <input type="image" name="submit"
              src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_addtocart_120x26.png"
              alt="Add to Cart">
            <img alt="" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif">
        </form>
    </div>
</div>