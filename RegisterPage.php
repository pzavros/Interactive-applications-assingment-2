<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="loginStyle.css">
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
            <li class="menuList"> <a href="loginPage.php" id="login"><div class="dropdown">
				<button class="dropbtn">
				<?php
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			echo "Welcome ".$_SESSION['username'];
		}
		else {
			echo "log in";
		}
		?>
				
				
				</button>
				<div class="dropdown-content">
					<a id="logout" href="LogOut.php">
					<?php
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			echo "Log out";
		}
		else {
			echo "log in";
		}
		?>
					
					</a>
					<a href="RegisterPage.php">Register</a>
				</div>
			</div></a> </li>
        </ul>
    </nav>

</header>


<form method="post" action="RegisterPage.php">
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username">
  	</div>
	<div class="input-group">
  	  <label>address</label>
  	  <input type="text" name="address">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="LoginPage.php">Sign in</a>
  	</p>
  </form>

    <?php
	session_start();
	
$db = mysqli_connect("localhost", "pzavros", "QXeP7MCP", "pzavros");

if (mysqli_connect_error())
{
    echo "ERROR: could not connect to database: " . mysqli_connect_error();
 }
  
  // initializing variables
$username = "";
$email    = "";
$errors = array(); 

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
	echo "<p> Passwords not match</p>";
  }
  
  
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM tbl_users WHERE user_full_name='$username' OR user_email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
       array_push($errors, "Username already exists");
	   echo $errors;
	   print $errors;
    }

    if ($user['email'] === $email) {
     array_push($errors, "email already exists");
    }
  }

if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO tbl_users (user_full_name, user_email, user_pass, user_address) VALUES ('$username', '$email', '$password','$address')";
  	mysqli_query($db, $query);
  	header('location: RegisterPage.php');
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