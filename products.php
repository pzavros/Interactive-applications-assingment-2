<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="stylesheet" href="Style.css">

</head>
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
		session_start();
		$conn = mysqli_connect("localhost", "pzavros", "QXeP7MCP", "pzavros");
		
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

</header>
<form action="products.php" method="GET">
		<input id="search" type="text" placeholder="Type here" name="search">
		<input id="submit" type="submit" value="Search" name="submit">
</form>
<?php
    if(isset($_GET['submit'])){
    $text = $_GET["search"];
    $sql = "SELECT * FROM tbl_products WHERE product_title like '%".$text."%'";
    $resultsearch = mysqli_query($conn,$sql);
    while($row = $resultsearch->fetch_assoc()) {
					echo "<div class='grid'>";
					echo "<img id='productImage' src='".$row["product_image"]."' width=110px height=110px ><br><div class='smallGrid'>'" . $row["product_title"]. "<br>" . $row["product_desc"];
					echo "<a class='ButtReadMore' href='item.php?product_id=".$row['product_id']."'>ReadMore...</a>";
					echo "<br><br><br>";
					echo "<p class='ProductPrice'>".$row['product_price']."<br><br><br>";
					echo "<button class='ButtCart'>Buy</button><br><br><br>";
					echo "</div></div>";
			}
    }

?>



<form method="post">
		<input type="submit" name="button"
                class="Productbutton" value="all products" />
				
        <input type="submit" name="button1"
                class="Productbutton" value="Jumpers" />
          
        <input type="submit" name="button2"
                class="Productbutton" value="Hoodies" />
				
		<input type="submit" name="button3"
                class="Productbutton" value="tshirts" />
    </form>
<div id="ProductSelector">

        <div id="card" class="grid-container">
		
		<?php 
			$sql = "SELECT * FROM tbl_products";
			
			$jumpers = "SELECT * FROM tbl_products WHERE product_type='UCLan Logo Jumper'";
			$hoodies = "SELECT * FROM tbl_products WHERE product_type='UCLan Hoodie'";
			$tshirts = "SELECT * FROM tbl_products WHERE product_type='UCLan Logo Tshirt'";
			$result =  $conn->query($sql);
			$result1 = $conn->query($jumpers);
			$result2 = $conn->query($hoodies);
			$result3 = $conn->query($tshirts);
			
	function addToCart($result){
			$_SESSION['productID'] = $result[''];
			header('location:products.php');
	}
	
	if ($result->num_rows > 0) {
				
				
		if(isset($_POST['button'])) {
            while($row = $result->fetch_assoc()) {
					echo "<div class='grid'>";
					echo "<img id='productImage' src='".$row["product_image"]."' width=110px height=110px ><br><div class='smallGrid'>'" . $row["product_title"]. "<br>" . $row["product_desc"];
					echo "<a class='ButtReadMore' href='item.php?product_id=".$row['product_id']."'>ReadMore...</a>";
					echo "<br><br><br>";
					echo "<p class='ProductPrice'>".$row['product_price']."<br><br><br>";
					echo "<button class='ButtCart'onclick=".addToCart($row['product_id']).">Buy</button><br><br><br>";
					echo "<button class='ButtCart'onclick='cart.php'>Buy</button><br><br><br>";
					echo "</div></div>";
			}
        }	
        else if(isset($_POST['button1'])) {
            while($row = $result1->fetch_assoc()) {
					echo "<div class='grid'>";
					echo "<img id='productImage' src='".$row["product_image"]."' width=110px height=110px ><br><div class='smallGrid'>'" . $row["product_title"]. "<br>" . $row["product_desc"];
					echo "<a class='ButtReadMore' href='item.php?product_id=".$row['product_id']."'>ReadMore...</a>";
					echo "<br><br><br>";
					echo "<p class='ProductPrice'>".$row['product_price']."<br><br><br>";
					echo "<button class='ButtCart'>Buy</button><br><br><br>";
					echo "</div></div>";
			}
        }
        else if(isset($_POST['button2'])) {
            while($row = $result2->fetch_assoc()) {
					echo "<div class='grid'>";
					echo "<img id='productImage' src='".$row["product_image"]."' width=110px height=110px ><br><div class='smallGrid'>'" . $row["product_title"]. "<br>" . $row["product_desc"];
					echo "<a class='ButtReadMore' href='item.php?product_id=".$row['product_id']."'>ReadMore...</a>";
					echo "<br><br><br>";
					echo "<p class='ProductPrice'>".$row['product_price']."<br><br><br>";
					echo "<button class='ButtCart'>Buy</button><br><br><br>";
					echo "</div></div>";
			}
        }
		else if(isset($_POST['button3'])){
			while($row = $result3->fetch_assoc()) {
					echo "<div class='grid'>";
					echo "<img id='productImage' src='".$row["product_image"]."' width=110px height=110px ><br><div class='smallGrid'>'" . $row["product_title"]. "<br>" . $row["product_desc"];
					echo "<a class='ButtReadMore' href='item.php?product_id=".$row['product_id']."'>ReadMore...</a>";
					echo "<br><br><br>";
					echo "<p class='ProductPrice'>".$row['product_price']."<br><br><br>";
					echo "<button class='ButtCart'>Buy</button><br><br><br>";
					echo "</div></div>";
			}
		}
		else {
			while($row = $result->fetch_assoc()) {
					echo "<div class='grid'>";
					echo "<img id='productImage' src='".$row["product_image"]."' width=110px height=110px ><br><div class='smallGrid'>'" . $row["product_title"]. "<br>" . $row["product_desc"];
					echo "<a class='ButtReadMore' href='item.php?product_id=".$row['product_id']."'>ReadMore...</a>";
					echo "<br><br><br>";
					echo "<p class='ProductPrice'>".$row['product_price']."<br><br><br>";
					echo "<button class='ButtCart'>Buy</button><br><br><br>";
					echo "</div></div>";
			}
		}
			}
	else {
		echo "0 results";
	}
			
			
			
			session_destroy();
			$conn->close();
		
		
		?>
        </div>
		</div>
        <div id="scroll-button">top</div>


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