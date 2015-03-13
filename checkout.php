<!DOCTYPE html>
<html>
<?php $title = 'Checkout' ?>
<?php include 'inc/head.php' ?>
<body>
	
	<?php include 'inc/nav.php' ?>

  <div class="content wide">
   <h2>Checkout</h2>

   <?php if ( isset($_REQUEST["checkout"]) ) { ?>
        <h2 id="thank-you">Thank you for your order!</h2>
        <p>An email with your order details will be sent to <?= $_REQUEST["bilEmai"] ?> </p>

    <?php 
        $headers = "From: shopping@mattfetterman.com \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf8\r\n";

        $message = "<h1>Thank you for your order!</h1>";
        $message .= "<h2>Order Details</h2>";
        $message .= "<hr>";

        if ( $_COOKIE["s5Cost"] != 0)
            $message .= "<p>Samsung Galaxy S5 - " . $_COOKIE["s5Cost"] . "</p>";
        if ( $_COOKIE["alphaCost"] != 0)
            $message .= "<p>Alienware Alpha - " . $_COOKIE["alphaCost"] . "</p>";
        if ( $_COOKIE["iMacCost"] != 0)
            $message .= "<p>iMac - " . $_COOKIE["iMacCost"] . "</p>";
        if ( $_COOKIE["mlpCost"] != 0)
            $message .= "<p>My Little Pony DVD Box Set - " . $_COOKIE["mlpCost"] . "</p>";

        $message .= "<hr>";

        $message .= "<p>Sub-Total - $". $_COOKIE("subtotal") ."</p>";
        $message .= "<p>Tax - $". $_COOKIE("tax") ."</p>";
        $message .= "<p>Total - $". $_COOKIE("total") ."</p>";

        $message .= "<br><br><h2>Billing Details</h2>";
        $message .= "<p>". $_REQUEST["bilName"] ."</p>";
        $message .= "<p>". $_REQUEST["bilAdd1"] ."</p>";
        $message .= "<p>". $_REQUEST["bilAdd2"] ."</p> <br>";
        $message .= "<p>". $_REQUEST["bilCity"] ."</p>";
        $message .= "<p>". $_REQUEST["bilStat"] ."</p>";
        $message .= "<p>". $_REQUEST["bilZip"] ."</p>";
        $message .= "<p>". $_REQUEST["bilPhon"] ."</p>";
        $message .= "<p>". $_REQUEST["bilEmai"] ."</p> <br><br>";

        $message .= "<h2>Shipping Details</h2>";
        $message .= "<p>". $_REQUEST["shiName"] ."</p>";
        $message .= "<p>". $_REQUEST["shiAdd1"] ."</p>";
        $message .= "<p>". $_REQUEST["shiAdd2"] ."</p> <br>";
        $message .= "<p>". $_REQUEST["shiCity"] ."</p>";
        $message .= "<p>". $_REQUEST["shiStat"] ."</p>";
        $message .= "<p>". $_REQUEST["shiZip"] ."</p>";
        $message .= "<p>". $_REQUEST["shiPhon"] ."</p>";
        $message .= "<p>". $_REQUEST["shiEmai"] ."</p> <br><br>";


     ?>

    <?php mail( $_REQUEST["bilEmai"], "Order Status", $message, $headers ); ?>

   <?php } else { ?>
   <fieldset>
    <legend>Order Details</legend>

    <?php 

        $cent_count = 0;

    if ( isset($_POST["submit"]) ) {
        if ($_POST["s5Q"] != 0 || $_POST["iMacQ"] != 0 || $_POST["alphaQ"] != 0 || $_POST["mlpQ"] != 0) {
            echo "<ul>";

            if ($_POST["s5Q"] != 0){
                echo "<li>" . $_POST["s5Q"] . " - Samsung Galaxy S5</li>";
                $cent_count += 1;
            }

            if ($_POST["alphaQ"] != 0){
                echo "<li>" . $_POST["alphaQ"] . " - Alienware Alpha</li>";
                $cent_count += 1;
            }

            if ($_POST["iMacQ"] != 0){
                echo "<li>" . $_POST["iMacQ"] . " - iMac</li>";
                $cent_count += 1;
            }

            if ($_POST["mlpQ"] != 0){
                echo "<li>" . $_POST["mlpQ"] . " - My Little Pony DVD Box Set</li>";
                $cent_count += 1;
            }

            echo "</ul>";

            echo '<ul class="none">';

            $s5_cost = $_POST["s5Q"] * 199.99;
            $alpha_cost = $_POST["alphaQ"] * 799.99;
            $iMac_cost = $_POST["iMacQ"] * 2499.99;
            $mlp_cost = $_POST["mlpQ"] * 0.99;

            setcookie("s5Cost", $s5_cost);
            setcookie("alphaCost", $alpha_cost);
            setcookie("iMacCost", $iMac_cost);
            setcookie("mlpCost", $mlp_cost);

            if ($_POST["s5Q"] != 0){
             echo "<li> $" . number_format($s5_cost, 2, ".", ",") . "</li>";
         }

         if ($_POST["alphaQ"] != 0){
             echo "<li> $" . number_format($alpha_cost, 2, ".", ",") . "</li>";

         }

         if ($_POST["iMacQ"] != 0){
             echo "<li> $" . number_format($iMac_cost, 2, ".", ",") . "</li>";

         }

         if ($_POST["mlpQ"] != 0){
             echo "<li> $" . number_format($mlp_cost, 2, ".", ","). "</li>";

         }

         echo "</ul>";
         echo '<div class="clear"></div>';
         echo '<hr>';

         echo "<ul>";
         echo "<li>Sub-Total:</li>";
         echo "<li>Tax:</li>";
         echo "<li>Total:</li>";
         echo "</ul>";

        $subtotal_cost = ($_POST["mlpQ"] * 0.99) + ($_POST["s5Q"] * 199.99) + ($_POST["alphaQ"] * 799.99) + ($_POST["iMacQ"] * 2499.99);
        $tax = $subtotal_cost * 0.06 - ( 0.01 * ($cent_count - 1) );    // This is for accounting for precision issues
        $total = $subtotal_cost + $tax;

        setcookie("subtotal", $subtotal_cost);
        setcookie("tax", $tax);
        setcookie("total", $total);

         echo '<ul class="none">';
         echo '<li> $' . number_format( $subtotal_cost , 2, ".", ",") . '</li>';
         echo '<li> $' . number_format(  $tax, 2, ".", ",") . '</li>';
         echo '<li> $' . number_format( $total , 2, ".", ",") . '</li>';
         echo '</ul>';

     } else {
        echo "<p>Your cart is empty!</p>";
    }
}


?>
</fieldset>

<form action="checkout.php" action="GET">
    <fieldset class="small">
        <legend>Billing Information</legend>

        <div>
            <label for="bilName">name:</label>
            <input type="text" name="bilName" required>
        </div>
            <div class="clear"></div>
        <div>
            <label for="bilAdd1">address:</label>
            <input type="text" name="bilAdd1" required>
        </div>
            <div class="clear"></div>
        <div>
            <label for="bilAdd2">address:</label>
            <input type="text" name="bilAdd2">
        </div>
            <div class="clear"></div>
        <div>
            <label for="bilCity">city:</label>
            <input type="text" name="bilCity" required>
        </div>
            <div class="clear"></div>
        <div>
            <label for="bilStat">state:</label>
            <input type="text" name="bilStat" required>
        </div>
            <div class="clear"></div>
        <div> 
            <label for="bilZip">zip:</label>
            <input type="text" name="bilZip" required>
        </div>
            <div class="clear"></div>
        <hr class="clear">

        <div>
           <label for="bilPhon">phone:</label>
           <input type="text" name="bilPhon" required maxlength="10">
       </div>  
            <div class="clear"></div>
       <div>
           <label for="bilEmai">email:</label>
           <input type="text" name="bilEmai" required>
       </div>
            <div class="clear"></div>

   </fieldset>

   <fieldset class="small right">
    <legend>Shipping Information</legend>

        <div>
            <label for="shiName">name:</label>
            <input type="text" name="shiName" required>
        </div>
            <div class="clear"></div>
        <div>
            <label for="shiAdd1">address:</label>
            <input type="text" name="shiAdd1" required>
        </div>
            <div class="clear"></div>
        <div>
            <label for="shiAdd2">address:</label>
            <input type="text" name="shiAdd2">
        </div>
            <div class="clear"></div>
        <div>
            <label for="shiCity">city:</label>
            <input type="text" name="shiCity" required>
        </div>
            <div class="clear"></div>
        <div>
            <label for="shiStat">state:</label>
            <input type="text" name="shiStat" required>
        </div>
            <div class="clear"></div>
        <div> 
            <label for="shiZip">zip:</label>
            <input type="text" name="shiZip" required>
        </div>
            <div class="clear"></div>

    </fieldset>
        <div class="clear"></div>

<input type="submit" value="checkout" name="checkout" id="checkout">
</form>
    <?php } ?>
</div>
</body>
</html>