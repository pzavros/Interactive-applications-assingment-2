<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="loginStyle.css">
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

  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="LoginPage.php">
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not registered? <a href="RegisterPage.php">Sign up</a>
  	</p>
  </form>
  <?php 
  session_start();
  
  $db = mysqli_connect("localhost", "pzavros", "QXeP7MCP", "pzavros");

if (mysqli_connect_error())
{
    echo "ERROR: could not connect to database: " . mysqli_connect_error();
 }
  
  // LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

$password = md5($password);
  	$query = "SELECT * FROM tbl_users WHERE user_full_name ='$username' AND user_pass ='$password'";
  	
  	$results = mysqli_query($db, $query);

  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['loggedin'] = true;
  	  header('location: index.php');
  	}else {
  		echo "<h4>Wrong username/password combination</h4>";
  	}
}



?>
  
  
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