

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main page</title>
    <link rel="stylesheet" href="Style.css">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
	
	
	
</head>
<body>
<?php
session_start();
$connection = mysqli_connect("localhost", "pzavros", "QXeP7MCP", "pzavros");

if (mysqli_connect_error())
{
    echo "ERROR: could not connect to database: " . mysqli_connect_error();
}

$connection->close();
?>
<header>
<div id="secondary">
    <div class="logo" id="secondary"> <img src="uclan logo.png" width="370" height="110" class="logo"> </div>
    <p class="headerText" id="secondary">Student Shop</p>
    <nav>



    <ul class="menu" id="secondary" style="visibility:visible">
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
		?>
				
				
				
					<?php
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

<div class="offers-grid-container" id=''>
	<?php 
			$conn = mysqli_connect("localhost", "pzavros", "QXeP7MCP", "pzavros");

			if (mysqli_connect_error())
			{
				echo "ERROR: could not connect to database: " . mysqli_connect_error();
			}
		
			$sql = "SELECT * FROM tbl_offers";
			
			$result = $conn->query($sql);
	
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<div class='offers-grid' id=''>";
					echo "<h2 id='offer-title'>".$row["offer_title"]. "</h2><br><p id=''>" . $row["offer_dec"]. "</p><br><br><br>";
					echo "</div>";
				}
			} 
			else {
				echo "0 results";
			}
			$conn->close();
		
		
	?>


</div>



<h1 class="titleMainPage" id="primary">
    Where opportunity creates success
</h1>
<p id="primary">
    Every student at the University of Central Lancashire is automatically a member of the Students' Union <br>
    We're here to make life better for students - inspiring you to succeed and achive your goals <br><br>
    Everything you need to know about UCLan Students' Union.Your memberhip starts here.
</p>
<h2 class="Together" id="primary">
    Together
</h2>

<video class="video" width="560" height="315" controls>
    <source src="video.mp4"  type="video/mp4">
</video>

<h2 class="Together" id="primary">
    Join our global community
</h2>
<div class="video" >
<iframe class="video" width="560" height="315" src="https://www.youtube.com/embed/nh3-dJjO-7I" title="YouTube video player"></iframe>
</div>




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
