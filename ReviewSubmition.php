<?php
// initializing variables
session_start();
$connection = mysqli_connect("localhost", "pzavros", "QXeP7MCP", "pzavros");

if (mysqli_connect_error())
{
    echo "ERROR: could not connect to database: " . mysqli_connect_error();
}

$reviewRating = "";
$reviewTitle  = "";
$reviewDesc   = "";

$product_id = $_GET['product_id'];

if (isset($_POST['review_user'])) {
  // receive all input values from the form
  $reviewRating = mysqli_real_escape_string($connection, $_POST['review_Rating']);
  $reviewTitle  = mysqli_real_escape_string($connection, $_POST['review_Title']);
  $reviewDesc   = mysqli_real_escape_string($connection, $_POST['review_Desc']);
}

	$query = "INSERT INTO tbl_reviews (product_id, review_title, review_desc, review_rating) VALUES ('$product_id', '$reviewTitle','$reviewDesc','$reviewRating')";
  	mysqli_query($connection, $query);
	header('location:item.php?product_id='.$product_id.'');
	exit();
?>