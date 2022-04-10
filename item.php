<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Item Description</title>
    <link rel="stylesheet" href="Style.css">
	<link rel="stylesheet" href="loginStyle.css">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
	
	
</head>
<?php
session_start();
$connection = mysqli_connect("localhost", "pzavros", "QXeP7MCP", "pzavros");

if (mysqli_connect_error())
{
    echo "ERROR: could not connect to database: " . mysqli_connect_error();
}

$connection->close();
?>
<body>
<header>
<div id="secondary">
    <div class="logo" id="secondary"> <img src="uclan logo.png" width="370" height="110" class="logo"> </div>
    <p class="headerText" id="secondary">Student Shop</p>
    <nav>
    <ul class="menu" id="secondary">
        <li class="menuList" id="secondary"> <a href="index.php" id="home">Home</a> </li>
        <li class="menuList" id="secondary"> <a href="products.php" id="products">Products</a> </li>
        <li class="menuList" id="secondary"> <a href="cart.php" id="cart">Cart</a> </li>
		<li class="menuList" id="secondary"> <a href="LoginPage.php" id="login"><div class="dropdown">
				<button class="dropbtn">
				<?php
		$connection = mysqli_connect("localhost", "pzavros", "QXeP7MCP", "pzavros");
		
		if (mysqli_connect_error())
		{
			echo "ERROR: could not connect to database: " . mysqli_connect_error();
		}
		
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			echo "Welcome ".$_SESSION['username'];
		}
		else {
			echo "Log In";
		}
		
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			 echo "</button>
				<div class='dropdown-content'>
					<a id='logout' href='LogOut.php'>";
					echo "Log Out";
		}
		else {
			echo "</button>
				<div class='dropdown-content'>
					<a id='logout' href='LoginPage.php' value='Log in'>";
					echo "Log In";
		}
		?>
					
					</a>
					<a href="RegisterPage.php">Register</a>
				</div>
			</div></a> </li>
    </ul>
    </nav>
</div>
</header>


<?php

 
			$sql = "SELECT * FROM tbl_products WHERE product_id = ".$_GET['product_id']."";
			$product_id = $_GET['product_id'];
			$result =  $connection->query($sql);
			
			if(isset($_GET['product_id'])) {
            while($row = $result->fetch_assoc()) {
					echo "<div class='grid'>";
					echo "<img id='productImage' src='".$row["product_image"]."'><br>";
					echo "<div class='smallGrid'><h1 class=product-title>" . $row["product_title"]. "</h1><br>";
					echo "<p class='product-desc'>".$row["product_desc"];
					//echo "<a class='ButtReadMore' href='item.php?product_id=".$row['product_id']."'>ReadMore...</a>";
					echo "<br><br><br>";
					echo "<h3 class='ProductPrice'>".$row['product_price']."</h3><br><br><br>";
					echo "<button class='Productbutton'>Buy</button><br><br><br>";
					echo "</div></div>";
				}
			}
?>
<h1 class='allreviews'> Reviews: </h1><br>
<?php
	$reviews = "SELECT * FROM tbl_reviews WHERE product_id=".$product_id." AND review_id != 'review_id'";
	$result =  $connection->query($reviews);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
					echo "<div review-content>";
					echo "<div class=''><h1 class='review-title'>".$row['review_title']."</h1></div>";
					echo "<div class=''><p class='review-desc'>".$row['review_desc']."</p></div>";
					echo "<div class=''><h3 class='review-title'>".$row['review_rating']."</h3></div>";
					echo "</div>";
			}
	}

?>





<form method="post" action="ReviewSubmition.php?product_id=<?php echo $product_id ?>">
	<div class="input-group">
		<label>Review Rating</label>
		<input type="checkbox" name="review_Rating" value="1"> 1 </input>
		<input type="checkbox" name="review_Rating" value="2"> 2 </input>
		<input type="checkbox" name="review_Rating" value="3"> 3 </input>
		<input type="checkbox" name="review_Rating" value="4"> 4 </input>
		<input type="checkbox" name="review_Rating" value="5"> 5 </input>
	</div>
	<div class="input-group">
		<label>Review Title</label>
		<input type="text" name="review_Title">
	</div>
	<div class="input-group">
		<label>Write a review</label>
		<input type="text" name="review_Desc">
	</div>
	<div class="input-group">
  	  <button type="submit" class="btn" name="review_user">submit</button>
  	</div>
</form>
					

		
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