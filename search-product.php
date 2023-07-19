<?php
@include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
};

$search_box = $_POST['products'];
$search_box = filter_var($search_box, FILTER_SANITIZE_STRING);

$select_products = $conn->prepare("SELECT * FROM `products` WHERE name LIKE '%{$search_box}%' OR category LIKE '%{$search_box}%'");
$select_products->execute();
$output = "<ul>";
	if ($select_products->rowCount() > 0) {
		while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
			$output .= "<li>{$fetch_products['name']}</li>";
			// $output .= "<li>{$fetch_products['category']}</li>";
		}
	} else {
	$output .= "<li>Product Not Found</li>";
	}
$output .= "</ul>";

echo $output;
?>