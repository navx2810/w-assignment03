<!DOCTYPE html>
<html>
<?php $title = 'Checkout' ?>
<?php include 'inc/head.php' ?>
<body>
	
	<?php include 'inc/nav.php' ?>

  <div class="content wide">
   <h2>Checkout</h2>
   <fieldset>
    <legend>Order Details</legend>

    <? 

    if ( isset($_POST["submit"]) ) {
        if ($_POST["s5Q"] != 0 || $_POST["iMacQ"] != 0 || $_POST["alphaQ"] != 0 || $_POST["mlpQ"] != 0) {
            echo "<ul>";

            if ($_POST["s5Q"] != 0){
                echo "<li>" . $_POST["s5Q"] . " - Samsung Galaxy S5</li>";
                                    // setcookie("product1", $_POST["product1"]);
            }

            if ($_POST["alphaQ"] != 0){
                echo "<li>" . $_POST["alphaQ"] . " - Alienware Alpha</li>";
                                    // setcookie("product2", $_POST["product2"]);
            }

            if ($_POST["iMacQ"] != 0){
                echo "<li>" . $_POST["iMacQ"] . " - iMac</li>";
                                    // setcookie("product2", $_POST["product2"]);
            }

            if ($_POST["mlpQ"] != 0){
                echo "<li>" . $_POST["mlpQ"] . " - My Little Pony DVD Box Set</li>";
                                    // setcookie("product2", $_POST["product2"]);
            }

            echo "</ul>";

            echo '<ul class="none">';

            $s5_cost = number_format( $_POST["s5Q"] * 199.99, 2, ".", ",");
            $alpha_cost = number_format( $_POST["alphaQ"] * 799.99, 2, ".", ",");
            $iMac_cost = number_format( $_POST["iMacQ"] * 2499.99, 2, ".", ",");
            $mlp_cost = number_format( $_POST["mlpQ"] * 0.99, 2, ".", ",");

            if ($_POST["s5Q"] != 0){
             echo "<li> $" . $s5_cost . "</li>";
	                                    // setcookie("product1", $_POST["product1"]);
         }

         if ($_POST["alphaQ"] != 0){
             echo "<li> $" . $alpha_cost . "</li>";
	                                    // setcookie("product2", $_POST["product2"]);
         }

         if ($_POST["iMacQ"] != 0){
             echo "<li> $" . $iMac_cost . "</li>";
	                                    // setcookie("product2", $_POST["product2"]);
         }

         if ($_POST["mlpQ"] != 0){
             echo "<li> $" . $mlp_cost . "</li>";
	                                    // setcookie("product2", $_POST["product2"]);
         }



         echo "</ul>";
         echo '<div class="clear"></div>';
         echo '<hr>';

         echo "<ul>";
         echo "<li>Sub-Total:</li>";
         echo "<li>Tax:</li>";
         echo "<li>Total:</li>";
         echo "</ul>";

         echo '<ul class="none">';
         echo '<li> $' . number_format( ($_POST["mlpQ"] * 0.99) + ($_POST["s5Q"] * 199.99) + ($_POST["alphaQ"] * 799.99) + ($_POST["iMacQ"] * 2499.99), 2, ".", ",") . '</li>';
         echo '<li> $' . number_format( ( ($_POST["mlpQ"] * 0.99) + ($_POST["s5Q"] * 199.99) + ($_POST["alphaQ"] * 799.99) + ($_POST["iMacQ"] * 2499.99) ) * 0.06, 2, ".", ",") . '</li>';
         echo '<li> $' . number_format( ($_POST["mlpQ"] * 0.99) + ($_POST["s5Q"] * 199.99) + ($_POST["alphaQ"] * 799.99) + ($_POST["iMacQ"] * 2499.99) + (( ($_POST["mlpQ"] * 0.99) + ($_POST["s5Q"] * 199.99) + ($_POST["alphaQ"] * 799.99) + ($_POST["iMacQ"] * 2499.99) ) * 0.06), 2, ".", ",") . '</li>';
         echo '</ul>';

     } else {
        echo "<p>Your cart is empty!</p>";
    }
}


?>
</fieldset>

<form action="checkout.php" action="POST">
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
            <input type="text" name="bilAdd2" required>
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
           <input type="text" name="bilPhone" required maxlength="10">
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
            <input type="text" name="shiAdd2" required>
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
</div>
</body>
</html>