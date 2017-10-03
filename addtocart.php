<?php ?>

<form name="_xclick" target="paypal" action="" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="item_name" value='<?php echo $Artist ?> . <?php echo $Title ?>'>
<input type="hidden" name="amount" value='<?php echo $Price; ?>'>
<input type="image" src="http://www.paypal.com/en_US/i/btn/sc-but-01.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
<input type="hidden" name="add" value="1">
</form>

<form name="_xclick" target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="">
<input type="image" src="https://www.paypal.com/en_US/i/btn/view_cart.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
<input type="hidden" name="display" value="1">
</form>