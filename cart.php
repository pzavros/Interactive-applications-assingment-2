<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
<header>
    <div class="logo"> <img src="uclan logo.png" width="370" height="110" class="logo"> </div>
    <p class="headerText">Student Shop</p>
    <nav>
        <ul class="menu">
            <li class="menuList"> <a href="index.php" id="home">Home</a> </li>
            <li class="menuList"> <a href="products.php" id="products">Products</a> </li>
            <li class="menuList"> <a href="cart.php" id="cart">Cart</a> </li>
			<li class="menuList"> <a href="LoginPage.php" id="login">Login</a> </li>
        </ul>
    </nav>


</header>
<input type="button" value="Clear Cart" onclick="clear_cart()">
<h3>Shopping Cart:</h3>
<p id="shoppingCart"> </p>
<div id="itemCounter">

</div>
<div id="CartInformation" class="cartGrid">
    <script src="script.js"> </script>

</div>
<script>


    var Cart =  JSON.parse(localStorage.cart);

    if(localStorage.cart!==null) {
        Cart.forEach(
            product => {

                document.getElementById("shoppingCart").innerHTML = "The items you have added to your shopping cart are: ";
                document.getElementById("CartInformation").innerHTML += "<div class='CartProducts'>" + "<div class='itemCounter'>Item:</div>"
                    + "<img class='CartImage' src='" + product.image + "'> "+product.color
                    + "<h3 class='CartType'>" + product.type + "</h3>"
                    + "<h3 class='CartPrice'>" + product.price + "</h3>";

            }
        );
        for (let i = 0; i < Cart.length; i++) {
            document.getElementById("itemCounter").innerHTML += i + 1;
        }
    }

    else
    {

        document.getElementById("shoppingCart").innerHTML = "Cart is empty.";
    }
</script>
<footer>
    <div class="myFooter">
        <div>
            <h2>Links </h2>
            <br>
            <a id="blueColor" href="">Students' Union</a>
        </div>
        <div>
            <h2>Contact</h2>
            <br>Email: suinformation@uclan.ac.uk
            <br>Phone: 01772 89 3000
        </div>
        <div>
            <h2>Location</h2><br>University of Central Lancashire Students' Union.
            <br>Fylde Road, Preston, PR1 7BY
            <br>Registered in England
            <br>Company Number: 7623917
            <br>Registered Charity Number: 1142616
        </div>

    </div>
</footer>
</body>
</html>